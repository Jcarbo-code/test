<!DOCTYPE html>
<html lang="en">

<head>
    <base href='{BASE_URL}'>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">

    <!-- development version, includes helpful console warnings -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
  
    <title>ANDEL</title>
</head>

<body style="background-color:#F2F2F2">
    <nav class="navbar navbar-expand-sm bg-gradient shadow-sm p-3 mb-5 navbar-dark bg-dark">

        <a class="navbar-brand mb-0 h1">
            <img class="d-inline-block aling-top" src="img//logo.gif" width="100" heigh="130" href="home"> ANDEL
        </a>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active"><a class="nav-link"  href="product">product</a></li>
                <li class="nav-item active"><a class="nav-link" href="category">category</a></li>
                {if !isset($isLogged) || !$isLogged}
                    <li class="nav-item active"><a class="nav-link" href="login">Login</a></li>
                    <li class="nav-item active"><a class="nav-link" href="register">Registrate</a></li>
                {/if}
                {if isset($isLogged) && $isLogged && $isAdmin}
                    <li class="nav-item active"><a class="nav-link" href="usuarios">Usuarios</a></li>
                {/if}
                {if isset($isLogged) && $isLogged}
                    <li class="nav-item active"><a class="nav-link" href="logout">Logout</a></li>
                {/if}
            </ul>
        </div>
    </nav>