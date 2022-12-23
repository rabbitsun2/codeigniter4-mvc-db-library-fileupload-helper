<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single Upload Form(단일 업로드 양식)</title>
</head>
<body>
    <?php foreach ($errors as $error): ?>
        <li><?= esc($error) ?></li>
    <?php endforeach ?>

    <?= form_open_multipart('viewex/single_upload') ?>
        <input type="file" name="userfile" size="20" />
        <br /><br />
        <input type="submit" value="upload" />

    </form>

</body>
</html>