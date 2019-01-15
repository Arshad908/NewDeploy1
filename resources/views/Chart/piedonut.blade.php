<!DOCTYPE html>
<html>
<head>
	<title>Pie And Donut</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<style type="text/css">
		#chart-container{
			width: 640px;
			height: auto;	
		}
	</style>
</head>
<body>
	<div id="chart-container">
		<canvas id="mycanves"></canvas>
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
						backgroundColor:'rgba(152,152,152,0.75)',
						borderColor:'rgba(152,152,152,0.75)',
						hoberBackgroundColor:'rgba(152,152,152,1)',
						hoberBorderColor:'rgba(152,152,152,1)',
						data:number
					}]
			};

			var ctx = $('#mycanves');

			var bargraph = new Chart(ctx,{
				type:'bar',
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