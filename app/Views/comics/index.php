<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <a href="/comics/create" class="btn btn-primary my-3">+ Tambah Data</a>
            <h1>Comics List</h1>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Sampul</th>
                        <th>Judul</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($komik as $data) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><img src="/img/<?= $data['sampul']; ?>" alt="" class="sampul"></td>
                            <td><?= $data['judul']; ?></td>
                            <td><a href="/comics/<?= $data['slug']; ?>" class="btn btn-primary">Lihat</a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>