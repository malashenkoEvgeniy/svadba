<ul class="rubric-products-list">
    @foreach( $products as $product)
        @widget('product', ['model'=> $product])
    @endforeach
</ul>
<div class="block-pagination">
    {{ $products->links() }}
</div>
