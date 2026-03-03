<?php 

    include_once(__DIR__ . "/../config/connection.php");

    class MailVerification{
        private $conn;
        private $userId;
        private $type;

        public function __construct(){
            $this -> conn = connect();
            $this -> userId = '';
            $this -> type = 'guest';
        }

        public function setData($userId, $type){
            $this -> userId = $userId;
            $this -> type = $type;
        }

        public function checkIfMailIsVerified(){
            try{
                $sql = "SELECT emailVer FROM users WHERE id = :id";
                $stmt = $this -> conn -> prepare($sql);
                $stmt -> execute(['id' => $this -> userId]);
                $res = $stmt -> fetch();
                if($res['emailVer'] != 1) return false;
                return true;
            }catch(PDOException $e){
                $_SESSION['error'] = 'Hubo un error al conectar con el servidor.';
                return false;
            }
            return false;
        }

        public function verifyUserMailCode(){
            try{
                $sql = "SELECT code FROM user_verification WHERE userId = :id";
                $stmt = $this -> conn -> prepare($sql);
                $stmt -> execute(['id' => $this -> userId ] );
            }catch(PDOException $e){
                $_SESSION['error'] = 'Hubo un error al conectar con el servidor.';
            }
        }
    }