// 모바일 체크
function isMobile() {
    return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|OperaMini/i.test(navigator.userAgent);
}

if (!isMobile()) { // PC
    // 이미지 목록 선택했을 때
    // $('.image-link').on('click', function() {
    //     $('.image-link, .archive-link, #archive-titles, .archive-content').hide();
    //     $('#titles, .content-count').show();
    //     $(this).children('a').css('color', 'black');
    //     $('.archive-link > a').css('color', '#808080');
    // })
    
    // // 클릭했을 때
    // $('.archive-link').on('click', function() {
    //     $('#titles, .contents').hide();
    //     $('#archive-titles, .archive-content-count').show();
    //     $(this).children('a').css('color', 'black');
    //     $('.image-link > a').css('color', '#808080');
    // })
} else { // MOBILE
    $('.image-link').on('click', function() {
        // 아카이브 목록 숨기고 카테고리 목록 보여주고
        $('#archive-titles').hide();
        $('#main, #titles').show();
    
        // 오른쪽 위 검은색 네모 회전
        $('.mobile-squre img').css('transform', 'rotate(45deg)');
        $('.mobile-squre img').css('transition', 'all 0.3s linear');

        // 세로 스크롤 가능하게
        $('html').css('position', 'static');
        $('html').css('overflow-y', 'auto');
    
        // 맨 위 빼고 모든 링크 숨기기
        $('.image-link, .archive-link, .email-link, .social-link, .mobile-text, .mobile-text2').hide();
    })
    // 아카이브 목록 선택했을 때
    $('.archive-link').on('click', function() {
        // 카테고리 목록 숨기고 아카이브 목록 보여주고
        $('#titles').hide();
        $('#main, #archive-titles').show();

        // 오른쪽 위 검은색 네모 회전
        $('.mobile-squre img').css('transform', 'rotate(45deg)');
        $('.mobile-squre img').css('transition', 'all 0.3s linear');

        // 세로 스크롤 가능하게
        $('html').css('position', 'static');
        $('html').css('overflow-y', 'auto');
        
        // 맨 위 빼고 모든 링크 숨기기
        $('.image-link, .archive-link, .email-link, .social-link, .mobile-text, .mobile-text2').hide();
    })
}

// 검은색 네모 클릭했을 때
if(isMobile()) {
    $('.mobile-squre img').on('click', function() {

        // 오른쪽 위 검은색 네모 회전 원래대로
        $('.mobile-squre img').css('transform', 'unset');
        
        // 카테고리와 아카이브 숨기고
        $('#titles, #archive-titles, .contents, .archive-contents').hide();

        // 모든 메뉴 다시 보이기
        $('.image-link, .archive-link, .email-link, .social-link, .mobile-text, .mobile-text2').show();

        // 세로 스크롤 불가하게
        $('html').css('position', 'fixed');
        $('html').css('overflow-y', 'hidden');
    })
}

// 이미지 클릭했을 때
$('#titles > div').each(function() {
    this.addEventListener('click', function() {
        if (!isMobile()) { // PC
            // let category = $(this).children(".category").text();

            // $('.contents').each(function(index, elem) {
            //     // 해당 class 가 있다면 보여주고
            //     if ($(this).hasClass(category)) {
            //         // $('.contents, .content').css('display', 'block');
            //         $(this).css('display', 'flex');

            //         // 가로 가 더 긴 이미지들 줄이기
            //         $(this).find('img').each(function(index, elem) {
            //             let imgWidth = $(this).data('width');
            //             let imgHeight = $(this).data('height');

            //             if (imgWidth > imgHeight) {
            //                 $(this).css('height', '480px');
            //                 $(this).css('margin-top', '16%');
            //             }
            //         });

            //         // 간격 조절하기
            //         let leftSize = 0;
            //         $(this).children('.content').each(function(index, elem) {
            //             $(this).css('left', leftSize+'px');
            //             leftSize += Number($(this).width()) + 30;
            //         })

            //     } else { // 해당 class 가 없다면 가리기
            //         $(this).hide();
            //     }
            // });
        } else { // MOBILE
            let category = $(this).find(".categoryArchiveName").text();

            $('.contents').each(function(index, elem) {
                // 네모 없애고 contact, close 보이기
                $('.contact-link, .close-link').show();
                $('.mobile-squre').hide();

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

            $('.content-slide').slick({
                arrows: false,
                infinite: false
            });
            $(".slider").not('.slick-initialized').slick();

            $('.close-link').addClass('category');
            $('.close-link').removeClass('archive');
        }
    })
});

// 아카이브 이미지 클릭
$('#archive-titles > div').each(function() { 
    this.addEventListener('click', function() {
        if (!isMobile()) { // PC
            // let archive = $(this).children(".archive").text();

            // $('.archive-contents').each(function(index, elem) {
            //     // 해당 class 가 있다면 보여주고
            //     if ($(this).hasClass(archive)) {
            //         $(this).css('display', 'flex');

            //         // 가로 가 더 긴 이미지들 줄이기
            //         $(this).find('img').each(function(index, elem) {
            //             let imgWidth = $(this).data('width');
            //             let imgHeight = $(this).data('height');

            //             if (imgWidth > imgHeight) {
            //                 $(this).css('height', '480px');
            //                 $(this).css('margin-top', '16%');
            //             }
            //         });

            //         // 간격 조절하기
            //         let leftSize = 0;
            //         $(this).children('.content').each(function(index, elem) {
            //             $(this).css('left', leftSize+'px');
            //             leftSize += Number($(this).width()) + 30;
            //         })

            //     } else { // 해당 class 가 없다면 가리기
            //         $(this).hide();
            //     }
            // });
        } else { // MOBILE
            let archive = $(this).find(".categoryArchiveName").text();

            $('.archive-contents').each(function(index, elem) {
                $('.contact-link, .close-link').show();
                $('.mobile-squre').hide();

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

            $('.content-slide').slick({
                arrows: false,
                infinite: false
            });

            $(".slider").not('.slick-initialized').slick();

            $('.close-link').addClass('archive');
            $('.close-link').removeClass('category');
        }
    })
});

// close 클릭
$('.close-link').on('click', function() {

    // category 목록 보여주기
    if ($(this).hasClass('category')) {
        $('#main, #titles').show();
    } else { // archive 목록 보여주기
        $('#archive-titles').show();
    }

    // 세로 스크롤 가능하게
    $('html').css('position', 'static');
    $('html').css('overflow-y', 'auto');

    // 오른쪽 위 검은색 네모 다시 보이기
    $('.mobile-squre').show();

    // contact, concat 가리기
    $('.contact-link, .close-link').hide();
})