<!-- registration_submit.php -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    $gender = $_POST['gender'];
    $skills = isset($_POST['skills']) ? $_POST['skills'] : [];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $code = $_POST['code'];

    // $errors = [];

    // Validate first name
    if (empty($first_name)) {
        $errors[] = "First Name is required.";
    } elseif (!preg_match("/^[a-zA-Z]+$/", $first_name)) {
        $errors[] = "First Name can only contain letters.";
    }

    // Validate last name
    if (empty($last_name)) {
        $errors[] = "Last Name is required.";
    } elseif (!preg_match("/^[a-zA-Z]+$/", $last_name)) {
        $errors[] = "Last Name can only contain letters.";
    }

    // Validate username
    if (empty($username)) {
        $errors[] = "Username is required.";
    } elseif (strlen($username) < 8) {
        $errors[] = "Username must be at least 8 characters long.";
    }

    // Validate password
    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $password)) {
        $errors[] = "Password must be at least 8 characters and include at least one uppercase letter, one lowercase letter, one number, and one special character.";
    }

    // Validate the other fields
    if (empty($address)) $errors[] = "Address is required.";
    if (empty($country)) $errors[] = "Country is required.";
    if (empty($gender)) $errors[] = "Gender is required.";
    if (empty($code) || $code != "Sh68Sa") $errors[] = "Invalid code.";

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
        echo "<p><a href='registration.php'>Go back</a></p>";
    } else {
        echo "<h2>Submitted Information</h2>";
        echo "<p><strong>First Name:</strong> $first_name</p>";
        echo "<p><strong>Last Name:</strong> $last_name</p>";
        echo "<p><strong>Address:</strong> $address</p>";
        echo "<p><strong>Country:</strong> $country</p>";
        echo "<p><strong>Gender:</strong> $gender</p>";
        echo "<p><strong>Skills:</strong> " . implode(", ", $skills) . "</p>";
        echo "<p><strong>Username:</strong> $username</p>";
        echo "<p><strong>Department:</strong> OpenSource</p>";
    }
} else {
    echo "<p>Invalid request.</p>";
    echo "<p><a href='registration.php'>Go back</a></p>";
}
?>
