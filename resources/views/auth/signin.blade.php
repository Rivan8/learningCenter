
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In • ESC Equip</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        :root{--p1:#4f46e5;--p2:#7c3aed;--p3:#0ea5e9;--ink:#0f172a;--muted:#6b7280;--card:#ffffff}
        html,body{height:100%}
        body{min-height:100vh;font-family:'Inter','Roboto',system-ui,-apple-system,Segoe UI,Arial;color:var(--ink);background:radial-gradient(1400px 600px at 10% 0%,#eef2ff 0%,#f8fafc 50%,#ffffff 100%);overflow-x:hidden}
        .bg-orb{position:fixed;inset:0;pointer-events:none}
        .orb{position:absolute;filter:blur(70px);opacity:.35;border-radius:50%}
        .orb.o1{width:520px;height:520px;left:-120px;top:-120px;background:conic-gradient(from 140deg,var(--p1),var(--p2));animation:drift1 18s ease-in-out infinite}
        .orb.o2{width:460px;height:460px;right:-140px;bottom:-160px;background:conic-gradient(from -40deg,var(--p3),var(--p1));animation:drift2 22s ease-in-out infinite}
        .orb.o3{width:360px;height:360px;left:55%;top:10%;background:radial-gradient(circle at 30% 30%,var(--p2),transparent 60%);animation:drift3 26s ease-in-out infinite}
        @keyframes drift1{0%{transform:translate(0,0) scale(1)}50%{transform:translate(40px,20px) scale(1.06)}100%{transform:translate(0,0) scale(1)}}
        @keyframes drift2{0%{transform:translate(0,0) scale(1)}50%{transform:translate(-30px,-25px) scale(1.05)}100%{transform:translate(0,0) scale(1)}}
        @keyframes drift3{0%{transform:translate(0,0) scale(1)}50%{transform:translate(-25px,35px) scale(1.08)}100%{transform:translate(0,0) scale(1)}}
        .signin-wrap{min-height:100vh;display:grid;grid-template-columns:1.1fr 1fr}
        .hero{position:relative;display:flex;align-items:center;justify-content:center;padding:56px}
        .hero-card{width:100%;max-width:600px;background:linear-gradient(135deg,rgba(79,70,229,.18),rgba(14,165,233,.18));border:1px solid rgba(255,255,255,.3);box-shadow:0 25px 60px rgba(79,70,229,.25);border-radius:28px;padding:32px;color:#fff;backdrop-filter:blur(10px);transform-style:preserve-3d;transition:transform .2s ease}
        .brand { display:flex; align-items:center; gap:14px; margin-bottom:10px; }
        .brand img { width:58px; height:58px; object-fit:contain; border-radius:14px; box-shadow:0 10px 24px rgba(0,0,0,.22); }
        .brand h1 { font-size:26px; font-weight:800; letter-spacing:.4px; margin:0; }
        .hero-title{font-size:36px;font-weight:900;line-height:1.12;margin:8px 0 10px}
        .hero-subtitle{font-size:16px;opacity:.95;min-height:24px}
        .perks { display:grid; grid-template-columns: repeat(2,minmax(0,1fr)); gap:12px; margin-top:18px; }
        .perk { display:flex; align-items:center; gap:10px; padding:10px 12px; border-radius:12px; background:rgba(255,255,255,.14); border:1px solid rgba(255,255,255,.22); }
        .perk i { width:18px; height:18px; display:inline-block; border-radius:50%; background:#fff; box-shadow:0 0 0 3px rgba(255,255,255,.35) inset; }
        .form-side { display:flex; align-items:center; justify-content:center; padding:48px 24px; }
        .card-signin{width:100%;max-width:480px;border-radius:22px;background:var(--card);border:1px solid rgba(2,6,23,.06);box-shadow:0 25px 60px rgba(15,23,42,.08);padding:28px 26px;position:relative;isolation:isolate}
        .card-signin:before{content:"";position:absolute;inset:-2px;border-radius:24px;padding:2px;background:linear-gradient(90deg,rgba(124,58,237,.45),rgba(79,70,229,.45),rgba(14,165,233,.45));-webkit-mask:linear-gradient(#fff 0 0) content-box,linear-gradient(#fff 0 0);-webkit-mask-composite:xor;mask-composite:exclude;opacity:.35;z-index:-1}
        .card-header { display:flex; align-items:center; justify-content:space-between; margin-bottom:6px; }
        .card-title { font-size:22px; font-weight:800; margin:0; color:var(--ink); }
        .chip { background: linear-gradient(90deg, rgba(124,58,237,.12), rgba(79,70,229,.12)); color:#4c1d95; border-radius:999px; padding:6px 12px; font-weight:700; font-size:12px; border:1px solid rgba(124,58,237,.25); }
        .card-desc { color:var(--muted); font-size:14px; margin-bottom:16px; }
        .input-group-custom{position:relative;margin-bottom:14px}
        .input-group-custom input{width:100%;border-radius:14px;background:#f9fafb;border:1px solid #e5e7eb;padding:13px 46px;font-size:15px;color:#0b1221;transition:all .2s ease}
        .input-group-custom input:focus{border-color:var(--p2);box-shadow:0 0 0 4px rgba(124,58,237,.15);outline:none;background:#fff}
        .input-icon { position:absolute; left:14px; top:50%; transform:translateY(-50%); width:18px; height:18px; opacity:.6; color:#4b5563; }
        .toggle-icon { position:absolute; right:14px; top:50%; transform:translateY(-50%); width:22px; height:22px; cursor:pointer; opacity:.6; color:#4b5563; }
        .toggle-icon:hover { opacity:.9; }
        .form-label { font-size:12px; color:#374151; font-weight:800; text-transform:uppercase; letter-spacing:.6px; margin-bottom:6px; }
        .actions { display:flex; align-items:center; justify-content:space-between; margin: 8px 0 16px; }
        .forgot-link { font-size:13px; color:var(--p1); text-decoration:none; font-weight:600; }
        .forgot-link:hover { text-decoration:underline; }
        .btn-primary{width:100%;border-radius:14px;background:linear-gradient(90deg,var(--p2),var(--p1));border:none;font-weight:800;letter-spacing:.3px;padding:13px 16px;color:#fff;box-shadow:0 12px 22px rgba(79,70,229,.25);transition:transform .12s ease,filter .2s ease}
        .btn-primary:hover{filter:brightness(1.05);transform:translateY(-1px)}
        .btn-primary:active{transform:translateY(0)}
        .register-link { text-align:center; margin-top:16px; font-size:14px; color:#6b7280; }
        .register-link a { color:var(--p1); text-decoration:none; font-weight:700; }
        .register-link a:hover { text-decoration:underline; }
        .divider { display:flex; align-items:center; gap:12px; color:#94a3b8; font-size:12px; margin:14px 0; }
        .divider .line { flex:1; height:1px; background:#e5e7eb; }
        @media (max-width:1200px){.signin-wrap{grid-template-columns:1fr 1fr}}
        @media (max-width:992px){.signin-wrap{grid-template-columns:1fr}.hero{padding:28px 22px}.hero-card{max-width:720px}.form-side{padding-top:8px}}
        @media (max-width:576px){.hero-title{font-size:28px}.brand img{width:46px;height:46px}.perks{grid-template-columns:1fr}.card-signin{padding:22px 20px}}
    </style>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
</head>
<body>
    <div class="bg-orb"><div class="orb o1"></div><div class="orb o2"></div><div class="orb o3"></div></div>
    <div class="signin-wrap">
        <div class="hero">
            <div class="hero-card">
                <div class="brand">
                    {{-- <img src="{{ url('/assets/img/equiplogo.png') }}" alt="ESC Equip"> --}}
                    <h1>ESC Equip Learning Center</h1>
                </div>
                <div class="hero-title">Dibentuk dalam Firman. Dikuatkan dalam Komunitas. Digerakkan untuk Melayani.</div>
                <div class="hero-subtitle"><span id="rotator">Akses kelas terkurasi dengan rapi</span></div>
                <div class="perks">
                    <div class="perk"><i></i><span>Discipleship Class</span></div>
                    <div class="perk"><i></i><span>Foundation Class </span></div>
                    <div class="perk"><i></i><span>Grade Class </span></div>
                    <div class="perk"><i></i><span>Leadership Class</span></div>
                </div>
            </div>
        </div>
        <div class="form-side">
            <div class="card-signin">
                <div class="card-header">
                    <h2 class="card-title">Sign In</h2>
                    <span class="chip">Secure Access</span>
                </div>
                <div class="card-desc">Masuk ke akun Anda untuk melanjutkan</div>
                <form action="{{ route('user.login') }}" method="POST" autocomplete="off">
                    @csrf
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group-custom">
                        <svg class="input-icon" viewBox="0 0 24 24"><path fill="currentColor" d="M2 6.5A2.5 2.5 0 0 1 4.5 4h15A2.5 2.5 0 0 1 22 6.5v11A2.5 2.5 0 0 1 19.5 20h-15A2.5 2.5 0 0 1 2 17.5v-11Zm2.5-.5a.5.5 0 0 0-.5.5v.52l8 5.33l8-5.33V6.5a.5.5 0 0 0-.5-.5h-15Zm15 3.79l-7.42 4.94a1 1 0 0 1-1.16 0L3.5 9.79V17.5a.5.5 0 0 0 .5.5h15a.5.5 0 0 0 .5-.5V9.79Z"/></svg>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="you@example.com" required autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group-custom">
                        <svg class="input-icon" viewBox="0 0 24 24"><path fill="currentColor" d="M17 8V7a5 5 0 1 0-10 0v1H5v13h14V8h-2Zm-8 0V7a3 3 0 1 1 6 0v1H9Zm3 6a2 2 0 1 0 0 4a2 2 0 0 0 0-4Z"/></svg>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="••••••••" required>
                        <svg class="toggle-icon" id="togglePassword" viewBox="0 0 24 24"><path fill="currentColor" d="M12 6C7 6 2.73 9.11 1 12c1.73 2.89 6 6 11 6s9.27-3.11 11-6c-1.73-2.89-6-6-11-6Zm0 10a4 4 0 1 1 0-8a4 4 0 0 1 0 8Z"/></svg>
                        @error('password')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="actions">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="remember">
                            <label class="form-check-label" for="remember">Ingat saya</label>
                        </div>
                        <a href="{{ route('password.request') }}" class="forgot-link">Lupa password?</a>
                    </div>
                    <button class="btn btn-primary" type="submit" id="signinBtn"><span id="btnText">Sign In</span></button>
                </form>
                <div class="divider"><span class="line"></span><span>atau</span><span class="line"></span></div>
                <div class="register-link">Belum punya akun? <a href="{{ route('member.register') }}">Registrasi di sini</a></div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      const t=document.getElementById('togglePassword');const p=document.getElementById('password');
      if(t&&p){t.addEventListener('click',function(){const s=p.getAttribute('type')==='password'?'text':'password';p.setAttribute('type',s);this.style.opacity=s==='text'?'0.9':'0.6'});}
      const hero=document.querySelector('.hero-card');
      if(hero){hero.addEventListener('mousemove',e=>{const r=hero.getBoundingClientRect();const x=e.clientX-r.left;const y=e.clientY-r.top;const rx=((y-r.height/2)/r.height)*8;const ry=((x-r.width/2)/r.width)*-8;hero.style.transform=`rotateX(${rx}deg) rotateY(${ry}deg)`});hero.addEventListener('mouseleave',()=>{hero.style.transform='rotateX(0) rotateY(0)'})}
      const lines=['Akses kelas terkurasi dengan rapi','Pantau progres belajar kapan saja','Dapatkan kuis dan sertifikat','Bertumbuh bersama komunitas'];let idx=0;
      const rot=document.getElementById('rotator');if(rot){setInterval(()=>{idx=(idx+1)%lines.length;rot.style.opacity='0';setTimeout(()=>{rot.textContent=lines[idx];rot.style.opacity='1'},160)},2600)}
      const btn=document.getElementById('signinBtn');if(btn){btn.addEventListener('click',()=>{const txt=document.getElementById('btnText');if(txt){txt.textContent='Memproses...'}})}
    </script>
</body>
</html>
