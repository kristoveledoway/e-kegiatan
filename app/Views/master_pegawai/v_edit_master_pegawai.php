<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>soengsouy.com</title>

    <!-- Include Choices CSS -->
    <link rel="stylesheet" href="/assets/vendors/choices.js/choices.min.css" />

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">

    <link rel="stylesheet" href="/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="shortcut icon" href="/assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="/"><img src="/assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item active ">
                            <a href="/" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-clipboard-data"></i>
                                <span>Master Administrator</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="/pegawai" class='sidebar-link'>
                                        <i class="bi bi-person-fill"></i>
                                        <span>Pegawai</span>
                                    </a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="/jabatan" class='sidebar-link'>
                                        <i class="bi bi-archive-fill"></i>
                                        <span>Jabatan</span>
                                    </a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="/sub_bagian" class='sidebar-link'>
                                        <i class="bi bi-archive-fill"></i>
                                        <span>Sub Bagian</span>
                                    </a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="/master_pegawai" class='sidebar-link'>
                                        <i class="bi bi-archive-fill"></i>
                                        <span>Master Pegawai</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="/kinerja_harian" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>Kinerja Harian</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Form Master Pegawai</h3>
                            <p class="text-subtitle text-muted">Masukkan Master Pegawai</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Form Master Pegawai</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <a href="/master_pegawai" class="btn btn-danger">Kembali</a>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form" action="<?= base_url('master_pegawai/edit/'.$master_pegawai['id_master_pegawai']) ?>" method="post">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="first-name-column">Nama Pegawai</label>
                                                    <input type="hidden" name="id_master_pegawai" value="<?= $master_pegawai['id_master_pegawai'] ?>">
                                                    <div class="form-group">
                                                        <select name="id_pegawai" class="choices form-select">
                                                            <?php foreach ($pegawais as $pegawai) : ?>
                                                            <option value="<?= $pegawai['id_pegawai'] ?>" <?= $master_pegawai['id_pegawai'] == $pegawai['id_pegawai'] ? 'selected' : null?>>
                                                                <?= $pegawai['nama_pegawai'] ?>
                                                            </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <label for="first-name-column">Pilih Jabatan</label>
                                                    <div class="form-group">
                                                        <select name="id_jabatan" class="choices form-select">
                                                            <?php foreach ($jabatans as $jabatan) : ?>
                                                            <option value="<?= $jabatan['id_jabatan'] ?>" <?= $master_pegawai['id_jabatan'] == $jabatan['id_jabatan'] ? 'selected' : null?>>
                                                                <?= $jabatan['nama_jabatan'] ?>
                                                            </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <label for="first-name-column">Pilih Sub Bagian</label>
                                                    <div class="form-group">
                                                        <select name="id_sub_bagian" class="choices form-select">
                                                            <?php foreach ($sub_bagians as $sub_bagian) : ?>
                                                            <option value="<?= $sub_bagian['id_sub_bagian'] ?>" <?= $master_pegawai['id_sub_bagian'] == $sub_bagian['id_sub_bagian'] ? 'selected' : null?>>
                                                                <?= $sub_bagian['nama_sub_bagian'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit"
                                                        class="btn btn-primary me-1 mb-1">Simpan</button>
                                                    <button type="reset"
                                                        class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="http://ahmadsaugi.com">A. Saugi</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>

    <!-- Include Choices JavaScript -->
    <script src="/assets/vendors/choices.js/choices.min.js"></script>

    <script src="/assets/js/main.js"></script>
</body>

</html>