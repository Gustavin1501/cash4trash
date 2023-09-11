<?php
while (true) {
// Lógica da tarefa que verifica se os leilões expiraram e atualiza o banco de dados

    require "../index/conexao.php";

    $conexao = getConexao();
    function select_query($sql, $conexao){

        $resultado = mysqli_query($conexao, $sql);

        if (!$resultado) {
            echo "Erro na consulta: " . mysqli_error($conexao);
        exit;
        }
            return $resultado;
    }

    $qtd = $_POST["valor_i"];
    //echo $qtd;
    if ($qtd!= 0){
        for ($i=1; $i<=$qtd; $i++){
            
            if(isset($_POST["opcao".$i])){
                $id = $_POST["opcao".$i];
                $resultado = select_query("update lote set melhores = '0'", $conexao);
                $resultado2 = select_query("update lote set melhores = '1' where id ='". $id . "'", $conexao);

            }
        }
    }



// Espere por um intervalo de tempo (por exemplo, 5 minutos) antes de verificar novamente
    sleep(300); // 300 segundos = 5 minutos
}


    
    

?>