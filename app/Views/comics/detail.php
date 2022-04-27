<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h1>Detail Komik</h1>
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4 text-center">
                        <img src="/img/<?= $komik['sampul']; ?>" alt="" class="sampul">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $komik['judul']; ?></h5>
                            <p class="card-text"><b>Penulis : </b><?= $komik['penulis']; ?></p>
                            <small class="card-text text-muted"><b>Penerbit : </b><?= $komik['penerbit']; ?></small>
                            <hr>
                            <center>
                                <a href="/comics/edit/<?= $komik['slug']; ?>" class="btn btn-warning">Edit</a>
                                <!-- pake cara ini supaya user ga bisa hapus data lewat url. tinggal bikin method delete di controller sama routes nya -->
                                <form action="/comics/<?= $komik['id_komik']; ?>" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Data akan dihapus?')">Delete</button>
                                </form>

                                <!-- kalo pake cara ini nanti user bisa hapus data lewat url -->
                                <!-- <a href="/comics/delete/<?//= $komik['id_komik']; ?>" class="btn btn-danger">Delete</a> -->
                            </center>
                            <hr>
                            <a href="/comics">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>