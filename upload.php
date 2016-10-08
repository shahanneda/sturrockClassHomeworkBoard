<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
	$imageName = date("mj").'.' . pathinfo($_FILES['fileToUpload']['name'],PATHINFO_EXTENSION);
    $oldimgpath = $target_dir . "current";
    
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $imageName)) {
    	//move_uploaded_file($_FILES["Artwork"]["tmp_name"],    );

        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        
        
        
        
        
                        $servername = "fdb3.biz.nf";
                        $username = "2212998_history";
                        $password = "1234567890abc";
                        $dbname = "2212998_history";
                        
                        // Create connection
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        } 
                        $dbentrynamed = date("j");
                        $dbentrynamem = date("m");
                        echo $dbentrynamed ;
                        $sql = "INSERT INTO history (DAY, MONTH) VALUES (" . $dbentrynamed . "," . $dbentrynamem . ")";

                        
                        if ($conn->query($sql) === TRUE) {
                            echo "New record created successfully";
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                        
                        $conn->close();
                   


        include 'main.php';
        
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
