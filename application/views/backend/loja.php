<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"> <?php echo "Administrar ".$subtitulo ?></h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>
                        <?php echo "Adicionar nova ".$subtitulo ?>
                    </h4>
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
                            echo form_open('admin/loja/inserir');
        
                            ?> 
                            
                            <div class = "form-group col-lg-4">
                                <label> Nome da Loja </label>
                                <input id="nome" name="nome" type="text"class = "form-control" placeholder ="Digite o nome da Loja"
                                value = "<?php echo set_value('nome') ?>"> 
                            </div>

                            <div class = "form-group col-lg-4">
                                <label> Endereço </label>
                                <input id="endereco" name="endereco" type="text"class = "form-control" placeholder ="Digite o Endereço"
                                value = "<?php echo set_value('endereco') ?>"> 
                            </div>

                            <div class="form-group col-lg-4">
                              <label for="enderecosite"> O Endereço da Loja estará no Site? </label>
                              <select class="form-control" id="enderecosite" name="enderecosite">
                            
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

                            <div class="form-group col-lg-4">
                              <label for="promocaosite"> Produtos em Promoção estará no Site? </label>
                              <select class="form-control" id="promocaosite" name="promocaosite">
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

                            <div class = "form-group col-lg-4">
                                <label> Email da Loja </label>
                                <input id="email" name="email" type="email"class = "form-control" placeholder ="Digite o Email"
                                value = "<?php echo set_value('email') ?>"> 
                            </div>

                            <div class="form-group col-lg-4">
                              <label for="emailsite"> O Email Aparecerá no Site? </label>
                              <select class="form-control" id="emailsite" name="emailsite">
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

                            <div class = "form-group col-lg-4">
                                <label> Facebook </label>
                                <input id="facebook" name="facebook" type="text"class = "form-control" placeholder ="Informe o Facebook"
                                value = "<?php echo set_value('facebook') ?>"> 
                            </div>

                            <div class="form-group col-lg-4">
                              <label for="facebooksite"> O Facebook Aparecerá no Site? </label>
                              <select class="form-control" id="facebooksite" name="facebooksite">
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

                            <div class = "form-group col-lg-4">
                                <label> Instagran </label>
                                <input id="instagram" name="instagram" type="text"class = "form-control" placeholder ="Informe o Instagram"
                                value = "<?php echo set_value('instagram') ?>"> 
                            </div>

                            <div class="form-group col-lg-4">
                              <label for="instagramsite"> O Instagram Aparecerá no Site? </label>
                              <select class="form-control" id="instagramsite" name="instagramsite">
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

                            <div class = "form-group col-lg-4">
                                <label> Whatsapp  </label>
                                <input id="whatsapp" name="whatsapp" type="text"class = "form-control" placeholder ="Informe o Whatsapp"
                                value = "<?php echo set_value('whatsapp') ?>"> 
                            </div>

                            <div class="form-group col-lg-4">
                              <label for="whatsappsite"> O Whatsapp Aparecerá no Site? </label>
                              <select class="form-control" id="whatsappsite" name="whatsappsite">
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

                            <div class = "form-group col-lg-4">
                                <label> Telefone Fixo  </label>
                                <input id="fonefixo" name="fonefixo" type="text"class = "form-control" placeholder ="Informe o Telefone Fixo"
                                value = "<?php echo set_value('fonefixo') ?>"> 
                            </div>

                            <div class="form-group col-lg-4">
                              <label for="fonefixosite"> O Telefone Fixo Aparecerá no Site? </label>
                              <select class="form-control" id="fonefixosite" name="fonefixosite">
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

                            <div class = "form-group col-lg-4">
                                <label> Telefone Celular  </label>
                                <input id="fonecelular" name="fonecelular" type="text"class = "form-control" placeholder ="Informe o Telefone Celular"
                                value = "<?php echo set_value('fonefixo') ?>"> 
                            </div>

                            <div class="form-group col-lg-4">
                              <label for="fonecelularsite"> O Telefone Celular Aparecerá no Site? </label>
                              <select class="form-control" id="fonecelularsite" name="fonecelularsite">
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

                            <div class = "form-group col-lg-4">
                                <label> Localização Google  </label>
                                <input id="localgoogle" name="localgoogle" type="text"class = "form-control" placeholder ="Informe a Localização"
                                value = "<?php echo set_value('localgoogle') ?>"> 
                            </div>

                            <div class="form-group col-lg-4">
                              <label for="localgooglesite"> A Localização Aparecerá no Site? </label>
                              <select class="form-control" id="localgooglesite" name="localgooglesite">
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

                            <div class = "form-group col-lg-4">
                                <label> Sobre Nós  </label>
                                <input id="sobrenos" name="sobrenos" type="text"class = "form-control" placeholder ="Escreva Sobre a Loja"
                                value = "<?php echo set_value('sobrenos') ?>"> 
                            </div>

                            <div class="form-group col-lg-4">
                              <label for="sobrenossite"> O Sobre Nós Aparecerá no Site? </label>
                              <select class="form-control" id="sobrenossite" name="sobrenossite">
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

                            <div class="form-group col-lg-4">
                              <label for="siteonline"> Liberar Site Para Acessos? </label>
                              <select class="form-control" id="siteonline" name="siteonline">
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

        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>
                   <?php  echo "Manutenção de ".$subtitulo." - As informações abaixo, mostram os intens que estão disponiveis no site (SIM ou NAO)" ?>
                    </h4>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12 fotos-usuarios">
                  
                            <!-- gerar tabela de usuarios pela framework PJCS --> 
                            <?php
                    

                            $this->table->set_heading(  "Nome",
                                                        "Ender ", 
                                                        "Promo ",
                                                        "Email ",
                                                        "Face",
                                                        "Insta",
                                                        "What",
                                                        "TelFixo",
                                                        "Celular",
                                                        "Local",
                                                        "Sobre",
                                                        "OnLine"); 

                            foreach ($loja as $loj)
                            {   
                                $id = $loj->id; 
                                $nome   = $loj->nome;
                                $end    = $loj->enderecosite;
                                $prom   = $loj->promocaosite;
                                $email  = $loj->emailsite; 
                                $face   = $loj->facebooksite; 
                                $inst   = $loj->instagramsite;
                                $what   = $loj->whatsappsite;
                                $fixo   = $loj->fonefixosite;
                                $cel    = $loj->fonecelularsite;
                                $local  = $loj->localgooglesite;
                                $sobre  = $loj->sobrenossite;
                                $online = $loj->siteonline; 


                                $botaoalterar = anchor(base_url('admin/loja/alterar/'.md5($id)),
                                    '<i class="fas fa-edit"> </i> Alterar');

                                $botaoexcluir= '<button type="button" class="btn btn-link" data-toggle="modal" data-target=".excluir-modal-'.$id.'"><i class="fa fa-remove fa-fw"></i> Excluir </button>';

                                echo $modal= ' <div class="modal fade excluir-modal-'.$id.'" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel2"> <i class="fa fa-remove fa-fw"></i> Exclusão de Loja </h4>
                                            </div>
                                            <div class="modal-body">
                                                <h4>Deseja Excluir a Loja '.$nome.'?</h4>
                                                <p>Após Excluida a Loja <b>'.$nome.'</b> não ficara mais disponível no Sistema.</p>
                                                <p>Todas as Configurações relacionados a Loja <b>'.$nome.'</b> serão perdidas e o Site poderá ficar INUTILIZÁVEL!!.</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                <a type="button" class="btn btn-danger" href="'.base_url('admin/loja/excluir/'.md5($id)).'">Excluir Loja</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>';



                                $this->table->add_row($nome,$end,$prom,$email,$face,$inst,$what,$fixo,$cel,$local,$sobre,$online,$botaoalterar,$botaoexcluir); 
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
