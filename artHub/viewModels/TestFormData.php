<?php
$f_name = $l_name = $email = $password = $phone = "";

echo $f_name;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $f_name = validateInput($_POST["f_name"]);
    $l_name = validateInput($_POST["l_name"]);
    $email = validateInput($_POST["email"]);
    $password = validateInput($_POST["password"]);
    $phone = validateInput($_POST["phone"]);
}

function validateInput($data) {
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>