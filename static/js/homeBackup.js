
// 모바일 체크
function isMobile() {
    return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|OperaMini/i.test(navigator.userAgent);
}

// 마우스 스크롤시 좌우 이동
// function row_scroll() {
//     $(".contents, .archive-contents").on('mousewheel', function(e) {
//         let wheelDelta = e.originalEvent.wheelDelta;

//         if (wheelDelta > 0) {
//             $(this).scrollLeft(-wheelDelta + $(this).scrollLeft());
//         } else {
//             $(this).scrollLeft(-wheelDelta + $(this).scrollLeft());
//         }
//     })
// }

// row_scroll();

// PC
if (!isMobile()) {
    // 이미지 클릭했을 때
    $('.image-link').on('click', function() {
        $('#archive-titles, .archive').hide();
        // $('.archive').removeClass('title-flex-class');
        $('#image-titles').css('display', 'flex');
        $('.category').show();
        $('#image-titles').addClass('title-flex-class-pc');
    })

    // 아카이브 클릭했을 때
    $('.archive-link').on('click', function() {
        $('#image-titles, .category').hide();
        // $('.category').removeClass('title-flex-class');
        $('#archive-titles').css('display', 'flex');
        $('.archive').show();
        $('#archive-titles').addClass('title-flex-class-pc');
    })
} else { // MOBILE
    // 이미지 목록 선택했을 때
    $('.image-link').on('click', function() {
        // $('html, body').css('overflow', 'auto');

        // 오른쪽 위 네모 회전
        $('.mobile-squre img').css('transform', 'rotate(45deg)');
        $('.mobile-squre img').css('transition', 'all 0.3s linear');
        
        // 맨 위 빼고 메뉴 가리기
        $('.image-link, .archive-link, .email-link, .social-link, .mobile-text, .mobile-text2').hide();

        // 맨위 메뉴에 클래스 추가
        $('.main-link').addClass('header-click-class-m');

        // header 의 margin 빼서 메뉴바 모양 맞추기
        $('#header').css('margin', '0');

        // 카테고리 보이기
        $('.category').show();
    })

    // 아카이브 목록 선택했을 때
    $('.archive-link').on('click', function() {
        // 오른쪽 위 네모 회전
        $('.mobile-squre img').css('transform', 'rotate(45deg)');
        $('.mobile-squre img').css('transition', 'all 0.3s linear');
        
        // 맨 위 빼고 메뉴 가리기
        $('.image-link, .archive-link, .email-link, .social-link, .mobile-text, .mobile-text2').hide();

        // 맨위 메뉴에 클래스 추가
        $('.main-link').addClass('header-click-class-m');

        // header 의 margin 빼서 메뉴바 모양 맞추기
        $('#header').css('margin', '0');

        // 아카이브 보이기
        $('.archive').show();
    })
}

// M - 오른쪽 위 메인버튼
if (isMobile) {
    $('.mobile-squre').on('click', function() {
        // 오른쪽 위 검은색 네모 회전 원래대로
        $('.mobile-squre img').css('transform', 'unset');

        // 카테고리랑 아카이브 모두 다 가리기
        $('.category, .archive').hide();

        // 메뉴 표시
        $('.image-link, .archive-link, .email-link, .social-link, .mobile-text, .mobile-text2').show();

        // 맨위 메뉴에 클래스 제거
        $('.main-link').removeClass('header-click-class-m');
    })
}

// PC - 이미지 카테고리 클릭했을 때
$('#image-titles > .category').each(function() {
    this.addEventListener('click', function() {
        // 해당 카테고리 숨기고
        $(this).hide();

        // 컨텐츠 보이고
        $(this).siblings('.contents').css('display', 'block');
        
        // 슬라이드로 보이기
        $('.contents').slick({
            // 'centerMode': true,
            'arrows': false
        });
    })
})

// $(document).ready(function(){
//     $('.contents').slick({
//         'centerMode': true,
//         'arrows': false
//     });
// });






// 이미지 클릭했을 때
// $('#image-titles > div').each(function() {
//     this.addEventListener('click', function() {
//         // 클릭 안된 것들 다시 본래색으로
//         $('#titles > div').each(function() {
//             $(this).css('color', '#808080');
//         })

//         // 클릭한 것들만 검은색으로
//         $(this).css('color', '#000000');

