<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produto_model extends CI_Model
{

	public $id;
	public $desproduto; 

	public function __construct(){

		parent::__construct(); 

	}

	public function listar_produtos($pular=null, $produtos_por_pagina=null)
	{

		//echo "pular =".$pular;
		//echo "qt = ".$produtos_por_pagina;
		//exit;  

		if ($pular && $produtos_por_pagina){
			$this->db->limit($produtos_por_pagina, $pular);
		} else {
			$this->db->limit($this->session->userdata('itensPorPagina')); 
		}

		// vamos ver o tipo de listagem escolhido
		// se nao vier preenchido, vamos carregar como TODOS OS PRODUTOS 
		// geralmente acontece ao acessar o ADMIN, pois a SESSION ainda não
		// foi preenchida - PJCS 
		if (!$this->session->userdata('tipolista')){
			$this->session->set_userdata('tipolista','todos');
		} 
		$this->listagem_produto_escolha(); 
		
		$this->db->order_by('desproduto','ASC'); 
		return $this->db->get('produto')->result(); 

	}

	public function listar_produto($id)
	{
		$this->db->where('md5(idproduto)=', $id); 
		return $this->db->get('produto')->result(); 

	}

	public function listagem_produto_escolha(){

		if ($this->session->userdata('tipolista')=="destsim"){
			$this->db->where('produtodestaque=',1); 
		} elseif ($this->session->userdata('tipolista')=="destnao"){
			$this->db->where('produtodestaque=',2); 
		} elseif ($this->session->userdata('tipolista')=="sitesim"){
			$this->db->where('produtosite=',1); 
		} elseif ($this->session->userdata('tipolista')=="sitenao"){
			$this->db->where('produtosite=',2); 
		} elseif ($this->session->userdata('tipolista')=="ativos"){
			$this->db->where('produtoativo=',1);
		} elseif ($this->session->userdata('tipolista')=="inativos"){
			$this->db->where('produtoativo=',2);
		} elseif ($this->session->userdata('tipolista')=="destcatsim"){
			$this->db->where('destaquenacategoria=',1);
		} elseif ($this->session->userdata('tipolista')=="destcatnao"){
			$this->db->where('destaquenacategoria=',2);
		}

	}

	/* substituido por listagem estatica (carrega_produto_promocao_html) - PJCS  
	public function listar_produtos_promocao()
	{

		$this->db->where('vlpromocao > ',0);
		$this->db->where('vlpromocao < vlpreco'); 
		$this->db->order_by('desproduto','ASC'); 
		return $this->db->get('produto')->result(); 

	}
	*/ 

	// ===  para carregamento statico no site 
	public function carrega_produto_promocao_html(){
		$this->valida_produtos(); 
		$this->db->where('vlpromocao > ',0);
		$this->db->where('vlpromocao < vlpreco'); 
		$this->db->order_by('desproduto','ASC'); 
		$produto_pro = $this->db->get('produto')->result();  

		$html_promocao = []; 

		foreach ($produto_pro as $row){
			$img 				= $row->img; 
			$idproduto 	= $row->idproduto;
			$nome  			= $row->nomeproduto;
			$imagem = '<?php echo img(\''.$img.'\',\'class="img-fluid"\'); ?>';
			$vlpromocao	= number_format($row->vlpromocao,2,",",".");
			$vlpreco		= number_format($row->vlpreco,2,",",".");

			array_push($html_promocao,' 
				<div class="col-md-3 col-sm-6">
					<a href = "<?php echo base_url(\'home/detalhe_produto/'.md5($idproduto).'\'); ?>"> 
				
					    <div class="single-shop-product">
					        <div class="product-upper">
					            <h1 class="img-lista-produto">
					                '.$imagem.'
					            </h1>
					        </div>

					        <br> 
					        <h2>
					        	<a href="<?php echo base_url(\'home/detalhe_produto/'.md5($idproduto).'\'); ?>"> <?php echo \''.$nome.'\'; ?>
					        	</a>
					        </h2>

					        <div class="product-carousel-price">
					            <?php 
					            if ("'.$vlpromocao.' > 0"):
					            ?>
					                <del>
					                    <?php echo "De R$ '.$vlpreco.' por" ?>
					                </del>
					                <br> 
					                <ins>
					                	<?php echo "R$ '.$vlpromocao.'" ?> 
					                </ins>
					 
					            <?php
					            else:
					            ?>
					                <br> 
					                <ins>
					                	<?php echo "R$ '.$vlpreco.'" ?> 
					                </ins>
					            <?php
					            endif;
					            ?>
					       		</div>  
					                             
					    	</div>
						</a>
					</div>
    	');
		}

		file_put_contents("application"	. DIRECTORY_SEPARATOR . 
											"views" 			. DIRECTORY_SEPARATOR . 	
											"frontend" 		. DIRECTORY_SEPARATOR .
											"static" 			. DIRECTORY_SEPARATOR .
											"produtos-promocao-st.php",$html_promocao); 

	}

	// ===  para carregamento statico no site 
	public function carrega_produto_destaque_html(){

		$this->valida_produtos(); 
		$this->db->where('produtodestaque=',1); 
		$this->db->order_by('desproduto','ASC'); 
		$produto_des= $this->db->get('produto')->result();  

		$html_destaque = []; 

		foreach ($produto_des as $row):
			$img 				= $row->img; 
			$idproduto 	= $row->idproduto;
			$nome  			= '<?php echo substr(wordwrap("'.$row->nomeproduto.'", 33,"<br />\n"),0,100); ?>';
			$imagem = '<?php echo "'.$img.'"; ?>';
			$vlpromocao	= number_format($row->vlpromocao,2,",",".");
			$vlpreco		= number_format($row->vlpreco,2,",",".");

			array_push($html_destaque,' 
				<li>
          <img src="'.$imagem.'" >
          <div class="caption-group">
              <h2 class="caption title title-product-destaque">
              		'.$nome.'
                   <br>
              </h2>
              
              <br> 
              <h1 class="caption title" >
                  <?php 
                  if ("'.$vlpromocao.'" > "0,00" && "'.$vlpromocao.'" < "'.$vlpreco.'"):
                  ?> 
                      <span class="primary"> 
                          <?php echo "De R$ '.$vlpreco.'"; ?>
                          <br> 
                          <strong>
                              <?php echo "Por R$ '.$vlpromocao.'"; ?>
                          </strong>
                      </span>
                  <?php
                  else:
                  ?>
                      <span class="primary"> 
                          Apenas R$
                          <strong> <?php echo "'.$vlpreco.'"; ?> </strong>
                      </span>
                  <?php
                  endif;
                  ?>

              </h1>
           
              <h4 class="caption subtitle"> </h4>
              <a class="caption button-radius" href="<?php echo base_url(\'home/detalhe_produto/'.md5($idproduto).'\'); ?>">
                  <span class="icon"></span>
                  Mais detalhes
              </a>
          </div>
      </li>
				

    	'); 

		endforeach;

		file_put_contents("application"	. DIRECTORY_SEPARATOR . 
											"views" 			. DIRECTORY_SEPARATOR . 	
											"frontend" 		. DIRECTORY_SEPARATOR .
											"static" 			. DIRECTORY_SEPARATOR .
											"produtos-destaque-st.php",$html_destaque); 

	}

	public function adicionar($idcategoria,$nomeproduto,$desproduto,$corproduto,$vlpreco,$vllargura,$vlaltura,$vlcomprimento,$vlpeso,$vlpromocao,$produtoativo,$produtodestaque,$destaquenacategoria,$produtosite)
	{

		$dados["idcategoria"]	= $idcategoria;
		$dados["nomeproduto"]	= $nomeproduto;
		$dados["desproduto"]	= $desproduto;
		$dados["corproduto"]	= $corproduto;
		$dados["vlpreco"]			= $vlpreco;
		$dados["vllargura"]		= $vllargura;
		$dados["vlaltura"]		= $vlaltura;
		$dados["vlcomprimento"]= $vlcomprimento;
		$dados["vlpeso"]			= $vlpeso;
		$dados["vlpromocao"]	= $vlpromocao;
		$dados["produtoativo"]= $produtoativo;
		$dados["produtodestaque"]= $produtodestaque;
		$dados["destaquenacategoria"]= $destaquenacategoria;
		$dados["produtosite"]= $produtosite;

		return $this->db->insert('produto',$dados); 
	}

	public function alterar($idproduto,$idcategoria,$nomeproduto,$desproduto,$corproduto,$vlpreco,$vllargura,$vlaltura,$vlcomprimento,$vlpeso,$vlpromocao,$produtoativo,$produtodestaque,$destaquenacategoria,$produtosite)
	{
		$dados["idcategoria"]	= $idcategoria;
		$dados["nomeproduto"]	= $nomeproduto;
		$dados["desproduto"]	= $desproduto;
		$dados["corproduto"]	= $corproduto;
		$dados["vlpreco"]			= $vlpreco;
		$dados["vllargura"]		= $vllargura;
		$dados["vlaltura"]		= $vlaltura;
		$dados["vlcomprimento"]= $vlcomprimento;
		$dados["vlpeso"]			= $vlpeso;
		$dados["vlpromocao"]	= $vlpromocao;
		$dados["produtoativo"]= $produtoativo;
		$dados["produtodestaque"]= $produtodestaque;
		$dados["destaquenacategoria"]= $destaquenacategoria;
		$dados["produtosite"]= $produtosite;

		$this->db->where('idproduto=', $idproduto); 
		return $this->db->update('produto',$dados); 
	}

	public function excluir($id){

		$this->db->where('md5(idproduto)=', $id);
		return $this->db->delete('produto'); 

	}

	public function alterar_img($idproduto, $dir_imagem){
		$dados['img'] = $dir_imagem; // identifica que o usuario ja tem foto 

		$this->db->where('md5(idproduto)=', $idproduto);
		return $this->db->update('produto',$dados);
	}

	public function contar(){
		// vamos ver o tipo de listagem escolhido para contagem 
		$this->listagem_produto_escolha();
		$this->db->from('produto'); 
		return $this->db->count_all_results(); 
	}


	/* ================== FRONTEND ===============*/

	// seleciona somente produtos aptos para o site
	public function valida_produtos(){
		$this->db->where('produtoativo=',1);
		$this->db->where('produtosite=',1);
		$this->db->where('nomeproduto!=',"");
		$this->db->where('vlpreco > ',0); 
		$this->db->where('img!=',"");

	}

	public function lista_produtos_site($categoria=null){

		if ($categoria) {
				$this->db->where('md5(idcategoria)=',$categoria);
		}

		$this->valida_produtos(); 
		return $this->db->get('produto')->result(); 

	}

	// lista os produtos em destaques no site 
	/* agora é estatico, substituido por "carrega_produto_destaque_html()" - PJCS
	public function produtos_destaques(){

		$this->valida_produtos(); 
		$this->db->where('produtodestaque=',1);

		return  $this->db->get('produto')->result();

	}
	*/

	// pra listar as categorias que ficarao em destaques no site
	public function produtos_da_categoria(){	
		
		$this->valida_produtos(); 
		$this->db->where('categoriadest=',1); 
		$this->db->where('destaquenacategoria=',1); 
		$this->db->from('produto');
		$this->db->join('categoria','categoria.id = produto.idcategoria');
		return  $this->db->get()->result();

	}

	public function detalhe_produto($idproduto){

		$this->db->where('md5(idproduto)=',$idproduto);
		return $this->db->get('produto')->result(); 

	}




}