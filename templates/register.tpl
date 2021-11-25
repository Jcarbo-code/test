{include 'templates/header.tpl'}

<div class="container" style="width: 70rem">
    <h2 class="text-uppercase fw-bolder container">{$nombre}</h2>
    <form action="verify-register" method="POST" style="width: 30rem">
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input class="form-control" type="text" name="nombre" placeholder="Ingrese su nombre..." />
            <label class="form-label">Email</label>
            <input class="form-control" type="text" name="email" placeholder="Ingrese su email..." />
            <label class="form-label">Contraseña</label>
            <input class="form-control" type="password" name="clave" placeholder="Ingrese su password..." />
        </div>
        <h4 class="alert-danger">{$error}</h4>
        <button class="btn btn-primary" type="submit">Crear cuenta</button>
    </form>
</div>


{include 'templates/footer.tpl'}