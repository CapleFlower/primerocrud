<?php 

    require __DIR__.'/vendor/autoload.php';

    define('TITLE', 'Editar Vaga');

    use \App\Entity\Vagas;

    
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

    //validação de post

    if(isset($_POST['titulo'],$_POST['descricao'],$_POST['status'])){
        $obvagas->titulo = $_POST['titulo'];
        $obvagas->descricao = $_POST['descricao'];
        $obvagas->status = $_POST['status'];

        $obvagas->atualizar();
    }

    // $obvagas = new Vagas;

    // // echo "<pre>"; print_r($_POST['descricao']); echo "</pre>"; exit;
    // if(isset($_POST['titulo'],$_POST['descricao'],$_POST['status'])){
    //     $obvagas->titulo = $_POST['titulo'];
    // $obvagas->descricao = $_POST['descricao'];
    // $obvagas->status = $_POST['status'];

    // $obvagas->cadastrar();


    // header('location: index.php?status=success');
    // exit;

    // }

    require __DIR__.'/includes/header.php';

    require __DIR__.'/includes/formulario.php';

    require __DIR__.'/includes/footer.php';
