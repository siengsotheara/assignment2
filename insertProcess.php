<?php
	if (isset($_POST['name']) && isset($_POST['description']) ) {
		$products = simplexml_load_file('products.xml');
		$product = $products->addChild('product');
		$product->addChild('id',count($products)+1);
		$product->addChild('name',$_POST['name']);
		$product->addChild('description',$_POST['description']);
		$product->addChild('unitPrice',$_POST['price']);
		$product->addChild('qualityAvailable',$_POST['quantity_a']);
		$product->addChild('quantitySold',$_POST['quantity_s']);
		$product->addChild('price',$_POST['cost']);
		$product->addChild('startDate','null');
		$product->addChild('startTime','null');
		$product->addChild('endDate','null');
		$product->addChild('endTime','null');
		file_put_contents('products.xml',$products->asXML());
		echo "success";
	}

	
?>