//         // 카테고리마다 몇개의 이미지 있는지 가리기
//         $('.content-count').each(function() {
//             $(this).hide();
//         })

//         if (!isMobile()) { // PC
//             let category = $(this).children(".category").text();

//             $('.contents').each(function(index, elem) {
//                 // 해당 class 가 있다면 보여주고
//                 if ($(this).hasClass(category)) {
//                     // $('.contents, .content').css('display', 'block');
//                     $(this).css('display', 'flex');

//                     // 가로 가 더 긴 이미지들 줄이기
//                     $(this).find('img').each(function(index, elem) {
//                         let imgWidth = $(this).data('width');
//                         let imgHeight = $(this).data('height');

//                         if (imgWidth > imgHeight) {
//                             $(this).css('height', '480px');
//                             $(this).css('margin-top', '16%');
//                         }
//                     });

//                     // 간격 조절하기
//                     let leftSize = 0;
//                     $(this).children('.content').each(function(index, elem) {
//                         $(this).css('left', leftSize+'px');
//                         leftSize += Number($(this).width()) + 30;
//                     })

//                 } else { // 해당 class 가 없다면 가리기
//                     $(this).hide();
//                 }
//             });
//         } else { // MOBILE
//             $('.archive-link').hide();
//             // image count 에 숫자 넣기
//             let imageCount = $(this).find('.content-count').text();

//             // $('#image-count').text('1/'+imageCount);

//             let category = $(this).children(".category").text();

//             $('.contents').each(function(index, elem) {
//                 // 해당 class 가 있다면 보여주고
//                 if ($(this).hasClass(category)) {
//                     $(this).show();

//                     // 재클릭했을 때 오류 방지 위해
//                     $(this).removeClass('content-slide');
//                     $(this).removeClass('slick-initialized');

//                     // 해당 카테고리만 content-slide class 추가
//                     $(this).addClass('content-slide');

//                     // 가로 가 더 긴 이미지들 줄이기
//                     $(this).find('img').each(function(index, elem) {
//                         let imgWidth = $(this).data('width');
//                         let imgHeight = $(this).data('height');

//                         if (imgWidth > imgHeight) {
//                             $(this).css('height', '50%');
//                             $(this).css('margin-top', '36%');
//                         }
//                     });
//                 } else { // 해당 class 가 없다면 가리기
//                     $(this).hide();

//                     // 재클릭했을 때 오류 방지 위해
//                     $(this).removeClass('content-slide');
//                     $(this).removeClass('slick-initialized');
//                     $('.archive-contents').removeClass('content-slide');
//                     $('.archive-contents').removeClass('slick-initialized');
//                 }
//             });

//             $('#image-titles').hide();
//             $('html').css('overflow', 'hidden');
//             // $('#image-count-div').show();

//             // 오른쪽 위 검은색 네모 회전
//             $('.mobile-squre img').css('transform', 'rotate(45deg)');
//             $('.mobile-squre img').css('transition', 'all 0.3s linear');

//             // 회전한 네모 누를시 목록처럼 나오게 하기 (위의 코드 중복)
//             $('.mobile-squre img').on('click', function() {
//                 $('#main, #image-titles').show();
//                 $('html').css('position', 'static');
//                 $('body').css('overflow-x', 'hidden');
//                 $('html').css('overflow-y', 'auto');
//                 // $('#image-count-div').hide();
                
//                 $('.archive-link, .email-link, .social-link, .mobile-text, .mobile-text2').hide();

//                 // 오른쪽 위 검은색 네모 회전 원래대로
//                 $('.mobile-squre img').css('transform', 'unset');
//             })

//             $('.content-slide').slick({
//                 arrows: false,
//                 infinite: false
//             });

//             $(".slider").not('.slick-initialized').slick();

//             $('.content-slide').on('init reInit afterChange', function(event, slick, currentSlide, nextSlide){
//                 var i = (currentSlide ? currentSlide : 0) + 1;

//                 $('#image-count').text(i + '/' + imageCount);
//             });

            
//         }

        
//     })
// });

// // 아카이브 이미지 클릭
// $('#archive-titles > div').each(function() { 
//     this.addEventListener('click', function() {
//         // 클릭 안된 것들 다시 본래색으로
//         $('#archive-titles > div').each(function() {
//             $(this).css('color', '#808080');
//         })

