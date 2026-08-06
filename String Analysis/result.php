<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

if($_SERVER["REQUEST_METHOD"]!="POST"){
    die("Invalid Request");
}

$title = $_POST["title"];

$vowels = 0;
$consonants = 0;
$digits = 0;
$special = 0;

$titleLower = strtolower($title);

for($i=0; $i<strlen($titleLower); $i++)
{
    $ch = $titleLower[$i];

    if(ctype_alpha($ch))
    {
        if(strpos("aeiou",$ch)!==false)
            $vowels++;
        else
            $consonants++;
    }
    elseif(ctype_digit($ch))
    {
        $digits++;
    }
    elseif(!ctype_space($ch))
    {
        $special++;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>String Analysis Result</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
<div class="card">

<h1>String Analysis Result</h1>

<table>

<tr>
<th>Item</th>
<th>Count</th>
</tr>

<tr>
<td>Entered Title</td>
<td><?php echo htmlspecialchars($title); ?></td>
</tr>

<tr>
<td>Vowels</td>
<td><?php echo $vowels; ?></td>
</tr>

<tr>
<td>Consonants</td>
<td><?php echo $consonants; ?></td>
</tr>

<tr>
<td>Digits</td>
<td><?php echo $digits; ?></td>
</tr>

<tr>
<td>Special Characters</td>
<td><?php echo $special; ?></td>
</tr>

</table>

</div>
</div>

</body>
</html>