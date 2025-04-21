<?php

namespace App\Controllers;

use Core\Controller;

use App\Models\FruitModel;

class FruitsController extends Controller
{
    public function __construct(private FruitModel $fruitModel)
    {
    }

    public function index()
    {
        $fruits = $this->fruitModel->getAllRows();

        $this->view([
            'view' => 'fruits',
            'title' => 'Fruits - Example',
            'fruits' => $fruits
        ]);
    }
}