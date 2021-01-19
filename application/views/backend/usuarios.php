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
                   <?php echo "Adicionar novo ".$subtitulo ?>
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
                            echo form_open('admin/usuarios/inserir');
            
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

                            <label> Nome do Usuario </label>
                            <input id="txt-usuario" name="txt-usuario" type="text"class = "form-control" placeholder ="Digite o nome do Usuario">
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
                  
                            <!-- gerar tabela de usuarios pela framework PJCS --> 
                            <?php
                            $this->table->set_heading(  "Nome  ",
                                                        "Email",
                                                        "Usuario", 
                                                        "Alterar",
                                                        "Excluir"); 

                            foreach ($lista_usuarios as $usuario)
                            { 
                                $nomeuser = $usuario->nome;
                                $emailuser= $usuario->email;
                                $useruser= $usuario->user;
                                $botaoalterar = anchor(base_url('admin/usuarios/alterar/'.md5($usuario->id)),
                                    '<i class="fas fa-edit"> </i> Alterar');
                                $botaoexcluir = anchor(base_url('admin/usuarios/excluir/'.md5($usuario->id)),
                                    '<i class="fa fa-remove fa-fw"> </i> Excluir');

                                $this->table->add_row($nomeuser,$emailuser,$useruser,$botaoalterar,$botaoexcluir); 
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