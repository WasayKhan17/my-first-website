<?php
$conn = mysqli_connect("localhost", "root", "", "mydatabase");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$roll = '';
$result = null;
$searched = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $roll = mysqli_real_escape_string($conn, trim($_POST['roll_number'] ?? ''));
    $sql = "SELECT * FROM students WHERE roll_number = '$roll'";
    $result = mysqli_query($conn, $sql);
    $searched = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search Student</title>
  <style>
    body{font-family:Arial,sans-serif;padding:2rem;background:#f5f5f5;}
    .card{max-width:450px;margin:0 auto;background:#fff;padding:1.5rem;border-radius:8px;box-shadow:0 2px 8px rgba(0,0,0,.1);}
    label{display:block;margin-top:.8rem;font-weight:bold;}
    input{width:100%;padding:.5rem;margin-top:.3rem;border:1px solid #ccc;border-radius:4px;box-sizing:border-box;}
    button{margin-top:1rem;padding:.6rem 1.2rem;background:#2F6F6D;color:#fff;border:none;border-radius:4px;cursor:pointer;}
    .out{margin-top:1rem;padding:1rem;border-radius:6px;background:#e8f5e9;}
    .err{margin-top:1rem;padding:1rem;border-radius:6px;background:#ffebee;color:#c62828;}
  </style>
</head>
<body>
  <div class="card">
    <h2>Search Student by Roll Number</h2>
    <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
      <label>Student Roll Number</label>
      <input type="text" name="roll_number" value="<?= htmlspecialchars($roll) ?>" required>
      <button type="submit">Search</button>
    </form>
    <?php if ($searched): ?>
      <?php if ($result && mysqli_num_rows($result) > 0): ?>
        <?php $row = mysqli_fetch_assoc($result); ?>
        <div class="out">
          <p><strong>Name:</strong> <?= htmlspecialchars($row['name']) ?></p>
          <p><strong>Roll Number:</strong> <?= htmlspecialchars($row['roll_number']) ?></p>
          <p><strong>Section:</strong> <?= htmlspecialchars($row['section']) ?></p>
        </div>
      <?php else: ?>
        <div class="err">No record found.</div>
      <?php endif; ?>
    <?php endif; ?>
  </div>
</body>
</html>
<?php if ($result) mysqli_free_result($result); mysqli_close($conn); ?>
