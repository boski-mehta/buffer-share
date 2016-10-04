<?php

     require __DIR__.'/vendor/autoload.php';
     use phpish\shopify;
     $access_token=$_REQUEST['access_token'];
     $shopify = shopify\client($_REQUEST['shop'], SHOPIFY_APP_API_KEY, $access_token );

?>

<?php
try
	{
		# Making an API request can throw an exception
		if(isset($_REQUEST['colid']) && $_REQUEST['colid']!=''){
		$products = $shopify('GET /admin/products.json?collection_id='.$_REQUEST['colid'], array('published_status'=>'published'));
		}
		if($_REQUEST['colid']=='') {	
	       $products = $shopify('GET /admin/products.json', array('published_status'=>'published'));
		}
		//print_r($products);
		//$products = $shopify('GET /admin/products.json', array('published_status'=>'published'));
		foreach($products as $singleproduct)
		{
			$title=$singleproduct['title']; // Product Title
			$variants=$singleproduct['variants'];
		        $p_id1=$singleproduct['id'];
			$tags=array();
			
$people = array(Peter, Joe, Glenn, Cleveland);
			echo $people;

if (in_array("Glenn", $people))
  {
  echo "Match found";
  }
else
  {
  echo "Match not found";
  }
			
			if (in_array(Glenn, $people))
  {
  echo "Match found";
  }
else
  {
  echo "Match not found";
  }

			$tags=$singleproduct['tags'];
			$apple= $singleproduct['tags'];
				
				//$a = 'How are you?';

if ($apple contains 'Shared'){
    echo 'true';}
			echo "original tags:-";
			print_r($tags);
			
			if (in_array(Shared, $tags))
			{
			
			 echo "hi";
			
			}
			if (in_array("Shared", $tags)) {
    				echo "Got shared";
				if(($key = array_search("shared", $tags)) !== false) {
    					unset($messages[$key]);
				}
				echo "part-1";
				 print_r($tags);
				exit();
			}
			else{
				array_push($tags,"shared");
				echo "part-2";
			    print_r($tags);
				exit();
				
			}
			
			
			

			foreach($variants as $variants){
				$price=$variants['price']; // Product PRice
			}
		        $images=$singleproduct['images'];

			foreach($images as $images){
				$src=$images['src']; //Image Source
			}

			?>

<!-- HTML Content for Product  START      -->

<div class="product-card-clearfix">

	<div class="product-card-container">

      		<div class="product-card-image-container" style='background-image: url(<?php echo $src; ?>)'>

      		</div>
      		<div class="product-card-details-section">
      			<div class="product-card-details-container">
                  	<span class="product-title-text"><?php echo $title; ?></span>
                  	<div class="product-card-price-container">
                  		<span class="product-card-price-text" style="margin-right: 3px;">$<?php echo $price; ?></span><span class="product-card-price-text" style="font-size: 14px; color: #888;">$<?php echo $price; ?></span>
                  	</div>
      			</div>
      		</div>
            <div class="share-button-container">
                 <button type="button" class="share-button" onclick="shareButton(<?php echo $p_id1; ?>,<?php echo $tags; ?>);">SHARE</button>
            </div>
      </div>
</div>
<!-- HTML Content for Product END    -->

	<?php


		}
	}
	catch (shopify\ApiException $e)
	{
		# HTTP status code was >= 400 or response contained the key 'errors'
		echo $e;
		print_r($e->getRequest());
		print_r($e->getResponse());
	}
	catch (shopify\CurlException $e)
	{
		# cURL error
		echo $e;
		print_r($e->getRequest());
		print_r($e->getResponse());
	}
	?>
	<script>
	function shareButton(pid,tag){

               var access_token='<?php echo $access_token ?>';
	       var shop='<?php echo $_REQUEST['shop'] ?>';


                $.ajax({
                    url: '/sharebutton.php?pid='+ pid+'&access_token='+access_token+'&shop='+shop,
                    success: function(data){

                    }
                });
            }
	</script>
