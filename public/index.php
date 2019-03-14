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

class html{
    public static function generateTable($records){

        foreach ($records as $record){
            $array = $record->returnArray();
            print_r($array);
        }
    }
}

class csv{
    static public function getRecords($filename){

        $file = fopen($filename,"r");

        $fieldNames = array();

        $count = 0;

        while(! feof($file)) {

            $record = fgetcsv($file);

            if($count == 0) {
                $fieldNames = $record;
            }else{
                $records[] = recordFactory::create($fieldNames, $record);
            }
            $count++;

        }
        fclose($file);
        return $records;

    }
}

class record{

    public function __construct(Array $fieldNames = null, $values = null)
    {

        $record = array_combine($fieldNames, $values);
        foreach ($record as $property => $value){
            $this->createProperty($property, $value);

        }


    }

    public function returnArray(){
        $array = (array) $this;
        return $array;
    }

    public function createProperty($name = 'first', $value = 'keith'){

        $this->{$name} = $value;

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
