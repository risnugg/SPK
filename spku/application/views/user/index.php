<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row ">
            <div class="col-md-4">
                <img class="img-profile rounded-circle col-md" src="<?= base_url('assets/img/gambar1.png'); ?>">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $siswa['nama']; ?></h5>
                    <p class="card-text"><?= $siswa['username']; ?></p>
                    <p class="card-text"><small class="text-muted">ID dibuat mulai <?= date('d D M Y', $siswa['date_created']); ?></small></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->