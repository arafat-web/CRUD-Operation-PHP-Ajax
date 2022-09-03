<?php

include '../config/database.php';

$data = new Database();
$type = $_POST["type"];
// $id = "";
// $id = $_POST["id"];
$name = $_POST["name"];
$age = $_POST["age"];
$email = $_POST["email"];

switch ($type) {
    case '1':
        // Insert Data
        $arrayName = array('name' => $name, 'age' => $age, 'email' => $email);
        if ($data->addData("user", $arrayName)) {
            echo json_encode(array("statusCode" => 200));
        } else {
            echo json_encode(array("statusCode" => 201));
        }

        break;
    case '2':
        // View Data
        $post_data = $data->viewData("user", "", "");
        foreach ($post_data as $post) {
            echo $post["name"];

        }
        break;
    case '3':
        // Update data
        $arrayName = array('name' => $name, 'age' => $age, 'email' => $email);
        $data->updateData("user", $arrayName, '18');
        break;
    case '4':
        // Delete Data
        $data->deleteData("user", "id", "$id");
        break;

    default:
        echo "Something went wrong!";
        break;
}