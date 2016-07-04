<?php
	$products = simplexml_load_file('products.xml');

	///die('999999999999999');

	// process update promotion
	if (isset($_POST['promotion'])) {
		foreach($products->product as $product) {
			if($product->id == $_POST['id']) {
				$product->price =  $_POST['price'];
				$product->startDate =  $_POST['sdate'];
				$product->startTime =  $_POST['stime'];
				$product->endDate =  $_POST['edate'];
				$product->endTime =  $_POST['etime'];
				file_put_contents('products.xml',$products->asXML());
				echo "success";
				break;
			}
		}


	}
	
	//process update quality
	if (isset($_POST['addQuality'])) {
		die('quality');
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
		//echo "success";
		//die('list');
		foreach($products->product as $product) {

			if($product->id == $_POST['id']) {
				$price = $product->price;
				$qualityAvailable = $product->qualityAvailable;

				$startDate = strtotime($product->startDate);
				$startTime = strtotime($product->startTime);
				$endDate = strtotime($product->endDate);
				$endTime = strtotime($product->endTime);

				$arr = array('price'=>json_decode($price), 'qualityAvailable'=>json_decode($qualityAvailable),
					'startDate'=>json_decode($startDate), 'startTime'=>json_decode($startTime),
					'endDate'=>json_decode($endDate), 'endTime'=>json_decode($endTime));
				echo json_encode($arr);
				break;
			}
		}
	}
	
?>