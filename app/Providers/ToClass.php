<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ToClass{

     public function __construct(Array $properties=array()){
      foreach($properties as $key => $value){
        $this->{$key} = $value;
      }
    }
}
