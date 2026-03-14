@extends('layouts.app')
@section('content')


@php
    $cardsData = [
        [
            'id' => 'fc1',
            'title' => 'Foundation Class 1',
            'description' => 'Penjelasan tentang alasan utama pentingnya pemuridan dalam kehidupan Kristen dan dampaknya bagi pertumbuhan iman.',
            'image' => 'https://images.unsplash.com/photo-1643487558904-e9192a101a90?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'alt' => 'Foundation Class 1',
            'modal_target' => '#modalEquipFC1',
            'category' => 'Foundation'
        ],
        [
            'id' => 'mc',
            'title' => 'Membership Class',
            'description' => 'Membahas definisi, tujuan, dan esensi pemuridan dalam komunitas Kristen serta peranannya dalam membentuk karakter Kristus.',
            'image' => 'https://images.unsplash.com/photo-1506744038136-46273834b3fb',
            'alt' => 'Membership Class',
            'modal_target' => '#modalEquipMC',
            'category' => 'Membership'
        ],
        [
            'id' => 'fc2',
            'title' => 'Foundation Class 2',
            'description' => 'Penjelasan tentang alasan utama pentingnya pemuridan dalam kehidupan Kristen dan dampaknya bagi pertumbuhan iman.',
            'image' => 'https://images.unsplash.com/photo-1612350275777-e86877ce74ad?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'alt' => 'Foundation Class 2',
            'modal_target' => '#modalEquipFC2',
            'category' => 'Foundation'
        ],
        [
            'id' => 'fc3',
            'title' => 'Foundation Class 3',
            'description' => 'Membahas definisi, tujuan, dan esensi pemuridan dalam komunitas Kristen serta peranannya dalam membentuk karakter Kristus.',
            'image' => 'https://images.unsplash.com/photo-1528828085966-aff4e01c5f2b?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'alt' => 'Foundation Class 3',
            'modal_target' => '#modalEquipFC3',
            'category' => 'Foundation'
        ],
        [
            'id' => 'g1',
            'title' => 'Grade 1 Class',
            'description' => 'Membahas definisi, tujuan, dan esensi pemuridan dalam komunitas Kristen serta peranannya dalam membentuk karakter Kristus.',
            'image' => 'https://images.unsplash.com/photo-1741893041975-94a0e8656209?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'alt' => 'Grade 1 Class',
            'modal_target' => '#modalEquipLC',
            'category' => 'Grade'
        ],
        [
            'id' => 'g2',
            'title' => 'Grade 2 Class',
            'description' => 'Membahas definisi, tujuan, dan esensi pemuridan dalam komunitas Kristen serta peranannya dalam membentuk karakter Kristus.',
            'image' => 'https://images.unsplash.com/photo-1501594907352-04cda38ebc29?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'alt' => 'Grade 2 Class',
            'modal_target' => '#modalEquipMC2',
            'category' => 'Grade'
        ],
        [
            'id' => 'g3',
            'title' => 'Grade 3 Class',
            'description' => 'Membahas definisi, tujuan, dan esensi pemuridan dalam komunitas Kristen serta peranannya dalam membentuk karakter Kristus.',
            'image' => 'https://images.unsplash.com/photo-1501594907352-04cda38ebc29?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'alt' => 'Grade 3 Class',
            'modal_target' => '#modalEquipMC2',
            'category' => 'Grade'
        ],
        [
            'id' => 'vc',
            'title' => 'Volunteer Class',
            'description' => 'Membahas definisi, tujuan, dan esensi pemuridan dalam komunitas Kristen serta peranannya dalam membentuk karakter Kristus.',
            'image' => 'https://images.unsplash.com/photo-1501594907352-04cda38ebc29?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'alt' => 'Volunteer Class',
            'modal_target' => '#modalEquipMC2',
            'category' => 'Volunteer'
        ]
    ];
    @endphp

    <style>
        body {
            background-color: #f0f4f8;
        }

        .page-category {
            background-color: #f0f4f8;
            min-height: 100vh;
        }

        .a {
            font-size: 14px;
            color: #2a2f5b !important;
        }

        .btn-warna {
            border-color: #2a2f5b;
            border-width: 1px;
            border-style: solid;
            border-radius: 15px;
            color: #2a2f5b;
            background-color: transparent;
            outline: none;
            transition: all 0.3s ease;
            padding: 0.375rem 0.75rem;
            font-size: 0.875rem;
        }

        .btn-warna:hover {
            background-color: #252a52;
            color: white;
            box-shadow: 0 0 8px rgba(42, 47, 91, 0.5);
        }

        .btn-warna2 {
            background-color: #2a2f5b;
            border-width: 1px;
            border-radius: 15px;
            color: white;
            outline: none;
            transition: all 0.3s ease;
            padding: 0.375rem 0.75rem;
            font-size: 0.875rem;
        }

        .btn-warna2:hover {
            border-color: #252a52;
            color: #2a2f5b;
            box-shadow: 0 0 8px rgba(42, 47, 91, 0.5);
        }

        /* New Card Layout Styles */
        .cards-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }

        .cards-row {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            flex-wrap: wrap;
            margin-top: 2rem;
        }

        .card-wrapper {
            flex: 0 1 350px;
            min-width: 280px;
            max-width: 350px;
        }

        .content-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .content-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
        }

        .card-image {
            height: 220px;
            overflow: hidden;
        }

        .card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .content-card:hover .card-image img {
            transform: scale(1.05);
        }

        .card-body {
            padding: 1.5rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .card-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #2a2f5b;
            margin-bottom: 0.75rem;
            line-height: 1.4;
        }

        .card-description {
            color: #64748b;
            margin-bottom: 1.5rem;
            line-height: 1.6;
            font-size: 0.9rem;
            flex-grow: 1;
        }

        .card-button {
            border: 1px solid #2a2f5b;
            border-radius: 8px;
            color: #2a2f5b;
            background-color: transparent;
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            justify-content: center;
            cursor: pointer;
            text-decoration: none;
        }

        .card-button:hover {
            background-color: #2a2f5b;
            color: white;
            text-decoration: none;
        }

        .card-button i {
            font-size: 1rem;
        }

        @media (max-width: 1200px) {
            .cards-row {
                justify-content: center;
            }

            .card-wrapper {
                flex: 0 1 320px;
                min-width: 280px;
                max-width: 320px;
            }
        }

        @media (max-width: 768px) {
            .cards-row {
                flex-direction: column;
                align-items: center;
            }

            .card-wrapper {
                width: 100%;
                max-width: 350px;
            }
        }
    </style>

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://images.unsplash.com/photo-1501594907352-04cda38ebc29" class="d-block w-100" alt="First slide"
                    style="height: 400px; object-fit: cover;">
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof updateClock === 'function') {
                if (!document.getElementById('clock')) {
                    const clockElement = document.createElement('div');
                    clockElement.id = 'clock';
                    clockElement.style.display = 'none';
                    document.body.appendChild(clockElement);
                }
            }
            if (typeof updateDate === 'function') {
                if (!document.getElementById('date')) {
                    const dateElement = document.createElement('div');
                    dateElement.id = 'date';
                    dateElement.style.display = 'none';
                    document.body.appendChild(dateElement);
                }
            }
        });
    </script>

    <div class="row mb-3">
        <div class="col-auto">
            <span id="clock" class="fw-bold" style="font-size: 1.2rem;"></span>
        </div>
        <div class="col-auto">
            <span id="date" class="fw-bold" style="font-size: 1.2rem;"></span>
        </div>
    </div>

    <div class="page-category">
        <div class="col-md-12">
            <div class="container">
                <div class="page-inner">
                    <div class="row">
                        {{-- tampilan Hp --}}
                        <div class="col-md-3 d-block d-md-none">
                            <div class="card" style="margin-top: -100px; position: relative; z-index: 100;">
                                <img class="card-img-top"
                                    src="https://images.unsplash.com/photo-1442504028989-ab58b5f29a4a?q=80&w=3540&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text border p-2 rounded text-center"><a style="color: #2a2f5b"
                                            href="https://drive.google.com/drive/folders/1UszKDn8e4yLmLvoG49vQ8nLZNwiOACw6"
                                            target="_blank">HANDBOOK</a></p>
                                    <p class="card-text border p-2 rounded text-center"><a style="color: #2a2f5b"
                                            href="https://drive.google.com/drive/folders/10FSws3dlYQKBxVIfMF8JjWZaqadpgznu"
                                            target="_blank"> RUNDOWN </a> </p>
                                    <p class="card-text border p-2 rounded text-center"><a style="color: #2a2f5b"
                                            href="https://drive.google.com/drive/folders/1kBO1iFAn8H8JgJaBUgQIKbrVePGX1HdD"
                                            target="_blank">TOOLS </a> </p>
                                    <p class="card-text border p-2 rounded text-center"><a style="color: #2a2f5b"
                                            href="">PRESENTATION SLIDE </a> </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 d-block d-md-none">Komunitas Kristen merupakan persekutuan orang-orang percaya
                            yang hidup dalam kasih dan kebenaran Tuhan. Keberadaan komunitas ini sangat penting bagi
                            pertumbuhan iman, baik secara pribadi maupun bersama. Dalam Alkitab, kita melihat banyak contoh
                            bagaimana komunitas iman berperan dalam membangun, menguatkan, dan menopang anggotanya.</div>

                        {{-- tampilan Deskop --}}
                        <div class="col-md-8 d-none d-md-block">
                            <div style = 'margin-bottom:50px'>
                                <h5><b>Apa itu Disciples Community (DC)?</b></h5>
                                <p>Kelas Pengajaran Untuk Jemaat yang ingin tertanam, Bertumbuh serta berbuah dan ingin
                                    masuk didalam pelayanan di El Shaddai Church.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Cards Layout -->
                    <div class="cards-container">
                        <div class="cards-row">
                            @foreach($cardsData as $card)
                            <div class="card-wrapper">
                                <div class="content-card">
                                    <div class="card-image">
                                        <img src="{{ $card['image'] }}" alt="{{ $card['alt'] }}">
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title">{{ $card['title'] }}</h3>
                                        <p class="card-description">{{ $card['description'] }}</p>
                                        <button type="button" class="card-button" data-bs-toggle="modal" data-bs-target="{{ $card['modal_target'] }}">
                                            <i class="fas fa-play"></i> Watch Video
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>



                    <!-- Footer -->
                    <div class="text-center py-4 mt-5" style="color: #64748b; font-size: 0.9rem;">
                        © 2026 ESC Equip Discipleship | Made with ❤️ for Growth & Community
                    </div>
                </div>
            </div>


            @include('equip.modal.mc-modals')
            @include('equip.modal.fc1-modals')
        @endsection
