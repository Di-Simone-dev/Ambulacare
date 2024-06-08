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
        $directory = "Controller";
        $scanDir = scandir($directory);

        if (in_array($controller . ".php", $scanDir)) {
            if (isset($result[1])) {
                $method = $resource[1];

                if (method_exists($controller, $method)) {
                    $param = array();
                    for ($i = 2; $i < count($resource); $i++) {
                        $param[] = $resource[$i];
                    }
                    $num = (count($param));
                    if ($num == 0) $controller::$method();
                    else if ($num == 1) $controller::$method($param[0]);
                    else if ($num == 2) $controller::$method($param[0], $param[1]);
                }
            } else {
                USession::getInstance();
                if (CUser::isLogged()) {
                    header('Location: /Agora/User/home');
                } else {
                    header('Location: /Agora/User/home');
                }
            }
        } else {
            USession::getInstance();
            if (CUser::isLogged()) {
                header('Location: /Agora/User/home');
            } else {
                header('Location: /Agora/User/home');
            }
        }
    }
}
