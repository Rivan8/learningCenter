
@extends('layouts.app')
@section('content')
@php
  $baseUrl = rtrim(request()->getBaseUrl(), '/');
  $needsPublicPrefix = file_exists(base_path('index.php'));
  $assetBase = $needsPublicPrefix ? ($baseUrl . '/public') : $baseUrl;
@endphp

<style>
   .a {
        font-size: 14px;
        color: #2a2f5b!important;
    }
    .btn-warna {
       border-color: #2a2f5b;
       border-width: 1px;
       border-style: solid;
       border-radius: 15px;
       /* Tambahan untuk outline */
       color: #2a2f5b;
       background-color: transparent;
       outline: none;
       transition: all 0.3s ease;
       padding: 0.375rem 0.75rem;
       font-size: 0.875rem;
    }

    /* Efek hover untuk btn-warna */
    .btn-warna:hover {
       background-color: #252a52;
       color: white;
       box-shadow: 0 0 8px rgba(42, 47, 91, 0.5);
    }
    .btn-warna2 {
       background-color: #2a2f5b;
       border-width: 1px;
       border-radius: 15px;
       /* Tambahan untuk outline */
       color: white;
       /* background-color: transparent; */
       outline: none;
       transition: all 0.3s ease;
       padding: 0.375rem 0.75rem;
       font-size: 0.875rem;
    }

    /* Efek hover untuk btn-warna */
    .btn-warna2:hover {
       border-color: #252a52;
       color: #2a2f5b;
       box-shadow: 0 0 8px rgba(42, 47, 91, 0.5);
    }
</style>


    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <!-- <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button> -->
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://images.unsplash.com/photo-1501594907352-04cda38ebc29" class="d-block w-100" alt="First slide" style="height: 400px; object-fit: cover;">
        </div>
        <!-- <div class="carousel-item">
            <img src="https://images.unsplash.com/photo-1519834785169-98be25ec3f84" class="d-block w-100" alt="Second slide" style="height: 400px; object-fit: cover;">
        </div>
        <div class="carousel-item">
            <img src="https://images.unsplash.com/photo-1741893041975-94a0e8656209?q=80&w=3542&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100" alt="Third slide" style="height: 400px; object-fit: cover;">
        </div> -->
    </div>
    <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button> -->
