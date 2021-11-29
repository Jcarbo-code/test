{include 'templates/header.tpl'}

<h1>{$title} </h1>
<div>
{if count($products) == 0}
<p> No hay productos de esta categoria </p>
{/if}
    <ul>
        {foreach from=$products item=$product}
        <li>
            <p> {$product->nombre} {$product->descripcion}, {$product->precio}
            </p>
        </li>
        {/foreach}
    </ul>
</div>

{include 'templates/footer.tpl'}