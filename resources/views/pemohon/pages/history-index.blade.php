@extends('pemohon.layouts.app')

@section('content')
@php
    use App\Enums\ApplicationStatus;

    $statusLabel = fn ($status) => match ($status) {
        ApplicationStatus::DIPROSES->value => 'DIPROSES',
        ApplicationStatus::DISETUJUI->value => 'DISETUJUI',
        ApplicationStatus::DITOLAK->value => 'DITOLAK',
        ApplicationStatus::SELESAI->value => 'SELESAI',
        default => strtoupper((string) $status),
    };

    $statusPill = function ($status) use ($statusLabel) {
        $label = $statusLabel($status);

        return match ($status) {
            ApplicationStatus::DIPROSES->value => '<span class="pill" style="background:#fef3c7;color:#92400e;">'.$label.'</span>',
            ApplicationStatus::DISETUJUI->value => '<span class="pill" style="background:#dcfce7;color:#166534;">'.$label.'</span>',
            ApplicationStatus::DITOLAK->value => '<span class="pill" style="background:#fee2e2;color:#991b1b;">'.$label.'</span>',
            ApplicationStatus::SELESAI->value => '<span class="pill" style="background:#e0e7ff;color:#3730a3;">'.$label.'</span>',
            default => '<span class="pill">'.$label.'</span>',
        };
    };
@endphp

<div class="app-main">
    <h1 class="page-title">Riwayat Permohonan</h1>
    <p class="page-desc">Daftar semua permohonan magang yang pernah Anda ajukan.</p>

    <div class="card2">
        @if($applications->isEmpty())
            <div class="empty-state">
                <p class="muted">Belum ada riwayat permohonan.</p>
                <a href="{{ route('pemohon.usulan.index') }}" class="btn-primary2" style="margin-top: 10px; display: inline-block;">Ajukan Sekarang</a>
            </div>
        @else
            <div class="table-responsive">
                <table class="table" style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="text-align: left; border-bottom: 2px solid #eee;">
                            <th style="padding: 12px;">OPD Tujuan</th>
                            <th style="padding: 12px;">Tanggal Pengajuan</th>
                            <th style="padding: 12px;">Periode Magang</th>
                            <th style="padding: 12px;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($applications as $app)
                            <tr style="border-bottom: 1px solid #eee;">
                                <td style="padding: 12px;">
                                    <strong>{{ $app->opd->nama ?? '-' }}</strong>
                                    <br>
                                    <small class="muted">{{ $app->institusi }}</small>
                                </td>
                                <td style="padding: 12px;">
                                    {{ $app->created_at->format('d M Y') }}
                                </td>
                                <td style="padding: 12px;">
                                    {{ $app->tanggal_mulai->format('d M Y') }} <br> s.d <br> {{ $app->tanggal_selesai->format('d M Y') }}
                                </td>
                                <td style="padding: 12px;">
                                    {!! $statusPill($app->status) !!}
                                    @if($app->status === ApplicationStatus::DITOLAK->value && $app->alasan_penolakan)
                                        <br>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection
