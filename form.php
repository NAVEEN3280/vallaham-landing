<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $servername = "localhost"; // your server
    $username = "root"; // your database username
    $password = "root"; // your database password
    $dbname = "form-details"; // your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO form_details (name, email, mobile, dateOfBirth, address, education, occupation, work, experience, finance, sponsorship, income, course, institution, course_fee, start_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssssssss", $name, $email, $mobile, $dateOfBirth, $address, $education, $occupation, $work, $experience, $finance, $sponsorship, $income, $course, $institution, $course_fee, $start_date);

    // Set parameters and execute
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $address = $_POST['address'];
    $education = $_POST['education'];
    $occupation = $_POST['occupation'];
    $work = $_POST['work'];
    $experience = $_POST['experience'];
    $finance = $_POST['finance'];
    $sponsorship = $_POST['sponsorship'];
    $income = $_POST['income'];
    $course = $_POST['course'];
    $institution = $_POST['institution'];
    $course_fee = $_POST['course_fee'];
    $start_date = $_POST['start_date'];

    // Execute the statement
    $stmt->execute();
    echo "New record created successfully";

    // Close connections
    $stmt->close();
    $conn->close();
}
?>
