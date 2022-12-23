<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi Upload Form</title>
</head>
<body>

<h3>Your file was successfully uploaded!</h3>
<h3>Multi Files Info</h3>
<?php
    print_r($fileInfos);
?>

<?php 
        foreach ($fileInfos as $fileInfo) { 
    ?>
		File Name: <?php echo $fileInfo['fileName']; ?>
		<br>
		Random Name: <?php echo $fileInfo['newName']; ?>
		<br>
		File Type: <?php echo $fileInfo['fileType']; ?>
		<br>
		File Size(byte): <?php echo $fileInfo['fileSize']; ?>
		<br>
		<img src="<?php echo base_url(); ?>/public/uploads/<?php echo $fileInfo['newName']; ?>" width="120">
		<br>
		----------------------------------
		<br>
	<?php 
        }
    ?>

</body>
</html>