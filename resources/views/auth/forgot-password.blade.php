<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body { background: #f6f8fa; }
        .card-forgot { max-width: 370px; margin: 60px auto; border-radius: 18px; box-shadow: 0 4px 24px rgba(98,155,182,0.10); background: #fff; padding: 32px 24px; }
        .card-forgot h2 { color: #41728a; font-weight: 700; text-align: center; margin-bottom: 10px; }
        .card-forgot p { color: #629bb6; text-align: center; margin-bottom: 18px; }
        .form-label { color: #41728a; font-size: 13px; font-weight: 500; }
        .form-control { border-radius: 10px; background: #f6f8fa; border: 1px solid #e3e8ee; }
        .btn { border-radius: 10px; background: linear-gradient(90deg, #629bb6 60%, #41728a 100%); color: #fff; font-weight: 600; }
        .btn:hover { background: linear-gradient(90deg, #41728a 60%, #629bb6 100%); }
    </style>
</head>
<body>
    <div class="card-forgot">
        <h2>Lupa Password</h2>
        <p>Masukkan email Anda untuk menerima link reset password.</p>
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control mb-3 @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
            <button type="submit" class="btn w-100">Kirim Link Reset</button>
        </form>
        <div class="mt-3 text-center">
            <a href="{{ route('login') }}">Kembali ke Login</a>
        </div>
    </div>
</body>
</html>
