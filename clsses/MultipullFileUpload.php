<?php
$filepath = realpath(__DIR__);
include_once($filepath."/../database/Database.php");
?>
<?php
/**
*Class User for multipull file upload
*/
class MultipullFileUpload{
    public $db;

	public function __construct(){
		$this->db = new Database();
    }
    
    public function fileUpload($data, $file){ 
        $allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg'); 
        $response = array(
            'status' => 0, 
            'message' => 'Form submission failed, please try again.' 
        ); 
        
        // If form is submitted 
        $errMsg = ''; 
        $valid = 1; 
       

        // Get the submitted form data 
        $name = $data['name']; 
        $email = $data['email']; 
        $filesArr = $file["files"];
        
        if(empty($name)){ 
            $valid = 0; 
            $errMsg .= '<br/>Please enter your name.'; 
        } 
        if(empty($email)){ 
            $valid = 0; 
            $errMsg .= '<br/>Please enter your email.'; 
        } 
        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){ 
            $valid = 0; 
            $errMsg .= '<br/>Please enter a valid email.'; 
        } 
        
        // Check whether submitted data is not empty 
        if($valid == 1){ 
            $uploadStatus = 1; 
            $fileNames = array_filter($filesArr['name']);
            // Upload file 
            $uploadedFile = ''; 
            if(!empty($fileNames)){  
                foreach($filesArr['name'] as $key=>$val){  
                    // File upload path  
                    $fileName = $key."_".basename($filesArr['name'][$key]);
                    $uploadfile ="upload/".$fileName;
                    // Check whether file type is valid  
                    $fileType = pathinfo($uploadfile, PATHINFO_EXTENSION);  
                    if(in_array($fileType, $allowTypes)){  
                        // Upload file to server  
                        if(move_uploaded_file($filesArr["tmp_name"][$key], SITE_ROOT.'/'.$uploadfile)){  
                            $uploadedFile .= $fileName.','; 
                        }else{  
                            $uploadStatus = 0; 
                            $response['message'] = 'Sorry, there was an error uploading your file.'; 
                        }  
                    }else{  
                        $uploadStatus = 0; 
                        $response['message'] = 'Sorry, only PDF, DOC, JPG, JPEG, & PNG files are allowed to upload.'; 
                    }  
                }  
            } 
            
            if($uploadStatus == 1){ 
                // Insert form data in the database 
                $uploadedFileStr = trim($uploadedFile, ',');
                $sql = "INSERT INTO form_data (name,email,file_names) VALUES ('$name', '$email','$uploadedFileStr')";
                $insert = $this->db->insert($sql);
                if($insert){ 
                    $response['status'] = 1; 
                    $response['message'] = 'Form data submitted successfully!'; 
                } 
            } 
        }else{ 
            $response['message'] = 'Please fill all the mandatory fields!'.$errMsg; 
        } 
        
        
        // Return response 
        echo json_encode($response); 
    }

    public function fetachImage(){
        $sql = "SELECT * from form_data";
        $result = $this->db->select( $sql);
        return $result;
    }
}

?>