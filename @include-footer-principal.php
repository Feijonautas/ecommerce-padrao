<style>
    .footer-principal{
        width: 100%;
        display: flex;
        justify-content: center;
        align-content: center;
        background-color: #f9f9f9;
        font-size: 16px;
        flex-flow: row wrap;
        overflow: hidden;
    }
    .footer-principal .newsletter{
        width: calc(100% - 40px);
        display: block;
        padding: 50px 20px 50px 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #00be36;
        flex-flow: row wrap;
    }
    .footer-principal .newsletter .titulo{
        width: 240px;
        margin: 0px 20px 0px 20px;
        font-size: 34px;
        text-align: left;
        color: #fff;
        font-weight: normal;
        font-variant-caps: all-petite-caps;
    }
    .footer-principal .newsletter .titulo .destaque{
        font-weight: bold;
        white-space: nowrap;
    }
    .footer-principal .newsletter .subtitulo{
        margin: 0px 0px 10px 0px;
        font-size: 14px;
        text-align: center;
    }
    .footer-principal .newsletter .form-newsletter{
        width: 330px;
        padding: 25px 0px 0px 0px;
        text-align: right;
    }
    .footer-principal .newsletter .form-newsletter input{
        width: calc(100% - 20px);
        padding: 4px 10px 4px 10px;
        margin-bottom: 10px;
        height: 20px;
        border-radius: 20px;
        border: 1px solid #fff;
        outline: none;
        font-size: 14px;
        background-color: transparent;
        outline: none;
        color: #fff;
    }
    .footer-principal .newsletter .form-newsletter input::-webkit-input-placeholder {
       color: #fff;
        font-style: italic;
    }

    .footer-principal .newsletter .form-newsletter input:-moz-placeholder { /* Firefox 18- */
       color: #fff;
        font-style: italic;
    }

    .footer-principal .newsletter .form-newsletter input::-moz-placeholder {  /* Firefox 19+ */
       color: #fff;
        font-style: italic;
    }

    .footer-principal .newsletter .form-newsletter input:-ms-input-placeholder {  
       color: #fff;
        font-style: italic;
    }
    .footer-principal .newsletter .form-newsletter .btn-submit{
        width: 80px;
        height: 25px;
        background-color: #333;
        border: none;
        color: #fff;
    }
    .footer-principal .newsletter .form-newsletter .btn-submit:hover{
        background-color: #111;
        cursor: pointer;
    }
    .footer-principal .informacoes-loja{
        width: 80%;
        margin: 40px 0px 40px 0px;
        display: flex;
        flex-flow: row wrap;
    }
    .footer-principal .informacoes-loja .logo-footer{
        width: 300px;
        margin: 0px 20px 0px 0px;
    }
    .footer-principal .informacoes-loja .logo-footer img{
        width: 100%;
    }
    .footer-principal .informacoes-loja .display-enderecos{
        width: calc(100% - 360px);
        margin: 0px 20px 0px 20px;
        display: flex;
        flex-flow: row wrap;
    }
    .footer-principal .informacoes-loja .display-enderecos .box-endereco{
        width: calc(50% - 40px);
        margin: 0px 20px 0px 20px;
    }
    .footer-principal .informacoes-loja .display-enderecos .box-endereco .titulo{
        font-size: 18px;   
        margin: 0px;
    }
    .footer-principal .informacoes-loja .display-enderecos .box-endereco .endereco{
        font-size: 12px;
        margin: 5px 0px 5px 0px;
    }
    .footer-principal .informacoes-loja .display-enderecos .box-endereco .telefone{
        font-size: 16px;   
        margin: 0px;
    }
    .footer-principal .display-links{
        width: 80%;
        margin-top: 40px;
    }
    .footer-principal .display-links .footer-links{
        width: 100%;
        display: flex;
        justify-content: center;
        margin: 10px 0px 10px 0px;
        padding: 0px;
    }
    .footer-principal .display-links .footer-links .first-li{
        display: flex;
        justify-content: space-between;
        flex: 1 1 auto;
        margin: 0px;
    }
    .footer-principal .display-links .footer-links .first-li span{
        position: relative;
        height: auto;
    }
    .footer-principal .display-links .footer-links .first-li .link-principal{
        display: block;
        font-size: 16px;
        text-decoration: none;
        color: #333;
        padding: 2px 0px 2px 0px;
        margin-bottom: 10px;
        border-bottom: 1px solid transparent;
        transition: .3s;
    }
    .footer-principal .display-links .footer-links .first-li .link-principal:hover{
        border-color: #333;
    }
    .footer-principal .display-links .footer-links .first-li .sub-menu{
        margin: 0px;
        padding: 0px;
    }
    .footer-principal .display-links .footer-links .first-li .sub-menu li{
        font-size: 12px;
        display: block;
    }
    .footer-principal .display-links .footer-links .first-li .sub-menu li .sub-link{
        display: block;
        text-decoration: none;
        color: #333;
        padding: 2.5px;
        margin: 0px 0px 5px 0px;
    }
    .footer-principal .display-links .footer-links .first-li .sub-menu li .sub-link:hover{
        border-color: #333;
        text-decoration: underline;
    }
    .footer-principal .display-links .footer-links .first-li .sub-menu .social-media a{
        display: inline-block;
        width: 25px;
        height: 25px;
        text-align: center;
        line-height: 26px;
        font-size: 16px;
        margin: 0px 10px 0px 0px;
        color: #333;
        border-radius: 50%;
        transition: .2s;
        border: 1px solid #333;
    }
    .footer-principal .display-links .footer-links .first-li .sub-menu .social-media .facebook{
        border: 1px solid #4267b2;
        color: #4267b2;
    }
    .footer-principal .display-links .footer-links .first-li .sub-menu .social-media .facebook:hover{
        background-color: #4267b2;
        color: #fff;
    }
    .footer-principal .display-links .footer-links .first-li .sub-menu .social-media .instagram{
        border: 1px solid #cd486b;
        color: #cd486b;
    }
    .footer-principal .display-links .footer-links .first-li .sub-menu .social-media .instagram:hover{
        background-color: #cd486b;
        color: #fff;
    }
    @media screen and (max-width: 1100px){
        .footer-principal .informacoes-loja{
            margin: 20px 0px 20px 0px;
        }
        .footer-principal .informacoes-loja .display-enderecos{
            width: 100%;
            margin: 0px;
            display: flex;
            flex-flow: row wrap;
        }
        .footer-principal .informacoes-loja .display-enderecos .box-endereco{
            width: 100%;
            margin: 30px 0px 0px 0px;
        }
        .footer-principal .display-links .footer-links{
            width: 100%;
            flex-wrap: wrap;
        }
        .footer-principal .display-links .footer-links .first-li{
            display: inline-block;
            width: 33%;
            margin: 10px 0px 10px 0px;
        }
        @media screen and (max-width: 720px){
            .footer-principal .newsletter .titulo{
                font-size: 22px;
            }
            .footer-principal .newsletter .subtitulo{
                font-size: 12px;
            }
            .footer-principal .newsletter .form-newsletter{
                width: 80%;
            }
            .footer-principal .display-links{
                width: 95%;
            }
            .footer-principal .display-links .footer-links{
                justify-content: flex-start;
            }
            .footer-principal .display-links .footer-links .first-li{
                width: 50%;
                max-width: 50%;
                text-align: center;
            }
        }
    }
