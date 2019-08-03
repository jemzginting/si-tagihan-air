<!DOCTYPE html>
<html lang="en">

<head>
    <title>PDAM UNIT KARANG ANYAR KOTA PALEMBANG</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?= base_url('assets/'); ?>vendor/login/images/logopdam.png" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>vendor/login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>vendor/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>vendor/login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>vendor/login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>vendor/login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>vendor/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>vendor/login/css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="<?= base_url('assets/'); ?>vendor/login/images/logo.png" style="width: 300px; height: 350px;" alt="IMG">
                </div>

                <?= $this->session->flashdata('message'); ?>

                <form class="login100-form validate-form" method="post" action="<?= base_url('AuthLogin/register'); ?>">
                    <h4 align="center">
                        PDAM UNIT KARANG ANYAR KOTA PALEMBANG
                    </h4>
                    <br />
                    <span class="login100-form-title">
                        Register
                    </span>
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" id="name" name="name" placeholder="Fullname" value="<?= set_value('name'); ?>">
                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" id="no_kontrol" name="no_kontrol" placeholder="Nomor Kontrol" value="<?= set_value('username'); ?>">
                        <?= form_error('no_kontrol', '<small class="text-danger pl-3">', '</small>'); ?>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="password" id="password" name="password" placeholder="Password">
                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="password" id="password1" name="password1" placeholder="Repeat Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" id="alamat" name="alamat" placeholder="Alamat" value="<?= set_value('alamat'); ?>">
                        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" id="nomor_telepon" name="nomor_telepon" placeholder="Nomor Telepon" value="<?= set_value('alamat'); ?>">
                        <?= form_error('nomor_telepon', '<small class="text-danger pl-3">', '</small>'); ?>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Register
                        </button>
                    </div>
                    <div class="container-login100-form-btn">
                        <a class="txt2" href="<?= base_url('AuthLogin'); ?>">
                            Have you account ? Login!
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--===============================================================================================-->
    <script src="<?= base_url('assets/'); ?>vendor/login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url('assets/'); ?>vendor/login/vendor/bootstrap/js/popper.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url('assets/'); ?>vendor/login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url('assets/'); ?>vendor/login/vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="<?= base_url('assets/'); ?>vendor/login/js/main.js"></script>

</body>

</html>