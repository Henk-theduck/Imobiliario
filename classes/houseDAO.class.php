<?php
   require_once ('house.class.php'); 
   require_once ('IDatabase.php');
   require_once('connection.class.php');
  class HouseDAO extends House implements IDatabase{
  	/**
	 * @return mixed
	 */
	public function insert() {
        //SELECT `id`, `valor`, `descricao`, `status`, `fk_endereco`, `fk_locador` FROM `patoservidor`.`tblimovel`
        $sql = "INSERT INTO tblimovel (id, valor, descricao, status, fk_endereco, fk_locador) 
                               VALUES (:id, :valor, :descricao, :status, :fk_endereco, :fk_locador)";
        $stmt = Connection::prepare($sql);
        $stmt->execute(
            array(
                ":id" => $this->getId(), 
                ":valor"=> $this->getValue(), 
                ":descricao"=> $this->getDesc(), 
                ":status"=> $this->getStatus(), 
                ":fk_endereco"=> $this->getAdrees(), 
                ":fk_locador"=> $this->getLocator()
            )
        );
	}
	
	/**
	 * @return mixed
	 */
	public function list($id) {
        try {
            $dbh = new PDO('mysql:host=localhost;dbname=rent', 'root', '');

            return $dbh->query("SELECT * from tblimovel
                                join tblendereco on tblimovel.fk_endereco = tblendereco.id
                                join tbllocador on tblimovel.fk_locador = tbllocador.id where tbllocador.id = $id");
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
	}

    public function listAll(){
        try {
            $dbh = new PDO('mysql:host=localhost;dbname=rent', 'root', '');

            return $dbh->query('SELECT * from tblimovel join tblendereco on tblimovel.fk_endereco = tblendereco.id');
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        } 
    }
	
	/**
	 * @return mixed
	 */
	public function search($id) {
        try {
            $dbh = new PDO('mysql:host=localhost;dbname=rent', 'root', '');

            return $dbh->query("SELECT * from tblimovel join tblendereco on tblimovel.fk_endereco = tblendereco.id where tblimovel.id = $id");
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
	}
	
	/**
	 *
	 * @param mixed $id
	 * @return mixed
	 */
	public function update($id) {
	}
	
	/**
	 *
	 * @param mixed $id
	 * @return mixed
	 */
	public function remove($id) {
        $sql = "DELETE FROM tblimovel WHERE id = :id";
        $stmt = Connection::prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
	}
}
