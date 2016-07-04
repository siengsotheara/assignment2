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
				<h1>Adding Item</h1>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"></div>
                <div class="panel-body">
                	<form action="" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
					<div class="form-horizontal">
						<div class="form-group">
							<label for="text" class="col-md-4 control-label">Item Name</label>
							<input type="text" name="item_name" id="item_name" value="">
						</div> 
						<div class="form-group">
							<label for="text" class="col-md-4 control-label">Description</label>
							<textarea rows="4" id="description"></textarea>
						</div>	
						<div class="form-group">
							<label for="text" class="col-md-4 control-label">Unit Price</label>
							<input type="text" name="unit_price" id="unit_price" value="">
							
						</div>
						<div class="form-group">
							<label for="text" class="col-md-4 control-label">Quantity Available</label>
							<input type="text" name="qty_av" id="qty_av" value="">
						</div>	
						<div class="form-group">
							<label for="text" class="col-md-4 control-label">Quantity Sold</label>
							<input type="text" name="qty_sold" id="qty_sold" value="">
						</div>	
						<div class="form-group">
							<label for="text" class="col-md-4 control-label">Price</label>
							<input type="text" name="cost" id="cost" value="">
						</div>	
						
					</div>
					
					<div class="form-group">
						<div class="col-md-6 col-md-offset-4">
							<input type="button" value="Add" onclick="insert();"/>
							<input type="button" value="Reset" onclick="myClear();"/>
						</div>
					</div>
				
					<div class="form-group">
						<div class="col-md-6 col-md-offset-4">
							<div class="" id="status"></div>
						</div>
					</div>
					</form>
                </div>
            </div>
        </div> 
		</div>
	</div>
<script src="js/jquery.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>


<script>
	/**
	**insert data to xml file
	**/
	function insert(){
		// Create our XMLHttpRequest object
		var hr = new XMLHttpRequest();
		// Create some variables we need to send to our PHP file
		var url = "insert.php";
		var n = document.getElementById("item_name").value;
		var d = document.getElementById("description").value;
		var p = document.getElementById("unit_price").value;
		var qa = document.getElementById("qty_av").value;
		var qs = document.getElementById("qty_sold").value;
		var c = document.getElementById("cost").value;
		
		var vars = "name="+n+"&description="+d+"&price="+p+"&quantity_a="+qa+"&quantity_s="+qs+"&cost="+c;
		hr.open("POST", url, true);
		hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		// Send the data to PHP now... and wait for response to update the status div
		hr.send(vars); // Actually execute the request
		document.getElementById("status").innerHTML = "processing...";
		// Access the onreadystatechange event for the XMLHttpRequest object
		hr.onreadystatechange = function() {
			if(hr.readyState == 4 && hr.status == 200) {
				var return_data = hr.responseText;
				document.getElementById("status").innerHTML = return_data;
				if(return_data == "success"){
					myClear();
				}
			}
		}
	}

	/**
	**clear form
	**/
	function myClear() {
		$("#item_name").val("");
		$("#description").val("");
		$("#unit_price").val("");
		$("#qty_av").val("");
		$("#qty_sold").val("");
		$("#cost").val("");
	}
</script>
</body>
</html>