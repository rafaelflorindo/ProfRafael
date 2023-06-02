<?php
require_once ("Myconnect.php");

class Projetos extends Myconnect{
    private $campos1, $campos2, $data;

    public function getCampos1(){
        return $this->campos1;
    }
    public function getCampos2(){
        return $this->campos2;
    }
    public function getdata(){
        return $this->data;
    }

    public function listar(){
        $stmt = $this->conn->prepare("SELECT * FROM projetos where status = 1 order by nome asc");
        $stmt->execute();
        
        $result = $stmt->fetchAll(PDO :: FETCH_ASSOC);
        //var_dump($result);
        return $result; 
    }
    /*public function listarSelect(){
        $stmt = $this->conn->prepare("SELECT id, nome FROM colaboradores order by nome asc");
        $stmt->execute();
        
        $result = $stmt->fetchAll(PDO :: FETCH_ASSOC);
        //var_dump($result);
        return $result; 
    }*/

    public function cadastrar($campos1, $campos2, $data){
        $this->campos1 = $campos1;
        $this->campos2 = $campos2;
        $this->data = $data;

        $campos1_poo =  $this->getCampos1();
        $campos2_poo =  $this->getCampos2();
        $data_poo =  $this->getdata();
       
        //$sql = "INSERT INTO projetos order by asc ($campos1) VALUES ($campos2)";
        $sql = "INSERT INTO projetos order by asc ($campos1_poo) VALUES ($campos2_poo)";
        $stmt= $this->conn->prepare($sql);
        $stmt->execute($data_poo);
        
        if ($stmt->rowCount()) {
           return 1;
        } else {
           return 0;
        }
    }
    public function atualizar($campos, $data){
    
        $sql = "update projetos order by asc set $campos where id = :id";
        $stmt= $this->conn->prepare($sql);
        $stmt->execute($data);
        
        if ($stmt->rowCount()) {
            return 1;
         } else {
            return 0;
         }
    }
    public function deletar($id){
    
        $sql = "delete from projetos order by asc where id = :id";
        $stmt= $this->conn->prepare($sql);
        $stmt->execute(array(':id' => $id));
        
        if ($stmt->rowCount()) {
            return 1;
         } else {
            return 0;
         }
    }
    public function carregarProjetos($id){
        $stmt = $this->conn->prepare('SELECT * FROM projetos order by asc WHERE id = :id');
        $stmt->execute(array('id' => $id));

        $result = $stmt->fetchAll(PDO :: FETCH_ASSOC);
        return $result;
    }
}