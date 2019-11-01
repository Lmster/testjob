
<form class="was-validated" method='post'>
    <input class='form-control mb-1 is-invalid' type='text' required name='name' placeholder='Имя пользователя'>
    <input class='form-control mb-1 is-invalid' type='email' required name='email' placeholder='Email'>
    <textarea class='form-control mb-2 is-invalid' name='text' required placeholder='Текст задачи'></textarea>

    <input class='btn btn-primary' type='submit' name='add' value='Добавить'>
</form>

<?php if($added){?>
    <script>alert('Добавлено');</script>
<?php }?>
