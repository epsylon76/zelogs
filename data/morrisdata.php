<script type="text/javascript">
$(function () {
	"use strict";

	//BAR CHART
	Morris.Bar({
		element: 'morris-area-chart',

		data: [
			{y: 'jan', a: <?php echo $recapsaut['1'] ?>, b: <?php echo $recapsaut2['1'] ?>},
			{y: 'fev', a: <?php echo $recapsaut['2'] ?>, b: <?php echo $recapsaut2['2'] ?>},
			{y: 'mars', a: <?php echo $recapsaut['3'] ?>, b: <?php echo $recapsaut2['3'] ?>},
			{y: 'avr', a: <?php echo $recapsaut['4'] ?>, b: <?php echo $recapsaut2['4'] ?>},
			{y: 'mai', a: <?php echo $recapsaut['5'] ?>, b: <?php echo $recapsaut2['5'] ?>},
			{y: 'juin', a: <?php echo $recapsaut['6'] ?>, b: <?php echo $recapsaut2['6'] ?>},
			{y: 'juil', a: <?php echo $recapsaut['7'] ?>, b: <?php echo $recapsaut2['7'] ?>},
			{y: 'août', a: <?php echo $recapsaut['8'] ?>, b: <?php echo $recapsaut2['8'] ?>},
			{y: 'sept', a: <?php echo $recapsaut['9'] ?>, b: <?php echo $recapsaut2['9'] ?>},
			{y: 'oct', a: <?php echo $recapsaut['10'] ?>, b: <?php echo $recapsaut2['10'] ?>},
			{y: 'nov', a: <?php echo $recapsaut['11'] ?>, b: <?php echo $recapsaut2['11'] ?>},
			{y: 'dec', a: <?php echo $recapsaut['12'] ?>, b: <?php echo $recapsaut2['12'] ?>},
		],
		barColors: ['#00a65a', '#f56954'],
		xkey: 'y',
		ymax: 120,
		ykeys: ['a', 'b'],
		labels: ["<?php echo $annee_en_cours; ?>","<?php echo $annee_avant; ?>"],
		gridTextFamily: 'Open Sans',
		hideHover: 'false',
	});
});
</script>
