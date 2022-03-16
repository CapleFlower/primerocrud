<?php 
    //ponte do sistema com o banco de dados
    namespace app\db;

    use Exception; //tratamento de exceções
    use \PDO; //Classe de comunicação com o bnaco de dados
    use PDOException; //Classe de tratamentos de exceções do banco de dados
    use PDOStatement; // classe de comunicações com metódods de banco de dados

    class database {
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
        public function __construct($table = null) {
            $this->table = $table;
            $this->setConnetion();
        }

                                        /** 
         * método responsaavel por criar uma conexão com o banco de dados
         * @param string $table
        */
        private function setConnetion (){
            try{
                //PDO é a classe que recebe os paramentros para devolver um objeto de conexão com o banco de dados
                $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME, self::USER, self::PASS);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e) {
                die('ERROR: '. $e->getMessage());

            }
        }
    }
?>