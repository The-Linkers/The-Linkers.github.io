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
	<script src="js/result-script.js"></script>
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
	    Hello <?php echo $_POST["username"]; ?>! This is a list of your friends
 	</div>

	<table>
	    <tr>
		<th>Name</th>
		<th>Relationship</th>
		<th>Gender</th>
		<th>Age</th>
		<th>Hobby</th>
		<th>Min Price</th>
		<th>Max Price</th>
		<th>DOB</th>
	    </tr>

	    <?php
	    $username = $_POST["username"];

	    if ($stmt = $mysqli->prepare("select * from recipient where username = $username" ))            {
		$stmt->execute();
		$stmt->bind_result($user,$name,$relationship,$gender,$age,$hobby,$minPrice,$maxPrice,$dob);
		while($stmt->fetch()) {
		    echo "
                     	    <tr>
                    		<th>$name</th>
		                <th>$relationship</th>
		                <th>$gender</th>
		                <th>$age</th>
		                <th>$hobby</th>
		                <th>$minPrice</th>
		                <th>$maxPrice</th>
		                <th>$dob</th>
	                    </tr>
                         ";
		}
		
	    }
	    ?>
	    
	</table>
	
    </body>	
</html>
