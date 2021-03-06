<link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js" ></script>
<script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" ></script>

<style>
    #sortable 
    li {
        border: 1px solid black;
        /* width: 100%; */
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
                <div>
                    <a class="category-name" href="./categoryImage?name=<?=$value['name']?>"><?=$value['name']?></a>

                    <span style="margin-left: 2%">(<?=$value['count']?>)</span>
                    
                    
                    <input type="hidden" name="sId" value="<?=$value['id']?>">
                    <input type="hidden" name="oldCategory" value="<?=$value['name']?>">
                    <input type="text" name="newCategory" value="<?=$value['name']?>">
                    <button type="button" class="update-button">이름 수정</button>

                    <button type="button" class="delete-button">
                        <input type="hidden" name="sId" value="<?=$value['id']?>">
                        <input type="hidden" name="category" value="<?=$value['name']?>">
                        삭제하기
                    </button>                    
                    
            </div>
            </li>
        <?php endforeach ?>
    </ol>
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
            newForm.attr("action","./categoryDelete");

            let sId = $(this).children('input[name="sId"]').val();
            let category = $(this).children('input[name="category"]').val();

            newForm.append($('<input/>', {type: 'hidden', name: 'sId', value: sId }));
            newForm.append($('<input/>', {type: 'hidden', name: 'category', value: category }));
        
            newForm.appendTo('body');
        
            newForm.submit();
        })
    })

    $('.update-button').each(function() {
        $(this).click(function() {
            let newForm = $('<form></form>');
	
            newForm.attr("method", "POST");
            newForm.attr("action", "./categoryUpdate");

            console.log(this);

            let sId = $(this).siblings('input[name="sId"]').val();
            let oldCategory = $(this).siblings('input[name="oldCategory"]').val();
            let newCategory = $(this).siblings('input[name="newCategory"]').val();

            newForm.append($('<input/>', {type: 'hidden', name: 'sId', value: sId }));
            newForm.append($('<input/>', {type: 'hidden', name: 'oldCategory', value: oldCategory }));
            newForm.append($('<input/>', {type: 'hidden', name: 'newCategory', value: newCategory }));
        
            newForm.appendTo('body');
        
            newForm.submit();
        })
    })
</script>