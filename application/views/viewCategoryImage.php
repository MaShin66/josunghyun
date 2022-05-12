<style>
    #sortable
    li {
        width: 30%;
    }
</style>

<a href=".">목록으로</a>
<br>
<br>

<h1><?=$sCategory?></h1>

<form action="./categoryUpdate" method="GET">
        <input type="hidden" name="id" value="<?=$sCategoryId?>">
        <input type="hidden" name="oldCategory" value="<?=$sCategory?>">
        <input type="text" name="newCategory" value="<?=$sCategory?>" style="width: 30%">
        <input type="submit" value="카테고리 이름 수정">
    </form>

<form action="./categoryDelete" method="POST">
    <input type="hidden" name="id" value="<?=$sCategoryId?>">
    <input type="hidden" name="category" value="<?=$sCategory?>">
    <input type="submit" value="카테고리 삭제하기">
</form>

<?=form_open_multipart('admin/insertImage/');?>
    <input type="hidden" name="category" value="<?=$sCategory?>">
    <input type="file" name="userfile" size="20">
    <br>
    <br>
    <input type="submit" value="업로드">
</form>

<br>
<br>

<ol id="sortable">
    <?php foreach ($aCategoryImage as $value) : ?>
        <li>
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
        </li>
        <br>
        <br>
    <?php endforeach ?>