{include 'templates/header.tpl'}
<div class="container">
    <h1>{$title}</h1>

    <div class="row">
        <h2>{$product->nombre} - {$product->nombre}, {$product->local}</h2>
        <p>{$product->descripcion}</p>
        <p>{$product->precio} - {$product->image}</p>
    </div>
</div>


{include 'templates/footer.tpl'}