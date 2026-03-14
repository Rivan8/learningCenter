
@extends('layouts.app')

@section('content')

@php
  $assetBase = rtrim(request()->getBasePath(), '\/');
@endphp

<style>
    :root {
        --primary: #2a2f5b;
        --primary-light: #4f46e5;
        --primary-dark: #1e224c;
        --secondary: #6366f1;
        --accent: #818cf8;
        --success-color: #10b981;
        --warning-color: #f59e0b;
        --danger-color: #ef4444;
        --text-primary: #2a2f5b;
        --text-secondary: #4b5563;
        --bg-light: #f9fafb;
        --bg-white: #ffffff;
        --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        --shadow-md: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        --border-color: #e2e8f0;
    }

    body {
        background-color: var(--bg-light);
        color: var(--text-primary);
        font-family: 'Inter', 'Poppins', sans-serif;
    }

    .page-category {
        padding: 20px 0;
    }

    .btn-primary-custom {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
        border: none;
        color: white;
        font-weight: 500;
        padding: 0.5rem 1.5rem;
        border-radius: 0.5rem;
        box-shadow: 0 4px 6px rgba(42, 47, 91, 0.25);
        transition: all 0.3s ease;
    }

    .btn-primary-custom:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(42, 47, 91, 0.3);
        background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary) 100%);
        color: white;
    }

    .btn-outline-custom {
        background: transparent;
        border: 2px solid var(--primary);
        color: var(--primary);
        font-weight: 500;
        padding: 0.5rem 1.5rem;
        border-radius: 0.5rem;
        transition: all 0.3s ease;
    }

    .btn-outline-custom:hover {
        background-color: var(--primary);
        color: white;
        transform: translateY(-2px);
    }

    .card {
        border: none;
        transition: all 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-md);
    }

    .section-title {
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 0.5rem;
    }

    /* Tambahan CSS untuk icon-circle */
    .icon-circle {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .resource-link {
        transition: all 0.3s ease;
        text-decoration: none;
        color: var(--text-primary);
    }

    .resource-link:hover {
        transform: translateY(-2px);
        background-color: rgba(42, 47, 91, 0.1) !important;
    }

    .scripture-quote {
        border-left: 4px solid var(--primary-light);
    }

    .card-img-overlay {
        background-color: rgba(42, 47, 91, 0.7);
    }

    .section-divider {
        height: 4px;
        width: 60px;
        background: linear-gradient(135deg, #4f46e5 0%, #6366f1 100%);
        border-radius: 2px;
        margin-bottom: 2rem;
    }

    .time-date-card {
        background-color: var(--bg-white);
        border-radius: 1rem;
        box-shadow: var(--shadow-sm);
    }



    /* Styling for sortable columns */
    .sortable {
        cursor: pointer;
        position: relative;
    }

    .sortable:hover {
        background-color: #e9ecef;
    }

    .sortable i.fas {
        font-size: 0.8rem;
        margin-left: 5px;
        color: #adb5bd;
    }

    .sortable.asc i.fas {
        color: #0d6efd;
        transform: rotate(180deg);
    }

    .sortable.desc i.fas {
        color: #0d6efd;
    }
</style>

<!-- Hero Section with Modern Carousel -->
<div class="hero-section position-relative mb-5">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner rounded-4 shadow-lg overflow-hidden">
            <div class="carousel-item active">
                <img src="{{ $assetBase }}/assets/img/DcCollage.png" class="d-block w-100" alt="Disciples Community" style="height: 500px; object-fit: cover; filter: brightness(0.7);">
                <div class="carousel-caption d-none d-md-block text-start pb-5 mb-4">
                    <h1 class="display-4 fw-bold">ESC Equip - Foundation Class 1</h1>
                    <p class="lead">Keselamatan & Baptisan</p>
                    <button class="btn btn-primary-custom btn-lg mt-3">
                        <i class="fas fa-play-circle me-2"></i> Mulai Perjalanan
                    </button>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1519834785169-98be25ec3f84" class="d-block w-100" alt="Core Team Training" style="height: 500px; object-fit: cover; filter: brightness(0.7);">
                <div class="carousel-caption d-none d-md-block text-start pb-5 mb-4">
                    <h1 class="display-4 fw-bold">ESC Equip - Foundation Class 2</h1>
                    <p class="lead">Firman, Doa dan Komunitas</p>
                    <button class="btn btn-primary-custom btn-lg mt-3">
                        <i class="fas fa-book-open me-2"></i> Pelajari Materi
                    </button>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<script>
    function updateClock() {
        var now = new Date();
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var seconds = now.getSeconds();
        var day = now.getDate();
        var month = now.getMonth() + 1; // Months are zero-based
        var year = now.getFullYear();

        // Get day name
        var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        var dayName = days[now.getDay()];

        // Get month name
        var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        var monthName = months[now.getMonth()];

        // Format the time
        hours = hours < 10 ? '0' + hours : hours;
        minutes = minutes < 10 ? '0' + minutes : minutes;
        seconds = seconds < 10 ? '0' + seconds : seconds;

        // Display the time
        document.getElementById('clock').textContent = hours + ':' + minutes + ':' + seconds;
        document.getElementById('date').textContent = dayName + ', ' + day + ' ' + monthName + ' ' + year;

        // Update every second
        setTimeout(updateClock, 1000);
    }

    // Start the clock when the page loads
    document.addEventListener('DOMContentLoaded', function() {
        updateClock();
    });
</script>



<div class="page-category pt-0 mt-n3">
    <div class="row">
        <div class="col-md-12">
            <div class="time-date-card p-4 rounded-4 shadow-sm mb-2 bg-white">
                <div class="row align-items-center">
                    <div class="col-md-6 text-center text-md-start">
                        <h6 class="text-uppercase fw-bold text-primary-dark mb-1">Tanggal Hari Ini</h6>
                        <span id="date" class="fw-bold fs-5"></span>
                    </div>
                    <div class="col-md-6 text-center text-md-end mt-3 mt-md-0">
                        <h6 class="text-uppercase fw-bold text-primary-dark mb-1">Waktu Sekarang</h6>
                        <span id="clock" class="fw-bold fs-5"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 pt-4">
        <div class="container">
            <div class="page-inner">
                <div class="section-header mb-4">
                    <h2 class="section-title">Disciples Community <span class="text-primary-light">(DC)</span></h2>
                    <div class="section-divider"></div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <div class="row g-4 mt-4">
                            <div class="section-header mb-4">
                                <h2 class="section-title">Materi Pembelajaran</h2>
                                <div class="section-divider"></div>
                            </div>



                            <!-- Card Materi Pembelajaran Umum -->
                            <div class="col-md-6 col-12">
                                <div class="card h-100 shadow-sm rounded-4 overflow-hidden">
                                    <div class="position-relative">
                                        <img src="https://images.unsplash.com/photo-1501594907352-04cda38ebc29" class="card-img-top" alt="The Why" style="height: 200px; object-fit: cover;">
                                        <div class="card-img-overlay d-flex align-items-end" style="background: linear-gradient(to top, rgba(42, 47, 91, 0.8), transparent);">
                                            <h4 class="text-white fw-bold mb-3">Foundation Class 2</h4>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex flex-column justify-content-between p-4">
                                        <div>
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="icon-circle bg-primary-light me-3" style="width: 32px; height: 32px;">
                                                    <i class="fas fa-graduation-cap text-white small"></i>
                                                </div>
                                                <h5 class="card-title mb-0">Foundation Class 2</h5>
                                            </div>
                                            <p class="card-text">Foundation Class 1 merupakan langkah awal yang fundamental dalam perjalanan kekristenan. Kelas ini memberikan pemahaman teologis yang mendalam namun praktis mengenai Keselamatan—memahami anugerah Allah dan karya penebusan Kristus—serta signifikansi Baptisan Air sebagai tanda perjanjian dan proklamasi iman di hadapan publik. Peserta akan dibimbing untuk memiliki kepastian keselamatan (assurance of salvation) yang teguh.</p>
                                        </div>
                                        <button type="button" class="btn btn-primary-custom w-100 mt-3" data-bs-toggle="modal" data-bs-target="#modalFc2">
                                            <i class="fas fa-play-circle me-2"></i> Tonton Video
                                        </button>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="col-md-6 col-12">
                                <div class="card h-100 shadow-sm rounded-4 overflow-hidden">
                                    <div class="position-relative">
                                        <img src="https://images.unsplash.com/photo-1519834785169-98be25ec3f84" class="card-img-top" alt="The What" style="height: 200px; object-fit: cover;">
                                        <div class="card-img-overlay d-flex align-items-end" style="background: linear-gradient(to top, rgba(42, 47, 91, 0.8), transparent);">
                                            <h4 class="text-white fw-bold mb-3">Foundation Class 3</h4>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex flex-column justify-content-between p-4">
                                        <div>
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="icon-circle bg-primary-light me-3" style="width: 32px; height: 32px;">
                                                    <i class="fas fa-users-cog text-white small"></i>
                                                </div>
                                                <h5 class="card-title mb-0">Foundation Class 3</h5>
                                            </div>
                                            <p class="card-text">Ingin tahu lebih banyak tentang Elshaddai Church? Kelas ini adalah gerbang utama bagi Anda untuk memahami segala hal mendasar tentang gereja kami sebelum Anda memutuskan untuk terlibat lebih dalam atau bergabung dalam tim pelayanan.</p>
                                        </div>
                                        <button type="button" class="btn btn-primary-custom w-100 mt-3" data-bs-toggle="modal" data-bs-target="#modalFc3">
                                            <i class="fas fa-play-circle me-2"></i> Tonton Video
                                        </button>
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

{{-- Modal video dan script di-include dari file terpisah (modular, tidak duplikat) --}}
@include('equipClass.modal-fc2')
@include('equipClass.modal-fc3')
@include('dashboard.modal-what')
{{-- @include('dashboard.modal-how') --}}
@include('dashboard.videoDM-modals')

<!-- Statistik Progres Video dan Modal dipindahkan ke halaman Users -->

<!-- CSRF Token for AJAX requests -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<script>
    // Script untuk mengarahkan tab modal berdasarkan tombol yang diklik
    // Statistik progres video dipindahkan ke halaman Users
</script>

@endsection
