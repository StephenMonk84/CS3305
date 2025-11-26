<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Academic Probation Check</title>
</head>
<body>
  <h1>Enter Marks for 5 Subjects</h1>

  <!-- Input form -->
  <form method="post" action="">
    <label>Subject 1: <input type="number" name="scores[]" required></label><br><br>
    <label>Subject 2: <input type="number" name="scores[]" required></label><br><br>
    <label>Subject 3: <input type="number" name="scores[]" required></label><br><br>
    <label>Subject 4: <input type="number" name="scores[]" required></label><br><br>
    <label>Subject 5: <input type="number" name="scores[]" required></label><br><br>
    <button type="submit">Check Results</button>
  </form>
<?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $scores = $_POST["scores"];
        $failCount = 0;
        $average = 0;
        foreach($scores as $score){
            if($score < 50){
                $failCount++;
            }
            $average += $score;
        }
        $average /= count($scores);
    
        echo "<h2>Results</h2>";
        if($failCount > 2){
            echo "<p style='color:red; font-weight:bold;'>Student is placed on academic probation.</p>";
        } 
        else {
            echo "<p style='color:green;'>Student is in good standing.</p>";
        }
        if($average >= 50){
            echo "<p style='color:green;'>Pass</p>";
            if($average > 90 && ($scores[0]) > 95 || ($scores[1]) > 95 || ($scores[2]) > 95 || ($scores[3]) > 95 || ($scores[4]) > 95){
                echo "<p style='font-weight:bold;'>You qualify for the honor roll</p>";
            }
        } else {
            echo "<p style='color:red; font-weight:bold;'>Fail</p>";
        }

    }
?>

</body>
</html>