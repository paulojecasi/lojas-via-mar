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
                   <?php echo "Adicionar nova ".$subtitulo ?>
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
                            echo form_open('admin/categoria/inserir');
        
                            ?>
                            <div class="form-group"> 
                                <label> Nome da Categoria </label>
                                <input id="txt-categoria" name="txt-categoria" type="text"class = "form-control" placeholder ="Digite o nome da categoria">
                            </div>

                            <div class="form-group">                          
                                <div class="form-group">
                                  <label for="categoriadest"> Destacar no Site? </label>
                                  <select class="form-control" id="categoriadest" name="categoriadest">
                                
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
                   <?php echo "Alterar ".$subtitulo." existente" ?>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                  
                            <!-- gerar tabela de categorias pela framework PJCS --> 
                            <?php
                            $this->table->set_heading("Nome da Categoria", "Dtq", 
                                                        "Alterar",
                                                        "Excluir"); 

                            foreach ($categorias as $categoria)
                            { 
                                $nomecategoria= $categoria->titulo;


                                if ($categoria->categoriadest==1){
                                    $destaque = "S";
                                }else{
                                    $destaque= "N";
                                }

                                $botaoalterar = anchor(base_url('admin/categoria/alterar/'.md5($categoria->id)),
                                    '<i class="fas fa-edit"> </i> Alterar');

                             //   $botaoexcluir = anchor(base_url('admin/categoria/excluir/'.md5($categoria->id)),
                             //       '<i class="fa fa-remove fa-fw"> </i> Excluir');

                                $botaoexcluir= '<button type="button" class="btn btn-link" data-toggle="modal" data-target=".excluir-modal-'.$categoria->id.'"> <h4 class="btn-excluir"><i class="fa fa-remove fa-fw"></i>  Excluir </h4> </button>';


                                echo $modal= ' <div class="modal fade excluir-modal-'.$categoria->id.'" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel2"> <i class="fa fa-remove fa-fw"></i> Exclusão de Categoria</h4>
                                            </div>
                                            <div class="modal-body">
                                                <h4>Deseja Excluir a Categoria '.$categoria->titulo.'?</h4>
                                                <p>Após Excluida a categoria <b>'.$categoria->titulo.'</b> não ficara mais disponível no Sistema.</p>
                                                <p>Todos os itens relacionados a categoria <b>'.$categoria->titulo.'</b> serão afetados e não aparecerão no site até que sejam editados.</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                <a type="button" class="btn btn-danger" href="'.base_url("admin/categoria/excluir/".md5($categoria->id)).'">Excluir</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>';

                                $this->table->add_row($nomecategoria,$destaque,$botaoalterar,$botaoexcluir); 
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