@extends('layouts.app')

@section('content')
@php
$baseUrl = rtrim(request()->getBaseUrl(), '/');
@endphp
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title mb-0">{{ $title }}</h4>
                        <div class="card-tools">
                            <a href="{{ route('users.index') }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <!-- Personal Information -->
                            <div class="col-md-6">
                                <h5 class="mb-3 text-primary">Informasi Pribadi</h5>

                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label for="statusnextstep" class="form-label">Status Next Step <span
                                                class="text-danger">*</span></label>
                                        <select class="form-select @error('statusnextstep') is-invalid @enderror"
                                            id="statusnextstep" name="statusnextstep" required>
                                            <option value="">Pilih status next step</option>
                                            <option value="new" {{ old('statusnextstep', $user->statusnextstep) == 'new'
                                                ? 'selected' : '' }}>New</option>
                                            <option value="plant" {{ old('statusnextstep', $user->statusnextstep) ==
                                                'plant' ? 'selected' : '' }}>Plant</option>
                                            <option value="grow" {{ old('statusnextstep', $user->statusnextstep) ==
                                                'grow-1' ? 'selected' : '' }}>Grow - Grade 1</option>
                                            <option value="grow" {{ old('statusnextstep', $user->statusnextstep) ==
                                                'grow-2' ? 'selected' : '' }}>Grow - Grade 2</option>
                                            <option value="grow" {{ old('statusnextstep', $user->statusnextstep) ==
                                                'grow-3' ? 'selected' : '' }}>Grow - Grade 3</option>
                                            <option value="fruitfull" {{ old('statusnextstep', $user->statusnextstep) ==
                                                'fruitfull' ? 'selected' : '' }}>Fruitfull</option>
                                        </select>
                                        @error('statusnextstep')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <label for="name" class="form-label">Nama Lengkap <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ old('name', $user->name) }}"
                                        placeholder="Masukkan nama lengkap" required>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email <span
                                            class="text-danger">*</span></label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{ old('email', $user->email) }}"
                                        placeholder="contoh@email.com" required>
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="no_hp" class="form-label">Nomor Telepon <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('no_hp') is-invalid @enderror"
                                        id="no_hp" name="no_hp" value="{{ old('no_hp', $user->no_hp) }}"
                                        placeholder="08xxxxxxxxxx" required>
                                    @error('no_hp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin <span
                                            class="text-danger">*</span></label>
                                    <select name="jenis_kelamin" id="jenis_kelamin"
                                        class="form-select @error('jenis_kelamin') is-invalid @enderror" required>
                                        <option value="">Pilih jenis kelamin</option>
                                        <option value="laki-laki" {{ old('jenis_kelamin', $user->jenis_kelamin) ==
                                            'laki-laki' ? 'selected' : '' }}>
                                            Laki-laki
                                        </option>
                                        <option value="perempuan" {{ old('jenis_kelamin', $user->jenis_kelamin) ==
                                            'perempuan' ? 'selected' : '' }}>
                                            Perempuan
                                        </option>
                                    </select>
                                    @error('jenis_kelamin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                                        name="alamat" rows="3" placeholder="Masukkan alamat lengkap"
                                        required>{{ old('alamat', $user->alamat) }}</textarea>
                                    @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Account Information -->
                            <div class="col-md-6">
                                <h5 class="mb-3 text-primary">Informasi Akun</h5>

                                <div class="mb-3">
                                    <label for="statusanggota" class="form-label">Status Anggota <span
                                            class="text-danger">*</span></label>
                                    <select name="statusanggota" id="statusanggota"
                                        class="form-select @error('statusanggota') is-invalid @enderror" required>
                                        <option value="">Pilih status anggota</option>
                                        <option value="belum" {{ old('statusanggota', $user->statusanggota) == 'belum' ?
                                            'selected' : '' }}>
                                            Belum Tergabung
                                        </option>
                                        <option value="Core Team" {{ old('statusanggota', $user->statusanggota) == 'Core
                                            Team' ? 'selected' : '' }}>
                                            Core Team
                                        </option>
                                        <option value="DM" {{ old('statusanggota', $user->statusanggota) == 'DM' ?
                                            'selected' : '' }}>
                                            Disciples Maker
                                        </option>
                                    </select>
                                    @error('statusanggota')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="role" class="form-label">Role <span class="text-danger">*</span></label>
                                    <select class="form-select @error('role') is-invalid @enderror" id="role"
                                        name="role" required>
                                        <option value="">Pilih role</option>
                                        <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : ''
                                            }}>
                                            Administrator
                                        </option>
                                        <option value="member" {{ old('role', $user->role) == 'member' ? 'selected' : ''
                                            }}>
                                            Member
                                        </option>
                                    </select>
                                    @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="status" class="form-label">Status Pengguna <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select @error('status') is-invalid @enderror" id="status"
                                        name="status" required>
                                        <option value="">Pilih status</option>
                                        <option value="active" {{ old('status', $user->status ?? 'active') == 'active' ?
                                            'selected' : '' }}>
                                            Aktif
                                        </option>
                                        <option value="inactive" {{ old('status', $user->status ?? 'active') ==
                                            'inactive' ? 'selected' : '' }}>
                                            Tidak Aktif
                                        </option>
                                        <option value="suspended" {{ old('status', $user->status ?? 'active') ==
                                            'suspended' ? 'selected' : '' }}>
                                            Ditangguhkan
                                        </option>
                                    </select>
                                    @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="photo" class="form-label">Foto Profil</label>
                                    <input type="file" class="form-control @error('photo') is-invalid @enderror"
                                        id="photo" name="photo" accept="image/*">
                                    <div class="form-text">Format yang didukung: JPG, PNG, GIF. Maksimal 2MB.</div>
                                    @error('photo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                @if($user->photo)
                                <div class="mb-3">
                                    <label class="form-label">Foto Saat Ini</label>
                                    <div class="border rounded p-2">
                                        <img src="{{ $baseUrl }}/storage/{{ $user->photo }}"
                                            alt="Foto profil {{ $user->name }}" class="img-thumbnail"
                                            style="max-width: 200px; height: auto;">
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>

                        <hr class="my-4">

                        <!-- Form Actions -->
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('users.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection