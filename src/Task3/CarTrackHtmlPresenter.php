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

        $result = [];
        $cars = $track->cars;

        $lapLength= "Длинна круга  - ". $track->lapLength."км <br>"; //дов
        $lapsNumber= "Колличество кругов  - ".$track->lapsNumber."<br>"; //кі

        $result[] = "<div style='width: 80%'; 'display' = 'block'; 'margin':'0 auto'>";
        //$result[] = $cars;
        $result[] = $lapLength;
        $result[] = $lapsNumber;
        $result[] = "</div>";
        $result[] = "<h1 style='text-align: center'>Участники заезда</h1>";
        $cars = $track->cars;
        $result[] = "<div style='width: 80% ; display:block; margin: 0 auto'>";

        foreach ($cars as $car){

            $result[] = "<div style='width: 30% ; display:inline-block; margin : 5px' >";
            $result[] = "Бренд - <h3 style='display: inline-block''>".$car->name."</h3>";
            $result[] = "<img src=\"{$car->image}\">";
            $result[] = "Характеристики<br>";
            $result[] = "Скорость: ".$car->speed."км/час<br>";
            $result[] = "Расход: ".$car->fuelConsumption."л/100км<br>";
            $result[] = "Время заправки: ".$car->pitStopTime."<br>";
            $result[] = $car->name.": ".$car->speed.", ".$car->pitStopTime;
            //([\w\s-]+)\: (\d+), (\d+)
            $result[] ="<br>";
            $result[] = "Емкость бака: ".$car->fuelTankVolume."<br>";
            $result[] = "</div>";
        }
        $result[] = "</div>";

        $win = $track->run();
        $result[] = "<h2 style='text-align: center'>Победитель - ".$win->name."</h2>";
        $str ="";
        //var_dump($result);
        foreach ($result as $res) {
            $str .= $res;
        }
        return $str;
    }
}