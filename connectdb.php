<?php

    include_once 'config1.php';

    $name = $_POST['name'];
    $comment = $_POST['comment'];


    $sql = "INSERT INTO Tesmon (name, comment) VALUES ('$name', '$comment');";
    mysqli_query($conn, $sql);

    header("Location: about.php?submit=success");
exit;

	
	
