{include 'templates/header.tpl'}
{if isset($error)}
    <h4 class="alert-danger">{$error}</h4>
{else}
    <h2 class="text-uppercase fw-light container" style="width: 40%">{$title}</h2>
    <form class="container mb-3" style="width: 40%" action="usuarios/edit/{$id}" method="POST">
        <label class="form-label">Nombre</label>
        <input class="form-control" name="nombre" type="text" placeholder="Nombre" value="{$nombre}">
        <label class="form-label">Email</label>
        <input class="form-control" name="mail" type="email" placeholder="Email" value="{$mail}">
        <label class="form-label">Rol</label>
        <select class="form-select" name="rol" type="text" placeholder="Rol">
            <option value="">Elegi el rol</option>
            {if $rol == 'admin'}
                <option value="admin" selected>Admin</option>
                <option value="no-admin">No-Admin</option>
            {/if}
            {if $rol == 'no-admin'}
                <option value="admin">Admin</option>
                <option value="no-admin" selected>No-Admin</option>
            {/if}
        </select>
        <button class="btn btn-warning m-2" type="submit">Editar</button>
    </form>
{/if}

{include 'templates/footer.tpl'}