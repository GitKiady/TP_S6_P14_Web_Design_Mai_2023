<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Admin extends Model
{
    use HasFactory;

    protected $table="admin";

    public static function login($pseudo,$mot_de_passe) {
        $sql = "SELECT * FROM admin WHERE pseudo='$pseudo' AND mot_de_passe='$mot_de_passe'";

        return DB::select($sql);
    }
}
