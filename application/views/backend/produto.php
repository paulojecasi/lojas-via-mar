<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> <?php echo "Administrar ".$subtitulo ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                   <?php echo "Adicionar novos ".$subtitulo ?>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">

                        <!-- nao vamos utilizar a abertura do form, vamos usar o HELPER do
                        framework (form_open) --> 
              
                            <?php
                            // aqui vamos vericar os erros de validação
                            echo validation_errors('<div class="alert alert-warning">','</div>'); 
                            
                            // vamos abrir o formulário,
                                        // apontando para:admin/controlador/metodo
                            echo form_open('admin/produto/inserir');
            
                            // BLOCO DE MENSAGENS 
                            if (!is_null($this->session->userdata('mensagem'))) 
                            { 
                            ?>
                                <div class="alert alert-success" role="alert">
                                    <b> 
                                        <?php
                                         echo $this->session->userdata('mensagem'); 
                                        ?>
                                    </b>
                                </div>
                                <?php 
                                // encerrar a secao
                                $this->session->unset_userdata('mensagem'); 
                            }
                            ?> 

                            <?php
                            if (!is_null($this->session->userdata('mensagemErro'))) 
                            { 
                            ?>
                                <div class="alert alert-danger" role="alert">
                                    <b> 
                                        <?php
                                         echo $this->session->userdata('mensagemErro'); 
                                        ?>
                                    </b>
                                </div>
                                <?php 
                                // encerrar a secao
                                $this->session->unset_userdata('mensagemErro'); 
                            }
                            ?> 

                            <div class="form-group">
                                <label> Descrição do Produto </label>
                                <input id="txt-desproduto" name="txt-desproduto" type="text"class = "form-control" placeholder ="Digite o nome do produto">
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                  <label for="idcor"> Cor do Produto </label>
                                  <select class="form-control" id="idcor" name="idcor">
                                
                                    <?php 
                                    foreach ($cores as $cor) 
                                    { ?> 
                                        <option  value =" <?php echo $cor->idcor ?> ">
                                            <?php echo $cor->descor ?>
                                        </option>
                                    <?php
                                     }
                                    ?> 
                                  </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                  <label for="idcategoria"> Categoria do Produto </label>
                                  <select class="form-control" id="idcategoria" name="idcategoria">
                                
                                    <?php 
                                    foreach ($categorias as $categoria) 
                                    { ?> 
                                        <option value ="<?php echo $categoria->id ?> ">
                                            <?php echo $categoria->titulo ?>
                                        </option>
                                    <?php
                                     }
                                    ?> 
                                  </select>
                                </div>
                            </div>
                            <div class="form-group">  
                                <label> Preço </label>
                                <input type="number" class="form-control" id="vlpreco" name="vlpreco" step="0.01" placeholder="0.00">
                            </div>
                            <div class="form-group"> 
                                <label> Largura </label>
                                <input type="number" class="form-control" id="vllargura" name="vllargura" step="0.01" placeholder="0.00">
                            </div>
                            <div class="form-group">
                                <label> Altura </label>
                                <input type="number" class="form-control" id="vlaltura" name="vlaltura" step="0.01" placeholder="0.00">
                            </div>
                            <div class="form-group">
                                <label> Comprimento </label>
                                <input type="number" class="form-control" id="vlcomprimento" name="vlcomprimento" step="0.01" placeholder="0.00">
                            </div>
                            <div class="form-group">  
                                <label> Peso </label>
                                <input type="number" class="form-control" id="vlpeso" name="vlpeso" step="0.01" placeholder="0.00">
                            </div>
                            <div class="form-group">
                                <label> Valor Promoção </label>
                                <input type="number" class="form-control" id="vlpromocao" name="vlpromocao" step="0.01" placeholder="0.00">
                            </div>
                            <div class="form-group">                          
                                <div class="form-group">
                                  <label for="produtoativo"> Produto Ativo? </label>
                                  <select class="form-control" id="txt-produtoativo" name="txt-produtoativo">
                                
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
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                  <label for="produtodestaque"> Produto Destaque? </label>
                                  <select class="form-control" id="txt-produtodestaque" name="txt-produtodestaque">
                                
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
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                  <label for="actproduct"> Produto no Site? </label>
                                  <select class="form-control" id="txt-produtosite" name="txt-produtosite">
                                
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
                            </div>
                            <div class="form-group">
                                <label> Foto do Produto </label>
                                <input type="text" class="form-control" id="txt-img" name="txt-img" placeholder="Selecione Foto">

                            </div>

                            <br> 
                            <a href="">
                                <button class="btn btn-primary" > 
                                    Adicionar
                                </button> 
                            </a>
                      
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

        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                   <?php echo "Manutenção de ".$subtitulo ?>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                  
                            <!-- gerar tabela de categorias pela framework PJCS --> 
                            <?php
                            $this->table->set_heading("Id-Produto","Nome do Produto",
                                                        "Alterar",
                                                        "Excluir"); 

                            foreach ($produtos as $produto)
                            {   
                                $idproduto= $produto->idproduto;
                                $desproduto= $produto->desproduto;
                                $botaoalterar = anchor(base_url('admin/produto/alterar/'.md5($produto->idproduto)),
                                    '<i class="fas fa-edit"> </i> Alterar');
                                $botaoexcluir = anchor(base_url('admin/produto/excluir/'.md5($produto->idproduto)),
                                    '<i class="fa fa-remove fa-fw"> </i> Excluir');

                                $this->table->add_row($idproduto, $desproduto,$botaoalterar,$botaoexcluir); 
                            }

                            $this->table->set_template(array(
                                'table_open' => '<table class="table table-striped">'
                            ));

                            echo $this->table->generate(); 
                            ?>
                                        
                        </div>
                        
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->


<!--
<form role="form">
    <div class="form-group">
        <label>Titulo</label>
        <input class="form-control" placeholder="Entre com o texto">
    </div>
    <div class="form-group">
        <label>Foto Destaque</label>
        <input type="file">
    </div>
    <div class="form-group">
        <label>Conteúdo</label>
        <textarea class="form-control" rows="3"></textarea>
    </div>
   
    <div class="form-group">
        <label>Selects</label>
        <select class="form-control">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
        </select>
    </div>
    <button type="submit" class="btn btn-default">Cadastrar</button>
    <button type="reset" class="btn btn-default">Limpar</button>
</form>

--> 