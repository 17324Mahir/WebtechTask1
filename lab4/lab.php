<?php
$name = $_POST["name"];
$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];
$confirm = $_POST["confirm"];
$age = $_POST["age"];
$gender = $_POST["gender"] ?? "";
$course = $_POST["course"];
$terms = isset($_POST["terms"]);
$errors = [];

if (empty($name)) {
    $errors[] = "Name required";
} elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
    $errors[] = "Name only letters";
}

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email";
}

if (strlen($username) < 5) {
    $errors[] = "Username must be 5+ chars";
}

if (strlen($password) < 6) {
    $errors[] = "Password must be 6+ chars";
}

if ($password != $confirm) {
    $errors[] = "Passwords do not match";
}

if ($age < 18) {
    $errors[] = "Age must be 18+";
}

if (empty($gender)) {
    $errors[] = "Select gender";
}

if (empty($course)) {
    $errors[] = "Select course";
}

if (!$terms) {
    $errors[] = "Accept terms";
}

if (!empty($errors)) {
    echo "<h3>Errors:</h3>";
    foreach ($errors as $e) {
        echo $e . "<br>";
    }
} else {
    echo "<h2>Registration Successful!</h2>";
    echo "Name: $name <br>";
    echo "Email: $email <br>";
    echo "Username: $username <br>";
    echo "Age: $age <br>";
    echo "Gender: $gender <br>";
    echo "Course: $course <br>";
}
?>
