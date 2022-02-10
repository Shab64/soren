<?php require_once 'header.blade.php' ?>
<script src="assets/kanban/jquery-sortable.js"></script>
<style>


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



</style>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
        <!-- Main content -->
        <section class="content">


        <div class="row">
            <div class="col-12">

            <div class="d-flex justify-content-end margin-bottom-10">
                        <div class="ml-auto">
                            <a href="all-leads.blade.php " class="btn btn-primary not-active">Table View</a>
                            <a href="all-leads-kanban.blade.php" class="btn btn-primary ">Kanban View</a>
                        </div>
                    </div>

                <div class="card kanbancard ">
            <div class="gridKanban">
                <div class="kan-col">
                    <h5 >New</h5>
                    <ol id="list1" style="">

                        <li>
                        <div class="inner-card ">

                                <div class='margin-bottom-5'>
                                    <div class="leadLabel">Company Name</div>
                                    <div class="leadDetail">AB Private Limited</div>
                                </div>

                                <div class='margin-bottom-5'>
                                    <div class="leadLabel">Industry</div>
                                    <div class="leadDetail">Moving Industry</div>
                                </div>

                            </div>
                        </li>






                    </ol>
                </div>
                <div class="kan-col">
                    <h5 >Contacted</h5>
                    <ol id="list1" style="">


                    <li>
                        <div class="inner-card ">

                                <div class='margin-bottom-5'>
                                    <div class="leadLabel">Company Name</div>
                                    <div class="leadDetail">XY Private Limited</div>
                                </div>

                                <div class='margin-bottom-5'>
                                    <div class="leadLabel">Industry</div>
                                    <div class="leadDetail">Real Estate Industry</div>
                                </div>

                            </div>
                        </li>

                        <li>
                        <div class="inner-card ">

                                <div class='margin-bottom-5'>
                                    <div class="leadLabel">Company Name</div>
                                    <div class="leadDetail">RZ Private Limited</div>
                                </div>

                                <div class='margin-bottom-5'>
                                    <div class="leadLabel">Industry</div>
                                    <div class="leadDetail">Education Industry</div>
                                </div>

                            </div>
                        </li>




                    </ol>
                </div>
                <div class="kan-col">
                    <h5 >Identified DM</h5>
                    <ol id="list1" style="">

                    <li>
                        <div class="inner-card ">

                                <div class='margin-bottom-5'>
                                    <div class="leadLabel">Company Name</div>
                                    <div class="leadDetail">MZ Private Limited</div>
                                </div>

                                <div class='margin-bottom-5'>
                                    <div class="leadLabel">Industry</div>
                                    <div class="leadDetail">IT Industry</div>
                                </div>

                            </div>
                        </li>



                    </ol>
                </div>
                <div class="kan-col">
                    <h5 >Contacted DM</h5>
                    <ol id="list1" style="">

                        <li>

                        </li>



                    </ol>
                </div>
                <div class="kan-col">
                    <h5 >Waiting on Parts</h5>
                    <ol id="list1" style="">

                        <li>

                        </li>



                    </ol>
                </div>
                <div class="kan-col">
                    <h5 >Pitched Review</h5>
                    <ol id="list1" style="">

                        <li>

                        </li>



                    </ol>
                </div>
                <div class="kan-col">
                    <h5 >Linked</h5>
                    <ol id="list1" style="">

                        <li>

                        </li>



                    </ol>
                </div>
                <div class="kan-col">
                    <h5 >Audit</h5>
                    <ol id="list1" style="">

                        <li>

                        </li>



                    </ol>
                </div>

                <div class="kan-col">
                    <h5 >Presentation</h5>
                    <ol id="list1" style="">

                        <li>

                        </li>



                    </ol>
                </div>

                <div class="kan-col">
                    <h5 >Follow Up</h5>
                    <ol id="list1" style="">

                        <li>

                        </li>



                    </ol>
                </div>

                <div class="kan-col">
                    <h5 >Contract Sent</h5>
                    <ol id="list1" style="">

                        <li>

                        </li>



                    </ol>
                </div>

                <div class="kan-col">
                    <h5 >Converted</h5>
                    <ol id="list1" style="">

                        <li>

                        </li>



                    </ol>
                </div>

            </div>
        </div>
            </div>
        </div>



        </section>
        <!-- /.content -->
    </div>
</div>


<script>
    $(document).ready(function(){
        $("ol#list1").sortable({
            group:"list"
        });

    });
</script>





<?php require_once 'footer.blade.php' ?>

