<?php

declare(strict_types=1);

namespace App\Service;

use App\Service\BaseService;

class ServiceApi extends BaseService
{

    public function realizaLogin($dados)
    {

        $data = [
            'email' => $dados['email'],
            'password' => $dados['password']
        ];

        $login = self::login($data);

        return $login;
    }

}
