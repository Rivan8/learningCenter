<!DOCTYPE html>
<html lang="en">
<head>
    @include('template.head')
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="flex-grow-1">
        @include('template.sidebar')
        @include('template.header')

        @yield('content')

        @include('template.footer')

        {{-- Ditutup di sini karena dibuka di `template/sidebar` dan `template/header` --}}
        </div> {{-- .main-panel --}}
      </div> {{-- .wrapper --}}
    </div>
</body>
</html>
