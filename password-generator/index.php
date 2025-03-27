<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Generator</title>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js" defer></script>
</head>
<body>

    <!-- Hero Section -->
    <header class="hero">
        <div class="hero-content">
            <h1>Secure Password Generator</h1>
            <p>Generate strong and secure passwords instantly. Protect your accounts with industry-standard encryption.</p>
            <a href="#generator" class="btn">Generate Now</a>
        </div>
        <img src="pass.jpg" alt="Secure Password" class="hero-image">
    </header>

    <!-- Main Content -->
    <div class="container" id="generator">
        <h2>Generate a Strong Password</h2>
        <form action="generate.php" method="POST">
            <label for="length">Password Length:</label>
            <input type="number" name="length" id="length" min="8" max="50" value="12" required>
            <button type="submit">Generate Password</button>
        </form>

        <!-- Display the generated password and Copy button -->
        <?php
        if (isset($_GET['password'])) {
            echo '<p>Generated Password: <strong id="generated-password">' . htmlspecialchars($_GET['password']) . '</strong></p>';
            echo '<p id="strength-text">Strength: <span id="strength-result"></span></p>';
            echo '<button id="copy-button">Copy to Clipboard</button>';
        }
        ?>

        <br>
        <a href="history.php"><button>View History</button></a>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Password Generator. All rights reserved.</p>
    </footer>

</body>
</html>
