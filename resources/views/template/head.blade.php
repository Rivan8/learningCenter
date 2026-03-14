@php
  // Dukungan untuk 2 mode hosting:
  // - DocumentRoot ke project root (asset fisik ada di `public/assets`) => `.htaccess` akan map /assets -> /public/assets
  // - DocumentRoot ke `public` (Laravel standar) => /assets langsung ada
  // Jadi kita selalu pakai /assets (tanpa /public) agar aman di kedua mode.
  $assetBase = rtrim(request()->getBasePath(), '\/'); // contoh: '' atau '/learningCenter'
@endphp

<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title>ESC - {{ $title ?? 'ESC Learn' }}</title>
<meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
<link rel="icon" href="{{ $assetBase }}/assets/img/kaiadmin/favicon.svg" type="image/svg+xml" />

<!-- Fonts and icons -->
<script src="{{ $assetBase }}/assets/js/plugin/webfont/webfont.min.js"></script>
<script>
  WebFont.load({
    google: { families: ["Public Sans:300,400,500,600,700"] },
    custom: {
      families: [
        "Font Awesome 5 Solid",
        "Font Awesome 5 Regular",
        "Font Awesome 5 Brands",
        "simple-line-icons",
      ],
      urls: ["{{ $assetBase }}/assets/css/fonts.min.css"],
    },
    active: function () {
      sessionStorage.fonts = true;
    },
  });
</script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- CSS Files -->
<link rel="stylesheet" href="{{ $assetBase }}/assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="{{ $assetBase }}/assets/css/plugins.min.css" />
<link rel="stylesheet" href="{{ $assetBase }}/assets/css/kaiadmin.min.css" />
