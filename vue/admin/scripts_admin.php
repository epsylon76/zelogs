<!-- DataTables CSS -->
<link href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css" rel="stylesheet">

<!-- DataTables JavaScript -->
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.16/sorting/datetime-moment.js"></script>
<script>
$(document).ready(function() {
  $.fn.dataTable.moment( 'DD/MM/YYYY' );

$('#datatables').DataTable({
  "scrollX": true,
  "language":{
    "url":"https://cdn.datatables.net/plug-ins/1.10.16/i18n/French.json"
  }
});

$('#datatables2').DataTable({
  "scrollX": true,
  "language":{
    "url":"https://cdn.datatables.net/plug-ins/1.10.16/i18n/French.json"
  }
});

});

</script>