</div>
    <div class="page-category">
        <div class="col-md-12">
            <div class="container">

                <div class="page-inner">
                    <div class="row">
                        {{-- tampilan Hp --}}
                        <div class="col-md-3 d-block d-md-none"> <!-- Added d-block d-md-none for mobile-only display -->
                            <div class="card" style="margin-top: -100px; position: relative; z-index: 100;">
                                <img class="card-img-top" src="https://images.unsplash.com/photo-1442504028989-ab58b5f29a4a?q=80&w=3540&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Card image cap">
                                <div class="card-body">
                                    <!-- <h5 class="card-title">Card title</h5> -->
                                    <p class="card-text border p-2 rounded text-center" ><a style="color: #2a2f5b" href="https://drive.google.com/drive/folders/1UszKDn8e4yLmLvoG49vQ8nLZNwiOACw6" target="_blank">HANDBOOK</a></p>
                                    <p class="card-text border p-2 rounded text-center"><a style="color: #2a2f5b" href="https://drive.google.com/drive/folders/10FSws3dlYQKBxVIfMF8JjWZaqadpgznu" target="_blank"> RUNDOWN </a> </p>
                                    <p class="card-text border p-2 rounded text-center"><a style="color: #2a2f5b" href="https://drive.google.com/drive/folders/1kBO1iFAn8H8JgJaBUgQIKbrVePGX1HdD" target="_blank">TOOLS </a> </p>
                                    <p class="card-text border p-2 rounded text-center"><a style="color: #2a2f5b" href="">PRESENTATION SLIDE </a> </p>
                                    <!-- <a href="#" class="btn btn-primary border">Go somewhere</a> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 d-block d-md-none">Komunitas Kristen merupakan persekutuan orang-orang percaya yang hidup dalam kasih dan kebenaran Tuhan. Keberadaan komunitas ini sangat penting bagi pertumbuhan iman, baik secara pribadi maupun bersama. Dalam Alkitab, kita melihat banyak contoh bagaimana komunitas iman berperan dalam membangun, menguatkan, dan menopang anggotanya.</div>

                        {{-- tampilan Deskop --}}
                        <div class="col-md-8 d-none d-md-block"> <!-- Added d-none d-md-block for mobile hiding -->
                            <div style = 'margin-bottom:50px'> <h5>Komunitas Kristen: Makna, Tujuan, dan Perannya dalam Kehidupan Iman</h5><div>
                                <h6>Pengantar</h6>
                                <p>Komunitas Kristen merupakan persekutuan orang-orang percaya yang hidup dalam kasih dan kebenaran Tuhan. Keberadaan komunitas ini sangat penting bagi pertumbuhan iman, baik secara pribadi maupun bersama. Dalam Alkitab, kita melihat banyak contoh bagaimana komunitas iman berperan dalam membangun, menguatkan, dan menopang anggotanya.</p>
                                <p>### Makna Komunitas Kristen
                                Komunitas Kristen bukan sekadar perkumpulan sosial, tetapi sebuah wadah bagi orang percaya untuk saling membangun dan bertumbuh dalam Kristus. Dalam Matius 18:20, Yesus berkata, "Sebab di mana dua atau tiga orang berkumpul dalam nama-Ku, di situ Aku ada di tengah-tengah mereka." Ini menunjukkan bahwa komunitas Kristen memiliki dimensi spiritual yang kuat, di mana kehadiran Tuhan nyata dalam kebersamaan.</p>
                                <p><### Tujuan Komunitas Kristen
                                1. **Membangun Iman** – Dalam komunitas, setiap anggota dapat belajar dan mendalami firman Tuhan bersama, sehingga iman semakin teguh (Ibrani 10:24-25).
                                2. **Saling Menguatkan** – Kehidupan iman tidak selalu mudah. Dalam komunitas, anggota dapat saling mendukung, menghibur, dan mendoakan satu sama lain dalam setiap tantangan hidup (Galatia 6:2).
                                3. **Menjadi Saksi Kristus** – Komunitas Kristen bukan hanya untuk kepentingan internal, tetapi juga harus menjadi terang bagi dunia dan membawa Injil kepada orang lain (Matius 5:14-16).
                                4. **Melayani Sesama** – Dalam komunitas, setiap anggota memiliki kesempatan untuk melayani sesuai dengan talenta dan karunia yang Tuhan berikan (1 Petrus 4:10)./p>
                                <p>### Peran Komunitas Kristen dalam Kehidupan Iman
                                - **Pertumbuhan Rohani**: Dalam komunitas, anggota dapat belajar dari firman Tuhan, berbagi kesaksian, dan mendapatkan bimbingan rohani dari sesama.
                                - **Penguatan dalam Cobaan**: Kehidupan tidak terlepas dari tantangan. Dalam komunitas, seseorang tidak merasa sendirian dalam menghadapi kesulitan.
                                - **Kesempatan Melayani**: Setiap anggota komunitas dapat mengembangkan karunia mereka dan melayani sesama dengan penuh kasih.
                                - **Menciptakan Kesatuan**: Komunitas Kristen mencerminkan tubuh Kristus yang bersatu dalam kasih dan kebenaran (Efesus 4:3-6).</p>
                                <p>### Kesimpulan
                                Komunitas Kristen adalah bagian yang sangat penting dalam kehidupan iman setiap orang percaya. Dengan bergabung dan aktif di dalamnya, seseorang dapat bertumbuh dalam iman, saling menguatkan, serta menjadi berkat bagi sesama. Dalam kasih dan kebenaran Kristus, komunitas ini menjadi tempat di mana setiap orang percaya dapat mengalami pertumbuhan rohani dan membangun hubungan yang lebih dalam dengan Tuhan serta dengan sesama.</p>
                            </div>

                        </div>
                    </div>
                        <div class="col-md-4 d-none d-md-block" >
                            <div class="card" style="margin-top: -100px; position: relative; z-index: 100;">
                                <img class="card-img-top" src="https://images.unsplash.com/photo-1442504028989-ab58b5f29a4a?q=80&w=3540&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Card image cap">
                                <div class="card-body">
                                    <!-- <h5 class="card-title">Card title</h5> -->
                                    <p class="card-text border p-2 rounded text-center"  ><a style="color: #2a2f5b" href="https://drive.google.com/drive/folders/1UszKDn8e4yLmLvoG49vQ8nLZNwiOACw6" target="_blank">HANDBOOK</a></p>
                                    <p class="card-text border p-2 rounded text-center"><a style="color: #2a2f5b" href="https://drive.google.com/drive/folders/10FSws3dlYQKBxVIfMF8JjWZaqadpgznu" target="_blank"> RUNDOWN </a> </p>
                                    <p class="card-text border p-2 rounded text-center"><a style="color: #2a2f5b" href="https://drive.google.com/drive/folders/1kBO1iFAn8H8JgJaBUgQIKbrVePGX1HdD" target="_blank">TOOLS </a> </p>
                                    <p class="card-text border p-2 rounded text-center"><a style="color: #2a2f5b" href="">PRESENTATION SLIDE </a> </p>
                                    <!-- <a href="#" class="btn btn-primary border">Go somewhere</a> -->
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-10">
                            <div class="card card-round shadow-sm">
                                <div class="card-header bg-white border-bottom-0">
                                    <div class="card-head-row">
                                        <div class="card-title fw-bold">Materi Pembelajaran</div>
                                    </div>
                                </div>
                                <div class="card-body p-4">
                                        <!-- Item 1 -->
                                        <div class="col-md-12">
                                            <div class="card h-100 border-0 shadow-sm">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-flex align-items-center">
                                                            <!-- <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                                                <span>1</span>
                                                            </div> -->
                                                            <div>
                                                                <h5 class="card-text mb-0">01_The Why Mengapa Memuridkan</h5>
                                                                <!-- <p class="card-text mb-0">01_The Why Mengapa Memuridkan</p> -->
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <a href="https://youtu.be/4jPt6xbd5Gk" class="btn btn-sm btn-warna">
                                                                <i class="fas fa-play-circle me-1"></i> Watch Video
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Item 2 -->
                                        <div class="col-md-12">
                                            <div class="card h-100 border-0 shadow-sm">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-flex align-items-center">
                                                            <!-- <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                                                <span>1</span>
                                                            </div> -->
                                                            <div>
                                                                    <h5 class="card-text mb-0">02_The What Mengapa Memuridkan</h5>
                                                                <!-- <p class="card-text mb-0">Mengapa Memuridkan</p> -->
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <a href="https://youtu.be/4jPt6xbd5Gk" class="btn btn-sm btn-warna">
                                                                <i class="fas fa-play-circle me-1"></i> Watch Video
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Item 3 -->
                                        <div class="col-md-12">
                                            <div class="card h-100 border-0 shadow-sm">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-flex align-items-center">
                                                            <!-- <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                                                <span>1</span>
                                                            </div> -->
                                                            <div>
                                                                   <h5 class="card-text mb-0">03_The How Bagaimana Memuridkan</h5>
                                                                <!-- <p class="card-text mb-0">Mengapa Memuridkan</p> -->
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <a href="https://youtu.be/4jPt6xbd5Gk" class="btn btn-sm btn-warna ">
                                                                <i class="fas fa-play-circle me-1"></i> Watch Video
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Item 4 -->


                                </div>
                            </div>
                        </div>
                    </div>




                    {{-- khusus member admin --}}
