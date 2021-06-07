<?php

$eventid = $_POST['hiddenid'];

$sql = "DELETE FROM terorism WHERE eventid = $eventid";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

?>