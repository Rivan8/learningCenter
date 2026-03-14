<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESC Equip Discipleship Center</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo.png') }}">
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4f46e5;
            --primary-light: #6366f1;
            --primary-dark: #3730a3;
            --secondary-color: #64748b;
            --accent-color: #f59e0b;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
            --light-bg: #f8fafc;
            --card-bg: #ffffff;
            --text-primary: #1e293b;
            --text-secondary: #64748b;
            --border-color: #e2e8f0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            color: var(--text-primary);
            line-height: 1.6;
        }

        /* Navbar Styling */
        .navbar {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--primary-color) !important;
            font-family: 'Inter', sans-serif;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 20px;
            border-radius: 50px;
            background: linear-gradient(135deg, rgba(79, 70, 229, 0.1) 0%, rgba(99, 102, 241, 0.1) 100%);
            transition: all 0.3s ease;
            border: 1px solid rgba(79, 70, 229, 0.2);
        }

        .user-profile:hover {
            background: linear-gradient(135deg, rgba(79, 70, 229, 0.15) 0%, rgba(99, 102, 241, 0.15) 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(79, 70, 229, 0.2);
        }

        .user-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--primary-color);
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.3);
        }

        .user-info {
            display: flex;
            flex-direction: column;
        }

        .user-name {
            font-weight: 600;
            color: var(--text-primary);
            font-size: 0.95rem;
        }

        .user-role {
            font-size: 0.8rem;
            color: var(--text-secondary);
            font-weight: 500;
        }

        /* Main Content */
        .main-container {
            padding: 3rem 0;
        }

        .hero-section {
            text-align: center;
            margin-bottom: 4rem;
            color: var(--text-primary);
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1.2;
        }

        .hero-subtitle {
            font-size: 1.3rem;
            color: var(--text-secondary);
            margin-bottom: 2rem;
            font-weight: 400;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .hero-stats {
            display: flex;
            justify-content: center;
            gap: 3rem;
            margin-top: 2rem;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-color);
        }

        .stat-label {
            font-size: 0.9rem;
            color: var(--text-secondary);
            font-weight: 500;
        }

        /* Course Cards */
        .course-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(380px, 1fr));
            gap: 2.5rem;
            margin-top: 3rem;
        }

        .course-card {
            background: var(--card-bg);
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
            transition: all 0.4s ease;
            border: 1px solid var(--border-color);
            cursor: pointer;
            position: relative;
        }

        .course-card:hover {
            transform: translateY(-12px);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.12);
        }

        .course-image {
            height: 220px;
            position: relative;
            overflow: hidden;
        }

        .course-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .course-card:hover .course-image img {
            transform: scale(1.1);
        }

        .course-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(255, 255, 255, 0.95);
            color: var(--primary-color);
            padding: 8px 16px;
            border-radius: 25px;
            font-size: 0.8rem;
            font-weight: 600;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .course-content {
            padding: 2rem;
        }

        .course-title {
            font-size: 1.4rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 1rem;
            line-height: 1.3;
        }

        .course-description {
            color: var(--text-secondary);
            margin-bottom: 1.5rem;
            line-height: 1.7;
            font-size: 0.95rem;
        }

        .course-features {
            list-style: none;
            margin-bottom: 2rem;
        }

        .course-features li {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 0.8rem;
            color: var(--text-secondary);
            font-size: 0.9rem;
            font-weight: 500;
        }

        .course-features li i {
            color: var(--success-color);
            font-size: 0.9rem;
            background: rgba(16, 185, 129, 0.1);
            padding: 6px;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .course-status {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: auto;
            padding-top: 1.5rem;
            border-top: 1px solid var(--border-color);
        }

        .status-badge {
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .status-available {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(16, 185, 129, 0.05) 100%);
            color: var(--success-color);
            border: 1px solid rgba(16, 185, 129, 0.2);
        }

        .status-locked {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.1) 0%, rgba(239, 68, 68, 0.05) 100%);
            color: var(--danger-color);
            border: 1px solid rgba(239, 68, 68, 0.2);
        }

        .status-warning {
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.1) 0%, rgba(245, 158, 11, 0.05) 100%);
            color: var(--warning-color);
            border: 1px solid rgba(245, 158, 11, 0.2);
        }

        .progress-indicator {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.85rem;
            color: var(--text-secondary);
            font-weight: 500;
        }

        .progress-bar {
            width: 80px;
            height: 6px;
            background: var(--border-color);
            border-radius: 3px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--success-color) 0%, var(--primary-color) 100%);
            border-radius: 3px;
            transition: width 0.3s ease;
        }

        /* Category Pills */
        .category-pills {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 3rem;
            flex-wrap: wrap;
        }

        .category-pill {
            padding: 12px 24px;
            border-radius: 25px;
            font-size: 0.9rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
            background: rgba(255, 255, 255, 0.8);
            color: var(--text-secondary);
        }

        .category-pill:hover,
        .category-pill.active {
            background: var(--primary-color);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(79, 70, 229, 0.3);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .hero-subtitle {
                font-size: 1.1rem;
            }

            .course-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .main-container {
                padding: 2rem 1rem;
            }

            .hero-stats {
                gap: 2rem;
            }

            .stat-number {
                font-size: 1.5rem;
            }
        }

        /* Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .course-card {
            animation: fadeInUp 0.8s ease forwards;
        }

        .course-card:nth-child(1) { animation-delay: 0.1s; }
        .course-card:nth-child(2) { animation-delay: 0.2s; }
        .course-card:nth-child(3) { animation-delay: 0.3s; }
        .course-card:nth-child(4) { animation-delay: 0.4s; }
        .course-card:nth-child(5) { animation-delay: 0.5s; }

        /* Floating Elements */
        .floating-shapes {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }

        .shape {
            position: absolute;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(79, 70, 229, 0.1) 0%, rgba(99, 102, 241, 0.1) 100%);
            animation: float 6s ease-in-out infinite;
        }

        .shape:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .shape:nth-child(2) {
            width: 120px;
            height: 120px;
            top: 60%;
            right: 10%;
            animation-delay: 2s;
        }

        .shape:nth-child(3) {
            width: 60px;
            height: 60px;
            bottom: 20%;
            left: 20%;
            animation-delay: 4s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }
    </style>