@if(Auth::user()->role === 'admin')
                    <div class="row">
                        <div class="col-md-10">
                            <div class="card card-round shadow-sm">
                                <div class="card-header bg-white border-bottom-0">
                                    <div class="card-head-row">
                                        <div class="card-title fw-bold">Materi Pembelajaran</div>
                                    </div>
                                </div>
                                <div class="card-body p-4">


                                        <!-- Item 4 -->
                                        <div class="col-md-12">
                                            <div class="card h-100 border-0 shadow-sm">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-flex align-items-center">
                                                            <!-- <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                                                <span>1</span>
                                                            </div> -->
                                                            <div>
                                                                <h5 class="card-title mb-0">The Why</h5>
                                                                <p class="card-text mb-0">Mengapa Memuridkan</p>
                                                            </div>
                                                        </div>
                                                        <div>
                                                              <!-- Button trigger modal -->
                                                                <button type="button" class="btn btn-sm btn-warna2 " data-bs-toggle="modal" data-bs-target="#tahap1"><i class="fas fa-play-circle me-1"></i>
                                                                Watch Video
                                                                </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <div class="card h-100 border-0 shadow-sm">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-flex align-items-center">
                                                            <!-- <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                                                <span>1</span>
                                                            </div> -->
                                                            <div>
                                                                <h5 class="card-title mb-0">The Why</h5>
                                                                <p class="card-text mb-0">Mengapa Memuridkan</p>
                                                            </div>
                                                        </div>
                                                        <div>
                                                              <!-- Button trigger modal -->
                                                                <button type="button" class="btn btn-sm  btn-warna2" data-bs-toggle="modal" data-bs-target="#tahap2"><i class="fas fa-play-circle me-1"></i>
                                                                Watch Video
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
@endif


                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="tahap1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" style="max-width: 90%; height: 95vh;"> <!-- Changed to modal-xl and added custom width/height -->
    <div class="modal-content" style="height: 100%;">
      <!-- <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div> -->
      <div class="modal-body" style="height: calc(100% - 120px); overflow-y: auto;">
        <div class="row ">
            <div class="col-md-10 mb-4">
                <div class="position-relative">
                    <div class="ratio ratio-16x9"> <!-- Using Bootstrap's ratio utility for responsive video -->
                        <video id="videoPlayer" controls>
                            <source src="{{ asset('assets/video/pantai.mp4') }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <!-- Logo overlay di pojok kiri atas -->
                    <div class="position-absolute" style="top: 15px; left: 15px; z-index: 10; opacity: 0.8;">
                        <img src="{{ $assetBase }}/assets/img/kaiadmin/logo_light.svg" alt="Logo" style="max-width: 120px; height: auto;">
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <ul class="text-center list-group">
                    <li class="list-group-item"><a href="javascript:void(0)" onclick="changeVideo('pantai.mp4')">Video Opening</a><span class="badge text-bg-primary rounded-pill">14</span></li>
                    <li class="list-group-item"><a href="javascript:void(0)" onclick="changeVideo('malam.mp4')">Video Pendahuluan</a></li>
                    <li class="list-group-item"><a href="javascript:void(0)" onclick="changeVideo('jalan.mp4')">Pengertian DC </a></li>
                    <li class="list-group-item"><a href="javascript:void(0)" onclick="changeVideo('kadal.mp4')">Manfaat DC</a></li>
                    <li class="list-group-item"><a href="javascript:void(0)" onclick="changeVideo('malam.mp4')">Serba Serbi DC</a></li>
                    <li class="list-group-item"><a href="javascript:void(0)" onclick="changeVideo('kadal.mp4')">Apa yang Kamu Tahu?</a></li>
                    <li class="list-group-item"><a href="javascript:void(0)" onclick="changeVideo('malam.mp4')">Tips Menjadi DM yang Efektif</a></li>
                    <li class="list-group-item"><a href="javascript:void(0)" onclick="changeVideo('kadal.mp4')">Menjadi Murid</a></li>
                </ul>
            </div>
        </div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>
