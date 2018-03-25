<?php

namespace App\Controller;


use App\Model\ArticleModel;
use App\Model\SearchModel;
use App\Model\UserModel;
use Core\BaseController;
use Core\Helpers;
use Core\Response;

class AdminController extends BaseController
{

    public function index()
    {
        $this->layout->setBaseView('base');
        $this->layout->setTitle('Управление');

        $this->layout->addStyle('search/index');
        $this->layout->addStyle('admin/index');

        $model = new SearchModel();

        $users = $model->findAllUsers();
        $articles = $model->findAllArticles();

        return $this->render('admin/index', [
            'users' => $users,
            'items' => $articles
        ]);
    }

    public function editUser($id = null, $data = [], $errors = [])
    {
        if (isset($_GET['id']) && empty($_GET['id'])) {
            return Helpers::renderNotFound();
        }

        $this->layout->setBaseView('base');

        if (!is_null($id)) {
            $this->layout->setTitle('Редактирование автора');

            $model = new UserModel();

            if (!count($errors)) {
                $data = $model->findUserById($id);

                if (!$data) {
                    return Helpers::renderNotFound();
                }
            }
        } else {
            $this->layout->setTitle('Создание автора');
        }

        $this->layout->addStyle('admin/edit/article');

        $users = (new SearchModel())->findAllUsers();

        return $this->render('admin/edit/user', [
            'data' => $data,
            'errors' => $errors,
            'users' => $users
        ]);
    }

    public function saveUser()
    {
        $model = new UserModel();

        $errors = $model->validate($_POST);
        $response = new Response();

        if (count($errors) > 0) {
            $id = null;

            if (!empty($_POST['id'])) {
                $id = $_POST['id'];
            }

            return $this->editUser($id, $_POST, $errors);
        }

        $model->saveUser($_POST);
        $response->setRedirect('/admin');

        return $response;
    }

    public function deleteUser($id)
    {
        $model = new UserModel();

        if ($model->deleteUser($id)) {
            $response = new Response();

            $response->setRedirect('/admin');

            return $response;
        }
    }

    public function editArticle($id = null, $data = [], $errors = [])
    {
        if (isset($_GET['id']) && empty($_GET['id'])) {
            return Helpers::renderNotFound();
        }

        $this->layout->setBaseView('base');

        if (!is_null($id)) {
            $this->layout->setTitle('Редактирование новости');

            $model = new ArticleModel();

            if (!count($errors)) {
                $data = $model->findArticleById($id);

                if (!$data) {
                    return Helpers::renderNotFound();
                }
            }
        } else {
            $this->layout->setTitle('Создание новости');
        }

        $this->layout->addStyle('admin/edit/article');

        $users = (new SearchModel())->findAllUsers();

        return $this->render('admin/edit/article', [
            'data' => $data,
            'errors' => $errors,
            'users' => $users
        ]);
    }

    public function saveArticle()
    {
        $model = new ArticleModel();

        $errors = $model->validate($_POST);
        $response = new Response();

        if (count($errors) > 0) {
            $id = null;

            if (!empty($_POST['id'])) {
                $id = $_POST['id'];
            }

            return $this->editArticle($id, $_POST, $errors);
        }

        $model->saveArticle($_POST);
        $response->setRedirect('/admin');

        return $response;
    }

    public function deleteArticle($id)
    {
        $model = new ArticleModel();

        if ($model->deleteArticle($id)) {
            $response = new Response();

            $response->setRedirect('/admin');

            return $response;
        }
    }

}