<?php

class CFrontController
{

    public function run()
    {
        $path = $_SERVER['REQUEST_URI'];

        $method = $_SERVER['REQUEST_METHOD'];

        $resource = explode('/', $path);

        array_shift($resource);
        array_shift($resource);


        $controller = "C" . $resource[0];
        $directory = "Control";
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
                header("Location: /Ambulacare/Pages/smarty_class.php"); //temp
            }
        } else {
            header("Location: /Ambulacare/Pages/smarty_class.php"); //temp
        }
    }
}
