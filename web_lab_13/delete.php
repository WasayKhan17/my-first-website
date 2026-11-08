<?php
// delete.php - Delete user
include 'db.php';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id > 0) {
    mysqli_query($conn, "DELETE FROM users WHERE id = $id");
}
mysqli_close($conn);
header('Location: index.php');
exit;
?>
