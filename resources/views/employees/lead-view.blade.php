@include('employees.header')
<link rel="stylesheet" href="{{url('assets/summernote/summernote.css')}}" />
<link rel="stylesheet" href="{{url('assets/dropify/dropify.css')}}" />
<script src="{{url('assets/kanban/jquery-sortable.js')}}"></script>

<style>
    iframe {
        width: 589px !important;
    }

    [type="checkbox"]:not(:checked),
    [type="checkbox"]:checked {
        position: absolute;
        left: 0 !important;
    }

    [type="checkbox"]+label:before,
    [type="checkbox"]:not(.filled-in)+label:after {
        border: 2px solid #4686ee;
    }

    .dropify-infos-message {
        display: none !important;
    }

    .note-toolbar-wrapper {
        height: 100px !important;
    }

    /* Kanban */
    body.dragging,
    body.dragging * {
        cursor: move !important;
    }

    .dragged {
        position: absolute;
        opacity: 0.5;
        z-index: 2000;
    }

    ol li {
        list-style: none;


    }

    ol {
        padding-left: 0px;
    }

    ol.example li.placeholder {
        position: relative;
        /** More li styles **/
    }

    ol.example li.placeholder:before {
        position: absolute;
        /** Define arrowhead **/
    }


    /* width */
    ::-webkit-scrollbar {
        width: 6px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #888;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #4d6382;
    }

    .element-wrapper .col-md-4 ol li div:hover {
        box-shadow: 0px 1px 7px;
        cursor: pointer;
        transition: .1s;
    }

    .drdiv {
        text-align: end;
        margin-top: -17px;
    }

    .arrow-steps .step span:before {
        opacity: 0;
        content: "✔" !important;
        position: absolute;
        top: -2px;
        left: -10px;
    }

    /*  */
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
        <!-- Main content -->
        @if(Session::get('email_success'))
        <div class="alert alert-success">
            {{ Session::get('email_success') }}
        </div>
        @endif
        @if(Session::get('event_success'))
        <div class="alert alert-success">
            {{ Session::get('event_success') }}
        </div>
        @endif
        <section class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-body">
                        <div class='row'>
                            <div class='col-lg-11'>
                                <div class="gridLead">
                                    <div>
                                        <div class="name">
                                            Company
                                        </div>
                                        <div class="detail">
                                            {{$lead_id[0]['company']}}
                                        </div>
                                    </div>
                                    <div>
                                        <div class="name">
                                            Name
                                        </div>
                                        <div class="detail">
                                            {{$lead_id[0]['f_name'].' '.$lead_id[0]['l_name']}}
                                        </div>
                                    </div>
                                    <div>
                                        <div class="name">
                                            Phone
                                        </div>
                                        <div class="detail">
                                            {{$lead_id[0]['phone']}}
                                        </div>
                                    </div>
                                    <div>
                                        <div class="name">
                                            Ad Spend
                                        </div>
                                        <div class="detail">
                                            ${{$lead_id[0]['ad_spend']}}
                                        </div>
                                    </div>
                                    <div>
                                        <div class="name">
                                            Email
                                        </div>
                                        <div class="detail">
                                            {{$lead_id[0]['email']}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1 drdiv">
                                <div class="dropdown mt-4">
                                    <button class="btn btn-primary" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <?php if ($lead_id[0]['status'] !== "Follow Up" && $lead_id[0]['is_upsell'] === "No") { ?>
                                            <li><a class="dropdown-item" href="javascript:void(0)" onclick="nextSlide('<?= $lead_id[0]['id'] ?>')"><i class='fa fa-check'></i> Mark this Status as Complete</a></li>
                                        <?php } else if ($lead_id[0]['status'] === "Follow Up"  && $lead_id[0]['is_upsell'] === "No") { ?>
                                            <li><a class="dropdown-item" href="javascript:void(0)" onclick="nextSlide2('<?= $lead_id[0]['id'] ?>')"><i class='fa fa-check'></i> Mark this Status as Complete</a></li>
                                        <?php } elseif ($lead_id[0]['is_upsell'] === "Yes") { ?>
                                            <li><a class="dropdown-item" href="javascript:void(0)" onclick="nextSlide3('<?= $lead_id[0]['id'] ?>')"><i class='fa fa-check'></i> Mark this Status as Complete</a></li>
                                        <?php } ?>
{{--                                        <li><a class="dropdown-item" href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('moveToForm').action = '<?= Route('employee.moveTo.status', ['Compilance']) ?>'; document.getElementById('moveToForm').submit();"><i class='fa fa-arrow-right'></i> Move to Compliance</a></li>--}}
{{--                                        <li><a class="dropdown-item" href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('moveToForm').action = '<?= Route('employee.moveTo.status', ['Lost']) ?>'; document.getElementById('moveToForm').submit();"><i class='fa fa-arrow-right'></i> Move to Lost</a></li>--}}
                                        <form id="moveToForm" method="POST" action="">
                                            @csrf
                                            <input hidden name="lead_id" type="text" value="{{ $lead_id[0]['id']  }}" />
                                        </form>
                                        <li><a class="dropdown-item" href="javascript:void(0)" data-bs-toggle='modal' data-bs-target='#changeStage'><i class='fa fa-edit'></i> Edit Stages</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0)" onclick="delete_('<?= route('employee.deleteLead.id', [$lead_id[0]['id']]) ?>')"><i class='fa fa-trash'></i> Delete Lead</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="stepSection">
                <ol id='list2' class="arrow-steps clearfix">
                    <?php
                    $stages = json_decode($lead_id[0]['temp_status'], true);
                    $followup_stages = json_decode($lead_id[0]['followup_statuses'], true);
                    $upsell_stages = json_decode($lead_id[0]['upsell_statuses'], true);
                    $v = 0;
                    $w = 11;
                    $z = 26;
                    if (!empty($stages) && $lead_id[0]['status'] != "Deleted" && $lead_id[0]['status'] != "Follow Up" && $lead_id[0]['is_upsell'] === "No") {
                        foreach ($stages as $stage) {
                    ?>
                            @if($v == 0)
                            <li class="step current" id="{{ $v }}_step"><span>{{ $stage }}</span></li>
                            @elseif($v != 0)
                            <li class="step" id="{{ $v }}_step"><span>{{ $stage }}</span></li>
                            @endif
                        <?php $v = $v + 1;
                        }
                    } else if ($lead_id[0]['status'] === "Follow Up" && $lead_id[0]['is_upsell'] === "No") {
                        foreach ($followup_stages as $followup_stage) {
                        ?>
                            @if($w == 11)
                            <li class="step current" id="{{ $w }}_step"><span>{{ $followup_stage }}</span></li>
                            @elseif($w != 11)
                            <li class="step" id="{{ $w }}_step"><span>{{ $followup_stage }}</span></li>
                            @endif
                        <?php $w = $w + 1;
                        }
                    } else if ($lead_id[0]['is_upsell'] === "Yes") {
                        foreach ($upsell_stages as $upsell_stage) {
                        ?>
                            @if($z == 26)
                            <li class="step current" id="{{ $z }}_step"><span>{{ $upsell_stage }}</span></li>
                            @elseif($z != 26)
                            <li class="step" id="{{ $z }}_step"><span>{{ $upsell_stage }}</span></li>
                            @endif
                    <?php $z = $z + 1;
                        }
                    } ?>

                    <!-- <li class="step current" id="0_step"> <span> New</span> </li>
                    <li class="step" id="1_step"> <span> Contacted</span> </li>
                    <li class="step" id="2_step"> <span> Identified DM</span> </li>
                    <li class="step" id="3_step"> <span> Contacted DM</span> </li>
                    <li class="step" id="4_step"> <span> Pitched Review</span> </li>
                    <li class="step" id="5_step"> <span> Linked</span> </li>
                    <li class="step" id="6_step"> <span> Audit</span> </li>
                    <li class="step" id="7_step"> <span> Presentation</span> </li>
                    <li class="step" id="8_step"> <span> Follow Up</span> </li>
                    <li class="step" id="9_step"> <span> Contract Sent</span> </li>
                    <li class="step" id="10_step"> <span> Converted</span> </li> -->
                </ol>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="box">
                        <div class="box-header">
                            <h5 class="box-title">Details</h5>
                            <div class='actionDetail' style="float: right">
                                <a href="javascript:void(0)" data-bs-toggle='modal' data-bs-target='#editLead' class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="detailBox">
                                        <div class="detailGrid">
                                            <div class='nameActions'>
                                                <div class="name">
                                                    Company
                                                </div>
                                                <div class="detail">
                                                    {{$lead_id[0]['company']}}
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="detailBox">
                                        <div class="detailGrid">
                                            <div>
                                                <div class="name">
                                                    Name
                                                </div>
                                                <div class="detail">
                                                    {{$lead_id[0]['f_name'] . ' ' . $lead_id[0]['l_name']}}
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="detailBox">
                                        <div class="detailGrid">
                                            <div>
                                                <div class="name">
                                                    Title
                                                </div>
                                                <div class="detail">
                                                    {{$lead_id[0]['title']}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="detailBox">
                                        <div class="detailGrid">
                                            <div>
                                                <div class="name">
                                                    Email
                                                </div>
                                                <div class="detail">
                                                    {{$lead_id[0]['email']}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="detailBox">
                                        <div class="detailGrid">
                                            <div>
                                                <div class="name">
                                                    Lead Status
                                                </div>
                                                <div class="detail">
                                                    {{$lead_id[0]['status']}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="detailBox">
                                        <div class="detailGrid">
                                            <div>
                                                <div class="name">
                                                    Followup Date
                                                </div>
                                                <div class="detail">
                                                    {{$lead_id[0]['f_date']}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="detailBox">
                                        <div class="detailGrid">
                                            <div>
                                                <div class="name">
                                                    Phone
                                                </div>
                                                <div class="detail">
                                                    {{$lead_id[0]['phone']}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="detailBox">
                                        <div class="detailGrid">
                                            <div>
                                                <div class="name">
                                                    Time Zone
                                                </div>
                                                <div class="detail">
                                                    {{$lead_id[0]['time_zone']}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="detailBox">
                                        <div class="detailGrid">
                                            <div>
                                                <div class="name">
                                                    Website
                                                </div>
                                                <div class="detail">
                                                    {{$lead_id[0]['website']}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Additional Information
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="detailBox">
                                                        <div class="detailGrid">
                                                            <div class='nameActions'>
                                                                <div class="name">
                                                                    Gate Keeper Name
                                                                </div>
                                                                <div class="detail">
                                                                    {{$lead_id[0]['gate_keeper_name']}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="detailBox">
                                                        <div class="detailGrid">
                                                            <div class='nameActions'>
                                                                <div class="name">
                                                                    Industry
                                                                </div>
                                                                <div class="detail">
                                                                    {{$lead_id[0]['industry']}}
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="detailBox">
                                                        <div class="detailGrid">
                                                            <div class='nameActions'>
                                                                <div class="name">
                                                                    Industry Detail
                                                                </div>
                                                                <div class="detail">
                                                                    {{$lead_id[0]['industry_details']}}
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="detailBox">
                                                        <div class="detailGrid">
                                                            <div class='nameActions'>
                                                                <div class="name">
                                                                    Other
                                                                </div>
                                                                <div class="detail">
                                                                    {{$lead_id[0]['f_name']}}
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="detailBox">
                                                        <div class="detailGrid">
                                                            <div class='nameActions'>
                                                                <div class="name">
                                                                    Lead Source
                                                                </div>
                                                                <div class="detail">
                                                                    {{$lead_id[0]['source']}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="detailBox">
                                                        <div class="detailGrid">
                                                            <div class='nameActions'>
                                                                <div class="name">
                                                                    Current Marketing Partners
                                                                </div>
                                                                <div class="detail">
                                                                    {{$lead_id[0]['marketing_partner']}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="detailBox">
                                                        <div class="detailGrid">
                                                            <div class='nameActions'>
                                                                <div class="name">
                                                                    ClD
                                                                </div>
                                                                <div class="detail">
                                                                    {{$lead_id[0]['cd']}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="detailBox">
                                                        <div class="detailGrid">
                                                            <div class='nameActions'>
                                                                <div class="name">
                                                                    Ad Spend
                                                                </div>
                                                                <div class="detail">
                                                                    {{$lead_id[0]['ad_spend']}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Top Competitors
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="detailBox">
                                                <div class="detailGrid">
                                                    <div class='nameActions'>
                                                        <div class="name">
                                                            Competitor 1
                                                        </div>
                                                        <div class="detail">
                                                            www.dummywebsite.com
                                                        </div>
                                                    </div>
                                                    <div class='actionDetail'>
                                                        <a href="javascript:void(0)" data-bs-toggle='modal' data-bs-target='#editTopCompetitors' class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="detailBox">
                                                <div class="detailGrid">
                                                    <div class='nameActions'>
                                                        <div class="name">
                                                            Competitor 2
                                                        </div>
                                                        <div class="detail">
                                                            www.dummywebsite.com
                                                        </div>
                                                    </div>
                                                    <div class='actionDetail'>
                                                        <a href="#" data-bs-toggle='modal' data-bs-target='#editTopCompetitors' class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="detailBox">
                                                <div class="detailGrid">
                                                    <div class='nameActions'>
                                                        <div class="name">
                                                            Competitor 3
                                                        </div>
                                                        <div class="detail">
                                                            www.dummywebsite.com
                                                        </div>
                                                    </div>
                                                    <div class='actionDetail'>
                                                        <a href="#" data-bs-toggle='modal' data-bs-target='#editTopCompetitors' class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
{{--                                <div class="accordion-item">--}}
{{--                                    <h2 class="accordion-header" id="headingThree">--}}
{{--                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">--}}
{{--                                            Address Information--}}
{{--                                        </button>--}}
{{--                                    </h2>--}}
{{--                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">--}}
{{--                                        <div class="accordion-body">--}}
{{--                                            <div class="detailBox">--}}
{{--                                                <div class="detailGrid">--}}
{{--                                                    <div class='nameActions'>--}}
{{--                                                        <div class="name">--}}
{{--                                                            Address--}}
{{--                                                        </div>--}}
{{--                                                        <div class="detail">--}}
{{--                                                            Abc Street New York USA--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class='actionDetail'>--}}
{{--                                                        <a href="javascript:void(0)" data-bs-toggle='modal' data-bs-target='#editAddress' class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>

                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="box tabbox">
                        <div class="box-header">
                            <ul class="nav nav-pills " id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true"><i class='fa fa-phone'></i> Log a Call</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false"><i class='fa fa-calendar'></i> New Task </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false"><i class='fa fa-envelope'></i> Email</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link last" id="pills-event-tab" data-bs-toggle="pill" data-bs-target="#pills-event" type="button" role="tab" aria-controls="pills-contact" aria-selected="false"><i class='fa fa-calendar'></i> New Event</button>
                                </li>
                            </ul>

                        </div>
                        <div class="box-body">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <div class='text-center'>
                                        <a href="javascript:void(0)" class="btn btn-primary"><i class='fa fa-phone'></i> Call Client</a>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="row" style="margin-bottom: 16px;">
                                        <div class="col-8 align-self-center">
                                            <div class='taskHead'>
                                                Task List
                                            </div>
                                        </div>
                                        <div class="col-4 tE">
                                            <a href="javascript:void(0)" data-bs-toggle='modal' data-bs-target='#addTask' class="btn btn-primary btn-sm"><i class='fa fa-plus'></i> Add Task</a>
                                        </div>
                                    </div>
                                    <ul class="tasklist">
                                        @if(!empty($lead_id[0]['lead_task']))
                                        @foreach($lead_id[0]['lead_task'] as $value)
                                        <li>
                                            <div class='taskGrid'>
                                                <div>
                                                    <div class="">
                                                        <input type="checkbox" id="basic_checkbox_{{ $value['id'] }}" onchange="changeStatus('<?= $value['id'] ?>')" <?= $value['is_complete'] === "Yes" ? 'checked' : '' ?> />
                                                        <label for="basic_checkbox_{{ $value['id'] }}"></label>
                                                    </div>
                                                </div>
                                                <div class='taskcontent'>
                                                    {{$value['task']}}
                                                </div>
                                            </div>
                                            <div class='dueDate'>
                                                Due Date : <span>{{$value['date']}}</span>
                                            </div>
                                        </li>
                                        @endforeach
                                        @endif
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                    <form action="{{ Route('employee.send') }}" method="POST">
                                        @csrf
                                        <input name="lead_id" hidden value="{{ $lead_id[0]['id'] }}" />
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="To..">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="subject" class="form-control" placeholder="Subject..">
                                        </div>
                                        <div class="form-group">
                                            <textarea name="message" id="" cols="30" rows="10" class="form-control" placeholder="Enter Message....">
                                            </textarea>
                                        </div>
                                        <div>
                                            <button type="submit" class="btn btn-primary">Send</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="pills-event" role="tabpanel" aria-labelledby="pills-event-tab">
                                    <div class="row" style="margin-bottom: 16px;">
                                        <div class="col-8 align-self-center">
                                            <div class='taskHead'>
                                                Event List
                                            </div>
                                        </div>
                                        <div class="col-4 tE">
                                            <a href="javascript:void(0)" data-bs-toggle='modal' data-bs-target='#addEvent' class="btn btn-primary btn-sm"><i class='fa fa-plus'></i> Add Event</a>
                                        </div>
                                    </div>
                                    @if(!empty($events))
                                    <ul class="tasklist">
                                        @foreach($events as $k => $event)
                                        <li>
                                            <div class='taskGrid'>
                                                <div>
                                                    <div class="">
                                                        <input type="checkbox" onchange="changeEventStatus('<?= $event['id'] ?>')" <?= $event['is_complete'] === "Yes" ?  'checked' : '' ?> id="basic_checkbox_{{ $event['id'] }}" />
                                                        <label for="basic_checkbox_{{ $event['id'] }}"></label>
                                                    </div>
                                                </div>
                                                <div class='taskcontent'>
                                                    {{ $event['event'] }}
                                                </div>
                                            </div>
                                            <div class='dueDate'>
                                                Event Date : <span>{{ Date('d-m-Y',strtotime($event['date'])) }}</span>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="accordion" id="accordionExample1">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne1">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne1" aria-expanded="true" aria-controls="collapseOne1">
                                    Notes
                                </button>
                            </h2>
                            <div id="collapseOne1" class="accordion-collapse collapse show" aria-labelledby="headingOne1" data-bs-parent="#accordionExample1">
                                <div class="accordion-body">
                                    <div class="endpara mb-3">
                                        <a href="javascript:void(0)" data-bs-toggle='modal' data-bs-target='#addNote' class="btn btn-primary btn-sm"><i class='fa fa-plus-circle'></i></a>

                                    </div>

                                    <div class="" style="width: 200px!important;">
                                        <h5 class='notesHead'>
                                            @if(!empty($lead_id[0]['notes']))
                                            {!! $lead_id[0]['notes'] !!}
                                            @else {{'No Notes'}}
                                            @endif
                                        </h5>
                                        <div class="endpara">
                                            {{-- <p>an hour ago by <span>John Doe</span></p>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            {{-- <h2 class="accordion-header" id="headingTwo1">--}}
                            {{-- <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo1" aria-expanded="false" aria-controls="collapseTwo1">--}}
                            {{-- Files--}}
                            {{-- </button>--}}
                            {{-- </h2>--}}
                            <div id="collapseTwo1" class="accordion-collapse collapse" aria-labelledby="headingTwo1" data-bs-parent="#accordionExample1">
                                <div class="accordion-body">
                                    <div class='form-group'>
                                        <label for="">Upload File</label>
                                        <input type="file" class="dropify" />
                                    </div>
                                    <div class="notesBody mt-4">
                                        <div class="iconGrid">
                                            <div>
                                                <i class='fa fa-file'></i>
                                            </div>
                                            <div>
                                                <span>Document 1</span>
                                            </div>
                                        </div>
                                        <div class="endpara">
                                            <p>an hour ago by <span>John Doe</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree1">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree1" aria-expanded="false" aria-controls="collapseThree1">
                                    Stage History
                                </button>
                            </h2>
                            <div id="collapseThree1" class="accordion-collapse collapse" aria-labelledby="headingThree1" data-bs-parent="#accordionExample1">
                                <div class="accordion-body">
                                    <div class="notesBody">
                                        <div class="row">
                                            <div class="col-4">
                                                <span class='stageName'>Stage:</span>
                                            </div>
                                            <div class="col-8">
                                                <span class='stageInfo'>{{$lead_id[0]['status']}}</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <span class='stageName'>Amount:</span>
                                            </div>
                                            <div class="col-8">
                                                <span class='stageInfo'>{{$lead_id[0]['ad_spend']}}</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <span class='stageName'>Close Date:</span>
                                            </div>
                                            <div class="col-8">
                                                <span class='stageInfo'>{{date('Y-m-d',strtotime($lead_id[0]['updated_at']))}}</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <span class='stageName'>Last Modified By:</span>
                                            </div>
                                            <div class="col-8">
                                                <span class='stageInfo'>Soren</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <span class='stageName'>Last Modified:</span>
                                            </div>
                                            <div class="col-8">
                                                <span class='stageInfo'>{{date('Y-m-d H:i:s',strtotime($lead_id[0]['updated_at']))}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </section>
        <!-- /.content -->
    </div>
</div>


<!-- Modal -->

<!-- Edit Top Competitors  -->
<div class="modal fade" id="editTopCompetitors" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Top Competitors</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <label for="">Competitor 1</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Competitor 2</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Competitor 3</label>
                        <input type="text" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Address  -->
<div class="modal fade" id="editAddress" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Address</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" class="form-control">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Address  -->
<div class="modal fade" id="addTask" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url('employee/lead/addTask/'.$lead_id[0]['id'])}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Task Name</label>
                        <input type="text" class="form-control" name="task">
                        <input type="hidden" class="form-control" name="lead_id" value="{{$lead_id[0]['id']}}">
                    </div>
                    <div class="form-group">
                        <label for="">Task Date</label>
                        <input type="date" class="form-control" name="date">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="add">
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="addEvent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ Route('employee.addEvent') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Event Title</label>
                        <input type="text" class="form-control" name="event">
                        <input type="hidden" class="form-control" name="lead_id" value="{{$lead_id[0]['id']}}">
                    </div>
                    <div class="form-group">
                        <label for="">Event Date</label>
                        <input type="date" class="form-control" name="date">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="add">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Note  -->
<div class="modal fade" id="addNote" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Note</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{url('employee/lead/update/'.Request::segment(3))}}">
                @csrf
                <div class="modal-body">
                    <textarea id="summernote" name="notes"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Save changes">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add a Stage  -->
<div class="modal fade" id="addStage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Stage</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Stage Name</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Stages  -->
<div class="modal fade" id="changeStage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ Route('employee.updateTempStages') }}">
                @csrf
                <input type="text" hidden value="{{ $lead_id[0]['id'] }}" name="leadID" />
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Stage</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if(!empty($stages))
                    @foreach($stages as $stage)
                    <div class="form-group">
                        <div class="row">
                            <div class="col-11">
                                <input type="text" required name="stages[]" class="form-control" value='{{ $stage }}'>
                            </div>
                            <!-- <div class="col-1 align-self-center">
                            <a href="javascript:void(0)" style="font-size: 20px;" class="text text-danger"><i class='fa fa-trash'></i></a>
                        </div> -->
                        </div>
                    </div>
                    @endforeach
                    @endif

                    <!-- <div class="form-group">
                    <div class="row">
                        <div class="col-11">
                            <input type="text" class="form-control" value='Contacted'>
                        </div>
                        <div class="col-1 align-self-center">
                            <a href="javascript:void(0)" style="font-size: 20px;" class="text text-danger"><i class='fa fa-trash'></i></a>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-11">
                            <input type="text" class="form-control" value='Identified DM'>
                        </div>
                        <div class="col-1 align-self-center">
                            <a href="javascript:void(0)" style="font-size: 20px;" class="text text-danger"><i class='fa fa-trash'></i></a>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-11">
                            <input type="text" class="form-control" value='Contacted DM'>
                        </div>
                        <div class="col-1 align-self-center">
                            <a href="javascript:void(0)" style="font-size: 20px;" class="text text-danger"><i class='fa fa-trash'></i></a>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-11">
                            <input type="text" class="form-control" value='Pitched Review'>
                        </div>
                        <div class="col-1 align-self-center">
                            <a href="javascript:void(0)" style="font-size: 20px;" class="text text-danger"><i class='fa fa-trash'></i></a>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-11">
                            <input type="text" class="form-control" value='Linked'>
                        </div>
                        <div class="col-1 align-self-center">
                            <a href="javascript:void(0)" style="font-size: 20px;" class="text text-danger"><i class='fa fa-trash'></i></a>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-11">
                            <input type="text" class="form-control" value='Audit'>
                        </div>
                        <div class="col-1 align-self-center">
                            <a href="javascript:void(0)" style="font-size: 20px;" class="text text-danger"><i class='fa fa-trash'></i></a>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-11">
                            <input type="text" class="form-control" value='Presentation'>
                        </div>
                        <div class="col-1 align-self-center">
                            <a href="javascript:void(0)" style="font-size: 20px;" class="text text-danger"><i class='fa fa-trash'></i></a>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-11">
                            <input type="text" class="form-control" value='Follow Up'>
                        </div>
                        <div class="col-1 align-self-center">
                            <a href="javascript:void(0)" style="font-size: 20px;" class="text text-danger"><i class='fa fa-trash'></i></a>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-11">
                            <input type="text" class="form-control" value='Contract Sent'>
                        </div>
                        <div class="col-1 align-self-center">
                            <a href="javascript:void(0)" style="font-size: 20px;" class="text text-danger"><i class='fa fa-trash'></i></a>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-11">
                            <input type="text" class="form-control" value='Converted'>
                        </div>
                        <div class="col-1 align-self-center">
                            <a href="javascript:void(0)" style="font-size: 20px;" class="text text-danger"><i class='fa fa-trash'></i></a>
                        </div>
                    </div>
                </div> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="editLead" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Lead</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url('employee/lead/update/'.$lead_id[0]['id'])}}" class="row" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="formTitle">
                        <div class="innertitle">
                            Lead Information
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Company*</label>
                                <input type="text" class="form-control" name="company" value="{{(!empty($lead_id[0]['company'])) ? $lead_id[0]['company'] : "" }}">
                            </div>
                            <div class="form-group">
                                <label for="">First Name</label>
                                <input type="text" class="form-control" name="f_name" value="{{(!empty($lead_id[0]['f_name'])) ? $lead_id[0]['f_name'] : ""}}">
                            </div>
                            <div class="form-group">
                                <label for="">Last Name</label>
                                <input type="text" class="form-control" name="l_name" value="{{(!empty($lead_id[0]['l_name'])) ? $lead_id[0]['l_name'] : "" }}">
                            </div>
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" class="form-control" name="title" value="{{(!empty($lead_id[0]['title'])) ? $lead_id[0]['title'] : "" }}">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" class="form-control" name="email" value="{{(!empty($lead_id[0]['email'])) ? $lead_id[0]['email'] : "" }}">
                            </div>
                            <div class="form-group">
                                <label for="">Lead Status</label>
                                <select name="status" id="" class="form-control">
                                    <option value="New" {{(!empty($lead_id[0]['title'])) ? $lead_id[0]['title'] : "" }}>New</option>
                                    <option value="Contacted" {{(!empty($lead_id[0]['title']) and $lead_id[0]['status'] === '') ? $lead_id[0]['title'] : "" }}>Contacted</option>
                                    <option value="Identified DM" {{(!empty($lead_id[0]['title']) and $lead_id[0]['status'] === '') ? $lead_id[0]['title'] : "" }}>Identified DM</option>
                                    <option value="Contacted DM" {{(!empty($lead_id[0]['title']) and $lead_id[0]['status'] === '') ? $lead_id[0]['title'] : "" }}>Contacted DM</option>
                                    <option value="Pitched Review" {{(!empty($lead_id[0]['title']) and $lead_id[0]['status'] === '') ? $lead_id[0]['title'] : "" }}>Pitched Review</option>
                                    <option value="Linked" {{(!empty($lead_id[0]['title']) and $lead_id[0]['status'] === '') ? $lead_id[0]['title'] : "" }}>Linked</option>
                                    <option value="Audit / Meeting Schedule" {{(!empty($lead_id[0]['title']) and $lead_id[0]['status'] === '') ? $lead_id[0]['title'] : "" }}>Audit / Meeting Schedule</option>
                                    <option value="Presentation" {{(!empty($lead_id[0]['title']) and $lead_id[0]['status'] === '') ? $lead_id[0]['title'] : "" }}>Presentation</option>
                                    <option value="Follow Up" {{(!empty($lead_id[0]['title']) and $lead_id[0]['status'] === '') ? $lead_id[0]['title'] : "" }}>Follow Up</option>
                                    <option value="Contract Sent" {{(!empty($lead_id[0]['title']) and $lead_id[0]['status'] === '') ? $lead_id[0]['title'] : "" }}>Contract Sent</option>
                                    <option value="Converted" {{(!empty($lead_id[0]['title']) and $lead_id[0]['status'] === '') ? $lead_id[0]['title'] : "" }}>Converted</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Follow Up Date</label>
                                        <input type="date" class="form-control" name="f_date">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Follow Up Time</label>
                                        <input type="time" class="form-control" name="time">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="number" class="form-control" name="phone">
                            </div>
                            <div class="form-group">
                                <label for="">Alternate Phone</label>
                                <input type="number" class="form-control" name="a_phone">
                            </div>
                            <div class="form-group">
                                <label for="">Time Zone</label>
                                <select name="time_zone" id="" class="form-control">
                                    <option value="AST">AST</option>
                                    <option value="EST">EST</option>
                                    <option value="EDT">EDT</option>
                                    <option value="CST">CST</option>
                                    <option value="CDT">CDT</option>
                                    <option value="MST">MST</option>
                                    <option value="MDT">MDT</option>
                                    <option value="PST">PST</option>
                                    <option value="PDT">PDT</option>
                                    <option value="AKST">AKST</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Website</label>
                                <input type="text" class="form-control" name="website">
                            </div>
                        </div>
                    </div>

                    <div class="formTitle margin-16">
                        <div class="innertitle">
                            Additional Information
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Gate Keeper's Name*</label>
                                <input type="text" class="form-control" name="gate_keeper_name">
                            </div>
                            <div class="form-group">
                                <label for="">Industry</label>
                                <select name="industry" id="" class="form-control">
                                    <option value="none" hidden>--None--</option>
                                    <option value="General Contractor">General Contractor</option>
                                    <option value="General Services">General Services</option>
                                    <option value="Ecommerce">Ecommerce</option>
                                    <option value="SEO Only">SEO Only</option>
                                    <option value="SMM Only">SMM Only</option>
                                    <option value="Website Only">Website Only</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Industry Details</label>
                                <select name="industry_details" id="" class="form-control">
                                    <option value="none">--None--</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Other</label>
                                <textarea name="other" id="" cols="30" rows="10" class="form-control"></textarea>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Lead Source</label>
                                <select name="source" id="" class="form-control">
                                    <option value="" hidden>--None--</option>
                                    <option value="AdSearch Website">AdSearch Website</option>
                                    <option value="Angle's List">Angle's List</option>
                                    <option value="Employee Referral">Employee Referral</option>
                                    <option value="Google Search">Google Search</option>
                                    <option value="HomeAdvisor">HomeAdvisor</option>
                                    <option value="Marketing Referal">Marketing Referal</option>
                                    <option value="Marketing Upsell">Marketing Upsell</option>
                                    <option value="Other">Other</option>
                                    <option value="Referral">Referral</option>
                                    <option value="SpyFu">SpyFu</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Current Marketing Partner</label>
                                <input type="text" class="form-control" name="marketing_partner">
                            </div>
                            <div class="form-group">
                                <label for="">CD</label>
                                <input type="text" class="form-control" name="cd">
                            </div>
                            <div class="form-group">
                                <label for="">Ad Spend</label>
                                <input type="number" class="form-control" name="ad_spend">
                            </div>

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Save changes">
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function changeStatus(taskID) {
        let checked = $('#basic_checkbox_' + taskID).is(":checked");
        let _token = '{{ csrf_token() }}';
        $.ajax({
            url: "{{ Route('employee.checked_task')  }}",
            type: "post",
            data: {
                _token,
                checked,
                taskID
            },
        }).done(function(data) {
            // console.log(data);
        }).fail(function(error) {
            console.log(error)
        });
    }

    function changeEventStatus(eventID) {
        let checked = $('#basic_checkbox_' + eventID).is(":checked");
        let _token = '{{ csrf_token() }}';

        $.ajax({
            url: "{{ Route('employee.checked_event')  }}",
            type: "post",
            data: {
                _token,
                checked,
                eventID
            },
        }).done(function(data) {

        }).fail(function(error) {
            console.log(error)
        });
    }

    const steps = document.querySelectorAll('.step');
    const next = document.querySelector('#next');
    const prev = document.querySelector('#prev');


    let slideInterval;
    const nextSlide = (leadID) => {
        // Get current class
        const current = document.querySelector('.current');
        // Remove current class
        current.classList.remove('current');
        current.classList.add('done');
        // Check for next slide
        if (current.nextElementSibling) {
            // Add current to next sibling
            // current.nextElementSibling.classList.add('current');
            current.nextElementSibling.classList.add('current');
        } else {
            // Add current to start
            steps[0].classList.add('current');
            steps.forEach(step => {
                step.classList.remove('done');

            })
        }

        let _token = '{{ csrf_token() }}';
        $.ajax({
            url: "{{ Route('employee.changeLeadStatus') }}",
            type: "post",
            data: {
                _token,
                leadID
            }
        }).done(function(data) {
            console.log(data);
            if (data === "reload") {
                location.reload();
            }
        }).fail(function(error) {
            console.log(error);
        });
    };

    const nextSlide2 = (leadID) => {
        // Get current class
        const current = document.querySelector('.current');
        // Remove current class
        current.classList.remove('current');
        current.classList.add('done');
        // Check for next slide
        if (current.nextElementSibling) {
            // Add current to next sibling
            // current.nextElementSibling.classList.add('current');
            current.nextElementSibling.classList.add('current');
        } else {
            // Add current to start
            steps[0].classList.add('current');
            steps.forEach(step => {
                step.classList.remove('done');

            })
        }

        let _token = '{{ csrf_token() }}';
        $.ajax({
            url: "{{ Route('employee.changeInnerLead') }}",
            type: "post",
            data: {
                _token,
                leadID
            }
        }).done(function(data) {
            console.log(data);
            if (data === "reload") {
                location.reload();
            }
        }).fail(function(error) {
            console.log(error, "error");
        });
    }

    const nextSlide3 = (leadID) => {
        // Get current class
        const current = document.querySelector('.current');
        // Remove current class
        current.classList.remove('current');
        current.classList.add('done');
        // Check for next slide
        if (current.nextElementSibling) {
            // Add current to next sibling
            // current.nextElementSibling.classList.add('current');
            current.nextElementSibling.classList.add('current');
        } else {
            // Add current to start
            steps[0].classList.add('current');
            // steps.forEach(step => {
            //     step.classList.remove('done');
            // })
        }

        let _token = '{{ csrf_token() }}';
        $.ajax({
            url: "{{ Route('employee.changeUpsellStage') }}",
            type: "post",
            data: {
                _token,
                leadID
            }
        }).done(function(data) {}).fail(function(error) {
            console.log(error, "error");
        });
    }
</script>

<script src="{{url('assets/summernote/summernote.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>
<script src="{{url('assets/dropify/dropify.js')}}"></script>
<script>
    $('.dropify').dropify();

    let status = "{{ $lead_id[0]['status']}}";
    let followUpStatus = "{{ $lead_id[0]['followup_status'] }}";
    let upsellStatus = "{{ $lead_id[0]['upsell_status'] }}";
    var pos = 0;
    var is_complete = "{{ $lead_id[0]['is_complete'] }}";
    var currentStatus = "{{ $lead_id[0]['status'] }}";
    var is_upsell = "{{ $lead_id[0]['is_upsell'] }}"
    var upsell_complete = "{{ $lead_id[0]['upsell_complete'] }}";
    if (currentStatus !== "Follow Up" && is_upsell === "No") {
        switch (status) {
            case "Contacted":
                pos = 1;
                break;
            case "Identified DM":
                pos = 2;
                break;
            case "Contacted DM":
                pos = 3;
                break;
            case "Pitched Review":
                pos = 4;
                break;
            case "Linked":
                pos = 5;
                break;
            case "Audit / Meeting Schedule":
                pos = 6;
                break;
            case "Presentation":
                pos = 7;
                break;
            case "Follow Up":
                pos = 8;
                break;
            case "Contract Sent":
                pos = 9;
                break;
            case "Converted":
                pos = 10;
                break;
        }
        // console.log(currentStatus,status);
        if (pos >= 1) {
            $('#0_step').removeClass("current");
            $('#0_step').addClass("done");
            console.log(pos);
            for (var i = 1; i <= pos; i++) {
                if (i < pos) {
                    $('#' + i + "_step").addClass("done");
                } else if (i == pos && is_complete === "No") {
                    $('#' + i + "_step").addClass("current");
                } else if (i == pos && is_complete === "Yes") {
                    $('#' + i + "_step").addClass("done");
                }
            }
        }
    } else if (currentStatus === "Follow Up" && is_upsell === "No") {
        switch (followUpStatus) {
            case "Order Notes":
                pos = 11;
                break;
            case "Schedule Intake Call":
                pos = 12;
                break;
            case "Welcome Email":
                pos = 13;
                break;
            case "Intake":
                pos = 14;
                break;
            case "Build":
                pos = 15;
                break;
            case "Upload":
                pos = 16;
                break;
            case "Web Access":
                pos = 17;
                break;
            case "GTM":
                pos = 18;
                break;
            case "Conversation Actions":
                pos = 19;
                break;
            case "Display Campaign":
                pos = 20;
                break;
            case "Introduction Email":
                pos = 21;
                break;
            case "Launch Call":
                pos = 22;
                break;
            case "Notify Billing":
                pos = 23;
                break;
            case "Set Rebill Date":
                pos = 24;
                break;
            case "Full Review":
                pos = 25;
                break;
        }
        if (pos > 11) {
            $('#11_step').removeClass("current");
            $('#11_step').addClass("done");
            for (var i = 12; i <= pos; i++) {
                if (i < pos) {
                    $('#' + i + "_step").addClass("done");
                } else if (i == pos) {
                    $('#' + i + "_step").addClass("current");
                }
            }
        } else if (pos == 11) {
            $('#11_step').addClass("current");
        }
    } else if (is_upsell === "Yes") {
        switch (upsellStatus) {
            case "Identified":
                pos = 26;
                break;
            case "Pitched":
                pos = 27;
                break;
            case "Follow Up":
                pos = 28;
                break;
            case "Converted":
                pos = 29;
                break;
        }
        if (pos > 26) {
            $('#26_step').removeClass("current");
            $('#26_step').addClass("done");
            for (var i = 27; i <= pos; i++) {
                if (i < pos) {
                    $('#' + i + "_step").addClass("done");
                } else if (i == pos && upsell_complete === "No") {
                    $('#' + i + "_step").addClass("current");
                } else if (i == pos && upsell_complete === "Yes") {
                    $('#' + i + "_step").addClass("done");
                }
            }
        } else if (pos == 26) {
            $('#26_step').addClass("current");
        }
        console.log(pos, upsell_complete);
    }
</script>
<script>
    $(document).ready(function() {
        $("ol#list2").sortable({
            group: "list"
        });

    }); {
        {
            --$.ajaxSetup({
                    --
                }
            } {
                {
                    --headers: {
                        --
                    }
                } {
                    {
                        --'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') --
                    }
                } {
                    {
                        --
                    }--
                }
            } {
                {
                    --
                });
            --
        }
    } {
        {
            --jQuery.ajax({
                    --
                }
            } {
                {
                    --url: "{{ url('/grocery/post') }}", --
                }
            } {
                {
                    --method: 'post', --
                }
            } {
                {
                    --data: {
                        --
                    }
                } {
                    {
                        --name: jQuery('#name').val(), --
                    }
                } {
                    {
                        --type: jQuery('#type').val(), --
                    }
                } {
                    {
                        --price: jQuery('#price').val() --
                    }
                } {
                    {
                        --
                    }, --
                }
            } {
                {
                    --success: function(result) {
                        --
                    }
                } {
                    {
                        --console.log(result);
                        --
                    }
                } {
                    {
                        --
                    }
                });
            --
        }
    } {
        {
            --
        });
    --
    }
    }
</script>
<script>
    // function delete_(leadID) {
    //     console.log(leadID);
    // }
</script>



@include('employees.footer')