//         // 클릭한 것들만 검은색으로
//         $(this).css('color', '#000000');

//         // 카테고리마다 몇개의 이미지 있는지 가리기
//         $('.archive-content-count').each(function() {
//             $(this).css('display', 'none');
//         })

//         if (!isMobile()) { // PC
//             let archive = $(this).children(".archive").text();

//             $('.archive-contents').each(function(index, elem) {
//                 // 해당 class 가 있다면 보여주고
//                 if ($(this).hasClass(archive)) {
//                     $(this).css('display', 'flex');

//                     // 가로 가 더 긴 이미지들 줄이기
//                     $(this).find('img').each(function(index, elem) {
//                         let imgWidth = $(this).data('width');
//                         let imgHeight = $(this).data('height');

//                         if (imgWidth > imgHeight) {
//                             $(this).css('height', '480px');
//                             $(this).css('margin-top', '16%');
//                         }
//                     });

//                     // 간격 조절하기
//                     let leftSize = 0;
//                     $(this).children('.content').each(function(index, elem) {
//                         $(this).css('left', leftSize+'px');
//                         leftSize += Number($(this).width()) + 30;
//                     })

//                 } else { // 해당 class 가 없다면 가리기
//                     $(this).hide();
//                 }
//             });
//         } else { // MOBILE
//             $('.image-link').hide();
            
//             // image count 에 숫자 넣기
//             let archiveCount = $(this).find('.archive-content-count').text();

//             $('#archive-count').text('1/'+archiveCount);

//             let archive = $(this).children(".archive").text();

//             $('.archive-contents').each(function(index, elem) {
//                 // 해당 class 가 있다면 보여주고
//                 if ($(this).hasClass(archive)) {
//                     $(this).css('display', 'block');

//                     // 재클릭했을 때 오류 방지 위해
//                     $(this).removeClass('content-slide');
//                     $(this).removeClass('slick-initialized');

//                     // 해당 카테고리만 content-slide class 추가
//                     $(this).addClass('content-slide');

//                     // 가로 가 더 긴 이미지들 줄이기
//                     $(this).find('img').each(function(index, elem) {
//                         let imgWidth = $(this).data('width');
//                         let imgHeight = $(this).data('height');

//                         if (imgWidth > imgHeight) {
//                             $(this).css('height', '50%');
//                             $(this).css('margin-top', '36%');
//                         }
//                     });
//                 } else { // 해당 class 가 없다면 가리기
//                     $(this).hide();

//                     // 재클릭했을 때 오류 방지 위해
//                     $(this).removeClass('content-slide');
//                     $(this).removeClass('slick-initialized');
//                     $('.contents').removeClass('content-slide');
//                     $('.contents').removeClass('slick-initialized');
//                 }
//             });

//             $('#archive-titles').css('display', 'none');
//             $('html').css('overflow', 'hidden');
//             // $('#archive-count-div').css('display', 'block');

//             // 오른쪽 위 검은색 네모 회전
//             $('.mobile-squre img').css('transform', 'rotate(45deg)');
//             $('.mobile-squre img').css('transition', 'all 0.3s linear');

//             // 회전한 네모 누를시 목록처럼 나오게 하기 (위의 코드 중복)
//             $('.mobile-squre img').on('click', function() {
//                 $('#main').show();
//                 $('#image-titles').show();
//                 $('html').css('position', 'static');
//                 $('body').css('overflow-x', 'hidden');
//                 $('html').css('overflow-y', 'auto');
//                 // $('#archive-count-div').hide();
                
//                 $('.image-link, .email-link, .social-link, .mobile-text, .mobile-text2').hide();

//                 // 오른쪽 위 검은색 네모 회전 원래대로
//                 $('.mobile-squre img').css('transform', 'unset');
//             })

//             $('.content-slide').slick({
//                 arrows: false,
//                 infinite: false
//             });

//             $(".slider").not('.slick-initialized').slick();

//             $('.content-slide').on('init reInit afterChange', function(event, slick, currentSlide, nextSlide){
//                 var i = (currentSlide ? currentSlide : 0) + 1;

//                 $('#archive-count').text(i + '/' + archiveCount);
//             });

            
//         }

        
//     })
// });