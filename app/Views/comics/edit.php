<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Ubah Data Komik</h2>
            <form action="/comics/update/<?= $komik['id_komik']; ?>" method="POST" enctype="multipart/form-data">
                <!-- ini supaya data bisa diinput lewat halaman form ini aja. supaya aman -->
                <?= csrf_field(); ?>
                <div class="form-group row mb-4">
                    <input type="hidden" value="<?= $komik['slug']; ?>" name="slug">
                    <label for="judul" class="col-sm-2 col-form-lable">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" name="judul" id="judul" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" autofocus value="<?= (old('judul')) ? old('judul') : $komik['judul']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('judul'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="penulis" class="col-sm-2 col-form-lable">Penulis</label>
                    <div class="col-sm-10">
                        <input type="text" name="penulis" id="penulis" class="form-control <?= ($validation->hasError('penulis')) ? 'is-invalid' : ''; ?>" value="<?= (old('penulis')) ? old('penulis') : $komik['penulis']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('penulis'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="penerbit" class="col-sm-2 col-form-lable">Penerbit</label>
                    <div class="col-sm-10">
                        <input type="text" name="penerbit" id="penerbit" class="form-control <?= ($validation->hasError('penerbit')) ? 'is-invalid' : ''; ?>" value="<?= (old('penerbit')) ? old('penerbit') : $komik['penerbit']; ?>">
                        <div class=" invalid-feedback">
                            <?= $validation->getError('penerbit'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="sampul" class="col-sm-2 col-form-lable">Sampul</label>
                    <div class="col-sm-10">
                        <input type="text" name="sampulLama" value="<?= $komik['sampul']; ?>">
                        <input type="file" name="sampul" id="sampul" class="form-control <?= ($validation->hasError('sampul')) ? 'is-invalid' : ''; ?>" value="<?= (old('sampul')) ? old('sampul') : $komik['sampul']; ?>" onchange="previewImg()">
                        <div class="col-sm-6">
                            <img src="/img/<?= $komik['sampul']; ?>" alt="" class="img-thumbnal mt-2 img-preview" width="100%" height="100%">
                        </div>
                        <div class="invalid-feedback">
                            <?= $validation->getError('sampul'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <div class="col-sm-10">
                        <button type="submit" class="col-sm-2 btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>