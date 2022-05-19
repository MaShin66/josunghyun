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

    #titles > div,
    #archive > div {
        cursor: pointer;
    }

    #image-count-div,
    #archive-count-div {
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

        #titles,
        #archive-titles {
            width: 20%;
            margin: 12px;
            line-height: 1.5rem;
            float: left;

            overflow-y: scroll;
            margin-top: 4%;
        }
        .contents, .archive-contents {
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
        
        .content-count, .archive-content-count {
            float: right;
        }

        .content {
            position: absolute;
            height: 90%;
        }

        .content img {
            height: 100%;
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

        #titles,
        #archive-titles {
            font-family: 'regular';
            width: 110%;
            margin-left: 7%;
            line-height: 1.8rem;
            float: left;
        }

        .contents,
        .archive-contents {
            display: none;
            flex-direction: column;
            justify-content: center;
            position: relative;
            height: 96vh;
            overflow-x: scroll;
            overflow-y: hidden;
        }
        

        #image-count-div,
        #archive-count-div {
            float: right;
            font-size: 0.8rem;
        }

        #image-count,
        #archive-count {
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

        .content-count, .archive-content-count {
            display: none;
        }
    }
	</style>

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
</head>
<body>
    <div id="header">
        <div class="main-link"><a href="">josunghyun</a><div class="mobile-squre"><img src="../../static/img/squre_13.svg" alt=""></div></div>
        <div class="image-link"><a href="#">image</a>
            <div id="image-count-div">
                <span id="image-count"></span>
            </div>
        </div>
        <div class="archive-link"><a href="#">archive</a>
            <div id="archive-count-div">
                <span id="archive-count"></span>
            </div>
        </div>
        <div class="email-link"><a href="">sungddol@gamil.com</a></div>
        <div class="social-link"><a href="<?=$sInstagramUrl?>" target="_blank">Instagram</a></div>

        <div class="mobile-text"><?=$sMobileFristText?></div>
        <div class="mobile-text2"><?=$sMobileSecondText?></div>

    </div>
    <div id="main">
        <div id="titles">
            <?php foreach($aCategory as $value) : ?>
                <div><span class="category"><?=$value['name']?></span><span class="content-count"><?=$value['count']?></span></div>
            <?php endforeach ?>
        </div>
        <?php foreach ($aGroupCategoryImage as $key => $value) : ?>
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
        <?php endforeach ?>

        <div id="archive-titles" style="display: none;">
            <?php foreach($aArchive as $value) : ?>
                <div><span class="archive"><?=$value['name']?></span><span class="archive-content-count"><?=$value['count']?></span></div>
            <?php endforeach ?>
        </div>
        <?php foreach ($aGroupArchiveImage as $key => $value) : ?>
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
        <?php endforeach ?>
    </div>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
    // 모바일 체크
    function isMobile() {
        return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|OperaMini/i.test(navigator.userAgent);
    }

    // 마우스 스크롤시 좌우 이동
    function row_scroll() {
        $(".contents, .archive-contents").on('mousewheel', function(e) {
            let wheelDelta = e.originalEvent.wheelDelta;

            if (wheelDelta > 0) {
                $(this).scrollLeft(-wheelDelta + $(this).scrollLeft());
            } else {
                $(this).scrollLeft(-wheelDelta + $(this).scrollLeft());
            }
        })
    }

    row_scroll();

    // 이미지 클릭했을 때
    $('.image-link').on('click', function() {
        $('#archive-titles, .archive-content').hide();
        $('#titles, .content-count').show();
        $(this).children('a').css('color', 'black');
        $('.archive-link > a').css('color', '#808080');
        // 오른쪽 위 검은색 네모 회전 원래대로
        $('.mobile-squre img').css('transform', 'unset');
    })

    // 클릭했을 때
    $('.archive-link').on('click', function() {
        $('#titles, .contents').hide();
        $('#archive-titles, .archive-content-count').show();
        $(this).children('a').css('color', 'black');
        $('.image-link > a').css('color', '#808080');
        // 오른쪽 위 검은색 네모 회전 원래대로
        $('.mobile-squre img').css('transform', 'unset');
    })

    // MOBILE
    if (isMobile()) {
        // 이미지 목록 선택했을 때
        $('.image-link').on('click', function() {
            $('#main, #titles, .archive-link').show();
            $('html').css('position', 'static');
            $('body').css('overflow-x', 'hidden');
            $('html').css('overflow-y', 'auto');
            $('#image-count-div').hide();
            $('#archive-count-div').hide();
            
            $('.email-link, .social-link, .mobile-text, .mobile-text2').css('display', 'none');
        })

        // 아카이브 목록 선택했을 때
        $('.archive-link').on('click', function() {
            $('#main, #archive-titles, .image-link').show();
            $('html').css('position', 'static');
            $('body').css('overflow-x', 'hidden');
            $('html').css('overflow-y', 'auto');
            $('#image-count-div').hide();
            $('#archive-count-div').hide();
            
            $('.email-link, .social-link, .mobile-text, .mobile-text2').css('display', 'none');
        })
    }

    // 이미지 클릭했을 때
    $('#titles > div').each(function() {
        this.addEventListener('click', function() {
            $('.archive-link').hide();

            // 클릭 안된 것들 다시 본래색으로
            $('#titles > div').each(function() {
                $(this).css('color', '#808080');
            })

            // 클릭한 것들만 검은색으로
            $(this).css('color', '#000000');

            // 카테고리마다 몇개의 이미지 있는지 가리기
            $('.content-count').each(function() {
                $(this).hide();
            })

            if (!isMobile()) { // PC
                let category = $(this).children(".category").text();

                $('.contents').each(function(index, elem) {
                    // 해당 class 가 있다면 보여주고
                    if ($(this).hasClass(category)) {
                        // $('.contents, .content').css('display', 'block');
                        $(this).css('display', 'flex');

                        // 가로 가 더 긴 이미지들 줄이기
                        $(this).find('img').each(function(index, elem) {
                            let imgWidth = $(this).data('width');
                            let imgHeight = $(this).data('height');

                            if (imgWidth > imgHeight) {
                                $(this).css('height', '480px');
                                $(this).css('margin-top', '16%');
                            }
                        });

                        // 간격 조절하기
                        let leftSize = 0;
                        $(this).children('.content').each(function(index, elem) {
                            $(this).css('left', leftSize+'px');
                            leftSize += Number($(this).width()) + 30;
                        })

                    } else { // 해당 class 가 없다면 가리기
                        $(this).hide();
                    }
                });
            } else { // MOBILE
                // image count 에 숫자 넣기
                let imageCount = $(this).find('.content-count').text();

                $('#image-count').text('1/'+imageCount);

                let category = $(this).children(".category").text();

                $('.contents').each(function(index, elem) {
                    // 해당 class 가 있다면 보여주고
                    if ($(this).hasClass(category)) {
                        $(this).show();

                        // 재클릭했을 때 오류 방지 위해
                        $(this).removeClass('content-slide');
                        $(this).removeClass('slick-initialized');

                        // 해당 카테고리만 content-slide class 추가
                        $(this).addClass('content-slide');

                        // 가로 가 더 긴 이미지들 줄이기
                        $(this).find('img').each(function(index, elem) {
                            let imgWidth = $(this).data('width');
                            let imgHeight = $(this).data('height');

                            if (imgWidth > imgHeight) {
                                $(this).css('height', '50%');
                                $(this).css('margin-top', '36%');
                            }
                        });
                    } else { // 해당 class 가 없다면 가리기
                        $(this).hide();

                        // 재클릭했을 때 오류 방지 위해
                        $(this).removeClass('content-slide');
                        $(this).removeClass('slick-initialized');
                        $('.archive-contents').removeClass('content-slide');
                        $('.archive-contents').removeClass('slick-initialized');
                    }
                });

                $('#titles').hide();
                $('html').css('overflow', 'hidden');
                $('#image-count-div').show();

                // 오른쪽 위 검은색 네모 회전
                $('.mobile-squre img').css('transform', 'rotate(45deg)');
                $('.mobile-squre img').css('transition', 'all 0.3s linear');

                // 회전한 네모 누를시 목록처럼 나오게 하기 (위의 코드 중복)
                $('.mobile-squre img').on('click', function() {
                    $('#main, #titles').show();
                    $('html').css('position', 'static');
                    $('body').css('overflow-x', 'hidden');
                    $('html').css('overflow-y', 'auto');
                    $('#image-count-div').hide();
                    
                    $('.archive-link, .email-link, .social-link, .mobile-text, .mobile-text2').hide();

                    // 오른쪽 위 검은색 네모 회전 원래대로
                    $('.mobile-squre img').css('transform', 'unset');
                })

                $('.content-slide').slick({
                    arrows: false,
                    infinite: false
                });

                $(".slider").not('.slick-initialized').slick();

                $('.content-slide').on('init reInit afterChange', function(event, slick, currentSlide, nextSlide){
                    var i = (currentSlide ? currentSlide : 0) + 1;

                    $('#image-count').text(i + '/' + imageCount);
                });

                
            }

            
        })
    });

    // 아카이브 이미지 클릭
    $('#archive-titles > div').each(function() { 
        this.addEventListener('click', function() {
            $('.image-link').hide();

            // 클릭 안된 것들 다시 본래색으로
            $('#archive-titles > div').each(function() {
                $(this).css('color', '#808080');
            })

            // 클릭한 것들만 검은색으로
            $(this).css('color', '#000000');

            // 카테고리마다 몇개의 이미지 있는지 가리기
            $('.archive-content-count').each(function() {
                $(this).css('display', 'none');
            })

            if (!isMobile()) { // PC
                let archive = $(this).children(".archive").text();

                $('.archive-contents').each(function(index, elem) {
                    // 해당 class 가 있다면 보여주고
                    if ($(this).hasClass(archive)) {
                        $(this).css('display', 'flex');

                        // 가로 가 더 긴 이미지들 줄이기
                        $(this).find('img').each(function(index, elem) {
                            let imgWidth = $(this).data('width');
                            let imgHeight = $(this).data('height');

                            if (imgWidth > imgHeight) {
                                $(this).css('height', '480px');
                                $(this).css('margin-top', '16%');
                            }
                        });

                        // 간격 조절하기
                        let leftSize = 0;
                        $(this).children('.content').each(function(index, elem) {
                            $(this).css('left', leftSize+'px');
                            leftSize += Number($(this).width()) + 30;
                        })

                    } else { // 해당 class 가 없다면 가리기
                        $(this).hide();
                    }
                });
            } else { // MOBILE
                // image count 에 숫자 넣기
                let archiveCount = $(this).find('.archive-content-count').text();

                $('#archive-count').text('1/'+archiveCount);

                let archive = $(this).children(".archive").text();

                $('.archive-contents').each(function(index, elem) {
                    // 해당 class 가 있다면 보여주고
                    if ($(this).hasClass(archive)) {
                        $(this).css('display', 'block');

                        // 재클릭했을 때 오류 방지 위해
                        $(this).removeClass('content-slide');
                        $(this).removeClass('slick-initialized');

                        // 해당 카테고리만 content-slide class 추가
                        $(this).addClass('content-slide');

                        // 가로 가 더 긴 이미지들 줄이기
                        $(this).find('img').each(function(index, elem) {
                            let imgWidth = $(this).data('width');
                            let imgHeight = $(this).data('height');

                            if (imgWidth > imgHeight) {
                                $(this).css('height', '50%');
                                $(this).css('margin-top', '36%');
                            }
                        });
                    } else { // 해당 class 가 없다면 가리기
                        $(this).hide();

                        // 재클릭했을 때 오류 방지 위해
                        $(this).removeClass('content-slide');
                        $(this).removeClass('slick-initialized');
                        $('.contents').removeClass('content-slide');
                        $('.contents').removeClass('slick-initialized');
                    }
                });

                $('#archive-titles').css('display', 'none');
                $('html').css('overflow', 'hidden');
                $('#archive-count-div').css('display', 'block');

                // 오른쪽 위 검은색 네모 회전
                $('.mobile-squre img').css('transform', 'rotate(45deg)');
                $('.mobile-squre img').css('transition', 'all 0.3s linear');

                // 회전한 네모 누를시 목록처럼 나오게 하기 (위의 코드 중복)
                $('.mobile-squre img').on('click', function() {
                    $('#main').show();
                    $('#titles').show();
                    $('html').css('position', 'static');
                    $('body').css('overflow-x', 'hidden');
                    $('html').css('overflow-y', 'auto');
                    $('#archive-count-div').hide();
                    
                    $('.image-link, .email-link, .social-link, .mobile-text, .mobile-text2').hide();

                    // 오른쪽 위 검은색 네모 회전 원래대로
                    $('.mobile-squre img').css('transform', 'unset');
                })

                $('.content-slide').slick({
                    arrows: false,
                    infinite: false
                });

                $(".slider").not('.slick-initialized').slick();

                $('.content-slide').on('init reInit afterChange', function(event, slick, currentSlide, nextSlide){
                    var i = (currentSlide ? currentSlide : 0) + 1;

                    $('#archive-count').text(i + '/' + archiveCount);
                });

                
            }

            
        })
    });

</script>
</body>
</html>