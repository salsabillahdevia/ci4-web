<!-- panggil header sama footernya di file template -->
<?= $this->extend('layout/template'); ?>

<!-- definisiin kalo ini body content nya -->
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <h1>Contact Akasuna Hera Now!</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt enim, ratione ab vitae illum ullam praesentium odit voluptatem tempore perferendis incidunt reiciendis quam earum neque quas veniam dolorem obcaecati numquam.</p>

            <?php foreach ($alamat as $data) : ?>
                <ul>
                    <li><?= $data['tipe']; ?></li>
                    <li><?= $data['alamat']; ?></li>
                    <li><?= $data['kota']; ?></li>
                </ul>
            <?php endforeach ?>
        </div>
    </div>
</div>
<!-- end content -->
<?= $this->endSection('content'); ?>