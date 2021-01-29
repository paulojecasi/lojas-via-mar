    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="header-right text-right">
                        <a href="/www.facebook.com.br">
                            <i class="fa fa-facebook fa-1x"></i>
                        </a>

                        <a href="/www.instagram.com">
                            <i class="fa fa-instagram fa-1x"></i>
                        </a>
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
                <div class = "navbar-header ">
                    <button  type="button"  class="navbar-toggle" data-toggle="collapse"  data-target=".navbar-collapse ">
                        <span  class= "sr-only" > Alternar navegação </span>
                        <span  class= "icon-bar"> </span>
                        <span  class= "icon-bar"> </span>
                        <span  class= "icon-bar"> </span>
                    </button >
                </div>
                

                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li> <a class="nav-aba" href="<?php echo base_url('home'); ?>"><i class="fa fa-home"> </i>
                             Home </a></li>
                    
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle nav-aba nav-aba-produto" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" >
                              Produtos 
                            </a>
                            <div class="dropdown-menu categorias-menu" >
                                <?php 
                                    $this->load->view('frontend/template/categorias-menu');
                                ?>
                            </div>
  
                        </li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->
    
