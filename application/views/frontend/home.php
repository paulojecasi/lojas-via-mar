<?php 
if ($destaques):
   
    foreach ($loja as $lojasviamar):
        if ($lojasviamar->promocaosite == 1):
            ?> 
            <div class= "merchan-promo text-center">
                <a href="<?php echo base_url('home/lista_produtos_promocao') ?>">
                    <img class="img-fluid" src=" <?php echo base_url('assets/frontend/img/promo3.png'); ?>"> 
                </a>
            </div>
            <?php
        endif;
    endforeach;
?> 

    
    <div class="slider-area">
        <a href="#"> 
            <br> 
           <!--
            <h2 class="section-title-dest"> Destaques e Promoções </h2>
            --> 
        </a>
        <!-- Slider -->
        <div class="block-slider block-slider4 img-destaque">
            <ul class="" id="bxslider-home4">

                <?php 
                foreach ($destaques as $destaque):  
                    $img= $destaque->img; 
                    $idproduto = $destaque->idproduto; 
                    $noproduto = $destaque->nomeproduto ;
                    $vlproduto = number_format($destaque->vlpreco,2,",","."); 
                    $vlpromocao= number_format($destaque->vlpromocao,2,",",".");
                ?>
                    <li>
                        <img src="<?php echo $img; ?>" >
                        <div class="caption-group">
                            <h2 class="caption title title-product-destaque">
                            
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
                                        <br> 
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
                            <a class="caption button-radius" href="<?php echo base_url('home/detalhe_produto/').md5($idproduto); ?>">
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
    </div>
        
   
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


<?php
if ($categorias):
?> 
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2> Mais Produtos em Destaque </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
endif;

foreach ($categorias as $categoria):    
    // listar somente as categorias marcadas como DESTAQUES
    // e se houver produtos selecionados para destaque da categoria 
    if ($categoria->categoriadest ==1): 
        $idcategoria = $categoria->id; 
        ?> 
        <div class="maincontent-area">
           
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="latest-product">
                           
                            <a href="<?php echo base_url('home/lista_produtos/').md5($idcategoria); ?>"> 
                                <h2 class="display4">
                                    <?php echo $categoria->titulo ?>
                                </h2>
                            </a>
                            
                            <div class="product-carousel">
                                <?php
                                foreach ($produtoscategoria as $pro_cat): 
                                   $descricao=substr($pro_cat->nomeproduto,0,50).'...'; 
                                   $idproduto = $pro_cat->idproduto; 
                                   $img_pro_cat = $pro_cat->img;
                                   $vlpreco     = number_format($pro_cat->vlpreco,2,",",".");
                                   $vlpromocao  = number_format($pro_cat->vlpromocao,2,",",".");

                                    // vamos seleciona produtos da categoria 
                                   if ($pro_cat->idcategoria == $categoria->id): 
                                        ?>
                                        <div class="single-product">
                                            <div class="product-f-image img-fluid">
                                                <img src="<?php echo $img_pro_cat; ?>" alt="">
                                                <div class="product-hover">
                                                    <a href="<?php echo base_url('home/detalhe_produto/').md5($idproduto); ?>" class="view-details-link"><i class="fa fa-link"></i>+ detalhes </a>
                                                </div>
                                            </div>
                                            
                                            <h2>
                                                <a href="#">
                                                    <?php echo $descricao?>
                                                </a>
                                            </h2>
                                            
                                            <div class="product-carousel-price">
                                                <?php 
                                                if ($vlpromocao > 0):
                                                ?>
                                                    <del>
                                                        <?php echo "De R$ ".$vlpreco." por"?>
                                                    </del>
                                                    <br> 
                                                    <ins><?php echo "R$ ".$vlpromocao?></ins>
                                                    
                                                <?php
                                                else:
                                                ?>
                                                    <br> 
                                                    <ins><?php echo "R$ ".$vlpreco?></ins>
                                                <?php
                                                endif;
                                                ?>
                                            </div> 
                                        </div>
                                        <?php 
                                        endif; 
                                endforeach;
                                ?> 
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End main content area -->

        <?php
        endif; 
        
endforeach;
?>

