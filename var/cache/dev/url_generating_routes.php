<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], [], []],
    '_wdt' => [['token'], ['_controller' => 'web_profiler.controller.profiler::toolbarAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_wdt']], [], [], []],
    '_profiler_home' => [[], ['_controller' => 'web_profiler.controller.profiler::homeAction'], [], [['text', '/_profiler/']], [], [], []],
    '_profiler_search' => [[], ['_controller' => 'web_profiler.controller.profiler::searchAction'], [], [['text', '/_profiler/search']], [], [], []],
    '_profiler_search_bar' => [[], ['_controller' => 'web_profiler.controller.profiler::searchBarAction'], [], [['text', '/_profiler/search_bar']], [], [], []],
    '_profiler_phpinfo' => [[], ['_controller' => 'web_profiler.controller.profiler::phpinfoAction'], [], [['text', '/_profiler/phpinfo']], [], [], []],
    '_profiler_xdebug' => [[], ['_controller' => 'web_profiler.controller.profiler::xdebugAction'], [], [['text', '/_profiler/xdebug']], [], [], []],
    '_profiler_font' => [['fontName'], ['_controller' => 'web_profiler.controller.profiler::fontAction'], [], [['text', '.woff2'], ['variable', '/', '[^/\\.]++', 'fontName', true], ['text', '/_profiler/font']], [], [], []],
    '_profiler_search_results' => [['token'], ['_controller' => 'web_profiler.controller.profiler::searchResultsAction'], [], [['text', '/search/results'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_open_file' => [[], ['_controller' => 'web_profiler.controller.profiler::openAction'], [], [['text', '/_profiler/open']], [], [], []],
    '_profiler' => [['token'], ['_controller' => 'web_profiler.controller.profiler::panelAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_router' => [['token'], ['_controller' => 'web_profiler.controller.router::panelAction'], [], [['text', '/router'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_exception' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::body'], [], [['text', '/exception'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_exception_css' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::stylesheet'], [], [['text', '/exception.css'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    'app_admin' => [[], ['_controller' => 'App\\Controller\\AdminController::index'], [], [['text', '/admin']], [], [], []],
    'admin_tricks' => [[], ['_controller' => 'App\\Controller\\AdminController::showTricks'], [], [['text', '/admin/tricks/']], [], [], []],
    'admin_tricksId' => [['id'], ['id' => null, '_controller' => 'App\\Controller\\AdminController::showTricks'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/admin/tricks']], [], [], []],
    'admin_comments' => [[], ['_controller' => 'App\\Controller\\AdminController::showComments'], [], [['text', '/admin/comments']], [], [], []],
    'admin_commentsId' => [['id'], ['id' => null, '_controller' => 'App\\Controller\\AdminController::showComments'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/admin/comments']], [], [], []],
    'app_empty' => [[], ['_controller' => 'App\\Controller\\HomeController::index'], [], [['text', '/']], [], [], []],
    'app_home' => [[], ['_controller' => 'App\\Controller\\HomeController::index'], [], [['text', '/home']], [], [], []],
    'app_register' => [[], ['_controller' => 'App\\Controller\\RegisterController::register'], [], [['text', '/register']], [], [], []],
    'app_register_verif' => [[], ['_controller' => 'App\\Controller\\RegisterController::verifyUserEmail'], [], [['text', '/verify/email']], [], [], []],
    'app_forgot_password_request' => [[], ['_controller' => 'App\\Controller\\ResetPasswordController::request'], [], [['text', '/reset-password']], [], [], []],
    'app_check_email' => [[], ['_controller' => 'App\\Controller\\ResetPasswordController::checkEmail'], [], [['text', '/reset-password/check-email']], [], [], []],
    'app_reset_password' => [['token'], ['token' => null, '_controller' => 'App\\Controller\\ResetPasswordController::reset'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/reset-password/reset']], [], [], []],
    'new_trick' => [[], ['_controller' => 'App\\Controller\\TrickController::form'], [], [['text', '/trick/new']], [], [], []],
    'edit_trick' => [['id'], ['_controller' => 'App\\Controller\\TrickController::form'], [], [['text', '/edit'], ['variable', '/', '[^/]++', 'id', true], ['text', '/trick']], [], [], []],
    'show_trick' => [['slug'], ['_controller' => 'App\\Controller\\TrickController::show'], [], [['variable', '/', '[^/]++', 'slug', true], ['text', '/trick']], [], [], []],
    'app_tricks' => [[], ['_controller' => 'App\\Controller\\TrickController::index'], [], [['text', '/tricks']], [], [], []],
    'app_login' => [[], ['_controller' => 'App\\Controller\\UserController::login'], [], [['text', '/login']], [], [], []],
    'app_userPage' => [[], ['_controller' => 'App\\Controller\\UserController::userPage'], [], [['text', '/user']], [], [], []],
    'app_logout' => [[], ['_controller' => 'App\\Controller\\UserController::logout'], [], [['text', '/logout']], [], [], []],
    'App\Controller\AdminController::index' => [[], ['_controller' => 'App\\Controller\\AdminController::index'], [], [['text', '/admin']], [], [], []],
    'App\Controller\RegisterController::register' => [[], ['_controller' => 'App\\Controller\\RegisterController::register'], [], [['text', '/register']], [], [], []],
    'App\Controller\RegisterController::verifyUserEmail' => [[], ['_controller' => 'App\\Controller\\RegisterController::verifyUserEmail'], [], [['text', '/verify/email']], [], [], []],
    'App\Controller\ResetPasswordController::request' => [[], ['_controller' => 'App\\Controller\\ResetPasswordController::request'], [], [['text', '/reset-password']], [], [], []],
    'App\Controller\ResetPasswordController::checkEmail' => [[], ['_controller' => 'App\\Controller\\ResetPasswordController::checkEmail'], [], [['text', '/reset-password/check-email']], [], [], []],
    'App\Controller\ResetPasswordController::reset' => [['token'], ['token' => null, '_controller' => 'App\\Controller\\ResetPasswordController::reset'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/reset-password/reset']], [], [], []],
    'App\Controller\TrickController::show' => [['slug'], ['_controller' => 'App\\Controller\\TrickController::show'], [], [['variable', '/', '[^/]++', 'slug', true], ['text', '/trick']], [], [], []],
    'App\Controller\TrickController::index' => [[], ['_controller' => 'App\\Controller\\TrickController::index'], [], [['text', '/tricks']], [], [], []],
    'App\Controller\UserController::login' => [[], ['_controller' => 'App\\Controller\\UserController::login'], [], [['text', '/login']], [], [], []],
    'App\Controller\UserController::userPage' => [[], ['_controller' => 'App\\Controller\\UserController::userPage'], [], [['text', '/user']], [], [], []],
    'App\Controller\UserController::logout' => [[], ['_controller' => 'App\\Controller\\UserController::logout'], [], [['text', '/logout']], [], [], []],
];
