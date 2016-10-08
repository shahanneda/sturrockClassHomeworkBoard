<html>
 <head>
  <title>STURROCK BOARD</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

 </head>
 <style type="text/css">
 body{
 	 background-color: yellow;
 }
 .myButton {
        text-align: center;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #c123de), color-stop(1, #a20dbd));
	background:-moz-linear-gradient(top, #c123de 5%, #a20dbd 100%);
	background:-webkit-linear-gradient(top, #c123de 5%, #a20dbd 100%);
	background:-o-linear-gradient(top, #c123de 5%, #a20dbd 100%);
	background:-ms-linear-gradient(top, #c123de 5%, #a20dbd 100%);
	background:linear-gradient(to bottom, #c123de 5%, #a20dbd 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#c123de', endColorstr='#a20dbd',GradientType=0);
	background-color:#c123de;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #a511c0;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:28px;
	font-weight:bold;
	padding:6px 24px;
	text-decoration:none;
}
.myButton:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #a20dbd), color-stop(1, #c123de));
	background:-moz-linear-gradient(top, #a20dbd 5%, #c123de 100%);
	background:-webkit-linear-gradient(top, #a20dbd 5%, #c123de 100%);
	background:-o-linear-gradient(top, #a20dbd 5%, #c123de 100%);
	background:-ms-linear-gradient(top, #a20dbd 5%, #c123de 100%);
	background:linear-gradient(to bottom, #a20dbd 5%, #c123de 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#a20dbd', endColorstr='#c123de',GradientType=0);
	background-color:#a20dbd;
}
.myButton:active {
	position:relative;
	top:1px;
}

.LoginButton {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #44c767), color-stop(1, #5cbf2a));
	background:-moz-linear-gradient(top, #44c767 5%, #5cbf2a 100%);
	background:-webkit-linear-gradient(top, #44c767 5%, #5cbf2a 100%);
	background:-o-linear-gradient(top, #44c767 5%, #5cbf2a 100%);
	background:-ms-linear-gradient(top, #44c767 5%, #5cbf2a 100%);
	background:linear-gradient(to bottom, #44c767 5%, #5cbf2a 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#44c767', endColorstr='#5cbf2a',GradientType=0);
	background-color:#44c767;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #18ab29;
	display:inline-block;
	cursor:pointer;
	color:#4400d6;
	font-family:Arial;
	font-size:28px;
	font-weight:bold;
	padding:6px 24px;
	text-decoration:none;
}
.LoginButton:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #5cbf2a), color-stop(1, #44c767));
	background:-moz-linear-gradient(top, #5cbf2a 5%, #44c767 100%);
	background:-webkit-linear-gradient(top, #5cbf2a 5%, #44c767 100%);
	background:-o-linear-gradient(top, #5cbf2a 5%, #44c767 100%);
	background:-ms-linear-gradient(top, #5cbf2a 5%, #44c767 100%);
	background:linear-gradient(to bottom, #5cbf2a 5%, #44c767 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#5cbf2a', endColorstr='#44c767',GradientType=0);
	background-color:#5cbf2a;
}
.LoginButton:active {
	position:relative;
	top:1px;
}


 </style>
 <body>
 <div class="buttons">

<a href="secure.php" class="LoginButton"> LOGIN</a>
<a href="history.php" class="myButton"> HISTORY</a>
<h1 style=" text-align: center;"">WELCOME TO STURROCKS CLASS HOMEWORK BOARD</h1>

</div>
 
 <H2 style=" text-align: center;">Current date:<?php date_default_timezone_set("America/Vancouver");  
	echo("<H2 style= 'text-align: center;'>". date("m/d")."  ".date("l") ."</H2>");
 ?></H2>
<H2 style="
text-align: center;
color:red;
font-size:30;
font-family: "Impact", Charcoal, sans-serif;
"
>ALLWAYS ASSUME THAT THIS BOARD IS WRONG <br>
KNOWING YOUR HOMEWORK IS YOUR RESPOSIBILITY NOT THIS BOARD'S!!</H2>






                <?php
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
                
               
                
                $sql = "SELECT DAY, MONTH FROM history";
                $result = $conn->query($sql);   
                $highestresultMONTH = 0;
                 $highestresultDAY = 0;
                 $finalResult = "";
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        
                        if($row["MONTH"] > $highestresultMONTH){
                                $highestresultMONTH = $row["MONTH"];
                                $highestresultDAY = $row["DAY"];
                                $finalResult = $row["MONTH"] . $row["DAY"] . ".jpg";
                        
                        }else if($row["MONTH"] == $highestresultMONTH){
                                if($row["DAY"] > $highestresultDAY){
                                        $highestresultMONTH = $row["MONTH"];
                                        $highestresultDAY = $row["DAY"];
                                        $finalResult = $row["MONTH"] . $row["DAY"] . ".jpg";
                                }
                        
                        }
                      
                        
                       
                        
                       
                        
                   
                       
                        
                    }
                    ?>
                    
                           
                           <img src="uploads\<?php echo ($finalResult) ?>" style="width:100%;"><br><h2 style="text-align: center;"><?php 
                            
                            ?>
                            </h2>
                    <?php
                    
                    
                    
                } else {
                    echo "0 results";
                }
                ?>


 </body>
</html>