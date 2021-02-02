

<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2> NOSSOS PRODUTOS EM </h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class= "merchan-promo-produto text-center">
     <img class="img-fluid" src=" <?php echo base_url('assets/frontend/img/pm.png'); ?>"> 
</div>

 
<div class="single-product-area" id="produto_promocao">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <?php 
                        
               $this->load->view('frontend/static/produtos-promocao-st');
                    
            ?>

        </div>
    </div>
</div>

