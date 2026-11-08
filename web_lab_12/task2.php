<?php
$conn = mysqli_connect("localhost", "root", "", "mydatabase");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$result = mysqli_query($conn, "SELECT * FROM student_marks");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Marks</title>
  <style>
    body{font-family:Arial,sans-serif;padding:2rem;background:#f5f5f5;}
    table{border-collapse:collapse;width:100%;max-width:700px;margin:0 auto;background:#fff;}
    th,td{border:1px solid #ccc;padding:.6rem;text-align:left;}
    th{background:#eee;}
  </style>
</head>
<body>
  <h2 style="text-align:center;">Student Marks</h2>
  <table>
    <tr>
      <th>Name</th>
      <th>Web Engineering Marks</th>
      <th>Database Systems Marks</th>
      <th>Grade</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <tr>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= (int)$row['web_engineering'] ?></td>
        <td><?= (int)$row['database_systems'] ?></td>
        <td><?= htmlspecialchars($row['grade']) ?></td>
      </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>
<?php mysqli_free_result($result); mysqli_close($conn); ?>
