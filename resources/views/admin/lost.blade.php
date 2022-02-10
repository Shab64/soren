@include('admin.header')
<link rel="stylesheet" href="./assets/dt/jquery.dataTables.min.css">
<link rel="stylesheet" href="./assets/dt/datatables.min.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-12">


                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Lost</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="myTable2" class="table table-bordered ">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Company Name</th>
                                            <th>Full Name</th>
                                            <th>Phone</th>
                                            <th>Title</th>
                                            <th>Follow Up</th>
                                            <th>Lead Status</th>
                                            <th>Industry</th>
                                            <th>Ad Spend</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($lost_leads)) {
                                            foreach ($lost_leads as $k => $lead) { ?>
                                                <tr>
                                                    <td>{{ $k+1 }}</td>
                                                    <td>{{ $lead['company'] }}</td>
                                                    <td>{{ ucfirst($lead['f_name']." ".ucfirst($lead['l_name'])) }}</td>
                                                    <td>{{ $lead['phone'] }}</td>
                                                    <td>{{ $lead['title']  }}</td>
                                                    <td>{{ $lead['f_date']." ".$lead['time']  }}</td>
                                                    <td>{{ $lead['status'] }}</td>
                                                    <td>{{ $lead['industry'] }}</td>
                                                    <td>{{ $lead['ad_spend']  }}</td>
                                                    <td>
                                                        <a href="{{url('admin/lead-view/'.$lead['id'])}}" class="btn btn-primary btn-sm" title="view details"><i class="fa fa-eye"></i></a>
                                                        <a href="javascript:void(0)" onclick="delete_('<?= url('admin/lead/dletPerm/' . $lead['id']) ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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

            <!-- Button trigger modal -->

            <!-- Modal -->


        </section>
        <!-- /.content -->
    </div>
</div>






<script src="./assets/dt/jquery.dataTables.min.js"></script>
<script src="./assets/dt/datatables.min.js"></script>
<script src="./assets/dt/ColReorderWithResize.js"></script>

<script>
    $(document).ready(function() {
        $('#myTable2').DataTable({
            "sDom": "Rlfrtip",
            'autoWidth': false,
        });
    });
</script>

@include('admin.footer')
