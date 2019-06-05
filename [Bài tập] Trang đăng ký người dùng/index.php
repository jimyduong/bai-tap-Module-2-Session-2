<?php
function loadRegistrations($filename){
    $jsondata = file_get_contents($filename);
    $arr_data = json_decode($jsondata, true);
    return $arr_data;
}
function saveDataJSON($filename, $name, $email, $phone){
    try {
        $contact = array(
            'name' => $name,
            'email' => $email,
            'phone' => $phone
        );
        // converts json data into array
        $arr_data = loadRegistrations($filename);
        // Push user data to array
        array_push($arr_data, $contact);
        //Convert updated array to JSON
        $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);
        //write json data into data.json file
        file_put_contents($filename, $jsondata);
        echo "Lưu dữ liệu thành công!";
    } catch (Exception $e) {
        echo 'Lỗi: ', $e->getMessage(), "\n";
    }
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=$_POST["name"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $flag=true;

    if (empty($name)){
        echo "khong dc de trong name"."<br>";
        $flag=false;
    }if (empty($email)){
        echo "khong dc de trong email"."<br>";
        $flag=false;
    }if (empty($phone)){
        echo "khong dc de trong phone"."<br>";
        $flag=false;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo("$email is not a valid email address"."<br>");
        $flag=false;
    }
    if($flag){
        saveDataJSON("users.json",$name,$email,$phone);
    }

}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post">
    <input type="text" name="name" placeholder="name"><br><br>
    <input type="text" name="email" placeholder="email"><br><br>
    <input type="text" name="phone" placeholder="number phone"><br><br>
    <input type="submit">
</form>

</body>
</html>
