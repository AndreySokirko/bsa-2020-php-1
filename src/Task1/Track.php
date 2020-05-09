<?php

declare(strict_types=1);

namespace App\Task1;
use App\Task1\CarAdd;
use App\Task1\Car;

class Track
{
public $id;
public $image;
public $name;
public $pitStopTime; //час, необхідний автомобілю на піт-стопі для повної заправки баку, в с
public $speed; //speed
public $fuelConsumption; //витрати бензину на 100км, в л
public $fuelTankVolume; //місткість баку, в л),
public $lapLength; //довжина треку, в км
public $lapsNumber; //кількість кіл)
public $cars = [];
public $time = [];

    public function __construct(float $lapLength, int $lapsNumber)
    {
        //@todo
        $cars = new CarAdd();
        $this->cars = $cars->cars;
        $this->lapLength = $lapLength;
        $this->lapsNumber = $lapsNumber;

    }

    public function getLapLength(): float
    {
        // @todo
        return $this->lapLength;
    }

    public function getLapsNumber(): int
    {
        // @todo
        return $this->lapsNumber;
    }

    public function add(Car $car): void
    {
        // @todo
        $found_key = array_search($car->id, array_column($this->cars, 'id'));
        if($found_key ==false) exit;
        $this->cars[]= [];
        $this->car = new Car(
            1,
            'https://pbs.twimg.com/profile_images/595409436585361408/aFJGRaO6_400x400.jpg',
            'BMW',
            250,
            10,
            5,
            15
        );
    }

    public function all(): array
    {
        // @todo
        $this->cars[]= [];
        return $this->cars;
    }

    public function run(): Car
    {
        // @todo
        //$path = [];
        $path = $this->lapLength * $this->lapsNumber;
//        var_dump($this->cars);
        foreach (  $this->cars as $key => $car ) {
            $time[$key] =0;
            $path_full_tank = ($car->fuelTankVolume * 100) / $car->fuelConsumption;
            if ($path <= $path_full_tank) { //не нужно дозаправляться
                $time[$key] =  $path / $car->speed;
            } else
            {
                while ($path > $path_full_tank) {
                    $time[$key] = $time[$key] + ($path / $car->speed) +  ($car->pitStopTime / 3600);
                    $path = $path - $path_full_tank;
                }
                if ($path < $path_full_tank) {
                    $time[$key] = $time[$key] + ($path / $car->speed);
                }

            }
            $this->time[] =  $time[$key];
        }
        $t=$this->time[0];
        $win = 0;
        //поиск минимального времени заезда
        foreach (  $this->time as $key => $time ) {
            if($t> $time){
                $t=$time;
                $win=$key;
            }
        }
        return $this->cars[$win];

    }
}