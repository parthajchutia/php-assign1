<?php
if (isset(($_POST)['name'])) {
  $server = "localhost";
  $username = "root";
  $password = "";

  $connection = mysqli_connect($server, $username, $password);
  if (!$connection) {
    die("Connection is failed" . mysqli_connect_error());
  }
  $name = $_POST['name'];
  $roll = $_POST['roll'];
  $semester = $_POST['semester'];
  $branch = $_POST['branch'];

  $sql = "INSERT INTO `dbdec`.`stu_data` (`name`, `rollno`, `semester`, `branch`) VALUES ('$name', '$roll', '$semester', '$branch');";

  $display = "select * from `dbdec`.`stu_data`";
  $result = $connection->query($display);

  if ($connection->query($sql) == true) {
    // echo "Data has beem inserted";
  } else {
    echo "Error in establishing connection!";
  }
  if ($result->num_rows > 0) {

    echo "<table border =12 style ='text-algn:center; margin:0 auto;'>
    <tr><th>SL</th><th>Name</th><th>Roll No</th><th>Semester</th><th>Branch</th></tr>";

    while ($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row["serial"] . "</td><td>" . $row["name"] . "</td><td>" . $row["rollno"] . "</td><td>" . $row["semester"] . "</td><td>" . $row["branch"] . "</td>";
      echo "</tr>";
    }
    echo "</table>";
  } else {
    echo "0 results";
  }
  $connection->close();
}
?>