</style>
<script>
    $(document).ready(function(){
        var formNewsletter = $(".form-newsletter");
        var inputNome = formNewsletter.children(".input-nome");
        var inputEmail = formNewsletter.children(".input-email");
        var cadastrando = false;
        var gravaNewsletterUrl = "@grava-newsletter.php";
        formNewsletter.off().on("submit", function(event){
            event.preventDefault();
            if(!cadastrando){
                cadastrando = true;
                var nome = inputNome.val();
                var email = inputEmail.val();

                function validarCampos(){
                    if(nome.length < 3){
                        mensagemAlerta("O campo nome deve conter no mínimo 3 caracteres", inputNome);
                        return false;
                    }
                    if(!validarEmail(email)){
                        mensagemAlerta("O campo email deve ser preenchido corretamente", inputEmail);
                        return false;
                    }
                    return true;
                }

                if(validarCampos() == true){
                    $.ajax({
                        type: "POST",
                        url: gravaNewsletterUrl,
                        data: {nome: nome, email: email},
                        error: function(){
                            mensagemAlerta("Ocorreu um erro ao enviar os dados. Recarregue a página e tente novamente.");
                        },
                        success: function(resposta){
                            if(resposta == "true"){
                                mensagemAlerta("Seu email foi cadastrado com sucesso! Logo lhe enviaremos novidades.", false, "limegreen");
                            }else if(resposta == "already"){
                                mensagemAlerta("Seu email já está cadastrado! Logo lhe enviaremos novidades.", false, "limegreen");
                            }else{
                                console.log(resposta);
                                mensagemAlerta("Ocorreu um erro ao enviar os dados. Recarregue a página e tente novamente.");
                            }
                            cadastrando = false;
                        }
                    });
                }else{
                    cadastrando = false;
                }
            }
        });
    });
