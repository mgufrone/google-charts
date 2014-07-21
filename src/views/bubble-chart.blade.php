<div id="{{$id}}" style="{{!in_array($width, ['auto',0])?'width:'.$width.'px;':''}}{{!in_array($height, ['auto',0])?'height:'.$height.'px;':''}}"></div>

<script type="text/javascript">
	google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(area_chart_{{$id}});
  function area_chart_{{$id}}() {
    var data = google.visualization.arrayToDataTable({{json_encode($data)}});

    var options = {{json_encode($options)}};

    var chart = new google.visualization.BubbleChart(document.getElementById('{{$id}}'));
    chart.draw(data, options);
  }

</script>