<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AdminProvider 
{
    

  
   

    static public function render_menus(){
        $menus=[
             [
                'text'=>'UNIT',
                'icon'=>'nav-icon i-Computer-Secure',
                'url'=>route('d.post')
            ],
             [
                'text'=>'APARTEMEN',
                'icon'=>'nav-icon i-File-Clipboard-File--Text',
                'url'=>route('d.post')
            ]
         ];

        foreach ($menus as $key => $value) {

            if(isset($value['submenu'])){
            
                foreach ($value['submenu'] as $keysub => $sub) {
                    # code...
                }
            }
        }

        
        return (array)$menus;
    }



}
