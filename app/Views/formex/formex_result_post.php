<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>폼 결과 - POST 방식</title>
</head>
<body>
    <?php
        if($_POST){
            echo $_POST['email'] . "<br>";
            echo $_POST['passwd'] . "<br>";
        }
    ?>
</body>
</html>