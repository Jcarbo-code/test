
<body style="background-color:#F2F2F2">
<nav class="navbar navbar-expand-sm bg-gradient shadow-sm p-3 mb-5 navbar-dark bg-dark">

    <a class="navbar-brand mb-0 h1" href="home">
        <img class="d-inline-block aling-top" src="img//logo.gif" width="100" heigh="130"> ANDEL
    </a>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active"><a class="nav-link"  href="product">Productos</a></li>
            <li class="nav-item active"><a class="nav-link" href="category">Categorias</a></li>
            <li class="nav-item active"><a class="nav-link" href="nosotros">Nosotros</a></li>
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
            <li class="nav-item active"><a class="nav-link" href="home">Buscar producto</a></li>
        </ul>
    </div>
</nav>