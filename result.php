<?
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
	
	<noscript>
	    <link rel="stylesheet" href="css/skel.css" />
	    <link rel="stylesheet" href="css/style.css" />
	    <link rel="stylesheet" href="css/style-xlarge.css" />
	    
	</noscript>

	<style>
	 body
	 {
	     position: fixed; 
	     overflow-y: scroll;
	     width: 100%;
	     padding-left: 5%; 
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
		    <!-- <li><a href="left-sidebar.html">Left Sidebar</a></li>
			 <li><a href="right-sidebar.html">Right Sidebar</a></li>
			 <li><a href="no-sidebar.html">No Sidebar</a></li> -->
		    <li>
			<a href="#" id="signupBtn" class="button special">Sign Up</a>
		    </li>

		    <div id="signup-modal" class="modal">

			<div class="modal-content">
			    <span class="close">&times;</span>
			    <h2>Enter your email </h2>
			    <form>
				<input type="email" name="email" placeholder="Email"><br>
				<input type="submit" class="button special" value="Submit">
			    </form>
			</div>
		    </div>
		    
		</ul>
	    </nav>
	</header>

	<div class="row" >
            
            <!-- Hello <?php echo $_POST["name"]; ?>!<br>
		 Our relationship is <?php echo $_POST["relationship"]; ?>.
		 The gender  is <?php echo $_POST["gender"]; ?>.
		 Our age is <?php echo $_POST["age"]; ?>.
		 Favorite hobby is <?php echo $_POST["category"]; ?>.
	       -->
	    <?php
	    $category = $_POST["category"];
	    if ($stmt = $mysqli->prepare("select weight_name from hobbies where category = ?" )) {
		$stmt->bind_param("s", $category);
		$stmt->execute();
		$stmt->bind_result($weightname);
		while($stmt->fetch()) {
		    echo $weightname;	
		}

		$query = "SELECT gifts.category, gifts.price, gifts.link from gifts NATURAL JOIN weights ORDER BY weights.{$weightname} DESC LIMIT 10";
		
		if ($stmt = $mysqli->prepare($query)) {

		    $stmt->execute();
		    $stmt->bind_result($giftcategory,$giftprice,$giftlink);
		    /* $stmt->bind_result();
		       $stmt->bind_result();
		     */
		    while($stmt->fetch()) {
			echo $giftlink;
			echo "<br>";
		    }
		}
		
		echo "Done querying";
	    }

	    ?>
	    <!-- 
		 <div class="col-sm-4 col-lg-4 col-md-4">
		 <img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQN6qTwsdFBUnBY46WmPctiDTL-nMJCdSRbVZ_567k7_d45A5RSryDKmgJQ"> <br>
		 Amazon Echo <br>
		 Price : $179.99 <br>
		 <a type="submit" class="button special" value="" href="https://www.amazon.com/Amazon-Echo-Bluetooth-Speaker-with-WiFi-Alexa/dp/B00X4WHP5E"> Buy here </a>
		 </div>

		 <div class="col-sm-4 col-lg-4 col-md-4">
		 Item 2 goes here
		 </div>

		 <div class="col-sm-4 col-lg-4 col-md-4">
		 Item 3 goes here
		 </div>

		 <div class="col-sm-4 col-lg-4 col-md-4">
		 Item 4 goes here
		 </div>

		 <div class="col-sm-4 col-lg-4 col-md-4">
		 Item 5 goes here
		 </div>

		 <div class="col-sm-4 col-lg-4 col-md-4">
		 Item 6 goes here
		 </div>

		 <div class="col-sm-4 col-lg-4 col-md-4">
		 Item 7 goes here
		 </div>

		 <div class="col-sm-4 col-lg-4 col-md-4">
		 Item 8 goes here
		 </div>

	       -->
	    
	</div>
	
    </body>	
</html>
