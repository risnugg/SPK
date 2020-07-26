<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
            <form action="" method="post">

                <input type="hidden" id="id_nilai" name="id_nilai" value="<?= $penilaian['id_nilai']; ?>">
             
                <div class="form-group">
                    <select name="id_siswa" id="id_siswa" class="form-control">

                        <?php foreach ($siswa1 as $m) {  ?>
                            <option value="<?= $m['id_siswa']; ?>" <?php if ($penilaian['id_siswa'] == $m['id_siswa']) {
                                                                    echo "selected";
                                                                } ?>>
                                <?= $m['nama']; ?> </option>
                        <?php
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                <label for="kriteria">Kriteria</label>
                    <select name="id_kriteria" id="id_kriteria" class="form-control">

                        <?php foreach ($kriteria as $kri) {  ?>
                            <option value="<?= $kri['id_kriteria']; ?>" <?php if ($penilaian['id_kriteria'] == $kri['id_kriteria']) {
                                                                            echo "selected";
                                                                        } ?>>
                                <?= $kri['kriteria']; ?> </option>
                        <?php
                        } ?>

                    </select>
                    <?= form_error('id_kriteria', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                <label for="bobot">Nilai</label>
                    <input type="text" class="form-control" id="nilai" name="nilai" value="<?= $penilaian['nilai'] ?>">
                                </div>

                                <?= form_error('nilai', '<small class="text-danger">', '</small>'); ?>
 
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