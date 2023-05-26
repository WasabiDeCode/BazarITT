<?php
session_start();
//include("C:/xampp/htdocs/JavaScriptExe/connect.php");
//include("C:/xampp/htdocs/JavaScriptExe/functions.php");
//$user_data = check_login($con);
    class usernameModel{

        private $PDO;
        public function __construct()
        {
            require_once("C:/xampp/htdocs/JavaScriptExe/db.php");
            $con = new db();
            $this->PDO = $con->conexion();
        }
        public function insertar($nombre, $descripcion, $precio, $status, $imagen){
            //$Vendor = $user_data['NumControl'];
            $stament = $this->PDO->prepare("insert into articulos values (null, :nombre, :descripcion, :precio, :status, :imagen, null)");
            $stament->bindParam(":nombre",$nombre);
            $stament->bindParam(":descripcion",$descripcion);
            $stament->bindParam(":precio",$precio);
            $stament->bindParam(":status",$status);
            $stament->bindParam(":imagen",$imagen);
            return ($stament->execute()) ? $this->PDO->lastInsertId() : false ;
        }
        public function show($id){
            $stament = $this->PDO->prepare("SELECT * FROM prueba where id = :id limit 1");
            $stament->bindParam(":id",$id);
            return ($stament->execute()) ? $stament->fetch() : false ;
        }
        public function index(){
            $stament = $this->PDO->prepare("SELECT * FROM username");
            return ($stament->execute()) ? $stament->fetchAll() : false;
        }
        public function update($id,$nombre){
            $stament = $this->PDO->prepare("UPDATE username SET nombre = :nombre WHERE id = :id");
            $stament->bindParam(":nombre",$nombre);
            $stament->bindParam(":id",$id);
            return ($stament->execute()) ? $id : false;
        }
        public function delete($id){
            $stament = $this->PDO->prepare("DELETE FROM username WHERE id = :id");
            $stament->bindParam(":id",$id);
            return ($stament->execute()) ? true : false;
        }
    }

?>