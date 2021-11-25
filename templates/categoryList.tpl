{include 'templates/header.tpl'}

<h1 class="text-uppercase fw-light container" style="width: 60rem">{$title}</h1>
{if isset($error)}
    <h4 class="alert-danger">{$error}</h4>
{else}
    <div class="card container mb-5" style="width: 60rem">
        <ul class="list-group list-group-flush">
            {foreach from=$categorys item=$category}
                <li class="list-group-item">
                    <p> {$category->categoria}, {$category->local} ({$category->fecha_menu}), {$category->descripcion}- &nbsp;
                        <a class="btn btn-link btn-sm" href="category/product/{$category->id_category}">Ver product</a>
                        {if $isLogged && $isAdmin}
                            <button class="btn"> <a class="btn btn-danger" href='category/editar/{$category->id_category}'>Editar
                                </a></button>
                            <button class="btn"> <a class="btn btn-warning"
                                    href="category/eliminar/{$category->id_category}">Eliminar</a> </button>
                        {/if}
                    </p>
                </li>
            {/foreach}
        </ul>
    </div>

    {if $isLogged && $isAdmin}
        <div class="container" style="width: 60rem; margin-bottom:10%;">
            <h2 class="text-primary m-3">Agregar categoria</h2>
            <form style="width: 30rem" class="mb-3" action="category/agregar" method="POST">
                <label class="form-label">categoria</label>
                <input class="form-control" name="categoria" type="text" placeholder="categoria">
                <label class="form-label">local</label>
                <input class="form-control" name="local" type="text" placeholder="local">
                <label class="form-label">Fecha agregada</label>
                <input class="form-control" name="fecha_menu" type="date" placeholder="fecha_menu">
                <label class="form-label">descripcion</label>
                <textarea class="form-control" name="descripcion" type="text" placeholder="descripcion">
                    </textarea>

                <button class="btn btn-primary m-2" type="submit">Agregar</button>

            </form>
            {if isset($error)}
                <p>{$error}</p>
            {/if}
        </div>
    {/if}
{/if}
{include 'templates/footer.tpl'}