<?php

$notas_bimestre = [10, 5, 6, 7];
$qnt_excelente = 0;

$media = array_sum($notas_bimestre) / 4;

//baseada na média final em relação à nota máxima (10)
$aproveitamento = ($media / 10) * 100;

if ($media >= 0 and $media < 4) {
    $situacao_ano = "PÉSSIMO";
} else if ($media > 4 and $media < 6) {
    $situacao_ano = "RUIM";
} else if ($media >= 6 and $media < 8) {
    $situacao_ano = "BOM";
} else {
    $situacao_ano = "EXCELENTE";
}

for ($i = 0; $i < 4; $i++) {
    if ($notas_bimestre[$i] >= 0 and $notas_bimestre[$i] < 4) {
        $situacao_nota[$i] = "PÉSSIMO";
    } else if ($notas_bimestre[$i] >= 4 and $notas_bimestre[$i] < 6) {
        $situacao_nota[$i] = "RUIM";
    } else if ($notas_bimestre[$i] >= 6 and $notas_bimestre[$i] < 8) {
        $situacao_nota[$i] = "BOM";
    } else {
        $situacao_nota[$i] = "EXCELENTE";
        $qnt_excelente += 1;
    }
}


if ($media >= 6) {
    $mensagem = "Parabéns! Você foi aprovado neste ano letivo situado em um nível $situacao_ano, com uma porcentagem de aproveitamento de $aproveitamento% e uma média final de " . number_format($media, 1) . "<br><br> DESTAQUES: no ano letivo que findou, o aluno obteve em $qnt_excelente unidade(s) uma situação de nível EXCELENTE. Muito bem!";
} else {
    $mensagem = "Infelizmente você não atingiu a média necessária. Continue se dedicando e não desista.";
}

?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Boletim</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <table>
        <tr class="notas">
            <th>1° bimestre</th>
            <th>Situação 1° bimestre</th>
            <th>2° bimestre</th>
            <th>Situação 2° bimestre</th>
            <th>3° bimestre</th>
            <th>Situação 3° bimestre</th>
            <th>4° bimestre</th>
            <th>Situação 4° bimestre</th>
        </tr>

        <tr class="notas">
            <td><?= number_format($notas_bimestre[0], 1) ?></td>
            <td><?= $situacao_nota[0] ?></td>
            <td><?= number_format($notas_bimestre[1], 1) ?></td>
            <td><?= $situacao_nota[1] ?></td>
            <td><?= number_format($notas_bimestre[2], 1) ?></td>
            <td><?= $situacao_nota[2] ?></td>
            <td><?= number_format($notas_bimestre[3], 1) ?></td>
            <td><?= $situacao_nota[3] ?></td>
        </tr>

        <!-- Espaço -->
        <tr class="espaco">
            <td colspan="8" style="background-color:white;"></td>
        </tr>

        <tr class="resumo">
            <td colspan="2">Nota exigida por bimestre</td>
            <td>6.0</td>
        </tr>

        <tr>
            <td colspan="2">Média final do aluno</td>
            <td><?= number_format($media, 1) ?></td>
        </tr>

        <tr>
            <td colspan="2">Situação do ano</td>
            <td><?= $situacao_ano ?></td>
        </tr>

        <tr>
            <td colspan="2">Porcentagem de aproveitamento</td>
            <td><?= $aproveitamento ?>%</td>
        </tr>

        <!-- Espaço -->
        <tr class="espaco">
            <td colspan="8" style="background-color:white;"></td>
        </tr>

        <tr class="mensagem">
            <th colspan="8">Mensagem final</th>
        </tr>

        <tr class="mensagem-final">
            <td colspan="8"><?= $mensagem ?></td>
        </tr>
        </div>

    </table>
</body>

</html>