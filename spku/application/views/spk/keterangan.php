<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <!-- /.container-fluid -->
    <div class="row">

        <div class="col-lg">
            <a href="" class="btn btn-primary mb-4" data-toggle="modal" data-target="#exampleJurusan"> Add New Keterangan </a>
            <?= form_error('jurusan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata("message"); ?>


            <!-- /.container-fluid -->
            <table class="table ">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nilai</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Bobot</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($bobotsk  as $bt) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $bt['range_nilai']; ?></td>
                            <td><?= $bt['Keterangan']; ?></td>
                            <td><?= $bt['bobotsk']; ?></td>
                            <td>

                             <a href="<?= base_url('index.php/spk/editkt/' . $bt['id_ket']); ?>" class="badge badge-success">Edit</a>
                                <a href="<?= base_url('index.php/spk/deletekt/' . $bt['id_ket']); ?>" class="badge badge-danger" onclick="return confirm('yakin?');">Hapus </a> </td>
                                
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <!-- End of Main Content -->

        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="exampleJurusan" tabindex="-1" role="dialog" aria-labelledby="exampleJurusan" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleJurusan">Add New Keterangan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('index.php/spk/keterangan'); ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">

                                <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan">

                            </div>

                            <div class="form-group">

                                <input type="text" class="form-control" id="range_penilaian" name="range_penilaian" placeholder="Nilai">

                            </div>

                            <select name="id_bot" id="id_bot" class="form-control">
                                    <option value="">Select Bobot </option>
                                    <?php foreach ($range as $ra) : ?>

                                        <option value="<?= $ra['id']; ?>"><?= $ra['bobotsk']; ?> </option>
                                    <?php endforeach; ?>
                                </select>

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