</script>
<footer class="footer-principal">
    <div class="newsletter">
        <h3 class="titulo">RECEBA AS NOVIDADES DA <br><span class="destaque"><?php echo $cls_paginas->empresa; ?></span></h3>
        <form class="form-newsletter">
            <input type="text" placeholder="Digite seu nome" name="nome" class="input-nome">
            <input type="text" placeholder="Digite seu email" name="email" class="input-email">
            <input type="submit" value="ENVIAR" class="btn-submit">
        </form>
    </div>
    <div class="informacoes-loja">
        <div class="logo-footer">
            <a href="inicio/"><img src="imagens/identidadeVisual/<?= $cls_paginas->logo; ?>" alt="Logo - <?= $cls_paginas->empresa; ?>" title="Página Inicial - <?= $cls_paginas->empresa; ?>"></a>
        </div>
        <div class="display-enderecos">
            <div class="box-endereco">
                <h3 class="titulo">LOJA 1</h3>
                <article class="endereco">Av. Nossa Sra. de Lourdes, 63 - Jd. das Américas | Loja 48 e 49B 1° Piso | <span style="white-space: nowrap;">81530-020</span></article>
                <h3 class="telefone">(41) 3085-1500</h3>
            </div>
            <div class="box-endereco">
                <h3 class="titulo">LOJA 2</h3>
                <article class="endereco">R. João Doetzer, 415 - Jd. das Américas | <span style="white-space: nowrap;">81540-190</span></article>
                <h3 class="telefone">(41) 3365-9357</h3>
            </div>
        </div>
    </div>
    <div class="display-links">
        <?php
        class FooterLinks{
            private $titulo_link;
            private $url_link;
            private $qtd_sublinks;
            private $sublinks;
            private $qtd_sub_sublinks;
            private $sub_sublinks;

            function __construct($tituloLink, $urlLink){
                $this->titulo_link = $tituloLink;
                $this->url_link = $urlLink;
                $this->qtd_sublinks = 0;
                $this->sublinks = array();
                $this->qtd_sub_sublinks = 0;
                $this->sub_sublinks = array();
            }

            public function add_sublink($id, $titulo, $url){
                $this->sublinks[$this->qtd_sublinks] = array();
                $this->sublinks[$this->qtd_sublinks]["id"] = $id;
                $this->sublinks[$this->qtd_sublinks]["titulo"] = $titulo;
                $this->sublinks[$this->qtd_sublinks]["url"] = $url;
                $this->sublinks[$this->qtd_sublinks]["qtd_sub_sublinks"] = 0;
                $this->qtd_sublinks++;
            }

            public function add_sub_sublink($idSublink, $titulo, $url){
                $this->sub_sublinks[$this->qtd_sub_sublinks] = array();
                $this->sub_sublinks[$this->qtd_sub_sublinks]["id_sublink"] = $idSublink;
                $this->sub_sublinks[$this->qtd_sub_sublinks]["titulo"] = $titulo;
                $this->sub_sublinks[$this->qtd_sub_sublinks]["url"] = $url;
                foreach($this->sublinks as $indice => $sublink){
                    $id = $sublink["id"];
                    if($idSublink == $id){
                        $this->sublinks[$indice]["qtd_sub_sublinks"]++;
                    }
                }
                $this->qtd_sub_sublinks++;
            }

            public function get_qtd_sublinks(){
                return $this->qtd_sublinks;
            }

            public function listar_link(){
                $tituloPrincipal = $this->titulo_link;
                $urlPrincipal = $this->url_link;
                $subLinks = $this->sublinks;
                echo "<li class='first-li'>";
                echo "<span>";
                    echo "<a href='$urlPrincipal' class='link-principal'>$tituloPrincipal</a>";
                    if($this->qtd_sublinks > 0){
                        echo "<ul class='sub-menu'>";
                        foreach($subLinks as $subLink){
                            $idSubLink = $subLink["id"];
                            $tituloSubLink = $subLink["titulo"];
                            $urlSubLink = $subLink["url"];
                            $qtd_sub_subLinks = $subLink["qtd_sub_sublinks"];
                            $sub_subLinks = $this->sub_sublinks;
                            echo "<li><a href='$urlSubLink' class='sub-link'>$tituloSubLink</a></li>";
                        }
                        echo "</ul>";
                    }
                echo "</span>";
                echo "</li>";
            }
        }
        
        $countLinks = 0;

        $link_footer = null;
        
        /*SET TABLES*/
        require_once "@pew/pew-system-config.php";
        require_once "@classe-system-functions.php";
        $tabela_categorias = $pew_db->tabela_categorias;
        $tabela_subcategorias = $pew_db->tabela_subcategorias;
        $tabela_categorias_produtos = $pew_custom_db->tabela_categorias_produtos;
        $tabela_subcategorias_produtos = $pew_custom_db->tabela_subcategorias_produtos;
        $tabela_produtos = $pew_custom_db->tabela_produtos;
        $tabela_imagens_produtos = $pew_custom_db->tabela_imagens_produtos;
        $tabela_departamentos = $pew_custom_db->tabela_departamentos;
        $tabela_links_menu = $pew_custom_db->tabela_links_menu;
        /*END SET TABLES*/
        
        
        global $departamentoLinks, $ctrlDepartamentoLinks;
        $departamentoLinks = array();
        $ctrlDepartamentoLinks = 0;
            
        $totalDepartamentos = (int)$pew_functions->contar_resultados($tabela_departamentos, "status = 1");

        if($totalDepartamentos > 0){
            $queryDepartamentos = mysqli_query($conexao, "select * from $tabela_departamentos where status = 1 order by posicao asc");
            while($infoDepartamentos = mysqli_fetch_array($queryDepartamentos)){
                $idDepartamento = $infoDepartamentos["id"];
                $tituloDepartamento = $infoDepartamentos["departamento"];
                $refDepartamento = $infoDepartamentos["ref"];
                $urlDepartamento = "loja/$refDepartamento/";
                $departamentoLinks[$ctrlDepartamentoLinks] = array();
                $departamentoLinks[$ctrlDepartamentoLinks]["titulo"] = $tituloDepartamento;
                $departamentoLinks[$ctrlDepartamentoLinks]["url"] = $urlDepartamento;
                $qtdSub = $pew_functions->contar_resultados($tabela_links_menu, "id_departamento = '$idDepartamento'");
                if($qtdSub > 0){
                    $querySub = mysqli_query($conexao, "select * from $tabela_links_menu where id_departamento = '$idDepartamento' limit 5");
                    $ctrlSub = 0;
                    $departamentoLinks[$ctrlDepartamentoLinks]["sublinks"] = array();
                    while($infoSub = mysqli_fetch_array($querySub)){
                        $idCategoria = $infoSub["id_categoria"];
                        $totalCategoria = $pew_functions->contar_resultados($tabela_categorias, "id = '$idCategoria' and status = 1");
                        if($totalCategoria > 0){
                            $queryCategoria = mysqli_query($conexao, "select * from $tabela_categorias where id = '$idCategoria' and status = 1");
                            $infoCategoria = mysqli_fetch_array($queryCategoria);
                            $tituloCategoria = $infoCategoria["categoria"];
                            $refCategoria = $infoCategoria["ref"];
                            $urlCategoria = "loja/$refDepartamento/$refCategoria/";
                            $departamentoLinks[$ctrlDepartamentoLinks]["sublinks"][$ctrlSub] = array();
                            $departamentoLinks[$ctrlDepartamentoLinks]["sublinks"][$ctrlSub]["titulo"] = $tituloCategoria;
                            $departamentoLinks[$ctrlDepartamentoLinks]["sublinks"][$ctrlSub]["url"] = $urlCategoria;
                            $totalSubcategorias = $pew_functions->contar_resultados($tabela_subcategorias, "id_categoria = '$idCategoria'");
                            $ctrlSub++;
                        }
                    }
                }
                $ctrlDepartamentoLinks++;
            }   
        }
        
        foreach($departamentoLinks as $link_departamento){
            $tituloLink = $link_departamento["titulo"];
            $urlLink = $link_departamento["url"];
            $link_footer[$countLinks] = new NavLinks($tituloLink, $urlLink);
            $sublinks = isset($link_departamento["sublinks"]) ? $link_departamento["sublinks"] : null;
            $totalSublinks = is_array($sublinks) && count($sublinks) > 0 ? count($sublinks) : 0;
            if($totalSublinks > 0){
                $ctrl_sub = 0;
                foreach($sublinks as $indice => $slink){
                    $titulo = $slink["titulo"];
                    $url = $slink["url"];
                    $subsublinks = isset($slink["subsublinks"]) ? $slink["subsublinks"] : null;
                    $totalSubsub = is_array($subsublinks) ? count($subsublinks) : 0;
                    $link_footer[$countLinks]->add_sublink($ctrl_sub, $titulo, $url);
                    if($totalSubsub > 0){
                        foreach($subsublinks as $sublink){
                            $tituloSub = $sublink["titulo"];
                            $urlSub = $sublink["url"];
                            $link_footer[$countLinks]->add_sub_sublink($ctrl_sub, $tituloSub, $urlSub, false);
                        }
                    }
                    $ctrl_sub++;
                }
            }
            $countLinks++;
        }
        
        $link_footer[$countLinks] = new FooterLinks("DICAS", "dicas/");
        $countLinks++;
        
        $link_footer[$countLinks] = new FooterLinks("PÁGINA INICIAL", "inicio/");
        $countLinks++;

        $quantidadeLinks = count($link_footer);
        if($quantidadeLinks > 0){
            echo "<ul class='footer-links'>";
                foreach($link_footer as $link){
                    $link->listar_link();
                }
            echo "</ul>";
        }
        ?>
        <br style="clear: both;">
        <ul class="footer-links links-estaticos">
            <li class='first-li'>
                <span>
                    <a href="institucional.php" class="link-principal">INSTITUCIONAL</a>
                    <ul class="sub-menu">
                        <li><a href='quem-somos.php' class='sub-link'>Quem Somos</a></li>
                        <li><a href='garantia-de-qualidade.php' class='sub-link'>Garantia de qualidade</a></li>
                        <li><a href='frete-gratis.php' class='sub-link'>Frete Grátis</a></li>
                        <li><a href='seja-fornecedor.php' class='sub-link'>Seja fornecedor</a></li>
                        <li><a href='trabalhe-conosco.php' class='sub-link'>Trabalhe conosco</a></li>
                    </ul>
                </span>
            </li>
            <li class='first-li'>
                <span>
                    <a class="link-principal">POLÍTICAS</a>
                    <ul class="sub-menu">
                        <li><a href='entrega-e-devolucao.php' class='sub-link'>Entrega e devolução</a></li>
                    </ul>
                </span>
            </li>
            <li class='first-li'>
                <span>
                    <a href="contato.php" class="link-principal">CONTATO</a>
                    <ul class="sub-menu">
                        <li><a href="contato.php" class="sub-link">Telefones</a></li>
                        <li><a href="ticket/" class="sub-link">Central de Atendimento</a></li>
                    </ul>
                </span>
            </li>
            <li class='first-li'>
                <span>
                    <a class="link-principal">REDES SOCIAIS</a>
                    <ul class="sub-menu">
                        <li class="social-media">
                            <a href="https://www.facebook.com/lareobrajardim/" class="facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://www.instagram.com/lareobra/" class="instagram" target="_blank"><i class="fab fa-instagram"></i></a>
                        </li>
                    </ul>
                </span>
            </li>
            <li class='first-li'>
                <span>
                    <a href="formas-de-pagamento.php" class="link-principal">FORMAS DE PAGAMENTO</a>
                    <ul class="sub-menu">
                        <li class="social-media"><img src="imagens/estrutura/icone-cartao-de-credito.png" style='width: 30px;' title="Cartão de crédito e Débito"><img src="imagens/estrutura/icone-transferencia-bancaria.png" style='width: 30px;' title="Transferência bancária"><img src="imagens/estrutura/icone-boleto.png" style='width: 30px;' title="Boleto"></li>
                        <li class="social-media"></li>
                    </ul>
                </span>
            </li>
            <li class='first-li'><span><a href="seguranca.php" class="link-principal">SEGURANÇA</a></span></li>
        </ul>
        <center>
            <h5 style='font-weight: normal;'>CNPJ: 20.445.155/0001-49 / I.E:9066700469</h5>
            <h4 style='font-weight: normal;'>Copyright © <?php echo $cls_paginas->empresa; echo "&nbsp;" . date("Y"); ?> | Todos os direitos reservados.</h4>
        </center>
    </div>
</footer>