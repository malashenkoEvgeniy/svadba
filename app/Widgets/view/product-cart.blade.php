<div class="main-modal-add-to-cart">
    <ul class="modal-add-to-cart-list">
        <li class="row-modal-add-to-cart">
            <img src="site/img/item1.jpg" alt="" width="120" height="160" class="img-modal-add-to-cart">
            <div class="description-modal-add-to-cart">
                <h4 class="product-name-modal-add-to-cart">Vasia</h4>
                <div class="product-brand-modal-add-to-cart">Бренд: Tesoro</div>
                <div class="product-size-modal-add-to-cart">Размер: 38</div>
                <div class="product-color-modal-add-to-cart">
                    Цвет: <span class="product-color-modal-add-to-cart-color" style="background-color: red"></span> Green
                </div>
                <div class="product-qty-modal-add-to-cart">Количество: 1шт</div>
            </div>
            <div class="product-action-modal-add-to-cart">
                <button class="remove-product-modal-add-to-cart">@include('svg.modal-cart')</button>
                <div class="product-price-modal-add-to-cart">28 000 грн.</div>
            </div>
        </li>
        В корзине пока нет товаров!
    </ul>


    <div class="row-modal-add-to-cart total-block">
        <span class="total-add-to-cart ">Всего</span>
        <span class="total-price-add-to-cart">{{ \Cart::session($_COOKIE['cart_id'])->getTotal() }} грн.</span>
    </div>
</div>
