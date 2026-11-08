<?php
include 'db.php';
$result = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Users</title>
  <style>
    body{font-family:Arial,sans-serif;padding:2rem;background:#f5f5f5;}
    .container{max-width:900px;margin:0 auto;background:#fff;padding:1.5rem;border-radius:8px;box-shadow:0 2px 8px rgba(0,0,0,.1);}
    table{border-collapse:collapse;width:100%;margin-top:1rem;}
    th,td{border:1px solid #ccc;padding:.6rem;text-align:left;}
    th{background:#eee;}
    .btn{display:inline-block;padding:.4rem .8rem;background:#2F6F6D;color:#fff;text-decoration:none;border-radius:4px;margin-right:.3rem;}
    .btn-danger{background:#c62828;}
    .top{margin-bottom:1rem;}
  </style>
</head>
<body>
  <div class="container">
    <h2>Users</h2>
    <div class="top"><a class="btn" href="create.php">Add New User</a></div>
    <table>
      <tr>
        <th>ID</th><th>Name</th><th>Email</th><th>Roll Number</th><th>Actions</th>
      </tr>
      <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
          <td><?= (int)$row['id'] ?></td>
          <td><?= htmlspecialchars($row['name']) ?></td>
          <td><?= htmlspecialchars($row['email']) ?></td>
          <td><?= htmlspecialchars($row['roll_number']) ?></td>
          <td>
            <a class="btn" href="update.php?id=<?= (int)$row['id'] ?>">Edit</a>
            <a class="btn btn-danger" href="delete.php?id=<?= (int)$row['id'] ?>" onclick="return confirm('Delete?')">Delete</a>
          </td>
        </tr>
      <?php endwhile; ?>
    </table>
  </div>
</body>
</html>
<?php mysqli_free_result($result); mysqli_close($conn); ?>
