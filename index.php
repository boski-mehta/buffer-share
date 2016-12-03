<?php
session_start();
// Required File Start.........
require __DIR__.'/conf.php'; //Configuration
require __DIR__.'/connection.php'; //DB connectivity
require __DIR__.'/vendor/autoload.php';
use phpish\shopify;
// Required File END...........
error_reporting(E_ALL);
ini_set('display_errors', 1);
// require __DIR__.'/get_products.php'; //GET PRODUCTS
//echo $_REQUEST['code'];
if((isset($_REQUEST['shop'])) && (isset($_REQUEST['code'])) && $_REQUEST['shop']!='' && $_REQUEST['code']!='' )
{
	$_SESSION['shop']=$_REQUEST['shop'];
	$_SESSION['code']=$_REQUEST['code'];
}
 $shop_url=$_REQUEST['shop'];
 $select_store = pg_query($dbconn4,"SELECT * FROM store_info WHERE store_url = '$shop_url'"); 
//$select_store1 = pg_query($dbconn4, $select_store);
//check if the store exists

if($select_store->pg_num_rows > 0){
$data = pg_fetch_assoc($select_store);
echo $access_token= $data['access_token'];
}
else {
$access_token = shopify\access_token($_REQUEST['shop'], SHOPIFY_APP_API_KEY, SHOPIFY_APP_SHARED_SECRET, $_REQUEST['code']);
 $insert_data = "insert into store_info(store_url,access_token) values('$shop_url','$access_token')";
$ret = pg_query($dbconn4, $insert_data); 
}
require __DIR__.'/smart_collection.php'; //create smart collection

?>

<head>
	<title>CaptionCrunch</title>
	<link rel="apple-touch-icon" sizes="57x57" href="./Favicon.ico/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="./Favicon.ico/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="./Favicon.ico/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="./Favicon.ico/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="./Favicon.ico/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="./Favicon.ico/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="./Favicon.ico/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="./Favicon.ico/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="./Favicon.ico/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="./Favicon.ico/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="./Favicon.ico/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="./Favicon.ico/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="./Favicon.ico/favicon-16x16.png">
	<link rel="manifest" href="./Favicon.ico/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="./Favicon.ico/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

	<link rel="stylesheet" href="devices.min.css" type="text/css">

	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/js/bootstrap.min.js" integrity="sha384-VjEeINv9OSwtWFLAtmc4JCtEJXXBub00gtSnszmspDLCtC0I4z4nqz7rEFbIZLLU" crossorigin="anonymous"></script> -->
        <script src="jquery.twbsPagination.js" type="text/javascript"></script>
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css" integrity="sha384-2hfp1SzUoho7/TsGGGDaFdsuuDL0LX2hnUp6VkX3CUQ2K4K+xjboZdsXyp4oUHZj" crossorigin="anonymous"> -->
	<link rel="stylesheet" href="style.css">

</head>

<body>
	<div class="back">
		<!-- Sidebar Nav -->
		<aside class="sidebar_nav">
			<a  class="sidebar-link" href="https://buffer.com" target="_blank">
				<div class="sidebar-nav-container">
					<span >
						<i style="font-size: 20px;" class="fa fa-tachometer" aria-hidden="true"></i><br>
						Dashboard
					</span>
				</div>
			</a>

			<a class="sidebar-link" href="javascript:void(0)" onclick="getnewproducts()" id="share-link">
				<div class="sidebar-nav-container">
					<span >
						<i style="font-size: 20px;" class="fa fa-bullhorn" aria-hidden="true"></i><br>
						Share
					</span>
				</div>
			</a>

			<a class="sidebar-link-active back-link" href="javascript:void(0)" style="display: none;">
				<div class="sidebar-nav-container">
					<span  style="color: white;">
						<i style="font-size: 20px;" class="fa fa-times" aria-hidden="true"></i><br>
						Back
					</span>
				</div>
			</a>

			<a  class="sidebar-link sidebar-hammer" href="javascript:void(0)" onclick="getcaptions()" id="captions-link">
				<div class="sidebar-nav-container">
					<span>
						<div class="sidebar-hammer-img"></div>
						Captions
					</span>
				</div>
			</a>

			<a class="sidebar-link" href="javascript:void(0)" onclick="getsettings()" id="settings-link">
				<div class="sidebar-nav-container">
					<span >
						<i style="font-size: 20px;" class="fa fa-cogs" aria-hidden="true"></i><br>
						Settings
					</span>
				</div>
			</a>


			<!-- <a class="sidebar-link" href="/?page=autopilot">
			<div class="sidebar-nav-container">
			<span >
			<i style="font-size: 20px;" class="fa fa-paper-plane-o" aria-hidden="true"></i><br>
			Autopilot
		</span>
	</div>
</a> -->
</aside>

</div>

</div>
<!-- /.Sidebar Nav -->

<!-- Navigation -->
<header class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="top: 0px;">

	<!-- Brand and toggle get grouped for better mobile display -->

	<a class="navbar-brand" href="/">
		<object type="image/svg+xml" class="header-cc-hammer-img" data="./images/hammer.svg"></object>
		<span class="header-help">Caption</span>
		<span class="header-central">Crunch</span>
	</a>

	<!-- Collect the nav links, forms, and other content for toggling -->
	<nav class="main-nav-container">
		<a id="help-button" class="help-header-link" style="text-decoration: none; float: right; cursor:pointer;">
			<div class="sidebar-nav-container-header">
				<span id="help-title">
					<i style="font-size: 20px;" class="fa fa-info" aria-hidden="true"></i><br>
					Help
				</span>
			</div>
		</a>
	</nav>
	<!-- /.navbar-collapse -->

	<!-- /.container -->
