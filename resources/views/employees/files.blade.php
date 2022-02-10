@include('employees.header')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
        @if(Session::get('upload_success'))
        <div class="alert alert-success">
            {{ Session::get('upload_success') }}
        </div>
        @endif
        @if(Session::get('upload_fail'))
        <div class="alert alert-danger">
            {{ Session::get('upload_fail') }}
        </div>
        @endif
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h3 class="box-title">All Files</h3>
                                </div>
                                <div>
                                    <a href="javascript:void(0)" data-bs-target='#addFiles' data-bs-toggle='modal' class="btn btn-primary btn-sm">Add Files</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body notesHeight">
                            @if(!empty($files))
                            @foreach($files as $k=>$file)
                            @if($k==0 || $k%4 == 0)
                            <div class="row mt-3">
                                @endif
                                <div class="col-md-3">
                                    <div class="notesBody">
                                        <div class="d-flex justify-content-between">
                                            <div class="fileName">
                                                {{ $file['name'] }}
                                            </div>
                                            <div class="fileIcon align-self-center">
                                                <!-- onclick="downloadFile('</?= $file['name'] ?>')" -->
                                                <a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('form-input{{ $k }}').submit();"><i class='fa fa-download'></i></a>
                                                <form method="POST" action="{{ Route('downloadFile') }}" id="form-input{{ $k }}" class="d-none">
                                                    @csrf
                                                    <input name="file_name" value="{{ $file['name'] }}" type="text" hidden/>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if($k!=0 && $k%3==0)
                            </div>
                            @endif
                            @endforeach
                            @endif
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

<div class="modal fade" id="addFiles" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ Route('employee.uploadFile') }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Files</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Upload:</label>
                        <input type="file" name="file" class='form-control'>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Dismiss</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    
</script>

@include('employees.footer')