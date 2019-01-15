<!DOCTYPE html>
<html>
<head>
	<title>Pie And Donut</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
	<div class="col-sm-4 col-sm-offset-4" style="width:25%;padding-top: 3%">
		<div class="panel panel-default">
			<div class="panel-body">
			<div id="chart-container">
				<canvas id="mycanves"></canvas>
			</div>
			</div>
		</div>
	</div>
	<div class="col-sm-4 col-sm-offset-4" style="width:25%;padding-top: 3%">
		<div class="panel panel-default">
			<div class="panel-body">
			<div id="chart-container">
				<canvas id="mycanves-pie"></canvas>
			</div>
			</div>
		</div>
	</div>

<script>
	$.ajax({
		url:"{{route('getbardetailse')}}",
		method:"Get",
		success:function(data){
			var name = [];
			var number = [];

			for(var i in data){
				name.push("NUM:"+data[i].one);
				number.push(data[i].number);
			}	

			var chartdata = {
				labels : name,
				datasets: 
					[{
						label:'NUMBERS',
						backgroundColor:['#5DA5DA','#60BD68','#DECF3F','#60BD68','#B2912F'],
						borderColor:['#5DA5DA','#60BD68','#DECF3F','#60BD68','#B2912F'],
						data:number
					}]
			};

			var ctx = $('#mycanves');

			var bargraph = new Chart(ctx,{
				type:'doughnut',
				data:chartdata
			});

			var ctxpie = $('#mycanves-pie');

			var bargraph = new Chart(ctxpie,{
				type:'pie',
				data:chartdata
			});
		},
		error:function(data){
			console.log('data error');	
		}
	});

</script>

</body>
</html>