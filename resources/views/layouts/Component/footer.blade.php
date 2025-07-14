<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{ asset('js/ckeditor-classic.js') }}"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/d3/4.5.0/d3.min.js'></script>
<script src="{{asset('js/datatables.min.js')}}"></script>
<!--<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>-->
<script src="{{asset('js/script.js')}}"></script>
{{-- <script>
    document.onkeydown = function(e) {
if(event.keyCode == 123) {
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
return false;
}
}
</script> --}}
{{-- <script>
    window.ondragstart = function() { return false; }
</script> --}}
<script>
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>
