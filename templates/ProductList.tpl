{include 'templates/header.tpl'}

<h1 class="text-uppercase fw-light container" style="width: 60rem">{$title}</h1>
{if isset($error)}
    <h4 class="alert-danger">{$error}</h4>
{else}
    <div class="card container" style="width: 60rem; margin-bottom: 5%;">
        <ul class="list-group list-group-flush">
            {foreach from=$products item=$product}
                <li class="list-group-item">
                    <p> {$product->nombre} ({$product->categoria}, {$product->local}) <a class="btn btn-link btn-sm"
                            href="product/detalle/{$product->id_product}">
                            Ver más</a>
                        {if $isLogged && $isAdmin}
                            <button class="btn"> <a class="btn btn-warning " href='product/editar/{$product->id_product}'>Editar
                                </a></button>
                            <button class="btn"> <a class="btn btn-danger "
                                    href="product/eliminar/{$product->id_product}">Eliminar</a>
                            </button>
                        {/if}
                    </p>
                </li>
            {/foreach}
        </ul>

        <div class="container mt-3 mb-3">

            <div class="row justify-content-center align-items-center">

                {for $page=1 to $cantidadPag}
                    <div class="col-1">
                        <a href="product?page={$page}"><img src="https://img.icons8.com/ios/26/000000/{$page}.png" /></a>
                    </div>
                {/for}
            </div>
        </div>
    </div>


    {if $isLogged && $isAdmin}
        <div class="container" style="width: 60rem; margin-bottom: 5%;">
            <h2 class="text-primary m-3">Agregar producto</h2>
            <form class="mb-3" action="product/agregar" method="POST" style="width: 30rem">
                <label class="form-label">nombre</label>
                <input class="form-control" name="nombre" placeholder="Nombre">
                <label class="form-label">descripcion</label>
                <input class="form-control" name="descripcion" placeholder="descripcion">
                <label class="form-label">precio</label>
                <input class="form-control" name="precio" placeholder="precio">
                {* <label class="form-label">imagen</label>
                <input class="form-control" name="image" type="image" placeholder="imagen"> *}
                <label class="form-label" for="id_category">Categoria</label>
                <select class="form-select" name="id_category">
                    {foreach from=$categorys item=$category}
                        <option value="{$category->id_category}">{$category->categoria}, {$category->local} </option>
                    {/foreach}
                </select>

                <button class="btn btn-primary m-2" type="submit">Agregar</button>

            </form>
        {/if}
    </div>
{/if}

{include 'templates/footer.tpl'}