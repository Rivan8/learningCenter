<?php
session_start();
if (isset($_SESSION['name'])) {
    header('Location: welcome.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <title>Register</title>
</head>
<style>
    body, html {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        font-family: 'Inter', 'Roboto', sans-serif;
        background: #f6f8fa;
        min-height: 100vh;
    }

    .form-control{
        background: #fff;
        border-width: 1px;
        border-color: #629bb6;
        border-radius: 15px;
        font-family: inherit;
        font-size: 15px;
        color: #333;
        box-shadow: 0 2px 8px rgba(98,155,182,0.08);
        transition: box-shadow 0.2s;
    }

    .form-control::placeholder {
        color: #629bb6 !important;
        opacity: 1;
    }

    .form-control:focus {
        border-color: #629bb6;
        box-shadow: 0 0 0 2px rgba(98,155,182,0.2);
        outline: none;
    }

    .form-label{
        color: #629bb6;
        font-weight: 500;
    }

    .btn{
        border-radius: 15px;
        color: #fff;
        background-color: #629bb6;
        font-weight: 500;
        box-shadow: 0 2px 8px rgba(98,155,182,0.15);
        transition: background 0.2s;
    }

    .btn:hover{
        background-color: #41728a;
        color: #fff;
    }

    .card-register {
        background: #fff;
        border-radius: 18px;
        box-shadow: 0 4px 24px rgba(98,155,182,0.10);
        padding: 32px 24px 24px 24px;
        max-width: 340px;
        width: 100%;
        margin: 48px auto;
        display: flex;
        flex-direction: column;
        align-items: stretch;
    }

    .card-register h2 {
        color: #41728a;
        font-weight: 600;
        margin-bottom: 6px;
        letter-spacing: 1px;
        text-align: center;
    }

    .card-register p {
        color: #629bb6;
        margin-bottom: 18px;
        font-size: 15px;
        text-align: center;
    }

    .card-register .form-label {
        margin-bottom: 4px;
        font-size: 13px;
        color: #41728a;
        font-weight: 500;
    }

    .card-register .form-control {
        margin-bottom: 14px;
        border-radius: 10px;
        font-size: 14px;
        background: #f6f8fa;
        border: 1px solid #e3e8ee;
        color: #333;
        box-shadow: none;
    }

    .card-register .form-control:focus {
        border-color: #629bb6;
        box-shadow: 0 0 0 2px rgba(98,155,182,0.2);
    }

    .card-register .btn {
        margin-top: 8px;
        border-radius: 10px;
        background: linear-gradient(90deg, #629bb6 60%, #41728a 100%);
        font-weight: 500;
        font-size: 15px;
        box-shadow: 0 2px 8px rgba(98,155,182,0.10);
        border: none;
    }

    .card-register .btn:hover {
        background: linear-gradient(90deg, #41728a 60%, #629bb6 100%);
    }

    .card-register .alert {
        width: 100%;
        margin-bottom: 12px;
        font-size: 14px;
        border-radius: 8px;
    }

    .card-register a {
        color: #41728a;
        font-weight: 500;
        text-decoration: none;
        transition: color 0.2s;
    }

    .card-register a:hover {
        color: #629bb6;
        text-decoration: underline;
    }

    /* Animasi untuk form fields */
    .form-control {
        transition: all 0.3s ease;
    }

    .form-label {
        transition: color 0.3s ease;
    }

    /* Slide animation untuk form fields */
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .form-field-slide-in {
        animation: slideIn 0.4s ease;
    }
</style>

<body>
    <div class="card-register">
        <h2>Register</h2>
        <p>Silahkan isi form untuk mendaftar member</p>

        <?php if (isset($_SESSION['error'])) {?>
        <div class="alert alert-danger" role="alert">
            <?php echo $_SESSION['error']; ?>
        </div>
        <?php } ?>
        <?php if (isset($_SESSION['success'])) {?>
        <div class="alert alert-success" role="alert">
            <?php echo $_SESSION['success']; ?>
        </div>
        <?php } ?>
        <?php unset($_SESSION['error']); ?>
        <?php unset($_SESSION['success']); ?>

        <form action="{{ route('store.member') }}" method="POST" id="registration-form">
            @csrf
            <label for="name" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" required>

            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>

            <label for="no_hp" class="form-label">No Telp</label>
            <input type="tel" class="form-control" id="no_hp" name="no_hp" placeholder="No Telepon" required>

            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>

            <select class="form-control" id="role" name="role" style="display:none;" required>
                <option value="member">member</option>
            </select>

            <label for="statusanggota" class="form-label">Jenjang Status</label>
            <select class="form-control" id="statusanggota" name="statusanggota" required>
                <option value="belum">Anggota</option>
                <option value="Core Team">Core Team</option>
                <option value="DM">Disciples Maker</option>
            </select>

            <label for="statusnextstep" class="form-label">Status Next Step</label>
            <select class="form-control" id="statusnextstep" name="statusnextstep" required>
                <option value="new">New</option>
            </select>

            <button type="submit" name="register" class="btn w-100">Register</button>
        </form>
        <p class="mt-3" style="text-align:center;">Sudah punya akun? <a href="{{ route('show.login') }}">Login di sini</a></p>
    </div>

    <script>
        // Animasi untuk form fields saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            const formFields = document.querySelectorAll('.form-control, .form-label');
            formFields.forEach((field, index) => {
                setTimeout(() => {
                    field.classList.add('form-field-slide-in');
                }, index * 100);
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
