<?php

require_once "ws-pagseguro-config.php";
// AUTENTICACAO DO PAGSEGURO
$data['token'] = $pagseguro_config->get_token();
$data['email'] = $pagseguro_config->get_email();
//END  AUTENTICACAO DO PAGSEGURO

$data['currency'] = 'BRL'; // MONEY

// ITENS DO CARRINHO ENVIADO VIA POST
$enviarDados = true;
if(isset($_POST["carrinho"]) && $_POST["carrinho"] != null){
    
    $carrinho = array();
    
    parse_str($_POST["carrinho"], $carrinho);

    $i = 1;
    foreach($carrinho as $item){
        $id = $item["id"];
        $titulo = $item["titulo"];
        $quantidade = $item["quantidade"];
        $preco = $item["preco"];

        $data["itemId$i"] = $id;
        $data["itemDescription$i"] = $titulo;
        $data["itemAmount$i"] = $preco;
        $data["itemQuantity$i"] = $quantidade;
        $i++;
    }

    // FRETE
    $codigoTransporte = isset($_POST["codigo_transporte"]) ? $_POST["codigo_transporte"] : "41106";
    $valorFrete = isset($_POST["valor_frete"]) ? $_POST["valor_frete"] : "0.01";
    $valorFrete = $valorFrete > 0 ? $valorFrete : "0.01";
    switch($codigoTransporte){
        case "7777":
            $tituloTransporte = "Retirada na Loja";
            break;
        case "8888":
            $tituloTransporte = "Motoboy";
            break;
        case "40010":
            $tituloTransporte = "SEDEX";
            break;
        case "40215":
            $tituloTransporte = "SEDEX 10";
            break;
        case "40290":
            $tituloTransporte = "SEDEX Hoje";
            break;
        default:
            $tituloTransporte = "PAC";
    }
    
    // ENVIO DE FRETE COMO SE FOSSE UM PRODUTO DO CARRINHO
    $data["itemId$i"] = 0;
    $data["itemQuantity$i"] = 1;
    $data["itemDescription$i"] = "Transporte: $tituloTransporte";
    /*$valorFrete = "0.01";*/
    $data["itemAmount$i"] = $valorFrete;
    
}else{
    $enviarDados = false;
}

if(isset($_POST["cliente"])){
    $infoCliente = $_POST["cliente"];
    $data["senderName"] = $infoCliente["nome"];
    $data["senderAreaCode"] = $infoCliente["codigo_area"];
    $data["senderPhone"] = $infoCliente["telefone"];
    $data["senderEmail"] = $infoCliente["email"];
}

if($enviarDados){
    
    $data['reference'] = "RF".substr(md5(uniqid(time())), 0, 8); // REFERENCIA UNICA CRIADA PARA O PEDIDO
    $data['shippingType'] = 1;
    $data['shippingAddressStreet'] = $_POST["rua"];
    $data['shippingAddressNumber'] = $_POST["numero"];
    $data['shippingAddressComplement'] = $_POST["complemento"];
    $data['shippingAddressDistrict'] =  $_POST["bairro"];
    $data['shippingAddressPostalCode'] = $_POST["cep"];
    $data['shippingAddressCity'] = $_POST["cidade"];
    $data['shippingAddressState'] = $_POST["estado"];
    $data['shippingAddressCountry'] = "BRA";


    // CONFIGURANDO CURL PARA ENVIAR E RECEBER OS DADOS
    $curl = curl_init();
    
    
    $url = "https://ws.pagseguro.uol.com.br/v2/checkout/";
    $charset = 'UTF-8';
    
    $options = array(
        CURLOPT_URL => $url,
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/x-www-form-urlencoded; charset=" . $charset
        ),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER => false,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_CONNECTTIMEOUT => 20,
        CURLOPT_POST => false,
        CURLOPT_POSTFIELDS => http_build_query($data),
    );

    curl_setopt_array($curl, $options);
    
    $xml = curl_exec($curl);

    curl_close($curl);
    
    //echo $xml; exit; // Depuracao caso precise
    
    $xml = simplexml_load_string($xml);
    
    if(count($xml->errors) == 0){
        
        $confirmationCode = $xml->code;

        echo '{"reference": "'.$data['reference'].'", "code": "'.$confirmationCode.'", "vlr_frete": "'.$valorFrete.'"}'; // RETORNO EM JSON
        
    }else{
        echo "false";
    }
    
}else{
    echo "false";
}

?>