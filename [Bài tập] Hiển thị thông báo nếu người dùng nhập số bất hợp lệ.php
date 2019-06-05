<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post">
    <input type="number" name="number1">
    <select name="operator">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">&#215</option>
        <option value="/">÷</option>
    </select>
    <input type="number" name="number2">
    <input type="submit" value="Cal">
</form>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST["number1"];
    $num2 = $_POST["number2"];
    $operator = $_POST["operator"];

    class Calculator
    {
        public $num1;
        public $num2;
        public $operator;

        function __construct($num1, $num2, $operator)
        {
            $this->num1 = $num1;
            $this->num2 = $num2;
            $this->operator = $operator;
        }

        function checkNum()
        {
            if ($this->num2 == 0 && $this->operator == "/") {
                throw new Exception("Eror number 0");
            }
        }

        function calculator()
        {
            return eval("return " . $this->num1 . $this->operator . $this->num2 . ";");
        }
    }

    $Cal = new Calculator($num1, $num2, $operator);
    try {
        $Cal->checkNum();
        echo $Cal->calculator();

    } catch (Exception $message) {
        echo $message->getMessage();
    }
}
?>
