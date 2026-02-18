<?php

namespace App\Http\Controllers\Pemohon;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Opd;
use Illuminate\Http\Request;
use App\Enums\ApplicationStatus;
use App\Enums\ApplicationFileType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UsulanMagangController extends Controller
{
    private function bolehAjukan(?Application $last): bool
    {
        // Aturan: boleh ajukan jika belum ada usulan, atau terakhir DITOLAK/SELESAI
        if (!$last) return true;

        $status = is_object($last->status)
            ? $last->status->value
            : $last->status;

        return in_array($status, [
            ApplicationStatus::DITOLAK->value,
            ApplicationStatus::SELESAI->value,
        ], true);
    }

    public function index(Request $request)
    {
        $user = $request->user();

        $last = $user->applications()
            ->latest('created_at')
            ->with(['opd', 'files'])
            ->first();

        $bolehAjukan = $this->bolehAjukan($last);

        $opds = Opd::where('aktif', true)->orderBy('nama')->get();

        return view('pemohon.pages.usulan-index', compact('last', 'bolehAjukan', 'opds', 'user'));
    }

    public function history(Request $request)
    {
        $user = $request->user();

        $applications = $user->applications()
            ->with(['opd'])
            ->latest('created_at')
            ->get();

        return view('pemohon.pages.history-index', compact('applications'));
    }

    public function store(Request $request)
    {
        $user = $request->user();

        $last = $user->applications()
            ->latest('created_at')
            ->first();

        if (!$this->bolehAjukan($last)) {
            $lastStatus = is_object($last->status) ? $last->status->value : (string) $last->status;

            return back()->with(
                'error',
                'Anda belum bisa mengajukan usulan baru karena status usulan terakhir masih: ' . strtoupper($lastStatus)
            );
        }

        $validated = $request->validate([
            'opd_id' => ['required', 'exists:opds,id'],
            'institusi' => ['required', 'string', 'max:255'],
            'jurusan' => ['nullable', 'string', 'max:255'],
            'telepon' => ['nullable', 'string', 'max:30'],
            'tanggal_mulai' => ['required', 'date'],
            'tanggal_selesai' => ['required', 'date', 'after_or_equal:tanggal_mulai'],

            // FILE WAJIB
            'surat_pengantar' => ['required', 'file', 'mimes:pdf', 'max:4096'],
            'transkrip_rapor' => ['required', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:4096'],

            // FILE OPSIONAL
            'cv'       => ['nullable', 'file', 'mimes:pdf', 'max:4096'],
            'proposal' => ['nullable', 'file', 'mimes:pdf', 'max:4096'],
        ]);

        return DB::transaction(function () use ($user, $request, $validated) {

            // derive kategori from user's profile field 'pemohon_tipe'
            $kategori = $user->pemohon_tipe; // 'mahasiswa' atau 'smk'
            if (!in_array($kategori, ['mahasiswa', 'smk'], true)) {
                return back()->with('error', 'Tipe akun tidak valid. Silakan update profil dulu.');
            }

            $app = Application::create([
                'user_id' => $user->id,
                'opd_id' => $validated['opd_id'],
                'kategori' => $kategori,
                'institusi' => $validated['institusi'],
                'jurusan' => $validated['jurusan'] ?? null,
                'telepon' => $validated['telepon'] ?? null,
                'tanggal_mulai' => $validated['tanggal_mulai'],
                'tanggal_selesai' => $validated['tanggal_selesai'],
                'status' => ApplicationStatus::DIPROSES->value,
            ]);

            // Upload file: wajib & opsional (cek dulu ada file atau nggak)
            $saveFileIfExists = function (string $inputName, ApplicationFileType $type) use ($request, $app) {

                if (!$request->hasFile($inputName)) {
                    return; // kalau opsional dan tidak diupload, skip
                }

                $file = $request->file($inputName);

                $old = $app->files()->where('type', $type->value)->first();

                $path = $file->store("applications/{$app->id}", 'public');

                $app->files()->updateOrCreate(
                    ['type' => $type->value],
                    [
                        'path' => $path,
                        'original_name' => $file->getClientOriginalName(),
                        'uploaded_by' => 'user',
                    ]
                );

                if ($old && $old->path && $old->path !== $path) {
                    Storage::disk('public')->delete($old->path);
                }
            };

            // WAJIB (pasti ada karena validasi required)
            $saveFileIfExists('surat_pengantar', ApplicationFileType::SURAT_PENGANTAR);
            $saveFileIfExists('transkrip_rapor', ApplicationFileType::TRANSKRIP_RAPOR);

            // OPSIONAL
            $saveFileIfExists('proposal', ApplicationFileType::PROPOSAL);
            $saveFileIfExists('cv', ApplicationFileType::CV);

            return redirect()->route('pemohon.usulan.index')
                ->with('success', 'Usulan magang berhasil dikirim. Silakan tunggu verifikasi.');
        });
    }
}
