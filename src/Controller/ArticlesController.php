<?php


namespace App\Controller;


// Deal with /articles/... requests.
class ArticlesController extends AppController
{
    public function initialize(): void
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        $this->loadComponent('Paginator');
        // A component for one-time notification.
        $this->loadComponent('Flash');
    }

    public function index(){
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

    public function add(){
        $article=$this->Articles->newEmptyEntity();
        // In the second request (POST),
        // save request form data on DB.
        if ($this->request->is('post')) {
            // patchEntity(): marshals the POST data into Article entity.
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            // Hardcoding for test
            $article->user_id=1;
            if ($this->Articles->save($article)) {
                // $this->Flash->render() displays flash message in a view.
                $this->Flash->success(__('Your article has been saved.'));
                // Send back to /articles/index.
                return $this->redirect(['action'=>'index']);
            }
            // If failed to save(), show the error message.
            $this->Flash->error(__('Unable to add your article.'));
        }
        // In the first request (GET),
        // pass add.php $article. A user will enter new title and body and POST to here.
        $this->set('article', $article);
    }
}
