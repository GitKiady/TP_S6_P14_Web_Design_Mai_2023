<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public static function login() {
        $pseudo = $_POST['username'];
        $mot_de_passe = $_POST['password'];

        $result = Admin::login($pseudo,$mot_de_passe);

        if(count($result) != 0) {
            return redirect('/list/article');
        } else {
            return redirect('/');
        }



    }
}
