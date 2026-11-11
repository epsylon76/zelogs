<!-- DataTables CSS -->
<link href="dist/css/jquery.dataTables-1.13.11.min.css" rel="stylesheet">

<!-- DataTables JavaScript -->
<script src="dist/js/jquery.dataTables-1.13.11.min.js"></script>
<script>
$(document).ready(function() {

$('#datatables').DataTable({
  "scrollX": true,
  "language":{
    "url":"dist/js/datatables-fr-FR.json"
  }
});

$('#datatables2').DataTable({
  "scrollX": true,
  "language":{
    "url":"dist/js/datatables-fr-FR.json"
  }
});

});

</script>
