<?php
function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}
?>

<!DOCTYPE html>
<html>

<head>
    <title><?= $judul ?></title>
    <style>
        body {
            background-image:url('<?= base_url() ?>assets/img/bgkartu.jpg');
            background-repeat: no-repeat;
            background-size: 100% 100%;
        }
    </style>
    <script src="http://code.jsqr.de/jsqr-0.2-min.js" type="text/javascript"></script>
	<script type="text/javascript">
		'use strict';
		(function () {
			var qr = new JSQR();							// Initialize a new JSQR object.
			var code = new qr.Code();						// Initialize a new Code object.

			code.encodeMode = code.ENCODE_MODE.BYTE;			// Set the code datatype.
			code.version = code.DEFAULT;						// Set the code version
														// (DEFAULT = use the smallest possible version).
			code.errorCorrection = code.ERROR_CORRECTION.H;		// Set the error correction level (H = High).

			var input = new qr.Input();						// Initialize a new Input object.
			input.dataType = input.DATA_TYPE.TEXT;			 	// Specify the data type of 'data'.
														// Here, 'data' contains only text.
			input.data = 'https://www.jsqr.de';					// Specify the data which should be encoded.

			var matrix = new qr.Matrix(input, code);			// Initialize a new Matrix object using the input
														// and code, defined above.
														// At this point, the QR Code get generated.

			matrix.scale = 6;								// Specify the scaling for graphic output.
			matrix.margin = 2;								// Specify the margin for graphic output.

            var canvas = document.getElementById('qrcode');		// Create a new Canvas element.
			canvas.setAttribute('width', matrix.pixelWidth);		// Set the canvas width to the size of the QR code.
			canvas.setAttribute('height', matrix.pixelWidth);		// Set the canvas height to the size of the QR code.
			canvas.getContext('2d').fillStyle = 'rgb(0,0,0)';		// Set the foreground color of the canvas to black.
			matrix.draw(canvas, 0, 0);						// Draw the QR code into the canvas
			
		})();
	</script>
</head>

<body>
<?php $d = $data[0]; ?>
    <div id="content" class="card border-bottom-primary shadow mb-4">
        <div style="padding:100px">
            <br>
            <div class="card-body d-sm-flex">
                <div class="col-lg-12">
                    <!-- ID Anggota -->
                    <br>
                    <br><br><br><br><br><br>
                    <table style="font-size:20px;width:800px;margin-left:0px">
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
                    <br>
                    <table style="font-size:20px;width:600px;margin-left:0px">
                        <tr>
                            <td><img height="150px" width="120px" style="border-radius: 10px;" src="<?= base_url() ?>assets/upload/anggota/<?= $d->foto ?>" alt=""></td>
                            <td width="5%"><canvas id="qrcode"></canvas></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

    </div>

</body>

</html>