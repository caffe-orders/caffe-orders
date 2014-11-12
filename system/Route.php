<?php

class Route
{
    static function start()
    {
        // контроллер и действие по умолчанию
        $controller_name = 'main';
        $action_name = 'index';
        $action_parametr = null;
        $routes = explode('/', $_SERVER['REQUEST_URI']);

        // получаем имя контроллера
        if ( !empty($routes[1]) )
        {	
            $controller_name = strtolower($routes[1]);            
        }
        
        // получаем имя экшена
        if ( !empty($routes[2]) )
        {
            $action_name = strtolower($routes[2]);
        }
        
        if ( !empty($routes[3]) )
        {
            $action_parametr = $routes[3];
        }

        // добавляем префиксы
        $model_name = 'Model_'.$controller_name;
        $controller_name = 'Controller_'.$controller_name;
        $action_name = 'action_'.$action_name;
        
        // подцепляем файл с классом модели (файла модели может и не быть)
        
        $model_file = strtolower($model_name).'.php';
        $model_path = APPPATH."classes/models/".$model_file;
        if(file_exists($model_path))
        {
            include APPPATH."classes/models/".$model_file;
        }

        // подцепляем файл с классом контроллера
        $controller_file = $controller_name.'.php';
        $controller_path = APPPATH."classes/controller/".$controller_file;
        if(file_exists($controller_path))
        {
            include APPPATH."classes/controller/".$controller_file;
        }
        else
        {
            /*
            правильно было бы кинуть здесь исключение,
            но для упрощения сразу сделаем редирект на страницу 404
            */
            Route::ErrorPage404();
        }
        
        // создаем контроллер
        $controller = new $controller_name;
        $action = $action_name;
        
        if(method_exists($controller, $action))
        {
            // вызываем действие контроллера
            $controller->$action($action_parametr);
        }
        else
        {
            // здесь также разумнее было бы кинуть исключение
            Route::ErrorPage404();
        }
    
    }
    
    static function ErrorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404');
    }
}
