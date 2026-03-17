@extends('layouts.app')

@section('content')
@php
    $baseUrl = rtrim(request()->getBaseUrl(), '/');
@endphp
<style>
    .glass-card { background: rgba(255,255,255,0.7); border-radius: 24px; box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15); backdrop-filter: blur(8px); border: 1.5px solid rgba(200, 200, 255, 0.18); overflow: hidden; }
    .solid-header { background: #10b981; color: #fff; border-bottom: none; box-shadow: 0 2px 12px 0 rgba(16,185,129,0.12); }
    .solid-title { color: #fff; font-weight: 700; font-size: 1.7rem; letter-spacing: 1px; }
    .table-glass thead th { background: #d1fae5; color: #047857; border: none; font-weight: 600; font-size: 1.05rem; }
    .table-glass tbody tr { transition: background 0.2s; }
    .table-glass tbody tr:hover { background: rgba(16, 185, 129, 0.07); }
    .badge-pending  { background: #ffe5ec; color: #b5179e; font-weight: 600; border-radius: 12px; padding: 6px 16px; font-size: 0.95em; }
    .badge-approved { background: #e0f7fa; color: #0077b6; font-weight: 600; border-radius: 12px; padding: 6px 16px; font-size: 0.95em; }
    .badge-rejected { background: #ffe0e0; color: #d90429; font-weight: 600; border-radius: 12px; padding: 6px 16px; font-size: 0.95em; }
    .badge-other    { background: #f3f0ff; color: #5f5aad; font-weight: 600; border-radius: 12px; padding: 6px 16px; font-size: 0.95em; }
    .user-avatar-mini { width: 32px; height: 32px; border-radius: 50%; object-fit: cover; border: 2px solid #10b981; margin-right: 8px; box-shadow: 0 2px 8px rgba(16,185,129,0.15); }
    .btn-approve { background: #10b981; border: none; color: white; padding: 6px 16px; border-radius: 8px; font-size: 0.85em; transition: all 0.2s; }
    .btn-approve:hover { background: #059669; transform: translateY(-1px); }
    .btn-reject  { background: #ef4444; border: none; color: white; padding: 6px 16px; border-radius: 8px; font-size: 0.85em; transition: all 0.2s; }
    .btn-reject:hover { background: #dc2626; transform: translateY(-1px); }
    .new-user-badge {
        position: absolute; top: -8px; right: -8px;
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        color: white; font-size: 0.7rem; font-weight: 700;
        padding: 3px 8px; border-radius: 12px;
        box-shadow: 0 2px 8px rgba(239,68,68,0.3);
        animation: pulse-new 2s infinite;
        z-index: 10; min-width: 35px; text-align: center; letter-spacing: 0.5px;
    }
    .user-info-container { position: relative; display: inline-block; }
    @keyframes pulse-new {
        0%   { transform: scale(1);   box-shadow: 0 2px 8px rgba(239,68,68,0.3); }
        50%  { transform: scale(1.1); box-shadow: 0 4px 16px rgba(239,68,68,0.4); }
        100% { transform: scale(1);   box-shadow: 0 2px 8px rgba(239,68,68,0.3); }
    }
</style>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="glass-card">
                <div class="solid-header p-4 d-flex align-items-center gap-2">
                    <i class="fas fa-seedling fa-lg"></i>
                    <span class="solid-title">Permintaan Akses Grade 3 - The Eternity</span>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-glass align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama User</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($requests as $i => $req)
                                <tr>
                                    <td class="fw-bold">{{ $i + 1 }}</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="user-info-container">
                                                @if($req->user && $req->user->photo)
                                                    <img src="{{ $baseUrl }}/storage/{{ $req->user->photo }}" class="user-avatar-mini" alt="User">
                                                @else
                                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($req->user->name ?? '-') }}&background=10b981&color=fff&size=64" class="user-avatar-mini" alt="User">
                                                @endif
                                                @php
                                                    $isNew = $req->created_at->diffInHours(now()) <= 24 && $req->status === 'pending';
                                                @endphp
                                                @if($isNew)
                                                    <div class="new-user-badge">BARU</div>
                                                @endif
                                            </div>
                                            <span class="fw-semibold">{{ $req->user->name ?? '-' }}</span>
                                        </div>
                                    </td>
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
                                            <form method="POST" action="{{ route('admin.grade3-requests.approve', $req->id) }}" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn-approve"
                                                    onclick="return confirm('Setujui permintaan akses ini?')">
                                                    <i class="fas fa-check me-1"></i>Approve
                                                </button>
                                            </form>
                                            <form method="POST" action="{{ route('admin.grade3-requests.reject', $req->id) }}" class="d-inline ms-1">
                                                @csrf
                                                <button type="submit" class="btn-reject"
                                                    onclick="return confirm('Tolak permintaan akses ini?')">
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
                                    <td colspan="5" class="text-center text-muted py-4">
                                        <i class="fas fa-inbox fa-2x mb-2 d-block opacity-50"></i>
                                        Belum ada permintaan akses.
                                    </td>
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