</header>

<!-- /.Page Container -->

<div id="right-slide-left">
	<?php include 'help.php';?>
</div>

<div id="top-slide-down">
	<?php include 'preview.php';?>
	<?php include 'product-preview.php';?>
</div>

<div class="main_container_clearfix">
	<div id="main-padded-container" class="">
		<div class="main_container">
			<div class="content-container"></div>
		</div>
	</div>
</div>
<!-- /.Page Container -->
</div>

<script>
// Load Pages

// Get Collections / Share Page
function getproducts(){
	$('.menu-container').each(function(){
		$(this).removeClass('menu-container-active');
	});
	var access_token='<?php echo $access_token ?>';
	var shop='<?php echo $_REQUEST['shop'] ?>';
    var data="<div class='loading-clearfix'><div class='loading-container'><div><img class='loading-img' src='images/loading13.gif' /><span class='cc-text-small loader-text'>Loading...</span></div></div></div>";
     $('.content-overflow').html(data);
	$.ajax({
		url: '/collections.php?access_token='+access_token+'&shop='+shop,
		success: function(data){
			//console.log(data);
			// var data1= data.find('.chat_container').html()
			$('.content-container').html(data);

			$('#share-link').addClass('sidebar-link-active');
			$('#captions-link').removeClass('sidebar-link-active');
			$('#settings-link').removeClass('sidebar-link-active');
			$('#all-products').addClass('menu-container-active');
		}
	});
}
function getnewproducts(){
	$('.menu-container').each(function(){
		$(this).removeClass('menu-container-active');
	});

	var access_token='<?php echo $access_token ?>';
	var shop='<?php echo $_REQUEST['shop'] ?>';
	var data="<div class='loading-clearfix'><div class='loading-container'><div><img class='loading-img' src='images/loading13.gif' /><span class='cc-text-small loader-text'>Loading...</span></div></div></div>";
     	$('.content-overflow').html(data);
	$.ajax({
		url: '/collections.php?access_token='+access_token+'&shop='+shop+'&max=60',
		success: function(data){
			//console.log(data);
			// var data1= data.find('.chat_container').html()
			$('.content-container').html(data);

			$('#share-link').addClass('sidebar-link-active');
			$('#captions-link').removeClass('sidebar-link-active');
			$('#settings-link').removeClass('sidebar-link-active');
			$('#new-products').addClass('menu-container-active');
		}
	});
}
// Get Dashboard Page
function getdashboard(){

	var access_token='<?php echo $access_token ?>';
	var shop='<?php echo $_REQUEST['shop'] ?>';

	$.ajax({
		url: '/dashboard.php?access_token='+access_token+'&shop='+shop,
		success: function(data){
			//console.log(data);
			// var data1= data.find('.chat_container').html()
			$('.content-container').html(data);
		}
	});
}

// Get Captions Page
function getcaptions(){

	var access_token='<?php echo $access_token ?>';
	var shop='<?php echo $_REQUEST['shop'] ?>';

	$.ajax({
		url: '/captions.php?access_token='+access_token+'&shop='+shop,
		success: function(data){
			//console.log(data);
			// var data1= data.find('.chat_container').html()
			$('.content-container').html(data);
			$('#captions-link').addClass('sidebar-link-active');
			$('#share-link').removeClass('sidebar-link-active');
			$('#settings-link').removeClass('sidebar-link-active');
		}
	});
}
// Get Settings Page
function getsettings(){

	var access_token='<?php echo $access_token ?>';
	var shop='<?php echo $_REQUEST['shop'] ?>';

	$.ajax({
		url: '/settings.php?access_token='+access_token+'&shop='+shop,
		success: function(data){
			//console.log(data);
			// var data1= data.find('.chat_container').html()
			$('.content-container').html(data);
			$('#settings-link').addClass('sidebar-link-active');
			$('#share-link').removeClass('sidebar-link-active');
			$('#captions-link').removeClass('sidebar-link-active');
		}
	});
}
// Get Share History
function gethistory(){

	var access_token='<?php echo $access_token ?>';
	var shop='<?php echo $_REQUEST['shop'] ?>';
     var data="<div class='loading-clearfix'><div class='loading-container'><div><img class='loading-img' src='images/loading13.gif' /><span class='cc-text-small loader-text'>Loading...</span></div></div></div>";
     $('.content-overflow').html(data);
	$.ajax({
		url: '/collections.php?access_token='+access_token+'&shop='+shop+'&status=history',
		success: function(data){
			//console.log(data);
			// var data1= data.find('.chat_container').html()
			$('.content-container').html(data);
		}
	});
}

// Initial Page Load
(function($) {
	$(document).ready(function() {
		var data="<div class='loading-clearfix'><div class='loading-container'><div><img class='loading-img' src='images/loading13.gif' /><span class='cc-text-small loader-text'>Loading...</span></div></div></div>";
		 $('.content-container').html(data);
		getnewproducts(); // start the loop
	});
})(jQuery);
</script>

<!-- Scripts -->
<script src="main.js"></script>

</body>
