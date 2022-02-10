@include('admin.header')

<!-- Content Wrapper. Contains page content -->
<link rel="stylesheet" href="{{url('assets/dropify/dropify.css')}}" />
<link rel="stylesheet" href="{{url('assets/summernote/summernote.css')}}" />
<style>
    .note-editing-area {
        height: 300px;
    }

    .note-toolbar-wrapper {
        height: 40px !important;
    }
</style>
<div class="content-wrapper">
    <div class="container-full">
        <!-- Main content -->
        @if(Session::get('note_success'))
        <div class="alert alert-success">
            {{ Session::get('note_success') }}
        </div>
        @endif
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h3 class="box-title">All Notes</h3>
                                </div>
                                <div>
                                    <a href="javascript:void(0)" data-bs-toggle='modal' data-bs-target='#addNote' class="btn btn-primary btn-sm">Add Notes</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body notesHeight">
                            @if(!empty($notes))
                            @foreach($notes as $k=>$note)
                            <?php $curr_time  = (!empty($note['created_at'])) ? $note['created_at'] : 0;
                            $time_ago   = strtotime($curr_time);  ?>
                            @if($k==0 || $k % 4 ==0)
                            <div class="row mt-3">
                                @endif
                                <div class="col-md-3">
                                    <div class="notesBody">
                                        @if($note['type'] === 'Admin' && isset(Auth::guard('admin')->user()->id))
                                        @if(Auth::guard('admin')->user()->id === $note['owner_id'])
                                        <div class='delNotes'>
                                            <a href="javascript:void(0)" onclick="delete_note('Admin','<?= $note['owner_id'] ?>','<?= $note['id'] ?>')" class="btn btn-sm btn-danger"><i class='fa fa-remove'></i></a>
                                        </div>
                                        @endif
                                        @endif
                                        <p>{{ strip_tags($note['note']) }}</p>
                                        <div class="endpara">
                                            <p>{{time_Ago($time_ago)}}<span> by {{Auth::guard('admin')->user()->name}}</span></p>
                                        </div>
                                    </div>
                                </div>
                                @if($k != 0 && $k % 3 ==0)
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
            <!-- Add Note  -->
            <div class="modal fade" id="addNote" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Note</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="post" action="{{ Route('admin.insertNote') }}">
                            @csrf
                            <div class="modal-body">
                                <textarea required id="summernote" name="note"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-primary" value="Save changes">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
</div>
<script src="{{url('assets/summernote/summernote.js')}}"></script>

<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });

    function delete_note(type, owner_id, note_id) {
        //send to leadController and delete this note
        let deleteModal = `
        <div class="modal fade" id="addStage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <h5>Delete this?</h5>
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{ Route('admin.deleteNote') }}">
                @csrf
                <input type="text" name="note_id" hidden value="${ note_id }" />
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Dismiss</button>
                <button type="submit" class="btn btn-primary">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>
        `;
        $(deleteModal).modal('show');
    }
</script>
@include('admin.footer')
