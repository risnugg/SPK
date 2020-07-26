<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
            <form action="" method="post">

                <input type="hidden" id="id_detail" name="id_detail" value="<?= $bt['id_detail']; ?>">

                <div class="form-group">
                    <label for="spk">Bobot</label>
                </div>
                <div class="form-group">
                    <select name="id_jurusan" id="id_jurusan" class="form-control">

                        <?php foreach ($jurusan as $jn) {  ?>
                            <option value="<?= $jn['id_jurusan']; ?>" <?php if ($bt['id_jurusan'] == $jn['id_jurusan']) {
                                                                            echo "selected";
                                                                        } ?>>
                                <?= $jn['jurusan']; ?> </option>
                        <?php
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <select name="id_kriteria" id="id_kriteria" class="form-control">

                        <?php foreach ($kri as $kri) {  ?>
                            <option value="<?= $kri['id_kriteria']; ?>" <?php if ($bt['id_kriteria'] == $kri['id_kriteria']) {
                                                                            echo "selected";
                                                                        } ?>>
                                <?= $kri['kriteria']; ?> </option>
                        <?php
                        } ?>
                    </select>
                </div>
                <div class="form-group">

                    <input type="text" class="form-control" id="bobot" name="bobot" value="<?= $bt['bobot'] ?>">
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