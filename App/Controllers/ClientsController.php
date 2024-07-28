<?php
declare(strict_types = 1);

namespace App\Controllers;

use Core\Controller;

class ClientsController extends Controller
{

    public function index()
    {
         require_once APP . 'views/templates/header.php';
         require_once APP . 'views/templates/menu.php';                
         require_once APP . 'views/'.$this->table.'/index.php';
         require_once APP . 'views/templates/footer.php';
    }


}
