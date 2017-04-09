<?php

$mysqli = new mysqli("gk90usy5ik2otcvi.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "geba43k6q181mf1d", "qjk28slv8qni96x8", "o2o18a0n2y5goi9r");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

?>