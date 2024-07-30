<?php
declare(strict_types = 1);

namespace App\Controllers;

use App\Service\ServiceApi;
use Core\Controller;

class AdminController extends Controller
{

    public $table = 'admin';
    private $service;


    public function __construct(Type $var = null) {
        $this->service = new ServiceApi;
    }
    public function index()
    {
         require_once APP . 'views/templates/header.php';
         require_once APP . 'views/templates/navbar.php';
         require_once APP . 'views/templates/menu.php';                
         require_once APP . 'views/admin/index.php';
         require_once APP . 'views/templates/footer.php';
    }

    public function login()
    {

        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            require_once APP . 'views/templates/header.php';
            require_once APP . 'views/admin/login.php';
           //  require_once APP . 'views/templates/footer.php';
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $login = $this->service->realizaLogin($_POST);

            if($login['error']){
                $errors[] = 'Login ou Senha Inválido';
                require_once APP . 'views/templates/header.php';
                require_once APP . 'views/admin/login.php';
                return;
                exit;
            }
            

           
           //  require_once APP . 'views/templates/footer.php';
        }
       
    }


}
