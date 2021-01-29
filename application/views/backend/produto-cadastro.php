<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header"> <?php echo $subtitulo ?></h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div class="row"> 
        <div class="col-lg-12">   
            <div class="panel panel-default">
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
                            echo form_open('admin/produto/inserir');
            
                            ?> 

                            <div class="form-group">
                                <label> Nome do Produto </label>
                                <input id="nomeproduto" name="nomeproduto" type="text"class = "form-control" placeholder ="Digite o nome do produto">
                            </div>

                            <div class="form-group">
                                <label> Descrição do Produto </label>
                                <textarea id="txt-desproduto" name="txt-desproduto" type="text" class = "form-control" placeholder ="Digite a Descrição do Produto"> 
                                </textarea>
                            </div>

                            <div class="form-group col-lg-6">
                              <label for="corproduto"> Cor do Produto </label>
                              <select class="form-control" id="corproduto" name="corproduto">
                            
                                <?php 
                                foreach ($cores as $cor) 
                                { ?> 
                                    <option  value =" <?php echo $cor->idcor ?> "
                                        <?php 
                                        if ($cor->descor=="PADRAO"): ?>
                                                selected
                                            <?php                                  
                                        endif;
                                        ?>
                                    >
                                        <?php echo $cor->descor ?>
                                    </option>
                                <?php
                                 }
                                ?> 
                              </select>
                            </div>

                            <div class="form-group col-lg-6">
                              <label for="idcategoria"> Categoria do Produto </label>
                              <select class="form-control" id="idcategoria" name="idcategoria">
                            
                                <?php 
                                foreach ($categorias as $categoria) 
                                { ?> 
                                    <option value ="<?php echo $categoria->id ?> " 
                                        <?php 
                                        if ($categoria->titulo=="OUTROS"): ?>
                                                selected
                                            <?php                                  
                                        endif;
                                        ?>
                                    >
                                        <?php echo $categoria->titulo ?>
                                    </option>
                                <?php
                                 }
                                ?> 
                              </select>
                            </div>
                           
                            <div class="form-group col-lg-6">  
                                <label>Valor Preço </label>
                                <input type="number" class="form-control" id="vlpreco" name="vlpreco" step="0.01" placeholder="0.00">
                            </div>
                            <div class="form-group col-lg-6">
                                <label> Valor Preço Promoção </label>
                                <input type="number" class="form-control" id="vlpromocao" name="vlpromocao" step="0.01" placeholder="0.00">
                            </div>
                            <div class="form-group col-lg-6"> 
                                <label> Largura </label>
                                <input type="number" class="form-control" id="vllargura" name="vllargura" step="0.01" placeholder="0.00">
                            </div>
                            <div class="form-group col-lg-6">
                                <label> Altura </label>
                                <input type="number" class="form-control" id="vlaltura" name="vlaltura" step="0.01" placeholder="0.00">
                            </div>
                            <div class="form-group col-lg-6">
                                <label> Comprimento </label>
                                <input type="number" class="form-control" id="vlcomprimento" name="vlcomprimento" step="0.01" placeholder="0.00">
                            </div>
                            <div class="form-group col-lg-6">  
                                <label> Peso </label>
                                <input type="number" class="form-control" id="vlpeso" name="vlpeso" step="0.01" placeholder="0.00">
                            </div>
                                        
                            <div class="form-group col-lg-6">
                              <label for="produtoativo"> O Produto está Ativo / Ainda consta na loja? </label>
                              <select class="form-control" id="produtoativo" name="produtoativo">
                            
                                <?php foreach ($opcoes as $opcao)
                                {
                                ?>
                                    <option value ="<?php echo $opcao->idopcao ?> ">
                                       <?php echo $opcao->desopcao ?>
                                    </option>
            
                                <?php 
                                }
                                ?>
                              
                              </select>
                            </div>
                        
                                                    
                            <div class="form-group col-lg-6">
                              <label for="actproduct"> O Produto será exibido no Site? </label>
                              <select class="form-control" id="produtosite" name="produtosite">
                            
                                <?php foreach ($opcoes as $opcao)
                                {
                                ?>
                                    <option value ="<?php echo $opcao->idopcao ?> ">
                                       <?php echo $opcao->desopcao ?>
                                    </option>
            
                                <?php 
                                }
                                ?>
                              
                              </select>
                            </div>

                            <div class="form-group col-lg-6">
                              <label for="produtodestaque">O Produto é Destaque na pagina Principal? </label>
                              <select class="form-control" id="produtodestaque" name="produtodestaque">
                            
                                <?php foreach ($opcoes as $opcao)
                                {
                                ?>
                                    <option value ="<?php echo $opcao->idopcao ?> ">
                                       <?php echo $opcao->desopcao ?>
                                    </option>
            
                                <?php 
                                }
                                ?>
                              
                              </select>
                            </div>

                            <div class="form-group col-lg-6">
                              <label for="destaquenacategoria">O Produto é Destaque na Parte de Categorias ? </label>
                              <select class="form-control" id="destaquenacategoria" name="destaquenacategoria">
                            
                                <?php foreach ($opcoes as $opcao)
                                {
                                ?>
                                    <option value ="<?php echo $opcao->idopcao ?> ">
                                       <?php echo $opcao->desopcao ?>
                                    </option>
            
                                <?php 
                                }
                                ?>
                              
                              </select>
                            </div>
                    

                            <div class="form-group col-lg-12 text-center button-add-prod">
                                <a href="">
                                    <button class="btn btn-primary" > 
                                        Adicionar Produto
                                    </button> 
                                </a>
                            </div>
                      
                            <?php 
                            // fechar o formulario 
                            echo form_close();
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
<!-- /#page-wrapper -->

> 