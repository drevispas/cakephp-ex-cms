<?php


namespace App\Controller;


class ArticlesController extends AppController
{
    public function index(){
        $this->loadComponent('Paginator');
        // Pull data from model `Articles`.
        $articles = $this->Paginator->paginate($this->Articles->find());
        // Prepare a view context $articles as a variable name 'articles'.
        $this->set(compact('articles'));
    }

    // view() routes a model to templates/Articles/view.php.
    public function view($slug=null){
        $article=$this->Articles->findBySlug($slug)->firstOrFail();
        $this->set(compact('article'));
    }
}
