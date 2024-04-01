<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
        <title>Ranking</title>
    </head>
    <body id="body-ranking">
        <div id="container-ranking">
            <div id="podium">
                <h1>Ranking</h1>
                <div class="prisegter">
                    <?php
                        include("connection.php");
                        $position = 2; // Posição desejada
                    
                        // Consulta para obter a posição específica no ranking
                        $sql = "
                            SELECT nome, sobrenome, pontuacao
                            FROM (
                                SELECT nome, sobrenome, pontuacao,
                                    (@row_number := @row_number + 1) AS ranking_position
                                FROM cadastros_lp
                                CROSS JOIN (SELECT @row_number := 0) AS rn
                                ORDER BY pontuacao ASC
                            ) AS ranking
                            WHERE ranking_position = ?
                        ";
                    
                        // Prepara a consulta
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("i", $position);
                    
                        // Executa a consulta
                        $stmt->execute();
                    
                        // Obtém o resultado da consulta
                        $result = $stmt->get_result();
                    
                        if ($row = $result->fetch_assoc()) {
                            // Exibe os dados da posição específica
                            $nome = $row['nome'];
                            $sobrenome = $row['sobrenome'];
                            $pontuacao = $row['pontuacao'];
                    ?>
                            <div class="seg">
                                <h3>
                                    <?php
                                        $partesNome = explode(" ", $nome);
                                        $partesSobrenome = explode(" ", $sobrenome);
                                        $primeiroNome = $partesNome[0];
                                        $ultimoSobrenome = end($partesSobrenome);
                                        echo $primeiroNome . ' ' . $ultimoSobrenome;
                                    ?>
                                </h3>
                                <h3>Tempo: <?php echo number_format($pontuacao, 3); ?> <span style="text-transform: lowercase">s</span></h3>
                                <img src="./img/silver.webp" class="stage-podium" alt="">
                            </div>
                    <?php
                        } else {
                            // A posição não foi encontrada
                            echo "Posição $position não encontrada no ranking.";
                        }
                    
                        // Fecha a consulta preparada
                        $stmt->close();
                        $conn->close();
                    ?>
                    <?php
                        include("connection.php");
                        $position = 1; // Posição desejada
                    
                        // Consulta para obter a posição específica no ranking
                        $sql = "
                            SELECT nome, sobrenome, pontuacao
                            FROM (
                                SELECT nome, sobrenome, pontuacao,
                                    (@row_number := @row_number + 1) AS ranking_position
                                FROM cadastros_lp
                                CROSS JOIN (SELECT @row_number := 0) AS rn
                                ORDER BY pontuacao ASC
                            ) AS ranking
                            WHERE ranking_position = ?
                        ";
                    
                        // Prepara a consulta
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("i", $position);
                    
                        // Executa a consulta
                        $stmt->execute();
                    
                        // Obtém o resultado da consulta
                        $result = $stmt->get_result();
                    
                        if ($row = $result->fetch_assoc()) {
                            // Exibe os dados da posição específica
                            $nome = $row['nome'];
                            $sobrenome = $row['sobrenome'];
                            $pontuacao = $row['pontuacao'];
                    ?>
                        <div class="pri">
                             <h3>
                                <?php
                                    $partesNome = explode(" ", $nome);
                                    $partesSobrenome = explode(" ", $sobrenome);
                                    $primeiroNome = $partesNome[0];
                                    $ultimoSobrenome = end($partesSobrenome);
                                    echo $primeiroNome . ' ' . $ultimoSobrenome;
                                ?>
                            </h3>
                            <h3>Tempo: <?php echo number_format($pontuacao, 3); ?> <span style="text-transform: lowercase">s</span></h3>
                            <img src="./img/gold.webp" class="stage-podium" alt="">
                        </div>
                    <?php
                        } else {
                            // A posição não foi encontrada
                            echo "Posição $position não encontrada no ranking.";
                        }

                        // Fecha a consulta preparada
                        $stmt->close();
                        $conn->close();
                    ?>
                    <?php
                        include("connection.php");
                        $position = 3; // Posição desejada
                    
                        // Consulta para obter a posição específica no ranking
                        $sql = "
                            SELECT nome, sobrenome, pontuacao
                            FROM (
                                SELECT nome, sobrenome, pontuacao,
                                    (@row_number := @row_number + 1) AS ranking_position
                                FROM cadastros_lp
                                CROSS JOIN (SELECT @row_number := 0) AS rn
                                ORDER BY pontuacao ASC
                            ) AS ranking
                            WHERE ranking_position = ?
                        ";
                    
                        // Prepara a consulta
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("i", $position);
                    
                        // Executa a consulta
                        $stmt->execute();
                    
                        // Obtém o resultado da consulta
                        $result = $stmt->get_result();
                    
                        if ($row = $result->fetch_assoc()) {
                            // Exibe os dados da posição específica
                            $nome = $row['nome'];
                            $sobrenome = $row['sobrenome'];
                            $pontuacao = $row['pontuacao'];
                    ?>
                        <div class="ter">
                             <h3>
                                <?php
                                    $partesNome = explode(" ", $nome);
                                    $partesSobrenome = explode(" ", $sobrenome);
                                    $primeiroNome = $partesNome[0];
                                    $ultimoSobrenome = end($partesSobrenome);
                                    echo $primeiroNome . ' ' . $ultimoSobrenome;
                                ?>
                            </h3>
                            <h3>Tempo: <?php echo number_format($pontuacao, 3); ?> <span style="text-transform: lowercase">s</span></h3>
                            <img src="./img/bronze.webp" class="stage-podium" alt="">
                        </div>
                    <?php
                        } else {
                            // A posição não foi encontrada
                            echo "Posição $position não encontrada no ranking.";
                        }

                        // Fecha a consulta preparada
                        $stmt->close();
                        $conn->close();
                    ?>
                </div>
            </div>
            <div class="classificacao">
                <?php
                    include("connection.php");
                    $startPosition = 4; // Posição inicial
                    $endPosition = 10; // Posição final
                
                    // Consulta para obter as posições do 4° ao 10° no ranking
                    $sql = "
                        SELECT nome, sobrenome, pontuacao
                        FROM (
                            SELECT nome, sobrenome, pontuacao,
                                (@row_number := @row_number + 1) AS ranking_position
                            FROM cadastros_lp
                            CROSS JOIN (SELECT @row_number := 0) AS rn
                            ORDER BY pontuacao ASC
                        ) AS ranking
                        WHERE ranking_position BETWEEN ? AND ?
                    ";
                
                    // Prepara a consulta
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ii", $startPosition, $endPosition);
                
                    // Executa a consulta
                    $stmt->execute();
                
                    // Obtém o resultado da consulta
                    $result = $stmt->get_result();
                
                    $colocacao = 4;
                    // Exibe os dados das posições do 4° ao 10° no ranking
                    while ($row = $result->fetch_assoc()) {
                        $nome = $row['nome'];
                        $sobrenome = $row['sobrenome'];
                        $pontuacao = $row['pontuacao'];
                ?>
                    <div class="posicao">
                        <div>
                            <h2><?php echo $colocacao?>°</h2>
                        </div>
                        <div>
                             <h2>
                                <?php
                                    $partesNome = explode(" ", $nome);
                                    $partesSobrenome = explode(" ", $sobrenome);
                                    $primeiroNome = $partesNome[0];
                                    $ultimoSobrenome = end($partesSobrenome);
                                    echo $primeiroNome . ' ' . $ultimoSobrenome;
                                ?>
                            </h2>
                        </div>
                        <div>
                            <h2><?php echo number_format($pontuacao, 3); ?> <span style="text-transform: lowercase; color: #001526">s</span></h2>
                        </div>
                    </div>
                <?php
                        $colocacao++;
                    }
                
                    // Fecha a consulta preparada
                    $stmt->close();
                    $conn->close();
                ?>
            </div>
            <h3 id="title-add">As 3 pessoas que marcarem os melhores tempos serão presenteadas com o Aparador de Pelos Corporais Panasonic V-Razor</h3>
        </div>
        <img src="./img/logo-desafio.png" width="30%" style="margin-top: 50px" alt="">

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Variável de controle para verificar se a página já foi atualizada
                var paginaAtualizada = false;

                // Verificar se a página já foi atualizada antes de executar o redirecionamento
                if (!paginaAtualizada) {
                    // Definir a variável para true para evitar atualizações futuras
                    paginaAtualizada = true;

                    // Redirecionar para a página novamente após 5 segundos (5000 milissegundos)
                    setTimeout(function() {
                        location.reload();
                    }, 3000); // 5 segundos
                }
            })
        </script>
    </body>
</html>
