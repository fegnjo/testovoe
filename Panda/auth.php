<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="Css/registration.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<body>
<div class="container">
    <h1>Вход</h1>
    <form class="form-group">
        <input type="text" class="form-control" name="login" placeholder="Введите логин"><br>
        <input type="password" class="form-control" name="password" placeholder="Введите пароль"><br>
        <input type="submit" class="btn btn-primary" id="button" value="Войти">
    </form>
    <a href="registration.php">Не зарегистрированы?</a>
</div>

<div id="message"></div>
<script>
    $(document).ready(function() {
        $('form').submit(function(event) {
            event.preventDefault();

            $.ajax({
                url: "layuots/SingIn.php",
                method: 'POST',
                data: $(this).serialize(),
                success: function(result) {
                    if (result === 'success')
                        window.location = 'LK.php';
                    else
                        $('#message').html(result);
                },
            });
        });
    });
</script>
</body>
</html>
