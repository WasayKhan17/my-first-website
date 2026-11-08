<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Multiplication Matrix</title>
</head>
<body>
  <h2>6x5 Multiplication Matrix</h2>
  <table border="1" cellpadding="3px" cellspacing="0px">
    <?php for ($row = 1; $row <= 6; $row++): ?>
      <tr>
        <?php for ($col = 1; $col <= 5; $col++): ?>
          <td><?= $row . " * " . $col . " = " . ($row * $col) ?></td>
        <?php endfor; ?>
      </tr>
    <?php endfor; ?>
  </table>
</body>
</html>
