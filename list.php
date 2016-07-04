<?php
	$products = simplexml_load_file('products.xml');
	$qualityAvailable ="";
?>
<!DOCTYPE html>
<html>
<head>
	<title>A s s i g n m e n t 2</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css"  href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css"  href="bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="top-menu">
				<ul>
					<li><a href="add.html" class="active">Adding Item</a></li>
					<li><a href="list.php">Editing Item</a></li>
					<li><a href="#">Shopping Catalog</a></li>
				</ul>
			</div>
		</div>	
	</div>
	<div class="container">
		<div class="row">
			<div id="header-item">
				<h1>Editing Item</h1>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<table class="table table-bordered table-hover">
    			<thead>
      				<tr>
				        <th>Item No</th>
				        <th>Item Name</th>
				        <th>Description</th>
				        <th>Unit Price</th>
						<th>Quantity Available</th>
				        <th>Quantity Sold</th>
				        <th>Sale Price</th>
				        <th>Sale Starting Time</th>
				        <th>Sale Ending Time</th>
				        <th>Edit operations</th>
      				</tr>
    			</thead>
    			<tbody>
					<?php foreach($products->product as $product) { ?>
							<tr>
								<td><?php echo $product->id; ?></td>
								<td><?php echo $product->name; ?></td>
								<td><?php echo $product->description; ?></td>
								<td><?php echo $product->price; ?></td>
								<td>
									<span class="closeQuentity""><?php echo $product->qualityAvailable; ?></span>
									<input type="text" id="11" value="<?php echo $qualityAvailable ; ?>" class="clsQTY" style="display:none"/>
								</td>
								<td><?php echo $product->quantitySold; ?></td>
								<td>
									<span class="closePromotion"><?php echo $product->price; ?></span>
									<input type="text" id="<?php echo 'price'.$product->id; ?>" value="" class="openPromotion" style="display:none"/>
								</td>
								<td>
									<span class="closePromotion"><?php echo $product->startDate." ".$product->startTime; ?></span>
									<input type="text" id="<?php echo 'startDate'.$product->id; ?>" class="openPromotion" style="display:none"/></br>
									<input type="text" id="<?php echo 'startTime'.$product->id; ?>" class="openPromotion" style="display:none"/>
								</td>
								<td>
									<span class="closePromotion"><?php echo $product->endDate." ".$product->endTime; ?></span>
									<input type="text" id="<?php echo 'endDate'.$product->id; ?>" class="openPromotion" style="display:none"/></br>
									<input type="text" id="<?php echo 'endTime'.$product->id; ?>" class="openPromotion" style="display:none" />
								</td>
								<td>
									<button class="btPromotion" onclick="view('<?php echo $product->id; ?>');">promotion</button>
									<button class="btnConfirm" class="openPromotion" style="display:none" onclick="listProduct('<?php echo $product->id; ?>')">Confirm</button>
									<button class="btnConcel" class="openPromotion" style="display:none">Cancel</button>
									<button class="" onclick="add('<?php echo $product->id; ?>');">Add quantity</button>
								</td>
							</tr>
					<?php	} ?>
				
    			</tbody>
  			</table>
		</div>
	</div>
<script src="js/jquery.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
	$(document).on('click',".btPromotion" , function(){ 
		$(this).closest('tr').find('.openPromotion').show();
		$(this).closest('tr').find('.closePromotion').hide();
		$(this).closest('tr').find('.clsQTY').hide();
	});
	
	$(document).on('click',".btnAddQuantity" , function(){ 
		$(this).closest('tr').find('.openPromotion').hide();
		$(this).closest('tr').find('.closePromotion').show();
		$(this).closest('tr').find('.clsQTY').show();
		$(this).closest('tr').find('.closeQuentity').hide();
	});
	
});

	function add(id) {
		alert(id);
		// Create our XMLHttpRequest object
		var hr = new XMLHttpRequest();
		// Create some variables we need to send to our PHP file
		var url = "edit.php";
		var myId = id;
		var re = price.concat(myId);

		var sDate = "#startDate";
		var mySDate = sDate.concat(myId);

		var sTime = "#startTime";
		var mySTime = sTime.concat(myId);

		var eDate = "#endDate";
		var myEDate = eDate.concat(myId);

		var eTime = "#endTime";
		var myETime = eTime.concat(myId);

		var vars = "promotion=1"+"&price="+re+"&sdate="+mySDate+"&stime="+mySTime+"&edate="+myEDate+"&etime"+myETime+"&id"+id;
		hr.open("POST", url, true);
		hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		// Send the data to PHP now... and wait for response to update the status div
		hr.send(vars); // Actually execute the request
		// Access the onreadystatechange event for the XMLHttpRequest object
		hr.onreadystatechange = function() {
			if(hr.readyState == 4 && hr.status == 200) {
				var return_data = hr.responseText;
				alert(return_data);
			}
		}
	}


	function view(id){
		//alert(id);

		// Create our XMLHttpRequest object
		var hr = new XMLHttpRequest();
		// Create some variables we need to send to our PHP file
		var url = "edit.php";

		var vars ="list=1"+"&id="+id;
		hr.open("POST", url, true);
		hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		// Send the data to PHP now... and wait for response to update the status div
		hr.send(vars); // Actually execute the reques
		// Access the onreadystatechange event for the XMLHttpRequest object
		hr.onreadystatechange = function() {
			if(hr.readyState == 4 && hr.status == 200) {
				var return_data = hr.responseText;
					var json = JSON.parse(return_data);
					var price = "#price";
					var myId = id;
					var re = price.concat(myId);

					var sDate = "#startDate";
					var mySDate = sDate.concat(myId);

					var sTime = "#startTime";
					var mySTime = sTime.concat(myId);

					var eDate = "#endDate";
					var myEDate = eDate.concat(myId);

					var eTime = "#endTime";
					var myETime = eTime.concat(myId);

					//alert(json['startDate']);
					$(re).val(json['price']);
					$(mySDate).val(json['startDate']);
					$(mySTime).val(json['startTime']);
					$(myEDate).val(json['endDate']);
					$(myETime).val(json['endTime']);

			}
		}
	}


</script>
</body>
</html>