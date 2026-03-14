<?php
use Carbon\Carbon;
?>
@extends('layouts.app')
@section('content')
@php
    $baseUrl = rtrim(request()->getBaseUrl(), '/');
@endphp
    <style>
        .btn-custom {
            background-color: #FF8080;
        }

        .btn-custom:hover {
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
                        <h4 class="card-title">Data Anggota</h4>
                        <a href="{{ route('users.index') }}" class="btn btn-info">Kembali</a>
                    </div>


                </div>
                <div class="card-body d-flex justify-content-center align-items-center">
                    <div>
                        <div class="text-center">
                            <img src="{{ isset($user->photo) ? ($baseUrl.'/storage/'.$user->photo) : ($baseUrl.'/assets/img/profil/ppp.png') }}"
                                class="img-fluid rounded mb-3" alt="Foto Profil"
                                style="max-width: 250px; object-fit: cover;">
                            <h2 class="fw-bold mb-2">{{ $user->name }}</h2>
                        </div>
                        <hr>
                        
                        <div class="text-center">
                            <h6 class="mb-0">Jenis Kelamin : {{ $user->jenis_kelamin }}</h6>
                        </div>
                        <div class="text-center">
                            <h6 class="mb-0">No Telp : {{ $user->no_hp }}</h6>
                        </div>
                        <div class="text-center">
                            <h6 class="mb-0">Email : {{ $user->email }}</h6>
                        </div>
                        <div class="text-center">
                            <h6 class="mb-0">Alamat : {{ $user->alamat }}</h6>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
@endsection
