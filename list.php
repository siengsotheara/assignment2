<?php
	$products = simplexml_load_file('products.xml');
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
					<li><a href="index.php" class="active">Adding Item</a></li>
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
									<span id="<?php echo 'qty'.$product->id; ?>"><?php echo $product->qualityAvailable; ?></span>
									<input type="text" id="<?php echo 'inputQty'.$product->id; ?>" hidden/>
								</td>
								<td><?php echo $product->quantitySold; ?></td>
								<td>
									<span id="<?php echo 'price'.$product->id; ?>"><?php echo $product->price; ?></span>
									<input type="text" id="<?php echo 'inputPrice'.$product->id; ?>" hidden/>
								</td>
								<td>
									<span id="<?php echo 'start'.$product->id; ?>"><?php echo $product->startDate." ".$product->startTime; ?></span>
									<input type="text" id="<?php echo 'startDate'.$product->id; ?>" hidden/></br>
									<input type="text" id="<?php echo 'startTime'.$product->id; ?>" hidden/>
								</td>
								<td>
									<span id="<?php echo 'stop'.$product->id; ?>"><?php echo $product->endDate." ".$product->endTime; ?></span>
									<input type="text" id="<?php echo 'endDate'.$product->id; ?>" hidden/></br>
									<input type="text" id="<?php echo 'endTime'.$product->id; ?>" hidden />
								</td>
								<td>
									<button onclick="promotion('<?php echo $product->id; ?>')">promotion</button>
									<button>Add quantity</button>
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
	function promotion(id){
		var idEndDate = "#endDate"+id;
		//$('"'+idEndDate+'"').show();
		$("#stop2").hide();
	}
</script>
</body>
</html>