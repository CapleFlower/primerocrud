<?php 

    require __DIR__.'/vendor/autoload.php';

    define('TITLE', 'Cadastrar Vaga');

    use \App\Entity\Vagas;
    $obvagas = new Vagas;

    // echo "<pre>"; print_r($_POST['descricao']); echo "</pre>"; exit;
    if(isset($_POST['titulo'],$_POST['descricao'],$_POST['status'])){
        $obvagas->titulo = $_POST['titulo'];
    $obvagas->descricao = $_POST['descricao'];
    $obvagas->status = $_POST['status'];

    $obvagas->cadastrar();


    header('location: index.php?status=success');
    exit;

    }

    require __DIR__.'/includes/header.php';

    require __DIR__.'/includes/formulario.php';

    require __DIR__.'/includes/footer.php';
