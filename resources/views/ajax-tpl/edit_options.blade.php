<label for="main_available">
    Товар доступен на сайте
    <input type="checkbox" name="main-available" id="main_available">
</label>
<table class="table table-bordered table-hover text-nowrap">
    <thead>
    <tr>
        <th style="width: 30px">#</th>
        <th>Цвет</th>
        <th>Размер</th>
        <th>Количество</th>
    </tr>
    </thead>
    <tbody>
    @foreach( $product->options as $option)
        <tr>
            <td>{{ $loop->index}}</td>
            <td>{{ $option->colors->translate()->title }}</td>
            <td>{{ $option->sizes->size }}</td>
            <td>{{ $option->available_quantity }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<h5>Общее количество доступных товаров <span id="count-products">{{ \App\Services\ProductService::getCountProducts($product) }}</span></h5>
</div>
