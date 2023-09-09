<?php 
function select_query($sql, $conexao){

    $resultado = mysqli_query($conexao, $sql);

    if (!$resultado) {
    echo "Erro na consulta: " . mysqli_error($conexao);
    exit;
    }
    return $resultado;
}

function maisProximos($cepParceiros, $cepUsuario) {
    $distancias = array();

    while ($linha = mysqli_fetch_assoc($cepParceiros)) {
        $distancia = calculaDistancia($linha["cep"], $cepUsuario);
        $distancias[$linha["nome"]] = $distancia;
    }

    // Ordena as distâncias em ordem crescente
    asort($distancias);

    // Obtém os 5 parceiros mais próximos
    $parceirosMaisProximos = array_slice($distancias, 0, 5, true);

    // Extrai apenas as chaves (nomes dos parceiros)
    $nomesParceirosMaisProximos = array_keys($parceirosMaisProximos);

    return $nomesParceirosMaisProximos;
}



function calculaDistancia($cepDestino, $cepOrigem){
    $apiKey = "AIzaSyBAyVkrZzoreeaPJdqCJWArDy7zVZOKBcQ";
    $cepOrigem = "CEP_ORIGEM";
    $cepDestino = "CEP_DESTINO";

    // Obter as coordenadas geográficas (latitude e longitude) dos CEPs de origem e destino
    $geoOrigem = getGeolocation($apiKey, $cepOrigem);
    $geoDestino = getGeolocation($apiKey, $cepDestino);

    // Calcular a distância entre as coordenadas
    $distancia = calculateDistance($geoOrigem, $geoDestino);

    return $distancia;
}

// Função para obter as coordenadas geográficas de um CEP utilizando a API de Geocodificação do Google Maps
function getGeolocation($apiKey, $cep) {
    $cepEncoded = urlencode($cep);
    $url = "https://maps.googleapis.com/maps/api/geocode/json?address=$cepEncoded&key=$apiKey";
    $data = file_get_contents($url);
    $json = json_decode($data, true);

    // Verificar se a requisição foi bem-sucedida e obter as coordenadas
    if ($json["status"] === "OK" && isset($json["results"][0]["geometry"]["location"])) {
        $latitude = $json["results"][0]["geometry"]["location"]["lat"];
        $longitude = $json["results"][0]["geometry"]["location"]["lng"];
        return array("latitude" => $latitude, "longitude" => $longitude);
    } else {
        return null;
    }
}

// Função para calcular a distância entre duas coordenadas utilizando a fórmula de Haversine
function calculateDistance($geoOrigem, $geoDestino) {
    $latitudeOrigem = $geoOrigem["latitude"];
    $longitudeOrigem = $geoOrigem["longitude"];
    $latitudeDestino = $geoDestino["latitude"];
    $longitudeDestino = $geoDestino["longitude"];

    $earthRadius = 6371; // Raio médio da Terra em quilômetros

    $dLat = deg2rad($latitudeDestino - $latitudeOrigem);
    $dLon = deg2rad($longitudeDestino - $longitudeOrigem);

    $a = sin($dLat / 2) * sin($dLat / 2) +
        cos(deg2rad($latitudeOrigem)) * cos(deg2rad($latitudeDestino)) *
        sin($dLon / 2) * sin($dLon / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

    $distance = $earthRadius * $c;
    return $distance;
}





?>