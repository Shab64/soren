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

    /* li.dragged{
       top: 10px !important;
    } */



</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-12">
                    <div class="stepSection">

                        <ol id='list1' class="arrow-steps clearfix">
                             <li  class="step current"> <span> New</span> </li>
                            <li  class="step"> <span> Contacted</span> </li>
                            <li  class="step"> <span> Identified DM</span> </li>
                            <li  class="step"> <span> Contacted</span> </li>
                            <li  class="step"> <span> Identified DM</span> </li>
                            <li  class="step"> <span> Contacted</span> </li>
                            <li  class="step"> <span> Identified DM</span> </li>
                            <li  class="step"> <span> Contacted</span> </li>
                            <li  class="step"> <span> Identified DM</span> </li>
                            <li  class="step"> <span> Contacted</span> </li>
                            <li  class="step"> <span> Identified DM</span> </li>





                        </ol>


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
