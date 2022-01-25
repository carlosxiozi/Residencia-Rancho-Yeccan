<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section class="login">
        <div class="login-container">
            <form action="/login" method="POST">
                @csrf
                <input type="text" class="login-nombre-usuario" name="usuario">
                <input type="password" class="login-password" name="contrasena">
                <button type="submit">Iniciar sesión</button>
            </form>
        </div>
    </section>
</body>
</html>