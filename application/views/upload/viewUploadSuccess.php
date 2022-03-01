<html>
<head>
<title>Upload Form</title>
</head>
<body>

<h3>Your file was successfully uploaded!</h3>

<img src="../uploads/<?=$aImageContents[0]['folder_name']?>/<?=$aImageContents[0]['file_name']?>" alt="">

<ul>
<!-- <?php foreach ($aImageContents[0] as $item => $value): ?>
    <li><?=$item;?>: <?=$value;?></li>
    <img src="" alt="">
<?php endforeach; ?> -->
</ul>

<p><?php echo anchor('upload', 'Upload Another File!'); ?></p>

</body>
</html>