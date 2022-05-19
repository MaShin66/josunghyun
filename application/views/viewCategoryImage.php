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
</style>

<a href=".">목록으로</a>
<br>
<br>

<h1><?=$sCategory?></h1>

<?=form_open_multipart('admin/insertImage/');?>
    <input type="hidden" name="category" value="<?=$sCategory?>">
    <img style="width: 300px;" id="preview-image" src="https://dummyimage.com/500x500/ffffff/000000.png&text=preview+image">
    <br>
    <input type="file" id="input-image" name="userfile" size="20">
    <br>
    <br>
    <input type="submit" value="업로드">
</form>

<br>
<br>

<form action="./contentorder" method="POST">
<input type="submit" value="순서바꾸기">
    <ol id="sortable">
        <?php foreach ($aCategoryImage as $value) : ?>
            <li>
                <div>
                    <input type="hidden" name="contentId[]" value="<?=$value['content_idx']?>">
                    <img src="../../uploads/<?=$value['category']?>/<?=$value['file_name']?>" alt="" style="width: 50%;">
                    <div><?=$value['file_name']?></div>

                        <button type="button" class="delete-button">
                            <input type="hidden" name="contentIdx" value="<?=$value['content_idx']?>">
                            <input type="hidden" name="category" value="<?=$value['category']?>">
                            <input type="hidden" name="fileName" value="<?=$value['file_name']?>">
                            삭제하기
                        </button>

                </div>
            </li>
        <?php endforeach ?>
    </ol?>
</form>

<script>
    $(function() {
        $("#sortable").sortable();
        $("#sortable").disableSelection();
    });

    $('.delete-button').each(function() {
        $(this).click(function() {
            let newForm = $('<form></form>');
	
            newForm.attr("method","post");
            newForm.attr("action","./deleteImage");

            let contentIdx = $(this).children('input[name="contentIdx"]').val();
            let category = $(this).children('input[name="category"]').val();
            let fileName = $(this).children('input[name="fileName"]').val();

            newForm.append($('<input/>', {type: 'hidden', name: 'contentIdx', value: contentIdx }));
            newForm.append($('<input/>', {type: 'hidden', name: 'category', value: category }));
            newForm.append($('<input/>', {type: 'hidden', name: 'fileName', value: fileName }));
        
            newForm.appendTo('body');
        
            newForm.submit();
        })
    })

    // 파일 미리보기
    function readImage(input) {
        // 인풋 태그에 파일이 있는 경우
        if(input.files && input.files[0]) {
            // 이미지 파일인지 검사 (생략)
            // FileReader 인스턴스 생성
            const reader = new FileReader()
            // 이미지가 로드가 된 경우
            reader.onload = e => {
                const previewImage = document.getElementById("preview-image")
                previewImage.src = e.target.result
            }
            // reader가 이미지 읽도록 하기
            reader.readAsDataURL(input.files[0])
        }
    }
    // input file에 change 이벤트 부여
    const inputImage = document.getElementById("input-image")
    inputImage.addEventListener("change", e => {
        readImage(e.target)
    })
</script>