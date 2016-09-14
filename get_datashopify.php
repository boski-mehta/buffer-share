<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
require __DIR__.'/conf.php'; 
require __DIR__.'/connection.php'; 
require __DIR__.'/vendor/autoload.php';
use phpish\shopify;
$actionTemp = explode('::', $_REQUEST['action']);
$action = $actionTemp[0];
$store = $actionTemp[1];
$access_token =$actionTemp[2];
 echo "access_token=".$access_token;

$storeData = json_decode(file_get_contents("https://{$store}/admin/shop.json?access_token={$access_token}"));
if(!empty($action)){
	$data = '';
	$webhook = fopen('php://input' , 'rb'); 
	while(!feof($webhook)){
		$data .= fread($webhook, 4096); 
	}
	fclose($webhook);
	$data1 = json_decode($data, false);
	$obj = $data1['Result'];
     //$email=$data->email;
    // $order_id =$data1->id;
$order_id = $data1['id'];
    $first_name = $data1['email'];
    $last_name = $data1['name'];
    $address = $data1['address']['streetaddress'];
    $order_amount = $data1['total_price'];
	pg_query($dbconn4,"INSERT INTO customers (order_id,first_name,last_name,address,order_amount) VALUES ('{$order_id}','{$first_name}','{$obj}','{$address}',5)");
	
}

  
exit('Query executed!');
?>
