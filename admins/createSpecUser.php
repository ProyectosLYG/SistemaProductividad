<?php
    session_start();
    require_once(__DIR__ . '/../build/config/connection.php');

    $conn = connect();

    ( !isset( $_POST['user'] ) || !isset( $_POST['email'] ) || !isset( $_POST['pwd'] ) || !isset( $_POST['pwdRep'] ) || !isset( $_POST['role '] ) || !isset( $_POST['area'] ) || empty( $_POST['user'] ) || empty( $_POST['email'] ) || empty( $_POST['pwd'] ) || empty( $_POST['pwdRep'] ) || empty( $_POST['role'] ) || empty( $_POST['area'] ) ) ? $error = "Es necesario llenar todos los campos." : null;
    
    if( !empty($error)  ){
        $_SESSION['error'] = $error;
        header("Location: ../");
        exit;
    }
    
    if( $pwd !== $pwdRep ){
        $_SESSION['error'] = "Las contraseñas no coinciden.";
        header( "Location: ../" );
        exit;
    }

    $user = $_POST['user'];
    $email = $_POST['email'];
    $pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
    $role = $_POST['role'];
    $area = $_POST['area'];
    $emailVer = 0;
    $verificationCode = bin2hex(random_bytes(16));

    $sql = "SELECT username FROM users WHERE username = :user ";

    $stmt = $conn -> prepare($sql);
    $stmt -> execute(['user' => $user]);
    $res = $stmt -> rowCount();
    if( $res !== 0 ){
        $_SESSION['error'] = "El nombre de usuario ya existe";
        header("Location ../");
        exit;
    }

    $sqlInsert = "INSERT INTO users ( username, email, emailVer, pwd ) VALUES ( :user, :email, :emailVer, :pwd )";
    $stmt = $conn -> prepare($sql);
    $stmt -> execute([
        'user' => $user,
        'email' => $email,
        'emailVer' => $emailVer,
        'pwd' => $pwd
    ]);
    $res = $stmt -> rowCount();
    if( $res > 0 ){
        $sql = "SELECT id FROM users WHERE username = :user ";
        $stmt = $conn -> prepare($sql);
        $stmt -> execute(['user' => $user]);
        $res = $stmt -> fetch();
        $id = $res['id'];
        $sql_role = "INSERT INTO user_roles ( user_id, role ) VALUES (:id, :role)";
        $stmt = $conn -> prepare($sql_role);
        $stmt -> execute([
            'id' => $id,
            'role' => $role
        ]);
        $res = $stmt -> rowCount();
        if( $res > 0 ){
            $sql_profile = "INSERT INTO user_profile ( id, area ) VALUES (:id, :area)";
            $stmt = $conn -> prepare($sql_profile);
            $stmt -> execute([
                'id' => $id,
                'area' => $area
            ]);
            $res = $stmt -> rowCount();
            if( $res > 0 ){
                
            }
        }else{
            $_SESSION['error'] = "Hubo un problema al ingresar el usuario a la base de datos. Intente de nuevo más tarde. Error code: (2)";
            header('Location: ../');
            exit;
        }
    }else{
        $_SESSION['error'] = "Hubo un problema al ingresar el usuario a la base de datos. Intente de nuevo más tarde. Error code: (1)";
        header("Location ../");
        exit;
    }



class Registrar {

    private $id;
    private $conn;
    private $user;
    private $area;
    private $role;
    private $pwd;
    private $pwdRep;
    private $crptdPwd;
    private $email;
    private $error;
    
    function __construct(){
        $this -> id = substr( md5( uniqid(rand(), true ) ), 0, 16);
        $this -> conn = connect();
        $this -> user = '';
        $this -> area = '';
        $this -> role = '';
        $this -> pwd = '';
        $this -> pwdRep = '';
        $this -> crptdPwd = '';
        $this -> email = '';
        $this -> error = '';
    }

