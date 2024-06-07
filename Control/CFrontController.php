<?php

class CFrontController
{

    public function run()
    {

/*         echo '<h1>Test (dal frontController)</h1>';

        echo '<p>Sul front controller va inserita la logica per chiamre i giusti controllori </p>';

        echo '<h2>Vedi che alla fine ho dovuto rifare controlli GRRRRRRRRR</h2>';

        echo $_SERVER['REQUEST_URI']; */

        $path = $_SERVER['REQUEST_URI'];

        $method = $_SERVER['REQUEST_METHOD'];

        $resource = explode('/', $path);

        array_shift($resource);
        array_shift($resource);

        /* var_dump($resource); */


        $controller = "C" . $resource[0];
        $dir = 'Control';
        $eledir = scandir($dir);
        
        
    }
}
