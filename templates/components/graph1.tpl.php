<?php

use \Aquaponics\Factory\MonitorFactory;

$factory = new MonitorFactory;
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
      data.addColumn('number', 'Tank Temperature');

      data.addRows(<?php echo $factory->formatData() ?>);

    var options = {
      title: 'Fish Tank Monitor (last 6 values)',
      legend: {
        position: 'right'
      }
    };

    var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

    chart.draw(data, options);
  }
</script>
