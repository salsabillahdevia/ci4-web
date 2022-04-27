<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <h1>Data Orang</h1>
            <form action="" method="post">
                <div class="col-md-6">
                    <div class="input-group mb-3 mt-4">
                        <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="tombol-search" name="keyword" autocomplete="off">
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="submit" id="tombol-search" name="submit">Search</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- ini operasi matematika buat numbering di tabel. angka 10 itu sesuain di controllernya.kalo data per page (paginate) nya 10 disini harus 10 juga. -->
                    <?php $no = 1 + (10 * ($curentPage - 1));
                    foreach ($orang as $data) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data['nama']; ?></td>
                            <td><?= $data['alamat']; ?></td>
                            <td><a href="" class="btn btn-primary">Lihat</a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <!-- cara modif link nya ada di file Pager.php di folder app/config/Pager.php. parameter pertama itu nama tabel di db nya, param kedua itu nama template paginationnya yang udah di tulis di file Pager di config -->
            <div class="col-md-6-offset-4">
                <?= $pager->links('orang', 'orang_pagination'); ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>