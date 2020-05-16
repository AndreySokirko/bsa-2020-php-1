<?php

declare(strict_types=1);

namespace App\Task1;
use App\Task1\CarAdd;
use App\Task1\Car;

class Track
{
//private $id;
//private $image;
//private $name;
//private $pitStopTime; //час, необхідний автомобілю на піт-стопі для повної заправки баку, в с
//private $speed; //speed
//private $fuelConsumption; //витрати бензину на 100км, в л
//private $fuelTankVolume; //місткість баку, в л),
private $lapLength; //довжина треку, в км
private $lapsNumber; //кількість кіл)
private $cars = [];

    public function __construct(float $lapLength, int $lapsNumber)
    {
        //@todo
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
//        var_dump($this->cars );

        $this->cars[] = $car;
    }

    public function all(): array
    {
        // @todo
        return $this->cars;
    }

    public function run(): Car
    {
        // @todo
        $allAutos = $this->cars;
        if(count($allAutos) == 0){
            throw new Exception('Отсутствуют автомобили');
        }
        $path = $this->lapLength * $this->lapsNumber;
        $temtTime =0;
        $auto = [];

        foreach ( $allAutos as $key => $car ) {
            $path_full_tank = ($car->getFuelTankVolume() * 100) / $car->getFuelConsumption();
            if ($path <= $path_full_tank) { //не нужно дозаправляться
                $t = (float)$temtTime +($path / $car->getSpeed());
                $n = $car->getName();
                $auto[]=['time'=>$t,'name'=>$n];

            } else
            {
                while ($path > $path_full_tank) {
                    $t  =    $temtTime + ($path_full_tank / $car->getSpeed()) +  ($car->getPitStopTime() / 3600);
                    $path = $path - $path_full_tank;
                    $temtTime = $t;
                    $n = $car->getName();
                    $auto[]=['time'=>$t,'name'=>$n];
                }
                if ($path < $path_full_tank) {
                    $t  = $temtTime  + ($path / $car->getSpeed());
                    $n = $car->getName();
                    $auto[]=['time'=>$t,'name'=>$n];
                }

            }
        }
      //  var_dump($auto);
        //поиск минимального времени заезда
        usort($auto, function($a, $b) {

            return $a['time'] <=> $b['time'];

        });
        $key = array_search($auto[0]['name'], $this->cars); // $key = 2;

        return $this->cars[$key];

    }
}