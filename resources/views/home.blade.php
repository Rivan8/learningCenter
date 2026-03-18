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
        /* ============================================
           ESC EQUIP CENTER - PREMIUM LMS DESIGN
        ============================================ */
        :root {
            --primary: #1e3a8a;
            --primary-light: #3b82f6;
            --primary-dark: #172554;
            --accent: #c9a227;
            --accent-light: #f0c040;
            --accent-soft: rgba(201, 162, 39, 0.12);
            --success: #059669;
            --warning: #d97706;
            --danger: #dc2626;
            --text-dark: #0f172a;
            --text-mid: #334155;
            --text-light: #64748b;
            --border: #e2e8f0;
            --bg-page: #f4f6fb;
            --bg-card: #ffffff;
            --shadow-sm: 0 2px 8px rgba(15, 23, 42, .06);
            --shadow-md: 0 8px 30px rgba(15, 23, 42, .08);
            --shadow-lg: 0 20px 50px rgba(15, 23, 42, .10);
            --g-primary: linear-gradient(135deg, #1e3a8a 0%, #2d4fa1 50%, #312e81 100%);
            --g-gold: linear-gradient(135deg, #c9a227 0%, #e8c547 100%);
            --g-success: linear-gradient(135deg, #059669 0%, #10b981 100%);
            --g-warning: linear-gradient(135deg, #d97706 0%, #f59e0b 100%);
            --g-danger: linear-gradient(135deg, #dc2626 0%, #ef4444 100%);
            /* backward-compat aliases for modals */
            --gradient-primary: var(--g-primary);
            --gradient-secondary: var(--g-gold);
            --gradient-success: var(--g-success);
            --gradient-warning: var(--g-warning);
            --gradient-info: linear-gradient(135deg, #0284c7 0%, #38bdf8 100%);
            --primary-color: var(--primary);
            --accent-color: var(--accent);
            --text-secondary: var(--text-light);
            --card-bg: var(--bg-card);
            --border-color: var(--border);
            --soft-green: rgba(16, 185, 129, .1);
            --soft-pink: rgba(239, 68, 68, .1);
            --soft-yellow: rgba(245, 158, 11, .1);
            --font-heading: 'Playfair Display', serif;
            --font-body: 'Inter', sans-serif;
            --radius-sm: 8px;
            --radius-md: 14px;
            --radius-lg: 20px;
            --radius-xl: 28px;
        }

        *,
        *::before,
        *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: var(--font-body);
            background: var(--bg-page);
            background-image:
                radial-gradient(ellipse at 0% 0%, rgba(201, 162, 39, .07) 0, transparent 55%),
                radial-gradient(ellipse at 100% 100%, rgba(30, 58, 138, .07) 0, transparent 55%);
            background-attachment: fixed;
            min-height: 100vh;
            color: var(--text-dark);
            line-height: 1.65;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .hero-title,
        .course-title {
            font-family: var(--font-heading);
        }

        /* ── NAVBAR ── */
        .navbar {
            background: rgba(15, 23, 42, .15) !important;
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border-bottom: 1px solid rgba(255, 255, 255, .12);
            padding: .9rem 0;
            transition: all .35s ease;
        }

        .navbar.scrolled {
            background: rgba(255, 255, 255, .97) !important;
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border-bottom: 1px solid var(--border);
            box-shadow: 0 4px 24px rgba(15, 23, 42, .08);
        }

        .brand-logo-container {
            width: 42px;
            height: 42px;
            background: var(--g-primary);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 16px rgba(30, 58, 138, .35);
            overflow: hidden;
            transition: all .3s ease;
            flex-shrink: 0;
        }

        .brand-logo-container:hover {
            transform: scale(1.05) rotate(-3deg);
        }

        .brand-logo {
            width: 28px;
            height: 28px;
            object-fit: contain;
        }

        .brand-text {
            font-family: var(--font-body);
            font-weight: 800;
            font-size: 1.2rem;
            background: linear-gradient(135deg, #fff 0%, rgba(255, 255, 255, .85) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            filter: drop-shadow(0 1px 4px rgba(0, 0, 0, .25));
            transition: all .3s ease;
            letter-spacing: -.3px;
        }

        .navbar.scrolled .brand-text {
            background: var(--g-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            filter: none;
        }

        .navbar-nav {
            margin-left: 1.5rem;
        }

        .nav-item {
            margin: 0 .2rem;
        }

        .nav-link {
            color: rgba(255, 255, 255, .92) !important;
            font-weight: 600;
            font-size: .9rem;
            padding: .6rem 1rem !important;
            border-radius: 10px;
            transition: all .25s ease;
            display: flex;
            align-items: center;
            gap: 7px;
            letter-spacing: .1px;
        }

        .nav-link:hover,
        .nav-link.active {
            color: #fff !important;
            background: rgba(255, 255, 255, .18);
            transform: translateY(-1px);
        }

        .navbar.scrolled .nav-link {
            color: var(--text-mid) !important;
        }

        .navbar.scrolled .nav-link:hover,
        .navbar.scrolled .nav-link.active {
            color: var(--primary) !important;
            background: rgba(30, 58, 138, .07);
        }

        .nav-icon {
            font-size: .9rem;
            transition: transform .25s ease;
        }

        .nav-link:hover .nav-icon {
            transform: scale(1.15);
        }

        /* User Profile */
        .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 7px 14px;
            border-radius: 50px;
            background: rgba(0, 0, 0, .2);
            border: 1px solid rgba(255, 255, 255, .28);
            backdrop-filter: blur(12px);
            cursor: pointer;
            transition: all .3s ease;
            box-shadow: 0 4px 16px rgba(0, 0, 0, .18);
        }

        .user-profile:hover {
            background: rgba(0, 0, 0, .3);
            transform: translateY(-2px);
            box-shadow: 0 8px 22px rgba(0, 0, 0, .22);
        }

        .navbar.scrolled .user-profile {
            background: rgba(30, 58, 138, .07);
            border: 1px solid rgba(30, 58, 138, .15);
        }

        .navbar.scrolled .user-profile:hover {
            background: rgba(30, 58, 138, .12);
            box-shadow: 0 8px 22px rgba(30, 58, 138, .12);
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            object-fit: cover;
            border: 2px solid rgba(255, 255, 255, .4);
            transition: all .3s ease;
        }

        .user-profile:hover .user-avatar {
            border-radius: 50%;
        }

        .navbar.scrolled .user-avatar {
            border-color: rgba(30, 58, 138, .3);
        }

        .user-info {
            display: flex;
            flex-direction: column;
        }

        .user-name {
            font-weight: 700;
            color: #fff;
            font-size: .87rem;
            line-height: 1.2;
            transition: color .3s ease;
        }

        .user-role {
            font-size: .72rem;
            color: rgba(255, 255, 255, .8);
            font-weight: 500;
            transition: color .3s ease;
        }

        .navbar.scrolled .user-name {
            color: var(--text-dark);
        }

        .navbar.scrolled .user-role {
            color: var(--text-light);
        }

        /* Dropdown */
        .dropdown-menu {
            border: none;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-lg), 0 0 0 1px rgba(30, 58, 138, .06);
            padding: .75rem 0;
            margin-top: .75rem;
            background: rgba(255, 255, 255, .98);
            backdrop-filter: blur(20px);
            min-width: 270px;
        }

        .dropdown-header {
            padding: .8rem 1.25rem;
            color: var(--text-dark);
        }

        .dropdown-user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            object-fit: cover;
            border: 2px solid var(--primary);
        }

        .dropdown-item {
            padding: .7rem 1.25rem;
            color: var(--text-mid);
            font-weight: 500;
            font-size: .9rem;
            transition: all .2s ease;
            border-radius: 8px;
            margin: 1px 8px;
        }

        .dropdown-item:hover {
            background: rgba(30, 58, 138, .07);
            color: var(--primary);
            padding-left: 1.5rem;
        }

        .dropdown-item i {
            color: var(--text-light);
            transition: color .2s ease;
            width: 18px;
        }

        .dropdown-item:hover i {
            color: var(--primary);
        }

        /* Mobile Nav */
        .navbar-toggler {
            border: 1px solid rgba(255, 255, 255, .3);
            background: rgba(0, 0, 0, .22);
            color: white;
            border-radius: 10px;
            padding: .55rem .75rem;
            transition: all .3s ease;
        }

        .navbar-toggler:focus {
            box-shadow: none;
            outline: none;
        }

        .navbar.scrolled .navbar-toggler {
            background: rgba(30, 58, 138, .08);
            border-color: rgba(30, 58, 138, .2);
            color: var(--primary);
        }

        @media (max-width: 991.98px) {
            .navbar-collapse {
                background: rgba(255, 255, 255, .98);
                margin-top: 1rem;
                border-radius: var(--radius-lg);
                padding: 1rem;
                box-shadow: var(--shadow-lg);
                max-height: 80vh;
                overflow-y: auto;
            }

            .navbar-nav {
                margin-left: 0;
                margin-bottom: .75rem;
            }

            .nav-link {
                color: var(--text-mid) !important;
                padding: .75rem 1rem !important;
            }

            .nav-link:hover,
            .nav-link.active {
                color: var(--primary) !important;
                background: rgba(30, 58, 138, .07);
                transform: none;
            }

            .user-profile {
                margin-top: .5rem;
                width: 100%;
                justify-content: center;
                background: rgba(30, 58, 138, .07);
                border-color: rgba(30, 58, 138, .15);
                transform: none;
            }

            .user-info {
                display: flex !important;
            }

            .user-name {
                color: var(--text-dark);
            }

            .user-role {
                color: var(--text-light);
            }
        }

        /* ── HERO SECTION ── */
        .hero-wrapper {
            position: relative;
            background: var(--g-primary);
            border-radius: var(--radius-xl);
            padding: 70px 60px;
            margin-bottom: 50px;
            overflow: hidden;
            min-height: 340px;
            display: flex;
            align-items: center;
        }

        .hero-wrapper::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(ellipse at 80% 50%, rgba(201, 162, 39, .22) 0, transparent 60%),
                radial-gradient(ellipse at 10% 80%, rgba(49, 46, 129, .5) 0, transparent 50%);
            pointer-events: none;
        }

        .hero-wrapper::after {
            content: '';
            position: absolute;
            right: -60px;
            top: -60px;
            width: 380px;
            height: 380px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .04);
            pointer-events: none;
        }

        .hero-deco-ring {
            position: absolute;
            right: 80px;
            bottom: -80px;
            width: 280px;
            height: 280px;
            border: 40px solid rgba(255, 255, 255, .04);
            border-radius: 50%;
            pointer-events: none;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 640px;
        }

        .hero-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--accent-light);
            font-size: .82rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 16px;
        }

        .hero-eyebrow i {
            font-size: .9rem;
        }

        .hero-title {
            font-size: clamp(2.2rem, 4vw, 3.2rem);
            font-weight: 800;
            color: #ffffff;
            line-height: 1.15;
            margin-bottom: 18px;
            text-shadow: 0 2px 20px rgba(0, 0, 0, .15);
        }

        .hero-title span {
            color: var(--accent-light);
        }

        .hero-subtitle {
            font-size: 1.05rem;
            color: rgba(255, 255, 255, .78);
            line-height: 1.75;
            max-width: 540px;
            margin-bottom: 32px;
            font-family: var(--font-body);
        }

        .hero-actions {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
        }

        .btn-hero-primary {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            background: var(--g-gold);
            color: #fff !important;
            padding: 13px 30px;
            border-radius: 50px;
            font-weight: 700;
            font-size: .95rem;
            text-decoration: none;
            border: none;
            box-shadow: 0 6px 22px rgba(201, 162, 39, .45);
            transition: all .3s ease;
            letter-spacing: .2px;
        }

        .btn-hero-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 32px rgba(201, 162, 39, .5);
        }

        .btn-hero-secondary {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            background: rgba(255, 255, 255, .12);
            color: #fff !important;
            padding: 13px 30px;
            border-radius: 50px;
            font-weight: 600;
            font-size: .95rem;
            text-decoration: none;
            border: 1px solid rgba(255, 255, 255, .3);
            backdrop-filter: blur(6px);
            transition: all .3s ease;
        }

        .btn-hero-secondary:hover {
            background: rgba(255, 255, 255, .22);
            transform: translateY(-3px);
            border-color: rgba(255, 255, 255, .5);
        }

        .hero-stats-row {
            display: flex;
            gap: 32px;
            margin-top: 36px;
            padding-top: 28px;
            border-top: 1px solid rgba(255, 255, 255, .15);
        }

        .hero-stat {
            text-align: left;
        }

        .hero-stat-num {
            font-size: 1.7rem;
            font-weight: 800;
            color: var(--accent-light);
            font-family: var(--font-heading);
            line-height: 1;
        }

        .hero-stat-label {
            font-size: .78rem;
            color: rgba(255, 255, 255, .65);
            font-weight: 500;
            margin-top: 3px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .hero-graphic {
            position: absolute;
            right: 55px;
            top: 50%;
            transform: translateY(-50%);
            z-index: 2;
            display: flex;
            flex-direction: column;
            gap: 16px;
            pointer-events: none;
        }

        .hero-badge-card {
            background: rgba(255, 255, 255, .12);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, .2);
            border-radius: 14px;
            padding: 16px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 200px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, .15);
        }

        .hero-badge-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            flex-shrink: 0;
        }

        .hero-badge-icon.gold {
            background: rgba(201, 162, 39, .3);
            color: var(--accent-light);
        }

        .hero-badge-icon.blue {
            background: rgba(59, 130, 246, .3);
            color: #93c5fd;
        }

        .hero-badge-icon.green {
            background: rgba(16, 185, 129, .3);
            color: #6ee7b7;
        }

        .hero-badge-text-top {
            font-size: .78rem;
            color: rgba(255, 255, 255, .6);
            font-weight: 500;
        }

        .hero-badge-text-main {
            font-size: .95rem;
            color: #fff;
            font-weight: 700;
        }

        @media (max-width: 1100px) {
            .hero-graphic {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .hero-wrapper {
                padding: 44px 28px 40px;
                min-height: auto;
                border-radius: var(--radius-lg);
            }

            .hero-title {
                font-size: 2rem;
            }

            .hero-stats-row {
                gap: 20px;
                flex-wrap: wrap;
            }
        }

        /* ── SECTION HEADER ── */
        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 28px;
        }

        .section-title-group {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .section-eyebrow {
            font-size: .78rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2.5px;
            color: var(--accent);
        }

        .section-title {
            font-family: var(--font-heading);
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--primary-dark);
            line-height: 1.2;
        }

        /* ── CATEGORY PILLS ── */
        .category-pills {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 36px;
            padding: 6px;
            background: var(--bg-card);
            border-radius: 50px;
            box-shadow: var(--shadow-sm);
            width: fit-content;
            margin-left: auto;
            margin-right: auto;
            border: 1px solid var(--border);
        }

        .category-pill {
            padding: 8px 22px;
            background: transparent;
            border-radius: 50px;
            font-weight: 600;
            color: var(--text-light);
            cursor: pointer;
            transition: all .25s ease;
            font-size: .88rem;
            border: none;
            letter-spacing: .2px;
        }

        .category-pill:hover {
            color: var(--primary);
            background: rgba(30, 58, 138, .06);
        }

        .category-pill.active {
            background: var(--g-primary);
            color: #fff;
            box-shadow: 0 4px 14px rgba(30, 58, 138, .3);
        }

        /* ── STATUS BANNER ── */
        .status-banner {
            border-radius: var(--radius-md);
            padding: 18px 22px;
            margin-bottom: 28px;
            position: relative;
            overflow: hidden;
            border-left: 5px solid var(--border);
            box-shadow: var(--shadow-sm);
            background: var(--bg-card);
            transition: all .3s ease;
        }

        .pending-banner {
            border-left-color: var(--warning);
            background: linear-gradient(135deg, #fffbeb 0%, #fff 100%);
        }

        .approved-banner {
            border-left-color: var(--success);
            background: linear-gradient(135deg, #ecfdf5 0%, #fff 100%);
        }

        .rejected-banner {
            border-left-color: var(--danger);
            background: linear-gradient(135deg, #fef2f2 0%, #fff 100%);
        }

        .banner-content {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .banner-icon {
            width: 46px;
            height: 46px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            flex-shrink: 0;
        }

        .pending-banner .banner-icon {
            background: rgba(217, 119, 6, .12);
            color: var(--warning);
        }

        .approved-banner .banner-icon {
            background: rgba(5, 150, 105, .12);
            color: var(--success);
        }

        .rejected-banner .banner-icon {
            background: rgba(220, 38, 38, .12);
            color: var(--danger);
        }

        .banner-text {
            flex: 1;
            min-width: 0;
        }

        .banner-title {
            margin: 0 0 4px;
            font-size: 1rem;
            font-weight: 700;
            color: var(--text-dark);
            font-family: var(--font-body);
        }

        .banner-description {
            margin: 0;
            font-size: .9rem;
            color: var(--text-mid);
            line-height: 1.5;
        }

        .banner-action {
            flex-shrink: 0;
            margin-left: 12px;
        }

        .banner-close {
            position: absolute;
            top: 12px;
            right: 14px;
            background: none;
            border: none;
            color: var(--text-light);
            cursor: pointer;
            font-size: 1.1rem;
            opacity: .5;
            transition: opacity .2s ease;
            padding: 2px 5px;
            border-radius: 4px;
        }

        .banner-close:hover {
            opacity: 1;
            background: rgba(0, 0, 0, .04);
        }

        .banner-progress {
            margin-left: 8px;
            flex-shrink: 0;
        }

        .progress-ring {
            width: 42px;
            height: 42px;
        }

        .progress-circle {
            width: 100%;
            height: 100%;
            border: 3px solid var(--border);
            border-top: 3px solid var(--primary);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        .pending-banner .progress-circle {
            border-top-color: var(--warning);
        }

        .approved-banner .progress-circle {
            border-top-color: var(--success);
        }

        .rejected-banner .progress-circle {
            border-top-color: var(--danger);
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        @media (max-width: 768px) {
            .banner-content {
                flex-wrap: wrap;
            }

            .banner-action,
            .banner-progress {
                margin: 8px 0 0;
            }
        }

        /* ── COURSE GRID ── */
        .course-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 24px;
            margin-top: 8px;
        }

        /* ── COURSE CARD ── */
        .course-card {
            background: var(--bg-card);
            border-radius: var(--radius-md);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border);
            transition: all .35s cubic-bezier(.22, 1, .36, 1);
            display: flex;
            flex-direction: column;
            cursor: pointer;
            position: relative;
        }

        .course-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-lg);
            border-color: rgba(201, 162, 39, .35);
        }

        .course-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--g-gold);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform .35s ease;
        }

        .course-card:hover::after {
            transform: scaleX(1);
        }

        /* Card Image */
        .course-image {
            position: relative;
            width: 100%;
            height: 200px;
            overflow: hidden;
            background: #e2e8f0;
        }

        .course-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .6s ease;
        }

        .course-card:hover .course-image img {
            transform: scale(1.07);
        }

        .course-image-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, transparent 50%, rgba(15, 23, 42, .5) 100%);
        }

        .course-badge {
            position: absolute;
            top: 14px;
            left: 14px;
            padding: 5px 12px;
            border-radius: 50px;
            font-size: .7rem;
            font-weight: 800;
            letter-spacing: 1.2px;
            text-transform: uppercase;
            z-index: 2;
        }

        .badge-new {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .badge-plan {
            background: #ede9fe;
            color: #6d28d9;
        }

        .badge-grow {
            background: #d1fae5;
            color: #065f46;
        }

        .badge-serve {
            background: #fef3c7;
            color: #92400e;
        }

        .badge-default {
            background: rgba(255, 255, 255, .9);
            color: var(--primary);
        }

        .badge-fruitful {
            background: #fce7f3;
            color: #9d174d;
        }

        /* Card Content */
        .course-content {
            padding: 22px;
            display: flex;
            flex-direction: column;
            gap: 14px;
            flex: 1;
        }

        .course-meta {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .course-level-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--accent);
        }

        .course-level-text {
            font-size: .78rem;
            color: var(--text-light);
            font-weight: 600;
        }

        .course-title {
            font-size: 1.2rem;
            color: var(--primary-dark);
            font-weight: 700;
            margin: 0;
            line-height: 1.35;
        }

        .course-description {
            font-size: .88rem;
            color: var(--text-light);
            line-height: 1.65;
            margin: 0;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .course-features {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 7px;
            padding-top: 12px;
            border-top: 1px solid var(--border);
        }

        .course-features li {
            display: flex;
            align-items: center;
            gap: 9px;
            font-size: .85rem;
            color: var(--text-mid);
        }

        .course-features li i {
            color: var(--accent);
            font-size: .85rem;
            width: 16px;
        }

        .course-footer {
            margin-top: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 14px;
            border-top: 1px solid var(--border);
        }

        /* Status Badge */
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 5px 12px;
            border-radius: 50px;
            font-size: .72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .6px;
        }

        .status-badge::before {
            content: '';
            width: 6px;
            height: 6px;
            border-radius: 50%;
            display: inline-block;
        }

        .status-available {
            background: #d1fae5;
            color: #065f46;
        }

        .status-available::before {
            background: #10b981;
            animation: pulse-dot 1.5s infinite;
        }

        .status-locked {
            background: #f1f5f9;
            color: var(--text-light);
        }

        .status-locked::before {
            background: #94a3b8;
        }

        @keyframes pulse-dot {

            0%,
            100% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: .5;
                transform: scale(.7);
            }
        }

        /* Access Info Box */
        .access-info {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px 14px;
            border-radius: 8px;
            background: #f8fafc;
            border: 1px dashed var(--border);
            font-size: .82rem;
            color: var(--text-light);
        }

        .access-info i {
            color: var(--warning);
            font-size: .85rem;
        }

        /* Request Button Container */
        .request-btn-container {
            text-align: center;
            padding-top: 14px;
            margin-top: 4px;
            border-top: 1px dashed rgba(201, 162, 39, .2);
        }

        /* Request Buttons */
        .request-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 24px;
            border-radius: 50px;
            font-weight: 700;
            font-size: .88rem;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: all .3s ease;
            position: relative;
            overflow: hidden;
            letter-spacing: .2px;
            background: var(--g-gold);
            color: #fff !important;
            box-shadow: 0 4px 14px rgba(201, 162, 39, .3);
        }

        .request-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, .22), transparent);
            transition: left .5s;
        }

        .request-btn:hover::before {
            left: 100%;
        }

        .request-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 22px rgba(201, 162, 39, .4);
            color: #fff !important;
        }

        .request-btn.pending {
            background: var(--g-warning);
            box-shadow: 0 4px 14px rgba(217, 119, 6, .25);
            cursor: default;
        }

        .request-btn.approved {
            background: var(--g-success);
            box-shadow: 0 4px 14px rgba(5, 150, 105, .25);
        }

        .request-btn.rejected {
            background: var(--g-danger);
            box-shadow: 0 4px 14px rgba(220, 38, 38, .25);
        }

        .request-btn-icon {
            font-size: .9rem;
            transition: transform .3s ease;
        }

        .request-btn:hover .request-btn-icon {
            transform: scale(1.15) rotate(5deg);
        }

        /* ── MAIN CONTAINER ── */
        .main-container {
            padding: 2.5rem 0 4rem;
        }

        @media (max-width: 768px) {
            .course-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .section-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .main-container {
                padding: 1.5rem 0 3rem;
            }
        }

        @media (min-width: 769px) and (max-width: 1100px) {
            .course-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>

<body>

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
    <div class="main-container" style="margin-top: 80px;">
        <div class="container">
            <!-- ── HERO BANNER ── -->
            <div class="hero-wrapper animate__animated animate__fadeIn">
                <div class="hero-deco-ring"></div>
                <div class="hero-content">
                    <div class="hero-eyebrow">
                        <i class="fas fa-cross"></i>
                        Pusat Pelatihan Rohani
                    </div>
                    <h1 class="hero-title">ESC <span>Equip</span> Center</h1>
                    <p class="hero-subtitle">Membangun fondasi rohani yang kokoh dan melatih pemimpin yang berdampak
                        melalui pembelajaran Firman Tuhan yang mendalam, terstruktur, dan transformatif.</p>
                    <div class="hero-actions">
                        <a href="#course-section" class="btn-hero-primary">
                            <i class="fas fa-graduation-cap"></i> Mulai Belajar
                        </a>
                        <a href="#" class="btn-hero-secondary">
                            <i class="fas fa-info-circle"></i> Tentang Program
                        </a>
                    </div>
                    <div class="hero-stats-row">
                        <div class="hero-stat">
                            <div class="hero-stat-num">7+</div>
                            <div class="hero-stat-label">Program Kelas</div>
                        </div>
                        <div class="hero-stat">
                            <div class="hero-stat-num">4</div>
                            <div class="hero-stat-label">Jalur Belajar</div>
                        </div>
                        <div class="hero-stat">
                            <div class="hero-stat-num">∞</div>
                            <div class="hero-stat-label">Dampak Kekal</div>
                        </div>
                    </div>
                </div>
                <!-- Graphic cards (hidden on mobile) -->
                <div class="hero-graphic">
                    <div class="hero-badge-card">
                        <div class="hero-badge-icon gold"><i class="fas fa-book-open"></i></div>
                        <div>
                            <div class="hero-badge-text-top">Program</div>
                            <div class="hero-badge-text-main">Foundation Class</div>
                        </div>
                    </div>
                    <div class="hero-badge-card">
                        <div class="hero-badge-icon blue"><i class="fas fa-users"></i></div>
                        <div>
                            <div class="hero-badge-text-top">Komunitas</div>
                            <div class="hero-badge-text-main">Discipleship</div>
                        </div>
                    </div>
                    <div class="hero-badge-card">
                        <div class="hero-badge-icon green"><i class="fas fa-leaf"></i></div>
                        <div>
                            <div class="hero-badge-text-top">Jalur</div>
                            <div class="hero-badge-text-main">Grow &amp; Serve</div>
                        </div>
                    </div>
                </div>
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
        <div id="course-section">
            <div class="section-header mb-0">
                <div class="section-title-group">
                    <span class="section-eyebrow">Program Tersedia</span>
                    <h2 class="section-title">Pilih Jalur Belajarmu</h2>
                </div>
            </div>
        </div>
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
                    <div class="course-image-overlay"></div>
                    <span class="course-badge badge-serve">Discipleship</span>
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
                    <div class="course-footer">
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
                    <div class="course-image-overlay"></div><span class="course-badge badge-new">Foundation</span>
                </div>
                <div class="course-content">
                    <h3 class="course-title">ESC EQUIP - New Member Class</h3>
                    <p class="course-description">Foundation courses for new members to establish their spiritual
                        journey with fundamental teachings and basic discipleship principles.</p>
                    <ul class="course-features">
                        <li><i class="fas fa-check-circle"></i>Foundation Class 1 - Keselamatan & Baptisan</li>
                        <li><i class="fas fa-check-circle"></i>Membership Class</li>
                    </ul>
                    <div class="course-footer">
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
                            data-bs-target="#requestFc1McModal">
                            <i class="fas fa-redo request-btn-icon"></i> Request Ulang
                        </a>
                    </div>
                    @else
                    <div class="request-btn-container">
                        <a href="#" class="request-btn" data-bs-toggle="modal" data-bs-target="#requestFc1McModal">
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
                    <div class="course-image-overlay"></div><span class="course-badge badge-plan">Plan</span>
                </div>
                <div class="course-content">
                    <h3 class="course-title">ESC EQUIP - Plant Class</h3>
                    <p class="course-description">Intermediate level courses focusing on prayer and spiritual renewal to
                        deepen your relationship with God and strengthen your faith foundation.</p>
                    <ul class="course-features">
                        <li><i class="fas fa-check-circle"></i>Foundation Class 2 - Doa</li>
                        <li><i class="fas fa-check-circle"></i>Foundation Class 3 - Renewal Life</li>
                    </ul>
                    <div class="course-footer">
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
                @if($canAccessGrade1)
                onclick="window.location='{{ route('equipGrow.grade1') }}'"
                @endif
                >
                <div class="course-image">
                    <img src="https://images.unsplash.com/photo-1554523449-209945dde0c7?w=800"
                        alt="Grade 1 - The Cross">
                    <div class="course-image-overlay"></div><span class="course-badge badge-grow">Grow</span>
                </div>
                <div class="course-content">
                    <h3 class="course-title">Grade 1 - The Cross</h3>
                    <p class="course-description">Langkah awal dalam pengenalan lebih dalam tentang karya salib Kristus.
                    </p>

                    <div class="course-footer">
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
                    <div class="course-image-overlay"></div><span class="course-badge badge-grow">Grow</span>
                </div>
                <div class="course-content">
                    <h3 class="course-title">Grade 2 - The Power</h3>
                    <p class="course-description">Dapatkan impartasi kuasa Roh Kudus untuk kehidupan sehari-hari.</p>

                    <div class="course-footer">
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
                    <div class="course-image-overlay"></div><span class="course-badge badge-grow">Grow</span>
                </div>
                <div class="course-content">
                    <h3 class="course-title">Grade 3 - The Eternity</h3>
                    <p class="course-description">Perspektif kekekalan yang mengubah cara kita menjalani hidup saat ini.
                    </p>

                    <div class="course-footer">
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
                    <div class="course-image-overlay"></div><span class="course-badge badge-grow">Grow</span>
                </div>
                <div class="course-content">
                    <h3 class="course-title">Marriage Class</h3>
                    <p class="course-description">Membangun pondasi pernikahan yang kuat berdasarkan prinsip Alkitab.
                    </p>

                    <div class="course-footer">
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

            <!-- ESC EQUIP - Fruitful Class - Kategori: Serve -->
            <div class="course-card serve-category" @if($user && isset($user->statusnextstep) && $user->statusnextstep ===
                'fruitfull')
                onclick="window.location='{{ route('equip') }}'"
                @endif
                >
                <div class="course-image">
                    <img src="https://plus.unsplash.com/premium_photo-1715588659455-b8d873103e25?q=80&w=2340&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="Fruitful Class">
                    <div class="course-image-overlay"></div>
                    <span class="course-badge badge-fruitful">Fruitful</span>
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
                    <div class="course-footer">
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

            // Function openFc1McModal removed as it's unneeded due to HTML data-attributes

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
    </script>
    <!-- Hidden logout form for POST method -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</body>

</html>