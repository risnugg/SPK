<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>


            <?= $this->session->flashdata("message"); ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#Bobot"> Add New Subkriteria </a>

            <!-- /.container-fluid -->
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Jurusan</th>
                        <th scope="col">Nama Kriteria</th>
                        <th scope="col">Nilai</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Bobot Subkriteria</th>
                        <th scope="col">Aksi</th>
                    

                    </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                    <?php foreach ($subkr  as $sk) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $sk['jurusan']; ?></td>
                            <td><?= $sk['kriteria']; ?></td>
                            <td><?= $sk['range_nilai']; ?></td>
                            <td><?= $sk['keterangan']; ?></td>
                            <td><?= $sk['bobotsk']; ?></td>
                            <td>

                            <a href="<?= base_url('index.php/spk/editsub/' . $sk['id_subkriteria']); ?>" class="badge badge-success">Edit</a>
                                <a href="" class="badge badge-danger" onclick="return confirm('yakin?');">Hapus </a> </td>
                                
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach ?>
                           
                </tbody>
            </table>
        </div>
        <!-- End of Main Content -->

        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="Bobot" tabindex="-1" role="dialog" aria-labelledby="Bobot" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="Bobot">Add New Subkriteria</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('index.php/spk/subKr'); ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <select name="id_kriteria" id="id_kriteria" class="form-control">
                                    <option value="">Select Kriteria </option>
                                    <?php foreach ($kri as $kr) : ?>

                                        <option value="<?= $kr['id_kriteria']; ?>"><?= $kr['kriteria']; ?> </option>
                                    <?php endforeach; ?>
                                </select>

                            
                            </div>
            
                            
                            <div class="form-group">

                                <input type="text" class="form-control" id="range_nilai" name="range_nilai" placeholder="Range Nilai">
                            </div>
                            <div class="form-group">

                            <div class="form-group">

                                <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan">
                            </div>
                            <div class="form-group">

                            <div class="form-group">

                                <input type="text" class="form-control" id="bobotsk" name="bobotsk" placeholder="Bobot">
                            </div>
                            <div class="form-group">






                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>