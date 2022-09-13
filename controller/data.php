<?php

include '../config/database.php';

$data = new Database();
// $type = mysqli_escape_string($data->connect, $_POST["type"]);
if (count($_POST) > 0) {
    $type = $_POST["type"];
}

// $id = "";
switch ($type) {
    case '1':
        // Insert Data
        $name = $_POST["name"];
        $age = $_POST["age"];
        $email = $_POST["email"];
        $arrayName = array('name' => $name, 'age' => $age, 'email' => $email);
        if ($data->addData("user", $arrayName)) {
            echo json_encode(array("statusCode" => 200));
        } else {
            echo json_encode(array("statusCode" => 201));
        }

        break;
    case '2':
        // View Data
        $user_data = $data->viewData("user", "", "");
        foreach ($user_data as $user) {
            ?>
<tr>
    <td><?=$user['name'];?></td>
    <td><?=$user['age'];?></td>
    <td><?=$user['email'];?></td>
    <td>
        <a class="edit" title="Edit" id="edit" data-id="<?=$user['id'];?>" data-name="<?=$user['name'];?>"
            data-age="<?=$user['age'];?>" data-email="<?=$user['email'];?>"><i class="material-icons">&#xE254;</i></a>
        <a class="delete" id="delete" onclick="get_delete(<?=$user['id'];?>)" title="Delete"><i
                class="material-icons">&#xE872;</i></a>
    </td>
</tr>
<?php
}
        break;
    case '3':
        // Update data
        $id = $_POST["id"];
        $name = $_POST["name"];
        $age = $_POST["age"];
        $email = $_POST["email"];
        $arrayName = array('name' => $name, 'age' => $age, 'email' => $email);
        if ($data->updateData("user", $arrayName, $id)) {
            echo json_encode(array("statusCode" => 200));
        } else {
            echo json_encode(array("statusCode" => 201));
        }
        break;
    case '4':
        // Delete Data
        $id = $_POST["id"];
        if ($data->deleteData("user", "id", "$id")) {
            echo json_encode(array("statusCode" => 200));
        } else {
            echo json_encode(array("statusCode" => 201));
        }
        break;

    default:
        echo "Something went wrong!";
        break;
}