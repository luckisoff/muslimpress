<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class DeployController extends Controller
{
    private $key = 'muslimpressdeploy1@';

    public function deploy($key){
        try {
            if($key != $this->key) throw new \Exception('No key matched');


            $allowed_ips = array(
                '207.97.227.', '50.57.128.', '108.171.174.', '50.57.231.', '204.232.175.', '192.30.252.', // GitHub
                '195.37.139.','193.174.' // VZG
            );

            $allowed = false;
            
            $headers = apache_request_headers();

            if (@$headers["X-Forwarded-For"]) {
                $ips = explode(",",$headers["X-Forwarded-For"]);
                $ip  = $ips[0];
            } else {
                $ip = $_SERVER['REMOTE_ADDR'];
            }
            
            foreach ($allowed_ips as $allow) {
                if (stripos($ip, $allow) !== false) {
                    $allowed = true;
                    break;
                }
            }
            
            if (!$allowed) {
                header('HTTP/1.1 403 Forbidden');
                exit;
            }

            flush();

            // Actually run the update

            $commands = array(
                'git pull origin master',
                'php artisan migrate',
                'composer install',
            );

            foreach($commands AS $command){
                $tmp = shell_exec("$command 2>&1");
            }


            echo 'success'; 

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
