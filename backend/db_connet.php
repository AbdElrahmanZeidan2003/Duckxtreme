<?php

// Connect to MySQL server, select database
        $conn = new mysqli('mysql.eecs.ku.edu', '447s26_m885h889', '4wbB42JPJTJg', '447s26_m885h889');
        if ($conn ->connect_error)
               die('Could not connect: ' . $conn->connect_error);
        echo 'sucess';
?>