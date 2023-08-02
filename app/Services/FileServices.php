<?php

namespace App\Services;

use Illuminate\Http\RedirectResponse;


class FileServices{

    private  $headers = [];
    private  $body = [];

    public function procesorData($file){
        $this->splitFile($file);
        return $this->body;
    }


    private function splitFile($file)
    {
        $cont = 0;
        if (($gestor = fopen($file, "r")) !== FALSE) {
            while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {
                if($cont===0){
                    $this->headers[] = $datos;
                }else{
                    if(count($datos) == 5){
                        $this->body[] = $datos;
                    }

                }
                $cont++;
            }
            fclose($gestor);
        }

    }



}
