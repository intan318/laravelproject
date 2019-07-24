<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mhs extends Model
{
    protected $fillable=['nama','nim', 'nilai','semester', 'no_hp', 'email', 'alamat'];
}
