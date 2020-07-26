<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
            <form action="" method="post">
                <input type="hidden" id="id_siswa" name="id_siswa" value="<?= $siswa1['id_siswa']; ?>">
                <div class="form-group">
                <label for="spk">Nama Siswa</label>

<input type="text" class="form-control" id="nama" name="nama" value="<?= $siswa1['nama'] ?>">
</div>
                <div class="form-group">
                <label for="spk">Kelas</label>

<input type="text" class="form-control" id="kelas" name="kelas" value="<?= $siswa1['kelas'] ?>">
</div>
                <div class="form-group">
                <label for="spk">Tahun</label>

<input type="text" class="form-control" id="tahun" name="tahun" value="<?= $siswa1['tahun'] ?>">
</div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-fw fa-save"></i>
                            </span>
                            <span class="text">Simpan</span>
                        </button>
                    </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->