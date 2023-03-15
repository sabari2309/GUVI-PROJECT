<?php

require_once _DIR_ . '/connect_mongodb.php';

// Get the new profile data from the AJAX request
$new_email = $_POST['new_email'];
$new_name = $_POST['new_name'];
$new_dob = $_POST['new_dob'];

// Update the user's profile data in MongoDB
$db = $client->selectDatabase('mydb');
$collection = $db->selectCollection('users');
$update_result = $collection->updateOne(
    ['email' => 'john.doe@example.com'],
    ['$set' => [
        'email' => $new_email,
        'name' => $new_name,
        'dob' => $new_dob
    ]]
);

// Check if the update was successful and return a response
if ($update_result->getModifiedCount() == 1) {
    echo 'success';
} else {
    echo 'error';
}

?>