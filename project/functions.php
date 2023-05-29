<?php

require_once("database.php");
function selectDataFromDatabase($servername, $username, $password, $database, $tableName)
{
    // Create a connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to select data
    $sql = "SELECT * FROM  .Patients";

    // Execute the query
    $result = $conn->query($sql);

    // Check if any rows are returned
    if ($result->num_rows > 0) {
        // Create an array to hold the data
        $data = array();

        // Loop through each row
        while ($row = $result->fetch_assoc()) {
            // Add the row to the data array
            $data[] = $row;
        }

        // Close the connection
        $conn->close();

        // Return the retrieved data
        return $data;
    } else {
        // Close the connection
        $conn->close();

        // Return an empty array if no data found
        return array();
    }
}


// Display or process the retrieved data
$row= $result->fetch_assoc();
print_r($row);
?>
