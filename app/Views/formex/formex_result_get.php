<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>폼 예제 - GET 방식</title>
</head>
<body>
    
    <?php
        if($_GET){
            echo $_GET['email'] . "<br>";
            echo $_GET['passwd'] . "<br>";
        }
    ?>
</body>
</html>