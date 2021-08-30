<div class="main-modal-add-to-cart">
    <ul class="modal-add-to-cart-list">

        В корзине пока нет товаров!
    </ul>


    <div class="row-modal-add-to-cart total-block">
        <span class="total-add-to-cart ">Всего</span>
        <span class="total-price-add-to-cart">{{ \Cart::session($_COOKIE['cart_id'])->getTotal() }} грн.</span>
    </div>
</div>
