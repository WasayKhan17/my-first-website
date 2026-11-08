<?php
$num = '';
$result = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $num = intval($_POST['num'] ?? 0);
    for ($i = 1; $i <= 10; $i++) {
        $result .= $num . " * " . $i . " = " . ($num * $i) . "<br>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Multiplication Table</title>
  <style>
    body{font-family:Arial,sans-serif;padding:2rem;background:#f5f5f5;}
    .card{max-width:400px;margin:0 auto;background:#fff;padding:1.5rem;border-radius:8px;box-shadow:0 2px 8px rgba(0,0,0,.1);}
    label{display:block;margin-top:.8rem;font-weight:bold;}
    input{width:100%;padding:.5rem;margin-top:.3rem;border:1px solid #ccc;border-radius:4px;box-sizing:border-box;}
    button{margin-top:1rem;padding:.6rem 1.2rem;background:#2F6F6D;color:#fff;border:none;border-radius:4px;cursor:pointer;}
    .out{margin-top:1rem;padding:1rem;background:#e8f5e9;border-radius:6px;}
  </style>
</head>
<body>
  <div class="card">
    <h2>Multiplication Table</h2>
    <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
      <label>Enter a number</label>
      <input type="number" name="num" value="<?= htmlspecialchars($num) ?>" required>
      <button type="submit">Generate Table</button>
    </form>
    <?php if ($result !== ''): ?>
      <div class="out"><?= $result ?></div>
    <?php endif; ?>
  </div>
</body>
</html>
