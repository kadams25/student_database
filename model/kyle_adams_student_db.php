<!--  
Kyle Adams
CSCI 4000-W1B
11/19/2019
-->

<?php
function get_students_by_major($major_id) {
    global $db;
    $query = 'SELECT * FROM student
              WHERE student.majorID = :major_id
              ORDER BY studentID';
    $statement = $db->prepare($query);
    $statement->bindValue(":major_id", $major_id);
    $statement->execute();
    $student = $statement->fetchAll();
    $statement->closeCursor();
    return $student;
}

function delete_student($student_id) {
    global $db;
    $query = 'DELETE FROM student
              WHERE studentID = :student_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':student_id', $student_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_student($major_id, $firstName, $lastName, $gender) {
    global $db;
    $query = 'INSERT INTO student
                 (majorID, firstName, lastName, gender)
              VALUES
                 (:major_id, :firstName, :lastName, :gender)';
    $statement = $db->prepare($query);
	$statement->bindValue(':major_id', $major_id);
	$statement->bindValue(':firstName', $firstName);
	$statement->bindValue(':lastName', $lastName); 
	$statement->bindValue(':gender', $gender); 
	$statement->execute();
	$statement->closeCursor();
}

?>