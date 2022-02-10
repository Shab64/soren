@include('admin.header')



<link rel="stylesheet" href="{{'assets/dt/jquery.dataTables.min.css'}}">
<link rel="stylesheet" href="{{url('assets/dt/datatables.min.css' )}}">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-12">
                    @if(Session::get('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <ul>
                            <li>{{$error}}</li>
                        </ul>
                        @endforeach
                        @endif
                    </div>
                    <div class="d-flex justify-content-end margin-bottom-10">
                        <div class="ml-auto">
                            <a href="javascript:void(0)" class="btn btn-primary">Table View</a>
                            <!-- <a href="{{url('admin/lead-kanban/all-leads-kanban')}}" class="btn btn-primary not-active">Kanban View</a> -->
                        </div>
                    </div>

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">All Leads</h3>
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
                                            <th>Email</th>
                                            <th>Country</th>
                                            <th>Follow Up</th>
                                            <th>Lead Status</th>
                                            <th>Industry</th>
                                            <th>Ad Spend</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(!empty($all_leads))
                                        @foreach($all_leads as $k=>$leads)
                                        <tr>
                                            <td>{{$k+1}}</td>
                                            <td>{{$leads['company']}}</td>
                                            <td>{{$leads['f_name'] .' '. $leads['l_name']}}</td>
                                            <td>{{$leads['phone']}}</td>
                                            <td>{{$leads['title']}}</td>
                                            <td class="text-info text-bold">{{$leads['email']}}</td>
                                            <td>{{$leads['country']}}</td>
                                            <td>{{$leads['f_date'] . ' '. $leads['time']}}</td>
                                            <td>{{$leads['status']}}</td>
                                            <td>{{$leads['industry']}}</td>
                                            <td>${{$leads['ad_spend']}}</td>
                                            <td>
                                                <a href="{{url('admin/view/lead-view/'.$leads['id'])}}" class="btn btn-primary btn-sm" title="view details"><i class="fa fa-eye"></i></a>
                                                <a href="javascript:void(0)" onclick="delete_('<?= url('admin/lead/destroy/' . $leads['id']) ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
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

<script src="{{url('assets/dt/jquery.dataTables.min.js')}}"></script>
<script src="{{url('assets/dt/datatables.min.js')}}"></script>
<script src="{{url('assets/dt/datatables.min.js')}}"></script>

<script>
    $(document).ready(function() {
        $('#myTable2').DataTable({
            "sDom": "Rlfrtip",
            'autoWidth': false,
        });
    });
</script>

@include('admin.footer')
