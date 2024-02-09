<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "fWewh8U6ytbp.ZaN", "try");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $pname = $_POST['pname'];
    $price = $_POST['price'];
    $color = $_POST['color'];
    $sql = "INSERT INTO products (pname, price, color) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $pname, $price, $color);
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>