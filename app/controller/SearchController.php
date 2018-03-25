<?php

namespace App\Controller;


use App\Model\SearchModel;
use Core\BaseController;

class SearchController extends BaseController
{

    public function index($term = null, $author = null, $dateFrom = null, $dateTill = null)
    {
        $this->layout->setBaseView('base');

        if (!empty($term)) {
            $this->layout->setTitle('Поиск по запросу ' . $term);
        } else {
            $this->layout->setTitle('Поиск');
        }

        $this->layout->addStyle('search/index');
        $this->layout->addScript('search/index');

        $model = new SearchModel();

        $items = $model->search($term, $author, $dateFrom, $dateTill);
        $users = $model->findAllUsers();

        return $this->render('search/index', [
            'term' => $term,
            'items' => $items,
            'users' => $users
        ]);
    }

}