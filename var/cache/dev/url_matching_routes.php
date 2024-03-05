<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/admin/tricks' => [[['_route' => 'admin_tricks', '_controller' => 'App\\Controller\\AdminController::showTricks'], null, null, null, true, false, null]],
        '/admin/comments' => [[['_route' => 'admin_comments', '_controller' => 'App\\Controller\\AdminController::showComments'], null, null, null, false, false, null]],
        '/avatar' => [[['_route' => 'admin_avatar', '_controller' => 'App\\Controller\\AdminController::userAvatar'], null, null, null, false, false, null]],
        '/admin' => [[['_route' => 'app_admin', '_controller' => 'App\\Controller\\AdminController::index'], null, null, null, false, false, null]],
        '/testmail0' => [[['_route' => 'test_mail0', '_controller' => 'App\\Controller\\MailController::test0'], null, null, null, false, false, null]],
        '/testmail' => [[['_route' => 'test_mail', '_controller' => 'App\\Controller\\MailController::test'], null, null, null, false, false, null]],
        '/register' => [[['_route' => 'app_register', '_controller' => 'App\\Controller\\RegisterController::register'], null, null, null, false, false, null]],
        '/verify/email' => [[['_route' => 'app_register_verif', '_controller' => 'App\\Controller\\RegisterController::verifyUserEmail'], null, null, null, false, false, null]],
        '/reset-password' => [[['_route' => 'app_forgot_password_request', '_controller' => 'App\\Controller\\ResetPasswordController::request'], null, null, null, false, false, null]],
        '/reset-password/check-email' => [[['_route' => 'app_check_email', '_controller' => 'App\\Controller\\ResetPasswordController::checkEmail'], null, null, null, false, false, null]],
        '/trick/new' => [[['_route' => 'new_trick', '_controller' => 'App\\Controller\\TrickController::form'], null, null, null, false, false, null]],
        '/tricks' => [[['_route' => 'app_tricks', '_controller' => 'App\\Controller\\TrickController::home'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'app_empty', '_controller' => 'App\\Controller\\TrickController::index'], null, null, null, false, false, null]],
        '/home' => [[['_route' => 'app_home', '_controller' => 'App\\Controller\\TrickController::index'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\UserController::login'], null, null, null, false, false, null]],
        '/user' => [[['_route' => 'app_user', '_controller' => 'App\\Controller\\UserController::user'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\UserController::logout'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/(?'
                        .'|font/([^/\\.]++)\\.woff2(*:98)'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:134)'
                                .'|router(*:148)'
                                .'|exception(?'
                                    .'|(*:168)'
                                    .'|\\.css(*:181)'
                                .')'
                            .')'
                            .'|(*:191)'
                        .')'
                    .')'
                .')'
                .'|/a(?'
                    .'|dmin/(?'
                        .'|tricks(?:/([^/]++))?(*:235)'
                        .'|comments(?:/([^/]++))?(*:265)'
                    .')'
                    .'|vatar/([^/]++)(*:288)'
                .')'
                .'|/reset\\-password/reset(?:/([^/]++))?(*:333)'
                .'|/t(?'
                    .'|rick/([^/]++)(?'
                        .'|/(?'
                            .'|edit(?'
                                .'|(*:373)'
                                .'|/([^/]++)(*:390)'
                            .')'
                            .'|del(?'
                                .'|tag/([^/]++)(*:417)'
                                .'|media/([^/]++)(*:439)'
                            .')'
                        .')'
                        .'|(*:449)'
                    .')'
                    .'|ag/([^/]++)(?'
                        .'|(*:472)'
                        .'|/edit(*:485)'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        98 => [[['_route' => '_profiler_font', '_controller' => 'web_profiler.controller.profiler::fontAction'], ['fontName'], null, null, false, false, null]],
        134 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        148 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        168 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        181 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        191 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        235 => [[['_route' => 'admin_tricksId', 'id' => null, '_controller' => 'App\\Controller\\AdminController::showTricks'], ['id'], null, null, false, true, null]],
        265 => [[['_route' => 'admin_commentsId', 'id' => null, '_controller' => 'App\\Controller\\AdminController::showComments'], ['id'], null, null, false, true, null]],
        288 => [[['_route' => 'admin_avatar_select', '_controller' => 'App\\Controller\\AdminController::avatar'], ['avatar'], null, null, false, true, null]],
        333 => [[['_route' => 'app_reset_password', 'token' => null, '_controller' => 'App\\Controller\\ResetPasswordController::reset'], ['token'], null, null, false, true, null]],
        373 => [[['_route' => 'edit_trick', '_controller' => 'App\\Controller\\TrickController::formEdit'], ['id'], null, null, false, false, null]],
        390 => [[['_route' => 'edit_trick_img', '_controller' => 'App\\Controller\\TrickController::setFirstImage'], ['id', 'mediaId'], null, null, false, true, null]],
        417 => [[['_route' => 'del_tag', '_controller' => 'App\\Controller\\TrickController::delTag'], ['id', 'tagId'], null, null, false, true, null]],
        439 => [[['_route' => 'del_media', '_controller' => 'App\\Controller\\TrickController::delMedia'], ['id', 'mediaId'], null, null, false, true, null]],
        449 => [[['_route' => 'show_trick', '_controller' => 'App\\Controller\\TrickController::show'], ['slug'], null, null, false, true, null]],
        472 => [[['_route' => 'show_tag', '_controller' => 'App\\Controller\\TrickTagsController::show'], ['id'], null, null, false, true, null]],
        485 => [
            [['_route' => 'edit_tag', '_controller' => 'App\\Controller\\TrickTagsController::form'], ['id'], null, null, false, false, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
