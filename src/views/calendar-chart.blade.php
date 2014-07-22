<div id="{{$id}}" style="{{!in_array($width, ['auto',0])?'width:'.$width.'px;':''}}{{!in_array($height, ['auto',0])?'height:'.$height.'px;':''}}"></div>

<script type="text/javascript">
	google.load("visualization", "1.1", {packages:["calendar"]});
  google.setOnLoadCallback(area_chart_{{$id}});
  function area_chart_{{$id}}() {

    var dataTable = new google.visualization.DataTable();
    @foreach($chart->getCalendarColumns() as $column)
       dataTable.addColumn({ type: '{{$column['type']}}', id: '{{$column['name']}}' });
    @endforeach

    dataTable.addRows([
	    @foreach($data as $row)
	       [{{implode(",", $row)}}],
	    @endforeach
    ]);


    var options = {{json_encode($options)}};

    var chart = new google.visualization.Calendar(document.getElementById('{{$id}}'));
    chart.draw(dataTable, options);
  }

</script>