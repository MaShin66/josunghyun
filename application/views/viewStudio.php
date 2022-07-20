<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="Studio">
    <meta property="og:description" content="josunghyun 페이지">
    <meta name="description" content="josunghyun 페이지">
	<title>Studio</title>

	<link rel="stylesheet" href="../../static/css/default.css">
    <link rel="stylesheet" href="../../static/css/homePcNew.css">
    <link rel="stylesheet" href="../../static/css/homeMobileNew.css">

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
</head>
<body>
    <div id="header">
        <div class="main-link "><a href="">josunghyun</a>
            <div class="mobile-squre"><img src="../../static/img/squre_13.svg" alt=""></div>
        </div>
        <div class="image-link"><a href="#">Image</a></div>
        <div class="archive-link"><a href="#">Archive</a></div>
        <div class="mobile-text"><?=$sMobileFristText?></div>
        <div class="mobile-text2"><?=$sMobileSecondText?></div>
        <div class="email-link"><a href="">sungddol@gamil.com</a></div>
        <div class="social-link"><a href="<?=$sInstagramUrl?>" target="_blank">@josunghyun</a></div>

    </div>
    <div id="main">
        <div id="image-titles">
            <div class="category"><img src="../../uploads/loah/City-breeze-City-21-summer-17.jpg" alt=""></div>
            <div class="contents">
                <div><img src="../../uploads/loah/City-breeze-City-21-summer-1.jpg" alt=""></div>
                <div><img src="../../uploads/loah/City-breeze-City-21-summer-2.jpg" alt=""></div>
                <div><img src="../../uploads/loah/City-breeze-City-21-summer-3.jpg" alt=""></div>
            </div>
        
        </div>
        <!-- <?php foreach ($aGroupCategoryImage as $key => $value) : ?>
            <div class="contents <?=$key?>" data-imgcount="<?=count($aGroupCategoryImage[$key])?>">
                <?php foreach ($aGroupCategoryImage[$key] as $key => $value) : ?>    
                    <div class="content content-<?=$key+1?>" style="">
                        <img src="../../uploads/<?=$value['category']?>/<?=$value['file_name']?>" 
                            data-width=<?=$value['image_width']?>
                            data-height=<?=$value['image_height']?>
                            alt="">
                    </div>
                <?php endforeach ?>
            </div>
        <?php endforeach ?> -->

        <div id="archive-titles">
        <?php foreach($aArchive as $value) : ?>
            <div class="archive"><img src="../../uploads/loah/City-breeze-City-21-summer-16.jpg" alt=""></div>
        <?php endforeach ?>
        </div>
        <!-- <?php foreach ($aGroupArchiveImage as $key => $value) : ?>
            <div class="archive-contents <?=$key?>" data-imgcount="<?=count($aGroupArchiveImage[$key])?>">
                <?php foreach ($aGroupArchiveImage[$key] as $key => $value) : ?>    
                    <div class="content content-<?=$key+1?>" style="">
                        <img src="../../uploads/<?=$value['archive']?>/<?=$value['file_name']?>" 
                            data-width=<?=$value['image_width']?>
                            data-height=<?=$value['image_height']?>
                            alt="">
                    </div>
                <?php endforeach ?>
            </div>
        <?php endforeach ?> -->
    </div>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="../../static/js/home.js"></script>
</body>
</html>