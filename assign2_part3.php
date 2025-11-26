<!DOCTYPE html>
<html>
<body>

<h2>Process Grades for 5 Students</h2>

<form method="post">
  <?php
  // Generate input fields for 5 students, each with 3 exam scores
  for ($i = 1; $i <= 5; $i++) {
      echo "<h3>Student $i</h3>";
      echo "Score 1: <input type='number' name='score{$i}_1' required><br>";
      echo "Score 2: <input type='number' name='score{$i}_2' required><br>";
      echo "Score 3: <input type='number' name='score{$i}_3' required><br><br>";
  }
  ?>
  <input type="submit" value="Calculate Results">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Loop through each student
    for ($i = 1; $i <= 5; $i++) {
        $score1 = $_POST["score{$i}_1"];
        $score2 = $_POST["score{$i}_2"];
        $score3 = $_POST["score{$i}_3"];

        // Calculate average
        $average = ($score1 + $score2 + $score3) / 3;

        // Display results
        echo "<h3>Results for Student $i</h3>";
        echo "Scores: $score1, $score2, $score3<br>";
        echo "Average: $average<br><br>";
    }
}
?>
</body>
</html>