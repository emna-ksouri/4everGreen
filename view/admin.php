<?php
session_start();
include '../config/connexion.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
<?php
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: index.php');
    exit;
}

function displayTable($conn, $tableName) {
    $sql = "SELECT * FROM $tableName";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>$tableName Table</h2>";
        echo "<table border='1'>";
        echo "<tr>";
        $fields = $result->fetch_fields();
        foreach ($fields as $field) {
            echo "<th>" . $field->name . "</th>";
        }
        echo "<th>Actions</th>";
        echo "</tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $key => $value) {
                echo "<td>" . $value . "</td>";
            }
            echo "<td>
                    <form action='modify.php' method='post'>
                        <input type='hidden' name='table' value='$tableName'>
                        <input type='hidden' name='id' value='".$row[$fields[0]->name]."'>
                        <button type='submit' name='action' value='edit'>Edit</button>
                    </form>
                    <form action='delete.php' method='post'>
                        <input type='hidden' name='table' value='$tableName'>
                        <input type='hidden' name='id' value='".$row[$fields[0]->name]."'>
                        <button type='submit' name='action' value='delete'>Delete</button>
                    </form>
                  </td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
}

// Display all tables
$tables = array("admin", "greenspace", "greenspacemembers", "interactionpost", "plants", "plantstasks", "posts", "users");

foreach ($tables as $table) {
    displayTable($conn, $table);
}

$conn->close();
?>
</body>
</html>
