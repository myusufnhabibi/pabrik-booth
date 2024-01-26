<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>404 - Karya Logam Bersatu</title>
    <link rel="shortcut icon" href="<?= base_url('assets') ?>/images/logo.png">

    <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Metropolis:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="<?= base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php $id = $this->session->userdata('user_id');
        if (isset($id)) { ?>
            <!-- Sidebar -->
            <?php include "partials/side.php" ?>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <?php include "partials/head.php" ?>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <!-- 404 Error Text -->
                        <div class="text-center">
                            <div class="error mx-auto">404</div>
                            <p class="lead text-gray-800 mb-5">Page Not Found</p>
                            <p class="text-gray-500 mb-0">Sepertinya Anda menemukan kesalahan dalam URL</p>
                            <a href="<?= base_url('app/beranda') ?>">&larr; Kembali Beranda</a>
                        </div>

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <?php include "partials/foot.php" ?>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        <?php } else { ?>
            <div class="container-fluid">
                <!-- 404 Error Text -->
                <div class="text-center">
                    <div class="error mx-auto">404</div>
                    <p class=" lead text-gray-800 mb-5">Page Not Found</p>
                    <p class="text-gray-500 mb-0">Sepertinya Anda menemukan kesalahan dalam URL</p>
                    <a href="<?= base_url('app/beranda') ?>">&larr; Kembali Login</a>
                </div>

            </div>
        <?php } ?>
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>

    <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>
</body>

</html>