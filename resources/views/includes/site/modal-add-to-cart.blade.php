<div class="modal-add-to-cart">
    <div class="content-modal-add-to-cart">
        <div class="header-modal-add-to-cart">
            <h3 class="title-modal-add-to-cart page-title">Корзина</h3>
            <button class="btn-close-modal-add-to-cart"><i class="fas fa-times"></i></button>
        </div>
        @widget('product-cart')
        <div class="footer-modal-add-to-cart">
            <button class="btn-close-modal-add-to-cart footer-btn-close-modal-add-to-cart">Продолжить покупки</button>
            <a href="{{route('order.index')}}" class="footer-modal-add-to-cart-order">Оформить заказ</a>
        </div>



    </div>
</div>
