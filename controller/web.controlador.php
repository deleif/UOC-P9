<?php

require_once 'model/modelo_usuarios.php';
require_once 'model/modelo_productos.php';		

class WebControlador{
	
    private $usuario;
    private $productos;
    

	public function __CONSTRUCT(){
		
    $this->usuario= new Usuario();
    $this->productos= new productos();

    }
    
    public function Index(){
		
        require_once 'view/header.php';
        require_once 'view/Contenido/home.php';
        require_once 'view/footer.php';
    }
	
	public function Registro_usuario(){
		
		$user = new Usuario();
		
        require_once 'view/header.php';
        require_once 'view/Contenido/registro.php';
        require_once 'view/footer.php';
    }
	
	public function Login_usuario(){
		
		$user = new Usuario();
		
        require_once 'view/header.php';
        require_once 'view/Contenido/login.php';
        require_once 'view/footer.php';
    }


    public function Crud(){

        $prod = new Productos();
      
        require_once 'view/header.php';
        require_once 'view/Contenido/vista_productos.php';
        require_once 'view/footer.php';
    }
	
	public function Guardar_usuarios(){


		$user = new Usuario();
		
        $user->nombre_usuario = $_REQUEST['nombre_usuario'];
        $user->password_usuario = $_REQUEST['password_usuario'];
       	$this->usuario->Registrar($user);
        
        echo "Usuario registrado con exito, <a href='index.php'>volver</a>";
	}
	
	public function Iniciar_sesion(){
		
		$user = new Usuario();
		
		$user->nombre_usuario = $_REQUEST['nombre_usuario'];
		$user->password_usuario = $_REQUEST['password_usuario'];
		
		$this->usuario->Validar($user);

    }


    public function ValorarProducto(){

        $prodsel = new Productos();

        if(isset($_REQUEST['id_producto'])){
            $prodsel = $this->productos->ObtenerProducto($_REQUEST['id_producto']);
        }
        
        require_once 'view/header.php';
        require_once 'view/Contenido/vista_valora_producto.php';
        require_once 'view/footer.php';
    }
    



	



}

?>