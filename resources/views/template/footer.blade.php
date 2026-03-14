<footer class="footer mt-auto" style="position: static;">
    <div class="container-fluid d-flex justify-content-between">
        <nav class="pull-left"></nav>
        <div class="copyright text-center w-100 py-2" 
             style="font-size: 1rem; background: rgba(0,0,0,0.03); border-radius: 8px;">
            <span style="font-weight: 500; color: #333; letter-spacing: 1px;">
                &copy; 2026 <span style="color:#007bff;">ESC Equip Discipleship</span>
            </span>
            <span class="mx-2" style="color: #888;">|</span>
            <span style="color: #555;">Made with <i class="fa fa-heart text-danger"></i> for Growth & Community</span>
        </div>
    </div>
</footer>


@php
  $assetBase = rtrim(request()->getBasePath(), '\/');
@endphp

<!-- Core JS & Dependencies -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- DataTables & Bootstrap 5 integration -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Optional Plugins (sesuaikan jika diperlukan) -->
<script src="{{ $assetBase }}/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="{{ $assetBase }}/assets/js/plugin/chart.js/chart.min.js"></script>
<script src="{{ $assetBase }}/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>
<script src="{{ $assetBase }}/assets/js/plugin/chart-circle/circles.min.js"></script>
<script src="{{ $assetBase }}/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
<script src="{{ $assetBase }}/assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
<script src="{{ $assetBase }}/assets/js/plugin/jsvectormap/world.js"></script>
<script src="{{ $assetBase }}/assets/js/plugin/gmaps/gmaps.js"></script>

<!-- Kaiadmin JS -->
<script src="{{ $assetBase }}/assets/js/kaiadmin.min.js"></script>

<script>
    // Konfirmasi delete menggunakan SweetAlert2
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data ini akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });

    $(document).ready(function() {
        // Basic DataTable
        $("#basic-datatables").DataTable();

        // Multi-filter select DataTable
        $("#multi-filter-select").DataTable({
            pageLength: 5,
            initComplete: function() {
                this.api().columns().every(function() {
                    var column = this;
                    var select = $('<select class="form-select"><option value=""></option></select>')
                        .appendTo($(column.footer()).empty())
                        .on("change", function() {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());
                            column.search(val ? "^" + val + "$" : "", true, false).draw();
                        });
                    column.data().unique().sort().each(function(d) {
                        select.append('<option value="' + d + '">' + d + '</option>');
                    });
                });
            }
        });

        // Add-row DataTable
        $("#add-row").DataTable({ pageLength: 5 });
        $("#addRowButton").click(function() {
            var action = 
                '<td><div class="form-button-action">' +
                '<button type="button" class="btn btn-link btn-primary btn-lg" data-bs-toggle="tooltip" title="Edit Task">' +
                '<i class="fa fa-edit"></i></button>' +
                '<button type="button" class="btn btn-link btn-danger" data-bs-toggle="tooltip" title="Remove">' +
                '<i class="fa fa-times"></i></button></div></td>';

            $("#add-row").dataTable().fnAddData([
                $("#addName").val(),
                $("#addPosition").val(),
                $("#addOffice").val(),
                action
            ]);

            const addRowModal = bootstrap.Modal.getInstance(document.getElementById('addRowModal'));
            addRowModal.hide();
        });
    });

    // SweetAlert2 Flash Messages
    @if (session('berhasil'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: "{{ session('berhasil') }}",
            confirmButtonText: 'OK'
        });
    @endif

    @if (session('gagal'))
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: "{{ session('gagal') }}",
            confirmButtonText: 'Coba Lagi'
        });
    @endif
</script>

@stack('scripts')
