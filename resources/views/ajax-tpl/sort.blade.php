@foreach( $products as $product)
    @widget('product', ['model'=> $product])
@endforeach
