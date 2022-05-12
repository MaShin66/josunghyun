<link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js" ></script>
<script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" ></script>

<style>
    #sortable 
    li {
        border: 1px solid black;
        width: 50%;
        padding: 1%;
    }

    #sortable
    li
    a {
        text-decoration: none;
    }
</style>

<a href=".">목록으로</a>
<br>
<br>

<form action="./categoryinsert" method="GET">
    <input type="text" name="category" value="">
    <input type="submit" value="추가하기">
</form>

<form action="./categoryorder" method="POST">
    <input type="submit" value="순서바꾸기">
    <ol id="sortable">
        <?php foreach ($aCategory as $value) : ?>
            <li>
                <input type="hidden" name="categoryId[]" value="<?=$value['id']?>">
                <input type="hidden" name="categoryOrder[]" value="<?=$value['orderNumber']?>">
                <input type="hidden" name="categoryName[]" value="<?=$value['name']?>">
                <div><a href="./categoryImage?name=<?=$value['name']?>"><?=$value['name']?></a></div>
            </li>
        <?php endforeach ?>
    </ol>
</form>

<script>
    $(function() {
        $("#sortable").sortable();
        $("#sortable").disableSelection();
});
</script>