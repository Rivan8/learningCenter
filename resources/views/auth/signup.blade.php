<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register • ESC Equip</title>
    <meta name="description" content="Daftar sebagai member ESC Equip Learning Center dan mulai perjalanan discipleship Anda.">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        :root {
            --p1: #4f46e5;
            --p2: #7c3aed;
            --p3: #0ea5e9;
            --ink: #0f172a;
            --muted: #6b7280;
            --card: #ffffff;
            --success: #10b981;
            --danger: #ef4444;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        html, body { height: 100%; }

        body {
            min-height: 100vh;
            font-family: 'Inter', system-ui, -apple-system, Arial, sans-serif;
            color: var(--ink);
            background: radial-gradient(1400px 600px at 90% 0%, #eef2ff 0%, #f8fafc 50%, #ffffff 100%);
            overflow-x: hidden;
        }

        /* ── Animated Orbs ── */
        .bg-orb { position: fixed; inset: 0; pointer-events: none; z-index: 0; }
        .orb { position: absolute; filter: blur(70px); opacity: .35; border-radius: 50%; }
        .orb.o1 { width: 520px; height: 520px; right: -120px; top: -120px; background: conic-gradient(from 140deg, var(--p1), var(--p2)); animation: drift1 18s ease-in-out infinite; }
        .orb.o2 { width: 460px; height: 460px; left: -140px; bottom: -160px; background: conic-gradient(from -40deg, var(--p3), var(--p1)); animation: drift2 22s ease-in-out infinite; }
        .orb.o3 { width: 360px; height: 360px; right: 55%; top: 15%; background: radial-gradient(circle at 70% 30%, var(--p2), transparent 60%); animation: drift3 26s ease-in-out infinite; }
        @keyframes drift1 { 0% { transform: translate(0,0) scale(1); } 50% { transform: translate(-40px, 20px) scale(1.06); } 100% { transform: translate(0,0) scale(1); } }
        @keyframes drift2 { 0% { transform: translate(0,0) scale(1); } 50% { transform: translate(30px,-25px) scale(1.05); } 100% { transform: translate(0,0) scale(1); } }
        @keyframes drift3 { 0% { transform: translate(0,0) scale(1); } 50% { transform: translate(25px, 35px) scale(1.08); } 100% { transform: translate(0,0) scale(1); } }

        /* ── Layout ── */
        .signup-wrap {
            min-height: 100vh;
            display: grid;
            grid-template-columns: 1fr 1.15fr;
            position: relative;
            z-index: 1;
        }

        /* ── Form Side (left) ── */
        .form-side {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 28px;
        }

        /* ── Card Signup ── */
        .card-signup {
            width: 100%;
            max-width: 500px;
            border-radius: 24px;
            background: var(--card);
            border: 1px solid rgba(2, 6, 23, .06);
            box-shadow: 0 25px 60px rgba(15, 23, 42, .09);
            padding: 32px 30px 28px;
            position: relative;
            isolation: isolate;
            animation: cardRise 0.55s cubic-bezier(.22,1,.36,1) both;
        }

        @keyframes cardRise {
            from { opacity: 0; transform: translateY(28px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .card-signup::before {
            content: "";
            position: absolute;
            inset: -2px;
            border-radius: 26px;
            padding: 2px;
            background: linear-gradient(90deg, rgba(124,58,237,.4), rgba(79,70,229,.4), rgba(14,165,233,.4));
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            opacity: .3;
            z-index: -1;
        }

        /* ── Card Header ── */
        .card-head { display: flex; align-items: center; justify-content: space-between; margin-bottom: 4px; }
        .card-title { font-size: 22px; font-weight: 800; color: var(--ink); }
        .chip {
            background: linear-gradient(90deg, rgba(124,58,237,.12), rgba(79,70,229,.12));
            color: #4c1d95;
            border-radius: 999px;
            padding: 5px 12px;
            font-weight: 700;
            font-size: 11px;
            border: 1px solid rgba(124,58,237,.25);
        }
        .card-desc { color: var(--muted); font-size: 13.5px; margin-bottom: 16px; }

        /* ── Alert ── */
        .alert-custom {
            padding: 10px 14px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
            animation: fadeIn .3s ease;
        }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(-6px); } to { opacity: 1; transform: translateY(0); } }
        .alert-danger-c  { background: #fef2f2; color: #b91c1c; border: 1px solid #fecaca; }
        .alert-success-c { background: #f0fdf4; color: #15803d; border: 1px solid #bbf7d0; }

        /* ── Grid 2-col for some fields ── */
        .field-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 0 14px; }

        /* ── Input Group ── */
        .input-group-c { position: relative; margin-bottom: 13px; }
        .form-label-c {
            display: block;
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .6px;
            color: #374151;
            margin-bottom: 5px;
        }
        .input-group-c input,
        .input-group-c select {
            width: 100%;
            border-radius: 13px;
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            padding: 11px 14px 11px 42px;
            font-size: 14px;
            font-family: 'Inter', sans-serif;
            color: #0b1221;
            outline: none;
            transition: border-color .2s, box-shadow .2s, background .2s;
            appearance: none;
            -webkit-appearance: none;
        }
        .input-group-c select {
            padding-left: 42px;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24'%3E%3Cpath fill='%236b7280' d='M7 10l5 5 5-5H7z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            padding-right: 36px;
            cursor: pointer;
        }
        .input-group-c input::placeholder { color: #9ca3af; }
        .input-group-c input:focus,
        .input-group-c select:focus {
            border-color: var(--p2);
            box-shadow: 0 0 0 4px rgba(124,58,237,.13);
            background: #fff;
        }
        .input-icon {
            position: absolute;
            left: 13px;
            bottom: 12px;
            width: 17px;
            height: 17px;
            opacity: .55;
            color: #4b5563;
            pointer-events: none;
        }
        .toggle-icon {
            position: absolute;
            right: 13px;
            bottom: 12px;
            width: 20px;
            height: 20px;
            cursor: pointer;
            opacity: .55;
            color: #4b5563;
            transition: opacity .2s;
        }
        .toggle-icon:hover { opacity: .9; }

        /* ── Submit Btn ── */
        .btn-register {
            width: 100%;
            border-radius: 14px;
            background: linear-gradient(90deg, var(--p2), var(--p1));
            border: none;
            font-weight: 800;
            font-family: 'Inter', sans-serif;
            letter-spacing: .3px;
            font-size: 15px;
            padding: 13px 16px;
            color: #fff;
            box-shadow: 0 12px 24px rgba(79,70,229,.25);
            transition: transform .12s ease, filter .2s ease, box-shadow .2s;
            cursor: pointer;
            margin-top: 6px;
        }
        .btn-register:hover {
            filter: brightness(1.06);
            transform: translateY(-1px);
            box-shadow: 0 16px 32px rgba(79,70,229,.3);
        }
        .btn-register:active { transform: translateY(0); }

        .divider { display: flex; align-items: center; gap: 12px; color: #94a3b8; font-size: 12px; margin: 14px 0 10px; }
        .divider .line { flex: 1; height: 1px; background: #e5e7eb; }

        .login-link { text-align: center; font-size: 13.5px; color: #6b7280; }
        .login-link a { color: var(--p1); text-decoration: none; font-weight: 700; }
        .login-link a:hover { text-decoration: underline; }

        /* ── Hero Side (right) ── */
        .hero {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 56px;
        }

        .hero-card {
            width: 100%;
            max-width: 580px;
            background: linear-gradient(135deg, rgba(79,70,229,.18), rgba(14,165,233,.18));
            border: 1px solid rgba(255,255,255,.3);
            box-shadow: 0 25px 60px rgba(79,70,229,.25);
            border-radius: 28px;
            padding: 36px;
            color: #fff;
            backdrop-filter: blur(12px);
            transform-style: preserve-3d;
            transition: transform .22s ease;
        }

        .brand { display: flex; align-items: center; gap: 14px; margin-bottom: 12px; }
        .brand h1 { font-size: 24px; font-weight: 900; letter-spacing: .4px; margin: 0; color: var(--ink); }

        .brand-badge {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            background: linear-gradient(135deg, var(--p1), var(--p2));
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 20px rgba(79,70,229,.4);
            flex-shrink: 0;
        }
        .brand-badge svg { width: 28px; height: 28px; color: #fff; }

        .hero-title { font-size: 34px; font-weight: 900; line-height: 1.13; margin: 10px 0 12px; color: var(--ink); }
        .hero-subtitle { font-size: 15px; color: #475569; min-height: 22px; margin-bottom: 20px; }

        .steps { display: flex; flex-direction: column; gap: 10px; }
        .step {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 13px 15px;
            border-radius: 14px;
            background: rgba(255,255,255,.65);
            border: 1px solid rgba(255,255,255,.8);
            backdrop-filter: blur(6px);
            transition: transform .2s;
        }
        .step:hover { transform: translateX(4px); }
        .step-icon {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 18px;
        }
        .step-icon.blue  { background: rgba(79,70,229,.15); }
        .step-icon.purple{ background: rgba(124,58,237,.15); }
        .step-icon.cyan  { background: rgba(14,165,233,.15); }
        .step-icon.green { background: rgba(16,185,129,.15); }
        .step-body strong { font-size: 14px; font-weight: 700; color: var(--ink); display: block; }
        .step-body span   { font-size: 12px; color: #475569; }

        /* ── Responsive ── */
        @media (max-width: 1200px) { .signup-wrap { grid-template-columns: 1fr 1fr; } }
        @media (max-width: 992px) {
            .signup-wrap { grid-template-columns: 1fr; }
            .hero { padding: 28px 22px; order: -1; }
            .hero-card { max-width: 720px; }
            .form-side { padding-top: 4px; }
        }
        @media (max-width: 576px) {
            .hero-title { font-size: 26px; }
            .brand h1   { font-size: 18px; }
            .card-signup { padding: 24px 18px 20px; }
            .field-grid  { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

    {{-- Animated background orbs --}}
    <div class="bg-orb">
        <div class="orb o1"></div>
        <div class="orb o2"></div>
        <div class="orb o3"></div>
    </div>

    <div class="signup-wrap">

        {{-- ════════ FORM SIDE (left) ════════ --}}
        <div class="form-side">
            <div class="card-signup">

                {{-- Header --}}
                <div class="card-head">
                    <h2 class="card-title">Buat Akun</h2>
                    <span class="chip">✦ Registrasi</span>
                </div>
                <p class="card-desc">Isi form di bawah untuk bergabung sebagai member ESC Equip</p>

                {{-- Alerts --}}
                @if(session('error'))
                    <div class="alert-custom alert-danger-c" role="alert">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/></svg>
                        {{ session('error') }}
                    </div>
                @endif
                @if(session('success'))
                    <div class="alert-custom alert-success-c" role="alert">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Also support old $_SESSION style --}}
                @php
                    if (isset($_SESSION['error'])) {
                        $oldErr = $_SESSION['error'];
                        unset($_SESSION['error']);
                    }
                    if (isset($_SESSION['success'])) {
                        $oldSuc = $_SESSION['success'];
                        unset($_SESSION['success']);
                    }
                @endphp
                @isset($oldErr)
                    <div class="alert-custom alert-danger-c" role="alert">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/></svg>
                        {{ $oldErr }}
                    </div>
                @endisset
                @isset($oldSuc)
                    <div class="alert-custom alert-success-c" role="alert">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                        {{ $oldSuc }}
                    </div>
                @endisset

                {{-- Form --}}
                <form action="{{ route('store.member') }}" method="POST" id="registration-form" autocomplete="off">
                    @csrf

                    {{-- Nama Lengkap --}}
                    <label for="name" class="form-label-c">Nama Lengkap</label>
                    <div class="input-group-c">
                        <svg class="input-icon" viewBox="0 0 24 24"><path fill="currentColor" d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/></svg>
                        <input type="text" id="name" name="name" placeholder="Nama lengkap Anda" value="{{ old('name') }}" required>
                    </div>

                    {{-- Email --}}
                    <label for="email" class="form-label-c">Email</label>
                    <div class="input-group-c">
                        <svg class="input-icon" viewBox="0 0 24 24"><path fill="currentColor" d="M2 6.5A2.5 2.5 0 0 1 4.5 4h15A2.5 2.5 0 0 1 22 6.5v11A2.5 2.5 0 0 1 19.5 20h-15A2.5 2.5 0 0 1 2 17.5v-11Zm2.5-.5a.5.5 0 0 0-.5.5v.52l8 5.33l8-5.33V6.5a.5.5 0 0 0-.5-.5h-15Zm15 3.79l-7.42 4.94a1 1 0 0 1-1.16 0L3.5 9.79V17.5a.5.5 0 0 0 .5.5h15a.5.5 0 0 0 .5-.5V9.79Z"/></svg>
                        <input type="email" id="email" name="email" placeholder="email@contoh.com" value="{{ old('email') }}" required>
                    </div>

                    {{-- No HP & Password row --}}
                    <div class="field-grid">
                        <div>
                            <label for="no_hp" class="form-label-c">No. Telepon</label>
                            <div class="input-group-c">
                                <svg class="input-icon" viewBox="0 0 24 24"><path fill="currentColor" d="M6.6 10.8c1.4 2.8 3.8 5.1 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.6.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1-9.4 0-17-7.6-17-17 0-.6.4-1 1-1h3.5c.6 0 1 .4 1 1 0 1.3.2 2.5.6 3.6.1.3 0 .7-.2 1L6.6 10.8z"/></svg>
                                <input type="tel" id="no_hp" name="no_hp" placeholder="08xxxxxxxxxx" value="{{ old('no_hp') }}" required>
                            </div>
                        </div>
                        <div>
                            <label for="password" class="form-label-c">Password</label>
                            <div class="input-group-c" style="position:relative;">
                                <svg class="input-icon" viewBox="0 0 24 24"><path fill="currentColor" d="M17 8V7a5 5 0 1 0-10 0v1H5v13h14V8h-2Zm-8 0V7a3 3 0 1 1 6 0v1H9Zm3 6a2 2 0 1 0 0 4a2 2 0 0 0 0-4Z"/></svg>
                                <input type="password" id="password" name="password" placeholder="••••••••" required>
                                <svg class="toggle-icon" id="togglePassword" viewBox="0 0 24 24" title="Tampilkan password">
                                    <path fill="currentColor" d="M12 6C7 6 2.73 9.11 1 12c1.73 2.89 6 6 11 6s9.27-3.11 11-6c-1.73-2.89-6-6-11-6Zm0 10a4 4 0 1 1 0-8a4 4 0 0 1 0 8Z"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    {{-- Hidden role --}}
                    <input type="hidden" name="role" value="member">

                    {{-- Status row --}}
                    <div class="field-grid">
                        <div>
                            <label for="statusanggota" class="form-label-c">Jenjang Status</label>
                            <div class="input-group-c">
                                <svg class="input-icon" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2l2.4 7.4H22l-6.2 4.5 2.4 7.4L12 17l-6.2 3.9 2.4-7.4L2 9.4h7.6L12 2z"/></svg>
                                <select id="statusanggota" name="statusanggota" required>
                                    <option value="belum" {{ old('statusanggota','belum')=='belum'?'selected':'' }}>Anggota</option>
                                    <option value="Core Team" {{ old('statusanggota')=='Core Team'?'selected':'' }}>Core Team</option>
                                    <option value="DM" {{ old('statusanggota')=='DM'?'selected':'' }}>Disciples Maker</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label for="statusnextstep" class="form-label-c">Status Next Step</label>
                            <div class="input-group-c">
                                <svg class="input-icon" viewBox="0 0 24 24"><path fill="currentColor" d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 14l-5-5 1.41-1.41L12 14.17l7.59-7.59L21 8l-9 9z"/></svg>
                                <select id="statusnextstep" name="statusnextstep" required>
                                    <option value="new" {{ old('statusnextstep','new')=='new'?'selected':'' }}>New</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <button type="submit" name="register" class="btn-register" id="registerBtn">
                        <span id="btnText">Buat Akun Sekarang</span>
                    </button>
                </form>

                <div class="divider"><span class="line"></span><span>atau</span><span class="line"></span></div>
                <div class="login-link">Sudah punya akun? <a href="{{ route('show.login') }}">Masuk di sini</a></div>
            </div>
        </div>

        {{-- ════════ HERO SIDE (right) ════════ --}}
        <div class="hero">
            <div class="hero-card" id="heroCard">
                <div class="brand">
                    <div class="brand-badge">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
                    </div>
                    <h1>ESC Equip Learning Center</h1>
                </div>
                <div class="hero-title">Bergabung &amp; Bertumbuh Bersama Komunitas</div>
                <div class="hero-subtitle">
                    <span id="rotator">Mulai perjalanan discipleship Anda hari ini</span>
                </div>
                <div class="steps">
                    <div class="step">
                        <div class="step-icon blue">📖</div>
                        <div class="step-body">
                            <strong>Discipleship Class</strong>
                            <span>Bertumbuh dalam pemahaman firman Tuhan secara mendalam</span>
                        </div>
                    </div>
                    <div class="step">
                        <div class="step-icon purple">🏛️</div>
                        <div class="step-body">
                            <strong>Foundation Class</strong>
                            <span>Bangun fondasi iman yang kuat dan kokoh bersama mentor</span>
                        </div>
                    </div>
                    <div class="step">
                        <div class="step-icon cyan">🎓</div>
                        <div class="step-body">
                            <strong>Grade Class</strong>
                            <span>Capai jenjang berikutnya dengan kurikulum terstruktur</span>
                        </div>
                    </div>
                    <div class="step">
                        <div class="step-icon green">🌟</div>
                        <div class="step-body">
                            <strong>Leadership Class</strong>
                            <span>Dikuatkan untuk memimpin dan melayani sesama</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>{{-- /.signup-wrap --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle password visibility
        const toggleBtn = document.getElementById('togglePassword');
        const pwdInput  = document.getElementById('password');
        if (toggleBtn && pwdInput) {
            toggleBtn.addEventListener('click', function () {
                const isHidden = pwdInput.getAttribute('type') === 'password';
                pwdInput.setAttribute('type', isHidden ? 'text' : 'password');
                this.style.opacity = isHidden ? '0.9' : '0.55';
            });
        }

        // Hero card 3D tilt on mousemove
        const heroCard = document.getElementById('heroCard');
        if (heroCard) {
            heroCard.addEventListener('mousemove', e => {
                const r  = heroCard.getBoundingClientRect();
                const x  = e.clientX - r.left;
                const y  = e.clientY - r.top;
                const rx = ((y - r.height / 2) / r.height) * 7;
                const ry = ((x - r.width  / 2) / r.width ) * -7;
                heroCard.style.transform = `rotateX(${rx}deg) rotateY(${ry}deg)`;
            });
            heroCard.addEventListener('mouseleave', () => {
                heroCard.style.transform = 'rotateX(0) rotateY(0)';
            });
        }

        // Rotating subtitle text
        const lines = [
            'Mulai perjalanan discipleship Anda hari ini',
            'Akses kelas terkurasi dengan rapi',
            'Pantau progres belajar kapan saja',
            'Bertumbuh bersama komunitas iman'
        ];
        let idx = 0;
        const rot = document.getElementById('rotator');
        if (rot) {
            setInterval(() => {
                idx = (idx + 1) % lines.length;
                rot.style.opacity = '0';
                rot.style.transform = 'translateY(6px)';
                setTimeout(() => {
                    rot.textContent = lines[idx];
                    rot.style.transition = 'opacity .3s ease, transform .3s ease';
                    rot.style.opacity = '1';
                    rot.style.transform = 'translateY(0)';
                }, 180);
            }, 2800);
        }

        // Button loading state on submit
        const form = document.getElementById('registration-form');
        const btn  = document.getElementById('registerBtn');
        const btnTxt = document.getElementById('btnText');
        if (form && btn) {
            form.addEventListener('submit', () => {
                btnTxt.textContent = 'Memproses...';
                btn.style.opacity = '0.8';
                btn.disabled = true;
            });
        }

        // Staggered slide-in for form fields
        document.addEventListener('DOMContentLoaded', () => {
            const items = document.querySelectorAll('.input-group-c, .form-label-c, .btn-register');
            items.forEach((el, i) => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(18px)';
                setTimeout(() => {
                    el.style.transition = 'opacity .4s ease, transform .4s ease';
                    el.style.opacity = '1';
                    el.style.transform = 'translateY(0)';
                }, 80 + i * 55);
            });
        });
    </script>
</body>
</html>