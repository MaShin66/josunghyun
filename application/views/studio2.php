<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        font-size: 100%;
        font: inherit;
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
        color: black;
    }

    /* custom */
    #header {
        display: flex;
        padding: 1% 1%;
        /* border-bottom: 1px solid black; */
    }

    .header_inline_block {
        /* display: inline-block; */
    }

    .main-link {
        width: 30%;
        text-align: left;
    }

    .image-link {
        width: 15%;
        text-align: center;
    }

    .arhive-link {
        width: 15%;
        text-align: center;
    }

    .email-link {
        width: 30%;
        text-align: center;
    }

    .social-link {
        width: 10%;
        text-align: right;
    }

    #main {
        /* display: flex; */
        /* position: fixed; */
        /* height: 100%; */
    }
    
    #titles {
        width: 20rem;
        /* width: 100%; */
        margin: 10px;
        line-height: 1.5rem;
        display: inline-block;
    }
    
    .content-count {
        float: right;
    }

    #contents {
        /* display: flex; */
        /* flex-direction: row; */
        /* align-items: center; */
        position: relative;
        height: 640px;
        overflow: scroll;
    }

    .content {
        /* width: 100%; */
        /* height: 100%; */
        /* display: inline-block; */
        /* border: 1px solid red; */
        position: absolute;
        /* left: 0; */
        /* top: 0; */
    }

    .content img {
        /* box-sizing: border-box; */
        /* max-width: 100%; */
        /* border: none; */
        /* width: auto; */
        /* height: auto; */
        /* vertical-align: middle; */
    }

    .content-1 {
        left: 0%;
    }

    .content-2 {
        left: 100%;
    }

    .content-3 {
        left: 200%;
    }

    .content-4 {
        left: 300%;
    }
	</style>

    <!-- <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/> -->
</head>
<body>
    <div id="header">
        <div class="main-link"><a href="">josunghyun</a></div>
        <div class="image-link"><a href="">image</a></div>
        <div class="arhive-link"><a href="">archive</a></div>
        <div class="email-link"><a href="">sungddol@gamil.com</a></div>
        <div class="social-link"><a href="">Instagram</a></div>
    </div>
    <div id="main">
        <div id="titles">
            <div><a href="">City-breeze-City-21-summer</a><span class="content-count">22</span></div>
            <div><a href="">loah</a><span class="content-count">7</span></div>
            <div><a href="">Muayae-21ss</a><span class="content-count">10</span></div>
        </div>
        <div id="contents" class="content-slide">
            <div class="content content-1"><img src="/static/img/City-breeze-City-21-summer:22/City-breeze-City-21-summer-1.jpg" alt=""></div>
            <div class="content content-2"><img src="/static/img/City-breeze-City-21-summer:22/City-breeze-City-21-summer-2.jpg" alt=""></div>
            <div class="content content-3"><img src="/static/img/City-breeze-City-21-summer:22/City-breeze-City-21-summer-3.jpg" alt=""></div>
            <div class="content content-4"><img src="/static/img/City-breeze-City-21-summer:22/City-breeze-City-21-summer-4.jpg" alt=""></div>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<!-- <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script> -->
<script>
// $(document).ready(function(){
//   $('.content-slide').slick({
//     // dots: true,
//     // infinite: true,
//     speed: 300,
//     slidesToShow: 1,
//     centerMode: true,
//     variableWidth: true
//   });
// });
</script>
</body>
</html>