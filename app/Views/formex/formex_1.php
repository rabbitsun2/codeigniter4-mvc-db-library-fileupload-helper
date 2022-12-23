<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>폼 예제 - POST방식(입력 화면)</title>
</head>
<body>
    <?php
        $attributes = ['class' => 'email', 'id' => 'myform'];
        echo form_open('/formex/formex_result_post', $attributes);
        
        $data = ['csrf_id' => 'my-id'];
        echo form_hidden($data);
    ?>

    Email: <input type="text" name="email"><br>
    Password: <input type="password" name="passwd"><br>
    <input type="submit" value="전송">

    <!-- </form>-->
    <?php echo form_close(); ?>
    
</body>
</html>