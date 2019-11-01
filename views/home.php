
<a class='btn btn-primary' href='/add'>Добавить задачу</a>

<table class='table mt-3'>
    <thead class='thead-dark'>
        <tr>
            <th><a class='<?=$data['sort'] == 'name' ? 'text-info' : ''?>' href=''>Имя пользователя <?=$data['sort'] == 'name' ? $data['array'] : ''?></a></th>
            <th> <a class='<?=$data['sort'] == 'email' ? 'text-info' : ''?>' href='/?sort=email<?=$data['page']?>'>Email <?=$data['sort'] == 'email' ? $data['array'] : ''?></a></th>
            <th>Текст задачи</th>
            <th><?=$logged ? '' : '<a class=\'' . ($data['sort'] == 'done' ? 'text-info' : '') . '\' href="/?sort=done' . $data['page'] . '">Статус ' . ($data['sort'] == 'done' ? $data['array'] : '') . '</a>'?></th>
        </tr>
    </thead>

    <?php foreach($data['items'] as $numelem => $item) {?>
        <tr>
            <td><?=$item['name']?></td>
            <td><?=$item['email']?></td>
            <td><?=$item['text']?></td>
            <td>
                <?php if($logged){?>
                    <a class='btn btn-info btn-sm' href='/edit/<?=$numelem?>'>Редактировать</a>
                <?php } elseif(!empty($item['edited'])){?>
                    <div class='admin_edited text-info'>Отредактировано администратором</div>

                    <?php if($item['done']){?>
                        <span class="badge badge-primary d-block mt-2">Выполнено</span>
                    <?php }?>
                <?php }?>
            </td>
        </tr>
    <?php }?>
</table>

<?=$data['paginator']?>