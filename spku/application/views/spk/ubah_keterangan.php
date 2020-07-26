<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
            <form action="" method="post">

                <input type="hidden" id="id_ket" name="id_ket" value="<?= $ket['id_ket']; ?>">
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control" id="Keterangan" name="Keterangan" value="<?= $ket['Keterangan']; ?>">
                    <?= form_error('keterangan', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="range">Range Nilai</label>
                    <input type="text" class="form-control" id="range_nilai" name="range_nilai" value="<?= $ket['range_nilai']; ?>">
                    <?= form_error('keterangan', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                <label for="range">Bobot</label>
                    <select name="id_bot" id="id_bot" class="form-control">
                    
                        <?php foreach ($range as $range) {  ?>
                            <option value="<?= $range['id']; ?>" <?php if ($ket['id_bot'] == $range['id']) {
                                                                            echo "selected";
                                                                        } ?>>
                                <?= $range['bobotsk']; ?> </option>
                        <?php
                        } ?>
                    </select>
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