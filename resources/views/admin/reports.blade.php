@include('admin.header')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-xl-4 col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Bar View Analytics</h4>
                        </div>
                        <div class="box-body">
                            <div id="bar-chart"></div>
                        </div>
                    </div>
                </div>
{{--                <div class="col-xl-4 col-12">--}}
{{--                    <div class="box">--}}
{{--                        <div class="box-header with-border">--}}
{{--                            <h4 class="box-title">Column Chart</h4>--}}
{{--                        </div>--}}
{{--                        <div class="box-body">--}}
{{--                            <div id="column-chart"></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="col-xl-4 col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Circular View Analytics</h4>
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
{{--                <div class="col-xl-4 col-12">--}}
{{--                    <div class="box">--}}
{{--                        <div class="box-header with-border">--}}
{{--                            <h4 class="box-title">Stacked Bar Chart</h4>--}}
{{--                        </div>--}}
{{--                        <div class="box-body">--}}
{{--                            <div id="stacked-bar"></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-4 col-12">--}}
{{--                    <div class="box">--}}
{{--                        <div class="box-header with-border">--}}
{{--                            <h4 class="box-title">Stacked Column Chart</h4>--}}
{{--                        </div>--}}
{{--                        <div class="box-body">--}}
{{--                            <div id="stacked-column"></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

        </section>
        <!-- /.content -->
    </div>
</div>

<script src="{{ asset('assets/vendor_components/c3/d3.min.js' )}}"></script>
<script src="{{ asset('assets/vendor_components/c3/c3.min.js' ) }}"></script>
<script src="{{ asset('assets/src/js/pages/c3-bar-pie.js' ) }}"></script>
<script>
    var o = c3.generate({
        bindto: "#donut-chart",
        color: { pattern: ["#673ab7", "#4974e0", "#3db76b","#000"] },
        data: {
            columns: [
                ['Lead', {{count($all_leads)}}],
                ['Opportunity', {{count($opportunity_leads)}}],
                ['Account', {{count($converted_leads)}}],
                ['Lost', {{count($lost_leads)}}]
            ],
            type: "donut",
            onclick: function(o, n) { console.log("onclick", o, n) },
            onmouseover: function(o, n) { console.log("onmouseover", o, n) },
            onmouseout: function(o, n) { console.log("onmouseout", o, n) }
        },
        donut: { title: "Analytics" }
    });


    var t = c3.generate({
        bindto: "#bar-chart",
        size: { height: 350 },
        color: { pattern: ["#673ab7", "#4974e0", "#3db76b","#000"] },
        data: {
            columns: [
                ["Lead", {{count($all_leads)}}],
                ["Opportunity", {{count($opportunity_leads)}}],
                ["Account",{{count($converted_leads)}}],
                ["Lost", {{count($lost_leads)}}]
            ],
            type: "bar"
        },

        // axis: { rotated: !0 },
        grid: { x: { show: !0 } }
    });
</script>
@include('admin.footer')
