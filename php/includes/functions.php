<?php

function db_connect()
{
    $conn = pg_connect("host=127.0.0.1 dbname=stradlingm_db user=stradlingm password=Riverkings17!");
    return $conn;
}

function dump($arg)
{
    echo "\n<pre>\n";
    print_r($arg);
    echo "\n</pre>\n";
}

$conn = db_connect();
$stmt1 = pg_prepare($conn, "retrieve_student_information", "SELECT first_name || ' ' || last_name as full_name, program_code, email_address
                                                        FROM users, students
                                                        WHERE user_id = student_id and student_id = $1");

$stmt2 = pg_prepare($conn, "retrieve_grades_by_id", "SELECT courses.course_code, course_name, final_mark, achieved_at
                                                                                 FROM courses, marks
                                                                                 WHERE courses.course_code = marks.course_code and student_id = $1
                                                                                 ORDER BY final_mark DESC");

// $stmt3 = pg_prepare($conn,"retrieve_actor_by_id", "SELECT name, id
//                                                         FROM actors
//                                                         WHERE actors.id = $1");   
