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

	<style type="text/css">

    html, body, div, span, applet, object, iframe,
    h1, h2, h3, h4, h5, h6, p, blockquote, pre,
    a, abbr, acronym, address, big, cite, code,
    del, dfn, em, img, ins, kbd, q, s, samp,
    small, strike, strong, sub, sup, tt, var,
    b, u, i, center,
    dl, dt, dd, ol, ul, li,
    fieldset, form, label, legend,
    table, caption, tbody, tfoot, thead, tr, th, td,
    article, aside, canvas, details, embed,
    figure, figcaption, footer, header, hgroup,
    menu, nav, output, ruby, section, summary,
    time, mark, audio, video {
        margin: 0;
        padding: 0;
        border: 0;
        font-size: 14px;
        vertical-align: baseline;
        }
    /* HTML5 display-role reset for older browsers */
    article, aside, details, figcaption, figure,
    footer, header, hgroup, menu, nav, section {
        display: block;
        }
    body {
        line-height: 1;
        }
    ol, ul {
        list-style: none;
        }
    blockquote, q {
        quotes: none;
        }
    blockquote:before, blockquote:after,
    q:before, q:after {
        content: '';
        content: none;
        }
    table {
        border-collapse: collapse;
        border-spacing: 0;
        }

    a {
        text-decoration: none;
        color: #808080;
    }

    /* custom */
    body {
        font-family: HelveticaNeue-Medium;
        color: #808080;
        background-color: white;
    }

    #titles > div {
        cursor: pointer;
    }

    #image-count-div {
        display: none;
    }

    /* PC */
    @media screen and (min-width: 768px) {
        html {
            width: 100%;
            height: 100%;
            /* overflow: hidden; */
            /* position: fixed; */
        }
        body {
            /* position: fixed; */
            width: 100%;
            /* background-color: white; */
        }
        #main {
            height: 96vh;
        }
        
        #header {
            display: flex;
            padding: 1% 1%;
            justify-content: space-between;

            position: fixed;
            width: 100%;
            background-color: white;
            z-index: 1;
        }

        #titles {
            width: 20%;
            margin: 12px;
            line-height: 1.5rem;
            float: left;

            overflow-y: scroll;
            margin-top: 4%;
        }
        .contents {
            display: none;
            flex-direction: column;
            justify-content: center;
            position: relative;
            height: 96vh;
            overflow-x: scroll;
            overflow-y: hidden;
        }
        
        /* PC에서는 안보이게 할 것들 */
        .mobile-squre {
            display: none;
        }

        .main-link {
            /* width: 30%; */
            text-align: left;
        }

        .image-link {
            width: 40%;
            text-align: right;
        }

        .archive-link {
            width: 0%;
            text-align: left;
        }

        .email-link {
            width: 20%;
            text-align: right;
        }

        .social-link {
            width: 8%;
            text-align: left;
        }

        .mobile-text, .mobile-text2 {
            display: none;
        }
        
        .content-count {
            float: right;
        }

        .content {
            position: absolute;
            height: 90%;
        }

        .content img {
            height: 100%;
        }

        .content-1 {
            left: 0%;
        }

        .content-2 {
            left: 95%;
        }

        .content-3 {
            left: 141%;
        }

        .content-4 {
            left: 237%;
        }
        ::-webkit-scrollbar {
            display: none;
        }
    }

    /* MOBILE */
    @media screen and (max-width: 767px) {
        html {
            width: 100%;
            height: 100%;
            overflow: hidden;
            position: fixed;
        }

        body {
            font-family: HelveticaNeue-Medium;
        }
        #main {
            display: none;
        }

        #header {
            display: flex;
            padding: 4% 7% 2% 7%;
            flex-direction: column;
            /* font-size: 1.2rem; */
            line-height: 2rem;
        }

        #header > div {
            width: 100%;
            text-align: left;
        }

        .main-link {
            margin-bottom: 4%;
        }

        .main-link a {
            color: #000000;
        }

        #titles {
            font-family: 'regular';
            width: 110%;
            margin-left: 7%;
            line-height: 1.8rem;
            float: left;
        }

        .contents {
            display: none;
            flex-direction: column;
            justify-content: center;
            position: relative;
            height: 96vh;
            overflow-x: scroll;
            overflow-y: hidden;
        }

        #image-count-div {
            float: right;
            font-size: 0.8rem;
        }

        #image-count {
            font-family: 'medium';
        }
        
        .content {
            height: 500px !important;
        }

        .content > img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .mobile-squre {
            display: block;
            float: right;
        }

        .mobile-squre img {
            width: 12px;
        }

        .image-link {
            /* display: flex;
            justify-content: space-between;
            align-items: center; */
        }

        .email-link, .social-link, .mobile-text, .mobile-text2 {
            position: absolute;
        }

        .email-link {
            bottom: 0.5rem;
        }

        .social-link {
            bottom: 2rem;
        }

        .mobile-text {
            bottom: 6.5rem;
        }

        .mobile-text2 {
            bottom: 5rem;
        }

        .slick-slide {
            margin: 0 24px;
        }
    }
	</style>

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
</head>
<body>
    <div id="header">
        <div class="main-link"><a href="">josunghyun</a><div class="mobile-squre"><img src="../../static/img/squre_13.svg" alt=""></div></div>
        <div class="image-link"><a href="#" style="color:black;">image</a>
            <div id="image-count-div">
                <span id="image-count">1/4</span>
            </div>
        </div>
        <div class="archive-link"><a href="">archive</a></div>
        <div class="email-link"><a href="">sungddol@gamil.com</a></div>
        <div class="social-link"><a href="<?=$sInstagramUrl?>" target="_blank">Instagram</a></div>

        <div class="mobile-text"><?=$sMobileFristText?></div>
        <div class="mobile-text2"><?=$sMobileSecondText?></div>

    </div>
    <div id="main">
        <div id="titles">
            <?php foreach($aCategory as $value) : ?>
                <div><span id="category"><?=$value['name']?></span><span class="content-count"><?=$value['count']?></span></div>
            <?php endforeach ?>
        </div>

        <?php foreach ($aGroupCategoryImage as $key => $value) : ?>
            <div class="contents content-slide <?=$key?>">
                <?php foreach ($aGroupCategoryImage[$key] as $key => $value) : ?>    
                    <div class="content content-<?=$key+1?>"><img src="../../uploads/<?=$value['category']?>/<?=$value['file_name']?>" alt=""></div>
                <?php endforeach ?>
            </div>
            
            
        <?php endforeach ?>

        <!-- <div id="contents" class="content-slide">
            <div class="content content-1"><img src="../../uploads/Drae 2022 pre-Spring Campagin/City-breeze-City-21-summer-16.jpg" alt=""></div>
            <div class="content content-2"><img src="/static/img/City-breeze-City-21-summer:22/City-breeze-City-21-summer-9.jpg" alt=""></div>
            <div class="content content-3"><img src="/static/img/City-breeze-City-21-summer:22/City-breeze-City-21-summer-2.jpg" alt=""></div>
            <div class="content content-4"><img src="/static/img/City-breeze-City-21-summer:22/City-breeze-City-21-summer-3.jpg" alt=""></div>
        </div> -->


    </div>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
    // 모바일 체크
    function isMobile() {
        return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|OperaMini/i.test(navigator.userAgent);
    }

    // MOBILE
    if (isMobile()) {
        // 이미지 목록 선택했을 때
        $('.image-link').on('click', function() {
            $('#main').css('display', 'block');
            $('#titles').css('display', 'block');
            $('html').css('position', 'static');
            $('body').css('overflow-x', 'hidden');
            $('html').css('overflow-y', 'auto');
            $('#image-count-div').css('display', 'none');
            
            $('.archive-link, .email-link, .social-link, .mobile-text, .mobile-text2').css('display', 'none');

            // 오른쪽 위 검은색 네모 회전 원래대로
            $('.mobile-squre img').css('transform', 'unset');
        })
    }

    // 이미지 클릭했을 때
    $('#titles > div').each(function() {
        this.addEventListener('click', function() {

            // let category = $(this).children("#category").text();

            // // 이미지 불러오기
            // fetch("./home/getimage", {
            //     method: "POST",
            //     headers: {
            //     "Content-Type": "application/json",
            // },
            //     body: JSON.stringify({
            //         category: category
            //     }),
            // })
            // .then((response) => response.json())
            // .then(data => 
            //     $.each(data, function(index, item) {
            //         let domElement = $(`<div class="content content-${index+1}"> <img src="../../uploads/${item.category}/${item.file_name}" alt=""></div>`);

            //         console.log(domElement);
                    
            //         $("#contents").append(domElement);
            //     }))
            // .catch((error) => console.log("error:", error));


            // 클릭 안된 것들 다시 본래색으로
            $('#titles > div').each(function() {
                $(this).css('color', '#808080');
            })

            // 클릭한 것들만 검은색으로
            $(this).css('color', '#000000');

            $('.content-count').each(function() {
                $(this).css('display', 'none');
            })

            if (!isMobile()) { // PC
                let category = $(this).children("#category").text();

                $('.contents').each(function(index, elem) {
                    // 해당 class 가 있다면 보여주고
                    if ($(this).hasClass(category)) {
                        $(this).css('display', 'flex');
                    } else { // 해당 class 가 없다면 가리기
                        $(this).css('display', 'none');
                    }
                    
                });
            } else { // MOBILE
                $('#titles').css('display', 'none');
                $('.contents').css('display', 'block');
                $('html').css('overflow', 'hidden');
                $('#image-count-div').css('display', 'block');

                // 오른쪽 위 검은색 네모 회전
                $('.mobile-squre img').css('transform', 'rotate(45deg)');
                $('.mobile-squre img').css('transition', 'all 0.3s linear');

                // 회전한 네모 누를시 목록처럼 나오게 하기 (위의 코드 중복)
                $('.mobile-squre img').on('click', function() {
                    $('#main').css('display', 'block');
                    $('#titles').css('display', 'block');
                    $('html').css('position', 'static');
                    $('body').css('overflow-x', 'hidden');
                    $('html').css('overflow-y', 'auto');
                    $('#image-count-div').css('display', 'none');
                    
                    $('.archive-link, .email-link, .social-link, .mobile-text, .mobile-text2').css('display', 'none');

                    // 오른쪽 위 검은색 네모 회전 원래대로
                    $('.mobile-squre img').css('transform', 'unset');
                })

                $('.content-slide').slick({
                    arrows: false,
                    infinite: false
                });
                
                $('.content-slide').on('init reInit afterChange', function(event, slick, currentSlide, nextSlide){
                    var i = (currentSlide ? currentSlide : 0) + 1;

                    $('#image-count').text(i + '/' + slick.slideCount);
                });
            }

            
        })
    });

</script>
</body>
</html>