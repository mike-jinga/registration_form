
<?php

require_once __DIR__ . '/vendor/autoload.php';
use MongoDB\Client as MongoClient;

$mongoClient = new MongoClient("mongodb://localhost:27017");
$collection = $mongoClient->database_name->users;

$errors = [];
$formData = [];

// form data
$formData['name'] = $_POST['name'] ?? '';
$formData['surname'] = $_POST['surname'] ?? '';
$formData['idNumber'] = $_POST['idNumber'] ?? '';
$formData['dob'] = $_POST['dob'] ?? '';

// Requirements
if (!preg_match('/^[a-zA-Z ]+$/', $formData['name'])) {
    $errors['nameError'] = "Name can only contain letters and spaces.";
}

if (!preg_match('/^[a-zA-Z ]+$/', $formData['surname'])) {
    $errors['surnameError'] = "Surname can only contain letters and spaces.";
}

if (!is_numeric($formData['idNumber']) || strlen($formData['idNumber']) !== 13) {
    $errors['idNumberError'] = "ID Number must be a 13-digit numeric value.";
}

$dobDateTime = DateTime::createFromFormat('d/m/Y', $formData['dob']);
if (!$dobDateTime || $dobDateTime->format('d/m/Y') !== $formData['dob']) {
    $errors['dobError'] = "Date of Birth must be in the format dd/mm/YYYY.";
}


if ($collection->countDocuments(['idNumber' => $formData['idNumber']]) > 0) {
    $errors['idNumberError'] = "Duplicate ID Number found.";
}

// Handling errors
if (!empty($errors)) {
    $redirectParams = array_merge($errors, $formData);
    header('Location: index.php?' . http_build_query($redirectParams));
    exit;
}

// If no errors, insert into MongoDB 
$formattedDob = $dobDateTime->format('Y-m-d');
$collection->insertOne([
    'name' => $formData['name'],
    'surname' => $formData['surname'],
    'idNumber' => $formData['idNumber'],
    'dob' => $formattedDob,
]);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submission Successful</title>
    <link rel="stylesheet" href="submit.css">
</head>
<body>
    <div class="success-container">
        <div class="success-icon">&#x2714; </div>
        <div class="success-message">Registration successful!</div>
        <button class="success-button" onclick="window.location.href='index.php'">Return to Form</button>
    </div>
</body>
</html>
