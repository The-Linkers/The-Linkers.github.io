<?php
	include(include.php);
?>

(function(window, document, undefined){

    window.onload = init;

    function init(){
	// the code to be called when the dom has loaded
	// #document has its nodes
	// Get the modal
	var modal = document.getElementById('signup-modal');

	// Get the button that opens the modal
	var btn = document.getElementById("signupBtn");

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];

	// When the user clicks on the button, open the modal
	btn.onclick = function() {
	    modal.style.display = "block";
	}

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
	    modal.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
	    if (event.target == modal) {
		modal.style.display = "none";
	    }
	}
	var modal2 = document.getElementById('signup-modal2');

	// Get the button that opens the modal
	var btn2 = document.getElementById("signupBtn2");

	// Get the <span> element that closes the modal
	var span2 = document.getElementsByClassName("close2")[0];

	// When the user clicks on the button, open the modal
	btn2.onclick = function() {
	    modal.style.display = "block";
	}

	// When the user clicks on <span> (x), close the modal
	span2.onclick = function() {
	    modal.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window2.onclick = function(event) {
	    if (event.target == modal) {
		modal.style.display = "none";
	    }
	}
    }
    
})(window, document, undefined);
function calc1(){
	<?php
		$thumbsUpVal;
		$gid = $_GET["gid"];
		$if ($stmt = $mysqli->prepare("select thumbsUp from rating where gid =?")) {
			$stmt->bind_param("i", $gid);
			$stmt->execute();
			$stmt->bind_result($thumbsUp);
			while ($stmt->fetch()) {
				$thumbsUpVal = $thumbsUp;
			}
		}

		$thumbsUpVal++;
		
		if ($stmt = $mysqli->prepare("insert into rating (thumbsUp) values (?)")) {
			$stmt->bind_param("i", $thumbsUpVal);
			$stmt->execute();
		}
	?>
	$("#feedback").html("Thanks For The Feedback");
}

function calc2() {
	<?php
		$thumbsDownVal;
		$gid = $_GET["gid"];
		$if ($stmt = $mysqli->prepare("select thumbsDown from rating where gid =?")) {
			$stmt->bind_param("i", $gid);
			$stmt->execute();
			$stmt->bind_result($thumbsDown);
			while ($stmt->fetch()) {
				$thumbsDownVal = $thumbsDown;
			}
		}

		$thumbsDownVal--;
		
		if ($stmt = $mysqli->prepare("insert into rating (thumbsDown) values (?)")) {
			$stmt->bind_param("i", $thumbsDownVal);
			$stmt->execute();
		}
	?>
	$("#feedback").html("Thanks For The Feedback");
}