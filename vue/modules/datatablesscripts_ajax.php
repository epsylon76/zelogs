<!-- DataTables CSS -->
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">

<!-- DataTables JavaScript -->
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>



<!-- scripts des datatables -->
<script>
$(document).ready(function() {


  $('#datatables-carnet').DataTable({
    "ajax": {
      "url" :"./mdl/load_carnet_ajax.php",
      "type": "POST",
      "data": <?php echo $ajax_req ?>
    },
    "order": [[ 0, "asc" ]],
    "columnDefs": [
      { "orderable": false, "targets": 6 }
    ],

    "lengthChange": false,
    "displayStart": <?php if(isset($nopage)){echo $nopage;} ?>,
    "paging": true,
    "info":false,
    "pagingType": "simple_numbers",


    language: {
       processing:     "Traitement en cours...",
       search:         "Rechercher&nbsp;:",
       lengthMenu:    "Afficher _MENU_ &eacute;l&eacute;ments",
       info:           "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
       infoEmpty:      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
       infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
       infoPostFix:    "",
       loadingRecords: "Chargement en cours...",
       zeroRecords:    "Aucun &eacute;l&eacute;ment &agrave; afficher",
       emptyTable:     "Aucune donnée disponible dans le tableau",
       paginate: {
           first:      "Premier",
           previous:   "Pr&eacute;c&eacute;dent",
           next:       "Suivant",
           last:       "Dernier"
       },
       aria: {
           sortAscending:  ": activer pour trier la colonne par ordre croissant",
           sortDescending: ": activer pour trier la colonne par ordre décroissant"
       }
   }

  });




});

</script>
