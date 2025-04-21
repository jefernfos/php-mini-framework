<?php

namespace App\Controllers;

use Core\Controller;

use App\Models\FruitModel;

class FruitController extends Controller
{
    public function __construct(private FruitModel $fruitModel)
    {
    }

    public function index($args)
    {
        $name = urldecode($args['id']) ?? null;

        if (!$name || !$this->fruitModel->isValidInput($name)) {
            header('Location: /404');
            return;
        }

        $fruit = $this->fruitModel->getRow($name);

        if (!$fruit) {
            header('Location: /404');
            return;
        }

        $this->view([
            'view' => 'fruit',
            'title' => "{$fruit['name']} - Example",
            'fruit' => $fruit
        ]);
    }
}