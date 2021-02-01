<?php
foreach ($loja as $lojasviamar):
?>
   
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="header-right text-right">
                        <?php
                        if ($lojasviamar->facebooksite ==1):
                        ?>
                            <a href="/www.facebook.com.br">
                                <i class="fa fa-facebook fa-1x"></i>
                            </a>
                        <?php
                        endif;
                        
                        if ($lojasviamar->instagramsite ==1):
                        ?> 
                            <a href="/www.instagram.com">
                                <i class="fa fa-instagram fa-1x"></i>
                            </a>
                        <?php
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->


    <!--
    <div class="site-branding-area">
    --> 
    <div class="site-branding-area area-logo">
        <div class="container-fluid">
            <div class="row">
                <!-- imagens serão ajustadas Pc ou Mobile - responsive.css PJCS  --> 
                <div class="col-sm-12">
                    <div class="logo text-center">
                        <h1> <a href="<?php echo base_url('home'); ?>"><img src="<?php echo base_url('/assets/frontend/img/logo4.png') ?>" width="1250" ></a></h1>
                    </div>

                    <div class="logo2 text-center">
                        <h1> <a href="<?php echo base_url('home'); ?>"><img src="<?php echo base_url('/assets/frontend/img/logo5.png') ?>" width="1300" ></a></h1>
                    </div>
                </div>              
            </div>
        </div>
    </div> <!-- End site branding area -->
    
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <!-- menu responsivo --> 
                <div class="menu-mobile"> 
                    <div class = "navbar-header">
                        <button  type="button"  class="navbar-toggle" data-toggle="collapse"  data-target=".navbar-collapse ">
                            <span  class= "sr-only" > Alternar navegação </span>
                            <span  class= "icon-bar"> </span>
                            <span  class= "icon-bar"> </span>
                            <span  class= "icon-bar"> </span>
                        </button >
                    </div>

                    <div class="navbar-collapse collapse nav-mobile">
                        <ul class="nav navbar-nav navbar-right">

                            <div> 
                                <button class="btn btn-secondary dropdown-toggle" type="button" >
                                    <a class="nav-aba" href="<?php echo base_url('home'); ?>"><i class="fa fa-home"> </i>
                                     Inicio 
                                    </a>
                                 </button>
                            </div>
              
                            <div class="dropdown menu-itens-mobile">
                                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <a> Produtos </a>
                                  </button>
                                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <?php 
                                            $this->load->view('frontend/template/categorias-menu');
                                            ?>

                                        </li>
                                  </div>
                            </div>

                            <?php
                            if ($lojasviamar->promocaosite ==1):
                            ?>
                                <div> 
                                    <button class="btn btn-secondary dropdown-toggle" type="button">
                                        <a class="nav-aba" href="<?php echo base_url('home/lista_produtos_promocao') ?>"> <i class=""> </i>
                                         Promoções  </a>
                                    </button>
                                </div>

                                <?php
                            endif;
                        
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
                                <div> 
                                    <button class="btn btn-secondary dropdown-toggle" type="button">
                                        <a class="nav-aba" href="#fale-conosco"> <i class="fa fa-phone-square"> </i>
                                         Fale conosco </a>
                                    </button>
                                </div>
                                <?php
                            endif;
                            
                            if ($lojasviamar->sobrenossite ==1):
                                ?>
                                <div> 
                                    <button class="btn btn-secondary dropdown-toggle" type="button">
                                        <a class="nav-aba" href="#sobre-nos"> <i class="fa fa-thumbs-o-up"> </i>
                                         Sobre nós </a>
                                    </button>
                                </div>

                                <?php
                            endif;
                            
                            if ($lojasviamar->localgooglesite ==1):
                                ?>

                                <div> 
                                    <button class="btn btn-secondary dropdown-toggle" type="button">
                                        <a class="nav-aba" href="#nossa-localizacao"> <i class="fa fa-map-marker"> </i>
                                         Nossa Localização </a>
                                    </button>
                                </div>
                                <?php
                            endif;
                            ?>
                         
                        </ul>
                    </div>
                </div>  


                <div class="navbar-collapse collapse menu-pc">
                    <ul class="nav navbar-nav navbar-right">
          
                        <li role="presentation" class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                              Produtos <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <?php 
                                    $this->load->view('frontend/template/categorias-menu');
                                    ?>

                                </li>
                             
                            </ul>
                        </li>
                        <?php
                        if ($lojasviamar->promocaosite ==1):
                        ?>
                            <li> <a class="nav-aba" href="<?php echo base_url('home/lista_produtos_promocao') ?>"> 
                                 Promoções </a>
                            </li>
                            <?php
                        endif;
                    
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

                            <li> <a class="nav-aba" href="#fale-conosco"> 
                                 <i class="fa fa-phone-square"> </i> Fale conosco </a>
                            </li>
                            <?php
                        endif;
                        
                        if ($lojasviamar->sobrenossite ==1):
                            ?>
                            <li> <a class="nav-aba" href="#sobre-nos"> 
                                 <i class="fa fa-thumbs-o-up"> </i> Sobre nós </a>
                            </li>
                            <?php
                        endif;
                            
                        if ($lojasviamar->localgooglesite ==1):
                            ?>
                             <li> <a class="nav-aba" href="#nossa-localizacao"> 
                                 <i class="fa fa-map-marker"> </i> Nossa Localização </a>
                             </li>
                            <?php
                        endif; 
                        ?>

                        <li> <a class="nav-aba" href="<?php echo base_url('home'); ?>">
                            <i class="fa fa-home"> </i>
                             Inicio </a>
                         </li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->
    
<?php
endforeach;
?>
