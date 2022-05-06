<a href=".">목록으로</a>
<br>
<br>

<h1><?=$sCategory?></h1>

<?=form_open_multipart('admin/uploadexec/');?>
    <input type="hidden" name="category" value="<?=$sCategory?>">
    <input type="file" name="userfile" size="20">
    <br>
    <br>
    <input type="submit" value="업로드">
</form>

<br>
<br>

<?php foreach ($aCategoryImage as $value) : ?>
    <div>
        <input type="hidden" name="contentIdx" value="<?=$value['content_idx']?>">
        <img src="../../uploads/<?=$value['category']?>/<?=$value['file_name']?>" alt="" style="width: 50%;">
        <div><?=$value['file_name']?></div>

        <form action="./deleteImage" method="POST">
            <input type="hidden" name="contentIdx" value="<?=$value['content_idx']?>">
            <input type="hidden" name="category" value="<?=$value['category']?>">
            <input type="hidden" name="fileName" value="<?=$value['file_name']?>">
            <input type="submit" value="삭제하기">
        </form>
    </div>
    <br>
    <br>
<?php endforeach ?>