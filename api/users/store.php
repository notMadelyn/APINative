<?php
 
if($_SERVER["REQUEST_METHOD"] === "POST"){
    include("../connect.php");
 
    $json = file_get_contents('php://input');
    $data = json_decode($json);

    var_dump($data);
    
    $name = $data->name;
    $username = $data->username;
    $password = $data->password;
 
    $password = password_hash($password, PASSWORD_DEFAULT);
 
    $sql_select = "SELECT * FROM users WHERE username = '$username'";
    $result = $koneksi->query($sql_select);

    if($result->num_rows > 0){
        http_response_code(400);
        echo json_encode([
            "message" => "Gagal menambah data user. Username sudah dipakai"
        ]);
    }
    else{
        $sql = "INSERT INTO users (name, username, password) VALUES ('$name', '$username', '$password')";

        if($koneksi->query($sql) === TRUE){
            $message = "Berhasil menambah data user";
        }
        else{
            $message = "Gagal menambah data user";
        }
 
        http_response_code(200);
        
}
return json_encode([
    "message" => $message,
    "data" => [
        "name" => $name,
        "username" => $username
    ],
    "status" => 200
]);
}

// else{
//     http_response_code(405);
 
//     echo "Tidak bisa diakses selain POST";
// }
 
?>