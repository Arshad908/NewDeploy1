<!DOCTYPE html>
<html>
<head>
	<title>Testing_Sample</title>
</head>
<body>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<input type="text" name="input_one" id="one">
<input type="text" name="input_two" id="two">
<input type="hidden" name="csrf" id="csrf" value="{{csrf_token()}}">
<input type="button" name="click_me" id="click_me" value="Click Me">

<h1>Add</h1>

<input type="text" name="input_1_1" id="input_1_1">
<input type="text" name="input_2_1" id="input_2_1">
<div id="add_row_input">
</div>
<input type="button" name="add_new" id="add_new" value="Add New">
<br><br>
<input type="button" name="add_record" id="save_all_row" value="Save">



<!-- Add Row -->
<script>
	var row_nums = 1;

	$('#add_new').on('click',function(){
		row_nums = row_nums + 1;
		
		var new_row = '<div>'+
					  '<input type="text" name="input_1_'+row_nums+'" id="input_1_'+row_nums+'">'+" "+
		              '<input type="text" name="input_2_'+row_nums+'" id="input_2_'+row_nums+'">'+" "+
		              '<input type="button" value=" - " onclick="remove_row(this,'+row_nums+')" ></div>'+" "+'<br/>' ;
		$('#add_row_input').append(new_row);

		return row_nums;	
	});

	//remove row
	function remove_row(row_this,row_nums){
			$(row_this).closest('div').remove();
	}

	$('#save_all_row').on('click',function(){
		var master_array = new Array();
		var x = [];	
		alert(row_nums);
		for (var i=1; i <= row_nums ; i++) {	
		   var one = $('#input_1_'+i+'').val();
		   var two = $('#input_2_'+i+'').val();

		   if(one !="" && two!=""){
		   		x = {
		   			'one':one,
		   			'two':two
		   		};

		   		master_array.push(x);

		   }

		}
		var three = $('#csrf').val();
		var xx = JSON.stringify(master_array);
		alert(xx); 
		$.ajax({
			url:"{{route('save_add')}}",
			method:'POST',
			data:"alot="+xx+"&_token="+three,
			success:function(data){
					alert("Saved Alot");
			} 
		});

	});


</script>
<!-- Add Row -->




<h1>File Upload Test</h1>
<input type="file" name="file_one" id="file_one">
<input type="button" name="save" value="Upload" id="upload">

<script>
	$('#upload').on('click',function(){
		var three = $('#csrf').val();
		var file_name = $('#file_one').prop('files')[0]['name'];
		alert(file_name);
		var form_data = new FormData();
		form_data.append('name',file_name);
		
		 $.ajax({
                url         : "{{route('upload_image')}}",
                method      : 'POST',
                cache       : false,
                contentType : false,
                processData : false,
                data        : 'form_data='+form_data+'&_token='+three,                        
                success     : function(output){
                    alert(output);              // display response from the PHP script, if any
                }
         });

	});

</script>



<script>
	$('#click_me').click(function(){
		var one = $('#one').val();
		var two = $('#two').val();
		var three = $('#csrf').val();

		$.ajax({
			url:"{{route('save_it')}}",
			method:"POST",
			data:"one="+one+"&two="+two+"&_token="+three,
			success:function(data){
				alert("Success");
			}
		});
	});
</script>

</body>
</html>
