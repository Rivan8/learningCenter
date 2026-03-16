@extends('layouts.app')
@section('content')
    <div class="page-category">
        <div class="col-md-12">

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>



    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Statistik Progres Video -->
    <div class="row" style="margin-top: 80px;">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Statistik Progres Video Why</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <a href="{{ route('users.index', ['sort_by' => request('sort_by')]) }}" class="text-decoration-none">
                                <div class="card bg-success text-white">
                                    <div class="card-body">
                                        <h5 class="card-title">Disciple Maker (DM)</h5>
                                        <h3>{{ $dmCount }} <small>user</small></h3>
                                        <div class="progress" style="height: 10px;">
                                            <div class="progress-bar bg-white" role="progressbar" style="width: {{ $dmPercentage }}%;" aria-valuenow="{{ $dmPercentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <small>{{ $dmPercentage }}% dari total user</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('users.index', ['sort_by' => request('sort_by')]) }}" class="text-decoration-none">
                                <div class="card bg-info text-white">
                                    <div class="card-body">
                                        <h5 class="card-title">Core Team</h5>
                                        <h3>{{ $coreTeamCount }} <small>user</small></h3>
                                        <div class="progress" style="height: 10px;">
                                            <div class="progress-bar bg-white" role="progressbar" style="width: {{ $coreTeamPercentage }}%;" aria-valuenow="{{ $coreTeamPercentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <small>{{ $coreTeamPercentage }}% dari total user</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('users.index', ['progress_filter' => 'not_started', 'sort_by' => request('sort_by')]) }}" class="text-decoration-none">
                                <div class="card bg-danger text-white">
                                    <div class="card-body">
                                        <h5 class="card-title">Belum Mulai (0%)</h5>
                                        <h3>{{ $notStartedCount }} <small>user</small></h3>
                                        <div class="progress" style="height: 10px;">
                                            <div class="progress-bar bg-white" role="progressbar" style="width: {{ $notStartedPercentage }}%;" aria-valuenow="{{ $notStartedPercentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <small>{{ $notStartedPercentage }}% dari total user</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('users.index', ['sort_by' => request('sort_by')]) }}" class="text-decoration-none">
                                <div class="card bg-secondary text-white">
                                    <div class="card-body">
                                        <h5 class="card-title">Total User</h5>
                                        <h3>{{ $totalUsers }} <small>user</small></h3>
                                        <p>Rata-rata progres: 
                                            @php
                                                $avgProgress = 0;
                                                if($totalUsers > 0) {
                                                    $totalProgress = 0;
                                                    foreach($users as $u) {
                                                        $totalProgress += $u->why_video_progress;
                                                    }
                                                    $avgProgress = round($totalProgress / $totalUsers);
                                                }
                                            @endphp
                                            {{ $avgProgress }}%
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card"> <!-- Tambahkan margin bottom -->
        <div class="card-header" > <!-- Tambahkan padding top -->
            <div class="d-flex align-items-center">
                <h4 class="card-title">User</h4>
                
                <div class="ms-auto d-flex">
                    <div class="dropdown me-2">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-filter"></i> Filter Progres
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="filterDropdown">
                            <li><a class="dropdown-item {{ request('progress_filter') == '' ? 'active' : '' }}" href="{{ route('users.index', ['sort_by' => request('sort_by')]) }}">Semua</a></li>
                            <li><a class="dropdown-item {{ request('progress_filter') == 'completed' ? 'active' : '' }}" href="{{ route('users.index', ['progress_filter' => 'completed', 'sort_by' => request('sort_by')]) }}">Selesai (100%)</a></li>
                            <li><a class="dropdown-item {{ request('progress_filter') == 'in_progress' ? 'active' : '' }}" href="{{ route('users.index', ['progress_filter' => 'in_progress', 'sort_by' => request('sort_by')]) }}">Sedang Berjalan</a></li>
                            <li><a class="dropdown-item {{ request('progress_filter') == 'not_started' ? 'active' : '' }}" href="{{ route('users.index', ['progress_filter' => 'not_started', 'sort_by' => request('sort_by')]) }}">Belum Mulai (0%)</a></li>
                        </ul>
                    </div>
                    
                    <div class="dropdown me-2">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-sort"></i> Urutkan Progres
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="sortDropdown">
                            <li><a class="dropdown-item {{ request('sort_by') == '' ? 'active' : '' }}" href="{{ route('users.index', ['progress_filter' => request('progress_filter')]) }}">Default</a></li>
                            <li><a class="dropdown-item {{ request('sort_by') == 'progress_asc' ? 'active' : '' }}" href="{{ route('users.index', ['sort_by' => 'progress_asc', 'progress_filter' => request('progress_filter')]) }}">Progres Terendah</a></li>
                            <li><a class="dropdown-item {{ request('sort_by') == 'progress_desc' ? 'active' : '' }}" href="{{ route('users.index', ['sort_by' => 'progress_desc', 'progress_filter' => request('progress_filter')]) }}">Progres Tertinggi</a></li>
                        </ul>
                    </div>
                    
                    <button class="btn btn-info text-white me-2" onclick="showAllVideoProgress()">
                        <i class="fa fa-chart-bar"></i> Lihat Semua Progres
                    </button>
                    
                    <button class="btn btn-primary btn-round" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fa fa-plus"></i>
                        Tambah Data
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if(request('progress_filter'))
                <div class="alert alert-info">
                    @php
                        $filterText = '';
                        if(request('progress_filter') == 'completed') {
                            $filterText = 'yang telah menyelesaikan (100%)'; 
                        } elseif(request('progress_filter') == 'in_progress') {
                            $filterText = 'yang sedang dalam proses menonton';
                        } elseif(request('progress_filter') == 'not_started') {
                            $filterText = 'yang belum mulai menonton (0%)';
                        }
                    @endphp
                    Menampilkan {{ $users->count() }} user {{ $filterText }} video Why
                </div>
            @endif
            <div class="table-responsive">
                <table id="basic-datatables" class="display table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Status <br>Anggota</th>
                            <th>Email</th>
                            <th>No Telp</th>
                            <th>Role</th>
                            <th>Progres Video Why</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><a href="{{ route('users.detail', $user->id) }}">{{ $user->name }}</a></td>
                                <td>
                                    @if ($user->statusanggota == 'DM')
                                    <span class="badge" style="background-color: #8e44ad; color: #fff;">Disciples Maker</span>
                                    @else
                                        <span class="badge bg-info">Core Team</span>
                                    @endif
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->no_hp }}</td>
                                <td>
                                    @if ($user->role == 'admin')
                                        <span class="badge bg-primary">Admin</span>
                                    @else
                                        <span class="badge bg-success">Member</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="progress" style="height: 15px; cursor: pointer;" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $user->name }} telah menonton {{ $user->why_video_progress }}% dari video Why" onclick="showVideoProgressDetail({{ $user->id }}, '{{ $user->name }}', {{ $user->why_video_progress }})">
                                        @php
                                            $progressClass = 'bg-danger';
                                            $progressText = $user->why_video_progress . '%';
                                            
                                            if ($user->why_video_progress >= 100) {
                                                $progressClass = 'bg-success';
                                                $progressText = 'Selesai';
                                            } elseif ($user->why_video_progress >= 50) {
                                                $progressClass = 'bg-info';
                                            } elseif ($user->why_video_progress >= 25) {
                                                $progressClass = 'bg-warning';
                                            }
                                        @endphp
                                        <div class="progress-bar {{ $progressClass }}" 
                                             role="progressbar" 
                                             style="width: {{ $user->why_video_progress }}%;" 
                                             aria-valuenow="{{ $user->why_video_progress }}" 
                                             aria-valuemin="0" 
                                             aria-valuemax="100">
                                            {{ $progressText }}
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus pengguna ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>












    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Users</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="no_hp" class="form-label">No Telp</label>
                            <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp"
                                name="no_hp" value="{{ old('no_hp') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select class="form-select @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin"
                                required>
                                <option value="">Pilih Jenis Kelamin</option>
                               <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                                name="alamat" value="{{ old('alamat') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>




                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select @error('role') is-invalid @enderror" id="role" name="role"
                                required>
                                <option value="">Pilih Role</option>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="member" {{ old('role') == 'member' ? 'selected' : '' }}>Member</option>
                            </select>
                            @error('role')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="photo" class="form-label">Gambar</label>
                            <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo"
                                name="photo" accept="image/*">

                            @error('photo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Inisialisasi tooltip Bootstrap
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    });
    
    function showVideoProgressDetail(userId, userName, progress) {
        $('#videoProgressDetailTitle').text('Detail Progres Video ' + userName);
        $('#videoProgressDetailBody').html(`
            <div class="text-center mb-3">
                <h4>${userName}</h4>
                <div class="progress mb-3" style="height: 25px;">
                    <div class="progress-bar ${progress >= 100 ? 'bg-success' : (progress >= 50 ? 'bg-info' : (progress >= 25 ? 'bg-warning' : 'bg-danger'))}" 
                        role="progressbar" 
                        style="width: ${progress}%;" 
                        aria-valuenow="${progress}" 
                        aria-valuemin="0" 
                        aria-valuemax="100">
                        ${progress >= 100 ? 'Selesai' : progress + '%'}
                    </div>
                </div>
                <p class="lead">${progress}% dari total video Why telah ditonton</p>
                <p>${progress >= 100 ? '<span class="badge bg-success">Selesai</span>' : 
                    (progress > 0 ? '<span class="badge bg-info">Sedang Berjalan</span>' : 
                    '<span class="badge bg-danger">Belum Mulai</span>')}</p>
            </div>
        `);
        $('#videoProgressDetailModal').modal('show');
    }
    
    function showAllVideoProgress() {
        let allProgressHtml = '<div class="table-responsive"><table class="table table-striped table-hover"><thead><tr><th>Nama</th><th>Progres</th><th>Status</th></tr></thead><tbody>';
        
        @foreach($users as $user)
            allProgressHtml += '<tr>' +
                '<td>{{ $user->name }}</td>' +
                '<td>' +
                    '<div class="progress" style="height: 20px;">' +
                        '<div class="progress-bar {{ $user->why_video_progress >= 100 ? 'bg-success' : ($user->why_video_progress >= 50 ? 'bg-info' : ($user->why_video_progress >= 25 ? 'bg-warning' : 'bg-danger')) }}" ' +
                            'role="progressbar" ' +
                            'style="width: {{ $user->why_video_progress }}%;" ' +
                            'aria-valuenow="{{ $user->why_video_progress }}" ' +
                            'aria-valuemin="0" ' +
                            'aria-valuemax="100">' +
                            '{{ $user->why_video_progress >= 100 ? 'Selesai' : $user->why_video_progress . '%' }}' +
                        '</div>' +
                    '</div>' +
                '</td>' +
                '<td>' +
                    '{{ $user->why_video_progress >= 100 ? '<span class="badge bg-success">Selesai</span>' : 
                      ($user->why_video_progress > 0 ? '<span class="badge bg-info">Sedang Berjalan</span>' : 
                      '<span class="badge bg-danger">Belum Mulai</span>') }}' +
                '</td>' +
            '</tr>';
        @endforeach
        
        allProgressHtml += '</tbody></table></div>';
        
        $('#allVideoProgressTitle').text('Progres Video Why Semua User');
        $('#allVideoProgressBody').html(allProgressHtml);
        $('#allVideoProgressModal').modal('show');
    }
</script>

<!-- Modal Detail Progres Video -->
<div class="modal fade" id="videoProgressDetailModal" tabindex="-1" aria-labelledby="videoProgressDetailTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="videoProgressDetailTitle">Detail Progres Video</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="videoProgressDetailBody">
                <!-- Content will be filled by JavaScript -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endsection
