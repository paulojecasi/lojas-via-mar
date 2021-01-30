<!--
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Lista de Produtos</h2>
                </div>
            </div>
        </div>
    </div>
</div>
--> 
<?php
foreach ($categoria as $titulo):
?>
    <div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2> <?php echo $titulo->titulo ?></h2>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
endforeach; 
?>

 
<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <?php 
            foreach ($listaprodutossite as $produto):
                $img= $produto->img; 
                $descricao= substr($produto->nomeproduto,0,50).'...'; ;
                $vlpreco = $produto->vlpreco; 
                $vlpromocao= $produto->vlpromocao;
            ?>
                <div class="col-md-3 col-sm-6">
                    <a href = "#"> 
                        <div class="single-shop-product">
                            <div class="product-upper">
                                <h1 class="img-lista-produto">
                                    <?php echo img($img,'class="img-fluid"'); ?>
                                </h1>

                            </div>
                            <br> 
                            <h2><a href=""><?php echo $descricao; ?> </a></h2>
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
                    </a>
                </div>
            <?php
            endforeach;
            ?>

        </div>
    </div>
</div>