</head>
<body>
    <!-- Floating Background Shapes -->
    <div class="floating-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-graduation-cap me-2"></i>
                ESC Academy
            </a>

            <div class="ms-auto">
                <div class="dropdown">
                    <div class="user-profile dropdown-toggle" data-bs-toggle="dropdown" role="button">
                @php
                    $user = Auth::user();
                    $userName = $user ? $user->name : 'Guest';
                    $userPhoto = $user && $user->photo ? asset('storage/'.$user->photo) : 'https://ui-avatars.com/api/?name='.urlencode($userName).'&background=4f46e5&color=fff&size=64';
                @endphp
                        <img src="{{ $userPhoto }}" alt="User Avatar" class="user-avatar">
                        <div class="user-info">
                            <div class="user-name">{{ $userName }}</div>
                            <div class="user-role">{{ $user ? $user->statusanggota == 'belum' ? 'Anggota' : $user->statusanggota : 'Guest' }} / {{ $user ? $user->statusnextstep : 'Guest' }}</div>
                        </div>
                    </div>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Profile</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#" onclick="confirmLogout()"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-container" style="margin-top: 100px;">
        <div class="container">
            <!-- Hero Section -->
            <div class="hero-section">
                <h1 class="hero-title">Welcome to ESC Academy</h1>
                <p class="hero-subtitle">Transform your spiritual journey through our comprehensive discipleship courses designed to nurture growth and build strong foundations in faith.</p>

                <div class="hero-stats">
                    <div class="stat-item">
                        <div class="stat-number">8+</div>
                        <div class="stat-label">Course Modules</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">500+</div>
                        <div class="stat-label">Active Learners</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">24/7</div>
                        <div class="stat-label">Learning Access</div>
                    </div>
                </div>
            </div>

            <!-- Category Pills -->
            <div class="category-pills">
                <div class="category-pill active">All Courses</div>
                <div class="category-pill">Foundation</div>
                <div class="category-pill">Advanced</div>
                <div class="category-pill">Leadership</div>
            </div>

            <!-- Course Grid -->
            <div class="course-grid">
            @php $user = Auth::user(); @endphp

                <!-- Discipless Community Class -->
                <div class="course-card" onclick="{{ $user && in_array($user->statusanggota, ['Core Team','DM']) ? "window.location='" . route('dashboard') . "'" : "showSwal('Hanya user dengan status anggota Core Team atau DM yang bisa mengakses kelas ini!')" }}">
                    <div class="course-image">
                        <img src="https://images.unsplash.com/photo-1657161540865-a46753494068?q=80&w=2340&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Discipless Community">
                        <div class="course-badge">Leadership</div>
                    </div>
                    <div class="course-content">
                        <h3 class="course-title">Discipless Community Class</h3>
                        <p class="course-description">Advanced training program designed for DCM members aspiring to become Core Team and DM leaders with comprehensive leadership development.</p>
                        <ul class="course-features">
                            <li><i class="fas fa-check-circle"></i>Leadership Development</li>
                            <li><i class="fas fa-check-circle"></i>Team Management</li>
                            <li><i class="fas fa-check-circle"></i>Spiritual Growth</li>
                        </ul>
                        <div class="course-status">
                            <span class="status-badge status-available">Available</span>
                            <div class="progress-indicator">
                                <span>Progress</span>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 75%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ESC EQUIP - New Member Class -->
                <div class="course-card" onclick="{{ $user && in_array($user->statusnextstep, ['new','plant','grow','fruitfull']) ? "window.location='" . route('equip') . "'" : "showSwal('Hanya user dengan status Next Step: new, plant, grow, atau fruitfull yang bisa mengakses kelas ini!')" }}">
                    <div class="course-image">
                        <img src="https://images.unsplash.com/photo-1624267439301-8147fff1a23d?q=80&w=2664&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="New Member Class">
                        <div class="course-badge">Foundation</div>
                    </div>
                    <div class="course-content">
                        <h3 class="course-title">ESC EQUIP - New Member Class</h3>
                        <p class="course-description">Foundation courses for new members to establish their spiritual journey with fundamental teachings and basic discipleship principles.</p>
                        <ul class="course-features">
                            <li><i class="fas fa-check-circle"></i>Foundation Class 1 - Keselamatan & Baptisan</li>
                            <li><i class="fas fa-check-circle"></i>Membership Class</li>
                            <li><i class="fas fa-check-circle"></i>Basic Discipleship</li>
                        </ul>
                        <div class="course-status">
                            <span class="status-badge status-available">Available</span>
                            <div class="progress-indicator">
                                <span>Progress</span>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 60%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ESC EQUIP - Plant Class -->
                <div class="course-card" onclick="{{ $user && in_array($user->statusnextstep, ['plant','grow','fruitfull']) ? "window.location='" . route('equip') . "'" : ($user && $user->statusnextstep === 'new' ? "showSwal('Anda harus berada di tahap Plant untuk bisa mengakses kelas ini!')" : '') }}">
                    <div class="course-image">
                        <img src="https://plus.unsplash.com/premium_photo-1675804669850-a1c3b87589d5?q=80&w=2340&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Plant Class">
                        <div class="course-badge">Intermediate</div>
                    </div>
                    <div class="course-content">
                        <h3 class="course-title">ESC EQUIP - Plant Class</h3>
                        <p class="course-description">Intermediate level courses focusing on prayer and spiritual renewal to deepen your relationship with God and strengthen your faith foundation.</p>
                        <ul class="course-features">
                            <li><i class="fas fa-check-circle"></i>Foundation Class 2 - Doa</li>
                            <li><i class="fas fa-check-circle"></i>Foundation Class 3 - Renewal Life</li>
                            <li><i class="fas fa-check-circle"></i>Prayer & Worship</li>
                        </ul>
                        <div class="course-status">
                            <span class="status-badge status-warning">In Progress</span>
                            <div class="progress-indicator">
                                <span>Progress</span>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 45%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ESC EQUIP - Grow Class -->
                <div class="course-card" onclick="{{ $user && in_array($user->statusnextstep, ['grow','fruitfull']) ? "window.location='" . route('equip') . "'" : ($user && in_array($user->statusnextstep, ['new','plant']) ? "showSwal('Anda harus berada di tahap Grow untuk bisa mengakses kelas ini!')" : '') }}">
                    <div class="course-image">
                        <img src="https://images.unsplash.com/photo-1554523449-209945dde0c7?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Grow Class">
                        <div class="course-badge">Advanced</div>
                    </div>
                    <div class="course-content">
                        <h3 class="course-title">ESC EQUIP - Grow Class</h3>
                        <p class="course-description">Advanced spiritual development courses for mature believers seeking deeper understanding and practical application of biblical principles.</p>
                        <ul class="course-features">
                            <li><i class="fas fa-check-circle"></i>Grade 1 - The Cross</li>
                            <li><i class="fas fa-check-circle"></i>Grade 2 - The Power</li>
                            <li><i class="fas fa-check-circle"></i>Grade 3 - The Eternity</li>
                            <li><i class="fas fa-check-circle"></i>Marriage Class</li>
                        </ul>
                        <div class="course-status">
                            <span class="status-badge status-locked">Locked</span>
                            <div class="progress-indicator">
                                <span>Progress</span>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 0%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ESC EQUIP - Fruitful Class -->
                <div class="course-card" onclick="{{ $user && $user->statusnextstep === 'fruitfull' ? "window.location='" . route('equip') . "'" : ($user && in_array($user->statusnextstep, ['new','plant','grow']) ? "showSwal('Anda harus berada di tahap Fruitful untuk bisa mengakses kelas ini!')" : '') }}">
                    <div class="course-image">
                        <img src="https://plus.unsplash.com/premium_photo-1715588659455-b8d873103e25?q=80&w=2340&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Fruitful Class">
                        <div class="course-badge">Fruitful</div>
                    </div>
                    <div class="course-content">
                        <h3 class="course-title">ESC EQUIP - Fruitful Class</h3>
                        <p class="course-description">Expert level courses for leadership and volunteer development, preparing you to serve and lead others in ministry and community.</p>
                        <ul class="course-features">
                            <li><i class="fas fa-check-circle"></i>Volunteer Class</li>
                            <li><i class="fas fa-check-circle"></i>Leadership Class</li>
                            <li><i class="fas fa-check-circle"></i>Ministry Training</li>
                        </ul>
                        <div class="course-status">
                            <span class="status-badge status-locked">Locked</span>
                            <div class="progress-indicator">
                                <span>Progress</span>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 0%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      function showSwal(message) {
        Swal.fire({
          icon: 'warning',
          title: 'Access Restricted',
          text: message,
          confirmButtonColor: '#4f46e5',
          background: '#ffffff',
          backdrop: 'rgba(0,0,0,0.4)',
          customClass: {
            popup: 'rounded-3',
            title: 'fw-bold'
          }
        });
      }

      function confirmLogout() {
        Swal.fire({
          title: 'Confirm Logout',
          text: 'Are you sure you want to logout?',
          icon: 'question',
          showCancelButton: true,
          confirmButtonColor: '#4f46e5',
          cancelButtonColor: '#64748b',
          confirmButtonText: 'Yes, Logout',
          cancelButtonText: 'Cancel',
          background: '#ffffff',
          backdrop: 'rgba(0,0,0,0.4)',
          customClass: {
            popup: 'rounded-3',
            title: 'fw-bold'
          }
        }).then((result) => {
          if (result.isConfirmed) {
            document.getElementById('logout-form').submit();
          }
        });
      }
    </script>
    <!-- Hidden logout form for POST method -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</body>
</html>
