<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Article;
use App\Models\Categorie;

class ArticleController extends Controller
{

    public static function submitDeleteArticle($id) {

        Article::deleteArticle($id);

        return redirect('list/article');
    }

    public static function showUpdateArticle($idarticle) {

        $data = [];
        $data['article'] = Article::selectById($idarticle);
        $data['categories'] = Categorie::list();

        return view('content/update-article')->with($data);
    }

    public static function submitUpdateArticle() {
        $id = $_POST['id'];
        $titre = $_POST['titre'];
        $content = $_POST['content'];
        $categorie = $_POST['categorie'];
        $keyword = $_POST['keyword'];
        $description = $_POST['description'];

        Article::updateArticle($id,$titre,$description,$keyword,$categorie,$content);

        return redirect('list/article');


    }

    public static function showInsertArticle() {

        $data = [];
        $data['categories'] = Categorie::list();

        return view('content/insert-article')->with($data);
    }

    public static function insert(Request $request) {
        $titre = $_POST['titre'];
        $content = $_POST['content'];
        $categorie = $_POST['categorie'];
        $keyword = $_POST['keyword'];
        $description = $_POST['description'];

        // upload image
        $request->validate([
        'image' => 'required|image|max:2048',
        ]);

        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();

        Storage::disk('public')->putFileAs('images', $image, $filename);

        $image_path = '/storage/images/' . $filename;
        // end upload image


        Article::insert($titre,$content,$categorie,$keyword,$description,$image_path);

        return redirect('list/article');
    }

    public static function list() {

        $data = [];
        $data['articles'] = Article::list();

        return view('content/list-article')->with($data);
    }
}
