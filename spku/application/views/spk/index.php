<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <!-- /.container-fluid -->
    <div class="row">

        <div class="col-lg">
            <a href="" class="btn btn-primary mb-4" data-toggle="modal" data-target="#exampleKriteria"> Add New Kriteria </a>
            <?= form_error('jurusan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata("message"); ?>


            <!-- /.container-fluid -->
            <table class="table ">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($kri as $kr) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $kr['kriteria']; ?></td>
                            <td><?= $kr['jenis']; ?></td>
                            <td>
                                <a href="<?= base_url('spk/editkr/' . $kr['id_kriteria']); ?>" class="badge badge-success">Edit</a>
                                <a href="<?= base_url('spk/deletekr/' . $kr['id_kriteria']); ?>" class="badge badge-danger" onclick="return confirm('yakin?');">Hapus </a> </td>

                        </tr>
                        <?php $i++; ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <!-- End of Main Content -->

        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="exampleKriteria" tabindex="-1" role="dialog" aria-labelledby="exampleKriteria" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleKriteria">Add New Kriteria</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('index.php/spk'); ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">

                                <input type="text" class="form-control" id="kriteria" name="kriteria" placeholder="Kriteria Nama">
                                <br>
                                <h4><select name="jenis">
                                        <option value="Benefit">Benefit</option>
                                        <option value="Cost">Cost</option>

                                    </select>
                                </h4>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- End of Main Content -->

    <!-- End of Main Content -->