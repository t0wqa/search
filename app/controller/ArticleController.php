<?php

namespace App\Controller;


use App\Model\SearchModel;
use Core\BaseController;
use Core\Helpers;

class ArticleController extends BaseController
{

    public function show($id)
    {
        if (isset($_GET['id']) && empty($_GET['id'])) {
            return Helpers::renderNotFound();
        }

        $this->layout->setBaseView('base');

        $this->layout->addStyle('article/show');

        $model = new SearchModel();
        $article = $model->findById($id);

        if (!$article) {
            return Helpers::renderNotFound();
        }

        $this->layout->setTitle($article['title']);

        return $this->render('article/show', [
            'article' => $article
        ]);
    }

}