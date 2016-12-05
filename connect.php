<?php 
session_start();
require('buffer.php'); 
$client_id = '584268ab6257b56f05ff2da5';
	$client_secret = '304f258d69369b46b9c4fe10580b8ab2';
	$callback_url = $_SERVER['REQUEST_URI'];

$buffer = new BufferApp($client_id, $client_secret, $callback_url);
		
	if (!$buffer->ok) {
		echo '<a href="' . $buffer->get_login_url() . '">Connect to Buffer!</a>';
	} else {
		$profiles = $buffer->go('/profiles');
			
		if (is_array($profiles)) {
			foreach ($profiles as $profile) {
				$buffer->go('/updates/create', array('text' => 'My first status update from bufferapp-php worked!', 'profile_ids[]' => $profile->id));
			}
		}
	}

?>
<!-- HTML Content for Product  START      -->

<div class="product-card-clearfix">
            <div class="product-card-container">

                      <div class="connect-image-container">
                            <div>
                                <div class="connect-image shopify-icon">

                                </div>
                                <span class="cc-text-medium">SHOPIFY</span>
                           </div>
                      </div>

                      <button type='button' class='btn grey-button' id='shopify-connect-button' style="width: calc(100% - 30px);"><i class='fa fa-check' aria-hidden='true'></i> Connected</button>
            </div>
 </div>

 <div class="product-card-clearfix" id="buffer-auth">
             <div class="product-card-container">

                       <div class="connect-image-container">
                              <div>
                                   <div class="connect-image buffer-icon">

                                   </div>
                                   <span class="cc-text-medium">BUFFER</span>
                              </div>
                       </div>

                       <button type='button' class='btn green-button' id='shopify-connect-button' style="width: calc(100% - 30px);"><i class='fa fa-sign-in' aria-hidden='true'></i> Connect</button>
             </div>
  </div>

<!-- Show / Hide Product Details -->
