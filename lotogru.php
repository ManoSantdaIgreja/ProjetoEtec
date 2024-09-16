<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $bet = $_POST["bet"];
    $userNumbers = $_POST["numbers"] ?? [];

    if (count($userNumbers) != 25) {
        echo "Você deve escolher exatamente 25 números!<br>";
        echo "<a href='index.html'>Voltar</a>";
        exit();
    }

    $drawnNumbers = array_rand(range(1, 50), 25);
    $hits = count(array_intersect($userNumbers, $drawnNumbers));

    echo "<h1>Resultado da LotoGru</h1>";
    echo "<h3>Nome: $name</h3>";
    echo "<h3>Números escolhidos: " . implode(", ", $userNumbers) . "</h3>";
    echo "<h3>Números sorteados: " . implode(", ", $drawnNumbers) . "</h3>";
    echo "<h3>Você acertou $hits número(s).</h3>";

    if ($hits == 0 || $hits == 25) {
        echo "<h2>Parabéns! Você ganhou R$ " . ($bet * 50) . "!</h2>";
    } else {
        echo "<h2>Você não ganhou desta vez. Tente novamente!</h2>";
    }

    echo "<br><a href='index.html'>Jogar Novamente</a>";
}
?>