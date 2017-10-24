<?php


echo "<h1>PDO Practice HW Week 7</h1>";

$hostname = "sql2.njit.edu";

$username = "eg222";

$password = "e47jkBzo";

try {

	    $conn = new PDO("mysql:host=$hostname;dbname=eg222",

	    $username, $password);

	    echo "Connected successfully"; 
	     $date = date('Y-m-d', time());
echo "<br>";
echo "<br>";
echo "<br>";

	
	     $sql = "SELECT id,email,fname,lname,phone,birthday,gender,password from accounts where id<6";

	    $q = $conn->prepare($sql);

	    $q->execute();

	    $results = $q->fetchAll();



	    if($q->rowCount()){
	    	$r=count($results);
	    	echo "Number of records displayed:$r";


echo "<br>";

	   	echo "<table border=\"1\"><tr><th>ID</th><th>Email</th><th>First Name</th><th>Last Name</th><th>Phone</th><th>Birthday</th><th>Gender</th><th>Password</th>
</tr>";

	   	foreach ($results as $row) {

     		echo "<tr><td>".$row["id"]."</td><td>".$row["email"]."</td><td>".$row["fname"]."</td><td>".$row["lname"]."</td><td>".$row["phone"]."</td><td>".$row["birthday"]."</td><td>".$row["gender"]."</td><td>".$row["password"]."</td></tr>";

   		}

	    }else{

	    echo '0 results';

	    }







    }

catch(PDOException $e)

    {

    	echo "Connection failed: " . $e->getMessage();

    }

$conn = null;



?>