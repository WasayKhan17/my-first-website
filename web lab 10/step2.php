<?php
// step2.php
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_POST['username']) || empty($_POST['email'])) {
    header('Location: step1.php');
    exit;
}
$username = htmlspecialchars($_POST['username']);
$email = htmlspecialchars($_POST['email']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Step 2 - Review</title>
  <style>
    body{font-family:Arial,sans-serif;padding:2rem;background:#f5f5f5;}
    .card{max-width:400px;margin:0 auto;background:#fff;padding:1.5rem;border-radius:8px;box-shadow:0 2px 8px rgba(0,0,0,.1);}
    p{margin:.5rem 0;}
    button,a.btn{display:inline-block;margin-top:1rem;padding:.6rem 1.2rem;background:#2F6F6D;color:#fff;border:none;border-radius:4px;cursor:pointer;text-decoration:none;}
    .btn-secondary{background:#888;}
  </style>
</head>
<body>
  <div class="card">
    <h2>Step 2: Review Your Data</h2>
    <p><strong>Username:</strong> <?= $username ?></p>
    <p><strong>Email:</strong> <?= $email ?></p>
    <form method="post" action="step3.php" style="display:inline;">
      <input type="hidden" name="username" value="<?= $username ?>">
      <input type="hidden" name="email" value="<?= $email ?>">
      <button type="submit">Submit Form</button>
    </form>
    <a class="btn btn-secondary" href="step1.php">Modify Data</a>
  </div>
</body>
</html>
