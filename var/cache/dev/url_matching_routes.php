<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/' => [[['_route' => 'api_post_show', '_controller' => 'App\\Controller\\DefaultController::index'], null, ['GET' => 0], null, false, false, null]],
        '/login' => [
            [['_route' => 'login_page', '_controller' => 'App\\Controller\\UserLoginController::loginPage'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'login_form_post', '_controller' => 'App\\Controller\\UserLoginController::loginUser'], null, ['POST' => 0], null, false, false, null],
        ],
        '/register' => [
            [['_route' => 'register_page', '_controller' => 'App\\Controller\\UserLoginController::registerPage'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'register_post', '_controller' => 'App\\Controller\\UserLoginController::registerUser'], null, ['POST' => 0], null, false, false, null],
        ],
        '/tasks' => [[['_route' => 'user_tasks_page', '_controller' => 'App\\Controller\\TaskController::tasksListPage'], null, ['GET' => 0], null, false, false, null]],
        '/new_task' => [
            [['_route' => 'new_task_page', '_controller' => 'App\\Controller\\TaskController::newTaskPage'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'new_task_post', '_controller' => 'App\\Controller\\TaskController::createNewTask'], null, ['POST' => 0], null, false, false, null],
        ],
        '/tasks.csv' => [[['_route' => 'tasks_csv', '_controller' => 'App\\Controller\\TaskController::generateCsvFile'], null, ['GET' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [
            [['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
