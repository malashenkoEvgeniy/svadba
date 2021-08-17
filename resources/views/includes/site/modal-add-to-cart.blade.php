<div class="modal-add-to-cart">
    <div class="content-modal-add-to-cart">
        <div class="header-modal-add-to-cart">
            <h3 class="title-modal-add-to-cart page-title">Корзина</h3>
            <button class="btn-close-modal-add-to-cart"><i class="fas fa-times"></i></button>
        </div>
        <div class="main-modal-add-to-cart">
            <div class="row-modal-add-to-cart">
                <img src="site/img/item1.jpg" alt="" width="120" height="160" class="img-modal-add-to-cart">
                <div class="description-modal-add-to-cart">
                    <h4 class="product-name-modal-add-to-cart">Vasia</h4>
                    <div class="product-brand-modal-add-to-cart">Бренд: Tesoro</div>
                    <div class="product-size-modal-add-to-cart">Размер: 38</div>
                </div>
                <div class="product-action-modal-add-to-cart">
                    <button class="remove-product-modal-add-to-cart">@include('svg.modal-cart')</button>
                    <div class="product-price-modal-add-to-cart">28 000 грн.</div>
                </div>
            </div>
            <div class="row-modal-add-to-cart">
                <img src="site/img/item1.jpg" alt="" width="120" height="160" class="img-modal-add-to-cart">
                <div class="description-modal-add-to-cart">
                    <h4 class="product-name-modal-add-to-cart">Vasia</h4>
                    <div class="product-brand-modal-add-to-cart">Бренд: Tesoro</div>
                    <div class="product-size-modal-add-to-cart">Размер: 38</div>
                </div>
                <div class="product-action-modal-add-to-cart">
                    <button class="remove-product-modal-add-to-cart">@include('svg.modal-cart')</button>
                    <div class="product-price-modal-add-to-cart">28 000 грн.</div>
                </div>
            </div>
            <div class="row-modal-add-to-cart total-block">
                <span class="total-add-to-cart ">Всего</span>
                <span class="total-price-add-to-cart">28 000 грн.</span>
            </div>
        </div>
        <div class="footer-modal-add-to-cart">
            <button class="btn-close-modal-add-to-cart footer-btn-close-modal-add-to-cart">Продолжить покупки</button>
            <a href="{{route('order.index')}}" class="footer-modal-add-to-cart-order">Оформить заказ</a>
        </div>



    </div>
</div>
