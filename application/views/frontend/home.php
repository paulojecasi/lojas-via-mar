<?php 
if ($destaques):
    ?> 
    <div class="slider-area">
        <a href="#""> 
            <br>
            <h2 class="display4 text-center" > Destaques </h2>
        </a>
            <!-- Slider -->
            <div class="block-slider block-slider4 img-destaque">
                <ul class="" id="bxslider-home4">

                    <?php 
                    foreach ($destaques as $destaque):  
                        $img= $destaque->img; 
                        $noproduto = $destaque->desproduto ;
                        $vlproduto = $destaque->vlpreco; 
                        $vlpromocao= $destaque->vlpromocao;
                    ?>
                        <li>
                            <img src="<?php echo $img; ?>" alt="slide">
                            <div class="caption-group">
                                <h2 class="caption title">
                                
                                    <?php
                                    //quebra linha a casa 33 crt, maximo 100 crt - PJCS 
                                    echo substr(wordwrap($noproduto, 33,"<br />\n"),0,100);
                                    ?> <br>
                                </h2>
                                <br> 
                                <h1 class="caption title" >
                                    <?php 
                                    if ($vlpromocao > 0 && $vlpromocao < $vlproduto):
                                    ?> 
                                        <span class="primary"> 
                                            <?php echo "De R$ ".$vlproduto; ?>
                                            <strong>
                                                <?php echo "Por R$ ".$vlpromocao; ?>
                                            </strong>
                                        </span>
                                    <?php
                                    else:
                                    ?>
                                        <span class="primary"> 
                                            Apenas R$
                                            <strong> <?php echo $vlproduto; ?> </strong>
                                        </span>
                                    <?php
                                    endif;
                                    ?>

                                </h1>
                                <h4 class="caption subtitle">Verifique desconto na etiqueta*</h4>
                                <a class="caption button-radius" href="#">
                                    <span class="icon"></span>
                                    Mais detalhes
                                </a>
                            </div>
                        </li>
                    <?php
                    endforeach;
                    ?> 
                </ul>
            </div>
            <!-- ./Slider -->
    </div> <!-- End slider area -->
    <?php
endif;
?> 

<div class="promo-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="single-promo promo1">
                    <i class="fa fa-refresh"></i>
                    <p>Damos garantia</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-promo promo2">
                    <i class="fa fa-truck"></i>
                    <p>Entrega grátis *</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-promo promo3">
                    <i class="fa fa-credit-card"></i>
                    <p>Parcelamento até 4x</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-promo promo4">
                    <i class="fa fa-gift"></i>
                    <p>Novos produtos</p>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End promo area -->

