@include('admin.header')
<link rel="stylesheet" href="{{url('assets/dt/jquery.dataTables.min.css')}}">
<link rel="stylesheet" href="{{url('assets/dt/datatables.min.css')}}">

<style>
    table.dataTable.no-footer {
    border-bottom: 0px solid #ddd !important;
}
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">AdSearch Accounts</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="myTable2" class="table table-bordered ">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Account Name</th>
                                            <th>Industry</th>
                                            <th>Lead Title</th>
                                            <th>Last Revision</th>
                                            <th>High Risk</th>
                                            <th>Remark</th>
                                            <th>Analytics</th>
                                            <th>Conversions</th>
                                            <th>Ad Spend</th>
                                            <th>Google</th>
                                            <th>Bing</th>
                                            <th>SEO</th>
                                            <th>Facebook</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if(!empty($converted_leads))
                                            @foreach($converted_leads as $k=>$converted)
                                        <tr>
                                            <td>{{$k+1}}</td>
                                            <td>{{$converted['f_name'].' '. $converted['l_name'] }}</td>
                                            <td>{{$converted['industry']}}</td>
                                            <td>{{$converted['title']}}</td>
                                            <td>06/08/2021</td>

                                            <td>
                                                <div class="text-center">
                                                    <input type="checkbox" id="basic_checkbox_1" name="high_risk" onclick="accountStatus('high_risk',<?=$converted['id']?>)" {{($converted['high_risk'] === 'yes') ? "checked" : ""}}/>
                                                    <label for="basic_checkbox_1"></label>
                                                </div>
                                            </td>
                                            <td>
                                                {{(!empty($converted['notes'])) ? strip_tags($converted['notes']) : "no remarks found"}}
                                            </td>
                                            <td>
                                                <div class="text-center">
                                                    <input type="checkbox" name="analytics" id="basic_checkbox_2" onclick="accountStatus('analytics',<?=$converted['id']?>)" {{($converted['analytics'] === 'yes') ? "checked" : ""}} />
                                                    <label for="basic_checkbox_2"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-center">
                                                    <input type="checkbox" name="conversions" id="basic_checkbox_3" onclick="accountStatus('conversions',<?=$converted['id']?>)" {{($converted['conversions'] === 'yes') ? "checked" : ""}}  />
                                                    <label for="basic_checkbox_3"></label>
                                                </div>
                                            </td>
                                            <td>
                                                ${{$converted['ad_spend']}}
                                            </td>
                                            <td>
                                                <div class="text-center">
                                                    <input type="checkbox" name="google" id="basic_checkbox_10" onclick="accountStatus('google',<?=$converted['id']?>)" {{($converted['google'] === 'yes') ? "checked" : ""}} />
                                                    <label for="basic_checkbox_10"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-center">
                                                    <input type="checkbox" name="bing" id="basic_checkbox_4" onclick="accountStatus('bing',<?=$converted['id']?>)" {{($converted['bing'] === 'yes') ? "checked" : ""}} />
                                                    <label for="basic_checkbox_4"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-center">
                                                    <input type="checkbox" name="seo" onclick="accountStatus('seo',<?=$converted['id']?>)" id="basic_checkbox_5" {{($converted['seo'] === 'yes') ? "checked" : ""}}  />
                                                    <label for="basic_checkbox_5"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-center">
                                                    <input name="facebook" type="checkbox" onclick="accountStatus('facebook',<?=$converted['id']?>)" id="basic_checkbox_6" {{($converted['facebook'] === 'yes') ? "checked" : ""}}  />
                                                    <label for="basic_checkbox_6"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{url('admin/view/account-view/'.$converted['id'])}}" class="btn btn-primary btn-sm" title="view details"><i class="fa fa-eye"></i></a>
                                                <a href="javascript:void(0)" onclick="delete_('<?= url('admin/lead/destroy/' . $converted['id']) ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
<script src="{{url('assets/dt/ColReorderWithResize.js')}}"></script>

<script>
	$(document).ready(function() {
		$('#myTable2').DataTable({
			"sDom": "Rlfrtip",
			'autoWidth': false,
		});
	});

	const  accountStatus=(type,leadID)=>{
        let check = $("[name="+type+"]").is(":checked");
        let status = '';
        if(check ===true){
           status = 'yes';
        }else {
           status = 'no'
        }
        let _token = '{{ csrf_token() }}';
        $.ajax({
            url: "{{ url('admin/changeAccountStatus') }}",
            type: "post",
            data: {
                _token,
                leadID,
                type,
                status
            }
        }).done(function(data) {console.log('success')}).fail(function(error) {
            console.log(error, "error");
        });
    }
</script>

@include('admin.footer')

