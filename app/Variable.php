<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Variable extends Model {
    public $timestamps = false;

    function __construct(array $attributes = array()){
        parent::__construct($attributes);
        if(Session::get("lang","fa") == "en")
            $this->table = "variables";
        else
            $this->table = "en_variables";
    }

}