<div class="maincontent-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="latest-product">
                    <h2 class="section-title">Produtos</h2>
                    <a href="#""> 
                        <h2 class="display4"> Bijuterias </h2>
                    </a>
                    <div class="product-carousel">
                        <div class="single-product">
                            <div class="product-f-image">
                                <img src="assets/frontend/img/caderno.jpg" alt="">
                                <div class="product-hover">
                                    <a href="#" class="view-details-link"><i class="fa fa-link"></i>+ detalhes </a>
                                </div>
                            </div>
                            
                            <h2><a href="#">CADERNO 20 MATÉRIAS  – 320 FOLHAS-Tilibra</a></h2>
                            
                            <div class="product-carousel-price">
                                <ins>$25.00</ins> <del>$30.00</del>
                            </div> 
                        </div>
                        <div class="single-product">
                            <div class="product-f-image">
                                <img src="assets/frontend/img/brincos.jpg" alt="">
                                <div class="product-hover">
      
                                    <a href="#" class="view-details-link"><i class="fa fa-link"></i> + Detalhes </a>
                                </div>
                            </div>
                            
                            <h2>Kit com 10 Brincos Tay Day</h2>
                            <div class="product-carousel-price">
                                <ins>$45.00</ins> <del>$70.00</del>
                            </div> 
                        </div>
                        <div class="single-product">
                            <div class="product-f-image">
                                <img src="assets/frontend/img/product-3.jpg" alt="">
                                <div class="product-hover">
            
                                    <a href="#" class="view-details-link"><i class="fa fa-link"></i> + Detalhes </a>
                                </div>
                            </div>
                            
                            <h2>LG Leon 2015</h2>

                            <div class="product-carousel-price">
                                <ins>$400.00</ins> <del>$425.00</del>
                            </div>                                 
                        </div>
                        <div class="single-product">
                            <div class="product-f-image">
                                <img src="assets/frontend/img/product-4.jpg" alt="">
                                <div class="product-hover">
                                    
                                    <a href="#" class="view-details-link"><i class="fa fa-link"></i> + Detalhes</a>
                                </div>
                            </div>
                            
                            <h2><a href="#">Sony microsoft</a></h2>

                            <div class="product-carousel-price">
                                <ins>$200.00</ins> <del>$225.00</del>
                            </div>                            
                        </div>
                        <div class="single-product">
                            <div class="product-f-image">
                                <img src="assets/frontend/img/product-5.jpg" alt="">
                                <div class="product-hover">
                                    <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                    <a href="#" class="view-details-link"><i class="fa fa-link"></i> + Detalhes </a>
                                </div>
                            </div>
                            
                            <h2>iPhone 6</h2>

                            <div class="product-carousel-price">
                                <ins>$1200.00</ins> <del>$1355.00</del>
                            </div>                                 
                        </div>
                        <div class="single-product">
                            <div class="product-f-image">
                                <img src="assets/frontend/img/product-6.jpg" alt="">
                                <div class="product-hover">
                                    <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                    <a href="#" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                </div>
                            </div>
                            
                            <h2><a href="#">Samsung gallaxy note 4</a></h2>

                            <div class="product-carousel-price">
                                <ins>$400.00</ins>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End main content area -->

<div class="maincontent-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="latest-product">
                    <a href="#""> 
                        <h2 class="display4"> Material Escolar </h2>
                    </a>
                    <div class="product-carousel">
                        <div class="single-product">
                            <div class="product-f-image">
                                <img src="assets/frontend/img/caderno.jpg" alt="">
                                <div class="product-hover">
                                    <a href="#" class="view-details-link"><i class="fa fa-link"></i>+ detalhes </a>
                                </div>
                            </div>
                            
                            <h2><a href="#">CADERNO 20 MATÉRIAS  – 320 FOLHAS-Tilibra</a></h2>
                            
                            <div class="product-carousel-price">
                                <ins>$25.00</ins> <del>$30.00</del>
                            </div> 
                        </div>
                        <div class="single-product">
                            <div class="product-f-image">
                                <img src="assets/frontend/img/brincos.jpg" alt="">
                                <div class="product-hover">
                                    <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                    <a href="#" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                </div>
                            </div>
                            
                            <h2>Kit com 10 Brincos Tay Day</h2>
                            <div class="product-carousel-price">
                                <ins>$45.00</ins> <del>$70.00</del>
                            </div> 
                        </div>
                        <div class="single-product">
                            <div class="product-f-image">
                                <img src="assets/frontend/img/product-3.jpg" alt="">
                                <div class="product-hover">
                                    <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                    <a href="#" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                </div>
                            </div>
                            
                            <h2>LG Leon 2015</h2>

                            <div class="product-carousel-price">
                                <ins>$400.00</ins> <del>$425.00</del>
                            </div>                                 
                        </div>
                        <div class="single-product">
                            <div class="product-f-image">
                                <img src="assets/frontend/img/product-4.jpg" alt="">
                                <div class="product-hover">
                                    <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                    <a href="#" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                </div>
                            </div>
                            
                            <h2><a href="#">Sony microsoft</a></h2>

                            <div class="product-carousel-price">
                                <ins>$200.00</ins> <del>$225.00</del>
                            </div>                            
                        </div>
                        <div class="single-product">
                            <div class="product-f-image">
                                <img src="assets/frontend/img/product-5.jpg" alt="">
                                <div class="product-hover">
                                    <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                    <a href="#" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                </div>
                            </div>
                            
                            <h2>iPhone 6</h2>

                            <div class="product-carousel-price">
                                <ins>$1200.00</ins> <del>$1355.00</del>
                            </div>                                 
                        </div>
                        <div class="single-product">
                            <div class="product-f-image">
                                <img src="assets/frontend/img/product-6.jpg" alt="">
                                <div class="product-hover">
                                    <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                    <a href="#" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                </div>
                            </div>
                            
                            <h2><a href="#">Samsung gallaxy note 4</a></h2>

                            <div class="product-carousel-price">
                                <ins>$400.00</ins>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End main content area -->

