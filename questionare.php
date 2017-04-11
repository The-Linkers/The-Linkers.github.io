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
		
	<noscript>
	    <link type="text/css" rel="stylesheet" href="css/form.css" />
	</noscript>

	<style>
	 body
	 {
	     position: fixed; 
	     overflow-y: scroll;
	     width: 100%;
	 }
	 
	 input[type=number]::-webkit-inner-spin-button, 
	 input[type=number]::-webkit-outer-spin-button { 
	     -webkit-appearance: none; 
	     margin: 0; 
	 }
	 input[type=number] {
	     -moz-appearance:textfield;
	 }
	 
	 form {
	     padding-left: 20%;
	     padding-top:10%;
	 }
	 
	 .mad-libs {
	     width:50%;
	 }
	 .mad-libs label {
	     white-space: nowrap;
	     padding: 0 0 .5em;
	     
	     display: -moz-inline-stack;
	     display: inline-block;
	     vertical-align: top;
	     zoom: 1;
	     *display: inline;
	 }
	 .mad-libs input {
	     font: inherit;
	     background: transparent;
	     border: none;
	     border-bottom: 1px solid #111;
	     outline: 0;
	     display: block;
	 }
	 .mad-libs label span {
	     font-size: .8em;
	     line-height: 1em;
	     opacity: .7;
	     filter: alpha(opacity = 70);
	     padding-left:30%;
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
	<div>
         <form action="result.php" method="post" accept-charset="utf-8">
         <p class="mad-libs">
         I want to get a gift for 
		    <label>
			<input type="text" name="name" value="" />
			<span>name</span>
		    </label>,
		    who is my
		    <label>
			<select name = "relationship">
			    <?php
					if ($stmt = $mysqli->prepare("select distinct relationship from relation order by relationship asc")) {
						$stmt->execute();
						$stmt->bind_result($relationship);
						while($stmt->fetch()) {
							echo "<option value='$relationship'>$relationship</option>\n";	
						}
					}
				?>
			</select> 
			<span>relationship</span>
		    </label><br>
		    My friend is a 
		    <label>
		    <select name = "gender">
			    <?php
					if ($stmt = $mysqli->prepare("select distinct gender from sex order by gender asc")) {
						$stmt->execute();
						$stmt->bind_result($gender);
						while($stmt->fetch()) {
							echo "<option value='$gender'>$gender</option>\n";	
						}
					}
				?>
			</select> 
			<span>gender</span>
		    </label>
		    , aged
		    <label>
			<input type="number" name="age" value="" />
			<span>age</span>
		    </label>. <br>
		    Some of the hobbies are 
		    <label>
			<select name = "category">
			    <?php
			    if ($stmt = $mysqli->prepare("select distinct category from hobbies order by category asc")) {
				$stmt->execute();
				$stmt->bind_result($category);
				while($stmt->fetch()) {
				    echo "<option value='$category'>$category</option>\n";	
				}
			    }
			    ?>
			</select> 
			<span>hobbies</span>
		    </label><br>

		    My budget is
		    <label>
			<input type="number" name="minprice" value="" />
			<span>Min. Price</span>
		    </label>

		    <label>
			<input type="number" name="maxprice" value="" />
			<span>Max Price</span>
		    </label>

		</p>
		
         <!--<p> <a class="button special" href="result.php" value="submit"> Submit</a></p> -->
		<p> <input class="button special" value="Submit "type="submit"></p>
		
         </form>
	</div>

    </body>	
</html>
