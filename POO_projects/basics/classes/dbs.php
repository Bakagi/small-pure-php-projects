<?php 

 class dbs{
    private $host = 'localhost';
    private $dbn = 'test';
    private $dbu = 'root';
    private $dbp = '';

    protected function connect(){
    try{
        $pdo = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbn, $this->dbu, $this->dbp);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
 } catch (PDOException $e){
     echo "connection failed" . $e->getMessage();
 }
}
}

?>