<script>
var ctx = document.getElementById('graph_annees').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Novembre", "Décembre"],
        datasets:
        [
          {
            label: "<?php echo $annee_avant ?>",
            backgroundColor: '#00a65a',
            borderColor: '#00a65a',
            data: [
              <?php echo $recapsaut2['1'] ?>,
              <?php echo $recapsaut2['2'] ?>,
              <?php echo $recapsaut2['3'] ?>,
              <?php echo $recapsaut2['4'] ?>,
              <?php echo $recapsaut2['5'] ?>,
              <?php echo $recapsaut2['6'] ?>,
              <?php echo $recapsaut2['7'] ?>,
              <?php echo $recapsaut2['8'] ?>,
              <?php echo $recapsaut2['9'] ?>,
              <?php echo $recapsaut2['10'] ?>,
              <?php echo $recapsaut2['11'] ?>,
              <?php echo $recapsaut2['12'] ?>
            ]
        },
        {
            label: "<?php echo $annee_en_cours ?>",
            backgroundColor: '#f56954',
            borderColor: '#f56954',
            data:
            [
              <?php echo $recapsaut['1'] ?>,
              <?php echo $recapsaut['2'] ?>,
              <?php echo $recapsaut['3'] ?>,
              <?php echo $recapsaut['4'] ?>,
              <?php echo $recapsaut['5'] ?>,
              <?php echo $recapsaut['6'] ?>,
              <?php echo $recapsaut['7'] ?>,
              <?php echo $recapsaut['8'] ?>,
              <?php echo $recapsaut['9'] ?>,
              <?php echo $recapsaut['10'] ?>,
              <?php echo $recapsaut['11'] ?>,
              <?php echo $recapsaut['12'] ?>

            ],
        }
      ]
    },

    // Configuration options go here
    options: {}
});
</script>
