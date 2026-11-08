<?php
$result = null;
$error = '';
$num = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $num = trim($_POST['num'] ?? '');
    if ($num === '' || !ctype_digit($num)) {
        $error = 'Please enter a non-negative integer.';
    } else {
        $n = (int)$num;
        $fact = 1;
        for ($i = 1; $i <= $n; $i++) {
            $fact *= $i;
        }
        $result = $fact;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Factorial Calculator</title>
  <style>
    body{font-family:Arial,sans-serif;padding:2rem;background:#f5f5f5;}
    .card{max-width:400px;margin:0 auto;background:#fff;padding:1.5rem;border-radius:8px;box-shadow:0 2px 8px rgba(0,0,0,.1);}
    label{display:block;margin-top:.8rem;font-weight:bold;}
    input{width:100%;padding:.5rem;margin-top:.3rem;border:1px solid #ccc;border-radius:4px;box-sizing:border-box;}
    button{margin-top:1rem;padding:.6rem 1.2rem;background:#2F6F6D;color:#fff;border:none;border-radius:4px;cursor:pointer;}
    .err{color:red;margin-top:.5rem;}
    .out{margin-top:1rem;padding:1rem;background:#e8f5e9;border-radius:6px;}
  </style>
</head>
<body>
  <div class="card">
    <h2>Factorial Calculator</h2>
    <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
      <label>Enter a non-negative integer</label>
      <input type="number" name="num" min="0" value="<?= htmlspecialchars($num) ?>" required>
      <button type="submit">Calculate</button>
    </form>
    <?php if ($error): ?><div class="err"><?= $error ?></div><?php endif; ?>
    <?php if ($result !== null): ?>
      <div class="out">
        <p>Factorial of <?= (int)$num ?> is <strong><?= $result ?></strong></p>
      </div>
    <?php endif; ?>
  </div>
</body>
</html>