<div class="maincontent-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="latest-product">
                    <a href="#""> 
                        <h2 class="display4"> Bolsas e Acessórios </h2>
                    </a>
                    <div class="product-carousel">
                        <div class="single-product">
                            <div class="product-f-image">
                                <img src="assets/frontend/img/caderno.jpg" alt="">
                                <div class="product-hover">
                                    <a href="#" class="view-details-link"><i class="fa fa-link"></i>+ detalhes </a>
                                </div>
                            </div>
                            
                            <h2><a href="#">CADERNO 20 MATÉRIAS  – 320 FOLHAS-Tilibra</a></h2>
                            
                            <div class="product-carousel-price">
                                <ins>$25.00</ins> <del>$30.00</del>
                            </div> 
                        </div>
                        <div class="single-product">
                            <div class="product-f-image">
                                <img src="assets/frontend/img/brincos.jpg" alt="">
                                <div class="product-hover">
                                    <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                    <a href="#" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                </div>
                            </div>
                            
                            <h2>Kit com 10 Brincos Tay Day</h2>
                            <div class="product-carousel-price">
                                <ins>$45.00</ins> <del>$70.00</del>
                            </div> 
                        </div>
                        <div class="single-product">
                            <div class="product-f-image">
                                <img src="assets/frontend/img/product-3.jpg" alt="">
                                <div class="product-hover">
                                    <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                    <a href="#" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                </div>
                            </div>
                            
                            <h2>LG Leon 2015</h2>

                            <div class="product-carousel-price">
                                <ins>$400.00</ins> <del>$425.00</del>
                            </div>                                 
                        </div>
                        <div class="single-product">
                            <div class="product-f-image">
                                <img src="assets/frontend/img/product-4.jpg" alt="">
                                <div class="product-hover">
                                    <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                    <a href="#" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                </div>
                            </div>
                            
                            <h2><a href="#">Sony microsoft</a></h2>

                            <div class="product-carousel-price">
                                <ins>$200.00</ins> <del>$225.00</del>
                            </div>                            
                        </div>
                        <div class="single-product">
                            <div class="product-f-image">
                                <img src="assets/frontend/img/product-5.jpg" alt="">
                                <div class="product-hover">
                                    <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                    <a href="#" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                </div>
                            </div>
                            
                            <h2>iPhone 6</h2>

                            <div class="product-carousel-price">
                                <ins>$1200.00</ins> <del>$1355.00</del>
                            </div>                                 
                        </div>
                        <div class="single-product">
                            <div class="product-f-image">
                                <img src="assets/frontend/img/product-6.jpg" alt="">
                                <div class="product-hover">
                                    <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                    <a href="#" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                </div>
                            </div>
                            
                            <h2><a href="#">Samsung gallaxy note 4</a></h2>

                            <div class="product-carousel-price">
                                <ins>$400.00</ins>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End main content area -->

<div class="brands-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="brand-wrapper">
                    <div class="brand-list">
                        <img src="assets/frontend/img/brand1.png" alt="">
                        <img src="assets/frontend/img/brand2.png" alt="">
                        <img src="assets/frontend/img/brand3.png" alt="">
                        <img src="assets/frontend/img/brand4.png" alt="">
                        <img src="assets/frontend/img/brand5.png" alt="">
                        <img src="assets/frontend/img/brand6.png" alt="">
                        <img src="assets/frontend/img/brand1.png" alt="">
                        <img src="assets/frontend/img/brand2.png" alt="">                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End brands area -->