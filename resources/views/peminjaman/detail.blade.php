<?php
use Carbon\Carbon;
?>
@extends('layouts.app')
@section('content')
<style>
    .btn-custom{
        background-color: #FF8080;
}
.btn-custom:hover{
    background-color: #22668D;
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
                    <div class="mt-3 d-flex justify-content-between">
                            <h4 class="card-title">Detail Peminjaman</h4>
                            <a href="{{ route('borrowings.index') }}" class="btn btn-info">Kembali</a>
                        </div>


                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="text-center">
                                <img src="{{ $borrowing->user->photo ? asset('storage/' . $borrowing->user->photo) : asset('assets/img/profil/ppp.png') }}"

                                     class="img-fluid rounded mb-3"
                                     alt="Foto Profil"
                                     style="max-width: 250px; object-fit: cover;">

                                <h2 class="fw-bold mb-2">{{$borrowing->user->name  }}</h2>

                                <div class="text-center">
                                    <span class="badge
                                        @if ($borrowing->status == 'Dipinjam')
                                            bg-warning text-dark
                                        @elseif ($borrowing->status == 'Dikembalikan')
                                            bg-success text-white
                                        @endif">
                                        {{ $borrowing->status }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">

                                    <div class="row">
                                        <div class="col-sm-3">
                                          <h6 class="mb-0">Nama Peminjam</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                          {{ $borrowing->user->name  }}
                                        </div>
                                      </div>
                                      <hr>
                                      <div class="row">
                                        <div class="col-sm-3">
                                          <h6 class="mb-0">No Telp</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                          {{ $borrowing->user->no_hp  }}
                                        </div>
                                      </div>
                                      <hr>
                                      <div class="row">
                                        <div class="col-sm-3">
                                          <h6 class="mb-0">Buku Yang Dipinjam</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                          {{ $borrowing->book->title  }}
                                        </div>
                                      </div>
                                      <hr>
                                      <div class="row">
                                        <div class="col-sm-3">
                                          <h6 class="mb-0">Tanggal Pinjam</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            @if($borrowing->returned_at == null && Carbon::parse($borrowing->due_date)->startOfDay() < Carbon::now()->startOfDay())
                                                <span class="badge bg-danger">{{ $borrowing->borrowed_at }}</span>
                                            @else
                                                {{ $borrowing->borrowed_at }}
                                            @endif
                                        </div>
                                      </div>
                                      <hr>
                                      <div class="row">
                                        <div class="col-sm-3">
                                          <h6 class="mb-0">Tanggal Kembali</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            @if($borrowing->returned_at == null && Carbon::parse($borrowing->due_date)->startOfDay() < Carbon::now()->startOfDay())
                                            <span class="badge bg-danger">{{ $borrowing->borrowed_at }}</span>
                                        @else
                                            {{ $borrowing->due_date }}
                                        @endif
                                        </div>
                                      </div>
                                      <hr>
                                      <div class="row">
                                        <div class="col-sm-3">
                                          <h6 class="mb-0">Tanggal Dikembalikan</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            @if ($borrowing->returned_at == null)
                                                Belum dikembalikan, <a href="{{ route('borrowings.edit', $borrowing->id) }}" class="btn btn-custom btn-sm" style="color: #FFFFFF !important;">Kembalikan <br>Sekarang</a>
                                            @else
                                            {{ $borrowing->returned_at }}
                                            @endif

                                        </div>
                                      </div>
                                      <hr>
                                      <div class="row">
                                        <div class="col-sm-3">
                                          <h6 class="mb-0">Status</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <span class="badge
                                            @if ($borrowing->status == 'Dipinjam')
                                                bg-warning text-dark
                                            @elseif ($borrowing->status == 'Dikembalikan')
                                                bg-success text-white
                                            @endif">
                                            {{ $borrowing->status }}
                                        </span>

                                        </div>
                                      </div>

                                </div>



                    </div>



                </div>
            </div>
        </div>

    </div>
    </div>
    </div>






    @endsection
