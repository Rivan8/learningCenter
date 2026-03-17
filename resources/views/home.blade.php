<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ESC Equip Discipleship Center</title>
    @php
    $assetBase = rtrim(request()->getBasePath(), '\/');
    $baseUrl = rtrim(request()->getBaseUrl(), '/');
    @endphp
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ $assetBase }}/assets/img/logo.png">
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        :root {
            --primary-color: #1e3a8a;
            --primary-light: #3b82f6;
            --primary-dark: #172554;
            --secondary-color: #475569;
            --accent-color: #d4af37;
            --accent-light: #fcd34d;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
            --light-bg: #f8fafc;
            --card-bg: #ffffff;
            --text-primary: #0f172a;
            --text-secondary: #475569;
            --border-color: #e2e8f0;
            --gradient-primary: linear-gradient(135deg, #1e3a8a 0%, #312e81 100%);
            --gradient-secondary: linear-gradient(135deg, #d4af37 0%, #b48608 100%);
            --gradient-success: linear-gradient(135deg, #059669 0%, #10b981 100%);
            --gradient-warning: linear-gradient(135deg, #d97706 0%, #f59e0b 100%);
            --gradient-info: linear-gradient(135deg, #0284c7 0%, #38bdf8 100%);
            --soft-green: rgba(16, 185, 129, 0.1);
            --soft-pink: rgba(239, 68, 68, 0.1);
            --soft-yellow: rgba(245, 158, 11, 0.1);
            --font-heading: 'Playfair Display', serif;
            --font-body: 'Inter', sans-serif;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-body);
            background: #fcfbfa;
            background-image:
                radial-gradient(at 0% 0%, rgba(212, 175, 55, 0.05) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(30, 58, 138, 0.05) 0px, transparent 50%);
            background-attachment: fixed;
            min-height: 100vh;
            color: var(--text-primary);
            line-height: 1.6;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .hero-title,
        .course-title,
        .brand-text {
            font-family: var(--font-heading);
        }

        /* Modern Navbar Styling */
        .navbar {
            background: rgba(0, 0, 0, 0.2) !important;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            /* box-shadow: 0 4px 30px rgba(0, 0, 0, 0.15); */
            padding: 0.8rem 0;
            transition: all 0.3s ease;
        }

        .navbar.scrolled {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
        }

        /* Brand Logo Styling */
        .brand-logo-container {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--primary-color);
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(79, 70, 229, 0.3);
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .brand-logo {
            width: 28px;
            height: 28px;
            object-fit: contain;
        }

        .brand-text {
            font-weight: 700;
            font-size: 1.4rem;
            color: rgb(255, 255, 255);
            font-family: 'Inter', sans-serif;
            transition: color 0.3s ease;
            margin-left: 5px;
            background: linear-gradient(135deg, #fff 0%, rgba(255, 255, 255, 1) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            filter: drop-shadow(0 1px 3px rgba(0, 0, 0, 0.3));
        }

        .navbar.scrolled .brand-text {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Navigation Menu Styling */
        .navbar-nav {
            margin-left: 2rem;
        }

        .nav-item {
            margin: 0 0.3rem;
            position: relative;
        }

        .nav-link {
            color: rgba(255, 255, 255, 1) !important;
            font-weight: 600;
            padding: 0.8rem 1.2rem !important;
            border-radius: 10px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            /* text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3); */
        }

        .nav-link:hover,
        .nav-link.active {
            color: white !important;
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .navbar.scrolled .nav-link {
            color: var(--text-secondary) !important;
        }

        .navbar.scrolled .nav-link:hover,
        .navbar.scrolled .nav-link.active {
            color: var(--primary-color) !important;
            background: rgba(79, 70, 229, 0.08);
        }

        .nav-icon {
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .nav-link:hover .nav-icon,
        .nav-link.active .nav-icon {
            transform: scale(1.1);
        }

        /* User Profile Styling */
        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 8px 16px;
            border-radius: 50px;
            background: rgba(0, 0, 0, 0.25);
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .user-profile:hover {
            background: rgba(0, 0, 0, 0.35);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.4);
        }

        .navbar.scrolled .user-profile {
            background: linear-gradient(135deg, rgba(79, 70, 229, 0.08) 0%, rgba(99, 102, 241, 0.08) 100%);
            border: 1px solid rgba(79, 70, 229, 0.15);
        }

        .navbar.scrolled .user-profile:hover {
            background: linear-gradient(135deg, rgba(79, 70, 229, 0.12) 0%, rgba(99, 102, 241, 0.12) 100%);
            box-shadow: 0 8px 25px rgba(79, 70, 229, 0.15);
        }

        .user-avatar {
            width: 38px;
            height: 38px;
            border-radius: 12px;
            object-fit: cover;
            border: 2px solid var(--primary-color);
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.2);
            transition: all 0.3s ease;
        }

        .user-profile:hover .user-avatar {
            border-radius: 50%;
            transform: scale(1.05);
        }

        .user-info {
            display: flex;
            flex-direction: column;
        }

        .user-name {
            font-weight: 600;
            color: white;
            font-size: 0.9rem;
            transition: color 0.3s ease;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
        }

        .user-role {
            font-size: 0.75rem;
            color: rgba(255, 255, 255, 1);
            font-weight: 500;
            transition: color 0.3s ease;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
        }

        .navbar.scrolled .user-name {
            color: var(--text-primary);
        }

        .navbar.scrolled .user-role {
            color: var(--text-secondary);
        }

        /* Dropdown Menu Styling */
        .dropdown-menu {
            border: none;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
            margin-top: 1rem;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            min-width: 280px;
        }

        .dropdown-header {
            padding: 0.8rem 1.5rem;
            color: var(--text-primary);
        }

        .dropdown-user-avatar {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            object-fit: cover;
            border: 2px solid var(--primary-color);
        }

        .dropdown-item {
            padding: 0.8rem 1.5rem;
            color: var(--text-secondary);
            font-weight: 500;
            transition: all 0.2s ease;
            position: relative;
        }

        .dropdown-item:hover {
            background: rgba(79, 70, 229, 0.08);
            color: var(--primary-color);
            padding-left: 1.8rem;
        }

        .dropdown-item i {
            color: var(--text-secondary);
            transition: all 0.2s ease;
        }

        .dropdown-item:hover i {
            color: var(--primary-color);
        }

        /* Mobile Navigation */
        .navbar-toggler {
            border: 1px solid rgba(255, 255, 255, 0.3);
            background: rgba(0, 0, 0, 0.25);
            color: white;
            border-radius: 10px;
            padding: 0.6rem 0.8rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .navbar-toggler:focus {
            box-shadow: none;
            outline: none;
        }

        .navbar.scrolled .navbar-toggler {
            background: rgba(79, 70, 229, 0.08);
            color: var(--primary-color);
        }

        @media (max-width: 991.98px) {
            .navbar-collapse {
                background: rgba(255, 255, 255, 0.95);
                margin-top: 1rem;
                border-radius: 16px;
                padding: 1rem;
                box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
                max-height: 80vh;
                overflow-y: auto;
            }

            .navbar-nav {
                margin-left: 0;
                margin-bottom: 1rem;
            }

            .nav-link {
                color: var(--text-secondary) !important;
                padding: 0.8rem 1rem !important;
                border-radius: 10px;
            }

            .nav-link:hover,
            .nav-link.active {
                color: var(--primary-color) !important;
                background: rgba(79, 70, 229, 0.08);
            }

            .user-profile {
                margin-top: 0.5rem;
                width: 100%;
                justify-content: center;
                background: linear-gradient(135deg, rgba(79, 70, 229, 0.08) 0%, rgba(99, 102, 241, 0.08) 100%);
                border: 1px solid rgba(79, 70, 229, 0.15);
            }

            .user-info {
                display: flex !important;
            }

            .user-name {
                color: var(--text-primary);
            }

            .user-role {
                color: var(--text-secondary);
            }
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
            font-size: 4rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--primary-dark);
            line-height: 1.2;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.05);
        }

        .hero-subtitle {
            font-size: 1.2rem;
            color: var(--text-secondary);
            margin-bottom: 2rem;
            font-weight: 400;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.8;
            font-family: var(--font-body);
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
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 2.5rem;
            margin-top: 3rem;
            justify-items: center;
        }

        /* Ensure cards maintain consistent width */
        .course-card {
            background: var(--card-bg);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.04);
            transition: all 0.4s ease;
            border: 1px solid rgba(212, 175, 55, 0.15);
            /* Subtle gold border */
            cursor: pointer;
            position: relative;
            height: 100%;
            display: flex;
            flex-direction: column;
            width: 100%;
            max-width: 420px;
        }

        .course-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(30, 58, 138, 0.08);
            /* Navy hint shadow */
            border-color: rgba(212, 175, 55, 0.4);
        }

        /* Modern Request Button Styling */
        .request-btn-container {
            margin-top: 1rem;
            padding-top: 1.5rem;
            border-top: 1px dashed rgba(212, 175, 55, 0.2);
            text-align: center;
        }

        .request-btn {
            background: var(--gradient-secondary);
            border: 1px solid rgba(212, 175, 55, 0.5);
            color: #fff !important;
            padding: 12px 28px;
            border-radius: 8px;
            /* Sharper edges */
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(212, 175, 55, 0.2);
            position: relative;
            overflow: hidden;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            letter-spacing: 0.5px;
        }

        .request-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(212, 175, 55, 0.35);
            color: #fff !important;
            background: linear-gradient(135deg, #b48608 0%, #d4af37 100%);
            text-decoration: none;
        }

        .request-btn:active {
            transform: translateY(-1px);
        }

        .request-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .request-btn:hover::before {
            left: 100%;
        }

        .request-btn-icon {
            font-size: 1rem;
            transition: transform 0.3s ease;
        }

        .request-btn:hover .request-btn-icon {
            transform: scale(1.1) rotate(5deg);
        }

        /* Button states */
        .request-btn.pending {
            background: var(--gradient-warning);
            box-shadow: 0 6px 20px rgba(245, 158, 11, 0.25);
        }

        .request-btn.pending:hover {
            box-shadow: 0 8px 25px rgba(245, 158, 11, 0.35);
        }

        .request-btn.approved {
            background: var(--gradient-success);
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.25);
        }

        .request-btn.approved:hover {
            box-shadow: 0 8px 25px rgba(16, 185, 129, 0.35);
        }

        .request-btn.rejected {
            background: var(--gradient-secondary);
            box-shadow: 0 6px 20px rgba(239, 68, 68, 0.25);
        }

        .request-btn.rejected:hover {
            box-shadow: 0 8px 25px rgba(239, 68, 68, 0.35);
        }

        /* Status Banner Styling */
        .status-banner {
            background: var(--card-bg);
            border-radius: 12px;
            padding: 20px 25px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            position: relative;
            overflow: hidden;
            border-left: 4px solid var(--border-color);
            transition: all 0.3s ease;
        }

        .pending-banner {
            border-left-color: var(--warning-color);
        }

        .approved-banner {
            border-left-color: var(--success-color);
        }

        .rejected-banner {
            border-left-color: var(--danger-color);
        }

        .banner-content {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .banner-icon {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            flex-shrink: 0;
        }

        .pending-banner .banner-icon {
            background: var(--soft-yellow);
            color: var(--warning-color);
        }

        .approved-banner .banner-icon {
            background: var(--soft-green);
            color: var(--success-color);
        }

        .rejected-banner .banner-icon {
            background: var(--soft-pink);
            color: var(--danger-color);
        }

        .banner-text {
            flex: 1;
        }

        .banner-title {
            margin: 0 0 5px 0;
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--text-primary);
        }

        .banner-description {
            margin: 0;
            font-size: 0.95rem;
            color: var(--text-secondary);
        }

        .banner-action {
            margin-left: 20px;
            flex-shrink: 0;
        }

        .banner-close {
            position: absolute;
            top: 10px;
            right: 15px;
            background: none;
            border: none;
            color: var(--text-secondary);
            cursor: pointer;
            font-size: 1.2rem;
            transition: color 0.2s ease;
            opacity: 0.5;
        }

        .banner-close:hover {
            color: var(--text-primary);
            opacity: 1;
        }

        /* Status Banner Progress Ring */
        .banner-progress {
            margin-left: auto;
        }

        .progress-ring {
            width: 50px;
            height: 50px;
            position: relative;
        }

        .progress-circle {
            width: 100%;
            height: 100%;
            border: 4px solid var(--border-color);
            border-top: 4px solid var(--primary-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        .pending-banner .progress-circle {
            border-top-color: var(--warning-color);
        }

        .approved-banner .progress-circle {
            border-top-color: var(--success-color);
        }

        .rejected-banner .progress-circle {
            border-top-color: var(--danger-color);
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .banner-content {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }

            .banner-action,
            .banner-progress {
                margin: 10px 0 0 0;
            }
        }

        /* Added LMS Elegant Course Card Styling */
        .course-image {
            position: relative;
            width: 100%;
            height: 220px;
            overflow: hidden;
            border-bottom: 2px solid rgba(212, 175, 55, 0.1);
        }

        .course-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .course-card:hover .course-image img {
            transform: scale(1.08);
            /* Subtle zoom on hover */
        }

        .course-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: var(--gradient-secondary);
            color: #fff;
            padding: 6px 14px;
            border-radius: 30px;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            z-index: 2;
        }

        .course-content {
            padding: 25px;
            display: flex;
            flex-direction: column;
            gap: 15px;
            flex: 1;
            /* allow spreading */
        }

        .course-title {
            font-size: 1.4rem;
            color: var(--primary-dark);
            font-weight: 700;
            margin: 0;
            line-height: 1.3;
        }

        .course-description {
            font-size: 0.95rem;
            color: var(--text-secondary);
            line-height: 1.6;
            margin: 0;
            font-family: var(--font-body);
        }

        .course-features {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 8px;
            border-top: 1px solid var(--border-color);
            padding-top: 15px;
        }

        .course-features li {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.9rem;
            color: var(--text-secondary);
        }

        .course-features li i {
            color: var(--accent-color);
            font-size: 1rem;
        }

        .course-status {
            margin-top: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 15px;
        }

        .status-badge {
            padding: 6px 14px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .status-available {
            background-color: var(--soft-green);
            color: var(--success-color);
            border: 1px solid rgba(16, 185, 129, 0.2);
        }

        .status-locked {
            background-color: var(--soft-yellow);
            color: var(--warning-color);
            border: 1px solid rgba(245, 158, 11, 0.2);
        }

        /* Category Pills Styling */
        .category-pills {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 35px;
        }

        .category-pill {
            padding: 8px 25px;
            background-color: var(--card-bg);
            border: 1px solid rgba(212, 175, 55, 0.3);
            border-radius: 50px;
            font-weight: 500;
            color: var(--text-secondary);
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.02);
            font-size: 0.95rem;
        }

        .category-pill:hover,
        .category-pill.active {
            background: var(--gradient-secondary);
            color: white;
            border-color: transparent;
            box-shadow: 0 4px 15px rgba(212, 175, 55, 0.3);
            transform: translateY(-2px);
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

    <!-- Modern Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <div class="brand-logo-container me-2">
                    <img src="{{ $assetBase }}/assets/img/logo.png" alt="ESC Logo" class="brand-logo">
                </div>
                <span class="brand-text">ESC Equip Center</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="#"><i class="fas fa-home nav-icon"></i><span>Home</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-book-open nav-icon"></i><span>Courses</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i
                                class="fas fa-calendar-alt nav-icon"></i><span>Schedule</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i
                                class="fas fa-question-circle nav-icon"></i><span>Help</span></a>
                    </li>
                </ul>

                <div class="ms-auto">
                    <div class="dropdown">
                        <div class="user-profile dropdown-toggle" data-bs-toggle="dropdown" role="button">
                            @php
                            $user = Auth::user();
                            $userName = ($user && isset($user->name)) ? $user->name : 'Guest';
                            $userPhoto = ($user && isset($user->photo) && $user->photo) ?
                            ($baseUrl.'/storage/'.$user->photo) :
                            ('https://ui-avatars.com/api/?name='.urlencode($userName).'&background=4f46e5&color=fff&size=64');
                            $userStatusAnggota = ($user && isset($user->statusanggota)) ? ($user->statusanggota ==
                            'belum' ? 'Anggota' : $user->statusanggota) : 'Guest';
                            $userStatusNextStep = ($user && isset($user->statusnextstep)) ? $user->statusnextstep :
                            'Guest';
                            @endphp
                            <img src="{{ $userPhoto }}" alt="User Avatar" class="user-avatar">
                            <div class="user-info d-none d-sm-flex">
                                <div class="user-name">{{ $userName }}</div>
                                <div class="user-role">{{ $userStatusAnggota }} / {{ $userStatusNextStep }}</div>
                            </div>
                        </div>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li class="dropdown-header">
                                <div class="d-flex align-items-center">
                                    <img src="{{ $userPhoto }}" alt="User Avatar" class="dropdown-user-avatar me-2">
                                    <div>
                                        <div class="fw-bold">{{ $userName }}</div>
                                        <small class="text-muted">{{ ($user && isset($user->email)) ? $user->email :
                                            'guest@example.com' }}</small>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Profile</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Settings</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-history me-2"></i>Activity Log</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#" onclick="confirmLogout()"><i
                                        class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-container" style="margin-top: 100px;">
        <div class="container">
            <!-- Hero Section -->
            <div class="hero-section">
                <span class="animate__animated animate__fadeInDown"
                    style="color: var(--accent-color); font-weight: 600; text-transform: uppercase; letter-spacing: 3px; font-size: 0.9rem; margin-bottom: 15px; display: inline-block;">Pusat
                    Pelatihan Rohani</span>
                <h1 class="hero-title animate__animated animate__fadeInUp">ESC Equip Center</h1>
                <p class="hero-subtitle animate__animated animate__fadeInUp" style="animation-delay: 0.1s;">Membangun
                    fondasi rohani yang kokoh dan melatih pemimpin yang berdampak melalui pembelajaran Firman Tuhan yang
                    mendalam, terstruktur, dan transformatif.</p>
                <!-- <div class="mt-4 d-flex justify-content-center gap-3 animate__animated animate__fadeInUp" style="animation-delay: 0.2s;">
                    <a href="{{ route('dashboard') }}" class="btn btn-primary px-4 py-2" style="background: var(--gradient-primary); border: none; font-weight: 500; border-radius: 8px; padding: 12px 30px !important; box-shadow: 0 4px 15px rgba(30, 58, 138, 0.3);">
                        <i class="fas fa-play-circle me-2"></i>Mulai Kelas
                    </a>
                    <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary px-4 py-2">
                        <i class="fas fa-book-open me-2"></i>Jelajahi Materi
                    </a>
                </div> -->

            </div>

            <!-- Category Pills -->
            <div class="category-pills">
                <div class="category-pill active">All</div>
                <div class="category-pill">New</div>
                <div class="category-pill">Plan</div>
                <div class="category-pill">Grow</div>
                <div class="category-pill">Serve</div>
            </div>

            <!-- Status Notification Banner -->
            @if($user)
            @php
            $userAccessRequest = null;
            if($user && isset($user->id)) {
            $userAccessRequest = \App\Models\AccessRequest::where('user_id', $user->id)
            ->where('status', '!=', 'rejected')
            ->latest()
            ->first();
            }

            // Check if banner should be shown based on time
            $showBanner = false;
            $bannerType = '';

            if($userAccessRequest && isset($userAccessRequest->status)) {
            if($userAccessRequest->status === 'pending') {
            $showBanner = true;
            $bannerType = 'pending';
            } elseif($userAccessRequest->status === 'approved') {
            // Show approved banner only for 24 hours after approval
            $approvedTime = $userAccessRequest->updated_at ?? now();
            $hoursSinceApproved = now()->diffInHours($approvedTime);
            $showBanner = $hoursSinceApproved <= 24; $bannerType='approved' ; } elseif($userAccessRequest->status ===
                'rejected') {
                // Show rejected banner only for 12 hours after rejection
                $rejectedTime = $userAccessRequest->updated_at ?? now();
                $hoursSinceRejected = now()->diffInHours($rejectedTime);
                $showBanner = $hoursSinceRejected <= 12; $bannerType='rejected' ; } } @endphp @if($showBanner) <div
                    class="status-banner {{ $bannerType }}-banner mb-4" id="statusBanner">
                    <div class="banner-content">
                        <div class="banner-icon">
                            @if($bannerType === 'pending')
                            <i class="fas fa-clock"></i>
                            @elseif($bannerType === 'approved')
                            <i class="fas fa-check-circle"></i>
                            @elseif($bannerType === 'rejected')
                            <i class="fas fa-exclamation-triangle"></i>
                            @endif
                        </div>
                        <div class="banner-text">
                            @if($bannerType === 'pending')
                            <h5 class="banner-title">Permintaan Akses Sedang Diproses</h5>
                            <p class="banner-description">Permohonan akses Anda untuk <strong>Discipless Community
                                    Class</strong> sedang dalam proses review oleh tim admin. Mohon tunggu notifikasi
                                selanjutnya.</p>
                            @elseif($bannerType === 'approved')
                            <h5 class="banner-title">Permintaan Akses Diterima!</h5>
                            <p class="banner-description">Selamat! Permohonan akses Anda untuk <strong>Discipless
                                    Community Class</strong> telah disetujui. Anda sekarang dapat mengakses kelas
                                tersebut.</p>
                            @elseif($bannerType === 'rejected')
                            <h5 class="banner-title">Permintaan Akses Ditolak</h5>
                            <p class="banner-description">Mohon maaf, permohonan akses Anda untuk <strong>Discipless
                                    Community Class</strong> tidak dapat disetujui saat ini. Silakan hubungi admin untuk
                                informasi lebih lanjut.</p>
                            @endif
                        </div>

                        @if($bannerType === 'pending')
                        <div class="banner-progress">
                            <div class="progress-ring">
                                <div class="progress-circle"></div>
                            </div>
                        </div>
                        @elseif($bannerType === 'approved')
                        <div class="banner-action">
                            <a href="{{ route('dashboard') }}" class="btn btn-success btn-sm">
                                <i class="fas fa-play me-2"></i>Akses Kelas
                            </a>
                        </div>
                        @elseif($bannerType === 'rejected')
                        <div class="banner-action">
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#requestAccessModal">
                                <i class="fas fa-redo me-2"></i>Request Ulang
                            </button>
                        </div>
                        @endif

                        <!-- Close button for all banners -->
                        <button type="button" class="btn-close banner-close" onclick="closeBanner()" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
        </div>
        @endif
        @endif

        <!-- Course Grid -->
        <div class="course-grid">
            @php $user = Auth::user(); @endphp

            <!-- Discipless Community Class - Kategori: Serve -->
            <div class="course-card serve-category" @if($user) @php $userAccessRequest=null; if($user && isset($user->
                id)) {
                $userAccessRequest = \App\Models\AccessRequest::where('user_id', $user->id)
                ->where('status', '!=', 'rejected')
                ->latest()
                ->first();
                }
                $isCTDM = $user && isset($user->statusanggota) && in_array($user->statusanggota, ['Core Team', 'DM']);
                @endphp
                @endif
                >
                <div class="course-image">
                    <img src="{{ $assetBase }}/assets/img/DcCollage.png" alt="Discipless Community">
                    <div class="course-badge">Discipleship</div>
                </div>
                <div class="course-content">
                    <h3 class="course-title">Discipless Community Class</h3>
                    <p class="course-description">Advanced training program designed for DCM members aspiring to become
                        Core Team and DM leaders with comprehensive leadership development.</p>
                    <ul class="course-features">
                        <li><i class="fas fa-check-circle"></i>Basic Discipleship</li>
                        <li><i class="fas fa-check-circle"></i>Leadership Development</li>
                        <li><i class="fas fa-check-circle"></i>Spiritual Growth</li>
                    </ul>
                    <div class="course-status">
                        @php
                        $isCTDM = isset($user) && $user && isset($user->statusanggota) && in_array($user->statusanggota,
                        ['Core Team', 'DM']);
                        @endphp
                        <span class="status-badge {{ $isCTDM ? 'status-available' : 'status-locked' }}">
                            {{ $isCTDM ? 'Available' : 'Locked' }}
                        </span>
                    </div>
                    @if($user && isset($isCTDM) && $isCTDM)
                    @if(isset($userAccessRequest) && $userAccessRequest && isset($userAccessRequest->status) &&
                    $userAccessRequest->status === 'pending')
                    <div class="request-btn-container">
                        <a href="#" class="request-btn pending">
                            <i class="fas fa-clock request-btn-icon"></i> Sedang Diproses
                        </a>
                    </div>
                    @elseif(isset($userAccessRequest) && $userAccessRequest && isset($userAccessRequest->status) &&
                    $userAccessRequest->status === 'rejected')
                    <div class="request-btn-container">
                        <a href="#" class="request-btn rejected" data-bs-toggle="modal"
                            data-bs-target="#requestAccessModal">
                            <i class="fas fa-redo request-btn-icon"></i> Request Ulang
                        </a>
                    </div>
                    @else
                    <div class="request-btn-container">
                        <a href="#" class="request-btn" data-bs-toggle="modal" data-bs-target="#requestAccessModal">
                            <i class="fas fa-plus-circle request-btn-icon"></i> Request Kelas
                        </a>
                    </div>
                    @endif
                    @endif
                </div>
            </div>

            <!-- ESC EQUIP - New Member Class - Kategori: New -->
            <div class="course-card new-category" @php $userAccessRequestNew=null; $canAccessNew=false; if(isset($user)
                && $user){ $userAccessRequestNew=\App\Models\Fc1McRequest::where('user_id', $user->id)
                ->where('status', '!=', 'rejected')
                ->latest()
                ->first();
                $isApprovedNew = $userAccessRequestNew && isset($userAccessRequestNew->status) &&
                $userAccessRequestNew->status === 'approved';
                $canAccessNew = $isApprovedNew;
                }
                @endphp
                @if($canAccessNew)
                onclick="window.location='{{ route('equipClass.index') }}'"
                @endif
                >
                <div class="course-image">
                    <img src="https://images.unsplash.com/photo-1624267439301-8147fff1a23d?q=80&w=2664&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="New Member Class">
                    <div class="course-badge">Foundation</div>
                </div>
                <div class="course-content">
                    <h3 class="course-title">ESC EQUIP - New Member Class</h3>
                    <p class="course-description">Foundation courses for new members to establish their spiritual
                        journey with fundamental teachings and basic discipleship principles.</p>
                    <ul class="course-features">
                        <li><i class="fas fa-check-circle"></i>Foundation Class 1 - Keselamatan & Baptisan</li>
                        <li><i class="fas fa-check-circle"></i>Membership Class</li>
                    </ul>
                    <div class="course-status">
                        <span class="status-badge {{ $canAccessNew ? 'status-available' : 'status-locked' }}">{{
                            $canAccessNew ? 'Available' : 'Locked' }}</span>
                    </div>
                    @if(isset($user) && $user && !$canAccessNew)
                    @if($userAccessRequestNew && isset($userAccessRequestNew->status) && $userAccessRequestNew->status
                    === 'pending')
                    <div class="request-btn-container">
                        <a href="#" class="request-btn pending">
                            <i class="fas fa-clock request-btn-icon"></i> Sedang Diproses
                        </a>
                    </div>
                    @elseif($userAccessRequestNew && isset($userAccessRequestNew->status) &&
                    $userAccessRequestNew->status === 'rejected')
                    <div class="request-btn-container">
                        <a href="#" class="request-btn rejected" data-bs-toggle="modal"
                            data-bs-target="#requestFc1McModal" onclick="openFc1McModal()">
                            <i class="fas fa-redo request-btn-icon"></i> Request Ulang
                        </a>
                    </div>
                    @else
                    <div class="request-btn-container">
                        <a href="#" class="request-btn" data-bs-toggle="modal" data-bs-target="#requestFc1McModal"
                            onclick="openFc1McModal()">
                            <i class="fas fa-plus-circle request-btn-icon"></i> Request Kelas
                        </a>
                    </div>
                    @endif
                    @endif

                </div>
            </div>

            {{-- ESC EQUIP - Plant Class - Kategori: Plan --}}
            <div class="course-card plan-category" @php $userAccessRequestPlant=null; $canAccessPlant=false;
                if(isset($user) && $user){ $userAccessRequestPlant=\App\Models\Fc2Fc3Request::where('user_id', $user->
                id)
                ->where('status', '!=', 'rejected')
                ->latest()
                ->first();
                $canAccessPlant = $userAccessRequestPlant && isset($userAccessRequestPlant->status) &&
                $userAccessRequestPlant->status === 'approved';
                }
                @endphp
                @if($canAccessPlant)
                onclick="window.location='{{ route('equipPlant.index') }}'"
                @endif
                >
                <div class="course-image">
                    <img src="https://plus.unsplash.com/premium_photo-1675804669850-a1c3b87589d5?q=80&w=2340&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="Plant Class">
                    <div class="course-badge">Plan</div>
                </div>
                <div class="course-content">
                    <h3 class="course-title">ESC EQUIP - Plant Class</h3>
                    <p class="course-description">Intermediate level courses focusing on prayer and spiritual renewal to
                        deepen your relationship with God and strengthen your faith foundation.</p>
                    <ul class="course-features">
                        <li><i class="fas fa-check-circle"></i>Foundation Class 2 - Doa</li>
                        <li><i class="fas fa-check-circle"></i>Foundation Class 3 - Renewal Life</li>
                    </ul>
                    <div class="course-status">
                        <span class="status-badge {{ $canAccessPlant ? 'status-available' : 'status-locked' }}">
                            {{ $canAccessPlant ? 'Available' : 'Locked' }}
                        </span>
                    </div>
                    @if(isset($user) && $user && !$canAccessPlant)
                    @if($userAccessRequestPlant && isset($userAccessRequestPlant->status) &&
                    $userAccessRequestPlant->status === 'pending')
                    <div class="request-btn-container">
                        <a href="#" class="request-btn pending">
                            <i class="fas fa-clock request-btn-icon"></i> Sedang Diproses
                        </a>
                    </div>
                    @elseif($userAccessRequestPlant && isset($userAccessRequestPlant->status) &&
                    $userAccessRequestPlant->status === 'rejected')
                    <div class="request-btn-container">
                        <a href="#" class="request-btn rejected" data-bs-toggle="modal"
                            data-bs-target="#requestFc2Fc3Modal">
                            <i class="fas fa-redo request-btn-icon"></i> Request Ulang
                        </a>
                    </div>
                    @else
                    <div class="request-btn-container">
                        <a href="#" class="request-btn" data-bs-toggle="modal" data-bs-target="#requestFc2Fc3Modal">
                            <i class="fas fa-plus-circle request-btn-icon"></i> Request Kelas
                        </a>
                    </div>
                    @endif
                    @endif
                </div>
            </div>




            {{-- Modal Request Akses Grade 1 - The Cross --}}
            <div class="modal fade" id="requestGrade1Modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('grade1.requests.store') }}" id="requestGrade1Form">
                            @csrf
                            <div class="modal-header"
                                style="background: var(--gradient-primary); border-radius: 8px 8px 0 0;">
                                <h5 class="modal-title text-white">
                                    <i class="fas fa-user-graduate me-2"></i>Request Akses Grade 1 - The Cross
                                </h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Pilih Kelas <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" name="alasan" required>
                                        <option value="">Pilih kelas yang ingin diikuti</option>
                                        <option value="Grade 1 - The Cross">Grade 1 - The Cross</option>
                                    </select>
                                </div>
                                <div id="infoBoxGrade1" class="alert alert-info" style="display: none;">
                                    <i class="fas fa-info-circle me-2"></i>
                                    <strong>Info:</strong> Permohonan Anda akan ditinjau admin.
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary" id="submitBtnGrade1"
                                    style="background: var(--gradient-primary);border:none;">
                                    <i class="fas fa-paper-plane me-2"></i>Kirim Permintaan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- Modal Request Akses Grade 2 - The Power --}}
            <div class="modal fade" id="requestGrade2Modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('grade2.requests.store') }}" id="requestGrade2Form">
                            @csrf
                            <div class="modal-header"
                                style="background: var(--gradient-primary); border-radius: 8px 8px 0 0;">
                                <h5 class="modal-title text-white">
                                    <i class="fas fa-user-graduate me-2"></i>Request Akses Grade 2 - The Power
                                </h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Pilih Kelas <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" name="alasan" required>
                                        <option value="">Pilih kelas yang ingin diikuti</option>
                                        <option value="Grade 2 - The Power">Grade 2 - The Power</option>
                                    </select>
                                </div>
                                <div id="infoBoxGrade2" class="alert alert-info" style="display: none;">
                                    <i class="fas fa-info-circle me-2"></i>
                                    <strong>Info:</strong> Permohonan Anda akan ditinjau admin.
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary" id="submitBtnGrade2"
                                    style="background: var(--gradient-primary);border:none;">
                                    <i class="fas fa-paper-plane me-2"></i>Kirim Permintaan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- Modal Request Akses Grade 3 - The Eternity --}}
            <div class="modal fade" id="requestGrade3Modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('grade3.requests.store') }}" id="requestGrade3Form">
                            @csrf
                            <div class="modal-header"
                                style="background: var(--gradient-primary); border-radius: 8px 8px 0 0;">
                                <h5 class="modal-title text-white">
                                    <i class="fas fa-user-graduate me-2"></i>Request Akses Grade 3 - The Eternity
                                </h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Pilih Kelas <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" name="alasan" required>
                                        <option value="">Pilih kelas yang ingin diikuti</option>
                                        <option value="Grade 3 - The Eternity">Grade 3 - The Eternity</option>
                                    </select>
                                </div>
                                <div id="infoBoxGrade3" class="alert alert-info" style="display: none;">
                                    <i class="fas fa-info-circle me-2"></i>
                                    <strong>Info:</strong> Permohonan Anda akan ditinjau admin.
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary" id="submitBtnGrade3"
                                    style="background: var(--gradient-primary);border:none;">
                                    <i class="fas fa-paper-plane me-2"></i>Kirim Permintaan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- Modal Request Akses Marriage Class --}}
            <div class="modal fade" id="requestMarriageClassModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('marriage-class.requests.store') }}"
                            id="requestMarriageClassForm">
                            @csrf
                            <div class="modal-header"
                                style="background: var(--gradient-primary); border-radius: 8px 8px 0 0;">
                                <h5 class="modal-title text-white">
                                    <i class="fas fa-user-graduate me-2"></i>Request Akses Marriage Class
                                </h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Pilih Kelas <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" name="alasan" required>
                                        <option value="">Pilih kelas yang ingin diikuti</option>
                                        <option value="Marriage Class">Marriage Class</option>
                                    </select>
                                </div>
                                <div id="infoBoxMarriageClass" class="alert alert-info" style="display: none;">
                                    <i class="fas fa-info-circle me-2"></i>
                                    <strong>Info:</strong> Permohonan Anda akan ditinjau admin.
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary" id="submitBtnMarriageClass"
                                    style="background: var(--gradient-primary);border:none;">
                                    <i class="fas fa-paper-plane me-2"></i>Kirim Permintaan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="requestFc1McModal" tabindex="-1" aria-labelledby="requestFc1McModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('fc1mc.requests.store') }}" id="requestFc1McForm">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="requestFc1McModalLabel">Request Access FC1/MC</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="alasanFc1Mc" class="form-label">Pilih Kelas <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" id="alasanFc1Mc" name="alasan" required>
                                        <option value="">Pilih kelas</option>
                                        <option value="Foundation Class 1">Foundation Class 1</option>
                                        <option value="Membership Class">Membership Class</option>
                                    </select>
                                </div>
                                <div id="infoBoxFc1Mc" class="alert alert-info" style="display: none;">
                                    <i class="fas fa-info-circle me-2"></i>
                                    <strong>Info:</strong> Permohonan Anda akan diproses oleh admin.
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary" id="submitBtnFc1Mc">
                                    <i class="fas fa-paper-plane me-2"></i>Kirim Permintaan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Modal Request Akses FC2 & FC3 --}}
            <div class="modal fade" id="requestFc2Fc3Modal" tabindex="-1" aria-labelledby="requestFc2Fc3ModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('fc2fc3.requests.store') }}" id="requestFc2Fc3Form">
                            @csrf
                            <div class="modal-header"
                                style="background: var(--gradient-primary); border-radius: 8px 8px 0 0;">
                                <h5 class="modal-title text-white" id="requestFc2Fc3ModalLabel">
                                    <i class="fas fa-chalkboard-teacher me-2"></i>Request Akses FC2 &amp; FC3
                                </h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="alasanFc2Fc3" class="form-label fw-semibold">Pilih Kelas <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" id="alasanFc2Fc3" name="alasan" required>
                                        <option value="">Pilih kelas yang ingin diikuti</option>
                                        <option value="Foundation Class 2">Foundation Class 2</option>
                                        <option value="Foundation Class 3">Foundation Class 3</option>
                                    </select>
                                </div>
                                <div id="infoBoxFc2Fc3" class="alert alert-info" style="display: none;">
                                    <i class="fas fa-info-circle me-2"></i>
                                    <strong>Info:</strong> Permohonan Anda akan ditinjau dan diproses oleh admin.
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary" id="submitBtnFc2Fc3"
                                    style="background: var(--gradient-primary);border:none;">
                                    <i class="fas fa-paper-plane me-2"></i>Kirim Permintaan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Grade 1 - The Cross - Kategori: Grow -->
            <div class="course-card grow-category" @php $userReqGrade1=null; $canAccessGrade1=false; if(isset($user) &&
                $user){ $userReqGrade1=\App\Models\Grade1Request::where('user_id', $user->id)
                ->where('status', '!=', 'rejected')
                ->latest()
                ->first();
                $canAccessGrade1 = $userReqGrade1 && isset($userReqGrade1->status) && $userReqGrade1->status ===
                'approved';
                }
                @endphp
                >
                <div class="course-image">
                    <img src="https://images.unsplash.com/photo-1554523449-209945dde0c7?w=800"
                        alt="Grade 1 - The Cross">
                    <div class="course-badge">Grow</div>
                </div>
                <div class="course-content">
                    <h3 class="course-title">Grade 1 - The Cross</h3>
                    <p class="course-description">Langkah awal dalam pengenalan lebih dalam tentang karya salib Kristus.
                    </p>

                    <div class="course-status">
                        <span class="status-badge {{ $canAccessGrade1 ? 'status-available' : 'status-locked' }}">
                            {{ $canAccessGrade1 ? 'Available' : 'Locked' }}
                        </span>
                    </div>

                    @if(isset($user) && $user && !$canAccessGrade1)
                    @if(in_array($user->statusnextstep, ['grow-1', 'grow-2', 'grow-3']))
                    @if($userReqGrade1 && isset($userReqGrade1->status) && $userReqGrade1->status === 'pending')
                    <div class="request-btn-container">
                        <a href="#" class="request-btn pending">
                            <i class="fas fa-clock request-btn-icon"></i> Sedang Diproses
                        </a>
                    </div>
                    @elseif($userReqGrade1 && isset($userReqGrade1->status) && $userReqGrade1->status === 'rejected')
                    <div class="request-btn-container">
                        <a href="#" class="request-btn rejected" data-bs-toggle="modal"
                            data-bs-target="#requestGrade1Modal">
                            <i class="fas fa-redo request-btn-icon"></i> Request Ulang
                        </a>
                    </div>
                    @else
                    <div class="request-btn-container">
                        <a href="#" class="request-btn" data-bs-toggle="modal" data-bs-target="#requestGrade1Modal">
                            <i class="fas fa-plus-circle request-btn-icon"></i> Request Kelas
                        </a>
                    </div>
                    @endif
                    @else
                    <div class="request-btn-container">
                        <div class="access-info"
                            style="padding: 10px 15px; border-radius: 8px; background: rgba(245, 158, 11, 0.1); border: 1px solid rgba(245, 158, 11, 0.2); display: flex; align-items: center;">
                            <i class="fas fa-lock text-warning me-2"></i>
                            <span class="text-muted" style="font-size: 0.9em;">Terkunci (Syarat level kelas belum
                                terpenuhi)</span>
                        </div>
                    </div>
                    @endif
                    @endif
                </div>
            </div>
            <!-- Grade 2 - The Power - Kategori: Grow -->
            <div class="course-card grow-category" @php $userReqGrade2=null; $canAccessGrade2=false; if(isset($user) &&
                $user){ $userReqGrade2=\App\Models\Grade2Request::where('user_id', $user->id)
                ->where('status', '!=', 'rejected')
                ->latest()
                ->first();
                $canAccessGrade2 = $userReqGrade2 && isset($userReqGrade2->status) && $userReqGrade2->status ===
                'approved';
                }
                @endphp
                >
                <div class="course-image">
                    <img src="https://images.unsplash.com/photo-1493612276216-ee3925520721?w=800"
                        alt="Grade 2 - The Power">
                    <div class="course-badge">Grow</div>
                </div>
                <div class="course-content">
                    <h3 class="course-title">Grade 2 - The Power</h3>
                    <p class="course-description">Dapatkan impartasi kuasa Roh Kudus untuk kehidupan sehari-hari.</p>

                    <div class="course-status">
                        <span class="status-badge {{ $canAccessGrade2 ? 'status-available' : 'status-locked' }}">
                            {{ $canAccessGrade2 ? 'Available' : 'Locked' }}
                        </span>
                    </div>

                    @if(isset($user) && $user && !$canAccessGrade2)
                    @if(in_array($user->statusnextstep, ['grow-2', 'grow-3']))
                    @if($userReqGrade2 && isset($userReqGrade2->status) && $userReqGrade2->status === 'pending')
                    <div class="request-btn-container">
                        <a href="#" class="request-btn pending">
                            <i class="fas fa-clock request-btn-icon"></i> Sedang Diproses
                        </a>
                    </div>
                    @elseif($userReqGrade2 && isset($userReqGrade2->status) && $userReqGrade2->status === 'rejected')
                    <div class="request-btn-container">
                        <a href="#" class="request-btn rejected" data-bs-toggle="modal"
                            data-bs-target="#requestGrade2Modal">
                            <i class="fas fa-redo request-btn-icon"></i> Request Ulang
                        </a>
                    </div>
                    @else
                    <div class="request-btn-container">
                        <a href="#" class="request-btn" data-bs-toggle="modal" data-bs-target="#requestGrade2Modal">
                            <i class="fas fa-plus-circle request-btn-icon"></i> Request Kelas
                        </a>
                    </div>
                    @endif
                    @else
                    <div class="request-btn-container">
                        <div class="access-info"
                            style="padding: 10px 15px; border-radius: 8px; background: rgba(245, 158, 11, 0.1); border: 1px solid rgba(245, 158, 11, 0.2); display: flex; align-items: center;">
                            <i class="fas fa-lock text-warning me-2"></i>
                            <span class="text-muted" style="font-size: 0.9em;">Terkunci (Syarat level kelas belum
                                terpenuhi)</span>
                        </div>
                    </div>
                    @endif
                    @endif
                </div>
            </div>
            <!-- Grade 3 - The Eternity - Kategori: Grow -->
            <div class="course-card grow-category" @php $userReqGrade3=null; $canAccessGrade3=false; if(isset($user) &&
                $user){ $userReqGrade3=\App\Models\Grade3Request::where('user_id', $user->id)
                ->where('status', '!=', 'rejected')
                ->latest()
                ->first();
                $canAccessGrade3 = $userReqGrade3 && isset($userReqGrade3->status) && $userReqGrade3->status ===
                'approved';
                }
                @endphp
                >
                <div class="course-image">
                    <img src="https://images.unsplash.com/photo-1447014421976-7fec21d26d86?w=800"
                        alt="Grade 3 - The Eternity">
                    <div class="course-badge">Grow</div>
                </div>
                <div class="course-content">
                    <h3 class="course-title">Grade 3 - The Eternity</h3>
                    <p class="course-description">Perspektif kekekalan yang mengubah cara kita menjalani hidup saat ini.
                    </p>

                    <div class="course-status">
                        <span class="status-badge {{ $canAccessGrade3 ? 'status-available' : 'status-locked' }}">
                            {{ $canAccessGrade3 ? 'Available' : 'Locked' }}
                        </span>
                    </div>

                    @if(isset($user) && $user && !$canAccessGrade3)
                    @if(in_array($user->statusnextstep, ['grow-3']))
                    @if($userReqGrade3 && isset($userReqGrade3->status) && $userReqGrade3->status === 'pending')
                    <div class="request-btn-container">
                        <a href="#" class="request-btn pending">
                            <i class="fas fa-clock request-btn-icon"></i> Sedang Diproses
                        </a>
                    </div>
                    @elseif($userReqGrade3 && isset($userReqGrade3->status) && $userReqGrade3->status === 'rejected')
                    <div class="request-btn-container">
                        <a href="#" class="request-btn rejected" data-bs-toggle="modal"
                            data-bs-target="#requestGrade3Modal">
                            <i class="fas fa-redo request-btn-icon"></i> Request Ulang
                        </a>
                    </div>
                    @else
                    <div class="request-btn-container">
                        <a href="#" class="request-btn" data-bs-toggle="modal" data-bs-target="#requestGrade3Modal">
                            <i class="fas fa-plus-circle request-btn-icon"></i> Request Kelas
                        </a>
                    </div>
                    @endif
                    @else
                    <div class="request-btn-container">
                        <div class="access-info"
                            style="padding: 10px 15px; border-radius: 8px; background: rgba(245, 158, 11, 0.1); border: 1px solid rgba(245, 158, 11, 0.2); display: flex; align-items: center;">
                            <i class="fas fa-lock text-warning me-2"></i>
                            <span class="text-muted" style="font-size: 0.9em;">Terkunci (Syarat level kelas belum
                                terpenuhi)</span>
                        </div>
                    </div>
                    @endif
                    @endif
                </div>
            </div>
            <!-- Marriage Class - Kategori: Grow -->
            <div class="course-card grow-category" @php $userReqMarriageClass=null; $canAccessMarriageClass=false;
                if(isset($user) && $user){ $userReqMarriageClass=\App\Models\MarriageClassRequest::where('user_id',
                $user->id)
                ->where('status', '!=', 'rejected')
                ->latest()
                ->first();
                $canAccessMarriageClass = $userReqMarriageClass && isset($userReqMarriageClass->status) &&
                $userReqMarriageClass->status === 'approved';
                }
                @endphp
                >
                <div class="course-image">
                    <img src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=800" alt="Marriage Class">
                    <div class="course-badge">Grow</div>
                </div>
                <div class="course-content">
                    <h3 class="course-title">Marriage Class</h3>
                    <p class="course-description">Membangun pondasi pernikahan yang kuat berdasarkan prinsip Alkitab.
                    </p>

                    <div class="course-status">
                        <span class="status-badge {{ $canAccessMarriageClass ? 'status-available' : 'status-locked' }}">
                            {{ $canAccessMarriageClass ? 'Available' : 'Locked' }}
                        </span>
                    </div>

                    @if(isset($user) && $user && !$canAccessMarriageClass)
                    @if(in_array($user->statusnextstep, ['grow-1', 'grow-2', 'grow-3']))
                    @if($userReqMarriageClass && isset($userReqMarriageClass->status) && $userReqMarriageClass->status
                    === 'pending')
                    <div class="request-btn-container">
                        <a href="#" class="request-btn pending">
                            <i class="fas fa-clock request-btn-icon"></i> Sedang Diproses
                        </a>
                    </div>
                    @elseif($userReqMarriageClass && isset($userReqMarriageClass->status) &&
                    $userReqMarriageClass->status === 'rejected')
                    <div class="request-btn-container">
                        <a href="#" class="request-btn rejected" data-bs-toggle="modal"
                            data-bs-target="#requestMarriageClassModal">
                            <i class="fas fa-redo request-btn-icon"></i> Request Ulang
                        </a>
                    </div>
                    @else
                    <div class="request-btn-container">
                        <a href="#" class="request-btn" data-bs-toggle="modal"
                            data-bs-target="#requestMarriageClassModal">
                            <i class="fas fa-plus-circle request-btn-icon"></i> Request Kelas
                        </a>
                    </div>
                    @endif
                    @else
                    <div class="request-btn-container">
                        <div class="access-info"
                            style="padding: 10px 15px; border-radius: 8px; background: rgba(245, 158, 11, 0.1); border: 1px solid rgba(245, 158, 11, 0.2); display: flex; align-items: center;">
                            <i class="fas fa-lock text-warning me-2"></i>
                            <span class="text-muted" style="font-size: 0.9em;">Terkunci (Syarat level kelas belum
                                terpenuhi)</span>
                        </div>
                    </div>
                    @endif
                    @endif
                </div>
            </div>

        </div>

        <!-- ESC EQUIP - Fruitful Class - Kategori: Serve -->
        <div class="course-card serve-category" @if($user && isset($user->statusnextstep) && $user->statusnextstep ===
            'fruitfull')
            onclick="window.location='{{ route('equip') }}'"
            @endif
            >
            <div class="course-image">
                <img src="https://plus.unsplash.com/premium_photo-1715588659455-b8d873103e25?q=80&w=2340&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    alt="Fruitful Class">
                <div class="course-badge">Fruitful</div>
            </div>
            <div class="course-content">
                <h3 class="course-title">ESC EQUIP - Fruitful Class</h3>
                <p class="course-description">Expert level courses for leadership and volunteer development, preparing
                    you to serve and lead others in ministry and community.</p>
                <ul class="course-features">
                    <li><i class="fas fa-check-circle"></i>Volunteer Class</li>
                    <li><i class="fas fa-check-circle"></i>Leadership Class</li>
                    <li><i class="fas fa-check-circle"></i>Ministry Training</li>
                </ul>
                <div class="course-status">
                    @php
                    $canAccessFruitful = $user && isset($user->statusnextstep) && $user->statusnextstep === 'fruitfull';
                    @endphp
                    <span class="status-badge {{ $canAccessFruitful ? 'status-available' : 'status-locked' }}">{{
                        $canAccessFruitful ? 'Available' : 'Locked' }}</span>
                </div>
                @if($user && !$canAccessFruitful)
                <div class="request-btn-container">
                    <div class="access-info">
                        <i class="fas fa-tools text-warning me-2"></i>
                        <span class="text-muted">Kelas belum bisa diakses - Masih dalam tahap pengembangan</span>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    </div>
    </div>

    <!-- Modal Request Access -->
    <div class="modal fade" id="requestAccessModal" tabindex="-1" aria-labelledby="requestAccessModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('request-access.store') }}" id="requestAccessForm">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="requestAccessModalLabel">Request Access to <span
                                id="courseName">Kelas</span></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="alasan" class="form-label">Kelas yang akan diikuti? <span
                                    class="text-danger">*</span></label>
                            <select class="form-select" id="alasan" name="alasan" required>
                                <option value="">Pilih kelas</option>
                                <option value="Core Team Training (CTT)">Core Team Training! (CTT)</option>
                                <option value="Disciples Maker Training (DMT)">Disciples Maker Training (DMT)</option>
                            </select>
                            <div class="form-text">Pilih salah satu kelas</div>
                        </div>
                        <div id="infoBox" class="alert alert-info" style="display: none;">
                            <i class="fas fa-info-circle me-2"></i>
                            <strong>Info:</strong> Permohonan Anda akan diproses secepatnya oleh tim admin. Mohon tunggu
                            notifikasi selanjutnya.
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" id="submitBtn">
                            <i class="fas fa-paper-plane me-2"></i>Kirim Permintaan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const fc1mcStoreUrl = "{{ route('fc1mc.requests.store') }}";
        const fc2fc3StoreUrl = "{{ route('fc2fc3.requests.store') }}";
        const dcStoreUrl = "{{ route('request-access.store') }}";

        const Grade1StoreUrl = "{{ route('grade1.requests.store') }}";
        document.addEventListener('DOMContentLoaded', function () {
            const formEl = document.getElementById('requestGrade1Form');
            if (formEl) {
                formEl.addEventListener('submit', function (e) {
                    e.preventDefault();
                    const infoBox = document.getElementById('infoBoxGrade1');
                    const submitBtn = document.getElementById('submitBtnGrade1');
                    const origText = submitBtn.innerHTML;
                    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

                    infoBox.style.display = 'block';
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Mengirim...';
                    submitBtn.disabled = true;

                    fetch(Grade1StoreUrl, {
                        method: 'POST',
                        body: new FormData(this),
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    }).then(r => r.ok ? r.json() : Promise.reject(r)).then(() => {
                        submitBtn.innerHTML = origText;
                        submitBtn.disabled = false;
                        bootstrap.Modal.getInstance(document.getElementById('requestGrade1Modal')).hide();
                        Swal.fire({
                            icon: 'success', title: 'Permintaan Dikirim!',
                            text: 'Akses Grade 1 - The Cross sedang diproses admin.',
                            confirmButtonColor: '#10b981'
                        });
                        formEl.reset(); infoBox.style.display = 'none';
                    }).catch(() => {
                        formEl.submit();
                    });
                });
            }
        });
        const Grade2StoreUrl = "{{ route('grade2.requests.store') }}";
        document.addEventListener('DOMContentLoaded', function () {
            const formEl = document.getElementById('requestGrade2Form');
            if (formEl) {
                formEl.addEventListener('submit', function (e) {
                    e.preventDefault();
                    const infoBox = document.getElementById('infoBoxGrade2');
                    const submitBtn = document.getElementById('submitBtnGrade2');
                    const origText = submitBtn.innerHTML;
                    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

                    infoBox.style.display = 'block';
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Mengirim...';
                    submitBtn.disabled = true;

                    fetch(Grade2StoreUrl, {
                        method: 'POST',
                        body: new FormData(this),
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    }).then(r => r.ok ? r.json() : Promise.reject(r)).then(() => {
                        submitBtn.innerHTML = origText;
                        submitBtn.disabled = false;
                        bootstrap.Modal.getInstance(document.getElementById('requestGrade2Modal')).hide();
                        Swal.fire({
                            icon: 'success', title: 'Permintaan Dikirim!',
                            text: 'Akses Grade 2 - The Power sedang diproses admin.',
                            confirmButtonColor: '#10b981'
                        });
                        formEl.reset(); infoBox.style.display = 'none';
                    }).catch(() => {
                        formEl.submit();
                    });
                });
            }
        });
        const Grade3StoreUrl = "{{ route('grade3.requests.store') }}";
        document.addEventListener('DOMContentLoaded', function () {
            const formEl = document.getElementById('requestGrade3Form');
            if (formEl) {
                formEl.addEventListener('submit', function (e) {
                    e.preventDefault();
                    const infoBox = document.getElementById('infoBoxGrade3');
                    const submitBtn = document.getElementById('submitBtnGrade3');
                    const origText = submitBtn.innerHTML;
                    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

                    infoBox.style.display = 'block';
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Mengirim...';
                    submitBtn.disabled = true;

                    fetch(Grade3StoreUrl, {
                        method: 'POST',
                        body: new FormData(this),
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    }).then(r => r.ok ? r.json() : Promise.reject(r)).then(() => {
                        submitBtn.innerHTML = origText;
                        submitBtn.disabled = false;
                        bootstrap.Modal.getInstance(document.getElementById('requestGrade3Modal')).hide();
                        Swal.fire({
                            icon: 'success', title: 'Permintaan Dikirim!',
                            text: 'Akses Grade 3 - The Eternity sedang diproses admin.',
                            confirmButtonColor: '#10b981'
                        });
                        formEl.reset(); infoBox.style.display = 'none';
                    }).catch(() => {
                        formEl.submit();
                    });
                });
            }
        });
        const MarriageClassStoreUrl = "{{ route('marriage-class.requests.store') }}";
        document.addEventListener('DOMContentLoaded', function () {
            const formEl = document.getElementById('requestMarriageClassForm');
            if (formEl) {
                formEl.addEventListener('submit', function (e) {
                    e.preventDefault();
                    const infoBox = document.getElementById('infoBoxMarriageClass');
                    const submitBtn = document.getElementById('submitBtnMarriageClass');
                    const origText = submitBtn.innerHTML;
                    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

                    infoBox.style.display = 'block';
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Mengirim...';
                    submitBtn.disabled = true;

                    fetch(MarriageClassStoreUrl, {
                        method: 'POST',
                        body: new FormData(this),
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    }).then(r => r.ok ? r.json() : Promise.reject(r)).then(() => {
                        submitBtn.innerHTML = origText;
                        submitBtn.disabled = false;
                        bootstrap.Modal.getInstance(document.getElementById('requestMarriageClassModal')).hide();
                        Swal.fire({
                            icon: 'success', title: 'Permintaan Dikirim!',
                            text: 'Akses Marriage Class sedang diproses admin.',
                            confirmButtonColor: '#10b981'
                        });
                        formEl.reset(); infoBox.style.display = 'none';
                    }).catch(() => {
                        formEl.submit();
                    });
                });
            }
        });

        // ── AJAX handler untuk form FC2 & FC3 ──
        document.addEventListener('DOMContentLoaded', function () {
            const fc2fc3Form = document.getElementById('requestFc2Fc3Form');
            if (fc2fc3Form) {
                fc2fc3Form.addEventListener('submit', function (e) {
                    e.preventDefault();
                    const infoBox = document.getElementById('infoBoxFc2Fc3');
                    const submitBtn = document.getElementById('submitBtnFc2Fc3');
                    const origText = submitBtn.innerHTML;
                    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

                    infoBox.style.display = 'block';
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Mengirim...';
                    submitBtn.disabled = true;

                    fetch(fc2fc3StoreUrl, {
                        method: 'POST',
                        body: new FormData(this),
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                        .then(r => r.ok ? r.json() : Promise.reject(r))
                        .then(() => {
                            submitBtn.innerHTML = origText;
                            submitBtn.disabled = false;
                            bootstrap.Modal.getInstance(document.getElementById('requestFc2Fc3Modal')).hide();
                            Swal.fire({
                                icon: 'success',
                                title: 'Permintaan Berhasil Dikirim!',
                                text: 'Permohonan akses FC2 & FC3 Anda telah diterima dan akan diproses oleh admin.',
                                confirmButtonColor: '#0ea5e9',
                                background: '#ffffff',
                                backdrop: 'rgba(0,0,0,0.4)',
                                customClass: { popup: 'rounded-3', title: 'fw-bold' }
                            });
                            fc2fc3Form.reset();
                            infoBox.style.display = 'none';
                        })
                        .catch(() => {
                            submitBtn.innerHTML = origText;
                            submitBtn.disabled = false;
                            fc2fc3Form.submit();
                        });
                });
            }
        });

        // Navbar scroll effect with enhanced animation
        window.addEventListener('scroll', function () {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Initialize animations when DOM is loaded
        document.addEventListener('DOMContentLoaded', function () {
            // Add animation to nav items
            const navItems = document.querySelectorAll('.nav-item');
            navItems.forEach((item, index) => {
                item.style.opacity = '0';
                item.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    item.style.transition = 'all 0.4s ease';
                    item.style.opacity = '1';
                    item.style.transform = 'translateY(0)';
                }, 100 + (index * 100));
            });

            // Add hover effect to nav links
            const navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(link => {
                link.addEventListener('mouseenter', function () {
                    this.querySelector('.nav-icon').style.transform = 'scale(1.2) rotate(5deg)';
                });
                link.addEventListener('mouseleave', function () {
                    this.querySelector('.nav-icon').style.transform = 'scale(1) rotate(0)';
                });
            });

            // Add animation to user profile
            const userProfile = document.querySelector('.user-profile');
            if (userProfile) {
                userProfile.style.opacity = '0';
                userProfile.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    userProfile.style.transition = 'all 0.5s ease';
                    userProfile.style.opacity = '1';
                    userProfile.style.transform = 'translateY(0)';
                }, 500);
            }

            // Add pulse animation to brand logo
            const brandLogo = document.querySelector('.brand-logo-container');
            if (brandLogo) {
                setInterval(() => {
                    brandLogo.classList.add('pulse-animation');
                    setTimeout(() => {
                        brandLogo.classList.remove('pulse-animation');
                    }, 1000);
                }, 5000);
            }
        });

        function showSwal(message) {
            Swal.fire({
                icon: 'warning',
                title: 'Access Restricted',
                text: message,
                confirmButtonColor: '#4f46e5',
                background: '#ffffff',
                backdrop: 'rgba(0,0,0,0.4)',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown animate__faster'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp animate__faster'
                },
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
                showClass: {
                    popup: 'animate__animated animate__fadeInDown animate__faster'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp animate__faster'
                },
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

        // Handle form request access
        document.getElementById('requestAccessForm').addEventListener('submit', function (e) {
            e.preventDefault();

            // Tampilkan info box
            const infoBox = document.getElementById('infoBox');
            infoBox.style.display = 'block';
            infoBox.style.opacity = '0';
            infoBox.style.transform = 'translateY(-10px)';

            // Animasi fade in
            setTimeout(() => {
                infoBox.style.transition = 'all 0.3s ease';
                infoBox.style.opacity = '1';
                infoBox.style.transform = 'translateY(0)';
            }, 100);

            const formData = new FormData(this);

            // Debug: log form data
            console.log('Form data:', Object.fromEntries(formData));

            // Get CSRF token
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
            console.log('CSRF Token:', csrfToken);

            // Try AJAX first, fallback to traditional form if fails
            if (window.fetch && csrfToken) {
                // Show loading state
                const submitBtn = document.getElementById('submitBtn');
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Mengirim...';
                submitBtn.disabled = true;

                fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                    .then(response => {
                        console.log('Response status:', response.status);
                        console.log('Response headers:', response.headers);

                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }

                        return response.json();
                    })
                    .then(data => {
                        console.log('Success response:', data);

                        // Reset button state
                        submitBtn.innerHTML = originalText;
                        submitBtn.disabled = false;

                        // Tutup modal
                        const modal = bootstrap.Modal.getInstance(document.getElementById('requestAccessModal'));
                        modal.hide();

                        // Tampilkan notifikasi sukses
                        Swal.fire({
                            icon: 'success',
                            title: 'Permintaan Berhasil Dikirim!',
                            text: 'Permohonan akses Anda telah diterima dan akan diproses secepatnya oleh tim admin. Mohon tunggu notifikasi selanjutnya.',
                            confirmButtonColor: '#4f46e5',
                            background: '#ffffff',
                            backdrop: 'rgba(0,0,0,0.4)',
                            showClass: {
                                popup: 'animate__animated animate__fadeInDown animate__faster'
                            },
                            customClass: {
                                popup: 'rounded-3',
                                title: 'fw-bold'
                            }
                        });

                        // Reset form
                        this.reset();

                        // Sembunyikan info box
                        infoBox.style.display = 'none';
                    })
                    .catch(error => {
                        console.error('AJAX Error:', error);
                        console.log('Falling back to traditional form submission...');

                        // Reset button state
                        submitBtn.innerHTML = originalText;
                        submitBtn.disabled = false;

                        // Fallback: submit form traditionally
                        this.submit();
                    });
            } else {
                // Fallback: submit form traditionally
                console.log('Fetch not supported or CSRF token missing, using traditional form submission');
                this.submit();
            }
        });

        // Handle traditional form submission success message
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Permintaan Berhasil Dikirim!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#4f46e5',
                background: '#ffffff',
                backdrop: 'rgba(0,0,0,0.4)',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown animate__faster'
                },
                customClass: {
                    popup: 'rounded-3',
                    title: 'fw-bold'
                }
            });
        @endif

        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Terjadi Kesalahan',
                text: '{{ session('error') }}',
                confirmButtonColor: '#4f46e5',
                background: '#ffffff',
                backdrop: 'rgba(0,0,0,0.4)'
            });
        @endif

        // Category filter functionality
        document.addEventListener('DOMContentLoaded', function () {
            const categoryPills = document.querySelectorAll('.category-pill');
            const courseCards = document.querySelectorAll('.course-card');
            const courseGrid = document.querySelector('.course-grid');

            categoryPills.forEach(pill => {
                pill.addEventListener('click', function () {
                    // Remove active class from all pills
                    categoryPills.forEach(p => p.classList.remove('active'));
                    // Add active class to clicked pill
                    this.classList.add('active');

                    const selectedCategory = this.textContent.toLowerCase();

                    // Count visible cards
                    let visibleCardCount = 0;
                    let firstVisibleCard = null;

                    // Show/hide cards based on category
                    courseCards.forEach(card => {
                        if (selectedCategory === 'all') {
                            // Show all cards
                            card.style.display = 'block';
                            card.style.animation = 'fadeInUp 0.6s ease forwards';
                            visibleCardCount++;
                            if (!firstVisibleCard) firstVisibleCard = card;
                        } else {
                            // Check if card belongs to selected category
                            let shouldShow = false;

                            if (selectedCategory === 'serve') {
                                // Show cards with serve-category class
                                shouldShow = card.classList.contains('serve-category');
                            } else if (selectedCategory === 'new') {
                                // Show cards with new-category class
                                shouldShow = card.classList.contains('new-category');
                            } else if (selectedCategory === 'plan') {
                                // Show cards with plan-category class
                                shouldShow = card.classList.contains('plan-category');
                            } else if (selectedCategory === 'grow') {
                                // Show cards with grow-category class
                                shouldShow = card.classList.contains('grow-category');
                            }

                            if (shouldShow) {
                                card.style.display = 'block';
                                card.style.animation = 'fadeInUp 0.6s ease forwards';
                                visibleCardCount++;
                                if (!firstVisibleCard) firstVisibleCard = card;
                            } else {
                                card.style.display = 'none';
                            }
                        }
                    });

                    // Update grid layout classes
                    courseGrid.classList.remove('filtered', 'single-card');

                    if (visibleCardCount === 1) {
                        courseGrid.classList.add('single-card');
                    } else if (visibleCardCount < courseCards.length) {
                        courseGrid.classList.add('filtered');
                    }
                });
            });

            // Debug: Log found request buttons
            const requestButtons = document.querySelectorAll('[onclick*="openRequestModal"]');
            console.log('Found request buttons with onclick:', requestButtons.length);

            // Debug modal functionality
            console.log('Modal element:', document.getElementById('requestAccessModal'));
            console.log('Bootstrap available:', typeof bootstrap !== 'undefined');

            // Test modal functionality
            const testModal = document.getElementById('requestAccessModal');
            if (testModal) {
                console.log('Modal found, testing Bootstrap integration...');

                // Check if modal can be initialized
                try {
                    const bsModal = new bootstrap.Modal(testModal);
                    console.log('Bootstrap modal initialized successfully');
                } catch (error) {
                    console.error('Error initializing Bootstrap modal:', error);
                }
            } else {
                console.error('Modal element not found!');
            }

            // Function to open request modal
            window.openRequestModal = function (courseName) {
                console.log('Opening modal for course:', courseName);

                // Update modal title
                document.getElementById('courseName').textContent = courseName;
                var formEl = document.getElementById('requestAccessForm');
                if (formEl) {
                    if (courseName && courseName.indexOf('New Member Class') !== -1) {
                        formEl.setAttribute('action', fc1mcStoreUrl);
                    } else {
                        formEl.setAttribute('action', dcStoreUrl);
                    }
                }

                // Show modal using Bootstrap
                try {
                    const modalElement = document.getElementById('requestAccessModal');
                    if (modalElement && typeof bootstrap !== 'undefined') {
                        const modal = new bootstrap.Modal(modalElement);
                        modal.show();
                        console.log('Modal opened successfully');
                    } else {
                        console.error('Modal element or Bootstrap not available');
                        // Fallback: try to show modal manually
                        modalElement.style.display = 'block';
                        modalElement.classList.add('show');
                        modalElement.setAttribute('aria-hidden', 'false');
                    }
                } catch (error) {
                    console.error('Error opening modal:', error);
                }
            };

            function openFc1McModal() {
                const modalElement = document.getElementById('requestFc1McModal');
                if (modalElement && typeof bootstrap !== 'undefined') {
                    const modal = new bootstrap.Modal(modalElement);
                    modal.show();
                }
            }

            const fc1FormEl = document.getElementById('requestFc1McForm');
            if (fc1FormEl) {
                fc1FormEl.addEventListener('submit', function (e) {
                    e.preventDefault();
                    const infoBox = document.getElementById('infoBoxFc1Mc');
                    infoBox.style.display = 'block';
                    infoBox.style.opacity = '0';
                    infoBox.style.transform = 'translateY(-10px)';
                    setTimeout(() => {
                        infoBox.style.transition = 'all 0.3s ease';
                        infoBox.style.opacity = '1';
                        infoBox.style.transform = 'translateY(0)';
                    }, 100);
                    const formData = new FormData(this);
                    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
                    const submitBtn = document.getElementById('submitBtnFc1Mc');
                    const originalText = submitBtn.innerHTML;
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Mengirim...';
                    submitBtn.disabled = true;
                    fetch("{{ route('fc1mc.requests.store') }}", {
                        method: 'POST',
                        body: formData,
                        headers: { 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' }
                    })
                        .then(response => {
                            if (!response.ok) throw new Error(`HTTP error ${response.status}`);
                            return response.json();
                        })
                        .then(data => {
                            submitBtn.innerHTML = originalText;
                            submitBtn.disabled = false;
                            const modal = bootstrap.Modal.getInstance(document.getElementById('requestFc1McModal'));
                            modal.hide();
                            Swal.fire({ icon: 'success', title: 'Permintaan Berhasil Dikirim!', text: 'Permohonan akses Anda telah diterima.', confirmButtonColor: '#4f46e5' });
                            this.reset();
                            infoBox.style.display = 'none';
                        })
                        .catch(error => {
                            submitBtn.innerHTML = originalText;
                            submitBtn.disabled = false;
                            this.submit();
                        });
                });
            }
            // Function to close status banner
            window.closeBanner = function () {
                const banner = document.getElementById('statusBanner');
                if (banner) {
                    banner.style.opacity = '0';
                    banner.style.transform = 'translateY(-20px)';
                    setTimeout(() => {
                        banner.style.display = 'none';
                    }, 300);
                }
            };

            // Auto-hide banners based on time
            document.addEventListener('DOMContentLoaded', function () {
                const banner = document.getElementById('statusBanner');
                if (banner) {
                    const bannerType = banner.className.includes('approved') ? 'approved' :
                        banner.className.includes('rejected') ? 'rejected' : 'pending';

                    let autoHideDelay;

                    if (bannerType === 'approved') {
                        // Auto-hide approved banner after 30 seconds (for demo purposes)
                        // In production, this would be based on the actual approval time
                        autoHideDelay = 30000;
                    } else if (bannerType === 'rejected') {
                        // Auto-hide rejected banner after 20 seconds
                        autoHideDelay = 20000;
                    } else if (bannerType === 'pending') {
                        // Pending banner stays until manually closed or status changes
                        return;
                    }

                    setTimeout(() => {
                        closeBanner();
                    }, autoHideDelay);
                }
            });
        });
    </script>
    <!-- Hidden logout form for POST method -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</body>

</html>