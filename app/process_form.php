<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "pet_care_vet";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {    
    // Debug statement: Check if the script reaches this point
    echo "Processing form submission...<br>";

    // Set parameters for petowners table
    $owner_name = isset($_POST['owner-name']) ? $_POST['owner-name'] : '';
    $owner_email = isset($_POST['owner-email']) ? $_POST['owner-email'] : '';
    $owner_phone = isset($_POST['owner-number']) ? $_POST['owner-number'] : '';

    // Debug statements: Check the values of owner_name, owner_email, and owner_phone
    echo "Owner Name: $owner_name<br>";
    echo "Owner Email: $owner_email<br>";
    echo "Owner Phone: $owner_phone<br>";

    // Validate form data
    $errors = [];
    if (!isset($_POST['appointment-type']) || ($_POST['appointment-type'] !== "medical-appt" && $_POST['appointment-type'] !== "grooming")) {
        $errors[] = "Invalid appointment type";
    }
    if (empty($_POST['pet-type'])) {
        $errors[] = "Pet type is required";
    }
    if (empty($_POST['pet-name'])) {
        $errors[] = "Pet name is required";
    }
    if (empty($owner_name)) {
        $errors[] = "Owner name is required";
    }
    if (empty($owner_phone)) {
        $errors[] = "Phone number is required";
    }
    if (empty($owner_email)) {
        $errors[] = "Email is required";
    }
    if (empty($_POST['appointment-date'])) {
        $errors[] = "Appointment date is required";
    }
    if (empty($_POST['appointment-time'])) {
        $errors[] = "Appointment time is required";
    }

    // If there are validation errors, output them
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
        exit; // Stop further execution
    }

    // Prepare and bind parameters for appointments table
    $stmt = $conn->prepare("INSERT INTO appointments (appointment_type, pet_type, pet_name, owner_name, appointment_date, appointment_time, phone_no, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $appointment_type, $pet_type, $pet_name, $owner_name, $appointment_date, $appointment_time, $owner_phone, $owner_email);

    // Set parameters for appointments table
    $appointment_type = $_POST['appointment-type'];
    $pet_type = $_POST['pet-type'];
    $pet_name = $_POST['pet-name'];
    $appointment_date = $_POST['appointment-date'];
    $appointment_time = $_POST['appointment-time'];

    // Execute SQL for appointments table
    $stmt->execute();

    // Close statement for appointments table
    $stmt->close();

    // Close connection
    $conn->close();

    // Redirect to index.html with success status
    header("Location: index.php?status=success");
    exit();
}
