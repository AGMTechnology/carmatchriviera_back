<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    'api_genid' => [['id'], ['_controller' => 'api_platform.action.not_exposed', '_api_respond' => 'true'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/.well-known/genid']], [], [], []],
    'api_entrypoint' => [['index', '_format'], ['_controller' => 'api_platform.action.entrypoint', '_format' => '', '_api_respond' => 'true', 'index' => 'index'], ['index' => 'index'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', 'index', 'index', true], ['text', '/api']], [], [], []],
    'api_doc' => [['_format'], ['_controller' => 'api_platform.action.documentation', '_format' => '', '_api_respond' => 'true'], [], [['variable', '.', '[^/]++', '_format', true], ['text', '/api/docs']], [], [], []],
    'api_jsonld_context' => [['shortName', '_format'], ['_controller' => 'api_platform.jsonld.action.context', '_format' => 'jsonld', '_api_respond' => 'true'], ['shortName' => '[^.]+', '_format' => 'jsonld'], [['variable', '.', 'jsonld', '_format', true], ['variable', '/', '[^.]+', 'shortName', true], ['text', '/api/contexts']], [], [], []],
    '_api_errors_problem' => [['status'], ['_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'ApiPlatform\\State\\ApiResource\\Error', '_api_operation_name' => '_api_errors_problem'], [], [['variable', '/', '[^/]++', 'status', true], ['text', '/api/errors']], [], [], []],
    '_api_errors_hydra' => [['status'], ['_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'ApiPlatform\\State\\ApiResource\\Error', '_api_operation_name' => '_api_errors_hydra'], [], [['variable', '/', '[^/]++', 'status', true], ['text', '/api/errors']], [], [], []],
    '_api_errors_jsonapi' => [['status'], ['_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'ApiPlatform\\State\\ApiResource\\Error', '_api_operation_name' => '_api_errors_jsonapi'], [], [['variable', '/', '[^/]++', 'status', true], ['text', '/api/errors']], [], [], []],
    '_api_validation_errors_problem' => [['id'], ['_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'ApiPlatform\\Symfony\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_problem'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/validation_errors']], [], [], []],
    '_api_validation_errors_hydra' => [['id'], ['_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'ApiPlatform\\Symfony\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_hydra'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/validation_errors']], [], [], []],
    '_api_validation_errors_jsonapi' => [['id'], ['_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'ApiPlatform\\Symfony\\Validator\\Exception\\ValidationException', '_api_operation_name' => '_api_validation_errors_jsonapi'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/validation_errors']], [], [], []],
    '_api_/cars/{id}{._format}_get' => [['id', '_format'], ['_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Car', '_api_operation_name' => '_api_/cars/{id}{._format}_get'], [], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '[^/\\.]++', 'id', true], ['text', '/api/cars']], [], [], []],
    '_api_/cars{._format}_get_collection' => [['_format'], ['_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Car', '_api_operation_name' => '_api_/cars{._format}_get_collection'], [], [['variable', '.', '[^/]++', '_format', true], ['text', '/api/cars']], [], [], []],
    '_api_/cars{._format}_post' => [['_format'], ['_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Car', '_api_operation_name' => '_api_/cars{._format}_post'], [], [['variable', '.', '[^/]++', '_format', true], ['text', '/api/cars']], [], [], []],
    '_api_/cars/{id}{._format}_put' => [['id', '_format'], ['_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Car', '_api_operation_name' => '_api_/cars/{id}{._format}_put'], [], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '[^/\\.]++', 'id', true], ['text', '/api/cars']], [], [], []],
    '_api_/cars/{id}{._format}_patch' => [['id', '_format'], ['_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Car', '_api_operation_name' => '_api_/cars/{id}{._format}_patch'], [], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '[^/\\.]++', 'id', true], ['text', '/api/cars']], [], [], []],
    '_api_/cars/{id}{._format}_delete' => [['id', '_format'], ['_controller' => 'api_platform.symfony.main_controller', '_format' => null, '_stateless' => true, '_api_resource_class' => 'App\\Entity\\Car', '_api_operation_name' => '_api_/cars/{id}{._format}_delete'], [], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '[^/\\.]++', 'id', true], ['text', '/api/cars']], [], [], []],
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], [], []],
    'app_mailer_sendemail' => [[], ['_controller' => 'App\\Controller\\MailerController::sendEmail'], [], [['text', '/email']], [], [], []],
    'app_mailer_sendsearchemail' => [[], ['_controller' => 'App\\Controller\\MailerController::sendSearchEmail'], [], [['text', '/searchRequest']], [], [], []],
    'edit_car_by_id' => [['id'], ['_controller' => 'App\\Controller\\UploadController::edit'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/edit']], [], [], []],
    'app_upload_upload' => [[], ['_controller' => 'App\\Controller\\UploadController::upload'], [], [['text', '/upload']], [], [], []],
    'get_all_cars' => [[], ['_controller' => 'App\\Controller\\UploadController::getAllCars'], [], [['text', '/get_cars']], [], [], []],
    'get_car_by_id' => [['id'], ['_controller' => 'App\\Controller\\UploadController::getCar'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/get_car']], [], [], []],
    'App\Controller\MailerController::sendEmail' => [[], ['_controller' => 'App\\Controller\\MailerController::sendEmail'], [], [['text', '/email']], [], [], []],
    'App\Controller\MailerController::sendSearchEmail' => [[], ['_controller' => 'App\\Controller\\MailerController::sendSearchEmail'], [], [['text', '/searchRequest']], [], [], []],
    'App\Controller\UploadController::edit' => [['id'], ['_controller' => 'App\\Controller\\UploadController::edit'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/edit']], [], [], []],
    'App\Controller\UploadController::upload' => [[], ['_controller' => 'App\\Controller\\UploadController::upload'], [], [['text', '/upload']], [], [], []],
    'App\Controller\UploadController::getAllCars' => [[], ['_controller' => 'App\\Controller\\UploadController::getAllCars'], [], [['text', '/get_cars']], [], [], []],
    'App\Controller\UploadController::getCar' => [['id'], ['_controller' => 'App\\Controller\\UploadController::getCar'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/get_car']], [], [], []],
];
