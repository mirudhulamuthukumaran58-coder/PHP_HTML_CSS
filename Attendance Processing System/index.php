<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

$result = false;
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $total = intval($_POST["total"]);
    $attended = intval($_POST["attended"]);

    if ($name == "") {
        $error = "Please enter student name.";
    }
    elseif ($total <= 0) {
        $error = "Total classes must be greater than 0.";
    }
    elseif ($attended < 0 || $attended > $total) {
        $error = "Attended classes cannot be greater than total classes.";
    }
    else {

        // User-defined function
        function attendancePercentage($attended, $total)
        {
            return ($attended / $total) * 100;
        }

        // User-defined function
        function examEligibility($percentage)
        {
            if ($percentage >= 75) {
                return "Eligible for Examination";
            }
            else {
                return "Not Eligible for Examination";
            }
        }

        $percentage = attendancePercentage($attended, $total);
        $percentage = round($percentage, 2);

        $status = examEligibility($percentage);

        $result = true;
    }
}

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Attendance Processing System</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;

            background: linear-gradient(
                135deg,
                #0f2027,
                #203a43,
                #2c5364
            );

            padding: 20px;
        }

        .card {
            width: 100%;
            max-width: 500px;
            background: white;
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.35);
        }

        .icon {
            text-align: center;
            font-size: 50px;
        }

        h1 {
            text-align: center;
            color: #203a43;
            margin: 5px 0;
        }

        .subtitle {
            text-align: center;
            color: #777;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 7px;
            font-weight: bold;
            color: #333;
        }

        input {
            width: 100%;
            padding: 13px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
        }

        input:focus {
            outline: none;
            border-color: #2c5364;
        }

        button {
            width: 100%;
            margin-top: 25px;
            padding: 14px;
            border: none;
            border-radius: 8px;

            background: #203a43;
            color: white;

            font-size: 17px;
            font-weight: bold;

            cursor: pointer;
        }

        button:hover {
            background: #2c5364;
        }

        .error {
            margin-top: 20px;
            padding: 12px;
            background: #ffe5e5;
            color: #b00020;
            border-radius: 8px;
            text-align: center;
            font-weight: bold;
        }

        .result {
            margin-top: 30px;
            padding: 20px;
            background: #f1f8fa;
            border-radius: 12px;
            border: 2px solid #c5dfe7;
        }

        .result h2 {
            text-align: center;
            color: #203a43;
        }

        .row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }

        .percentage {
            text-align: center;
            font-size: 40px;
            font-weight: bold;
            color: #2c5364;
            margin: 20px 0;
        }

        .eligible {
            padding: 14px;
            text-align: center;
            border-radius: 8px;
            background: #d4edda;
            color: #155724;
            font-weight: bold;
        }

        .noteligible {
            padding: 14px;
            text-align: center;
            border-radius: 8px;
            background: #f8d7da;
            color: #721c24;
            font-weight: bold;
        }

        .note {
            text-align: center;
            color: #777;
            font-size: 13px;
            margin-top: 15px;
        }

    </style>

</head>

<body>

<div class="card">

    <div class="icon">📊</div>

    <h1>Attendance Processing</h1>

    <p class="subtitle">
        Calculate attendance and examination eligibility
    </p>

    <form method="POST" action="">

        <label>Student Name</label>

        <input
            type="text"
            name="name"
            placeholder="Enter student name"
            required
        >

        <label>Total Classes</label>

        <input
            type="number"
            name="total"
            min="1"
            placeholder="Enter total classes"
            required
        >

        <label>Classes Attended</label>

        <input
            type="number"
            name="attended"
            min="0"
            placeholder="Enter attended classes"
            required
        >

        <button type="submit">
            Process Attendance
        </button>

    </form>


    <?php if ($error != "") { ?>

        <div class="error">
            <?php echo $error; ?>
        </div>

    <?php } ?>


    <?php if ($result == true) { ?>

        <div class="result">

            <h2>📋 Attendance Report</h2>

            <div class="row">
                <strong>Student Name</strong>
                <span>
                    <?php echo htmlspecialchars($name); ?>
                </span>
            </div>

            <div class="row">
                <strong>Total Classes</strong>
                <span>
                    <?php echo $total; ?>
                </span>
            </div>

            <div class="row">
                <strong>Classes Attended</strong>
                <span>
                    <?php echo $attended; ?>
                </span>
            </div>

            <div class="percentage">
                <?php echo $percentage; ?>%
            </div>

            <p style="text-align:center;">
                Attendance Percentage
            </p>


            <?php if ($percentage >= 75) { ?>

                <div class="eligible">
                    ✅ <?php echo $status; ?>
                </div>

            <?php } else { ?>

                <div class="noteligible">
                    ❌ <?php echo $status; ?>
                </div>

            <?php } ?>


            <div class="note">
                Minimum attendance required: 75%
            </div>

        </div>

    <?php } ?>

</div>

</body>

</html>