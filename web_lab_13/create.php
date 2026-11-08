<?php
include 'db.php';
$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $roll = trim($_POST['roll_number'] ?? '');
    if ($name === '' || $email === '' || $roll === '') {
        $msg = 'All fields are required.';
    } else {
        $name = mysqli_real_escape_string($conn, $name);
        $email = mysqli_real_escape_string($conn, $email);
        $roll = mysqli_real_escape_string($conn, $roll);
        $sql = "INSERT INTO users (name, email, roll_number) VALUES ('$name', '$email', '$roll')";
        if (mysqli_query($conn, $sql)) {
            mysqli_close($conn);
            header('Location: index.php');
            exit;
        } else {
            $msg = 'Error: ' . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add User</title>
  <style>
    body{font-family:Arial,sans-serif;padding:2rem;background:#f5f5f5;}
    .card{max-width:450px;margin:0 auto;background:#fff;padding:1.5rem;border-radius:8px;box-shadow:0 2px 8px rgba(0,0,0,.1);}
    label{display:block;margin-top:.8rem;font-weight:bold;}
    input{width:100%;padding:.5rem;margin-top:.3rem;border:1px solid #ccc;border-radius:4px;box-sizing:border-box;}
    button{margin-top:1rem;padding:.6rem 1.2rem;background:#2F6F6D;color:#fff;border:none;border-radius:4px;cursor:pointer;}
    .msg{margin-top:1rem;padding:1rem;border-radius:6px;background:#ffebee;color:#c62828;}
  </style>
</head>
<body>
  <div class="card">
    <h2>Add New User</h2>
    <?php if ($msg !== ''): ?><div class="msg"><?= htmlspecialchars($msg) ?></div><?php endif; ?>
    <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
      <label>Name</label>
      <input type="text" name="name" required>
      <label>Email</label>
      <input type="email" name="email" required>
      <label>Roll Number</label>
      <input type="text" name="roll_number" required>
      <button type="submit">Submit</button>
    </form>
    <p><a href="index.php">Back to list</a></p>
  </div>
</body>
</html>
<?php if (isset($conn)) mysqli_close($conn); ?>
