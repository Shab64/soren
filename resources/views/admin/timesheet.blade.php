@include('admin.header')
<link rel="stylesheet" href="{{ asset('assets/dt/jquery.dataTables.min.css' ) }}">
<link rel="stylesheet" href="{{ asset('assets/dt/datatables.min.css' ) }}">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="box bg-gradient-primary">
                        <div class="box-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h1 class="text-white">
                                        @foreach($performer as $per)
                                            @if(!empty($per['hours']) and $per['hours'] === $max_hours)
                                                {{floor($per['hours']/3600)}}h
                                                {{floor(($per['hours'] / 60) % 60)}}m
                                                {{$per['hours'] % 60}}s
                                            @endif
                                        @endforeach
                                    </h1>
                                </div>
                                <div class=''>
                                    <h6 class="mt-0 text-white">Top Performer Of This Month</h6>
                                    <h3 class="fw-500 my-0 text-white">
                                        @foreach($performer as $per)
                                            @if(!empty($per['hours']) and $per['hours'] === $max_hours)
                                                {{$per['name']}}
                                            @endif
                                        @endforeach
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="box">
                        <div class="box-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="w-80 h-80 rounded-circle bg-primary-light fs-40 text-center l-h-80">
                                    <span class="icon-Home"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></span>
                                </div>
                                <div class='txtCard'>
                                    <h4 class="mt-0">Total Hours</h4>
                                    <h3 class="fw-500 my-0">
{{--                                        <?php $count =0; ?>--}}
{{--                                        @foreach($performer as $per)--}}
{{--                                                <?php $count +=$per['hours']; ?>--}}
{{--                                        @endforeach--}}
{{--                                        {{$count}}--}} --
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="box">
                        <div class="box-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="w-80 h-80 rounded-circle bg-success-light fs-40 text-center l-h-85">
                                    <span class="icon-User"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span>
                                </div>
                                <div class='txtCard'>
                                    <h4 class="mt-0">Total Employees</h4>
                                    <h3 class="fw-500 my-0">{{ $total_employees }}</h3>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Timesheet</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="myTable2" class="table table-bordered ">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Employee Name</th>
                                            <th>Department</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($employees_time)) {
                                            foreach ($employees_time as $k => $employee_time) { ?>
                                                <tr>
                                                    <td>{{ $k+1 }}</td>
                                                    <td>{{ $employee_time['name'] }}</td>
                                                    <td>{{ $employee_time['role'] }}</td>
                                                    <?php $badge = ($employee_time['present'] === 'Yes') ? $employee_time['clocked_status'] : "Clocked out";   ?>
                                                    <td><span id="badge{{ $employee_time['id'] }}" class='badge {{($badge === "Clocked Out") ? "badge-danger" : "badge-success"}}'>{{ ($employee_time['present'] === 'Yes') ? $employee_time['clocked_status'] : "Clocked out"}}</span></td>
                                                    <td>
                                                        <a href="javascript:void(0)" data-bs-toggle='#editHours' data-bs-toggle="modal" class="btn btn-primary btn-sm" onclick="event.preventDefault(); document.getElementById('input-form{{ $k }}').submit()">View Timesheet Report</a>
                                                        <form class="d-none" method="POST" id="input-form{{ $k }}" action="{{ Route('admin.timeSheetReport') }}">@csrf<input type="number" name="employeeID" hidden value="{{ $employee_time['id'] }}" /></form>
                                                        <button id="punchIn{{ $employee_time['id'] }}" <?= $employee_time['present'] === "Yes" ? 'disabled' : '' ?> onclick="punchIn('<?= $employee_time['id'] ?>');" class="btn btn-success btn-sm">Punch In</button>
                                                        <button id="punchOut{{ $employee_time['id'] }}" <?= $employee_time['clocked_status'] === "Clocked Out" ? 'disabled' : '' ?> onclick="punchOut('<?= $employee_time['id'] ?>');" class="btn btn-danger btn-sm">Punch Out</button>
                                                    </td>
                                                </tr>
                                        <?php }
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
</div>

<script src="{{ asset('assets/dt/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/dt/datatables.min.js') }}"></script>
<script src="{{ asset('assets/dt/ColReorderWithResize.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#myTable2').DataTable({
            "sDom": "Rlfrtip",
            'autoWidth': false,
        });
    });
    function punchIn(employeeID) {
        let _token = '{{ csrf_token() }}';
        let punch = 'In';
        $.ajax({
                url: "{{ Route('admin.punchTime') }}",
                type: 'post',
                data: {_token, employeeID, punch}
            })
            .done(function(data) {
                $('#punchIn' + employeeID).prop('disabled', true);
                $('#punchOut' + employeeID).prop('disabled', false);
                $('#badge' + employeeID).text("Clocked In");
                $('#badge' + employeeID).removeClass("badge-danger");
                $('#badge' + employeeID).addClass("badge-success");
            })
            .fail(function(error) {
            });
    }
    function punchOut(employeeID) {
        let _token = "{{ csrf_token() }}";
        let punch = 'Out';
        $.ajax({
            url: '{{ Route("admin.punchTime") }}',
            method: 'post',
            data: {_token, employeeID, punch}
        }).done(function(data) {
            $('#punchOut' + employeeID).prop('disabled', true);
            $('#badge' + employeeID).text("Clocked Out");
            $('#badge' + employeeID).removeClass("badge-success");
            $('#badge' + employeeID).addClass("badge-danger");
        }).fail(function(error) {

        });
    }
</script>

@include('admin.footer')
