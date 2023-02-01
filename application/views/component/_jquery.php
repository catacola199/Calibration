<!-- All Jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
<script src="<?= base_url('src') ?>/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="<?= base_url('src') ?>/dist/js/feather.min.js"></script>
<script src="<?= base_url('src') ?>/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="<?= base_url('src') ?>/dist/js/sidebarmenu.js"></script>
<script src="<?= base_url('src') ?>/assets/qrcodelib.js"></script>
<script src="<?= base_url('src') ?>/assets/webcodecamjquery.js"></script>
<script src="<?= base_url('src') ?>/assets/webcam.js"></script>
<script src="<?= base_url('src') ?>/assets/webcam.min.js"></script>
<script src="<?= base_url('src') ?>/assets/app/core/scan.js"></script>

<!--Custom JavaScript -->
<script src="<?= base_url('src') ?>/dist/js/custom.js"></script>
<script src="<?= base_url('src') ?>/dist/js/pages/dashboards/dashboard1.min.js"></script>
<script src="<?= base_url('src') ?>/dist/js/app-style-switcher.js"></script>
<script src="<?= base_url('src') ?>/assets/extra-libs/c3/d3.min.js"></script>
<script src="<?= base_url('src') ?>/assets/extra-libs/c3/c3.min.js"></script>
<script src="<?= base_url('src') ?>/assets/extra-libs/sparkline/sparkline.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/b-print-2.3.3/datatables.min.js"></script>

<!-- <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/b-2.2.3/b-html5-2.2.3/datatables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->






