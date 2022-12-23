<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single Upload Form</title>
</head>
<body>

<h3>Your file was successfully uploaded!</h3>
<?php 
    print_r($uploaded_flleinfo);
    echo $hello;
?>
<br>
<ul>
    <li>name: <?php 
        echo esc($uploaded_flleinfo->getBasename());
    ?>
    </li>
    <li>size:     
    <?php 
        echo esc($uploaded_flleinfo->getSizeByUnit('kb'));
    ?> KB
    </li>
    <li>
        extension: 
        <?php
            $extension = pathinfo($uploaded_flleinfo->getBasename(), PATHINFO_EXTENSION);
            echo $extension;
            // 기능 개선 필요함(Ci4.2에 추가된 신뢰된 Extension) - 사용불가
            //echo $uploaded_fileinfo->guessExtension();
        ?>
    </li>
</ul>
<p><?php echo anchor('viewex/single_upload_form', 'Upload Another File!'); ?></p>
</body>
</html>