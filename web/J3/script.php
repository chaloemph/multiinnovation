<script src="temp_index/plugins/jquery/jquery.min.js"></script>
<script src="temp_index/plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
	$.widget.bridge('uibutton', $.ui.button)
</script>
<script src="temp_index/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="temp_index/plugins/chart.js/Chart.min.js"></script>
<script src="temp_index/plugins/sparklines/sparkline.js"></script>
<script src="temp_index/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="temp_index/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="temp_index/plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="temp_index/plugins/moment/moment.min.js"></script>
<script src="temp_index/plugins/daterangepicker/daterangepicker.js"></script>
<script src="temp_index/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="temp_index/plugins/summernote/summernote-bs4.min.js"></script>
<script src="temp_index/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="temp_index/dist/js/adminlte.js"></script>
<script src="temp_index/dist/js/pages/dashboard.js"></script>
<script src="temp_index/dist/js/demo.js"></script>
<script src="temp_index/plugins/jquery/jquery.min.js"></script>
<script src="temp_index/plugins/datatables/jquery.dataTables.js"></script>
<script src="temp_index/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<script>
	function openPage(pageName,elmnt,color) {
		var i, tabcontent, tablinks;
		tabcontent = document.getElementsByClassName("tabcontent");
		for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
		}
		tablinks = document.getElementsByClassName("tablink");
		for (i = 0; i < tablinks.length; i++) {
			tablinks[i].style.backgroundColor = "";
		}
		document.getElementById(pageName).style.display = "block";
		elmnt.style.backgroundColor = color;
	}
    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>

<script>
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });
</script>

<script>
    ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .catch( error => {
        console.error( error );
    } );
</script>
<script>
    ClassicEditor
    .create( document.querySelector( '#editor1' ) )
    .catch( error => {
        console.error( error );
    } );
</script>
<script>
    ClassicEditor
    .create( document.querySelector( '#editor2' ) )
    .catch( error => {
        console.error( error );
    } );
</script>
<script>
    ClassicEditor
    .create( document.querySelector( '#editor3' ) )
    .catch( error => {
        console.error( error );
    } );
</script>
<script>
    ClassicEditor
    .create( document.querySelector( '#editor4' ) )
    .catch( error => {
        console.error( error );
    } );
</script>
<script>
    ClassicEditor
    .create( document.querySelector( '#editor5' ) )
    .catch( error => {
        console.error( error );
    } );
</script>
<script>
    ClassicEditor
    .create( document.querySelector( '#editor6' ) )
    .catch( error => {
        console.error( error );
    } );
</script>
