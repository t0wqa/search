<?php

return [
    '' => [
        'controller' => 'Search',
        'method' => 'index'
    ],
    '/search' => [
        'controller' => 'Search',
        'method' => 'index'
    ],
    '/article' => [
        'controller' => 'Article',
        'method' => 'show'
    ],
    '/admin' => [
        'controller' => 'Admin',
        'method' => 'index'
    ],
    '/admin/article/edit' => [
        'controller' => 'Admin',
        'method' => 'editArticle'
    ],
    '/admin/article/save' => [
        'controller' => 'Admin',
        'method' => 'saveArticle'
    ],
    '/admin/article/delete' => [
        'controller' => 'Admin',
        'method' => 'deleteArticle'
    ],
    '/admin/user/edit' => [
        'controller' => 'Admin',
        'method' => 'editUser'
    ],
    '/admin/user/save' => [
        'controller' => 'Admin',
        'method' => 'saveUser'
    ],
    '/admin/user/delete' => [
        'controller' => 'Admin',
        'method' => 'deleteUser'
    ]
];