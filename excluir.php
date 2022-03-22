<?php

use App\Entity\Vagas;

    require __DIR__.'/vendor/autoload.php';

    //Validação do id

    if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        header('location: index.php?status=error');
        exit;
    }

    //Consulta de vaga
    $obVaga = Vagas::getVaga($_GET['id']);

    //Validação de vaga
    if(!$obVaga instanceof Vagas) {
        header('location: index.php?status=error');
        exit;
    }

    require __DIR__.'/includes/header.php';

    require __DIR__.'/includes/confirmarExclusao.php';

    require __DIR__.'/includes/footer.php';
?>
