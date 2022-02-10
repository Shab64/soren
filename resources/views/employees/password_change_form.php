<!DOCTYPE HTML>
<html lang="en">
<head>
    <!--=============== basic  ===============-->
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="robots" content="index, follow"/>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <!--=============== css  ===============-->
    <!-- <link type="text/css" rel="stylesheet" h -->
    <!--=============== favicons ===============-->
    <!--    <link rel="shortcut icon" href="images/favicon.ico">-->


    <style>
        .main-register-holder .tabs-menu li a, .filter-sidebar-header .tabs-menu li a {
            color: #30210e;
            font-size: 20px;
        }


        .loader-wrap {
            background: #30210e !important;
        }

        body {
            background: #30210e;
        }

        .login-column_header h4 {
            color: #30210e;
        }

        .custom-form label {
            color: grey;
            font-size: 15px;
        }


        .tabs-menu li a i {
            color: #30210e !important;
        }

        .main-register-holder .tabs-menu li, .filter-sidebar-header .tabs-menu li {
            border-bottom: 3px solid #ff4e00 !important;
        }

        .btn {
            background: #ff4e00 !important;
        }

        .login-column_header img {
            height: 75px;
        }
    </style>
</head>
<body>
<!--loader-->
<div class="loader-wrap">
    <div class="loader-inner">
        <div class="loader-inner-cirle"></div>
    </div>
</div>
<!--loader end-->
<!-- main start  -->
<div id="main">
    <!--login-column  -->
    <div class="login-column">
        <div class="login-column_header">
            <!-- <img src="<//?= base_url('assets/') ?>images/logo.png" alt=""> -->
            <div class="clearfix"></div>
        </div>
        <div class="main-register-holder tabs-act">
            <div class="main-register fl-wrap">
                <ul class="tabs-menu fl-wrap no-list-style">
                    <li class="current"><a href="#tab-1"><i class="fal fa-sign-in-alt"></i> Submit Request</a></li>
                    <!--                    <li><a href="#tab-2"><i class="fal fa-user-plus"></i> Register</a></li>-->
                </ul>
                <!--tabs -->
                <div class="tabs-container">
                    <div class="tab">
                        <!--tab -->
                        <div id="tab-1" class="tab-content first-tab">
                            <div class="custom-form">
                                <form action="{{ Route('employee.changePass') }}" method="post" name="registerform"
                                      onsubmit="return checkConfirmation2()">
                                    <input hidden name="e_uid" value="<?= $e_uid ?>"/>
                                    <label>New Password <span>*</span></label>
                                    <input name="password" type="password" id="pass" required onClick="this.select()"
                                           value="">
                                    <label>Confirm Password <span>*</span></label>
                                    <input name="c_password" id="c_pass" type="password" required
                                           onClick="this.select()" value="">
                                    <label style="color: red;" id="err"></label>
                                    <div style="display: inline-flex;">
                                        <button style="display: block ; position: relative; left: -190px;" type="submit"
                                                class="btn float-btn color2-bg"> Submit <i
                                                    class="fas fa-caret-right"></i></button>
                                    </div>
                                    <div style="margin-top: 10px;">
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                                <!--                                <div class="lost_password">-->
                                <!--                                    <a href="#" class="show-lpt">Lost Your Password?</a>-->
                                <!--                                    <div class="lost-password-tootip">-->
                                <!--                                        <p>Enter your email and we will send you a password</p>-->
                                <!--                                        <input name="email" type="text"   onClick="this.select()" value="">-->
                                <!--                                        <button type="submit"  class="btn float-btn color2-bg"> Send<i class="fas fa-caret-right"></i></button>-->
                                <!--                                        <div class="close-lpt"><i class="far fa-times"></i></div>-->
                                <!--                                    </div>-->
                                <!--                                </div>-->
                            </div>
                        </div>
                        <!--tab end -->
                        <!--tab -->
                        <div class="tab">
                            <div id="tab-2" class="tab-content">
                                <div class="custom-form">
                                    <form method="post" name="registerform" class="main-register-form"
                                          id="main-register-form2">
                                        <label>Password <span>*</span></label>
                                        <input name="password" type="password" required onClick="this.select()"
                                               value="">
                                        <label>Confirm Password <span>*</span></label>
                                        <input name="c_password" type="password" required onClick="this.select()"
                                               value="">
                                        <button type="submit" class="btn float-btn color2-bg"> Register <i
                                                    class="fas fa-caret-right"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--tab end -->
                    </div>
                    <!--tabs end -->
                    <!--                    <div class="log-separator fl-wrap"><span>or</span></div>-->
                    <!--                    <div class="soc-log fl-wrap">-->
                    <!--                        <p>For faster login or register use your social account.</p>-->
                    <!--                        <a href="#" class="facebook-log"> Facebook</a>-->
                    <!--                    </div>-->
                </div>
            </div>
        </div>
    </div>
    <!--login-column end-->
    <!--login-column-bg  -->
    <div class="login-column-bg gradient-bg">
        <!--ms-container-->
        <div class="slideshow-container" data-scrollax="properties: { translateY: '300px' }">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <!--ms_item-->
                    <div class="swiper-slide">
                        <div class="ms-item_fs fl-wrap full-height">
                            <!-- <div class="bg" data-bg="</?= base_url('assets/') ?>images/house.jpg"></div> -->
                            <div class="overlay op7"></div>
                        </div>
                    </div>
                    <!--ms_item end-->
                    <!--ms_item-->
                    <div class="swiper-slide ">
                        <div class="ms-item_fs fl-wrap full-height">
                            <!-- <div class="bg" data-bg="</?= base_url('assets/') ?>images/g.jpg"></div> -->
                            <div class="overlay op7"></div>
                        </div>
                    </div>
                    <!--ms_item end-->
                    <!--ms_item-->
                    <div class="swiper-slide">
                        <div class="ms-item_fs fl-wrap full-height">
                            <!-- <div class="bg" data-bg="</?= base_url('assets/') ?>images/h.jpg"></div> -->
                            <div class="overlay op7"></div>
                        </div>
                    </div>
                    <!--ms_item end-->
                </div>
            </div>
        </div>
        <!--ms-container end-->
        <div class="login-promo-container">
            <div class="container">
                <div class="video_section-title fl-wrap">

                    <h2>Get ready to start your exciting journey. <br> Our agency will lead you through the amazing
                        digital world</h2>
                </div>
                <!--                <a href="https://vimeo.com/253953667" class="promo-link big_prom   image-popup"><i class="fal fa-play"></i><span>Promo Video</span></a>-->
            </div>
        </div>
    </div>
    <!--login-column-bg end-->
</div>
<!-- Main end -->
<!--=============== scripts  ===============-->


<script>
    function toast(type, text, icon) {
        $.toast({
            heading: type,
            text: text,
            showHideTransition: 'slide',
            position: "top-right",
            icon: icon
        })
    };

    function checkConfirmation2() {
        let c_pass = $('#c_pass').val();
        let pass = $('#pass').val();
        let err = $('#err');

        if (c_pass == pass) {
            err.text("");
            return true;
        }

        err.text("Confirm Password and Password should match");
        return false;
    }
</script>

<?php
$popUp = $this->session->flashdata('success');
if (isset($popUp)) {
    ?>
    <script>
        toast('<?=$popUp[0]?>', '<?=$popUp[1]?>', '<?=$popUp[2]?>')
    </script>
<?php } ?>

</body>
</html>