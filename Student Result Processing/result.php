<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html>
<!DOCTYPE html>
<html>
<head>
<title>Student Result</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<div class="card">

<h1>🎓 Student Result</h1>

<?php

$name=$_POST["name"];
$reg=$_POST["regno"];
$m1=$_POST["m1"];
$m2=$_POST["m2"];
$m3=$_POST["m3"];
$m4=$_POST["m4"];
$m5=$_POST["m5"];

/* Function to calculate total */
function totalMarks($a,$b,$c,$d,$e){
    return $a+$b+$c+$d+$e;
}

/* Function to calculate average */
function averageMarks($total){
    return $total/5;
}

/* Function to determine grade */
function grade($avg){

    if($avg>=90)
        return "A+";

    elseif($avg>=80)
        return "A";

    elseif($avg>=70)
        return "B";

    elseif($avg>=60)
        return "C";

    elseif($avg>=50)
        return "D";

    else
        return "Fail";
}

$total=totalMarks($m1,$m2,$m3,$m4,$m5);
$average=averageMarks($total);
$grade=grade($average);

echo "<table>";

echo "<tr><th>Field</th><th>Details</th></tr>";

echo "<tr><td>Name</td><td>$name</td></tr>";
echo "<tr><td>Register No.</td><td>$reg</td></tr>";
echo "<tr><td>Total Marks</td><td>$total / 500</td></tr>";
echo "<tr><td>Average</td><td>".number_format($average,2)."</td></tr>";
echo "<tr><td>Grade</td><td>$grade</td></tr>";

echo "</table>";

echo "<div class='result'>Congratulations! Your Grade is <b>$grade</b></div>";

?>

</div>

</div>

</body>
</html>