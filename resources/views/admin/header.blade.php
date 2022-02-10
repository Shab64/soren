<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>adSearch</title>
    <link rel="icon" sizes="80x80" href="{{url('assets/images/logo.png')}}">
    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{url('assets/src/css/vendors_css.css')}}">
    <!-- Style-->
    <link rel="stylesheet" href="{{url('assets/src/css/horizontal-menu.css')}}">
    <link rel="stylesheet" href="{{url('assets/src/css/style.css')}}">
    <link rel="stylesheet" href="{{url('assets/src/css/skin_color.css')}}">
    <link rel="stylesheet" href="{{url('assets/src/css/update.css')}}">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap");
        @import url("{{url('assets/vendor_components/bootstrap/dist/css/bootstrap.css')}}");
        @import url("{{url('assets/vendor_components/perfect-scrollbar/css/perfect-scrollbar.css') }}");
        @import url("{{url('assets/vendor_components/morris.js/morris.css') }}");
        @import url("{{url('assets/vendor_components/OwlCarousel2/dist/assets/owl.carousel.css') }}");
        @import url("{{url('assets/vendor_components/OwlCarousel2/dist/assets/owl.theme.default.min.css')}}");
        @import url("{{url('assets/vendor_components/horizontal-timeline/css/horizontal-timeline.css')}}");
        @import url("{{url('assets/vendor_components/flexslider/flexslider.css')}}");
        @import url("{{url('assets/vendor_components/prism/prism.css')}}");
        @import url("{{url('assets/vendor_components/datatable/datatables.min.css')}}");
        @import url("{{url('assets/vendor_components/Magnific-Popup-master/dist/magnific-popup.css')}}");
        @import url("{{url('assets/vendor_components/gallery/css/animated-masonry-gallery.css')}}");
        @import url("{{url('assets/vendor_components/lightbox-master/dist/ekko-lightbox.css')}}");
        @import url("{{url('assets/vendor_components/jvectormap/lib2/jquery-jvectormap-2.0.2.css')}}");
        @import url("{{url('assets/vendor_components/x-editable/dist/bootstrap3-editable/css/bootstrap-editable.css')}}");
        @import url("{{url('assets/vendor_components/sweetalert/sweetalert.css')}}");
        @import url("{{url('assets/vendor_components/bootstrap-markdown-master/css/bootstrap-markdown.css')}}");
        @import url("{{url('assets/vendor_components/dropzone/dropzone.css')}}");
        @import url("{{url('assets/vendor_components/select2/dist/css/select2.min.css')}}");
        @import url("{{url('assets/vendor_components/bootstrap-daterangepicker/daterangepicker.css')}}");
        @import url("{{url('assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}");
        @import url("{{url('assets/vendor_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}");
        @import url("{{url('assets/vendor_components/bootstrap-select/dist/css/bootstrap-select.css')}}");
        @import url("{{url('assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}");
        @import url("{{url('assets/vendor_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css')}}");
        @import url("{{url('assets/vendor_components/raty-master/lib/jquery.raty.css')}}");
        @import url("{{url('assets/vendor_components/ion-rangeSlider/css/ion.rangeSlider.css')}}");
        @import url("{{url('assets/vendor_components/ion-rangeSlider/css/ion.rangeSlider.skinModern.css')}}");
        @import url("{{url('assets/vendor_components/gridstack/gridstack.css')}}");
        @import url("{{url('assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.css')}}");
        @import url("{{url('assets/vendor_components/nestable/nestable.css')}}");
        @import url("{{url('assets/vendor_components/bootstrap-switch/switch.css')}}");
        @import url("{{url('assets/vendor_components/c3/c3.min.css')}}");
        @import url("{{url('assets/vendor_components/chartist-js-develop/chartist.css')}}");
        @import url("{{url('assets/vendor_plugins/bootstrap-slider/slider.css')}}");
        @import url("{{url('assets/vendor_plugins/iCheck/flat/blue.css')}}");
        @import url("{{url('assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}");
        @import url("{{url('assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css')}}");
        @import url("{{url('assets/vendor_plugins/iCheck/all.css')}}");
        @import url("{{url('assets/vendor_plugins/timepicker/bootstrap-timepicker.min.css')}}");
        @import url("{{url('assets/vendor_plugins/pace/pace.min.css')}}");
        @import url("{{url('assets/vendor_components/fullcalendar/fullcalendar.min.css')}}");
        @import url("{{url('assets/vendor_components/fullcalendar/fullcalendar.print.min.css')}}");
        @import url("{{url('assets/vendor_components/weather-icons/weather-icons.css')}}");
{{--        @import url("{{url('assets/vendor_components/fullcalendar/fullcalendar.print.min.css')}}");--}}

        /*style.css*/

        @import url("{{url('assets/src/css/color_theme.css')}}");
        @import url("{{url('assets/src/css/horizontal-menu.css')}}");
        @import url("{{url('assets/icons/themify-icons/themify-icons.css')}}");
        @import url("{{url('assets/icons/font-awesome/css/font-awesome.css')}}");
        @import url("{{url('assets/icons/Ionicons/css/ionicons.css')}}");
        @import url("{{url('assets/icons/themify-icons/themify-icons.css')}}");
        @import url("{{url('assets/icons/linea-icons/linea.css')}}");
        @import url("{{url('assets/icons/glyphicons/glyphicon.css')}}");
        @import url("{{url('assets/icons/flag-icon-css/css/flag-icon.css')}}");
        @import url("{{url('assets/icons/material-design-iconic-font/css/materialdesignicons.css')}}");
        @import url("{{url('assets/icons/simple-line-icons/css/simple-line-icons.css')}}");
        @import url("{{url('assets/icons/cryptocoins-master/cryptocoins.css')}}");
        @import url("{{url('assets/icons/weather-icons/css/weather-icons.min.css')}}");
        @import url("{{url('assets/icons/iconsmind/style.css')}}");
        @import url("{{url('assets/icons/icomoon/style.css')}}");
        @import url("{{url('assets/vendor_components/animate/animate.css') }}");

        .sm-blue a {
            white-space: nowrap;
            padding: 10px 10px 10px 10px;
            margin-left: 0px;
            font-size: 13px;
            font-weight: bold;
            margin-right: 0px;
            color: #172b4c;
            border-radius: 5px;
        }
        .modal{
            background: rgba(0, 0, 0, 0);
        }
        .theme-primary .sm-blue a:hover, .theme-primary .sm-blue a:active, .theme-primary .sm-blue a:focus {
            background: #4686ee !important;
            color: #ffffff !important;
        }
        .theme-primary .sm-blue ul a:hover, .theme-primary .sm-blue ul a:active, .theme-primary .sm-blue ul a:focus{
            color: #ffffff !important;
        }
        .slimScrollDiv{
            height: 100px!important;
        }
        .arrow-steps {
             padding: 0px!important;
        }
    </style>
    <?php function time_Ago($time){
        // Calculate difference between current
        // time and given timestamp in seconds
        $diff = time() - $time;
        // Time difference in seconds
        $sec = $diff;
        // Convert time difference in minutes
        $min = round($diff / 60);
        // Convert time difference in hours
        $hrs = round($diff / 3600);
        // Convert time difference in days
        $days = round($diff / 86400);
        // Convert time difference in weeks
        $weeks = round($diff / 604800);
        // Convert time difference in months
        $mnths = round($diff / 2600640);
        // Convert time difference in years
        $yrs = round($diff / 31207680);
        // Check for seconds
        if ($sec <= 60) {
            echo "$sec seconds ago";
        } // Check for minutes
        else if ($min <= 60) {
            if ($min == 1) {
                echo "one minute ago";
            } else {
                echo "$min minutes ago";
            }
        } // Check for hours
        else if ($hrs <= 24) {
            if ($hrs == 1) {
                echo "an hour ago";
            } else {
                echo "$hrs hours ago";
            }
        } // Check for days
        else if ($days <= 7) {
            if ($days == 1) {
                echo "Yesterday";
            } else {
                echo "$days days ago";
            }
        } // Check for weeks
        else if ($weeks <= 4.3) {
            if ($weeks == 1) {
                echo "a week ago";
            } else {
                echo "$weeks weeks ago";
            }
        } // Check for months
        else if ($mnths <= 12) {
            if ($mnths == 1) {
                echo "a month ago";
            } else {
                echo "$mnths months ago";
            }
        } // Check for years
        else {
            if ($yrs == 1) {
                echo "one year ago";
            } else {
                echo "$yrs years ago";
            }
        }
    }?>
