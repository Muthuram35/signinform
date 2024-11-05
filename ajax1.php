<?php 

require("dbconfig.php");
session_start();    
extract($_REQUEST);

if(isset($action) && $action == "signup") {

    $select = " SELECT * FROM register WHERE email = '$email' ";
    
    $res  = mysqli_query($conn, $select);

    $row = mysqli_fetch_array($res);

    if(mysqli_num_rows($res) == 0){ 

    $sql = " INSERT INTO `register` ( name , email , password ) VALUES ( '$name','$email','$password' ) ";

    $result = mysqli_query($conn, $sql);

    if($result){
        echo json_encode(["status"=> "success","msg"=> "Register Successfully"]);
    }

    }else{

        echo json_encode(["status"=> "error","msg"=> "email already exsist"]);
    }
}

// login check
if(isset($action) && $action == "login") {

    $select = " SELECT * FROM register WHERE email = '$email' AND password = '$password' ";

    $res = mysqli_query($conn , $select);

    if(mysqli_num_rows($res) > 0){
        echo json_encode(["status"=> "success","msg"=> "login Successfully"]);
    }else{
        echo json_encode(["status"=> "error","msg"=> "Please Check cridential"]);
    }

}

if(isset($action) && $action == "view") {
   
    $viewsql  = "SELECT * from register";
    $res = mysqli_query($conn, $viewsql);
    $row = mysqli_fetch_all($res);

    echo json_encode($row);
}

if( isset($action) && $action == "viewid") {

    $viewidsql  = " SELECT * FROM  register WHERE id = $id ";
    $res  = mysqli_query($conn,$viewidsql);
    $row  = mysqli_fetch_array( $res );

    echo json_encode($row);

}

if( isset($action) && $action == "delete") {


    $deletesql = " DELETE  FROM  register WHERE id = $id ";

    $res = mysqli_query($conn, $deletesql);

    if($res) {
        echo json_encode(["status"=> "success","msg"=> "Deleted Successfully"]);
    }

}

if( isset($action) && $action == "update") {

    if (isset($_FILES['img'])&&!empty($_FILES['img']['name'])) {

        $targetDir = "uploads/"; // Directory where images will be saved
        $targetFile = $targetDir . basename($_FILES['img']['name']);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        if (move_uploaded_file($_FILES['img']['tmp_name'], $targetFile)) {
            // If upload is successful, update the SQL statement with the image path
            $updatesql  = " UPDATE  register SET name = '$name' , email = '$email' , password = '$password', gender= '$gender', agegroup = '$agegroup' , img = '$targetFile' where id = $id ";
            $res = mysqli_query($conn, $updatesql);
            echo json_encode(["status"=> "success","msg"=> "updated Successfully"]);
        }

    }else{
        $updatesql  = " UPDATE  register SET name = '$name' , email = '$email' , password = '$password', gender= '$gender', agegroup = '$agegroup' where id = $id ";
        $res = mysqli_query($conn, $updatesql);
        echo json_encode(["status"=> "success","msg"=> "updated Successfully"]);
    }
}

    if(isset($action) && $action == "sessionout") {
    // Destroy the session
    session_destroy();
    echo 'oh';
    
    header('Location: index.php');
    exit();
    }

?>