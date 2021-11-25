{include 'templates/header.tpl'}

<h1 class="text-uppercase fw-light container" style="width: 60rem">{$title}</h1>

<div class="card container" style="width: 60rem">
    <ul class="list-group list-group-flush">
        {foreach from=$users item=$user}
        <li class="list-group-item">
            <p> {$user->nombre}: {$user->mail}, {$user->rol}
                {if $isLogged && $isAdmin}
                <button class="btn"> <a class="btn btn-danger" href='usuarios/editar/{$user->id_usuario}'>Editar
                    </a></button>
                <button class="btn"> <a class="btn btn-warning"
                        href="usuarios/eliminar/{$user->id_usuario}">Eliminar</a> </button>
                {/if}
            </p>
        </li>
        {/foreach}
    </ul>
</div>


{include 'templates/footer.tpl'}