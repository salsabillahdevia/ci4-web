<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Akasuna Hera</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <!-- kalo cara ci4 buat bikin link pake / di awal. itu sama aja kayak manggil base url -->
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                        <!-- inikan servernya pake spark. kalo pake xampp harus pake base url' -->
                    </li>
                    <li class="nav-item">
                        <!-- cara pake base_url -->
                        <a class="nav-link" href="<?= base_url('/pages/about') ?>">About Me</a>
                    </li>
                    <li class="nav-item">
                        <!-- cara pake base_url -->
                        <a class="nav-link" href="<?= base_url('/pages/contact') ?>">Contact Me</a>
                    </li>
                    <li class="nav-item">
                        <!-- cara pake base_url -->
                        <a class="nav-link" href="<?= base_url('/comics') ?>">Comics</a>
                    </li>
                    <li class="nav-item">
                        <!-- cara pake base_url -->
                        <a class="nav-link" href="<?= base_url('/orang') ?>">Orang</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>