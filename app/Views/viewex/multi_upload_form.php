<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi Upload Form(멀티 업로드 양식)</title>
</head>
<body>
    <?php foreach ($errors as $error): ?>
        <li><?= esc($error) ?></li>
    <?php endforeach ?>

    <?= form_open_multipart('viewex/multi_upload') ?>
        <input type="file" name="userfile[]" size="20" multiple /><br>
        <input type="file" name="userfile[]" size="20" multiple />
        <br /><br />
        <input type="submit" value="upload" />

    </form>

</body>
</html>