<div class="modal fade" id="tahap2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" style="max-width: 90%; height: 95vh;">
    <div class="modal-content" style="height: 100%;">
      <div class="modal-body" style="height: calc(100% - 120px); overflow-y: auto;">
        <div class="row">
            <div class="col-md-10 mb-4">
                <div class="position-relative">
                    <div class="ratio ratio-16x9">
                        <video id="videoPlayer2" controls> <!-- Ubah ID menjadi unik -->
                            <source src="{{ asset('assets/video/kadal.mp4') }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <div class="position-absolute" style="top: 15px; left: 15px; z-index: 10; opacity: 0.8;">
                        <img src="{{ $assetBase }}/assets/img/kaiadmin/logo_light.svg" alt="Logo" style="max-width: 120px; height: auto;">
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="javascript:void(0)" onclick="changeVideo2('kadal.mp4')">Video Opening</a>
                        <span class="badge bg-primary rounded-pill">1</span>
                    </li>
                    <li class="list-group-item">
                        <a href="javascript:void(0)" onclick="changeVideo2('malam.mp4')">Video Pendahuluan</a>
                    </li>
                    <li class="list-group-item">
                        <a href="javascript:void(0)" onclick="changeVideo2('jalan.mp4')">Pengertian DC</a>
                    </li>
                    <li class="list-group-item">
                        <a href="javascript:void(0)" onclick="changeVideo2('kadal.mp4')">Manfaat DC</a>
                    </li>
                    <li class="list-group-item">
                        <a href="javascript:void(0)" onclick="changeVideo2('malam.mp4')">Serba Serbi DC</a>
                    </li>
                    <li class="list-group-item">
                        <a href="javascript:void(0)" onclick="changeVideo2('kadal.mp4')">Apa yang Kamu Tahu?</a>
                    </li>
                    <li class="list-group-item">
                        <a href="javascript:void(0)" onclick="changeVideo2('malam.mp4')">Tips Menjadi DM yang Efektif</a>
                    </li>
                    <li class="list-group-item">
                        <a href="javascript:void(0)" onclick="changeVideo2('kadal.mp4')">Menjadi Murid</a>
                    </li>
                </ul>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
function changeVideo(videoId) {
    document.getElementById('videoPlayer').src = "{{ asset('assets/video/') }}/" + videoId;
}

// Tambahkan fungsi changeVideo2 untuk modal kedua
function changeVideo2(videoId) {
    document.getElementById('videoPlayer2').src = "{{ asset('assets/video/') }}/" + videoId;
}

// Perbaikan untuk error updateClock
// document.addEventListener('DOMContentLoaded', function() {
//     // Cek apakah elemen yang digunakan updateClock ada sebelum menjalankan fungsi
//     if (typeof updateClock === 'function') {
//         // Pastikan elemen yang diakses oleh updateClock ada
//         var clockElement = document.getElementById('clock'); // Sesuaikan dengan ID yang benar
//         if (clockElement) {
//             setInterval(updateClock, 5000);
//         }
//     }
// });
</script>
@endsection
