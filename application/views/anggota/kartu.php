<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="d-sm-flex">
            <a href="<?= base_url() ?>anggota" class="btn btn-md btn-circle btn-primary">
                <i class="fas fa-arrow-left"></i>
            </a>
            &nbsp;
            <h1 class="h2 mb-0 text-gray-800">Kartu Anggota</h1>
        </div>
    </div>

    <?php $d = $data[0]; $e = $data2[0]; ?>

    <div class="d-sm-flex  justify-content-between mb-0">
        <div class="col-lg-12 mb-6">
            <div id="contents" class="card border-bottom-primary shadow mb-4" style="background-image:url('<?= base_url() ?>assets/img/bgkartu.jpg');background-repeat: no-repeat;background-size: 100% 100%;">
                <div style="padding:100px">
                    <br>
                    <div class="row">
                        <div class="col-3" align="center">
                            <img height="150px" src="<?= base_url() ?>img/logo.jpg" alt="">
                        </div>
                        <br>
                    </div>
                    <div class="card-body d-sm-flex">
                        <div class="col-lg-12">
                            <!-- ID Anggota -->
                            <br>
                            <br><br><br><br><br>
                            <table style="font-size:20px;width:800px;margin-left:5px">
                                <tr>
                                    <td>ID Anggota </td>
                                    <td>: <b><?= $d->id_anggota ?></b></td>
                                </tr>
                                <tr>
                                    <td>Nama Lengkap </td>
                                    <td>: <?= $d->nama_lengkap ?></td>
                                </tr>
                                <tr>
                                    <td>Nomor Telepon </td>
                                    <td>: <?= $d->notelp ?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin </td>
                                    <td>: <?= $d->jk ?></td>
                                </tr>
                                <tr>
                                    <td>Tempat lahir </td>
                                    <td>: <?= $d->tempat ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir </td>
                                    <td>: <?= $d->tgllahir ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat </td>
                                    <td>: <?= $d->alamat ?></td>
                                </tr>
                            </table>

                            <br><br>
                            <div class="row">
                                <div class="col-lg-3">
                                    <img height="150px" width="120px" style="border-radius: 10px;" src="<?= base_url() ?>assets/upload/anggota/<?= $d->foto ?>" alt="">
                                </div>
                                <div class="col-lg-1">
                                </div>
                                <div class="col-lg-2">
                                </div>
                                <div class="col-lg-3">
                                </div>
                                <div class="col-lg-3">
                                    <canvas id="qrcode"></canvas>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>

            </div>
            <button id="cmd" class="btn btn-success">Cetak Kartu</button>
        </div>


    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/anggota.js"></script>
<script src="<?= base_url(); ?>assets/js/validasi/formanggota.js"></script>
<script src="<?= base_url(); ?>assets/plugin/chosen/chosen.jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
<script src="http://code.jsqr.de/jsqr-0.2-min.js" type="text/javascript"></script>
<script type="text/javascript">
    'use strict';
    (function() {
        var qr = new JSQR(); // Initialize a new JSQR object.
        var code = new qr.Code(); // Initialize a new Code object.

        code.encodeMode = code.ENCODE_MODE.BYTE; // Set the code datatype.
        code.version = code.DEFAULT; // Set the code version
        // (DEFAULT = use the smallest possible version).
        code.errorCorrection = code.ERROR_CORRECTION.H; // Set the error correction level (H = High).

        var input = new qr.Input(); // Initialize a new Input object.
        input.dataType = input.DATA_TYPE.TEXT; // Specify the data type of 'data'.
        // Here, 'data' contains only text.
        input.data = 'http://www.'+'<?= $e->nama ?>'+'-'+'<?= $e->pass ?>'+'.com'; // Specify the data which should be encoded.

        var matrix = new qr.Matrix(input, code); // Initialize a new Matrix object using the input
        // and code, defined above.
        // At this point, the QR Code get generated.

        matrix.scale = 6; // Specify the scaling for graphic output.
        matrix.margin = 2; // Specify the margin for graphic output.

        var canvas = document.getElementById('qrcode'); // Create a new Canvas element.
        canvas.setAttribute('width', matrix.pixelWidth); // Set the canvas width to the size of the QR code.
        canvas.setAttribute('height', matrix.pixelWidth); // Set the canvas height to the size of the QR code.
        canvas.getContext('2d').fillStyle = 'rgb(0,0,0)'; // Set the foreground color of the canvas to black.
        matrix.draw(canvas, 0, 0); // Draw the QR code into the canvas

    })();
</script>


<script>
    $('.chosen').chosen({
        width: '100%',

    });
</script>

<?php if ($this->session->flashdata('Pesan')) : ?>

<?php else : ?>
    <script>
        $(document).ready(function() {

            $('#pdf').hide();

            let timerInterval
            Swal.fire({
                title: 'Memuat...',
                timer: 1000,
                onBeforeOpen: () => {
                    Swal.showLoading()
                },
                onClose: () => {
                    clearInterval(timerInterval)
                }
            }).then((result) => {

            })
        });
    </script>
<?php endif; ?>
<script>
    $(document).ready(function() {

        var doc = new jsPDF();
        var specialElementHandlers = {
            '#editor': function(element, renderer) {
                return true;
            }
        };

        $('#cmd').click(function() {
            var HTML_Width = 1000;
            var HTML_Height = 700;
            var top_left_margin = 0;
            var PDF_Width = HTML_Width + (top_left_margin * 2);
            var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
            var canvas_image_width = HTML_Width;
            var canvas_image_height = HTML_Height;

            var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

            html2canvas($("#contents")[0]).then(function(canvas) {
                var imgData = canvas.toDataURL("image/jpeg", 1.0);
                var pdf = new jsPDF('l', 'pt', [HTML_Width, HTML_Height]);
                pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
                pdf.save("<?= $data[0]->id_anggota ?>.pdf");
            });
        });
    });
</script>