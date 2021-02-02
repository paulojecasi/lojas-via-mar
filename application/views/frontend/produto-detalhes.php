
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2> Detalhes do Produto </h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="single-product-area" id="produto_promocao">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <?php 
            foreach ($detalheproduto as $produto):
                $img= $produto->img; 
                $nome = $produto->nomeproduto; 
                $descricao= $produto->desproduto;
                $idcor= $produto->corproduto;
                $vlpreco = number_format($produto->vlpreco,2,",","."); 
                $vlpromocao= number_format($produto->vlpromocao,2,",",".");
                $vllargura= $produto->vllargura;
                $vlaltura= $produto->vlaltura;
                $vlcomprimento= $produto->vlcomprimento;
                $vlpeso = $produto->vlpeso; 




            	foreach ($cores as $cor):
            		if ($cor->idcor == $idcor):
            				$descor = $cor->descor; 
            		endif; 
            	endforeach; 
            ?>


            	<div class="produto-detalhes">

            			<h2> <?php echo $nome ?>  </h2>

	                
	                <div class="col-lg-5">
	                    <a href = "#"> 
	      
                        <h1 class="img-detalhe-produto">
                            <?php echo img($img,'class="img-fluid"'); ?>
                        </h1>

	                    </a>
	                </div>
		
	                <div class="col-lg-7 descricao-pro">
	                	 
                        <label class="label-des"> Descrição: </label>
                        <p class="paragraf-des"> <?php echo $descricao; ?> </p> 

                        <label class="label-des"> Cor: </label>
                        <p class="paragraf-des"> <?php echo $idcor." - ".$descor; ?> </p> 

                        <label class="label-des"> Largura: </label>
                        <p class="paragraf-des"> <?php echo $vllargura; ?> <b> mm </b> </p> 

                        <label class="label-des"> Altura: </label>
                        <p class="paragraf-des"> <?php echo $vlaltura; ?> <b> mm </b> </p>

                        <label class="label-des"> Comprimento: </label>
                        <p class="paragraf-des"> <?php echo $vlcomprimento; ?> <b> mm </b> </p>  

                        <label class="label-des"> Peso: </label>
                        <p class="paragraf-des"> <?php echo $vlpeso; ?> <b> kg </b> </p> 
	                </div>
	           </div>
	            

            <?php
            endforeach;
            ?>

        </div>
    </div>
</div>

