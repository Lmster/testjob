
<?php if(!empty($elem)){?>
    <form class="grid-cutter-10" method='post'>
        <input class='form-control mb-1' type='text' name='name' value='<?=$elem['name']?>' placeholder='Имя пользователя'>
        <input class='form-control mb-1' type='email' name='email' value='<?=$elem['email']?>' placeholder='Email'>
        <textarea class='form-control mb-2' name='text' placeholder='Текст задачи'><?=$elem['text']?></textarea>

        <input type='hidden' name='numelem' value='<?=$numelem?>'>

        <div class='row'>
            <div class='col-auto'>
                <label class='btn btn-light border-info'>
                    <input type='hidden' name='done' value='0'>
                    <input type='checkbox' name='done' <?=!empty($elem['done']) ? 'checked' : ''?> value='1'>
                    Выполнено
                </label>
            </div>

            <div class='col-auto'>
                <input class='btn btn-success' type='submit' name='edit' value='Сохранить'>
            </div>

            <div class='col-auto'>
                <input class='btn btn-danger' type='submit' name='delete' value='Удалить'>
            </div>
        </div>
    </form>
<?php } else{?>
    <h3>Элемента не существует</h3>
<?php }?>
