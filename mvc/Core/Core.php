<?php





include_once "Core/homeController.php";
include_once "Core/testeController.php";

class Core
{
    

    public function __construct()
    {
        $this->run();
    }
    public function run()
    {
        $parametro =[];
        if(isset($_GET['url']))
        {
            $url = $_GET['url'];
            
            
        }

        if(!empty($url))
        {
            $url = explode('/', $url);
            $controller = $url[0].'Controller';

           
           

            
            
            //array_sum($url);

            if(isset($url[1]) && !empty($url[1]))
            {
                $metodo = $url[1];
                //array_shift($url);
                


            }
            else
            {
                $metodo = 'index';
            }

            if (isset($url[2]) > 0)
            {
                $parametro = array($url[2]);
                var_dump($url[2]);
                var_dump($url[2]);
            }
        }else
        {
            $controller = 'homeController';
            $metodo = 'index';
            $parametro =[];

        }

        
        
        $caminho = 'mvc/Core/'.$controller.'.php';

        
        if(!file_exists($caminho) && !method_exists($controller, $metodo))
        {
            $controller = 'homeController';
            $metodo = 'index';
        }
      

        
       
        
        

        $c = new $controller;
       

        call_user_func_array(array($c, $metodo), $parametro);
        
    }
}