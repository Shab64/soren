@include('admin.header')
<link rel="stylesheet" href="./assets/dt/jquery.dataTables.min.css">
<link rel="stylesheet" href="./assets/dt/datatables.min.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
        <div class="alert alert-success" style="display: none;" id="timeIndi">
            Time Changed Successfully!
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="box bg-gradient-primary">
                        <div class="box-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <div id="progressbar11" class="mx-auto w-80 position-relative"></div>
                                </div>
                                <div class=''>
                                    <h4 class="mt-0 text-white">Total Hours This Month</h4>
                                    <h3 class="fw-500 my-0 text-white"><?= $monthlyTotalHours ?></h3>
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
                                    <h4 class="mt-0">Total Hours Today</h4>
                                    <h3 class="fw-500 my-0"><?= $totalHours ?></h3>
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
                                    <h4 class="mt-0">Last Punch In</h4>
                                    <h3 class="fw-500 my-0">@if(!empty($lastPunchIn))
                                        {{ Date('d/m/Y',strtotime($lastPunchIn[0]['clock_in_date'])).' at '.Date('h:i A',strtotime($lastPunchIn[0]['clock_in_time'])) }}
                                        @else
                                        -
                                        @endif
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <div class="d-flex justify-content-between">
                                <div class='align-self-center'>
                                    <h3 class="box-title">Timesheet</h3>
                                </div>
                                <div>
                                    <select name="" id="" class="form-control">
                                        <option value="">---Select Month---</option>
                                        <option>Jan</option>
                                        <option>Feb</option>
                                        <option>Mar</option>
                                        <option>Apr</option>
                                        <option>May</option>
                                        <option>Jun</option>
                                        <option>Jul</option>
                                        <option>Aug</option>
                                        <option>Sep</option>
                                        <option>Oct</option>
                                        <option>Nov</option>
                                        <option>Dec</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="myTable2" class="table table-bordered ">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Clocked In</th>
                                            <!-- <th>Task</th> -->
                                            <th>Clocked Out</th>
                                            <th>Total Hours</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($timesheets)) {
                                            foreach ($timesheets as $k => $detail) { ?>
                                                <tr>
                                                    <td>{{ $k+1 }}</td>
                                                    <td>{{ Date('d-m-Y',strtotime($detail['clock_in_date'])) }}</td>
                                                    <td id="clock_in_time{{ $detail['id'] }}">{{ Date('h:i A',strtotime($detail['clock_in_time'])) }}</td>
                                                    <!-- <td>Linked website</td> -->
                                                    <td id="clock_out_time{{ $detail['id'] }}">{{ isset($detail['clock_out_time']) ? Date('h:i A',strtotime($detail['clock_out_time'])) : '-'  }}</td>
                                                    <td id="total_hours{{ $detail['id'] }}">{{ isset($detail['clock_out_time']) && isset($detail['clock_in_time']) ? round((strtotime($detail['clock_out_time']) - strtotime($detail['clock_in_time']))/3600, 1).' Hours' : '-' }}</td>
                                                    <td>
                                                        <a href="javascript:void(0)" onclick="showClockModal('<?= $detail['clock_in_time'] ?>','<?= $detail['clock_out_time'] ?>','<?= $detail['id'] ?>')" class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>
                                                    </td>
                                                </tr>
                                        <?php }
                                        } ?>
                                        <!-- <tr>
                                            <td>01</td>
                                            <td>01/12/2021</td>
                                            <td>10:00 AM</td>
                                            <td>Linked website</td>
                                            <td>6:00PM</td>
                                            <td>8 Hours</td>

                                            <td>
                                                <a href="#" class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>01</td>
                                            <td>01/12/2021</td>
                                            <td>10:00 AM</td>
                                            <td>Linked website</td>
                                            <td>6:00PM</td>
                                            <td>8 Hours</td>

                                            <td>
                                                <a href="#" class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>

                                            </td>
                                        </tr> -->
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

    function showClockModal(clockInTime, clockOutTime, ID) {
        let clockModal = `<div class="modal fade" id="editHours" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Hours</h5>
                <input id="timeID" value="` + ID + `" hidden />
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Clocked In:</label>
                    <input type="time" value="` + clockInTime + `" id="clocked_in" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Clocked Out:</label>
                    <input type="time" id="clocked_out" value="` + clockOutTime + `" class="form-control">
                </div>
                <span id="err" style="color: red;font-size: 12px"></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="updateTime()" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>`;

        $(clockModal).modal('show');
    }

    function updateTime() {
        let clockedInTime = $('#clocked_in').val();
        let clockedOutTime = $('#clocked_out').val();
        let timeID = $('#timeID').val();

        if (clockedInTime.length > 0 && clockedOutTime.length > 0) {
            let _token = "{{ csrf_token() }}";
            $.ajax({
                url: '{{ Route("admin.updateTime") }}',
                method: 'post',
                data: {
                    _token,
                    timeID,
                    clockedInTime,
                    clockedOutTime,
                }
            }).done(function(ret) {
                $('#editHours').modal('hide');
                // $('#timeIndi').css('display', 'block');
                location.reload();
                // $('#clock_in_time' + timeID).text(clockedInTime);
                // $('#clock_out_time' + timeID).text(clockedOutTime);
            }).fail(function(err) {
                console.log(err);
            });
        } else {
            $('#err').text("All Field Required!");
        }
    }
</script>
@include('admin.footer')