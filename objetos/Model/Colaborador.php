<?php
include ("Myconnect.php");

class Colaborador extends Myconnect{


    public function listar(){
        $stmt = $this->conn->prepare("SELECT * FROM colaboradores");
        $stmt->execute();
        
        $result = $stmt->fetchAll(PDO :: FETCH_ASSOC);

        return $result;
        
    }

    public function cadastro($campos1, $campos2, $data){
        $sql = "INSERT INTO colaboradores ($campos1) VALUES ($campos2)";
        $stmt= $this->conn->prepare($sql);
        $stmt->execute($data);
        
        if ($stmt->rowCount()) {
           return 1;
        } else {
           return 0;
        }
    }
    public function atualizar($campos, $data){
    
        $sql = "update colaboradores set $campos where id = :id";
        $stmt= $this->conn->prepare($sql);
        $stmt->execute($data);
        
        if ($stmt->rowCount()) {
            return 1;
         } else {
            return 0;
         }
    }
    public function deletar($id){
    
        $sql = "delete from Colaboradores where id = :id";
        $stmt= $this->conn->prepare($sql);
        $stmt->execute(array(':id' => $id));
        
        if ($stmt->rowCount()) {
            return 1;
         } else {
            return 0;
         }
    }
    public function carregarColaborador($id){
        $stmt = $this->conn->prepare('SELECT * FROM colaboradores WHERE id = :id');
        $stmt->execute(array('id' => $id));

        $result = $stmt->fetchAll(PDO :: FETCH_ASSOC);
        return $result;
    }
}