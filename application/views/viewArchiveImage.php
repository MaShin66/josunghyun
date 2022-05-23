<link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js" ></script>
<script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" ></script>

<style>
    #sortable
    li {
        width: 30%;
        border: 1px solid black;
        padding: 1%;
    }
    #sortable {
        display: flex;
        flex-wrap: wrap;
    }

    ul {
        list-style-type: none;
    }
</style>

<a href=".">목록으로</a>
<br>
<br>

<h1><?=$sArchive?></h1>

<?=form_open_multipart('admin/insertArchive/');?>
    <input type="hidden" name="archive" value="<?=$sArchive?>">
    <input type="file" id="input_imgs" name="userfile[]" size="20" multiple>
    <input type="submit" value="업로드">
    <div class="imgs_wrap" style="width: 300px; display: flex; align-items: center;"></div>    
</form>

<br>
<br>

<form action="./archiveorder" method="POST">
<input type="submit" value="순서바꾸기">
    <ol id="sortable">
        <?php foreach ($aArchiveImage as $value) : ?>
            <li>
                <div>
                    <input type="hidden" name="contentId[]" value="<?=$value['content_idx']?>">
                    <img src="../../uploads/<?=$value['archive']?>/<?=$value['file_name']?>" alt="" style="width: 50%;">
                    <div><?=$value['file_name']?></div>

                        <button type="button" class="delete-button">
                            <input type="hidden" name="contentIdx" value="<?=$value['content_idx']?>">
                            <input type="hidden" name="archive" value="<?=$value['archive']?>">
                            <input type="hidden" name="fileName" value="<?=$value['file_name']?>">
                            삭제하기
                        </button>

                </div>
            </li>
        <?php endforeach ?>
    </ol>
</form>

<script>
let sel_files = [];

$(document).ready(function() {
    $("#input_imgs").on("change", handleImgsFilesSelect);
});

function handleImgsFilesSelect(e) {
    // 한 번에 하나씩 선택하면 그것만 업로드 되도록 이전 미리보기 삭제
    $(".imgs_wrap").children().remove();

    let files = e.target.files;

    let filesArr = Array.prototype.slice.call(files);

    filesArr.forEach(function(f) {
        sel_files.push(f);

        let reader = new FileReader();

        reader.onload = function(e) {
            let img_html = "<img style='width: 100%' src=\"" + e.target.result + "\" />";
            $(".imgs_wrap").append(img_html);
        }
        reader.readAsDataURL(f);
    })
}


    $(function() {
        $("#sortable").sortable();
        $("#sortable").disableSelection();
    });

    $('.delete-button').each(function() {
        $(this).click(function() {
            let newForm = $('<form></form>');
	
            newForm.attr("method","post");
            newForm.attr("action","./deleteArchiveImage");

            let contentIdx = $(this).children('input[name="contentIdx"]').val();
            let archive = $(this).children('input[name="archive"]').val();
            let fileName = $(this).children('input[name="fileName"]').val();

            newForm.append($('<input/>', {type: 'hidden', name: 'contentIdx', value: contentIdx }));
            newForm.append($('<input/>', {type: 'hidden', name: 'archive', value: archive }));
            newForm.append($('<input/>', {type: 'hidden', name: 'fileName', value: fileName }));
        
            newForm.appendTo('body');
        
            newForm.submit();
        })
    })

    // 파일 미리보기
    // function readImage(input) {
    //     // 인풋 태그에 파일이 있는 경우
    //     if(input.files && input.files[0]) {
    //         // 이미지 파일인지 검사 (생략)
    //         // FileReader 인스턴스 생성
    //         const reader = new FileReader()
    //         // 이미지가 로드가 된 경우
    //         reader.onload = e => {
    //             const previewImage = document.getElementById("preview-image")
    //             previewImage.src = e.target.result
    //         }
    //         // reader가 이미지 읽도록 하기
    //         reader.readAsDataURL(input.files[0])
    //     }
    // }
    // // input file에 change 이벤트 부여
    // const inputImage = document.getElementById("input-image")
    // inputImage.addEventListener("change", e => {
    //     readImage(e.target)
    // })
</script>