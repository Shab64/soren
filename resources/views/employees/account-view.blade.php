@include('employees.header')
<link rel="stylesheet" href="./assets/summernote/summernote.css" />
<link rel="stylesheet" href="./assets/dropify/dropify.css" />
<script src="assets/kanban/jquery-sortable.js"></script>

<style>
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
    body.dragging, body.dragging * {
        cursor: move !important;
    }

    .dragged {
        position: absolute;
        opacity: 0.5;
        z-index: 2000;
    }
    ol li{
        list-style: none;


    }

    ol{
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

    .element-wrapper .col-md-4 ol li div:hover{
        box-shadow: 0px 1px 7px;
        cursor: pointer;
        transition: .1s;
    }
    /*  */
</style>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
        <!-- Main content -->
        <section class="content">


            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-body">
                        <div class="gridLead">
                            <div>
                                <div class="name">
                                    Company
                                </div>
                                <div class="detail">
                                    ABC Company
                                </div>
                            </div>
                            <div>
                                <div class="name">
                                    Name
                                </div>
                                <div class="detail">
                                    John Doe
                                </div>
                            </div>
                            <div>
                                <div class="name">
                                    Phone
                                </div>
                                <div class="detail">
                                    + 921 123 123 123
                                </div>
                            </div>
                            <div>
                                <div class="name">
                                    Ad Spend
                                </div>
                                <div class="detail">
                                    $1,000,000
                                </div>
                            </div>
                            <div>
                                <div class="name">
                                    Website
                                </div>
                                <div class="detail">
                                    https://www.adsearch.marketing/
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>



            <div class="row">
                <div class="col-lg-4">
                    <div class="box">
                        <div class="box-header">
                            <h5 class="box-title">Details</h5>
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
                                                    ABC Company
                                                </div>
                                            </div>
                                            <div class='actionDetail'>
                                                <a href="javascript:void(0)" data-bs-toggle='modal' data-bs-target='#editCompany' class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>
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
                                                    John Doe
                                                </div>
                                            </div>
                                            <div class='actionDetail'>
                                                <a href="javascript:void(0)" data-bs-toggle='modal' data-bs-target='#editName' class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>
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
                                                    Website SEO
                                                </div>
                                            </div>
                                            <div class='actionDetail'>
                                                <a href="javascript:void(0)" data-bs-toggle='modal' data-bs-target='#editTitle' class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>
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
                                                    johndoe100@gmail.com
                                                </div>
                                            </div>
                                            <div class='actionDetail'>
                                                <a href="javascript:void(0)" data-bs-toggle='modal' data-bs-target='#editEmail' class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>
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
                                                    New
                                                </div>
                                            </div>
                                            <div class='actionDetail'>
                                                <a href="javascript:void(0)" data-bs-toggle='modal' data-bs-target='#editStatus' class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>
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
                                                    12-12-2021
                                                </div>
                                            </div>
                                            <div class='actionDetail'>
                                                <a href="javascript:void(0)" data-bs-toggle='modal' data-bs-target='#editDate' class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>
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
                                                    +921 123 123
                                                </div>
                                            </div>
                                            <div class='actionDetail'>
                                                <a href="javascript:void(0)" data-bs-toggle='modal' data-bs-target='#editPhone' class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>
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
                                                    PCT
                                                </div>
                                            </div>
                                            <div class='actionDetail'>
                                                <a href="javascript:void(0)" data-bs-toggle='modal' data-bs-target='#editTime' class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>
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
                                                    www.adsearch.marketing
                                                </div>
                                            </div>
                                            <div class='actionDetail'>
                                                <a href="javascript:void(0)" data-bs-toggle='modal' data-bs-target='#editWebsite' class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>
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
                                                                    John Smith
                                                                </div>
                                                            </div>
                                                            <div class='actionDetail'>
                                                                <a href="javascript:void(0)" data-bs-toggle='modal' data-bs-target='#editGateKeeper' class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>
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
                                                                    SEO
                                                                </div>
                                                            </div>
                                                            <div class='actionDetail'>
                                                                <a href="javascript:void(0)" data-bs-toggle='modal' data-bs-target='#editIndustry' class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>
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
                                                                    ------
                                                                </div>
                                                            </div>
                                                            <div class='actionDetail'>
                                                                <a href="javascript:void(0)" data-bs-toggle='modal' data-bs-target='#editIndustryDetail' class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>
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
                                                                    ------
                                                                </div>
                                                            </div>
                                                            <div class='actionDetail'>
                                                                <a href="javascript:void(0)" data-bs-toggle='modal' data-bs-target='#editOther' class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>
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
                                                                    SpyFu
                                                                </div>
                                                            </div>
                                                            <div class='actionDetail'>
                                                                <a href="javascript:void(0)" data-bs-toggle='modal' data-bs-target='#editLeadSource' class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>
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
                                                                    SEO
                                                                </div>
                                                            </div>
                                                            <div class='actionDetail'>
                                                                <a href="javascript:void(0)" data-bs-toggle='modal' data-bs-target='#editCurrent' class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>
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
                                                                    ------
                                                                </div>
                                                            </div>
                                                            <div class='actionDetail'>
                                                                <a href="javascript:void(0)" data-bs-toggle='modal' data-bs-target='#editCID' class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>
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
                                                                    $1,000,000
                                                                </div>
                                                            </div>
                                                            <div class='actionDetail'>
                                                                <a href="javascript:void(0)" data-bs-toggle='modal' data-bs-target='#editAdSpend' class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>
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
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Address Information
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="detailBox">
                                                <div class="detailGrid">
                                                    <div class='nameActions'>
                                                        <div class="name">
                                                            Address
                                                        </div>
                                                        <div class="detail">
                                                            Abc Street New York USA
                                                        </div>
                                                    </div>
                                                    <div class='actionDetail'>
                                                        <a href="javascript:void(0)" data-bs-toggle='modal' data-bs-target='#editAddress' class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                        <li>
                                            <div class='taskGrid'>
                                                <div>
                                                    <div class="">
                                                        <input type="checkbox" id="basic_checkbox_2" />
                                                        <label for="basic_checkbox_2"></label>
                                                    </div>
                                                </div>
                                                <div class='taskcontent'>
                                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Provident explicabo, eos laborum dicta beatae tenetur sed rerum at ab ea.
                                                </div>
                                            </div>
                                            <div class='dueDate'>
                                                Due Date : <span>12-08-2022</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class='taskGrid'>
                                                <div>
                                                    <div class="">
                                                        <input type="checkbox" id="basic_checkbox_3" />
                                                        <label for="basic_checkbox_3"></label>
                                                    </div>
                                                </div>
                                                <div class='taskcontent'>
                                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Provident explicabo, eos laborum dicta beatae tenetur sed rerum at ab ea.
                                                </div>
                                            </div>
                                            <div class='dueDate'>
                                                Due Date : <span>12-08-2022</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                    <form action="">
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="To..">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Subject..">
                                        </div>
                                        <div class="form-group">
                                            <textarea name="" id="" cols="30" rows="10" class="form-control" placeholder="Enter Message....">
                                            </textarea>
                                        </div>
                                        <div>
                                            <a href="#" class="btn btn-primary">Send</a>
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
                                            <a href="javascript:void(0)" data-bs-toggle='modal' data-bs-target='#addTask' class="btn btn-primary btn-sm"><i class='fa fa-plus'></i> Add Event</a>
                                        </div>
                                    </div>
                                    <ul class="tasklist">
                                        <li>
                                            <div class='taskGrid'>
                                                <div>
                                                    <div class="">
                                                        <input type="checkbox" id="basic_checkbox_4" />
                                                        <label for="basic_checkbox_4"></label>
                                                    </div>
                                                </div>
                                                <div class='taskcontent'>
                                                    Client's Birthday
                                                </div>
                                            </div>
                                            <div class='dueDate'>
                                                Event Date : <span>12-08-2022</span>
                                            </div>
                                        </li>

                                    </ul>
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

                                    <div class="notesBody">
                                        <h5 class='notesHead'>SEO - Optimized</h5>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam dolorem molestias corporis voluptatum dolore, corrupti libero sunt excepturi. Ea, placeat?</p>
                                        <div class="endpara">
                                            <p>an hour ago by <span>John Doe</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo1">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo1" aria-expanded="false" aria-controls="collapseTwo1">
                                    Files
                                </button>
                            </h2>
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
                                                    <span class='stageInfo'>Contacted</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <span class='stageName'>Amount:</span>
                                            </div>
                                            <div class="col-8">
                                                    <span class='stageInfo'>$1,000,000</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <span class='stageName'>Close Date:</span>
                                            </div>
                                            <div class="col-8">
                                                    <span class='stageInfo'>4/08/2022</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <span class='stageName'>Last Modified By:</span>
                                            </div>
                                            <div class="col-8">
                                                    <span class='stageInfo'>John Doe</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <span class='stageName'>Last Modified:</span>
                                            </div>
                                            <div class="col-8">
                                                    <span class='stageInfo'>04/08/2022 at 4.00PM</span>
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

<!-- Edit Company -->
<div class="modal fade" id="editCompany" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Company</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <label for="">Company Name</label>
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

<!-- Edit Name  -->
<div class="modal fade" id="editName" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Name</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <label for="">Name</label>
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

<!-- Edit Title  -->
<div class="modal fade" id="editTitle" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <label for="">Title</label>
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

<!-- Edit Email  -->
<div class="modal fade" id="editEmail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Email</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control">
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

<!-- Edit Lead Status  -->
<div class="modal fade" id="editStatus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Lead Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <label for="">Lead Status</label>
                        <select name="" id="" class="form-control">
                            <option value="">New</option>
                            <option value="">Contacted</option>
                            <option value="">Identified DM</option>
                            <option value="">Contacted DM</option>
                            <option value="">Pitched Review</option>
                            <option value="">Linked</option>
                            <option value="">Audit / Meeting Schedule</option>
                            <option value="">Presentation</option>
                            <option value="">Follow Up</option>
                            <option value="">Contract Sent</option>
                            <option value="">Converted</option>
                        </select>
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

<!-- Edit Followup Date  -->
<div class="modal fade" id="editDate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Followup Date</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <label for="">Followup Date</label>
                        <input type="date" class="form-control">
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

<!-- Phone Number -->
<div class="modal fade" id="editPhone" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Phone Number</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <label for="">Phone Number</label>
                        <input type="number" class="form-control">
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

<!-- Edit Timezone Date  -->
<div class="modal fade" id="editTime" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Time Zone</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <label for="">Timezone</label>
                        <select name="" id="" class="form-control">
                            <option value="">AST</option>
                            <option value="">EST</option>
                            <option value="">EDT</option>
                            <option value="">CST</option>
                            <option value="">CDT</option>
                            <option value="">MST</option>
                            <option value="">MDT</option>
                            <option value="">PST</option>
                            <option value="">PDT</option>
                            <option value="">AKST</option>
                        </select>
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

<!-- Edit Website  -->
<div class="modal fade" id="editWebsite" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Website</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <label for="">Website</label>
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

<!-- Edit Gate Keeper  -->
<div class="modal fade" id="editGateKeeper" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Gate Keeper</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <label for="">Gate Keeper Name</label>
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

<!-- Edit Industry  -->
<div class="modal fade" id="editIndustry" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Industry</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <label for="">Industry</label>
                        <select name="" id="" class="form-control">
                            <option value="">--None--</option>
                            <option value="">General Contractor</option>
                            <option value="">General Services</option>
                            <option value="">Ecommerce</option>
                            <option value="">SEO Only</option>
                            <option value="">SMM Only</option>
                            <option value="">Website Only</option>
                        </select>
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

<!-- Edit Industry Detail  -->
<div class="modal fade" id="editIndustryDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Industry Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <label for="">Industry Detail</label>
                        <select name="" id="" class="form-control">
                            <option value="">--None--</option>
                            <option value="">General Contractor</option>
                            <option value="">General Services</option>
                            <option value="">Ecommerce</option>
                            <option value="">SEO Only</option>
                            <option value="">SMM Only</option>
                            <option value="">Website Only</option>
                        </select>
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

<!-- Edit Other  -->
<div class="modal fade" id="editOther" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Other Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <label for="">Industry Detail</label>
                        <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
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

<!-- Edit Lead Source  -->
<div class="modal fade" id="editLeadSource" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Lead Source</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <label for="">Lead Source</label>
                        <select name="" id="" class="form-control">
                            <option value="">--None--</option>
                            <option value="">AdSearch Website</option>
                            <option value="">Angle's List</option>
                            <option value="">Employee Referral</option>
                            <option value="">Google Search</option>
                            <option value="">HomeAdvisor</option>
                            <option value="">Marketing Referal</option>
                            <option value="">Marketing Upsell</option>
                            <option value="">Other</option>
                            <option value="">Referral</option>
                            <option value="">SpyFu</option>
                        </select>
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

<!-- Edit Current Marketing Partners  -->
<div class="modal fade" id="editCurrent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Current Marketing Partner</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <label for="">Current Marketing Partner</label>
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

<!-- Edit CID  -->
<div class="modal fade" id="editCID" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit CID</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <label for="">CIDr</label>
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

<!-- Edit Ad Spend  -->
<div class="modal fade" id="editAdSpend" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Ad Spend</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <label for="">Ad Spend</label>
                        <input type="number" class="form-control">
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
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <label for="">Task Name</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Task Date</label>
                        <input type="date" class="form-control">
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

<!-- Add Note  -->
<div class="modal fade" id="addNote" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Note</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <textarea id="summernote" name="editordata"></textarea>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
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
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Stage</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="form-group">
                   <div class="row">
                       <div class="col-11">
                           <input type="text" class="form-control" value='New'>
                       </div>
                       <div class="col-1 align-self-center">
                           <a href="javascript:void(0)" style="font-size: 20px;" class="text text-danger"><i class='fa fa-trash'></i></a>
                       </div>
                   </div>
               </div>
               <div class="form-group">
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
               </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!--  -->


<script>
    const steps = document.querySelectorAll('.step');
    const next = document.querySelector('#next');
    const prev = document.querySelector('#prev');


    let slideInterval;
    const nextSlide = () => {
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
    };
</script>

<script src="./assets/summernote/summernote.js"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>
<script src="./assets/dropify/dropify.js"></script>
<script>
    $('.dropify').dropify();
</script>
<script>
    $(document).ready(function(){
        $("ol#list2").sortable({
            group:"list"
        });

    });
</script>
@include('employees.footer')