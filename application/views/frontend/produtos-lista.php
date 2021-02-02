
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
                $idproduto = $produto->idproduto; 
                $img= $produto->img; 
                $descricao= substr($produto->nomeproduto,0,50).'...'; ;
                $vlpreco = number_format($produto->vlpreco,2,",","."); 
                $vlpromocao= number_format($produto->vlpromocao,2,",",".");
            ?>
                <div class="col-md-3 col-sm-6">
                    <a href = "<?php echo base_url('home/detalhe_produto/').md5($idproduto); ?>"> 
                        <div class="single-shop-product">
                            <!-- STATICO --> 
                            <div class="product-upper">
                                <h1 class="img-lista-produto">
                                    <?php echo img($img,'class="img-fluid"'); ?>
                                </h1>

                            </div>
                            <br> 
                            <h2><a href="<?php echo base_url('home/detalhe_produto/').md5($idproduto); ?>"><?php echo $descricao; ?> </a></h2>
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
                            
                            <!-- FIM ESTATICO --> 
                                                 
                        </div>
                    </a>
                </div>
            <?php
            endforeach;
            ?>

        </div>
    </div>
</div>

