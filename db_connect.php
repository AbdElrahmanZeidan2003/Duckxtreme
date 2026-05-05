<?php

// Connect to MySQL server, select database
        $conn = new mysqli('mysql.eecs.ku.edu', '447s26_a822z999', 'XeX2kpC5wG93', '447s26_a822z999');
        //$conn = new mysqli('localhost', 'root', '', 'Duckxtreme');
        if ($conn ->connect_error)
               die('Could not connect: ' . $conn->connect_error);
?>