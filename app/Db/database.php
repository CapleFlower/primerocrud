<?php
//ponte do sistema com o banco de dados
namespace App\Db;

use Exception; //tratamento de exceções
use \PDO; //Classe de comunicação com o bnaco de dados
use PDOException; //Classe de tratamentos de exceções do banco de dados
use PDOStatement; // classe de comunicações com metódods de banco de dados

class database
{
    /** 
     * Host de conexão com o banco de dados
     * @var string
     */
    const HOST = 'localhost';

    /** 
     * nome do banco de daods
     * @var string
     */
    const NAME = 'crud';

    /** 
     * usuário do banco de dados
     * @var string
     */
    const USER = 'root';

    /** 
     * senha do banco de dados
     * @var string
     */
    const PASS = '';

    /** 
     * nome da tabela a ser manipulada
     * @var string
     */
    private $table;

    /** 
     * instancia do PDO para a conexão com o banco de dados
     * @var PDO
     */
    private $connection;

    /** 
     * define a tabela e instancia a conexão
     * @param string $table
     */
    public function __construct($table = null)
    {
        $this->table = $table;
        $this->setConnetion();
    }

    /** 
     * método responsaavel por criar uma conexão com o banco de dados
     * @param string $table
     */
    private function setConnetion()
    {
        try {
            //PDO é a classe que recebe os paramentros para devolver um objeto de conexão com o banco de dados
            $this->connection = new PDO('mysql:host=' . self::HOST . ';dbname=' . self::NAME, self::USER, self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }
    /** 
     * Método responsável por executar querys no banco de dados (útil para querys de consulta)
     * @params string query
     * @param array $values [field => value]
     * @return PDOStatement
     */
    public function executar($query, $params = [])
    {
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);

            return $statement;
        } catch (PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }

    /** 
     * Método responsável por inserir registros no banco
     * @param array $values [field => value]
     * @return Id inserido
     */
    public function insert($values)
    {
        // $query = 'INSERT INTO '.$this->table.' (titulo, descricao, data, status) VALUES ("teste", "bla bla", "2020-08-18 00:00:00")';
        // ? = O PDO usa esse formato para validar e verificar a proteção contra SQLInjection
        // echo "<pre>"; print_r($values); echo "</pre>"; exit;

        //Dados da query
        $fields = array_keys($values);
        // echo "<pre>"; print_r(implode(',', $fields)); echo "</pre>"; exit;

        $binds = array_pad([], count($fields), '?');
        // echo "<pre>"; print_r($binds); echo "</pre>"; exit;

        // $query = 'INSERT INTO '.$this->table.' ('.implode(',', $fields).') VALUES ("teste", "bla bla", "2020-08-18 00:00:00")';
        //echo "<pre>"; print_r($fields); echo "</pre>"; exit;
        //echo "<pre>"; print_r($binds); echo "</pre>"; exit;

        //Monta a query
        //implode transporma um array em uma string
        $query = 'INSERT INTO ' . $this->table . ' (' . implode(",", $fields) . ') VALUES (' . implode(",", $binds) . ')';
        // echo "<pre>"; print_r($query); echo "</pre>"; exit;

        //Executa o insert
        $this->executar($query, array_values($values));

        return $this->connection->lastInsertId();
    }




    
    /** 
     * Método responsável por executar uma consulta no banco de dados
     * @params string $where
     * @params string $order
     * @params string $limit
     * @return PDOStatement
     */
    public function select($where = null, $order = null, $limit = null, $fields = '*')
    {
        //Dados da query
        $where = strlen($where) ? 'WHERE ' . $where : '';
        $order = strlen($order) ? 'ORDER ' . $order : '';
        $limit = strlen($limit) ? 'LIMIT ' . $limit : '';
        //Monta query
        $query = 'SELECT ' . $fields . ' FROM ' . $this->table . ' ' . $where . ' ' . $order . ' ' . ' ' . $limit;

        return $this->executar($query);
    }
}
