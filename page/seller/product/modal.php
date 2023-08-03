<!-- Modal -->
<div class="modal fade" id="delete_product" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content bg-transparent text-white">
            <div class="modal-header modal_bg border-0 p-0">
                <div class="col-11 m-auto p-0 mt-5 my-3 border-bottom border-white border-2 border-opacity-10">
                    <h1 class="fs-5 fw-bold">Удалить товар</h1>
                </div>
            </div>
            <div class="modal-body modal_bg p-0 border-0 rounded-bottom">
                <div class="col-11 m-auto p-0">
                    <p class="text-14 my-fw opacity-75 del_product_id">ID 2534778</p>
                    <p class="text-14 opacity-75 del_product_name">Facebook [ПЗРД] USA фарм 30д. Интересы+, coockie, UA, 2fa,  +2BM</p>

                    <div class="d-flex justify-content-between col-8">
                        <div>
                            <p class="text-14 opacity-75 text-light fw-light del_product_quantity">В наличии 1689 шт.</p>
                            <p class="text-14 opacity-75 del_product_price">Цена  600р.</p>
                        </div>
                        <div>
                            <p class="text-14 opacity-75 text-light fw-light">Рейтинг 5.0.</p>

                            <div class="d-flex justify-content-center">
                                <img src="/res/img/star.png">
                                <img src="/res/img/star.png">
                                <img src="/res/img/star.png">
                                <img src="/res/img/star.png">
                                <img src="/res/img/star.png">
                            </div>
                        </div>
                    </div>

                    <div class="col-12 m-auto d-flex py-3">
                        <button onclick="delete_product.call(this)" data-id="" data-bs-dismiss="modal" type="button" class="button_modal_delete_product btn btn-bg-seller fw-bold small_shadow col-3 text-white">удалить</button>
                        <button type="button" class="btn btn-dg-danger fw-bold small_shadow col-3 mx-3 text-white" data-bs-dismiss="modal">отмена</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="copy_product" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-transparent text-white">
            <div class="modal-header modal_bg border-0 p-0">
                <div class="col-11 m-auto p-0 mt-5 my-3 border-bottom border-white border-2 border-opacity-10">
                    <h1 class="fs-5 fw-bold">Создать копию товара</h1>
                </div>
            </div>
            <div class="modal-body modal_bg p-0 border-0 rounded-bottom">
                <div class="col-11 m-auto p-0">
                    <p class="text-14 my-fw opacity-75 copy_product_id">ID 2534778</p>
                    <p class="text-14 opacity-75 copy_product_name">Facebook [ПЗРД] USA фарм 30д. Интересы+, coockie, UA, 2fa,  +2BM</p>

                    <div class="d-flex justify-content-between col-8">
                        <div>
                            <p class="text-14 opacity-75 text-light fw-light copy_product_quantity">В наличии 1689 шт.</p>
                            <p class="text-14 opacity-75 copy_product_price">Цена  600р.</p>
                        </div>
                        <div>
                            <p class="text-14 opacity-75 text-light fw-light">Рейтинг 5.0.</p>

                            <div class="d-flex justify-content-center">
                                <img src="/res/img/star.png">
                                <img src="/res/img/star.png">
                                <img src="/res/img/star.png">
                                <img src="/res/img/star.png">
                                <img src="/res/img/star.png">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-11 m-auto d-flex py-3 my-2">
                    <button onclick="copy_product.call(this)" data-id="" type="button" data-bs-dismiss="modal" class="button_copy_product btn btn-bg-seller fw-bold small_shadow col-3 text-white">ок</button>
                    <button type="button" class="btn btn-dg-danger fw-bold mx-4 small_shadow col-3 text-white" data-bs-dismiss="modal">отмена</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="loading_product" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-transparent text-white">
            <div class="modal-header modal_bg border-0 p-0">
                <div class="col-11 m-auto p-0 mt-5 my-3 border-bottom border-white border-2 border-opacity-10">
                    <h1 class="fs-5 fw-bold">Догрузить товары</h1>
                </div>
            </div>
            <div class="modal-body modal_bg p-0 border-0 rounded-bottom">
                <div class="col-11 m-auto p-0">
                    <p class="text-14 my-fw opacity-75 copy_product_id">ID 2534778</p>
                    <p class="text-14 opacity-75 copy_product_name">Facebook [ПЗРД] USA фарм 30д. Интересы+, coockie, UA, 2fa,  +2BM</p>

                    <div class="d-flex justify-content-between col-5">
                        <div>
                            <p class="text-14 opacity-75 text-light fw-light copy_product_quantity">В наличии 1689 шт.</p>
                            <p class="text-14 opacity-75 copy_product_price">Цена  600р.</p>
                        </div>
                        <div>
                            <p class="text-14 opacity-75 text-light fw-light">Рейтинг 5.0.</p>

                            <div class="d-flex justify-content-center">
                                <img src="/res/img/star.png">
                                <img src="/res/img/star.png">
                                <img src="/res/img/star.png">
                                <img src="/res/img/star.png">
                                <img src="/res/img/star.png">
                            </div>
                        </div>
                    </div>

                    <textarea placeholder="Введите товары:" class="col-12 input-price-seller text-white p-2 border-0" name="textarea" id="txt_loading" cols="30" rows="10"></textarea>

                    <div class="col-12 m-auto d-flex py-3">
                        <button data-bs-dismiss="modal" data-id="" onclick="loading_product.call(this)" type="button" class="btn btn-bg-seller fw-bold small_shadow col-2 text-white button_loading_modal">ок</button>
                        <button   type="button" class="btn btn-dg-danger fw-bold small_shadow col-2 mx-4 text-white " data-bs-dismiss="modal">отмена</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="down_account" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content bg-transparent text-white">
            <div class="modal-header modal_bg border-0 p-0">
                <div class="col-11 m-auto p-0 mt-5 my-3 border-bottom border-white border-2 border-opacity-10">
                    <h1 class="fs-5 fw-bold">Выгрузить товары</h1>
                </div>
            </div>
            <div class="modal-body modal_bg p-0 border-0 rounded-bottom">
                <div class="col-11 m-auto p-0">
                    <p class="text-14 my-fw opacity-75 down_product_id">ID 2534778</p>
                    <p class="text-14 opacity-75 down_product_name">Facebook [ПЗРД] USA фарм 30д. Интересы+, coockie, UA, 2fa,  +2BM</p>

                    <div class="d-flex justify-content-between col-8">
                        <div>
                            <p class="text-14 opacity-75 text-light fw-light down_product_quantity">В наличии 1689 шт.</p>
                            <p class="text-14 opacity-75 down_product_price">Цена  600р.</p>
                        </div>
                        <div>
                            <p class="text-14 opacity-75 text-light fw-light">Рейтинг 5.0.</p>

                            <div class="d-flex justify-content-center">
                                <img src="/res/img/star.png">
                                <img src="/res/img/star.png">
                                <img src="/res/img/star.png">
                                <img src="/res/img/star.png">
                                <img src="/res/img/star.png">
                            </div>
                        </div>
                    </div>
                    <h6 class="text-danger my-2 h6_error_down_account"></h6>
                    <input min="1" data-count="" type="number" class="border-0 input-price-seller col-8 text-white p-1 input_count_account" placeholder="Введите колличество:">

                    <div class="col-12 d-flex py-3 my-3">
                        <button disabled data-count="" onclick="down_product.call(this)" data-id="" data-bs-dismiss="modal" type="button" class="button_modal_down_product btn btn-bg-seller border-0 fw-bold small_shadow col-3 text-white">выгрузить</button>
                        <button type="button" class="btn btn-dg-danger fw-bold small_shadow col-3 mx-4 text-white" data-bs-dismiss="modal">отмена</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>