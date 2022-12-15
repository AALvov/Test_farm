<?php

abstract class animal
{
    public $animalID = 0;

    abstract function getFood();
}

class chicken extends animal
{

    public function __construct($id)
    {
        $this->animalID = $id;
    }

    public function getFood()
    {
        return rand(0, 1);
    }
}

class cow extends animal
{

    public function __construct($id)
    {
        $this->animalID = $id;
    }

    public function getFood()
    {
        return rand(8, 12);
    }
}

class farm
{
    static $id = 0;
    public $stable = [
        'chicken' => [],
        'cow' => [],
    ];
    public $food = [
        'eggs' => 0,
        'milk' => 0
    ];

    public function createChicken()
    {
        $id = ++Farm::$id;
        $this->stable['chicken'][] = new chicken($id);
    }

    public function createCow()
    {
        $id = ++Farm::$id;
        $this->stable['cow'][] = new cow($id);
    }

    public function getAllFood()
    {
        foreach ($this->stable['chicken'] as $chicken) {
            $this->food['eggs'] += $chicken->getFood();
        }
        foreach ($this->stable['cow'] as $cow) {
            $this->food['milk'] += $cow->getFood();
        }
    }
}


//создание фермы
$farm = new farm;

//20 куриц и 10 коров
for ($i = 1; $i <= 20; $i++) {
    $farm->createChicken();
    if ($i <= 10) {
        $farm->createCow();
    }
}

echo 'Сейчас на ферме ' . count($farm->stable['chicken']) . ' куриц и ' . count($farm->stable['cow']) . ' коров' . PHP_EOL;

//сбор продукции 7 раз
for ($i = 1; $i <= 7; $i++) {
    $farm->getAllFood();
}

echo 'За неделю собрано ' . $farm->food['eggs'] . ' яиц и ' . $farm->food['milk'] . ' литров молока' . PHP_EOL;


//5 куриц и 1 корова
for ($i = 1; $i <= 5; $i++) {
    $farm->createChicken();
    if ($i == 1) {
        $farm->createCow();
    }
}

echo 'Сейчас на ферме ' . count($farm->stable['chicken']) . ' куриц и ' . count($farm->stable['cow']) . ' коров' . PHP_EOL;

//сбор продукции 7 раз
for ($i = 1; $i <= 7; $i++) {
    $farm->getAllFood();
}

echo 'За неделю собрано ' . $farm->food['eggs'] . ' яиц и ' . $farm->food['milk'] . ' литров молока' . PHP_EOL;

