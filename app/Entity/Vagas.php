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

    /**
     * método responsavel por obter as vagas do banco de dados
     * @params string $where 
     * @params string $order
     * @params string $limit
     * @return array*/

     public static function getVagas($where = null, $order = null, $limit = null){
      $objDatabase = new Database('vagas');
       return ($objDatabase)->select($where, $order, $limit)->fetchALL(PDO::FETCH_CLASS, self::class);
     }

     /**Método responsavel por obter as vagas do banco de dados
      * @params int $id
      @return Vaga
      */

      public static function getVaga($id) {
        $objDatabase = new Database('vagas');

        return ($objDatabase)->select('id = ' . $id)->fetchObject(self::class);
      }



}
?>