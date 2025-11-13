<?php
$title = "Student Grade Page\n";
$date = "10 November 2025\n";
$file =  "grades.php\n";
$desc = "Student Info and Grades";
include "./includes/header.php";
require "./includes/functions.php";
?>

<pre></pre>
<?php

// Set $output and $result variables 
$output = "";
$result = false;

// Set $id variable for getting student id from the URL
$id = isset($_GET["student_id"])?$_GET["student_id"]:"";

// Check if $id is empty and return an error message if true
if ($id == "") {
    $output .= "<h2>A student ID must be provided. You entered \"".$id."\"<h2>";

// Check if $id is not numeric and return an error message if true
} else if (!is_numeric($id)) {
    $output .= "<h2>The student ID provided must be a number. You entered \"".$id."\"<h2>";

// Set variable $info_result to the pg_execute command for the statement "retrieve_student_information"
} else {
    $info_result = pg_execute($conn, "retrieve_student_information", array($id));
    
    // Check if returned rows from $info_result is not equal to 0 and sets $result to the pg_execute command for "retrieve_grades_by_id" statement
    if (pg_num_rows($info_result) != 0) {

        $result = pg_execute($conn, "retrieve_grades_by_id", array($id));

        // Setup student info table
        $output .= '<table border="1" width="100%">
            <tr><th width="45%">Full Name</th><th width="40%">Program Code</th><th width="35%">Email Address</th></tr>';

        // Iterate through the $info_results and add each field to the output variable
        for ($i = 0; $i < 1; $i++) {  

            $record = pg_fetch_assoc($info_result, $i);

            $output .= "\n\t<tr>\n\t\t<td>" . $record["full_name"] . "</td>";
            $output .= "\n\t\t<td>" . $record["program_code"] . "</td>";
            $output .= "\n\t\t\t\t<td>" . $record["email_address"] . "</td>\n\t\t\t</tr>";
        }   
        // Closing table tag 
        $output .= '</table>';
    
    // Provide error message for when an id does not exist in the database
    } else {
        $output .= "<h2>The student ID provided does not exist in the database. You entered \"".$id."\"<h2>";
    }

}

// Check if the $results variable is still set to false
if ($result != false) {

    // Check if the number of rows returned from $result is not equal to 0
    if(pg_num_rows($result) != 0) {

        // setup the table 
        $output .= '<table border="1" width="100%">
            <tr><th width="25%">Course Code</th><th width="45%">Course Name</th><th width="25%">Final Mark</th><th width="30%">Achieved At</th></tr>';
        
        $output .= "<br>";

        // Iterate through the $results and add each field to the output variable
        $row_count = pg_num_rows($result);
        for ($i = 0; $i < $row_count; $i++) {  //loop through all of the retrieved records and add to the output variable

            $record = pg_fetch_assoc($result, $i);

            $output .= "\n\t<tr>\n\t\t<td>" . $record["course_code"] . "</td>";
            $output .= "\n\t\t<td>" . $record["course_name"] . "</td>";
            $output .= "\n\t\t\t\t<td>" . $record["final_mark"] . "</td>\n\t\t\t";
            $output .= "\t\t<td>" . $record["achieved_at"] . "</td>\t</tr>";
        }
    
    // Provide error message for when a student doesnt have any grades
    } else {
        $output .= "<h2>The student does not have grades<h2>";
    }
    
    // Close the table
    $output .= '</table>';
}

?>

<div>
<!-- Setup a small form for Student ID input -->
<h2>
    <input type="text" id="studentId">
    <input type="button" value="Search" id="btnSearch">
</h2>
</div>

<?php
dump($output);
//dump(pg_fetch_all($result));
?>

<?php
// dump($_SERVER);
include "./includes/footer.php";
?>