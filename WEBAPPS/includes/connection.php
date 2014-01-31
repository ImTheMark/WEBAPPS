<?php
		mysql_connect("localhost","root","");
		mysql_select_db("webapps");
		
		if (mysqli_connect_errno())
	    {
	        echo "Failed to connect to MySQL: " . mysqli_connect_error() . "<br>";
	    }
		else{
			echo "Successful<br>";
		}

?>