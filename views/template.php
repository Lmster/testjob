<!DOCTYPE html>
<html>
<head>
    <title>Test job</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
        <div class='container'>
            <a class="navbar-brand" href="/">Test job</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class='ml-auto'>
                    <?php if(Session::instance()->get('logged')){?>
                        <div class='input-group align-items-center'>
                            <div class="text-white pr-3">
                                Здравствуйте, админ
                            </div>

                            <div class='input-group-append'>
                                <form method='post'>
                                    <input class='btn btn-warning btn-sm' type='submit' name='logout' value='Выйти'>
                                </form>
                            </div>
                        </div>
                    <?php } else{?>
                        <form method='post'>
                            <div class='input-group'>
                                <input class='form-control form-control-sm' type='text' name='name' required placeholder='Логин'>
                                <input class='form-control form-control-sm' type='password' name='password' required placeholder='Пароль'>

                                <div class='input-group-append'>
                                    <input class='btn btn-success btn-sm' type='submit' name='login' value='Авторизоваться'>
                                </div>
                            </div>
                        </form>
                    <?php }?>
                </div>
            </div>
        </div>
    </nav>
</header>

<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
    <div class="container">
        <?=$content?>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
