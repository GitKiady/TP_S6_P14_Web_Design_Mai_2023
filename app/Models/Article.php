<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    use HasFactory;

    protected $table="article";
    protected $primaryKey = "id";

    public static function deleteArticle($idarticle) {
        $sql = "UPDATE article SET isvalide=false WHERE id=$idarticle";

        return DB::update($sql);        
    }

    public static function selectById($idarticle) {
        $sql = "SELECT * FROM v_articles WHERE id=$idarticle";

        return DB::select($sql);
    }

    public static function updateArticle($id,$titre,$description,$keyword,$idcategorie,$contenue) {
        $sql = "UPDATE article SET titre='$titre', description='$description', keyword='$keyword',  idcategorie=$idcategorie, contenue='$contenue' WHERE id=$id";

        return DB::update($sql);
    }

    public static function insert($titre,$content,$categorie,$keyword,$description,$image) {
        $sql = "INSERT INTO article(titre,contenue,idcategorie,keyword,description,image) VALUES ($titre,$content,$categorie,$keyword,$description,$image)";

        return Article::insert($sql);
    }

    public static function list() {
        $sql = 'SELECT * FROM v_articles_valide';

        return DB::select($sql);
    }
}
