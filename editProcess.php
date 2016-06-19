<?php
	$products = simplexml_load_file('products.xml');
	
	// process update promotion
	if (isset($_POST['promotion'])) {
		foreach($products->product as $product) {
			if($product['id'] == $_POST['id']) {
				$product->price =  $_POST['cost'];
				$product->startDate =  $_POST['startDate'];
				$product->startTime =  $_POST['startTime'];
				$product->endDate =  $_POST['endDate'];
				$product->endTime =  $_POST['endTime'];
				break;
			}
		}
		file_put_contents('products.xml',$products->asXML());
		echo "success";
	}
	
	//process update quality
	if (isset($_POST['addQuality'])) {
		foreach($products->product as $product) {
			if($product['id'] == $_POST['id']) {
				$product->qualityAvailable =  $_POST['qualityAvailable'];
				break;
			}
		}
		file_put_contents('products.xml',$products->asXML());
		echo "success";
	}
	
	//when click promotion button or add quality than list data to input
	if (isset($_POST['list'])) {
		foreach($products->product as $product) {
			if($product['id'] == $_POST['id']) {
				$price = $product->price;
				$qualityAvailable = $product->qualityAvailable;
				$startDate = $product->startDate;
				$startTime = $product->startTime;
				$endDate = $product->endDate;
				$endTime = $product->endTime;
				echo $qualityAvailable ;
				break;
			}
		}
	}
	
?>