<?php

class CFrontController
{

    public function run()
    {

        echo '<h1>Test (dal frontController)</h1>';

        echo '<p>Sul front controller va inserita la logica per chiamre i giusti controllori </p>';

        echo '<h2>Vedi che alla fine ho dovuto rifare controlli GRRRRRRRRR</h2>';

        echo $_SERVER['REQUEST_URI'];
    }
}
