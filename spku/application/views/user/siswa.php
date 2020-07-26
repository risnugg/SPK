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
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#siswa"> Add New Siswa </a>

            <!-- /.container-fluid -->
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Siswa</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Tahun</th>
                        <th scope="col">Aksi</th>


                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($siswa1 as $bt) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $bt['nama']; ?></td>
                            <td><?= $bt['kelas']; ?></td>
                            <td><?= $bt['tahun']; ?></td>

                            <td>

                                <a href="<?= base_url('user/editsiswa/' . $bt['id_siswa']); ?>" class="badge badge-success">Edit</a>
                                <a href=" <?= base_url('user/deletesiswa/' . $bt['id_siswa']); ?>" class="badge badge-danger" onclick="return confirm('yakin?');">Hapus </a>
                            </td>

                        </tr>
                        <?php $i++; ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <!-- End of Main Content -->

        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="siswa" tabindex="-1" role="dialog" aria-labelledby="siswa" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="siswa">Add New Siswa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('user/siswa'); ?>" method="post">
                        <div class="modal-body">
                        
                            <div class="form-group">

                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Siswa">
                            </div>
                        
                            <div class="form-group">

                                <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Kelas">
                            </div>
                        
                            <div class="form-group">

                                <input type="text" class="form-control" id="tahun" name="tahun" placeholder="tahun">
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
</div>