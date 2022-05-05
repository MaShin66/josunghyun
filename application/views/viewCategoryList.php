<a href=".">목록으로</a>
<br>
<br>

<form action="./categoryinsert" method="GET">
    <input type="text" name="category" value="">
    <input type="submit" value="추가하기">
</form>

<?php foreach ($aCategory as $value) : ?>
    <div><a href="./categoryImage?name=<?=$value['name']?>"><?=$value['name']?></a></div>
    <form action="./categoryupdate" method="GET">
        <input type="hidden" name="id" value="<?=$value['id']?>">
        <input type="hidden" name="oldCategory" value="<?=$value['name']?>">
        <input type="text" name="newCategory" value="<?=$value['name']?>" style="width: 30%">
        <input type="submit" value="수정">
    </form>
<?php endforeach ?>