</head>

<body class="layout-top-nav light-skin theme-primary fixed">
    <div class="wrapper">
        <!-- <div id="loader"></div> -->
        <header class="main-header">
            <div class="inside-header">
                <div class="d-flex align-items-center logo-box justify-content-start">
                    <!-- Logo -->
                    <a href="{{url('admin')}}" class="logo">
                        <!-- logo-->
                        <div class="logo-mini" style='width:150px;'>
                            <span class="light-logo"><img src="{{url('assets/images/logo.png')}}" alt="logo"></span>
                            <span class="dark-logo"><img src="{{url('assets/images/logo.png')}}" alt="logo"></span>
                        </div>
                        <div class="logo-lg" style="display:none">
                            <span class="light-logo"><img src="{{url('assets/images/logo.png')}}" alt="logo"></span>
                            <span class="dark-logo"><img src="{{url('assets/images/logo.png')}}" alt="logo"></span>
                        </div>
                    </a>
                </div>
                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <div class="app-menu">

                    </div>

                    <div class="navbar-custom-menu r-side">
                        <ul class="nav navbar-nav">
                            <li class="dropdown notifications-menu btn-group nav-item">
{{--                                <a href="#" class="waves-effect waves-light nav-link btn-primary-light svg-bt-icon" data-bs-toggle="dropdown" title="Notifications">--}}
{{--                                    <i class="icon-Notifications"><span class="path1"></span><span class="path2"></span></i>--}}
{{--                                    <div class="pulse-wave"></div>--}}
{{--                                </a>--}}
{{--                                <ul class="dropdown-menu animated bounceIn">--}}
{{--                                    <li class="header">--}}
{{--                                        <div class="p-20">--}}
{{--                                            <div class="flexbox">--}}
{{--                                                <div>--}}
{{--                                                    <h4 class="mb-0 mt-0">Notifications</h4>--}}
{{--                                                </div>--}}
{{--                                                <div>--}}
{{--                                                    <a href="#" class="text-danger">Clear All</a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <!-- inner menu: contains the actual data -->--}}
{{--                                        <ul class="menu sm-scrol">--}}
{{--                                            <li>--}}
{{--                                                <a href="#">--}}
{{--                                                    <i class="fa fa-users text-info"></i> Curabitur id eros quis nunc suscipit blandit.--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <a href="#">--}}
{{--                                                    <i class="fa fa-warning text-warning"></i> Duis malesuada justo eu sapien elementum, in semper diam posuere.--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <a href="#">--}}
{{--                                                    <i class="fa fa-users text-danger"></i> Donec at nisi sit amet tortor commodo porttitor pretium a erat.--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <a href="#">--}}
{{--                                                    <i class="fa fa-shopping-cart text-success"></i> In gravida mauris et nisi--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <a href="#">--}}
{{--                                                    <i class="fa fa-user text-danger"></i> Praesent eu lacus in libero dictum fermentum.--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <a href="#">--}}
{{--                                                    <i class="fa fa-user text-primary"></i> Nunc fringilla lorem--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <a href="#">--}}
{{--                                                    <i class="fa fa-user text-success"></i> Nullam euismod dolor ut quam interdum, at scelerisque ipsum imperdiet.--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                    <li class="footer">--}}
{{--                                        <a href="#">View all</a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
                            </li>
                            <li class="dropdown notifications-menu btn-group nav-item">
                                <a href="#" class="waves-effect waves-light nav-link btn-primary-light svg-bt-icon" data-bs-toggle="dropdown" title="Notifications">
                                    <i class="icon-User"><span class="path1"></span><span class="path2"></span></i>
                                    <div class="pulse-wave"></div>
                                </a>
                                <ul class="dropdown-menu animated bounceIn">
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu sm-scrol">
                                            <li>
                                                <a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('input-form').submit();">
                                                    <form action="{{ route('admin.logout') }}" id="input-form" method="POST" class="d-none">
                                                        @csrf</form>
                                                    <i class="fa fa-warning text-warning"></i> Logout
                                                </a>
                                                <a href="javascript:void(0)"><i class="fa fa-user text-primary"></i>
                                                    <?php
                                                    $adminID = Auth::guard('admin')->user();
                                                    if(!empty($adminID)){
                                                        echo "<i style='color: #3875d7;margin-top: 20px'>".$adminID->name."</i>";
                                                    }
                                                    ?>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>

        <nav class="main-nav" role="navigation">

            <!-- Mobile menu toggle button (hamburger/x icon) -->
            <input id="main-menu-state" type="checkbox" />
            <label class="main-menu-btn" for="main-menu-state">
                <span class="main-menu-btn-icon"></span> Toggle main menu visibility
            </label>

            <!-- Sample menu definition -->
            <ul id="main-menu" class="sm sm-blue">
                <li><a href="{{url('admin')}}"><i class="fa fa-home"></i><span>Dashboard</span></a></li>

                <li><a href="{{ Route('admin.view.page',['all-leads'])}}"><i class="fa fa-users"></i>Leads</a>
                    <ul>
                        <li><a href="javascript:void(0)" data-bs-toggle='modal' data-bs-target='#addLead'><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Add Lead</a></li>
                        <li><a href="{{ Route('admin.view.page',['all-leads'])}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>View All Leads</a></li>
                    </ul>
                </li>

                <li><a href="{{ Route('admin.view.page',['all-opp']) }}"><i class="fa fa-users"></i>Opportunities</a>
                    <ul>
                        <li><a href="javascript:void(0)" data-bs-toggle='modal' data-bs-target='#addOpp'><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Add Opportunity</a></li>
                        <li><a href="{{ Route('admin.view.page',['all-opp']) }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>View All Opportunities</a></li>
                    </ul>
                </li>

                    <li><a href="{{ Route('admin.view.page',['onboarding']) }}"><i class="fa fa-user"></i><span>Intakes & Onboarding</span></a></li>


                <li><a href="{{ Route('admin.view.page',['accounts']) }}"><i class="fa fa-user"></i><span>Adsearch Accounts</span></a></li>

                <li><a href="{{ Route('admin.view.page',['upsell']) }}"><i class="fa fa-users"></i>UpSells</a>
                </li>

                <li><a href="{{ Route('admin.view.page',['compliance']) }}"><i class="fa fa-user"></i><span>Compliance</span></a></li>
                <li><a href="{{ Route('admin.view.page',['lost']) }}"><i class="fa fa-user"></i><span>Lost</span></a></li>
                <li><a href="{{ Route('admin.view.page',['calendar']) }}"><i class="fa fa-calendar"></i><span>Calendar</span></a></li>

                <li><a href="{{ Route('admin.view.page',['reports']) }}"><i class="fa fa-file"></i><span>Reports</span></a></li>

                <li><a href="{{ Route('admin.view.page',['timesheet']) }}"><i class="fa fa-clock-o"></i><span>Timesheet</span></a></li>

                <li><a href="{{ Route('admin.view.page',['notes']) }}"><i class="fa fa-sticky-note-o"></i><span>Notes</span></a></li>

                <li><a href="{{ Route('admin.view.page',['files']) }}"><i class="fa fa-folder"></i><span>Files</span></a></li>
                <li><a href="{{ Route('admin.view.page',['add-team']) }}"><i class="fa fa-plus"></i><span>Add Team Members</span></a></li>
                <li><a href="javascript:void(0)" data-bs-toggle='modal' data-bs-target='#modal-right'><i class="fa fa-bars"></i><span>Timeline</span></a></li>
            </ul>
        </nav>

    </div>
    <!-- Add Lead -->
    <div class="modal fade" id="addLead" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('admin.insert') }}" style="--bs-gutter-x: 0px" class="row" method="post" enctype="multipart/form-data">
                @csrf
                <input type="number" name="adder_id" value="{{ Auth::guard('admin')->user()->id }}" hidden />
                <input type="text" name="adder_type" value="{{ 'Admin' }}" hidden />
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Lead</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="formTitle">
                            <div class="innertitle">
                                Lead Information
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Company*</label>
                                    <input type="text" class="form-control" name="company">
                                </div>
                                <div class="form-group">
                                    <label for="">First Name</label>
                                    <input type="text" class="form-control" name="f_name">
                                </div>
                                <div class="form-group">
                                    <label for="">Last Name</label>
                                    <input type="text" class="form-control" name="l_name">
                                </div>
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" class="form-control" name="title">
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="">Lead Status</label>
                                    <select name="status" id="" class="form-control">
                                        <option value="New">New</option>
                                        <option value="Contacted">Contacted</option>
                                        <option value="Identified DM">Identified DM</option>
                                        <option value="Contacted DM">Contacted DM</option>
                                        <option value="Pitched Review">Pitched Review</option>
                                        <option value="Linked">Linked</option>
                                        <option value="Audit / Meeting Schedule">Audit / Meeting Schedule</option>
                                        <option value="Presentation">Presentation</option>
                                        <option value="Follow Up">Follow Up</option>
                                        <option value="Contract Sent">Contract Sent</option>
                                        <option value="Converted">Converted</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Follow Up Date</label>
                                            <input type="date" class="form-control" name="f_date" min="{{ Date('Y-m-d') }}" value="{{ Date('Y-m-d') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Follow Up Time</label>
                                            <input type="time" class="form-control" name="time" value="{{Date('H:i:s')}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="number" class="form-control" name="phone">
                                </div>
                                <div class="form-group">
                                    <label for="">Alternate Phone</label>
                                    <input type="number" class="form-control" name="a_phone">
                                </div>
                                <div class="form-group">
                                    <label for="">Time Zone</label>
                                    <select name="time_zone" id="" class="form-control">
                                        <option value="AST">AST</option>
                                        <option value="EST">EST</option>
                                        <option value="EDT">EDT</option>
                                        <option value="CST">CST</option>
                                        <option value="CDT">CDT</option>
                                        <option value="MST">MST</option>
                                        <option value="MDT">MDT</option>
                                        <option value="PST">PST</option>
                                        <option value="PDT">PDT</option>
                                        <option value="AKST">AKST</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Website</label>
                                    <input type="text" class="form-control" name="website">
                                </div>
                                <div class="form-group">
                                    <label for="">Country</label>
                                    <select id="country" name="country" class="form-control">
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Aruba">Aruba</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Bermuda">Bermuda</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Bonaire">Bonaire</option>
                                        <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                        <option value="Brunei">Brunei</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Canary Islands">Canary Islands</option>
                                        <option value="Cape Verde">Cape Verde</option>
                                        <option value="Cayman Islands">Cayman Islands</option>
                                        <option value="Central African Republic">Central African Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Channel Islands">Channel Islands</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Christmas Island">Christmas Island</option>
                                        <option value="Cocos Island">Cocos Island</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo">Congo</option>
                                        <option value="Cook Islands">Cook Islands</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Cote DIvoire">Cote DIvoire</option>
                                        <option value="Croatia">Croatia</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Curaco">Curacao</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czech Republic">Czech Republic</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Djibouti">Djibouti</option>
                                        <option value="Dominica">Dominica</option>
                                        <option value="Dominican Republic">Dominican Republic</option>
                                        <option value="East Timor">East Timor</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Falkland Islands">Falkland Islands</option>
                                        <option value="Faroe Islands">Faroe Islands</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="French Guiana">French Guiana</option>
                                        <option value="French Polynesia">French Polynesia</option>
                                        <option value="French Southern Ter">French Southern Ter</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Gibraltar">Gibraltar</option>
                                        <option value="Great Britain">Great Britain</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Greenland">Greenland</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guadeloupe">Guadeloupe</option>
                                        <option value="Guam">Guam</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Hawaii">Hawaii</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="India">India</option>
                                        <option value="Iran">Iran</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Isle of Man">Isle of Man</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Korea North">Korea North</option>
                                        <option value="Korea Sout">Korea South</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Laos">Laos</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libya">Libya</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Macau">Macau</option>
                                        <option value="Macedonia">Macedonia</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marshall Islands">Marshall Islands</option>
                                        <option value="Martinique">Martinique</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mayotte">Mayotte</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Midway Islands">Midway Islands</option>
                                        <option value="Moldova">Moldova</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Montserrat">Montserrat</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Myanmar">Myanmar</option>
                                        <option value="Nambia">Nambia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherland Antilles">Netherland Antilles</option>
                                        <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                        <option value="Nevis">Nevis</option>
                                        <option value="New Caledonia">New Caledonia</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Niue">Niue</option>
                                        <option value="Norfolk Island">Norfolk Island</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palau Island">Palau Island</option>
                                        <option value="Palestine">Palestine</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Phillipines">Philippines</option>
                                        <option value="Pitcairn Island">Pitcairn Island</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Puerto Rico">Puerto Rico</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Republic of Montenegro">Republic of Montenegro</option>
                                        <option value="Republic of Serbia">Republic of Serbia</option>
                                        <option value="Reunion">Reunion</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russia">Russia</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="St Barthelemy">St Barthelemy</option>
                                        <option value="St Eustatius">St Eustatius</option>
                                        <option value="St Helena">St Helena</option>
                                        <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                        <option value="St Lucia">St Lucia</option>
                                        <option value="St Maarten">St Maarten</option>
                                        <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                        <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                        <option value="Saipan">Saipan</option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="Samoa American">Samoa American</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra Leone">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia">Slovakia</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Swaziland">Swaziland</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syria">Syria</option>
                                        <option value="Tahiti">Tahiti</option>
                                        <option value="Taiwan">Taiwan</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania">Tanzania</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tokelau">Tokelau</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Erimates">United Arab Emirates</option>
                                        <option value="United States of America" selected>United States of America</option>
                                        <option value="Uraguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Vatican City State">Vatican City State</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Vietnam">Vietnam</option>
                                        <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                        <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                        <option value="Wake Island">Wake Island</option>
                                        <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Zaire">Zaire</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>

                                </div>
                            </div>
                        </div>

                        <div class="formTitle margin-16">
                            <div class="innertitle">
                                Additional Information
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Gate Keeper's Name*</label>
                                    <input type="text" class="form-control" name="gate_keeper_name">
                                </div>
                                <div class="form-group">
                                    <label for="">Industry</label>
                                    <select name="industry" id="" class="form-control">
                                        <option value="none" hidden>--None--</option>
                                        <option value="General Contractor">General Contractor</option>
                                        <option value="General Services">General Services</option>
                                        <option value="Ecommerce">Ecommerce</option>
                                        <option value="SEO Only">SEO Only</option>
                                        <option value="SMM Only">SMM Only</option>
                                        <option value="Website Only">Website Only</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Industry Details</label>
                                    <select name="industry_details" id="" class="form-control">
                                        <option value="none">--None--</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Other</label>
                                    <textarea name="other" id="" cols="30" rows="10" class="form-control"></textarea>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Lead Source</label>
                                    <select name="source" id="" class="form-control">
                                        <option value="" hidden>--None--</option>
                                        <option value="AdSearch Website">AdSearch Website</option>
                                        <option value="Angle's List">Angle's List</option>
                                        <option value="Employee Referral">Employee Referral</option>
                                        <option value="Google Search">Google Search</option>
                                        <option value="HomeAdvisor">HomeAdvisor</option>
                                        <option value="Marketing Referal">Marketing Referal</option>
                                        <option value="Marketing Upsell">Marketing Upsell</option>
                                        <option value="Other">Other</option>
                                        <option value="Referral">Referral</option>
                                        <option value="SpyFu">SpyFu</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Current Marketing Partner</label>
                                    <input type="text" class="form-control" name="marketing_partner">
                                </div>
                                <div class="form-group">
                                    <label for="">CD</label>
                                    <input type="text" class="form-control" name="cd">
                                </div>
                                <div class="form-group">
                                    <label for="">Ad Spend</label>
                                    <input type="number" class="form-control" name="ad_spend">
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Save changes">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Add Opp -->
    <div class="modal fade" id="addOpp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('admin.insert') }}" style="--bs-gutter-x: 0px" class="row" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Opportunity</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="formTitle">
                            <div class="innertitle">
                                Lead Information
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Company*</label>
                                    <input type="text" class="form-control" name="company">
                                </div>
                                <div class="form-group">
                                    <label for="">First Name</label>
                                    <input type="text" class="form-control" name="f_name">
                                </div>
                                <div class="form-group">
                                    <label for="">Last Name</label>
                                    <input type="text" class="form-control" name="l_name">
                                </div>
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" class="form-control" name="title">
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="">Lead Status</label>
                                    <select name="status" id="" class="form-control">
                                        <option value="Linked">Linked</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Follow Up Date</label>
                                            <input type="date" class="form-control" name="f_date">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Follow Up Time</label>
                                            <input type="time" class="form-control" name="time">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="number" class="form-control" name="phone">
                                </div>
                                <div class="form-group">
                                    <label for="">Alternate Phone</label>
                                    <input type="number" class="form-control" name="a_phone">
                                </div>
                                <div class="form-group">
                                    <label for="">Time Zone</label>
                                    <select name="time_zone" id="" class="form-control">
                                        <option value="AST">AST</option>
                                        <option value="EST">EST</option>
                                        <option value="EDT">EDT</option>
                                        <option value="CST">CST</option>
                                        <option value="CDT">CDT</option>
                                        <option value="MST">MST</option>
                                        <option value="MDT">MDT</option>
                                        <option value="PST">PST</option>
                                        <option value="PDT">PDT</option>
                                        <option value="AKST">AKST</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Website</label>
                                    <input type="text" class="form-control" name="website">
                                </div>
                            </div>
                        </div>

                        <div class="formTitle margin-16">
                            <div class="innertitle">
                                Additional Information
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Gate Keeper's Name*</label>
                                    <input type="text" class="form-control" name="gate_keeper_name">
                                </div>
                                <div class="form-group">
                                    <label for="">Industry</label>
                                    <select name="industry" id="" class="form-control">
                                        <option value="none" hidden>--None--</option>
                                        <option value="General Contractor">General Contractor</option>
                                        <option value="General Services">General Services</option>
                                        <option value="Ecommerce">Ecommerce</option>
                                        <option value="SEO Only">SEO Only</option>
                                        <option value="SMM Only">SMM Only</option>
                                        <option value="Website Only">Website Only</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Industry Details</label>
                                    <select name="industry_details" id="" class="form-control">
                                        <option value="none">--None--</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Other</label>
                                    <textarea name="other" id="" cols="30" rows="10" class="form-control"></textarea>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Lead Source</label>
                                    <select name="source" id="" class="form-control">
                                        <option value="" hidden>--None--</option>
                                        <option value="AdSearch Website">AdSearch Website</option>
                                        <option value="Angle's List">Angle's List</option>
                                        <option value="Employee Referral">Employee Referral</option>
                                        <option value="Google Search">Google Search</option>
                                        <option value="HomeAdvisor">HomeAdvisor</option>
                                        <option value="Marketing Referal">Marketing Referal</option>
                                        <option value="Marketing Upsell">Marketing Upsell</option>
                                        <option value="Other">Other</option>
                                        <option value="Referral">Referral</option>
                                        <option value="SpyFu">SpyFu</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Current Marketing Partner</label>
                                    <input type="text" class="form-control" name="marketing_partner">
                                </div>
                                <div class="form-group">
                                    <label for="">CD</label>
                                    <input type="text" class="form-control" name="cd">
                                </div>
                                <div class="form-group">
                                    <label for="">Ad Spend</label>
                                    <input type="number" class="form-control" name="ad_spend">
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Save changes">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Timeline -->
    <div class="modal modal-right fade" id="modal-right" tabindex="-1" aria-labelledby="timeline" aria-hidden="true" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Timeline</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if(!empty($logs))
                    @foreach($logs as $data)
                    <div class='timeline-grid'>
                        <div>
                            <div class='firstLetter'>
                                <span>{{ ucfirst(substr($data['message'], 0, 1))}}</span>
                            </div>
                        </div>
                        <div>
                            <p> {{$data['message']}}</p>
                            <div class='timeline-time'>
                                <?php $curr_time  = (!empty($data['created_at'])) ? $data['created_at'] : 0;
                                $time_ago   = strtotime($curr_time);  ?>
                                    {{time_Ago($time_ago)}}
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>

            </div>
        </div>
    </div>


    <script src="{{url('assets/src/js/v.js')}}"></script>

