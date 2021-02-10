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
                        <?php echo $subtitulo ?>
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
                            echo form_open('admin/loja/salvar_alteracoes');
        
                            foreach ($lista_loja as $loj_alt):
                            ?> 

                            
                                <div class = "form-group col-lg-4">
                                    <label> Nome da Loja </label>
                                    <input id="nome" name="nome" type="text"class = "form-control" placeholder ="Digite o nome da Loja"
                                    value = "<?php echo $loj_alt->nome ?>"> 
                                </div>

                                <div class = "form-group col-lg-4">
                                    <label> Endereço </label>
                                    <input id="endereco" name="endereco" type="text"class = "form-control" placeholder ="Digite o Endereço"
                                    value = "<?php echo $loj_alt->endereco ?>"> 
                                </div>

                                <div class="form-group col-lg-4">
                                  <label for="enderecosite"> O Endereço da Loja estará no Site? </label>
                                  <select class="form-control" id="enderecosite" name="enderecosite">
                                
                                    <?php 
                                    foreach ($opcoes as $opcao):
                                    ?>
                                        <option value ="<?php echo $opcao->idopcao ?> "
                                          <?php 
                                            if ($opcao->idopcao==$loj_alt->enderecosite):?>
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

                                <div class="form-group col-lg-4">
                                  <label for="promocaosite"> Produtos em Promoção estará no Site? </label>
                                  <select class="form-control" id="promocaosite" name="promocaosite">
                                    <?php 
                                    foreach ($opcoes as $opcao):
                                    ?>
                                        <option value ="<?php echo $opcao->idopcao ?> "
                                          <?php 
                                            if ($opcao->idopcao==$loj_alt->promocaosite):?>
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

                                <div class = "form-group col-lg-4">
                                    <label> Email da Loja </label>
                                    <input id="email" name="email" type="email"class = "form-control" placeholder ="Digite o Email"
                                    value = "<?php echo $loj_alt->email ?>"> 
                                </div>

                                <div class="form-group col-lg-4">
                                  <label for="emailsite"> O Email Aparecerá no Site? </label>
                                  <select class="form-control" id="emailsite" name="emailsite">
                                    <?php 
                                    foreach ($opcoes as $opcao):
                                    ?>
                                        <option value ="<?php echo $opcao->idopcao ?> "
                                          <?php 
                                            if ($opcao->idopcao==$loj_alt->emailsite):?>
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

                                <div class = "form-group col-lg-4">
                                    <label> Facebook </label>
                                    <input id="facebook" name="facebook" type="text"class = "form-control" placeholder ="Informe o Facebook"
                                    value = "<?php echo $loj_alt->facebook ?>"> 
                                </div>

                                <div class="form-group col-lg-4">
                                  <label for="facebooksite"> O Facebook Aparecerá no Site? </label>
                                  <select class="form-control" id="facebooksite" name="facebooksite">
                                    <?php 
                                    foreach ($opcoes as $opcao):
                                    ?>
                                        <option value ="<?php echo $opcao->idopcao ?> "
                                          <?php 
                                            if ($opcao->idopcao==$loj_alt->facebooksite):?>
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

                                <div class = "form-group col-lg-4">
                                    <label> Instagran </label>
                                    <input id="instagram" name="instagram" type="text"class = "form-control" placeholder ="Informe o Instagram"
                                    value = "<?php echo $loj_alt->instagram ?>"> 
                                </div>

                                <div class="form-group col-lg-4">
                                  <label for="instagramsite"> O Instagram Aparecerá no Site? </label>
                                  <select class="form-control" id="instagramsite" name="instagramsite">
                                    <?php 
                                    foreach ($opcoes as $opcao):
                                    ?>
                                        <option value ="<?php echo $opcao->idopcao ?> "
                                          <?php 
                                            if ($opcao->idopcao==$loj_alt->instagramsite):?>
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

                                <div class = "form-group col-lg-4">
                                    <label> Whatsapp  </label>
                                    <input id="whatsapp" name="whatsapp" type="text"class = "form-control" placeholder ="Informe o Whatsapp"
                                    value = "<?php echo $loj_alt->whatsapp ?>"> 
                                </div>

                                <div class="form-group col-lg-4">
                                  <label for="whatsappsite"> O Whatsapp Aparecerá no Site? </label>
                                  <select class="form-control" id="whatsappsite" name="whatsappsite">
                                    <?php 
                                    foreach ($opcoes as $opcao):
                                    ?>
                                        <option value ="<?php echo $opcao->idopcao ?> "
                                          <?php 
                                            if ($opcao->idopcao==$loj_alt->whatsappsite):?>
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

                                <div class = "form-group col-lg-4">
                                    <label> Telefone Fixo  </label>
                                    <input id="fonefixo" name="fonefixo" type="text"class = "form-control" placeholder ="Informe o Telefone Fixo"
                                    value = "<?php echo $loj_alt->fonefixo ?>"> 
                                </div>

                                <div class="form-group col-lg-4">
                                  <label for="fonefixosite"> O Telefone Fixo Aparecerá no Site? </label>
                                  <select class="form-control" id="fonefixosite" name="fonefixosite">
                                    <?php 
                                    foreach ($opcoes as $opcao):
                                    ?>
                                        <option value ="<?php echo $opcao->idopcao ?> "
                                          <?php 
                                            if ($opcao->idopcao==$loj_alt->fonefixosite):?>
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

                                <div class = "form-group col-lg-4">
                                    <label> Telefone Celular  </label>
                                    <input id="fonecelular" name="fonecelular" type="text"class = "form-control" placeholder ="Informe o Telefone Celular"
                                    value = "<?php echo $loj_alt->fonefixo ?>"> 
                                </div>

                                <div class="form-group col-lg-4">
                                  <label for="fonecelularsite"> O Telefone Celular Aparecerá no Site? </label>
                                  <select class="form-control" id="fonecelularsite" name="fonecelularsite">
                                    <?php 
                                    foreach ($opcoes as $opcao):
                                    ?>
                                        <option value ="<?php echo $opcao->idopcao ?> "
                                          <?php 
                                            if ($opcao->idopcao==$loj_alt->fonecelularsite):?>
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

                                <div class = "form-group col-lg-4">
                                    <label> Localização Google  </label>
                                    <input id="localgoogle" name="localgoogle" type="text"class = "form-control" placeholder ="Informe a Localização"
                                    value = "<?php echo $loj_alt->localgoogle ?>"> 
                                </div>

                                <div class="form-group col-lg-4">
                                  <label for="localgooglesite"> A Localização Aparecerá no Site? </label>
                                  <select class="form-control" id="localgooglesite" name="localgooglesite">
                                    <?php 
                                    foreach ($opcoes as $opcao):
                                    ?>
                                        <option value ="<?php echo $opcao->idopcao ?> "
                                          <?php 
                                            if ($opcao->idopcao==$loj_alt->localgooglesite):?>
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

                                <div class = "form-group col-lg-4">
                                    <label> Sobre Nós  </label>
                                    <input id="sobrenos" name="sobrenos" type="text"class = "form-control" placeholder ="Escreva Sobre a Loja"
                                    value = "<?php echo $loj_alt->sobrenos ?>"> 
                                </div>

                                <div class="form-group col-lg-4">
                                  <label for="sobrenossite"> O Sobre Nós Aparecerá no Site? </label>
                                  <select class="form-control" id="sobrenossite" name="sobrenossite">
                                    <?php 
                                    foreach ($opcoes as $opcao):
                                    ?>
                                        <option value ="<?php echo $opcao->idopcao ?> "
                                          <?php 
                                            if ($opcao->idopcao==$loj_alt->sobrenossite):?>
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

                                <div class="form-group col-lg-4">
                                  <label for="siteonline"> Liberar Site Para Acessos? </label>
                                  <select class="form-control" id="siteonline" name="siteonline">
                                    <?php 
                                    foreach ($opcoes as $opcao):
                                    ?>
                                        <option value ="<?php echo $opcao->idopcao ?> "
                                          <?php 
                                            if ($opcao->idopcao==$loj_alt->siteonline):?>
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


                                <div class = "form-group col-lg-4">
                                    <input id="idloja" name="idloja" type="hidden"class = "form-control" 
                                    value = "<?php echo $loj_alt->id ?>"> 
                                </div>
                            <?php
                            endforeach;
                            ?> 

                            <a href="">
                                <button class="btn btn-primary" > 
                                    Atualizar Loja
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
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
