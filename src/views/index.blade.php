<div id="{{$id}}"></div>

<script type="text/javascript">
	google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable({{json_encode($data)}});

        var options = {{json_encode($options)}};

        var chart = new google.visualization.LineChart(document.getElementById('{{$id}}'));
        chart.draw(data, options);
      }

</script>