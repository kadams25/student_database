<!--  
Kyle Adams
CSCI 4000-W1B
11/19/2019
-->
<?php
require ('../model/kyle_adams_database.php');
require ('../model/kyle_adams_student_db.php');
require ('../model/kyle_adams_major_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_students';
    }
}

if ($action == 'list_students') {
    // Get the current major ID
	$major_id = filter_input(INPUT_GET, 'major_id', 
            FILTER_VALIDATE_INT);
    if ($major_id == NULL || $major_id == FALSE) {
        $major_id = 1;
    }

    $major_name = get_major_name($major_id);
    $majors = get_majors();
    $student = get_students_by_major($major_id);
    
	// Display the student list
    include ('kyle_adams_student_list.php');

} else if ($action == 'delete_student') {
    // Get the IDs
    $student_id = filter_input(INPUT_POST, 'student_id', 
            FILTER_VALIDATE_INT);
    $major_id = filter_input(INPUT_POST, 'major_id', 
            FILTER_VALIDATE_INT);

    // Delete the student
    delete_student($student_id);

    // Display the Student List page for the current major
    header("Location: .?major_id=$major_id");

} else if ($action == 'show_add_form') {
    $majors = get_majors(); 
    include('kyle_adams_student_add.php'); 

} else if ($action == 'add_student') {
    $major_id = filter_input(INPUT_POST, 'major_id', 
                FILTER_VALIDATE_INT);
    $firstName = filter_input(INPUT_POST, 'firstName');
    $lastName = filter_input(INPUT_POST, 'lastName');
    $gender = filter_input(INPUT_POST, 'gender');
        if ($major_id == NULL || $major_id == FALSE || $firstName == NULL || 
                $lastName == NULL || $gender == NULL) {
            $error = "Invalid (missing) name. Check all fields and try again.";
            include('../errors/kyle_adams_error.php');
        } else { 
            add_student($major_id, $firstName, $lastName, $gender);
            header("Location: .?major_id=$major_id");
        }
    }
?>