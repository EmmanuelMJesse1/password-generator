<?php
include 'database.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $length = isset($_POST['length']) ? intval($_POST['length']) : 12;

    // Ensure password length meets industry standards (minimum 8)
    if ($length < 8) {
        $length = 8;
    }

    function generatePassword($length) {
        $lowercase = 'abcdefghijklmnopqrstuvwxyz';
        $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numbers = '0123456789';
        $symbols = '!@#$%^&*()-_+=<>?';

        // Ensure at least one of each required character type
        $password = $lowercase[random_int(0, 25)] .
                    $uppercase[random_int(0, 25)] .
                    $numbers[random_int(0, 9)] .
                    $symbols[random_int(0, strlen($symbols) - 1)];

        // Fill the rest of the password randomly
        $allChars = $lowercase . $uppercase . $numbers . $symbols;
        for ($i = 4; $i < $length; $i++) {
            $password .= $allChars[random_int(0, strlen($allChars) - 1)];
        }

        // Shuffle the password to remove predictable patterns
        return str_shuffle($password);
    }

    // Generate the password
    $generatedPassword = generatePassword($length);

    // Save the password to the database
    $stmt = $conn->prepare("INSERT INTO passwords (generated_password) VALUES (?)");
    $stmt->bind_param("s", $generatedPassword);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    // Redirect back to index.php with the generated password
    header("Location: index.php?password=" . urlencode($generatedPassword));
    exit();
}
?>
