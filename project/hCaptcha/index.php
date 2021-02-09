<?php
    $js_data['page_css'] = ['project/custom_search/style'];
	$path = dirname(__FILE__);
	include $path.'/../../inc/header.php'; 
	$js_data['page_js'] = ['project/custom_search/main'];
?>
<div class="row">
<?php 
 
// hCAPTCHA API key configuration 
$secretKey = 'Insert_hCaptcha_Secret_Key'; 
 
// If the form is submitted 
$statusMsg = ''; 
if(isset($_POST['submit'])){ 
     
    // Validate form fields 
    if(!empty($_POST['name']) && !empty($_POST['email'])){ 
         
        // Validate hCAPTCHA checkbox 
        if(!empty($_POST['h-captcha-response'])){ 
            // Verify API URL 
            $verifyURL = 'https://hcaptcha.com/siteverify'; 
             
            // Retrieve token from post data with key 'h-captcha-response' 
            $token = $_POST['h-captcha-response']; 
             
            // Build payload with secret key and token 
            $data = array( 
                'secret' => $secretKey, 
                'response' => $token, 
                'remoteip' => $_SERVER['REMOTE_ADDR'] 
            ); 
             
            // Initialize cURL request 
            // Make POST request with data payload to hCaptcha API endpoint 
            $curlConfig = array( 
                CURLOPT_URL => $verifyURL, 
                CURLOPT_POST => true, 
                CURLOPT_RETURNTRANSFER => true, 
                CURLOPT_POSTFIELDS => $data 
            ); 
            $ch = curl_init(); 
            curl_setopt_array($ch, $curlConfig); 
            $response = curl_exec($ch); 
            curl_close($ch); 
             
            // Parse JSON from response. Check for success or error codes 
            $responseData = json_decode($response); 
             
            // If reCAPTCHA response is valid 
            if($responseData->success){ 
                // Posted form data 
                $name = !empty($_POST['name'])?$_POST['name']:''; 
                $email = !empty($_POST['email'])?$_POST['email']:''; 
                $message = !empty($_POST['message'])?$_POST['message']:''; 
                 
                // Code to process the form data goes here... 
                 
                 
                $statusMsg = 'Your contact request has submitted successfully.'; 
            }else{ 
                $statusMsg = 'Robot verification failed, please try again.'; 
            } 
        }else{ 
            $statusMsg = 'Please check on the CAPTCHA box.'; 
        } 
    }else{ 
        $statusMsg = 'Please fill all the mandatory fields.'; 
    } 
} 
 
echo $statusMsg; 
 
?>
    <div class="col-sm-8 offset-2">
        <!-- Form fields -->
            <form action="" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" value="" placeholder="Your name" required="" />
                </div>
                <div class="form-group">	
                    <input type="email" class="form-control" name="email" value="" placeholder="Your email" required="" />
                </div>
                <div class="form-group">
                    <textarea name="message" class="form-control" placeholder="Type message..."></textarea>
                </div>
                    
                <!-- Add hCaptcha CAPTCHA box -->
                <div class="h-captcha" data-sitekey="061855c4-fd0e-48cd-8111-72ea1437ae7c"></div>
                
                <!-- Submit button -->
                <input type="submit" name="submit" value="SUBMIT">
            </form>
    </div>
</div>

<?php 
	$footer_path = dirname(__FILE__);
    include $footer_path.'/../../inc/footer.php';
 ?>
 <script src="https://hcaptcha.com/1/api.js" async defer></script>