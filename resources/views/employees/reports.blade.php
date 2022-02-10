@include('employees.header')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-xl-4 col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Bar Chart</h4>
                        </div>
                        <div class="box-body">
                            <div id="bar-chart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Column Chart</h4>
                        </div>
                        <div class="box-body">
                            <div id="column-chart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Donut Chart</h4>
                        </div>
                        <div class="box-body">
                            <div id="donut-chart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Pie Chart</h4>
                        </div>
                        <div class="box-body">
                            <div id="pie-chart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Stacked Bar Chart</h4>
                        </div>
                        <div class="box-body">
                            <div id="stacked-bar"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Stacked Column Chart</h4>
                        </div>
                        <div class="box-body">
                            <div id="stacked-column"></div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
</div>

<script src="{{ asset('assets/vendor_components/c3/d3.min.js' )}}"></script>
<script src="{{ asset('assets/vendor_components/c3/c3.min.js' ) }}"></script>
<script src="{{ asset('assets/src/js/pages/c3-bar-pie.js' ) }}"></script>

@include('employees.footer')