<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    //

    public function getConfig(){

        return [
            'facebook' => [
                'token' => $this->token,
                'app_secret' => $this->app_secret,
                'verification'=> $this->verification,
            ]
        ];
    }
}
