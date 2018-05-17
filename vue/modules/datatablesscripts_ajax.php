<!-- DataTables CSS -->
<link href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css" rel="stylesheet">

<!-- DataTables JavaScript -->
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.16/sorting/datetime-moment.js"></script>

<!-- scripts des datatables -->
<script>
$(document).ready(function() {
  $.fn.dataTable.moment( 'DD/MM/YYYY' );

  $('#datatables-carnet').DataTable({
    "ajax": {
      "url" :"./mdl/load_carnet_ajax.php",
      "type": "POST",
      "data": <?php echo $ajax_req ?>
    },
    "columnDefs": [
   { "orderable": false, "targets": 6 }
 ],

    "lengthChange": false,
    "displayStart": <?php if(isset($nopage)){echo $nopage;} ?>,
    "scrollX": true,
    "scrollY":false,
    "paging": true,
    "info":false,
    "pagingType": "simple_numbers",
    "language":{
      "url":"dist/datatables_french.json"
    }
  });




});

</script>
