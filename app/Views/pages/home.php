<!-- panggil header sama footernya di file template -->
<?= $this->extend('layout/template'); ?>

<!-- definisiin kalo ini body content nya -->
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <h1>Akasuna Hera</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt enim, ratione ab vitae illum ullam praesentium odit voluptatem tempore perferendis incidunt reiciendis quam earum neque quas veniam dolorem obcaecati numquam.</p>
            <!-- kalo mau manggil array ga bisa di echo, nanti eror. harus di vardump-->
            <?php var_dump($array); ?>
            <!-- tapi ada cara baru di ci4 -->
            <?php d($array); ?>
        </div>
    </div>
</div>
<!-- end content -->
<?= $this->endSection('content'); ?>