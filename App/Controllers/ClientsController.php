<?php
declare(strict_types = 1);

namespace App\Controllers;

use Core\Controller;

class ClientsController extends Controller
{

    public function index()
    {
        require_once APP . 'views/templates/header.php';
        require_once APP . 'views/templates/navbar.php';                
        require_once APP . 'views/products/index.php';
       //  require_once APP . 'views/templates/footer.php';
    }


}
