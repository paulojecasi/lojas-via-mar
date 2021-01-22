    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header col-sm-9">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Navegação</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="index.html">
                    LOJAS VIA MAR - Administração do Site
                </a>
            </div>

             <div class="navbar-header col-sm-1 foto-perfil">

                <a href="#"> 
                    <?php

                    $semFoto = "assets/frontend/img/usuarios/sem_foto.jpg";

                    if ($this->session->userdata('userLogado')->img !=''){
                        echo img($this->session->userdata('userLogado')->img) ;
                    }else{
                        echo img($semFoto); 
                    }
                    ?>
                </a>
            </div>

            <div class="navbar-header col-sm-2">
                <p class="text-left">
                    <a href="#"> 
                        <?php echo "Usuário -- ".$this->session->userdata('userLogado')->nome;?>
                    </a>
                </p>
                <p class="text-left">
                    <a  href=" <?php echo base_url('admin/usuarios/logout') ?>">
                        <i class="fa fa-sign-out fa-fw"></i>
                         Sair do Sistema
                    </a>
                </p>
            </div>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?php echo base_url('admin/categoria') ?>"><i class="fa fa-sitemap fa-fw"></i> Categorias</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/produto') ?>"><i class="fa fa-edit fa-fw"></i> Produtos </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/usuarios') ?>"><i class="fa fa-wrench fa-fw"></i> Usuários</a>
                        </li>
                        <li>
                            <a href=" <?php echo base_url('admin/usuarios/logout') ?>"><i class="fa fa-sign-out fa-fw"></i> Sair do Sistema</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

   