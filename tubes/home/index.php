<?php
    session_start();
    if (!$_SESSION['isLogin']) {
        header('location: index.php');
    }
    else{
        include 'config/connection.php';
        $username = $_SESSION['username'];
        $data = mysqli_query($connection, "SELECT * from user where username = '$username' limit 1 ");
        $biodata = mysqli_fetch_array($data);

    }

?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tubesku</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/bos.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slicknav.css">

    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid ">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-3 col-lg-2">
                                <div class="logo">
                                    <a href="index.html">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-7">
                                <div class="main-menu  d-none d-lg-block">
                                    
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                                <div class="Appointment">
                                    <div class="book_btn d-none d-lg-block">
                                        <a href="../logout.php">Log Out</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="single_slider  d-flex align-items-center slider_bg_1">
            <div class="container">
                <div class="row align-items-center position-relative">
                    <div class="col-lg-9">
                        <div class="slider_text">
                            <h3>Assalamu alaikum, Saya <?= $biodata['nama'] ?><br>
                                <span>Website Akram</span></h3>
                        </div>
                    </div>
                    <div class="my_img d-none d-lg-block">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->

    <div class="download_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-10">
                    <div class="download_text">
                        <h3>About Me </h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="download_left">
                        <p>Nama : <?= $biodata['nama'] ?></p>
                        <p>Umur : <?= $biodata['umur'] ?></p>
                        <p>Email : <?= $biodata['email'] ?></p>
                        <p>No Telp : <?= $biodata['no_telp'] ?></p>
                        <p>Alamat : <?= $biodata['alamat'] ?></p>
                        <p>Status : <?= $biodata['status'] ?></p>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1 col-md-6">
                    <div class="progress_skills">
                        <?php
                                $username = $_SESSION['username'];
                                $skill = mysqli_query($connection, "SELECT * FROM skill where username = '$username' ");
                                while ($skl = mysqli_fetch_array($skill)) {
                            ?>
                        <div class="single_progress">
                            <div class="label d-flex justify-content-between">
                                <span><?= $skl['nama_skill'] ?></span>
                                <span><?= $skl['persentase'] ?>%</span>
                            </div>
                                <div class="progress">
                                        <div class="progress-bar " role="progressbar" style="<?php echo "width:".$skl['persentase']."%;"?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- service_area start  -->
    <div class="service_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title mb-50">
                        <h3>Riwayat Pendidikan</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                        $username = $_SESSION['username'];
                        $pendidikan = mysqli_query($connection, "SELECT * FROM pendidikan where username = '$username' ");
                        while ($pend = mysqli_fetch_array($pendidikan)) {
                    ?>
                <div class="col-lg-4 col-md-6">
                    <div class="single_service text-center">
                        <div class="icon">
                            <img src="img/svg_icon/1.svg" alt="">
                        </div>
                        <h3>
                                <?= $pend['instansi'] ?>
                        </h3>
                        <h3><?= $pend['thn_masuk'] ?> - <?= $pend['thn_keluar'] ?></h3>
                        <p><?= $pend['tentang_instansi'] ?></p>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    

    <!-- footer start -->
    <footer class="footer">
        <div class="footer_top">
            <div class="container">
                
            </div>
        </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Silahkan download templatenya <a href="https://drive.google.com/open?id=1q1lae_607ckI4Ip6sG8N5XrHqOh-QaiA" target="_blank">Disini</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/ footer end  -->

    <!-- link that opens popup -->
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"> </script>
    <!-- JS here -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/ajax-form.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/scrollIt.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/nice-select.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
    <!-- <script src="js/gijgo.min.js"></script> -->
    <script src="js/slick.min.js"></script>



    <!--contact js-->
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>


    <script src="js/main.js"></script>
</body>

</html>