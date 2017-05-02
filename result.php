<?php
include ("include.php");
?>

<html>
    <head>
	<title>Linkers</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
	<script src="js/jquery.min.js"></script>
	<script src="js/skel.min.js"></script>
	<script src="js/skel-layers.min.js"></script>
	<script src="js/init.js"></script>
	<script src="js/questionare.js"></script><!--shows the modal when sign up is clicked !-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">	    	
	<noscript>
	    <link rel="stylesheet" href="css/skel.css" />
	    <link rel="stylesheet" href="css/style.css" />
	    <link rel="stylesheet" href="css/style-xlarge.css" />
	</noscript>

	<style>
	 body{
	     position: fixed; 
	     overflow-y: scroll;
	     width: 100%;
	     padding-left: 5%; 
	 }

	 img{
	     width: 200px;
	     height: 150px;
	     overflow: hidden;
	 }
	 
	 #userInfo{
		 text-align: center;
		 margin-top: 5%;
		 font-size: 18px;
	 }
	</style>
	
    </head>

    <body id="top">

	<!-- Header -->
	<header id="header" class="skel-layers-fixed">
	    <h1><a href="index.html">Linkers</a></h1>
	    <nav id="nav">
			<ul>
				<li><a href="index.html">Home</a></li>
				<li><a href="#" id="signupBtn" class="button special">Sign Up</a></li>
				<div id="signup-modal" class="modal">
					<div class="modal-content">
						<span class="close">&times;</span>
						<h2>Enter your email </h2>
						<form style="padding-top:0px; padding-left:0px;">
							<input type="email" name="email" placeholder="Email"><br>
							<input type="submit" class="button special" value="Submit">
						</form>
					</div>
				</div> 
			</ul>
	    </nav>
	</header>
	
	<div id = "userInfo">
	    Hello! The gift is for <?php echo $_GET["name"]; ?>, <?php echo $_GET["relationship"]; ?> of yours.
	    Their gender: <?php echo $_GET["gender"]; ?>, age: <?php echo $_GET["age"]; ?>, and hobby: <?php echo $_GET["category"]; ?>.
	    Your budget is between $<?php echo $_GET["minprice"] ?> to $<?php echo $_GET["maxprice"] ?>.
	</div>
	<div class="row" style="padding-top:2%">
            
	    <?php
	    $minPrice = $_GET["minprice"];
	    $maxPrice =  $_GET["maxprice"];

	    $category = $_GET["category"];
	    if ($stmt = $mysqli->prepare("select weight_name from hobbies where category = ?" )) {
		$stmt->bind_param("s", $category);
		$stmt->execute();
		$stmt->bind_result($weightname);
		while($stmt->fetch()) {
		    /* echo $weightname;	*/
		}

		if(isset($_GET["gid"])) {
		    $gid = $_GET["gid"];
		    $updatequery = "update weights set $weightname = $weightname - 1 where gid= $gid and $weightname > 0;";
		    
		    if ($stmt = $mysqli->prepare($updatequery)) {
			$stmt->execute();
			while($stmt->fetch()) {
			    
			}

		    }	
		}
		
		$query = "SELECT gifts.gid,gifts.category, gifts.price, gifts.link, gifts.gname, gifts.gpic from gifts NATURAL JOIN weights WHERE price BETWEEN $minPrice AND $maxPrice ORDER BY weights.{$weightname} DESC LIMIT 3";
		
		if ($stmt = $mysqli->prepare($query)) {
		    $stmt->execute();
		    $stmt->bind_result($gid,$giftcategory, $giftprice, $giftlink, $giftname, $giftpic);
		    while($stmt->fetch()) {
			echo "<div class='col-sm-4 col-lg-4 col-md-4' style='padding:0; top: 50%; margin-top: 3%;'>
		    <img src='$giftpic'> <br>
		    $giftname<br>
		    Price : $giftprice.00 <br>
		    <a href=$giftlink type= 'submit' class='button special'  target='_blank'> Buy here </a>
			</br>
			<input type='image' value=$gid src='images/thumbUp.jpg' onclick='calc1(this)' style='width:42px;height:42px;border:0; margin-top: 10px; margin-left: 20px;'/>
			<input type='image' value=$gid src='images/thumbDown.jpg' onclick='calc2(this)' style='width:42px;height:42px;border:0'; margin-top: 10px;/>
			<div id='feedback'></div>
		    </div>";
		    }
		}
	    }
	    ?>		    	    
	</div>
	
    </body>
    <script>

     
     function calc1(event){
	 console.log('Thumbs Up clicked');
	 console.log(event.value);
	 
	 window.location.href = "result.php?gid=" + event.value + "&name=" + <?php echo $_GET["name"]; ?> + "&relationship=" + '<?php echo $_GET["relationship"]; ?>' +  "&gender=" + '<?php echo $_GET["gender"]; ?>' +  "&age=" + '<?php echo $_GET["age"]; ?>'  +  "&category=" + '<?php echo $_GET["category"]; ?>'  + "&minprice=" + '<?php echo $_GET["minprice"] ?>' + "&maxprice=" + '<?php echo $_GET["maxprice"] ?>'; 
     }

     function calc2(event){
	 console.log('Thumbs Up clicked');

     }
    </script>
    
</html>
