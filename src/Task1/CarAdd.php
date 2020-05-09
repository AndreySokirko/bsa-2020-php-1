<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 07.05.2020
 * Time: 20:58
 */
//require __DIR__ . '/vendor/autoload.php';
namespace App\Task1;
use  \App\Task1\Car as Car;

class CarAdd extends Car{

    public $pitStopTime; //час, необхідний автомобілю на піт-стопі для повної заправки баку, в с
    public $speed; //speed
    public $fuelConsumption; //витрати бензину на 100км, в л
    public $fuelTankVolume; //місткість баку, в л),
    public $lapLength; //довжина треку, в км
    public $lapsNumber; //кількість кіл)
    public $cars = [];
    public function __construct()
    {

        $this->cars[] = new Car(
            1,
            'https://pbs.twimg.com/profile_images/595409436585361408/aFJGRaO6_400x400.jpg',
            'BMW',
            250, //speed
            10, //$pitStopTime
            5, //$fuelConsumption
            15 //$fuelTankVolume
        );
        $this->cars[] = new Car(
            2,
            'https://i.pinimg.com/originals/e4/15/83/e41583f55444b931f4ba2f0f8bce1970.jpg',
            'Tesla',
            200, //speed
            5, //$pitStopTime
            5.3, //$fuelConsumption
            12 //$fuelTankVolume
        );
        $this->cars[] = new Car(
            3,
            'https://fordsalomao.com.br/wp-content/uploads/2019/02/1499441577430-1-1024x542-256x256.jpg',
            'Ford',
            220, //speed
            5, //$pitStopTime
            6.1, //$fuelConsumption
            18.5 //$fuelTankVolume
        );
    }

}
?>
