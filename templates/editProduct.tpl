{include 'templates/header.tpl'}

<form class="container mb-3" style="width: 60rem" action="product/edit/{$id}" method="POST" enctype="multipart/form-data">
    <label class="form-label">nombre</label>
    <input class="form-control" name="nombre" placeholder="nombre" value="{$nombre}">
    <label class="form-label">descripcion</label>
    <input class="form-control" name="descripcion" placeholder="descripcion" value="{$descripcion}">
    <label class="form-label">precio</label>
    <input class="form-control" name="precio" placeholder="precio" value="{$precio}">
    <label class="form-label">Agregar/cambiar imagen</label>
    <input class="form-control" name="newImagen" type="file" placeholder="imagen">
    <div>
        <img src="{$imagen}" class="img-fluid" >
    </div>
    <button class="btn btn-warning m-2" type="submit">Editar</button>
</form>
{include 'templates/footer.tpl'}