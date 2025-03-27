<?php
include 'database.php'; // Include database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password History</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Generated Password History</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Password</th>
                <th>Created At</th>
            </tr>

            <?php
            $sql = "SELECT * FROM passwords ORDER BY created_at DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . htmlspecialchars($row["generated_password"]) . "</td>";
                    echo "<td>" . $row["created_at"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No passwords generated yet.</td></tr>";
            }
            $conn->close();
            ?>

        </table>
        <br>
        <a href="index.php"><button>Go Back</button></a>
    </div>
</body>
</html>