    //validar si el usuario es valido
    public function validateUser( $user ){
        $this -> user = $user;
        if( empty( $this -> user ) ){
            $this -> error = "Todos los campos son obligatorios";
        }
    }

    public function validateUserDB(  ){
        $sql = "SELECT * FROM users WHERE username = :user";

        try{
            $stmt = $this -> conn -> prepare( $sql );
            $stmt -> execute( [ 'user' => $this -> user ] );
            $res = $stmt -> fetch();

            if( $res ){
                $this -> error = 'El usuario ya existe.';
            }
        } catch( PDOException $e ) {
            $this -> error = "Hubo un problema al verificar si ya existe un usuario.";
        }
    }

    //Valida el area y que exista en el sistema
    /* */
    public function validateArea( $area ){
        $validAreas = [
            'ISC' => 'Ingeniería en Sistemas Computacionales',
            'IM' => 'Ingeniería Mecatrónica',
            'IL' => 'Ingeniería Logística',
            'CP' => 'Contabilidad Pública',
            'IGE' => 'Ingeniería en Gestión Empresarial',
            'IQ' => 'Ingeniería Química',
            'IAE' => 'Ingeniería en Administracíon',
            'IT' => 'Ingeniería en Tecnologías de la Información y Comunicaciones',
            'IS' => 'Ingeniería en Semiconductores',
            'II' => 'Ingeniería Industrial'
        ];
        $this -> area = $area;
        if( !array_key_exists( $this -> area, $validAreas)){
            $this -> error = "El área no es valida.";
        }
    }

    //validarion de rol
    public function validateRole( $role ){
        $validRoles = [
            'admin',
            'researchers',
            'leaderchip',
            'student'
        ];
        $this -> role = $role;
        if( !in_array( $this -> role, $validRoles ) ){
            $this -> error = "El rol no es valido.";
        }
    }

    //validacion de correos de investigadores y administradores
    public function validateResEmail( $email ){
        $emailRegex = "/^[a-zA-Z0-9._%+-]+@cuautitlan+\.tecnm+\.mx$/";
        $this -> email = $email;
        if( !preg_match( $emailRegex, $this -> email ) ){
            $this -> error = "El correo no es valido";
        }
    }

    //validacion de correos institucionales de alumnos
    public function validateStudentEmail( $email ){
        $emailRegex = "/^[0-9]{9}+@cuautitlan+\.tecnm+\.mx$/";
        $this -> email = $email;
        if( !preg_match( $emailRegex, $this -> email ) ){
            $this -> error = "No es un correo valido";
        }
    }

    public function validatePwd( $pwd, $pwdRep ) {
        $this -> pwd = $pwd;
        $this -> pwdRep = $pwdRep;

        if ( empty( $this -> pwd ) && empty( $this -> pwdRep ) ){
            $this -> error = 'Las contraseñas no son validas';
        }

        if( $pwd !== $pwdRep ){
            $this -> error = 'Debe ingresar la misma contraseña 2 veces.';
        }
    }

    public function cryptPwd(){
        $this -> crptdPwd = crypt( $this -> pwd, PASSWORD_BCRYPT_DEFAULT_COST );
    }

    public function createUser(){
        $sql = "INSERT INTO users ( id, username, email, emailVer, pwd, created, updated) VALUES ( :id, :username, :email, 0, :pwd, CURDATE(), CURDATE() )";
        try{
            $stmt = $this -> conn -> prepare( $sql );
            $stmt -> execute( [
                'id' => $this -> id,
                'username' => $this -> user,
                'email' => $this -> email,
                'pwd' => $this -> crptdPwd
            ] );
            $res = $stmt -> fetch();
            if( !$res ){
                $this -> error = 'Hubo un problema a la hora de crear el usuario ( 1 ).';
            }
            
        } catch( PDOException $e ) {
            $this -> error = 'Hubo un problema al crear el usuario ( 0 ).';
        }

    }
}