<footer class="main-footer">
	<div class="pull-right d-none d-sm-inline-block">
		<ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">

		</ul>
	</div>
	&copy; <script>
		document.write(new Date().getFullYear())
	</script> <a href="#"></a>. All Rights Reserved.
</footer>





</div>
<!-- ./wrapper -->


<!-- Sidebar -->



</div>

<!-- Page Content overlay -->


<!-- Vendor JS -->


<script src="{{url('assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}}"></script>
<script src="{{url('assets/vendor_components/progressbar.js-master/dist/progressbar.js')}}"></script>
<script src="{{url('assets/lib/4/core.js')}}"></script>
<script src="{{url('assets/lib/4/charts.js')}}"></script>
<script src="{{url('assets/lib/4/themes/animated.js')}}"></script>
<script src="{{url('assets/lib/4/maps.js')}}"></script>
<script src="{{url('assets/lib/4/geodata/worldLow.js')}}"></script>


<script src="{{url('assets/src/js/jquery.smartmenus.js')}}"></script>
<script src="{{url('assets/src/js/menus.js')}}"></script>
<script src="{{url('assets/src/js/template.js')}}"></script>

<script src="{{url('assets/src/js/pages/dashboard.js')}}"></script>

<script>

    function delete_(url){
        console.log(url);
        let modal = `
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
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Dismiss</button>
                <a href="${url}" type="button" class="btn btn-primary">Yes</a>
            </div>
        </div>
    </div>
</div>
        `;
        $(modal).modal('show');
    }

</script>
</body>




</html>
