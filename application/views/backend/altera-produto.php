
<div id="page-wrapper">
	<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"> <?php echo $subtitulo." - Alteração" ?></h1>
    </div>
    <!-- /.col-lg-12 -->
	</div>

	<div class="row">
	  <div class="col-lg-8">
	    <div class="panel panel-default">
	      <div class="panel-heading">
	         <?php echo $subtitulo ?>
	      </div>
	      <div class="panel-body">
	        <div class="row">
	          <div class="col-lg-12 layout-campos">

		          <!-- nao vamos utilizar a abertura do form, vamos usar o HELPER do
		          framework (form_open) --> 

		          <?php
		          // aqui vamos vericar os erros de validação
		          echo validation_errors('<div class="alert alert-warning">','</div>'); 
		          
		          // vamos abrir o formulário,
		                      // apontando para:admin/controlador/metodo
		          echo form_open('admin/produto/salvar_alteracoes');

		          foreach ($produto as $produto_alt):
		          ?> 

		            <div class="form-group">
		                <label> Descrição do Produto </label>
		                <input id="txt-desproduto" name="txt-desproduto" type="text"class = "form-control" placeholder ="Digite o nome do produto" value = "<?php echo $produto_alt->desproduto ?>">
		            </div>

		           
	              <div class="form-group">
	                <label for="corproduto"> Cor do Produto </label>
	                <select class="form-control" id="corproduto" name="corproduto">
	              
	                  <?php 
	                  foreach ($cores as $cor): 
	                   ?> 
	                    <option  value =" <?php echo $cor->idcor ?> "
	                    	<?php 
	                    	if ($cor->idcor==$produto_alt->corproduto): ?>
	                    			selected
	                    			<?php                                          
	                    	endif;
	                    	?> 
	                    > 
	                      <?php echo $cor->descor ?>
	                    </option>
	                  <?php
	                  endforeach;
	                  ?> 
	                </select>
	              </div>
		        
	              <div class="form-group">
	                <label for="idcategoria"> Categoria do Produto </label>
	                <select class="form-control" id="idcategoria" name="idcategoria">
	                  <?php 
	                  foreach ($categorias as $categoria):
	                   ?> 
	                    <option value ="<?php echo $categoria->id ?>"
	                    	<?php 
	                    	if ($categoria->id==$produto_alt->idcategoria): ?>
	                    			selected
	                    			<?php                                          
	                    	endif;
	                    	?> 
	                    >
	                       <?php echo $categoria->titulo ?>
	                    </option>
	                  <?php
	                  endforeach;
	                  ?> 

	                </select>
	              </div>

		            <div class="form-group">  
		              <label> Preço </label>
		              <input type="number" class="form-control" id="vlpreco" name="vlpreco" step="0.01" placeholder="0.00" value = "<?php echo $produto_alt->vlpreco ?>">
		            </div>

		            <div class="form-group"> 
		              <label> Largura </label>
		              <input type="number" class="form-control" id="vllargura" name="vllargura" step="0.01" placeholder="0.00" value = "<?php echo $produto_alt->vllargura ?>">
		            </div>

		            <div class="form-group">
		              <label> Altura </label>
		              <input type="number" class="form-control" id="vlaltura" name="vlaltura" step="0.01" placeholder="0.00" value = "<?php echo $produto_alt->vlaltura ?>">
		            </div>

		            <div class="form-group">
		              <label> Comprimento </label>
		              <input type="number" class="form-control" id="vlcomprimento" name="vlcomprimento" step="0.01" placeholder="0.00" value = "<?php echo $produto_alt->vlcomprimento ?>">
		            </div>

		            <div class="form-group">  
		              <label> Peso </label>
		              <input type="number" class="form-control" id="vlpeso" name="vlpeso" step="0.01" placeholder="0.00" value = "<?php echo $produto_alt->vlpeso ?>">
		            </div>

		            <div class="form-group">
		              <label> Valor Promoção </label>
		              <input type="number" class="form-control" id="vlpromocao" name="vlpromocao" step="0.01" placeholder="0.00" value = "<?php echo $produto_alt->vlpromocao ?>">
		            </div>

	              <div class="form-group">
	                <label for="produtoativo"> Produto Ativo? </label>
	                <select class="form-control" id="produtoativo" name="produtoativo">
	              
	                  <?php 
	                  foreach ($opcoes as $opcao):
	                  ?>
	                    <option value ="<?php echo $opcao->idopcao ?> "
	                      <?php 
	                    	if ($opcao->idopcao==$produto_alt->produtoativo): ?>
	                    			selected
	                    			<?php                                          
	                    	endif;
	                      ?> 
	                     >
	                       <?php echo $opcao->desopcao ?>
	                    </option>
	                  <?php 
	                  endforeach;
	                  ?>
	                
	                </select>
	              </div>
	          
		          	
	              <div class="form-group">
	                <label for="produtodestaque"> Produto Destaque? </label>
	                <select class="form-control" id="produtodestaque" name="produtodestaque">
	              
	                  <?php 
	                  foreach ($opcoes as $opcao):
	                  ?>
	                      <option value ="<?php echo $opcao->idopcao ?> "
	                        <?php 
	                      	if ($opcao->idopcao==$produto_alt->produtodestaque):?>
	                      			selected
	                      			<?php                                          
	                      	endif
		                      ?> 
	                      >
	                         <?php echo $opcao->desopcao ?>
	                      </option>

	                  <?php 
	                  endforeach; 
	                  ?>
	                
	                </select>
	              </div>
		        
	              <div class="form-group">
	                <label for="actproduct"> Produto no Site? </label>
	                <select class="form-control" id="produtosite" name="produtosite">
	                  <?php 
	                  foreach ($opcoes as $opcao):
	                  ?>
                      <option value ="<?php echo $opcao->idopcao ?> "
                      	<?php 
                      	if ($opcao->idopcao==$produto_alt->produtosite): ?>
                      			selected
                      			<?php                                          
                      	endif;
	                      ?>
                      >
                         <?php echo $opcao->desopcao ?>
                      </option>

	                  <?php 
	                  endforeach;
	                  ?>
	                </select>
	              </div>
		       
	            	<!-- INPUT OCULTO PARA ENVIAR O ID--> 
	              <input  type="hidden" id="idproduto" name="idproduto" value= "<?php echo $produto_alt->idproduto ?>" 
	              >
		            <br> 
		            <a href="">
		                <button class="btn btn-primary" > 
		                    Alterar
		                </button> 
		            </a>
		      
		            <?php 
		            // fechar o formulario 
		            echo form_close();
		            ?> 
		                
		            
            </div>
            <!-- /.col-lg-->
          </div>
            <!-- /.row (nested) -->
        </div>
          <!-- /.panel-body -->
      </div>
      <!-- /.panel -->
    </div>

  	<!-- PARA FOTOS --> 

    <div class="col-lg-4">
      <div class="panel panel-default">
        <div class="panel-heading">
           Foto do Produto
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-12 product-img text-center">
                <?php 
                $semFoto = "assets/frontend/img/products/sem_foto.jpg";
                if ($produto_alt->img!=''){
                    echo img($produto_alt->img); 
                } else {
                    echo img($semFoto);
                }
                ?>
            </div>
          </div>
          <br> 
          <div class="row">
            <div class="col-lg-12">
                <?php

                $divopen = '<div class="form-group">';
                $divclose= '</div>';

                echo form_open_multipart('admin/produto/nova_imagem'); 
                echo form_hidden('id_produto', md5($produto_alt->idproduto)); 
                echo $divopen;
                $imagem = array('name'=>'userfile', 
                                'id'=>'userfile',
                                'class'=>'form-control'); 
                echo form_upload($imagem);
                echo $divclose;

                echo $divopen;
                $button = array('name'=>'btn-adicionar', 
                                'id'=>'btn-adicionar',
                                'class'=>'btn btn-primary',
                                'value'=>'Adicionar Imagem'); 
                echo form_submit($button);
                echo $divclose; 
                echo form_close(); 

              endforeach;   // fechamento do ultimo foreach 
              ?>
          	</div>
            
        	</div>
          <!-- /.row (nested) -->
      	</div>
        <!-- /.panel-body -->
    	</div>
    	<!-- /.panel -->
  	</div>
  </div>
  <!-- /.row -->
</div>
