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
      data.addColumn('number', 'Baro Temp');
      data.addColumn('number', 'Baro Humi');
      data.addColumn('number', 'Gas Oxid');
      data.addColumn('number', 'Gas NH3');

      data.addRows(<?php echo $factory->formatData() ?>);

    var options = {
      title: 'Grow Bed Monitor (last 6 values)',
      curveType: 'function',
      legend: {
        position: 'right'
      }
    };

    var chart = new google.visualization.LineChart(document.getElementById('chart_div2'));

    chart.draw(data, options);
  }
</script>
