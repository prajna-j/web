<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../db/db.class.php';
$dbconn = new DB();

if (isset($_POST["command"])) {

    $command = ($_POST["command"]);
    if ($command == "userRegistration") {
        $name = $_POST["name"];
        $contactno = $_POST["contactno"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $username = $_POST["username"];
        $password = $_POST["password"];

//        $isexist=isUserExistAllready();

        $str = "INSERT INTO userInfo(user_name,contactno,emailId,address,username,pwd) "
                . "VALUES('$name','$contactno','$email','$address','$username','$password')";
        $id = $dbconn->executeInsertAndGetId($str);

        if ($id > 0) {
            $message["success"] = true;
            $message["mes"] = "Registered successfully";
        } else {
            $message["success"] = false;
            $message["mes"] = "Something went wrong";
        }

        echo json_encode($message);
    } elseif ($command == "userLogin") {

        $username = $_POST['username'];
        $password = $_POST['password'];

        $str = "SELECT * FROM userinfo WHERE username='$username'";
        $result = $dbconn->executeSelect($str);
        if (count($result) != 0) {
            if ($result[0]["pwd"] == $password) {
                session_start();
                $_SESSION['userid'] = $result[0]["userRid"];
                $message["success"] = true;
            } else {
                $message["success"] = false;
                $message["mes"] = "Incorrect Password";
            }
        } else {
            $message["success"] = false;
            $message["mes"] = "Username Not Found";
        }
        echo json_encode($message);
    } elseif ($command == "addCar") {

        $brandname = $_POST["brandname"];
        $modelname = $_POST["modelname"];
        $year = $_POST["year"];
        $fueltype = $_POST["fueltype"];
        $runkm = $_POST["runkm"];
        $description = $_POST["description"];
        $carimage = uploadFile('carimage');
        $userID = $_POST["sessionID"];
        $price = $_POST["price"];

        $str = "INSERT INTO carinfo(brandname,modelname,caryear,fueltype,drivenkm,description,image,caruserID,price)"
                . " VALUES('$brandname','$modelname','$year','$fueltype','$runkm','$description','$carimage','$userID',$price)";
        $result = $dbconn->executeInsertAndGetId($str);
        if ($result != 0) {
            $message["success"] = true;
            $message["mes"] = "Car Stored Successfully";
        } else {
            $message["success"] = false;
            $message["mes"] = "Error...Please Try Later";
        }
        echo json_encode($message);
    } elseif ($command == "carorder") {
        $carid = $_POST["carid"];
        $message["success"] = true;
    }
}

function uploadFile($fieldName) {

    $fielUploadPath = '../uploads/';

    $uploadedFileType = strtolower(pathinfo($_FILES[$fieldName]['name'], PATHINFO_EXTENSION));  // .txt

    $fileName = uniqid(rand()); // hghghg3434gfgfd6757

    $fileName = $fileName . "." . $uploadedFileType;    // hghghg3434gfgfd6757.txt

    $fullUploadPath = $fielUploadPath . $fileName;    // uploads/hghghg3434gfgfd6757.txt

    $acceptedFileTypes = array('jpg', 'jpeg', 'png');

    if (in_array($uploadedFileType, $acceptedFileTypes)) {
        if (is_uploaded_file($_FILES[$fieldName]['tmp_name']) &&
                move_uploaded_file($_FILES[$fieldName]['tmp_name'], $fullUploadPath)) {
            return $fileName;
        } else {
            throw new Exception("An error occurred while uploading file. Please try again");
        }
    } else {
        throw new Exception("Please upload valid JPG or PNG image");
    }
}
