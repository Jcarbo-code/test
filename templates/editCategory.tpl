{include 'templates/header.tpl'}

<form class="container mb-3" style="width: 60rem" action="category/edit/{$id}" method="POST">
    <label class="form-label">categoria</label>
    <input class="form-control" name="categoria" type="text" placeholder="categoria" value="{$categoria}">
    <label>local</label>
    <input class="form-control" name="local" type="text" placeholder="local" value="{$local}">
    <label class="form-label">Fecha en menu</label>
    <input class="form-control" name="fecha_menu" type="date" placeholder="fecha_menu" value="{$fecha_menu}">
    <label class="form-label">Descripcion</label>
    <textarea class="form-control" name="descripcion" type="text" placeholder="descripcion">
        {$descripcion}
    </textarea>
    <button class="btn btn-warning m-2" type="submit">Editar</button>
</form>

{include 'templates/footer.tpl'}