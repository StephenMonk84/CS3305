<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Grade Calculator</title>
    </head>
    <body>
         <form method="post" action="">
            <label for="score1">Exam Score 1:</label>
            <input type="number" id="score1" name="score1" required><br><br>

            <label for="score2">Exam Score 2:</label>
            <input type="number" id="score2" name="score2" required><br><br>

            <label for="score3">Exam Score 3:</label>
            <input type="number" id="score3" name="score3" required><br><br>

            <button type="submit">Calculate Average</button>
        </form>

        <?php 
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $score1 = $_POST["score1"];
                $score2 = $_POST["score2"];
                $score3 = $_POST["score3"];

                $average = ($score1 + $score2 + $score3)/3;
                echo "<h1>Results</h1>";
                echo "<p>Scores : $score1, $score2, $score3</p>";
                echo "<p>The average score is: $average</p>";
            }
        ?>
    </body>
</html>