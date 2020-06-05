<?php
/**
 * Created by PhpStorm.
 * User: Jenzri
 * Date: 02/10/2016
 * Time: 19:49
 */

namespace laminas\Bootstrapdatepicker\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
class DatepickerController extends  AbstractActionController
{

    public function jsAction(){
        $lang=$this->params("lang",null);
         header('Content-type:application/javascript;charset=utf-8');

        $js=  file_get_contents(__DIR__."/../../asset/js/bootstrap-datepicker.min.js");
        echo $js;
        if($lang){
            $client = new \Laminas\Http\Client();
            $client->setAdapter('Laminas\Http\Client\Adapter\Curl');
            $url='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/locales/bootstrap-datepicker.'.$lang.'.min.js';
            $client->setUri($url);
            $result= $client->send();

            if($result->isOk()){
                $body                   = $result->getBody();
                echo $body;

            }

        }
        exit;
    }
    public function cssAction(){

        header('Content-type:text/css;charset=utf-8');
        $css=  file_get_contents(__DIR__."/../../asset/css/bootstrap-datepicker3.min.css");

        echo $css;
        exit;
    }
}