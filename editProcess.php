<?php
	$products = simplexml_load_file('products.xml');
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
	
	foreach($products->product as $product) {
			if($product['id'] == $_POST['id']) {
				$id = $product->price;
				$qualityAvailable = $product->qualityAvailable;
				$startDate = $product->startDate;
				$startTime = $product->startTime;
				$endDate = $product->endDate;
				$endTime = $product->endTime;
				break;
			}
		}
	
?>