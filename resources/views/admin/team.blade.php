@include('admin.header')
<link rel="stylesheet" href="{{ asset('assets/dt/jquery.dataTables.min.css' ) }}">
<link rel="stylesheet" href="{{ asset('assets/dt/datatables.min.css' ) }}">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Team Members</h3>
                            <a style="float: right" href="{{url('admin/view/add-team')}}"  class="btn btn-default btn-sm">Add Member</a>
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
                                        <th>Role</th>
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
                                        <td>{{ $employee_time['department'] }}</td>
                                        <td>{{ $employee_time['role'] }}</td>
                                        <td><span class="badge badge-success">Active</span></td>
                                        <td>
                                            <a href="javascript:void(0)" onclick="delete_('<?= url('admin/deleteUser/' . $employee_time['id']) ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
            data: {
                _token,
                employeeID,
                punch
            }
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
            data: {
                _token,
                employeeID,
                punch
            }
        }).done(function(data) {
            $('#punchOut' + employeeID).prop('disabled', true);
            // $('#punchIn' + employeeID).prop('disabled', false);
            $('#badge' + employeeID).text("Clocked Out");
            $('#badge' + employeeID).removeClass("badge-success");
            $('#badge' + employeeID).addClass("badge-danger");
        }).fail(function(error) {

        });
    }
</script>

@include('admin.footer')
