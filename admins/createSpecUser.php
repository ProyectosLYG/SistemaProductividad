<?php
    session_start();
    require_once(__DIR__ . '/../build/config/connection.php');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require "./../build/PHPMailer/mailerConf/Exception.php";
    require "./../build/PHPMailer/mailerConf/PHPMailer.php";
    require "./../build/PHPMailer/mailerConf/SMTP.php";

    $conn = connect();

    // echo '<pre>';
    // echo var_dump( $_POST );
    // echo '</pre>';
    // exit;

    if( $_SERVER['REQUEST_METHOD'] === 'POST' ){
        $registrar = new Registrar();
        $registrar -> validateUser( $_POST['user'] );
        $registrar -> validateUserDB();
        $registrar -> validateArea( $_POST['area'] );
        $registrar -> validateRole( $_POST['role'] );
        if( !isset( $_POST['nmd'] ) ){
            if( $_POST['nmd'] === 'nmd' ){
                $registrar -> validateResEmail( $_POST['email'] );
            }else{
                $registrar -> validateStudentEmail( $_POST['email'] );
            }
        }
        $registrar -> validatePwd( $_POST['pwd'], $_POST['pwdRep'] );
        $registrar -> cryptPwd();
        $registrar -> createUser();
        $registrar -> createRole();
        $registrar -> createProfile();
        $registrar -> createToken();
        $registrar -> insertUserToken();
        $registrar -> sendMail();    
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
    private $token;
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
        $this -> token = substr( md5( uniqid( rand(), true ) ), 0, 6 );
        $this -> error = '';
    }

    //validar si el usuario es valido
    public function validateUser( $user ){
        $this -> user = $user;
        if( empty( $this -> user ) ){
            $this -> error = "Todos los campos son obligatorios";
            self::errorVerify();
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
            self::errorVerify();
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
            self::errorVerify();
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
            self::errorVerify();
        }
    }

    //validacion de correos de investigadores y administradores
    public function validateResEmail( $email ){
        $emailRegex = "/^[a-zA-Z0-9._%+-]+@cuautitlan+\.tecnm+\.mx$/";
        $this -> email = $email;
        if( !preg_match( $emailRegex, $this -> email ) ){
            $this -> error = "El correo no es valido";
            self::errorVerify();
        }
    }

    //validacion de correos institucionales de alumnos
    public function validateStudentEmail( $email ){
        $emailRegex = "/^[0-9]{9}+@cuautitlan+\.tecnm+\.mx$/";
        $this -> email = $email;
        if( !preg_match( $emailRegex, $this -> email ) ){
            $this -> error = "No es un correo valido";
            self::errorVerify();
        }
    }

    public function validatePwd( $pwd, $pwdRep ) {
        $this -> pwd = $pwd;
        $this -> pwdRep = $pwdRep;

        if ( empty( $this -> pwd ) && empty( $this -> pwdRep ) ){
            $this -> error = 'Las contraseñas no son validas';
            self::errorVerify();
        }

        if( $pwd !== $pwdRep ){
            $this -> error = 'Debe ingresar la misma contraseña 2 veces.';
            self::errorVerify();
        }
    }

    public function cryptPwd(){
        $this -> crptdPwd = crypt( $this -> pwd, PASSWORD_BCRYPT, ['cost' => 12] );
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
                $res = $stmt -> rowCount();
                if( !$res ){
                    $this -> error = 'Hubo un problema a la hora de crear el usuario ( 1 ).';
                    self::errorVerify();
                }
            } catch( PDOException $e ) {
                $this -> error = 'Hubo un problema al crear el usuario ( 0 ).';
                self::errorVerify();
            }
        }
    public function createRole(  ){
        $sqlRoles = "INSERT INTO user_roles ( userId, role ) VALUES ( :userId, :role )";
        try{
            $stmt = $this -> conn -> prepare( $sqlRoles );
            $stmt -> execute([
                'userId' => $this -> id,
                'role' => $this -> role
            ]);
            $res = $stmt -> rowCount();
        } catch( PDOException $e ) {
            $this -> error = 'Hubo un error al crear el rol ( 2 ).';
            self::errorVerify();
        }
    }
    public function createProfile() { 
        $sqlProfile = "INSERT INTO user_profile ( userId, area) VALUES ( :id, :area )";
        try{
            $stmt = $this -> conn -> prepare( $sqlProfile );
            $stmt -> execute([
                'id' => $this -> id,
                'area' => $this -> area 
            ]);
            $res = $stmt -> rowCount();
        } catch ( PDOException $e) {
            $this -> error = 'Hubo un error al ingresar los datos de perfil del usuario. ( 3 )';
            self::errorVerify();
        }
    }

    public function createToken(){
        $this -> token = substr( md5( uniqid( rand(), true ) ), 0, 6 );
    }

    public function insertUserToken () {
        $sql = 'INSERT INTO user_verification ( userId, code, fecha ) VALUES ( :userId, :code, NOW() ) ';

        try{
            $stmt = $this -> conn -> prepare( $sql );
            $stmt -> execute([
                'userId' => $this -> id,
                'code' => $this -> token
            ]);
        } catch ( PDOException $e ) {
            $this -> error = 'Hubo un error al registrar el token.';
            self::errorVerify();
        }
    }
    
    public function sendMail() {

        $mail = new PHPMailer();

        $mail -> isSMTP();
        $mail -> Host = 'smtp.gmail.com';
        $mail -> SMTPAuth = true;
        $mail -> Username = 'desemptesci@gmail.com';
        $mail -> Password = 'qfzw orjc ykxt ylcx';
        $mail -> SMTPSecure = 'tls';
        $mail -> Port = 587;

        $mail -> setFrom('desemptesci@gmail.com');
        
        $mail -> addAddress( $this -> email );
        
        $mail -> Subject = 'Desempeño ISC - Correo de cambio de contraseña';
        
        $mail -> isHTML(true);
        
        $mailContent = '
        <h1> Bienvenido a Desempeño ISC</h1>
        <p> Codigo de ferificacion de cuenta es: <strong>'. $this -> token .'</strong></p>
        <p>Si usted no solicitó este token, no lo comparta y solo ignorelo.</p>
        ';

        $mail -> Body = $mailContent;
        
        if(!$mail -> send()){
            $this -> error = 'Hubo un probelma con mandar el mensaje. Error: ' . $mail -> ErrorInfo;
            self::errorVerify();
        }
    }

    public function errorVerify(){
        if ( !empty( $this -> error ) ) {
            $_SESSION['error'] = $this -> error;
            header( 'Location: ./registInvest.php' );
            exit;
        }
    }
    //fncion que guarda en el usuario el codigo mandado al correo, tiempo y cambio de contraseñas
}