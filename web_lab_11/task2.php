<?php
$msg = '';
$color = '';
$num = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $num = intval($_POST['num'] ?? 0);
    if ($num % 2 == 0) {
        $msg = "$num is Even.";
        $color = 'green';
    } else {
        $msg = "$num is Odd.";
        $color = 'blue';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Even or Odd</title>
  <style>
    body{font-family:Arial,sans-serif;padding:2rem;background:#f5f5f5;}
    .card{max-width:400px;margin:0 auto;background:#fff;padding:1.5rem;border-radius:8px;box-shadow:0 2px 8px rgba(0,0,0,.1);}
    label{display:block;margin-top:.8rem;font-weight:bold;}
    input{width:100%;padding:.5rem;margin-top:.3rem;border:1px solid #ccc;border-radius:4px;box-sizing:border-box;}
    button{margin-top:1rem;padding:.6rem 1.2rem;background:#2F6F6D;color:#fff;border:none;border-radius:4px;cursor:pointer;}
    .out{margin-top:1rem;padding:1rem;border-radius:6px;font-weight:bold;}
  </style>
</head>
<body>
  <div class="card">
    <h2>Even or Odd Checker</h2>
    <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
      <label>Enter an integer</label>
      <input type="number" name="num" value="<?= htmlspecialchars($num) ?>" required>
      <button type="submit">Check</button>
    </form>
    <?php if ($msg !== ''): ?>
      <div class="out" style="color:<?= $color ?>;background:<?= $color ?>1a;"><?= $msg ?></div>
    <?php endif; ?>
  </div>
</body>
</html>
