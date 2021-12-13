@extends('parents.layouts.app')

@section('content')

    <div id="page_content_inner">

        <h3 class="heading_a uk-margin-bottom">Sort products by name:</h3>

        <ul id="products_sort" class="uk-subnav uk-subnav-pill">
            <li data-uk-sort="product-name:asc"><a href="#">Ascending</a></li>
            <li data-uk-sort="product-name:desc"><a href="#">Descending</a></li>
        </ul>

        <div class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4 hierarchical_show" data-uk-grid="{gutter: 20, controls: '#products_sort'}" data-show-delay="280">
            <div data-product-name="Repellat dignissimos.">
                <div class="md-card md-card-hover-img">
                    <div class="md-card-head uk-text-center uk-position-relative">
                        <div class="uk-badge uk-badge-danger uk-position-absolute uk-position-top-left uk-margin-left uk-margin-top">$ 585.00</div>
                        <img class="md-card-head-img" src="assets/img/ecommerce/s6_edge_2.jpg" alt=""/>
                    </div>
                    <div class="md-card-content">
                        <h4 class="heading_c uk-margin-bottom">
                            Repellat dignissimos.
                            <span class="sub-heading">SKU: 174474</span>
                        </h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquid autem cupiditate harum illum&hellip;</p>
                        <a class="md-btn md-btn-small" href="/parents/shop/details">Подробнее</a>
                    </div>
                </div>
            </div>
            <div data-product-name="Corporis saepe suscipit.">
                <div class="md-card md-card-hover-img">
                    <div class="md-card-head uk-text-center uk-position-relative">
                        <div class="uk-badge uk-badge-danger uk-position-absolute uk-position-top-left uk-margin-left uk-margin-top">$ 585.00</div>
                        <img class="md-card-head-img" src="assets/img/ecommerce/s6_edge_1.jpg" alt=""/>
                    </div>
                    <div class="md-card-content">
                        <h4 class="heading_c uk-margin-bottom">
                            Corporis saepe suscipit.
                            <span class="sub-heading">SKU: 138624</span>
                        </h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquid autem cupiditate harum illum&hellip;</p>
                        <a class="md-btn md-btn-small" href="/parents/shop/details">Подробнее</a>
                    </div>
                </div>
            </div>
            <div data-product-name="Sint at enim.">
                <div class="md-card md-card-hover-img">
                    <div class="md-card-head uk-text-center uk-position-relative">
                        <div class="uk-badge uk-badge-danger uk-position-absolute uk-position-top-left uk-margin-left uk-margin-top">$ 536.00</div>
                        <img class="md-card-head-img" src="assets/img/ecommerce/s6_edge_1.jpg" alt=""/>
                    </div>
                    <div class="md-card-content">
                        <h4 class="heading_c uk-margin-bottom">
                            Sint at enim.
                            <span class="sub-heading">SKU: 145747</span>
                        </h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquid autem cupiditate harum illum&hellip;</p>
                        <a class="md-btn md-btn-small" href="/parents/shop/details">Подробнее</a>
                    </div>
                </div>
            </div>
            <div data-product-name="Eveniet deleniti iure.">
                <div class="md-card md-card-hover-img">
                    <div class="md-card-head uk-text-center uk-position-relative">
                        <div class="uk-badge uk-badge-danger uk-position-absolute uk-position-top-left uk-margin-left uk-margin-top">$ 580.00</div>
                        <img class="md-card-head-img" src="assets/img/ecommerce/s6_edge_2.jpg" alt=""/>
                    </div>
                    <div class="md-card-content">
                        <h4 class="heading_c uk-margin-bottom">
                            Eveniet deleniti iure.
                            <span class="sub-heading">SKU: 149146</span>
                        </h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquid autem cupiditate harum illum&hellip;</p>
                        <a class="md-btn md-btn-small" href="/parents/shop/details">Подробнее</a>
                    </div>
                </div>
            </div>
            <div data-product-name="Ut aut odio.">
                <div class="md-card md-card-hover-img">
                    <div class="md-card-head uk-text-center uk-position-relative">
                        <div class="uk-badge uk-badge-danger uk-position-absolute uk-position-top-left uk-margin-left uk-margin-top">$ 457.00</div>
                        <img class="md-card-head-img" src="assets/img/ecommerce/s6_edge_2.jpg" alt=""/>
                    </div>
                    <div class="md-card-content">
                        <h4 class="heading_c uk-margin-bottom">
                            Ut aut odio.
                            <span class="sub-heading">SKU: 133790</span>
                        </h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquid autem cupiditate harum illum&hellip;</p>
                        <a class="md-btn md-btn-small" href="/parents/shop/details">Подробнее</a>
                    </div>
                </div>
            </div>
            <div data-product-name="Quis quia.">
                <div class="md-card md-card-hover-img">
                    <div class="md-card-head uk-text-center uk-position-relative">
                        <div class="uk-badge uk-badge-danger uk-position-absolute uk-position-top-left uk-margin-left uk-margin-top">$ 525.00</div>
                        <img class="md-card-head-img" src="assets/img/ecommerce/s6_edge_3.jpg" alt=""/>
                    </div>
                    <div class="md-card-content">
                        <h4 class="heading_c uk-margin-bottom">
                            Quis quia.
                            <span class="sub-heading">SKU: 155094</span>
                        </h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquid autem cupiditate harum illum&hellip;</p>
                        <a class="md-btn md-btn-small" href="/parents/shop/details">Подробнее</a>
                    </div>
                </div>
            </div>
            <div data-product-name="Enim officia.">
                <div class="md-card md-card-hover-img">
                    <div class="md-card-head uk-text-center uk-position-relative">
                        <div class="uk-badge uk-badge-danger uk-position-absolute uk-position-top-left uk-margin-left uk-margin-top">$ 584.00</div>
                        <img class="md-card-head-img" src="assets/img/ecommerce/s6_edge.jpg" alt=""/>
                    </div>
                    <div class="md-card-content">
                        <h4 class="heading_c uk-margin-bottom">
                            Enim officia.
                            <span class="sub-heading">SKU: 125993</span>
                        </h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquid autem cupiditate harum illum&hellip;</p>
                        <a class="md-btn md-btn-small" href="/parents/shop/details">Подробнее</a>
                    </div>
                </div>
            </div>
            <div data-product-name="Repellendus in.">
                <div class="md-card md-card-hover-img">
                    <div class="md-card-head uk-text-center uk-position-relative">
                        <div class="uk-badge uk-badge-danger uk-position-absolute uk-position-top-left uk-margin-left uk-margin-top">$ 451.00</div>
                        <img class="md-card-head-img" src="assets/img/ecommerce/s6_edge_1.jpg" alt=""/>
                    </div>
                    <div class="md-card-content">
                        <h4 class="heading_c uk-margin-bottom">
                            Repellendus in.
                            <span class="sub-heading">SKU: 123377</span>
                        </h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquid autem cupiditate harum illum&hellip;</p>
                        <a class="md-btn md-btn-small" href="/parents/shop/details">Подробнее</a>
                    </div>
                </div>
            </div>
            <div data-product-name="Veritatis quos nobis.">
                <div class="md-card md-card-hover-img">
                    <div class="md-card-head uk-text-center uk-position-relative">
                        <div class="uk-badge uk-badge-danger uk-position-absolute uk-position-top-left uk-margin-left uk-margin-top">$ 536.00</div>
                        <img class="md-card-head-img" src="assets/img/ecommerce/s6_edge_3.jpg" alt=""/>
                    </div>
                    <div class="md-card-content">
                        <h4 class="heading_c uk-margin-bottom">
                            Veritatis quos nobis.
                            <span class="sub-heading">SKU: 170839</span>
                        </h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquid autem cupiditate harum illum&hellip;</p>
                        <a class="md-btn md-btn-small" href="/parents/shop/details">Подробнее</a>
                    </div>
                </div>
            </div>
            <div data-product-name="Est magnam.">
                <div class="md-card md-card-hover-img">
                    <div class="md-card-head uk-text-center uk-position-relative">
                        <div class="uk-badge uk-badge-danger uk-position-absolute uk-position-top-left uk-margin-left uk-margin-top">$ 565.00</div>
                        <img class="md-card-head-img" src="assets/img/ecommerce/s6_edge.jpg" alt=""/>
                    </div>
                    <div class="md-card-content">
                        <h4 class="heading_c uk-margin-bottom">
                            Est magnam.
                            <span class="sub-heading">SKU: 132922</span>
                        </h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquid autem cupiditate harum illum&hellip;</p>
                        <a class="md-btn md-btn-small" href="/parents/shop/details">Подробнее</a>
                    </div>
                </div>
            </div>
            <div data-product-name="Quidem voluptatem.">
                <div class="md-card md-card-hover-img">
                    <div class="md-card-head uk-text-center uk-position-relative">
                        <div class="uk-badge uk-badge-danger uk-position-absolute uk-position-top-left uk-margin-left uk-margin-top">$ 499.00</div>
                        <img class="md-card-head-img" src="assets/img/ecommerce/s6_edge.jpg" alt=""/>
                    </div>
                    <div class="md-card-content">
                        <h4 class="heading_c uk-margin-bottom">
                            Quidem voluptatem.
                            <span class="sub-heading">SKU: 122934</span>
                        </h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquid autem cupiditate harum illum&hellip;</p>
                        <a class="md-btn md-btn-small" href="/parents/shop/details">Подробнее</a>
                    </div>
                </div>
            </div>
            <div data-product-name="Nostrum beatae.">
                <div class="md-card md-card-hover-img">
                    <div class="md-card-head uk-text-center uk-position-relative">
                        <div class="uk-badge uk-badge-danger uk-position-absolute uk-position-top-left uk-margin-left uk-margin-top">$ 569.00</div>
                        <img class="md-card-head-img" src="assets/img/ecommerce/s6_edge_3.jpg" alt=""/>
                    </div>
                    <div class="md-card-content">
                        <h4 class="heading_c uk-margin-bottom">
                            Nostrum beatae.
                            <span class="sub-heading">SKU: 112441</span>
                        </h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquid autem cupiditate harum illum&hellip;</p>
                        <a class="md-btn md-btn-small" href="/parents/shop/details">Подробнее</a>
                    </div>
                </div>
            </div>
            <div data-product-name="Asperiores iste suscipit.">
                <div class="md-card md-card-hover-img">
                    <div class="md-card-head uk-text-center uk-position-relative">
                        <div class="uk-badge uk-badge-danger uk-position-absolute uk-position-top-left uk-margin-left uk-margin-top">$ 493.00</div>
                        <img class="md-card-head-img" src="assets/img/ecommerce/s6_edge_1.jpg" alt=""/>
                    </div>
                    <div class="md-card-content">
                        <h4 class="heading_c uk-margin-bottom">
                            Asperiores iste suscipit.
                            <span class="sub-heading">SKU: 169913</span>
                        </h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquid autem cupiditate harum illum&hellip;</p>
                        <a class="md-btn md-btn-small" href="/parents/shop/details">Подробнее</a>
                    </div>
                </div>
            </div>
            <div data-product-name="Velit id.">
                <div class="md-card md-card-hover-img">
                    <div class="md-card-head uk-text-center uk-position-relative">
                        <div class="uk-badge uk-badge-danger uk-position-absolute uk-position-top-left uk-margin-left uk-margin-top">$ 452.00</div>
                        <img class="md-card-head-img" src="assets/img/ecommerce/s6_edge_3.jpg" alt=""/>
                    </div>
                    <div class="md-card-content">
                        <h4 class="heading_c uk-margin-bottom">
                            Velit id.
                            <span class="sub-heading">SKU: 156126</span>
                        </h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquid autem cupiditate harum illum&hellip;</p>
                        <a class="md-btn md-btn-small" href="/parents/shop/details">Подробнее</a>
                    </div>
                </div>
            </div>
            <div data-product-name="Excepturi iusto.">
                <div class="md-card md-card-hover-img">
                    <div class="md-card-head uk-text-center uk-position-relative">
                        <div class="uk-badge uk-badge-danger uk-position-absolute uk-position-top-left uk-margin-left uk-margin-top">$ 536.00</div>
                        <img class="md-card-head-img" src="assets/img/ecommerce/s6_edge_1.jpg" alt=""/>
                    </div>
                    <div class="md-card-content">
                        <h4 class="heading_c uk-margin-bottom">
                            Excepturi iusto.
                            <span class="sub-heading">SKU: 161159</span>
                        </h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquid autem cupiditate harum illum&hellip;</p>
                        <a class="md-btn md-btn-small" href="/parents/shop/details">Подробнее</a>
                    </div>
                </div>
            </div>
            <div data-product-name="Odio et culpa.">
                <div class="md-card md-card-hover-img">
                    <div class="md-card-head uk-text-center uk-position-relative">
                        <div class="uk-badge uk-badge-danger uk-position-absolute uk-position-top-left uk-margin-left uk-margin-top">$ 500.00</div>
                        <img class="md-card-head-img" src="assets/img/ecommerce/s6_edge_2.jpg" alt=""/>
                    </div>
                    <div class="md-card-content">
                        <h4 class="heading_c uk-margin-bottom">
                            Odio et culpa.
                            <span class="sub-heading">SKU: 111067</span>
                        </h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquid autem cupiditate harum illum&hellip;</p>
                        <a class="md-btn md-btn-small" href="/parents/shop/details">Подробнее</a>
                    </div>
                </div>
            </div>
            <div data-product-name="Voluptatem amet cumque.">
                <div class="md-card md-card-hover-img">
                    <div class="md-card-head uk-text-center uk-position-relative">
                        <div class="uk-badge uk-badge-danger uk-position-absolute uk-position-top-left uk-margin-left uk-margin-top">$ 533.00</div>
                        <img class="md-card-head-img" src="assets/img/ecommerce/s6_edge.jpg" alt=""/>
                    </div>
                    <div class="md-card-content">
                        <h4 class="heading_c uk-margin-bottom">
                            Voluptatem amet cumque.
                            <span class="sub-heading">SKU: 100132</span>
                        </h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquid autem cupiditate harum illum&hellip;</p>
                        <a class="md-btn md-btn-small" href="/parents/shop/details">Подробнее</a>
                    </div>
                </div>
            </div>
            <div data-product-name="Qui rerum.">
                <div class="md-card md-card-hover-img">
                    <div class="md-card-head uk-text-center uk-position-relative">
                        <div class="uk-badge uk-badge-danger uk-position-absolute uk-position-top-left uk-margin-left uk-margin-top">$ 583.00</div>
                        <img class="md-card-head-img" src="assets/img/ecommerce/s6_edge_1.jpg" alt=""/>
                    </div>
                    <div class="md-card-content">
                        <h4 class="heading_c uk-margin-bottom">
                            Qui rerum.
                            <span class="sub-heading">SKU: 101192</span>
                        </h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquid autem cupiditate harum illum&hellip;</p>
                        <a class="md-btn md-btn-small" href="/parents/shop/details">Подробнее</a>
                    </div>
                </div>
            </div>
            <div data-product-name="Sit aut.">
                <div class="md-card md-card-hover-img">
                    <div class="md-card-head uk-text-center uk-position-relative">
                        <div class="uk-badge uk-badge-danger uk-position-absolute uk-position-top-left uk-margin-left uk-margin-top">$ 562.00</div>
                        <img class="md-card-head-img" src="assets/img/ecommerce/s6_edge_2.jpg" alt=""/>
                    </div>
                    <div class="md-card-content">
                        <h4 class="heading_c uk-margin-bottom">
                            Sit aut.
                            <span class="sub-heading">SKU: 158150</span>
                        </h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquid autem cupiditate harum illum&hellip;</p>
                        <a class="md-btn md-btn-small" href="/parents/shop/details">Подробнее</a>
                    </div>
                </div>
            </div>
            <div data-product-name="Molestiae enim.">
                <div class="md-card md-card-hover-img">
                    <div class="md-card-head uk-text-center uk-position-relative">
                        <div class="uk-badge uk-badge-danger uk-position-absolute uk-position-top-left uk-margin-left uk-margin-top">$ 597.00</div>
                        <img class="md-card-head-img" src="assets/img/ecommerce/s6_edge_1.jpg" alt=""/>
                    </div>
                    <div class="md-card-content">
                        <h4 class="heading_c uk-margin-bottom">
                            Molestiae enim.
                            <span class="sub-heading">SKU: 134758</span>
                        </h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquid autem cupiditate harum illum&hellip;</p>
                        <a class="md-btn md-btn-small" href="/parents/shop/details">Подробнее</a>
                    </div>
                </div>
            </div>
            <div data-product-name="Saepe amet.">
                <div class="md-card md-card-hover-img">
                    <div class="md-card-head uk-text-center uk-position-relative">
                        <div class="uk-badge uk-badge-danger uk-position-absolute uk-position-top-left uk-margin-left uk-margin-top">$ 481.00</div>
                        <img class="md-card-head-img" src="assets/img/ecommerce/s6_edge_2.jpg" alt=""/>
                    </div>
                    <div class="md-card-content">
                        <h4 class="heading_c uk-margin-bottom">
                            Saepe amet.
                            <span class="sub-heading">SKU: 167867</span>
                        </h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquid autem cupiditate harum illum&hellip;</p>
                        <a class="md-btn md-btn-small" href="/parents/shop/details">Подробнее</a>
                    </div>
                </div>
            </div>
            <div data-product-name="Consectetur non.">
                <div class="md-card md-card-hover-img">
                    <div class="md-card-head uk-text-center uk-position-relative">
                        <div class="uk-badge uk-badge-danger uk-position-absolute uk-position-top-left uk-margin-left uk-margin-top">$ 478.00</div>
                        <img class="md-card-head-img" src="assets/img/ecommerce/s6_edge_3.jpg" alt=""/>
                    </div>
                    <div class="md-card-content">
                        <h4 class="heading_c uk-margin-bottom">
                            Consectetur non.
                            <span class="sub-heading">SKU: 147297</span>
                        </h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquid autem cupiditate harum illum&hellip;</p>
                        <a class="md-btn md-btn-small" href="/parents/shop/details">Подробнее</a>
                    </div>
                </div>
            </div>
            <div data-product-name="Qui assumenda nostrum.">
                <div class="md-card md-card-hover-img">
                    <div class="md-card-head uk-text-center uk-position-relative">
                        <div class="uk-badge uk-badge-danger uk-position-absolute uk-position-top-left uk-margin-left uk-margin-top">$ 533.00</div>
                        <img class="md-card-head-img" src="assets/img/ecommerce/s6_edge.jpg" alt=""/>
                    </div>
                    <div class="md-card-content">
                        <h4 class="heading_c uk-margin-bottom">
                            Qui assumenda nostrum.
                            <span class="sub-heading">SKU: 176300</span>
                        </h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquid autem cupiditate harum illum&hellip;</p>
                        <a class="md-btn md-btn-small" href="/parents/shop/details">Подробнее</a>
                    </div>
                </div>
            </div>
            <div data-product-name="Eos ducimus quam.">
                <div class="md-card md-card-hover-img">
                    <div class="md-card-head uk-text-center uk-position-relative">
                        <div class="uk-badge uk-badge-danger uk-position-absolute uk-position-top-left uk-margin-left uk-margin-top">$ 506.00</div>
                        <img class="md-card-head-img" src="assets/img/ecommerce/s6_edge_3.jpg" alt=""/>
                    </div>
                    <div class="md-card-content">
                        <h4 class="heading_c uk-margin-bottom">
                            Eos ducimus quam.
                            <span class="sub-heading">SKU: 177836</span>
                        </h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquid autem cupiditate harum illum&hellip;</p>
                        <a class="md-btn md-btn-small" href="/parents/shop/details">Подробнее</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

@stop
