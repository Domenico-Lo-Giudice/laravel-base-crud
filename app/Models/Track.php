<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;

    public function getAbstract($char = 30) {
        return substr($this->album, 0, $chars);

    }
}
