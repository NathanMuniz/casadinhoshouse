<?php

declare(strict_types=1);

namespace App\Service;

class BaseService
{
    public static function getToken()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => URLSERVICE . 'token',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'login=' . LOGINTOKEN . '&senha=' . PASSTOKEN,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded',
                'Cookie: PHPSESSID=ba2n3qc83olb7bmeivu1s9n5pp'
            ),
        ));

        $response = curl_exec($curl);

        if ($errno = curl_errno($curl)) {
            $error_message = curl_strerror($errno);
            echo "cURL error ({$errno}):\n {$error_message}";
            return false;
        }
        curl_close($curl);


        $token = json_decode($response, true);

        return $token['token'];
    }

    public static function login($dadosLogin)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => URLSERVICE . '/auth/signin',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($dadosLogin),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        if ($errno = curl_errno($curl)) {
            $error_message = curl_strerror($errno);
            echo "cURL error ({$errno}):\n {$error_message}";
        }
        curl_close($curl);

        $dados = json_decode($response, true);

        return $dados;
    }

    public static function Curl($service, $campo, $method = 'POST')
    {
        $curl = curl_init();


        curl_setopt_array($curl, array(
            CURLOPT_URL => URLSERVICE . $service,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_POSTFIELDS => json_encode($campo),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . self::getToken(),
                'Content-Type: application/json',
                'Cookie: PHPSESSID=ba2n3qc83olb7bmeivu1s9n5pp'
            ),
        ));

        $response = curl_exec($curl);

        if ($errno = curl_errno($curl)) {
            $error_message = curl_strerror($errno);
            echo "cURL error ({$errno}):\n {$error_message}";
            curl_close($curl);
            return false;
        }

        curl_close($curl);

        if ($response) {
            $pessoais = json_decode($response, true);
        }


        return $pessoais;
    }

    public static function upFile($service, $dados)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => URLSERVICE . $service,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('file' => new \CURLFILE($dados['file']['tmp_name'], $dados['file']['type'], $dados['file']['name']), 'id' => $dados['id'], 'tipo' => $dados['tipo']),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . self::getToken(),
                'Content-Type: multipart/form-data',
                'Cookie: PHPSESSID=11j337tkinpvqtrfoi642ga8nv'
            ),
        ));

        $response = curl_exec($curl);

        if ($errno = curl_errno($curl)) {
            $error_message = curl_strerror($errno);
            echo "cURL error ({$errno}):\n {$error_message}";
            curl_close($curl);
            return false;
        }

        curl_close($curl);

        if ($response) {
            $pessoais = json_decode($response, true);
        }


        return $pessoais;
    }
}
