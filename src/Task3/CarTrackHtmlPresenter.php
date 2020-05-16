<?php

declare(strict_types=1);

namespace App\Task3;

use App\Task1\Car;
use App\Task1\Track;
use App\Task1\CarAdd;
class CarTrackHtmlPresenter
{
    public function present(Track $track): string
    {
        //@todo
        $track->add( new Car(
            1,
            'https://pbs.twimg.com/profile_images/595409436585361408/aFJGRaO6_400x400.jpg',
            'BMW',
            250, //speed
            10, //$pitStopTime
            5, //$fuelConsumption
            15 //$fuelTankVolume
        ));
        $track->add( new Car(
            2,
            'https://i.pinimg.com/originals/e4/15/83/e41583f55444b931f4ba2f0f8bce1970.jpg',
            'Tesla',
            200, //speed
            5, //$pitStopTime
            5.3, //$fuelConsumption
            12 //$fuelTankVolume
        ));
        $track->add( new Car(
            3,
            'https://fordsalomao.com.br/wp-content/uploads/2019/02/1499441577430-1-1024x542-256x256.jpg',
            'Ford',
            220, //speed
            5, //$pitStopTime
            6.1, //$fuelConsumption
            18.5 //$fuelTankVolume
        ));
    
        $cars = $track->all();

        $result = [];

        $lapLength= "Длинна круга  - ". $track->getLapLength()."км <br>"; //дов
        $lapsNumber= "Колличество кругов  - ".$track->getLapsNumber()."<br>"; //кі

        $result[] = "<div style='width: 80%'; 'display' = 'block'; 'margin':'0 auto'>";
        //$result[] = $cars;
        $result[] = $lapLength;
        $result[] = $lapsNumber;
        $result[] = "</div>";
        $result[] = "<h1 style='text-align: center'>Участники заезда</h1>";
        $cars = $track->all();
        $result[] = "<div style='width: 80% ; display:block; margin: 0 auto'>";

        foreach ($cars as $car){

            $result[] = "<div style='width: 30% ; display:inline-block; margin : 5px' >";
            $result[] = "Бренд - <h3 style='display: inline-block''>".$car->getName()."</h3>";
            $result[] = "<img src=\"{$car->getImage()}\">";
            $result[] = "Характеристики<br>";
            $result[] = "Скорость: ".$car->getSpeed()."км/час<br>";
            $result[] = "Расход: ".$car->getFuelConsumption()."л/100км<br>";
            $result[] = "Время заправки: ".$car->getPitStopTime()."<br>";
            $result[] = $car->getName().": ".$car->getSpeed().", ".$car->getPitStopTime();
            //([\w\s-]+)\: (\d+), (\d+)
            $result[] ="<br>";
            $result[] = "Емкость бака: ".$car->getFuelTankVolume()."<br>";
            $result[] = "</div>";
        }
        $result[] = "</div>";

        $win = $track->run();
        $result[] = "<h2 style='text-align: center'>Победитель - ".$win->getName()."</h2>";
        $str ="";
        //var_dump($result);
        foreach ($result as $res) {
            $str .= $res;
        }
        return $str;
    }
}