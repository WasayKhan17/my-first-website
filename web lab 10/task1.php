<?php
$studentName = "Abdul Wasay Khan";
$rollNo = "24CS051";
$subjects = [
    "Web Engineering" => 88,
    "Database Systems" => 76,
    "Operating Systems" => 92,
    "Computer Networks" => 65,
];

$total = array_sum($subjects);
$maxTotal = count($subjects) * 100;
$percentage = ($total / $maxTotal) * 100;

if ($percentage >= 90) {
    $grade = "A+";
} elseif ($percentage >= 80) {
    $grade = "A";
} elseif ($percentage >= 70) {
    $grade = "B";
} elseif ($percentage >= 60) {
    $grade = "C";
} elseif ($percentage >= 50) {
    $grade = "D";
} else {
    $grade = "F";
}

$status = ($percentage >= 50) ? "Pass" : "Fail";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Marksheet</title>
  <style>
    body { font-family: Arial, sans-serif; padding: 2rem; background: #f5f5f5; }
    .card { max-width: 600px; margin: 0 auto; background: #fff; padding: 1.5rem; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,.1); }
    h2 { text-align: center; margin-bottom: 1rem; }
    table { width: 100%; border-collapse: collapse; margin-top: 1rem; }
    th, td { border: 1px solid #ccc; padding: .6rem; text-align: left; }
    th { background: #eee; }
    .summary { margin-top: 1rem; }
    .grade { font-weight: bold; color: #2F6F6D; }
  </style>
</head>
<body>
  <div class="card">
    <h2>Student Marksheet</h2>
    <p><strong>Name:</strong> <?= htmlspecialchars($studentName) ?></p>
    <p><strong>Roll No:</strong> <?= htmlspecialchars($rollNo) ?></p>

    <table>
      <tr>
        <th>Subject</th>
        <th>Marks (out of 100)</th>
      </tr>
      <?php foreach ($subjects as $sub => $marks): ?>
        <tr>
          <td><?= htmlspecialchars($sub) ?></td>
          <td><?= (int)$marks ?></td>
        </tr>
      <?php endforeach; ?>
      <tr>
        <th>Total</th>
        <th><?= $total ?> / <?= $maxTotal ?></th>
      </tr>
    </table>

    <div class="summary">
      <p><strong>Percentage:</strong> <?= number_format($percentage, 2) ?>%</p>
      <p><strong>Grade:</strong> <span class="grade"><?= $grade ?></span></p>
      <p><strong>Status:</strong> <?= $status ?></p>
    </div>
  </div>
</body>
</html>
