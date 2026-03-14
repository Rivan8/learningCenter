

@extends('layouts.app')
@section('content')
<?php
use Carbon\Carbon;
?>

<style>
    .nama a {
        color: #ff6b6b;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        font-weight: 600;
    }

    .nama a:hover {
        color: darkblue;
        /* Warna saat di-hover */
        text-decoration: underline;
    }

    .btn-tombol {
        background-color: #1a535c !important;
        color: #f7fff7 !important;
    }

    .btn-tombol:hover {
        background-color: #f7fff7 !important;
        color: #1a535c !important;
    }

    .btn-custom {
        background-color: #ff6b6b !important;
        color: white !important;
    }

    .btn-custom1 {
        background-color: #1a535c !important;
        color: white !important;
    }
</style>
    <div class="page-category">
        <div class="col-md-12">

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Basic</h4>


                        <div class="card-tools">
                            <a href="{{ route('generate.pdf') }}" class="btn btn-label-success btn-round btn-sm me-2"
                                target="_blank">
                                <span class="btn-label">
                                    <i class="fa fa-pencil"></i>
                                </span>
                                Export
                            </a>
                            <a href="{{ route('lihat.pdf') }}" class="btn btn-label-info btn-round btn-sm" target="_blank">
                                <span class="btn-label">
                                    <i class="fa fa-print"></i>
                                </span>
                                Print
                            </a>
                        </div>



                        <button class="btn btn-tombol btn-round ms-auto" data-bs-toggle="modal"
                            data-bs-target="#tambahModal">
                            <i class="fa fa-plus"></i>
                            Tambah Data
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">#</th>
                                    <th style="width: 15%;">Nama Peminjam</th>
                                    <th style="width: 20%;">Judul Buku</th>
                                    <th style="width: 10%;">Tgl Pinjam</th>
                                    <th style="width: 10%;">Tgl Kembali</th>
                                    <th style="width: 15%;">Tgl Dikembalikan</th>
                                    <th style="width: 7%;">Status</th>
                                    <th style="width: 5%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($borrowings as $borrowing)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="nama"><a
                                                href="{{ route('borrowings.detail', $borrowing->id) }}">{{ $borrowing->user->name }}</a>
                                        </td>
                                        <td>{{ $borrowing->book->title }} <div style="color: #ff6b6b; font-weight: bold; font-size: 12px;">[{{ $borrowing->book->kode_buku }}]</div> </td>
                                        <td>
                                            @if ($borrowing->returned_at == null && Carbon::parse($borrowing->due_date)->startOfDay() < Carbon::now()->startOfDay())
                                                <span class="badge bg-danger">{{ $borrowing->borrowed_at }}</span>
                                            @else
                                                {{ $borrowing->borrowed_at }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($borrowing->returned_at == null && Carbon::parse($borrowing->due_date)->startOfDay() < Carbon::now()->startOfDay())
                                                <span class="badge bg-danger">{{ $borrowing->due_date }}</span>
                                            @else
                                                {{ $borrowing->due_date }}
                                            @endif
                                        </td>


                                        <td>
                                            @if ($borrowing->returned_at)
                                                {{ $borrowing->returned_at }}
                                            @elseif(Carbon::parse($borrowing->due_date)->startOfDay() < Carbon::now()->startOfDay())
                                                <span class="badge bg-danger">Sudah Lewat Jatuh Tempo</span>
                                            @else
                                                {{ floor(now()->diffInDays(Carbon::parse($borrowing->due_date))) . ' hari lagi' }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($borrowing->status == 'Dipinjam')
                                                <span class="badge bg-warning text-dark">{{ $borrowing->status }}</span>
                                            @else
                                                <span class="badge bg-success">{{ $borrowing->status }}</span>
                                            @endif
                                        </td>

                                        <td>
                                            @if ($borrowing->status != 'Dikembalikan')
                                                <div class="d-flex justify-content-between">
                                                    <a href="{{ route('borrowings.edit', $borrowing->id) }}"
                                                        class="btn btn-custom1 btn-sm me-1 "><i class="fas fa-edit"></i></a>

                                                    <form action="{{ route('borrowings.destroy', $borrowing->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Yakin ingin menghapus peminjaman ini?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-custom btn-sm ms-1"><i
                                                                class="fa fa-trash"></i></button>

                                                    </form>
                                                </div>
                                            @endif
                                        </td>


                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>







            <!-- Button trigger modal -->

            <!-- Modal -->
            <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Peminjaman</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('borrowings.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="user_id" class="form-label">Nama Peminjam</label>
                                    <select class="form-select @error('user_id') is-invalid @enderror" id="user_id"
                                        name="user_id" required>
                                        <option value="">Pilih Nama Peminjam</option>
                                        @foreach ($users->reject(function ($user) {
                                return $user->role != 'member';}) as $user)
                                            <option value="{{ $user->id }}"
                                                {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="book_id" class="form-label">Judul Buku</label>
                                    <select class="form-select @error('book_id') is-invalid @enderror" id="book_id"
                                        name="book_id" required>
                                        <option value="">Pilih Buku</option>
                                        @foreach ($books as $book)
                                            <option value="{{ $book->id }}"
                                                {{ old('book_id') == $book->id ? 'selected' : '' }}>{{ $book->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('book_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="borrowed_at" class="form-label">Tanggal Pinjam</label>
                                    <input type="date" class="form-control @error('borrowed_at') is-invalid @enderror"
                                        id="borrowed_at" name="borrowed_at" value="{{ old('borrowed_at') }}" required>
                                    @error('borrowed_at')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="due_date" class="form-label">Tanggal Kembali</label>
                                    <input type="date" class="form-control @error('due_date') is-invalid @enderror"
                                        id="due_date" name="due_date" value="{{ old('due_date') }}" required>
                                    @error('due_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="returned_at" class="form-label">Tanggal Dikembalikan</label>
                                    <input type="date" class="form-control @error('returned_at') is-invalid @enderror"
                                        id="returned_at" name="returned_at" value="{{ old('returned_at') }}">
                                    @error('returned_at')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select @error('status') is-invalid @enderror" id="status"
                                        name="status" required>
                                        <option value="">Pilih Status</option>
                                        <option value="Dipinjam"
                                            {{ old('status', 'Dipinjam') == 'Dipinjam' ? 'selected' : '' }}>Dipinjam
                                        </option>
                                        <option value="Dikembalikan"
                                            {{ old('status', 'Dipinjam') == 'Dikembalikan' ? 'selected' : '' }}>
                                            Dikembalikan</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>



                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('borrowings.index') }}" class="btn btn-secondary">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </div>
</div>
</div>



@endsection
