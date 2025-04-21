<?php

namespace App\Controllers;

use Core\Controller;

use App\Models\FruitModel;

class AddFruitController extends Controller
{
    public function __construct(private FruitModel $fruitModel)
    {
    }

    public function index()
    {
        $this->view([
            'view' => 'addfruit',
            'title' => 'Add Fruit - Example'
        ]);
    }

    public function addFruit()
    {
        $name = trim($_POST['name']) ?? null;
        $description = trim($_POST['description']) ?? null;

        if (!$name) {
            $this->view([
                'view' => 'addfruit',
                'title'=> 'Add Fruit - Example',
                'error' => 'Please enter a fruit name.'
            ]);
            return;
        }

        if (!$this->fruitModel->isValidInput($name)) {
            $this->view([
                'view' => 'addfruit',
                'title'=> 'Add Fruit - Example',
                'error' => 'Invalid fruit name.'
            ]);
            return;
        }

        if ($this->fruitModel->rowAlreadyExists($name)) {
            $this->view([
                'view' => 'addfruit',
                'title'=> 'Add Fruit - Example',
                'error' => 'Fruit already exists.'
            ]);
            return;
        }

        try {
            $this->fruitModel->addRow($name, $description);
            $this->view([
                'view' => 'addfruit',
                'title'=> 'Add Fruit - Example',
                'success' => "Fruit \"$name\" added successfully!"
            ]);
        } catch (\Exception $e) {
            $this->view([
                'view' => 'addfruit',
                'title' => 'Add Fruit - Example',
                'error' => 'Failed to add fruit.'
            ]);
        }
    }
}