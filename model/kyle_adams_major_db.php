<!--  
Kyle Adams
CSCI 4000-W1B
11/19/2019
-->
<?php
function get_major_name($major_id) {
    global $db;
    $query = 'SELECT * FROM major
              WHERE majorID = :major_id';  

    $statement = $db->prepare($query);
    $statement->bindValue(':major_id', $major_id);
    $statement->execute();    
    $major = $statement->fetch();
    $statement->closeCursor();    
    $major_name = $major['majorName'];
    
    return $major_name;
}

function get_majors() {
    global $db;
    $query = 'SELECT * FROM major
                       ORDER BY majorID';
	$statement = $db->prepare($query);
	$statement->execute();
	$majors = $statement->fetchAll();
	$statement->closeCursor();
    return $majors;    
}
?>