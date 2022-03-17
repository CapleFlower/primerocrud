<?php 

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Vagas {
   
    /**
     * * identificador unico da vaga
     * @var string
    */

  public $id;

    /**
       * * titulo da vaga
     * @var string
    */

    public $titulo;

    /**
     * * Descrição da vaga (pode conter html)
     * @var string
    */

  public $descricao;

    /**
     * *define se a vaga esta ativa (s ou n)
     * @var string
    */

    public $status;

    /**
     * * Data da publicação da vaga
     * @var timestamp
    */

    public $data;

    
    /**
     * * Função para cadastrar a vaga no banco
     * @var boolean
    */

    public function cadastrar(){
        //definir data
        $this->data = date('Y-m-d H:i:s');
        // echo "<pre>"; print_r($this); echo "</pre>"; exit;

        //inserir vaga no banco e retornar id
        $objDatabase = new Database('vagas');
        $this->id = $objDatabase->insert([
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'status' => $this->status,
            'data' => $this->data
        ]);

        //Reotrnar sucesso
        return true;
    }


}
?>