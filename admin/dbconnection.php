<?php

// Connecting, selecting database
$dbconn = pg_connect("host=localhost dbname=perpustakaan user=postgres password=Erlan2201")
    or die('Could not connect: ' . pg_last_error());

?>