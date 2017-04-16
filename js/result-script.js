<?php
	include(include.php);
?>

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