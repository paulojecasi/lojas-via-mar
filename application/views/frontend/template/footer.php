<?php foreach ($loja as $lojasviamar): 

if ($lojasviamar->localgooglesite ==1):  
    ?>

    <div>
        <div class="nossa-localizacao" id="nossa-localizacao">   
            <div class="product-big-title-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="product-bit-title text-center">
                                <h2> <i class="fa fa-map-marker"> </i> Nossa Localização  </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <h3> <?php echo $lojasviamar->endereco ?> </h3>

            <div class="container-fluid iframe-fluid"> 
                <iframe src="<?php echo $lojasviamar->localgoogle ?>"  frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
                    
                </iframe>
            </div>
        </div>

    </div>

<?php 
endif;
?>


<div class="footer-top-area">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6" id="sobre-nos">
                <?php
                if ($lojasviamar->sobrenossite ==1):  
                ?>
                    <div class="footer-about-us">
                        <h2 class="footer-wid-title" >Lojas Via Mar</h2>
                        <p> <?php echo $lojasviamar->sobrenos ?> </p>
                        
                    </div>
                <?php
                endif;   
                ?>
            </div>
            
            <div class="col-md-4 col-sm-6" id="fale-conosco">
                <?php
                if ($lojasviamar->fonefixosite==1
                    ||
                    $lojasviamar->fonecelsite==1
                    ||
                    $lojasviamar->facebooksite==1
                    ||
                    $lojasviamar->instagramsite==1
                    ||
                    $lojasviamar->emailsite==1
                    ||
                    $lojasviamar->whatsappsite==1
                ):  
                ?>
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Fale Conosco </h2>
                     
                        <div class="menu-fal-cono">
                            <?php
                            if ($lojasviamar->fonefixosite==1): ?>
                                <div class ="footer-social form-group">
                                    <a href="" target="_blank"><i class="fa fa-phone"></i></a>  
                                    <?php echo $lojasviamar->fonefixo ?> 
                                </div>
                                <?php
                            endif;   
                           
                            if ($lojasviamar->fonecelularsite==1): ?>
                                <div class ="footer-social form-group">
                                    <a href="" target="_blank"><i class="fa fa-mobile"></i></a>  
                                    <?php echo $lojasviamar->fonecelular ?>
                                </div>
                                <?php
                            endif;   
                            
                            if ($lojasviamar->whatsappsite==1): ?>
                                <div class ="footer-social form-group">
                                    <a href="" target="_blank"><i class="fa fa-whatsapp"></i></a> 
                                    <?php echo $lojasviamar->whatsapp ?>
                                </div>
                                <?php
                            endif;   
                            
                            if ($lojasviamar->emailsite ==1): ?>
                                <div class ="footer-social form-group">
                                    <a href="" target="_blank"><i class="fa fa-envelope"></i></a> 
                                    <?php echo $lojasviamar->email ?>
                                </div>
                                <?php
                            endif;   
                            
                            if ($lojasviamar->facebooksite ==1): ?>
                                <div class ="footer-social form-group">
                                    <a href="https://www.facebook.com/hcodebr" target="_blank"><i class="fa fa-facebook"></i></a> 
                                </div>
                                <?php
                            endif;   
                            
                            if ($lojasviamar->instagramsite ==1): ?>
                                <div  class="footer-social form-group">
                                    <a href="https://twitter.com/hcodebr" target="_blank"><i class="fa fa-instagram"></i></a>
                                </div>
                                <?php
                            endif;   
                            ?>

                        </div>
                            <!--
                            <li><a> Minha Conta</a></li>
                            <li><a >Meus Pedidos</a></li>
                            <li><a >Lista de Desejos</a></li> --> 
                                               
                    </div>

                <?php
                endif;   
                ?>
            </div>
            
            <div class="col-md-4 col-sm-6">
                <div class="footer-menu menu-categ-footer">
                    <h2 class="footer-wid-title">Categorias</h2>
                    <ul>
                        <li>
                           
                            <?php 
                                $this->load->view('frontend/static/categorias-menu');
                            ?>
                        
                        </li>
                       
                    </ul>                        
                </div>
            </div>
         
        </div>
    </div>
</div> <!-- End footer top area -->

    
<div class="footer-bottom-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8">
                <div class="copyright">
                    <p>&copy; <?php echo $lojasviamar->nome ?>
                        <?php
                        if ($lojasviamar->emailsite==1):
                        ?>
                            <a href="" target="_blank">
                                <?php echo $lojasviamar->email?>
                            </a>
                        <?php
                        endif; 
                        ?>

                    </p>
                </div>
            </div>
            
            <div class="col-md-4 col-sm-4">
                <div class="footer-card-icon">
                    <i class="fa fa-cc-discover"></i>
                    <i class="fa fa-cc-mastercard"></i>
                    <i class="fa fa-cc-paypal"></i>
                    <i class="fa fa-cc-visa"></i>
                </div>
            </div>

            <div class="col-md-12 text-center cactosdev">
                <p class="des-por"> Desenvolvido por </p>
                <h3> <img class="img-fluid cacto" src=" <?php echo base_url('assets/frontend/img/cactosdev.png'); ?>"> Cactos Dev </h3>
                <p> <img class="img-fluid email" src=" <?php echo base_url('assets/frontend/img/email.png'); ?>"> cactosdev@gmail.com 
                <img class="img-fluid whats" src=" <?php echo base_url('assets/frontend/img/whats.png'); ?>"> (86) 99973 3764  </p>
            </div>
        </div>
    </div>
</div> <!-- End footer bottom area -->



<?php endforeach ?>
<div class="rela" >
    <a class="scrollToTop" > <i class="fa fa-angle-double-up"></i> <br> Topo </a>
    <br> 

    <a class="scrollToHome" href = "<?php echo base_url('home'); ?>" > <i class="fa fa-home"></i> <br> Inicio  </a>
</div>

