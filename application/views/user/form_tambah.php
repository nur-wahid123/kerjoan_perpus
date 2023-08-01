<!-- Begin Page Content -->
<div class="container-fluid">

    <form action="<?= base_url() ?>user/proses_tambah" name="myForm" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">


        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="d-sm-flex">
                <a href="<?= base_url() ?>user" class="btn btn-md btn-circle btn-primary">
                    <i class="fas fa-arrow-left"></i>
                </a>
                &nbsp;
                <h1 class="h2 mb-0 text-gray-800">Tambah Pengguna</h1>
            </div>

            <button type="submit" class="btn btn-primary btn-md btn-icon-split">
                <span class="text text-white">Simpan Data</span>
                <span class="icon text-white-50">
                    <i class="fas fa-save"></i>
                </span>
            </button>

        </div>

        <div class="d-sm-flex justify-content-between mb-0">
            <div class="col-lg-8 mb-4">
                <!-- form -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-primary">
                        <h6 class="m-0 font-weight-bold text-white">Form Pengguna</h6>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-12">
                            <!-- Anggota -->
                            <div class="form-group"><label>Pilih Keanggotaan</label>
                                <select name="anggota" class="form-control chosen" id="anggota">
                                    <option selected value="">--Pilih--</option>
                                    <?php foreach ($anggota as $b) : ?>
                                        <option value="<?= $b->id_anggota ?>">[<?= $b->id_anggota ?>] <?= $b->nama_lengkap ?></option>
                                    <?php endforeach  ?>
                                </select>
                            </div>

                            <!-- ID Anggota -->
                            <input class="form-control" id="idang" name="idanggota" type="hidden" placeholder="">

                            <!-- Nama Lengkap -->
                            <div class="form-group"><label>Nama User</label>
                                <input class="form-control" id="nama" name="user" type="text" placeholder="">
                            </div>

                            <!-- NO Telepon -->
                            <div class="form-group"><label>Nomor Telepon</label>
                                <input class="form-control" id="notelp" name="notelp" type="number">
                            </div>

                            <!-- Email -->
                            <div class="form-group"><label>Email</label>
                                <input class="form-control" name="email" type="email">
                            </div>

                            <!-- Level -->
                            <div class="form-group"><label>Level</label>
                                <select name="level" class="form-control">
                                    <option value="">--Pilih--</option>
                                    <option value="Administrasi">Administrasi</option>
                                    <option value="Mahasiswa">Mahasiswa</option>
                                    <option value="Kepala">Kepala</option>
                                </select>
                            </div>

                            <!-- Password -->
                            <div class="form-group"><label>Password</label>
                                <input class="form-control" name="pwd" type="password">
                            </div>

                            <!-- Konfirmasi Password -->
                            <div class="form-group"><label>Konfirmasi Password</label>
                                <input class="form-control" name="kpwd" type="password">
                            </div>

                        </div>


                        <br>
                    </div>
                </div>

            </div>

            <div class="col-lg-4 mb-4">
                <!-- file -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-primary">
                        <h6 class="m-0 font-weight-bold text-white">Foto</h6>
                    </div>
                    <div class="card-body">
                        <div class="card bg-warning text-white shadow">
                            <div class="card-body">
                                Format
                                <div class="text-white-45 small">.png .jpeg .jpg .tiff .gif .tif</div>
                            </div>
                        </div>
                        <br>
                        <center>
                            <div>
                                <img src="<?= base_url() ?>assets/upload/pengguna/user.png" id="outputImg" width="200" maxheight="300">
                            </div>
                        </center>
                        <br>
                        <!-- foto -->
                        <div class="form-group">
                            <div class="custom-file">
                                <input class="custom-file-input" type="file" id="GetFile" name="photo" onchange="VerifyFileNameAndFileSize()" accept=".png,.gif,.jpeg,.tiff,.jpg">
                                <label class="custom-file-label" for="customFile">Pilih File</label>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </form>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/pengguna.js"></script>
<script src="<?= base_url(); ?>assets/js/validasi/formuser.js"></script>

    <script type="text/javascript">
        $('#anggota').change(function() {
            var base_url = '<?= base_url(); ?>' + 'user/getAnggota';
            var anggota = $(this).val();
            if (anggota == '') {
                $('#nama').text('');
                $('#notelp').text('');
                $('#idang').text('');
            } else {
                $.ajax({
                    type: 'POST',
                    url: base_url,
                    data: 'id_anggota=' + anggota,
                    success: function(response) {
                        const obj = JSON.parse(response);
                        console.log(obj);
                        $('#nama').val(obj.nama_lengkap);
                        $('#notelp').val(obj.notelp);
                        $('#idang').val(obj.id_anggota);
                    }

                });
            }
        });

        $("#numpinjam").keypress(function(evt) {
            evt.preventDefault();
        });
    </script>
    <script>
        $(document).ready(function() {

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