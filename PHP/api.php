<?php 


// change details below to fit your details

$servername = "localhost";      // Computer host
$username = "root";             // MySql username
$password = "";                  // MySQL password
$dbname = "b4a-php-db";          // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



//Save Function
// Check which function will be executed
if(isset($_POST['save'])) {

//sql statement to insert data
$sql = "INSERT INTO student_name (name) VALUES ('".$_POST['editTextData']."' )";

// execute to insert data
if ($conn->query($sql) === TRUE) {
  die("Data saved successfully");
} else {
  die("Error: " . $sql . "<br>" . $conn->error);
}
}





//Fetch Function
// Check which function will be executed
if(isset($_POST['fetch'])) {

//sql statement to select data
$sql = "SELECT name from student_name limit 1 ";

// execute to select data
$result = $conn->query($sql);


if ($result->num_rows > 0) {
  // output data 
  while($row = $result->fetch_assoc()) {
    die($row["name"]);
  }
} else {
  die("No Data");
}

}





//Update Function
// Check which function will be executed
if(isset($_POST['update'])) {

//sql statement to select data
$sql = "UPDATE student_name SET name='".$_POST['editTextData']."' WHERE name='".$_POST['prevdata']."'";

//execute update statement
if ($conn->query($sql) === TRUE) {
  die ("Updated successfully");
} else {
  die( "Error: " . $conn->error);
}
}






//Delete Function
// Check which function will be executed
if(isset($_POST['delete'])) {

//sql statement to select data
$sql = "Delete from student_name where name='".$_POST['editTextData']."'";

//execute delete statement
if ($conn->query($sql) === TRUE) {
  die("Deleted successfully");
} else {
  die("Error: " . $conn->error);
}
}



die("Execute a request");



 ?>