<?php
//DATABASE Connection  
$conn = new mysqli('localhost','root','','denvier');
if($conn->connect_error) {
    die('Connection Failed : '.$conn->connect_error);
} else {
    $stmt = $conn->prepare("SELECT FirstName, LastName, Gender, Number FROM lists");
    $stmt->execute();
    $stmt->bind_result($FirstName, $LastName, $Gender, $Number);
?>

<!DOCTYPE html>
<html>
<head>
    <title>SQL Query Result</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Number</th>
            </tr>
        </thead>
        <tbody>
            <?php while($stmt->fetch()): ?>
            <tr>
                <td><?php echo $FirstName; ?></td>
                <td><?php echo $LastName; ?></td>
                <td><?php echo $Gender; ?></td>
                <td><?php echo $Number; ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>

<?php
    $stmt->close();
    $conn->close();
}
?>
