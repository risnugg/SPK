<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
            <form action="" method="post">

                <input type="hidden" id="id" name="id" value="<?= $sm['id']; ?>">

                <div class="form-group">
                    <label for="menu">Sub Menu</label>
                </div>
                <div class="form-group">

                    <input type="text" class="form-control" id="title" name="title" value="<?= $sm['title']; ?>">

                </div>
                <div class="form-group">
                    <select name="menu_id" id="menu_id" class="form-control">

                        <?php foreach ($menu as $m) {  ?>
                            <option value="<?= $m['id']; ?>" <?php if ($sm['menu_id'] == $m['id']) {
                                                                    echo "selected";
                                                                } ?>>
                                <?= $m['menu']; ?> </option>
                        <?php
                        } ?>
                    </select>
                </div>
                <div class="form-group">

                    <input type="text" class="form-control" id="url" name="url" value="<?= $sm['url'] ?>">
                </div>

                <div class="form-group">

                    <input type="text" class="form-control" id="icon" name="icon" value="<?= $sm['icon'] ?>">
                    <?= form_error('menu', '<small class="text-danger">', '</small>'); ?>
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