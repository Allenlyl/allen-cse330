<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $num1 = isset($_GET['num1']) ? floatval($_GET['num1']) : '';
        $num2 = isset($_GET['num2']) ? floatval($_GET['num2']) : '';
        $operator = isset($_GET['operation']) ? $_GET['operation'] : '';
        $answer = '';

        if($num1 != '' && $num2 != '' && $operator != '') {
            switch($operator) {
                case 'addition':
                    $answer = $num1 + $num2;
                case 'subtraction':
                    $answer = $num1 - $num2;
                case 'multiplication':
                    $answer = $num1 * $num2;
                case 'division':
                    $answer = $num1 / $num2;
                case 'none':
                    $answer = 'Invalid operator';
            }
        } else {
            header("calculator.html");
            exit();
        }
        printf("%s %s %s = %s", 
                htmlentities($num1), 
                htmlentities($operator), 
                htmlentities($num2),
                htmlentities($answer)
        );
    ?>
</body>
</html>