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

<form action="./archiveinsert" method="GET">
    <input type="text" name="archive" value="">
    <input type="submit" value="추가하기">
</form>

<form action="./archiveorder" method="POST">
    <input type="submit" value="순서바꾸기">
    <ol id="sortable">
        <?php foreach ($aArchive as $value) : ?>
            <li>
                <input type="hidden" name="archiveId[]" value="<?=$value['id']?>">
                <div>
                    <a class="archive-name" href="./archiveImage?name=<?=$value['name']?>"><?=$value['name']?></a>

                    <span style="margin-left: 2%">(<?=$value['count']?>)</span>
                    
                    
                    <input type="hidden" name="sId" value="<?=$value['id']?>">
                    <input type="hidden" name="oldarchive" value="<?=$value['name']?>">
                    <input type="text" name="newarchive" value="<?=$value['name']?>">
                    <button type="button" class="update-button">이름 수정</button>

                    <button type="button" class="delete-button">
                        <input type="hidden" name="sId" value="<?=$value['id']?>">
                        <input type="hidden" name="archive" value="<?=$value['name']?>">
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
            newForm.attr("action","./archiveDelete");

            let sId = $(this).children('input[name="sId"]').val();
            let archive = $(this).children('input[name="archive"]').val();

            newForm.append($('<input/>', {type: 'hidden', name: 'sId', value: sId }));
            newForm.append($('<input/>', {type: 'hidden', name: 'archive', value: archive }));
        
            newForm.appendTo('body');
        
            newForm.submit();
        })
    })

    $('.update-button').each(function() {
        $(this).click(function() {
            let newForm = $('<form></form>');
	
            newForm.attr("method", "POST");
            newForm.attr("action", "./archiveUpdate");

            console.log(this);

            let sId = $(this).siblings('input[name="sId"]').val();
            let oldarchive = $(this).siblings('input[name="oldarchive"]').val();
            let newarchive = $(this).siblings('input[name="newarchive"]').val();

            newForm.append($('<input/>', {type: 'hidden', name: 'sId', value: sId }));
            newForm.append($('<input/>', {type: 'hidden', name: 'oldArchive', value: oldarchive }));
            newForm.append($('<input/>', {type: 'hidden', name: 'newArchive', value: newarchive }));
        
            newForm.appendTo('body');
        
            newForm.submit();
        })
    })
</script>