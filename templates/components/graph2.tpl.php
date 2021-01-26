<?php

use \Aquaponics\Factory\GrowbedFactory;

$factory = new GrowbedFactory;
$factory->getData();
$factory->prepareData();
?>

<script type="text/javascript">
  google.charts.load('current', {
    'packages': ['corechart']
  });
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = new google.visualization.DataTable();
      data.addColumn('string', 'Time Stamp');
      data.addColumn('number', 'Baro Press');
      data.addColumn('number', 'Baro Temp');

      data.addRows(<?php echo $factory->formatData() ?>);

    var options = {
      title: 'Growbed',
      curveType: 'function',
      legend: {
        position: 'bottom'
      }
    };

    var chart = new google.visualization.LineChart(document.getElementById('chart_div2'));

    chart.draw(data, options);
  }
</script>
