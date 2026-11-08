<?php
$errors = [];
$values = ['name'=>'','roll'=>'','class'=>'','section'=>''];
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach (['name','roll','class','section'] as $f) {
        $values[$f] = trim($_POST[$f] ?? '');
        if (empty($values[$f])) {
            $errors[$f] = ucfirst($f) . " is required.";
        }
    }
    if (empty($errors)) {
        $success = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Registration</title>
  <style>
    body { font-family: Arial, sans-serif; padding: 2rem; background: #f5f5f5; }
    .card { max-width: 450px; margin: 0 auto; background: #fff; padding: 1.5rem; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,.1); }
    h2 { text-align: center; }
    label { display: block; margin-top: .8rem; font-weight: bold; }
    input { width: 100%; padding: .5rem; margin-top: .3rem; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
    .err { color: red; font-size: .85rem; margin-top: .2rem; }
    button { margin-top: 1rem; padding: .6rem 1.2rem; background: #2F6F6D; color: #fff; border: none; border-radius: 4px; cursor: pointer; }
    .success { background: #e8f5e9; border: 1px solid #a5d6a7; padding: 1rem; border-radius: 6px; margin-top: 1rem; }
  </style>
</head>
<body>
  <div class="card">
    <h2>Student Registration</h2>
    <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
      <label>Name</label>
      <input type="text" name="name" value="<?= htmlspecialchars($values['name']) ?>">
      <?php if (isset($errors['name'])): ?><div class="err"><?= $errors['name'] ?></div><?php endif; ?>

      <label>Roll #</label>
      <input type="text" name="roll" value="<?= htmlspecialchars($values['roll']) ?>">
      <?php if (isset($errors['roll'])): ?><div class="err"><?= $errors['roll'] ?></div><?php endif; ?>

      <label>Class</label>
      <input type="text" name="class" value="<?= htmlspecialchars($values['class']) ?>">
      <?php if (isset($errors['class'])): ?><div class="err"><?= $errors['class'] ?></div><?php endif; ?>

      <label>Section</label>
      <input type="text" name="section" value="<?= htmlspecialchars($values['section']) ?>">
      <?php if (isset($errors['section'])): ?><div class="err"><?= $errors['section'] ?></div><?php endif; ?>

      <button type="submit">Register</button>
    </form>

    <?php if ($success): ?>
      <div class="success">
        <h3>Registration Successful</h3>
        <p><strong>Name:</strong> <?= htmlspecialchars($values['name']) ?></p>
        <p><strong>Roll #:</strong> <?= htmlspecialchars($values['roll']) ?></p>
        <p><strong>Class:</strong> <?= htmlspecialchars($values['class']) ?></p>
        <p><strong>Section:</strong> <?= htmlspecialchars($values['section']) ?></p>
      </div>
    <?php endif; ?>
  </div>
</body>
</html>
