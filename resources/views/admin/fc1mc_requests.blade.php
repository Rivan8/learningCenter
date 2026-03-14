@extends('layouts.app')

@section('content')
@php
    $baseUrl = rtrim(request()->getBaseUrl(), '/');
@endphp
<style>
    .glass-card { background: rgba(255,255,255,0.7); border-radius: 24px; box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15); backdrop-filter: blur(8px); border: 1.5px solid rgba(200, 200, 255, 0.18); overflow: hidden; }
    .solid-header { background: #7c3aed; color: #fff; border-bottom: none; box-shadow: 0 2px 12px 0 rgba(124,58,237,0.08); }
    .solid-title { color: #fff; font-weight: 700; font-size: 1.7rem; letter-spacing: 1px; }
    .table-glass thead th { background: #ede9fe; color: #5a189a; border: none; font-weight: 600; font-size: 1.05rem; }
    .table-glass tbody tr { transition: background 0.2s; }
    .table-glass tbody tr:hover { background: rgba(124, 58, 237, 0.08); }
    .badge-pending { background: #ffe5ec; color: #b5179e; font-weight: 600; border-radius: 12px; padding: 6px 16px; font-size: 0.95em; }
    .badge-approved { background: #e0f7fa; color: #0077b6; font-weight: 600; border-radius: 12px; padding: 6px 16px; font-size: 0.95em; }
    .badge-rejected { background: #ffe0e0; color: #d90429; font-weight: 600; border-radius: 12px; padding: 6px 16px; font-size: 0.95em; }
    .user-avatar-mini { width: 32px; height: 32px; border-radius: 50%; object-fit: cover; border: 2px solid #7c3aed; margin-right: 8px; box-shadow: 0 2px 8px rgba(124,58,237,0.12); }
    .btn-approve { background: #10b981; border: none; color: white; padding: 6px 16px; border-radius: 8px; font-size: 0.85em; transition: all 0.2s; }
    .btn-approve:hover { background: #059669; transform: translateY(-1px); }
    .btn-reject { background: #ef4444; border: none; color: white; padding: 6px 16px; border-radius: 8px; font-size: 0.85em; transition: all 0.2s; }
    .btn-reject:hover { background: #dc2626; transform: translateY(-1px); }
</style>

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="glass-card">
                <div class="solid-header p-4 d-flex align-items-center gap-2">
                    <i class="fas fa-envelope-open-text fa-lg"></i>
                    <span class="solid-title">Permintaan Akses FC1/MC</span>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-glass align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama User</th>
                                    <th>Kelas</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($requests as $i => $req)
                                <tr>
                                    <td class="fw-bold">{{ $i+1 }}</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            @php
                                                $photoRel = ltrim(optional($req->user)->photo ?? '', '/');
                                                $storagePath = $photoRel ? public_path('storage/'.$photoRel) : null;
                                                $publicPath = $photoRel ? public_path($photoRel) : null;
                                                $photoUrl = null;
                                                if ($storagePath && file_exists($storagePath)) {
                                                    $photoUrl = url('/storage/'.$photoRel);
                                                } elseif ($publicPath && file_exists($publicPath)) {
                                                    $photoUrl = url('/'.$photoRel);
                                                }
                                            @endphp
                                            @if($photoUrl)
                                                <img src="{{ $photoUrl }}" class="user-avatar-mini" alt="User">
                                            @else
                                                <img src="https://ui-avatars.com/api/?name={{ urlencode(optional($req->user)->name ?? '-') }}&background=7c3aed&color=fff&size=64" class="user-avatar-mini" alt="User">
                                            @endif
                                            <span class="fw-semibold">{{ optional($req->user)->name ?? '-' }}</span>
                                        </div>
                                    </td>
                                    <td>{{ $req->alasan }}</td>
                                    <td>
                                        @if($req->status === 'pending')
                                            <span class="badge-pending">Pending</span>
                                        @elseif($req->status === 'approved')
                                            <span class="badge-approved">Approved</span>
                                        @elseif($req->status === 'rejected')
                                            <span class="badge-rejected">Rejected</span>
                                        @else
                                            <span class="badge-other">{{ ucfirst($req->status) }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="text-muted">
                                            {{ $req->created_at ? $req->created_at->format('d-m-Y H:i') : '-' }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($req->status === 'pending')
                                            <form method="POST" action="{{ route('admin.fc1mc-requests.approve', $req->id) }}" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn-approve" onclick="return confirm('Apakah Anda yakin ingin menyetujui permintaan ini?')">
                                                    <i class="fas fa-check me-1"></i>Approve
                                                </button>
                                            </form>
                                            <form method="POST" action="{{ route('admin.fc1mc-requests.reject', $req->id) }}" class="d-inline ms-1">
                                                @csrf
                                                <button type="submit" class="btn-reject" onclick="return confirm('Apakah Anda yakin ingin menolak permintaan ini?')">
                                                    <i class="fas fa-times me-1"></i>Reject
                                                </button>
                                            </form>
                                        @else
                                            <span class="text-muted">Sudah diproses</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">Belum ada permintaan akses.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
