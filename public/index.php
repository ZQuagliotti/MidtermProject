<?php
/**
 * Created by PhpStorm.
 * User: zacharyquagliotti
 * Date: 2019-03-13
 * Time: 17:04
 */

main::start();

class main{

    static public function start($filename){

        $records = csv::getRecords($filename);
        $table = html::generateTable($records);

    }

}


class csv{

    static public function getRecords() {


        $make = 'ford';
        $model = 'taurus';
        $car = AutomobileFactory::create($make,$model);

        $records[] = $car;

        print_r($records);

        return $records;

    }
}

class html{

    static public function generateTable($records){

        $table = $records;

        return $table;

    }
}


class system{

    static public function printPage($page){

        echo $page;

    }

}


class Automobile
{
    private $vehicleMake;
    private $vehicleModel;

    public function __construct($make, $model)
    {
        $this->vehicleMake = $make;
        $this->vehicleModel = $model;
    }

    public function getMakeAndModel()
    {
        return $this->vehicleMake . ' ' . $this->vehicleModel;
    }
}

class AutomobileFactory
{
    public static function create($make, $model)
    {
        return new Automobile($make, $model);
    }
}
