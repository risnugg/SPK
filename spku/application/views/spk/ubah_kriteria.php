<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
            <form action="" method="post">
                <input type="hidden" id="id_kriteria" name="id_kriteria" value="<?= $kriteria['id_kriteria']; ?>">
                <div class="form-group">
                    <label for="spk">Kriteria</label>
                    <input type="text" class="form-control" id="kriteria" name="kriteria" value="<?= $kriteria['kriteria']; ?>">
                    <div class="form-group">
                        <select name="jenis" id="jenis" class="form-control">
                            <option value="Benefit">Benefit</option>
                            <option value="Cost">Cost</option>

                        </select>

                        <?= form_error('kriteria', '<small class="text-danger">', '</small>'); ?>
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