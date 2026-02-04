<?php

namespace App\Http\Controllers\Pemohon;

use App\Http\Controllers\Controller;
use App\Models\ApplicationFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class ApplicationFileController extends Controller
{
    public function download(ApplicationFile $file)
    {
        $file->loadMissing('application');

        $userId = Auth::id();
        if (!$file->application || $file->application->user_id !== $userId) {
            abort(403, "Anda tidak punya akses download file ini.");
        }

        if (!$file->path || !Storage::disk('public')->exists($file->path)) {
            abort(404, "File tidak ditemukan.");
        }

        $downloadName = $file->original_name ?: basename($file->path);
        $filePath = Storage::disk('public')->path($file->path);

        return Response::download($filePath, $downloadName);
    }
}
