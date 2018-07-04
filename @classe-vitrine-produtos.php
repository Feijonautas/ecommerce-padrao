<?php
    require_once "@include-global-vars.php";
    require_once "@classe-produtos.php";

    class VitrineProdutos{
        private $tipo;
        private $limite_produtos;
        private $titulo_vitrine;
        private $descricao_vitrine;
        private $quantidade_produtos;
        private $global_vars;
        private $pew_functions;
        private $exceptions = array();

        function __construct($tipo = "standard", $limiteProdutos = 4, $tituloVitrine = "", $descricaoVitrine = ""){
            $this->tipo = $tipo;
            $this->limite_produtos = $limiteProdutos;
            $this->titulo_vitrine = $tituloVitrine;
            $this->descricao_vitrine = $descricaoVitrine;
            $this->quantidade_produtos = 0;
            global $globalVars, $pew_functions;
            $this->global_vars = $globalVars;
            $this->pew_functions = $pew_functions;
        }

        private function conexao(){
            return $this->global_vars["conexao"];
        }
        
        public function create_box_produto($info = null){
            $tabela_cores = $this->global_vars["tabela_cores"];
            $cls_paginas = new Paginas();
            $cls_produto = new Produtos();
            $pew_functions = new systemFunctions();
            if(is_array($info) && count($info) > 0){
                
                /*STANDARD VARS*/
                $nomeLoja = $cls_paginas->empresa;
                $dirImagensProdutos = "imagens/produtos";
                /*END STANDARD VARS*/
                
                /*VARIAVEIS DO PRODUTO*/
                $idProduto = $info["id_produto"];
                $infoCoresRelacionadas = isset($info["info_cores"]) ? $info["info_cores"] : null;
                $imagens = $info["imagens"];
                $qtdImagens = count($imagens);
                if($qtdImagens > 0){
                    $imagemPrincipal = $imagens[0];
                    $srcImagem = $imagemPrincipal["src"];
                    if(!file_exists($dirImagensProdutos."/".$srcImagem) || $srcImagem == ""){
                        $srcImagem = "produto-padrao.png";
                    }
                }else{
                    $srcImagem = "produto-padrao.png";
                }
                $nome = $info["nome"];
                $titleURL = $pew_functions->url_format($nome);
                $maxCaracteres = 31;
                $nomeEllipses = strlen(str_replace(" ", "", $nome)) > $maxCaracteres ? trim(substr($nome, 0, $maxCaracteres))."..." : $nome;
                $qtdParcelas = 6;
                $txtParcelas = $qtdParcelas."x";
                $preco = $info["preco"];
                $precoPromocao = $info["preco_promocao"];
                $promoAtiva = $precoPromocao > 0 && $precoPromocao < $preco ? true : false;
                $precoParcela = $promoAtiva == true ? $precoPromocao / $qtdParcelas : $preco / $qtdParcelas;
                $priceField = $promoAtiva == true ? "<span class='view-preco'>De <span class='promo-price'>R$".number_format($preco, 2, ",", ".")."</span></span> por <span class='view-preco'><span class='price'>R$".number_format($precoPromocao, 2, ",", ".")."</span></span>" : "<span class='view-preco'><span class='price'>R$ ". number_format($preco, 2, ",", ".")."</span></span>";
                $urlProduto = "$titleURL/$idProduto/";
                /*END VARIAVEIS DO PRODUTO*/

                /*DISPLAY DO PRODUTO*/
                $boxProduto = "";
                $boxProduto .= "<div class='box-produto'>";
                    $boxProduto .= "<a href='$urlProduto'><img src='$dirImagensProdutos/$srcImagem' title='$nome' alt='$nome - $nomeLoja'></a>";
                    $boxProduto .= "<a href='$urlProduto' class='title-link'><h3 class='titulo-produto' title='$nome'>$nomeEllipses</h3></a>";
                    $boxProduto .= "<h4 class='preco-produto'>$priceField ou <span class='view-parcelas'>$txtParcelas R$". number_format($precoParcela, 2, ",", ".") ."   </span></h4>";
                    $boxProduto .= "<a href='$urlProduto' class='call-to-action'>COMPRAR</a>";
                    $boxProduto .= "<div class='display-cores'>";
                        if(is_array($infoCoresRelacionadas) and count($infoCoresRelacionadas) > 0){
                            foreach($infoCoresRelacionadas as $id => $info){
                                $idRelacao = $info["id_relacao"];
                                $produtoRelacao = new Produtos();
                                $produtoRelacao->montar_produto($idRelacao);
                                $info = $produtoRelacao->montar_array();
                                $tituloURL = $pew_functions->url_format($info["nome"]);
                                $idCor = $info["id_cor"];
                                $queryCor = mysqli_query($this->conexao(), "SELECT * FROM $tabela_cores where id = '$idCor' and status = 1");
                                $functions = new systemFunctions();
                                $totalCores = $functions->contar_resultados($tabela_cores, "id = '$idCor' and status = 1");
                                $urlProdutoRelacao = "$titleURL/$idRelacao/";
                                $dirImagens = "imagens/cores";
                                if($totalCores > 0){
                                    while($infoCor = mysqli_fetch_assoc($queryCor)){
                                        $nomeCor = $infoCor["cor"];
                                        $imagemCor = $infoCor["imagem"];
                                        if(!file_exists($dirImagens."/".$imagemCor) || $imagemCor == ""){
                                            $imagemCor = "cor-padrao.png";
                                        }
                                        $boxProduto .= "<a href='$urlProdutoRelacao'><img class='cor' title='$nomeCor' src='$dirImagens/$imagemCor'></a>";
                                    }
                                }
                            }
                        }
                    $boxProduto .= "</div>";
                $boxProduto .= "</div>";
                return $boxProduto;
                /*END DISPLAY DO PRODUTO*/
            }else{
                return false;
            }
        }
        
        function get_exceptions(){
            return $this->exceptions;
        }

        private function vitrine_standard($arrayProdutos = null){
            $tabela_cores = $this->global_vars["tabela_cores"];
            $conexao = $this->global_vars["conexao"];
            $functions = $this->pew_functions;
            
            if(!function_exists("listar_produto")){
                function listar_produto($idProduto){
                    global $conexao, $tabela_cores, $functions;

                    $produto = new Produtos();
                    $produto->montar_produto($idProduto);
                    $infoProduto = $produto->montar_array();
                    $infoCoresRelacionadas = $produto->get_cores_relacionadas();
                    $infoProduto["id_produto"] = $idProduto;
                    $infoProduto["info_cores"] = $infoCoresRelacionadas;
                    
                    $cls_vitrine = new VitrineProdutos();
                    
                    echo $cls_vitrine->create_box_produto($infoProduto);
                }
            }
            
            /*DISPLAY TODOS PRODUTO DA VITRINE*/
            echo "<section class='vitrine-standard'>";
                $tituloVitrine = $this->titulo_vitrine;
                $substrTitulo = substr($tituloVitrine, 0, 2);
                $updatedTitulo = null;
                switch($substrTitulo){
                    case "<h": // Verifica se é H2, H3. H4 etc
                        $updatedTitulo = true;
                        break;
                }
                if($updatedTitulo != null){
                    echo $tituloVitrine;
                }else{
                    echo "<h2 class='titulo-vitrine'>".$this->titulo_vitrine."</h2>";
                }
                if($this->descricao_vitrine != "" && $this->descricao_vitrine != false){
                    echo "<article class='descricao-vitrine'>".$this->descricao_vitrine."</article>";
                }
                echo "<div class='display-produtos'>";
                $ctrlProdutos = 0;
                if(is_array($arrayProdutos) && count($arrayProdutos) > 0){
                    foreach($arrayProdutos as $idProduto){
                        if($ctrlProdutos < $this->limite_produtos){
                            $produto = new Produtos();
                            $this->exceptions[count($this->exceptions)] = $idProduto;
                            
                            $idProduto = $produto->query_produto("status = 1 and id = '$idProduto'");
                            if($idProduto != false){
                                listar_produto($idProduto);
                                $ctrlProdutos++;
                            }
                        }
                    }
                }
                if($ctrlProdutos == 0){
                    echo "<h3 class='mensagem-no-result'><i class='fas fa-search'></i> Nenhum produto foi encontrado</h3>";
                }
                echo "</div>";
            echo "</section>";
            /*END DISPLAY TODOS PRODUTO DA VITRINE*/
        }

        private function vitrine_categorias($condicao = "1"){
            
            require_once "@pew/@classe-departamentos.php";
            
            $conexao = $this->global_vars["conexao"];
            $tabela_categorias = $this->global_vars["tabela_categorias"];
            $tabela_categorias_vitrine = $this->global_vars["tabela_categoria_destaque"];
            $cls_departamentos = new Departamentos();
            $cls_produtos = new Produtos();
            
            
            $dirImagens = "imagens/categorias/destaques";
            $condicao = $condicao == "" ? "true" : $condicao;
            
            if(!function_exists("place_products")){
                function place_products($array){
                    $cls_produtos = new Produtos();
                    $functions = new systemFunctions();
                    
                    $classOptions = array();
                    
                    $classOptions[0] = array();
                    $classOptions[0]["name"] = "full-product";
                    $classOptions[0]["max"] = 1;
                    
                    $classOptions[1] = array();
                    $classOptions[1]["name"] = "half-product";
                    $classOptions[1]["max"] = 2;
                    
                    $classOptions[2] = array();
                    $classOptions[2]["name"] = "smalls-and-large";
                    $classOptions[2]["max"] = 3;
                    
                    $classOptions[3] = array();
                    $classOptions[3]["name"] = "small-product";
                    $classOptions[3]["max"] = 4;
                    
                    $dirImagensProdutos = "imagens/produtos";
                    
                    if(is_array($array)){
                        switch(count($array)){
                            case 1:
                                $selectedClass = $classOptions[0];
                                break;
                            case 2:
                                $selectedClass = $classOptions[1];
                                break;
                            case 3:
                                $selectedClass = $classOptions[2];
                                break;
                            default:
                                $selectedClass = $classOptions[rand(0 , 3)];
                        }

                        shuffle($array);
                        echo "<div class='display-produtos {$selectedClass['name']}'>";
                        for($i = 0; $i < $selectedClass["max"]; $i++){
                            $infoP = $array[$i];
                            $idProduto = $infoP["id_produto"];
                            if($cls_produtos->montar_produto($idProduto) != false){
                                $arrayProduto = $cls_produtos->montar_array();
                                $precoFinal = $arrayProduto["preco_promocao"] > $arrayProduto["preco"] && $arrayProduto["promocao_ativa"] == 1 ? $arrayProduto["preco_promocao"] : $arrayProduto["preco"];
                                $precoFinal = $functions->custom_number_format($precoFinal);
                                $tituloURL = $functions->url_format($arrayProduto['nome']);
                                $urlProduto = "$tituloURL/{$arrayProduto['id']}/";
                                if(isset($arrayProduto["imagens"])){
                                    $imagemProduto = $arrayProduto["imagens"][0]["src"];
                                    echo "<div class='product-box'>";
                                        echo "<a href='$urlProduto'><img src='$dirImagensProdutos/$imagemProduto' class='product-image'></a>";
                                        echo "<a href='$urlProduto'><h3 class='title'>{$arrayProduto['nome']}</h3></a>";
                                        echo "<h4 class='price'>R$ $precoFinal</h4>";
                                        echo "<a href='$urlProduto' class='botao'>Comprar</a>";
                                    echo "</div>";
                                }else{
                                    $i--;
                                }
                            }
                        }
                        echo "</div>";
                    }
                }
            }
            
            $total = $this->pew_functions->contar_resultados($tabela_categorias_vitrine, $condicao);
            if($total > 0){
                
                $queryVitrine = mysqli_query($conexao, "select id_categoria, imagem from $tabela_categorias_vitrine where $condicao");
                while($infoVitrine = mysqli_fetch_array($queryVitrine)){
                    $idCategoria = $infoVitrine["id_categoria"];
                    $imagemCategoria = $infoVitrine["imagem"];
                    $produtosCategoria = $cls_departamentos->get_produtos_categoria($idCategoria);
                    $infoCategoria = $cls_departamentos->get_categorias("id = '$idCategoria'", "ref");
                    $refCategoria = $infoCategoria[0]["ref"];
                    $urlCategoria = "categoria/$refCategoria/";
                    $totalProdutos = count($produtosCategoria);
                    if($totalProdutos > 0){
                        $infoCategoria = $cls_departamentos->get_categorias("id = '$idCategoria'", "categoria");
                        $nomeCategoria = $infoCategoria[0]["categoria"];
                        echo "<div class='display-vitrine-categoria'>";
                            echo "<h2 class='titulo-vitrine'>$nomeCategoria</h2>";
                            echo "<div class='banner'>";
                                echo "<a href='$urlCategoria'><img src='$dirImagens/$imagemCategoria' alt='$nomeCategoria' title='$nomeCategoria'></a>";
                                echo "<a href='$urlCategoria' class='botao'>Ver mais</a>";
                            echo "</div>";
                            place_products($produtosCategoria);
                        echo "</div>";
                    }
                }
                
            }else{
                return false;
            }
            
        }

        public function vitrine_carrossel($arrayProdutos = array()){
            $tabela_cores = $this->global_vars["tabela_cores"];
            $conexao = $this->global_vars["conexao"];
            $functions = $this->pew_functions;
            $cls_paginas = new Paginas();
            
            
            $ctrlProdutos = 0;
            
            if(!function_exists("listar_produto")){
                function listar_produto($idProduto, $tb_cores = "pew_cores"){
                    global $conexao, $functions, $ctrlProdutos, $cls_paginas;
                    /*STANDARD VARS*/
                    $nomeLoja = $cls_paginas->empresa;
                    $dirImagensProdutos = "imagens/produtos";
                    /*END STANDARD VARS*/
                    $pew_functions = new systemFunctions();
                    $produto = new Produtos();
                    $produto->montar_produto($idProduto);
                    $infoProduto = $produto->montar_array();
                    $infoCoresRelacionadas = $produto->get_cores_relacionadas();
                    /*VARIAVEIS DO PRODUTO*/
                    $imagens = $infoProduto["imagens"];
                    $qtdImagens = count($imagens);
                    if($qtdImagens > 0){
                        $imagemPrincipal = $imagens[0];
                        $srcImagem = $imagemPrincipal["src"];
                        if(!file_exists($dirImagensProdutos."/".$srcImagem) || $srcImagem == ""){
                            $srcImagem = "produto-padrao.png";
                        }
                    }else{
                        $srcImagem = "produto-padrao.png";
                    }
                    $nome = $infoProduto["nome"];
                    $tituloURL = $pew_functions->url_format($nome);
                    $maxCaracteres = 31;
                    $nomeEllipses = strlen(str_replace(" ", "", $nome)) > $maxCaracteres ? trim(substr($nome, 0, $maxCaracteres))."..." : $nome;
                    $qtdParcelas = 6;
                    $txtParcelas = $qtdParcelas."x";
                    
                    $infoCompreJunto = $produto->get_preco_relacionado($idProduto);
                    $intPorcentoDesconto = ($infoCompreJunto["desconto"] * 100) / 100;
                    $multiplicador = $intPorcentoDesconto * 0.01;
                    $preco = $infoProduto["preco"];
                    $precoPromocao = $infoProduto["preco_promocao"];
                    $promocaoAtiva = $infoProduto["promocao_ativa"] == 1 ? true : false;
                    
                    $promoAtiva = $precoPromocao > 0 && $precoPromocao < $preco && $promocaoAtiva == true ? true : false;
                    
                    $precoFinal = $promocaoAtiva == true ? $precoPromocao : $preco;
                    
                    $precoParcela = $precoFinal / $qtdParcelas;
                    
                    $desconto = $precoFinal * $multiplicador;
                    $precoCompreJunto = $precoFinal - $desconto;
                        
                    $urlProduto = "$tituloURL/$idProduto/";
                    /*END VARIAVEIS DO PRODUTO*/
                    
                    /*DISPLAY DO PRODUTO*/
                    echo "<div class='box-produto'>";
                        if($intPorcentoDesconto > 0){
                            echo "<div class='promo-tag'>-$intPorcentoDesconto%</div>";
                            $promoAtiva = true;
                            $precoParcela = $precoCompreJunto / $qtdParcelas;
                        }
                    
                        switch($promoAtiva){
                            case true:
                                $priceField = "<span class='view-preco'>De <span class='promo-price'>R$".number_format($preco, 2, ",", ".")."</span></span> por <span class='view-preco'><span class='price'>R$".number_format($precoCompreJunto, 2, ",", ".")."</span></span>";
                                break;
                            default:
                                $priceField = "<span class='view-preco'><span class='price'>R$".number_format($precoCompreJunto, 2, ",", ".")."</span></span>";
                        }
                        echo "<a href='$urlProduto'><img src='$dirImagensProdutos/$srcImagem' title='$nome' alt='$nome - $nomeLoja'></a>";
                        echo "<a href='$urlProduto' class='title-link'><h3 class='titulo-produto' title='$nome'>$nomeEllipses</h3></a>";
                            echo "<h4 class='preco-produto'>$priceField ou <span class='view-parcelas'>$txtParcelas R$". number_format($precoParcela, 2, ",", ".") ."   </span></h4>";
                        echo "<a class='call-to-action botao-add-compre-junto' carrinho-id-produto='$idProduto'>Adicionar</a>";
                        echo "<div class='display-cores'>";
                            if(is_array($infoCoresRelacionadas) and count($infoCoresRelacionadas) > 0){
                                foreach($infoCoresRelacionadas as $id => $info){
                                    $idRelacao = $info["id_relacao"];
                                    $produtoRelacao = new Produtos();
                                    $produtoRelacao->montar_produto($idRelacao);
                                    $infoProduto = $produtoRelacao->montar_array();
                                    $tituloURL = $this->pew_functions->url_format($infoProduto["nome"]);
                                    $idCor = $infoProduto["id_cor"];
                                    $functions = new systemFunctions();
                                    $totalCores = $functions->contar_resultados($tb_cores, "id = '$idCor' and status = 1");
                                    $urlProdutoRelacao = "$titleURL/$idRelacao/";
                                    $dirImagens = "imagens/cores";
                                    if($totalCores > 0){
                                        $queryCor = mysqli_query($conexao, "SELECT * FROM $tb_cores where id = '$idCor' and status = 1");
                                        while($infoCor = mysqli_fetch_assoc($queryCor)){
                                            $nomeCor = $infoCor["cor"];
                                            $imagemCor = $infoCor["imagem"];
                                            if(!file_exists($dirImagens."/".$imagemCor) || $imagemCor == ""){
                                                $imagemCor = "cor-padrao.png";
                                            }
                                            echo "<a href='$urlProdutoRelacao'><img class='cor' title='$nomeCor' src='$dirImagens/$imagemCor'></a>";
                                        }
                                    }
                                }
                            }
                        echo "</div>";
                    echo "</div>";
                    /*END DISPLAY DO PRODUTO*/
                    $ctrlProdutos++;
                }
            }

            /*DISPLAY TODOS PRODUTO DA VITRINE*/
            echo "<section class='vitrine-carrossel'>";
                echo "<h2 class='titulo-vitrine'>".$this->titulo_vitrine."</h2>";
                if($this->descricao_vitrine != "" && $this->descricao_vitrine != false){
                    echo "<article class='descricao-vitrine'>".$this->descricao_vitrine."</article>";
                }
                echo "<div class='display-produtos'>";
                
                if(count($arrayProdutos) > 0){
                    foreach($arrayProdutos as $idProduto){
                        listar_produto($idProduto, $tabela_cores);
                    }
                }
                    
            
                if($ctrlProdutos == 0){
                    echo "<h3 class='mensagem-no-result'><i class='fas fa-search'></i> Nenhum produto foi encontrado</h3>";
                }
                echo "</div>";
                echo "<div class='controller-carrossel'>";
                    echo "<div class='arrows right-arrow'><i class='fas fa-angle-left'></i></div>";
                    echo "<div class='arrows left-arrow'><i class='fas fa-angle-right'></i></div>";
                echo "</div>";
            echo "</section>";
            /*END DISPLAY TODOS PRODUTO DA VITRINE*/
        }

        public function montar_vitrine($arrayProdutos = ""){
            $tipoVitrine = $this->tipo;
            switch($tipoVitrine){
                case "categorias":
                    $this->vitrine_categorias($arrayProdutos); //Query normal
                    break;
                case "carrossel":
                    $this->vitrine_carrossel($arrayProdutos);
                    break;
                case "interna-produto":
                    $this->vitrine_interna($arrayProdutos);
                    break;
                case "standard":
                    $this->vitrine_standard($arrayProdutos);
                    break;
                default:
                    $this->tipo = "INDEFINIDO";
                    echo "Tipo de vitrine inválido";
            }
        }
    }

    if(isset($_POST["acao_vitrine"])){
        $acao = $_POST["acao_vitrine"];
        
        switch($acao){
            case "get_box_produto":
                $cls_produto_acao = new Produtos();
                $cls_vitrine_acao = new VitrineProdutos();
                
                if(isset($_POST["produtos"])){
                    $produtos = $_POST["produtos"];
                    
                    foreach($produtos as $idProduto){
                        $cls_produto_acao->montar_produto($idProduto);
                        $infoProduto = $cls_produto_acao->montar_array();
                        $infoCoresRelacionadas = $cls_produto_acao->get_cores_relacionadas();
                        $infoProduto["id_produto"] = $idProduto;
                        $infoProduto["info_cores"] = $infoCoresRelacionadas;

                        echo $cls_vitrine_acao->create_box_produto($infoProduto);
                    }
                    
                }
                
        }
    }