<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<!-- Separate -->
<script>
    const inputs = document.querySelectorAll(".input-field");
    const toggle_btn = document.querySelectorAll(".toggle");
    const main = document.querySelector("main");
    const bullets = document.querySelectorAll(".bullets span");
    const images = document.querySelectorAll(".image");

    inputs.forEach((inp) => {
        inp.addEventListener("focus", () => {
            inp.classList.add("active");
        });
        inp.addEventListener("blur", () => {
            if (inp.value != "") return;
            inp.classList.remove("active");
        });
    });

    toggle_btn.forEach((btn) => {
        btn.addEventListener("click", () => {
            main.classList.toggle("sign-up-mode");
        });
    });

    function moveSlider() {
        let index = this.dataset.value;

        let currentImage = document.querySelector(`.img-${index}`);
        images.forEach((img) => img.classList.remove("show"));
        currentImage.classList.add("show");

        const textSlider = document.querySelector(".text-group");
        textSlider.style.transform = `translateY(${-(index - 1) * 2.2}rem)`;

        bullets.forEach((bull) => bull.classList.remove("active"));
        this.classList.add("active");
    }

    bullets.forEach((bullet) => {
        bullet.addEventListener("click", moveSlider);
    });

    $(document).ready(function() {
        $('#multi_col_order').DataTable();

        var table = $('#perbaikan').DataTable({
            dom:"<'row'<'col-sm-4 col-md-4'l><'col-sm-4 col-md-4 float-left'B><'col-sm-4 col-md-4'f>>" +"<'row'<'col-sm-12'tr>>" +"<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            buttons: [
                {
                    extend: 'copy',
                    exportOptions: {
                        columns: [ 0,1,2,3,4,5,6,7,8,9] 
                    },
                    filename: 'Daftar Alat<?= date('d')."_".date('F')."_".date('Y')?>', 
                    title: 'Daftar Alat'
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: [ 0,1,2,3,4,5,6,7,8,9] 
                    },
                    filename: 'Daftar Alat<?= date('d')."_".date('F')."_".date('Y')?>', 
                    title: 'Daftar Alat'
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: [ 0,1,2,3,4,5,6,7,8,9] 
                    },
                    filename: 'Daftar Alat<?= date('d')."_".date('F')."_".date('Y')?>', 
                    title: 'Daftar Alat'
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [ 0,1,2,3,4,5,6,7,8,9] 
                    },
                    filename: 'Daftar Alat<?= date('d')."_".date('F')."_".date('Y')?>', 
                    title: 'Daftar Alat'
                },
            ]
        });

        var table = $('#alat_kali').DataTable({
            dom:"<'row'<'col-sm-4 col-md-4'l><'col-sm-4 col-md-4 float-left'B><'col-sm-4 col-md-4'f>>" +"<'row'<'col-sm-12'tr>>" +"<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            buttons: [
                {
                    extend: 'copy',
                    exportOptions: {
                        columns: [ 0,1,2,3,4,5,6,7,8,9] 
                    },
                    filename: 'Daftar Alat<?= date('d')."_".date('F')."_".date('Y')?>', 
                    title: 'Daftar Alat'
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: [ 0,1,2,3,4,5,6,7,8,9] 
                    },
                    filename: 'Daftar Alat<?= date('d')."_".date('F')."_".date('Y')?>', 
                    title: 'Daftar Alat'
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: [ 0,1,2,3,4,5,6,7,8,9] 
                    },
                    filename: 'Daftar Alat<?= date('d')."_".date('F')."_".date('Y')?>', 
                    title: 'Daftar Alat'
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [ 0,1,2,3,4,5,6,7,8,9] 
                    },
                    filename: 'Daftar Alat<?= date('d')."_".date('F')."_".date('Y')?>', 
                    title: 'Daftar Alat'
                },
            ]
        });

        var table = $('#kalibrasi').DataTable({
            dom:"<'row'<'col-sm-4 col-md-4'l><'col-sm-4 col-md-4 float-left'B><'col-sm-4 col-md-4'f>>" +"<'row'<'col-sm-12'tr>>" +"<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            buttons: [
                {
                    extend: 'copy',
                    exportOptions: {
                        columns: [ 0,1,2,3,4] 
                    },
                    filename: 'Report Kalibrasi<?= date('d')."_".date('F')."_".date('Y')?>', 
                    title: 'Report Kalibrasi'
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: [ 0,1,2,3,4] 
                    },
                    filename: 'Report Kalibrasi<?= date('d')."_".date('F')."_".date('Y')?>', 
                    title: 'Report Kalibrasi'
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: [ 0,1,2,3,4] 
                    },
                    filename: 'Report Kalibrasi<?= date('d')."_".date('F')."_".date('Y')?>', 
                    title: 'Report Kalibrasi'
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [ 0,1,2,3,4] 
                    },
                    filename: 'Report Kalibrasi<?= date('d')."_".date('F')."_".date('Y')?>', 
                    title: 'Report Kalibrasi'
                },
            ]
        });

        var table = $('#pemeliharaan').DataTable({
            dom:"<'row'<'col-sm-4 col-md-4'l><'col-sm-4 col-md-4 float-left'B><'col-sm-4 col-md-4'f>>" +"<'row'<'col-sm-12'tr>>" +"<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            buttons: [
                {
                    extend: 'copy',
                    exportOptions: {
                        columns: [ 0,1,2,3,4] 
                    },
                    filename: 'Report Pemeliharaan<?= date('d')."_".date('F')."_".date('Y')?>', 
                    title: 'Report Pemeliharaan'
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: [ 0,1,2,3,4] 
                    },
                    filename: 'Report Pemeliharaan<?= date('d')."_".date('F')."_".date('Y')?>', 
                    title: 'Report Pemeliharaan'
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: [ 0,1,2,3,4] 
                    },
                    filename: 'Report Pemeliharaan<?= date('d')."_".date('F')."_".date('Y')?>', 
                    title: 'Report Pemeliharaan'
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [ 0,1,2,3,4] 
                    },
                    filename: 'Report Pemeliharaan<?= date('d')."_".date('F')."_".date('Y')?>', 
                    title: 'Report Pemeliharaan'
                },
            ]
        });

    });

    function deleteConfirm(url) {
        Swal.fire({
            icon: 'warning',
            title: 'Peringatan',
            text: "Anda yakin ingin menghapus data ini?",
            showCancelButton: true,
            confirmButtonColor: '#5f76e8',
            cancelButtonColor: '#fd5f7d',
            confirmButtonText: 'Ya, Hapus!'
        }).then(result => {
            if (result.isConfirmed) {
                swal.fire({
                    imageUrl: "<?= base_url('assets/loader_kecil.gif'); ?>",
                    title: "Menghapus Data",
                    text: "Mohon Tunggu",
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    timer: 1000
                }).then((result) => {
                    window.location.href = url;
                });
            }
        });
    }

    function verifConfirm(url) {
        Swal.fire({
            icon: 'warning',
            title: 'Peringatan',
            text: "Anda yakin ingin mengubah data ini?",
            showCancelButton: true,
            confirmButtonColor: '#5f76e8',
            cancelButtonColor: '#fd5f7d',
            confirmButtonText: 'Ya, Ubah!'
        }).then(result => {
            if (result.isConfirmed) {
                swal.fire({
                    imageUrl: "<?= base_url('assets/loader_kecil.gif'); ?>",
                    title: "Mengubah Data",
                    text: "Mohon Tunggu",
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    timer: 1000
                }).then((result) => {
                    window.location.href = url;
                });
            }
        });
    }

    function editConfirm(url) {
        $('#btn-edit').attr('href', url);
        $('#editModal').modal();
    }

    $("#refresh_tabel").click(function(e) {
        swal.fire({
            imageUrl: "<?= base_url('assets/loader_kecil.gif'); ?>",
            title: "Refresh Data",
            text: "Mohon Tunggu",
            showConfirmButton: false,
            allowOutsideClick: false,
            timer: 1000
        }).then((result) => {
            window.location.reload();
        });
    });

    $(function() {
        $('.input-group.date').datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
            todayBtn: "linked",
            todayHighlight: true
        });
    });

    function checkPasswordMatch() {
        var password = $("#password_pengguna_baru").val();
        var confirmPassword = $("#password_pengguna_konfirm").val();
        var element = document.getElementById("password_pengguna_konfirm");

        if (password != confirmPassword)
            element.className += "border border-danger";
        else
            element.className += "border border-success";
    }

    var MAX_FILE_SIZE = 5 * 1024 * 1024; // 5MB

    $(document).ready(function() {
        $("#password_pengguna_konfirm").keyup(checkPasswordMatch);
        $('#image').change(function() {
            fileSize = this.files[0].size;
            if (fileSize > MAX_FILE_SIZE) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "Ukuran file tidak lebih dari 5 MB!",
                    confirmButtonColor: '#5f76e8'
                });
                // this.setCustomValidity("File must not exceed 5 MB!");
                // this.reportValidity();
            } else {
                this.setCustomValidity("");
            }
        });
    });
</script>

<?php if ($this->session->flashdata('notif')) : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: "<?php echo $this->session->flashdata('notif'); ?>",
            confirmButtonColor: '#5f76e8'
        });
    </script>
<?php endif ?>
<?php if ($this->session->flashdata('error')) : ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: "<?php echo $this->session->flashdata('error'); ?>",
            confirmButtonColor: '#5f76e8'
        });
    </script>
<?php endif ?>
</body>

</html>