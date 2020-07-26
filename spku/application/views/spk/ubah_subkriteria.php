<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
            <form action="" method="post">

                <input type="hidden" id="id_subkriteria" name="id_subkriteria" value="<?= $subkr['id_subkriteria']; ?>">

                <div class="form-group">
                    <label for="spk">Kriteria</label>
                </div>
                <div class="form-group">
                    <select name="id_kriteria" id="id_kriteria" class="form-control">


                    <?php foreach ($kriteria as $kri) {  ?>
                            <option value="<?= $kri['id_kriteria']; ?>" <?php if ($detail['id_kriteria'] == $kri['id_kriteria']) {
                                                                            echo "selected";
                                                                        } ?>>
                                <?= $kri['kriteria']; ?> </option>
                        <?php
                        } ?>
                  </select>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $subkr['keterangan']; ?>">
                    <?= form_error('editsub', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="keterangan">Range Nilai</label>
                    <input type="text" class="form-control" id="range_nilai" name="range_nilai" value="<?= $subkr['range_nilai']; ?>">
                    <?= form_error('editsub', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="keterangan">Bobot</label>
                    <input type="text" class="form-control" id="bobotsk" name="bobotsk" value="<?= $subkr['bobotsk']; ?>">
                    <?= form_error('editsub', '<small class="text-danger">', '</small>'); ?>
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