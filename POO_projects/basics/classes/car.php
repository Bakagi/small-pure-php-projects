<?php


class car
{
    //properties
    public  $brand;
    private $color;

    //constructor

    public function __construct($brand, $color){
        $this->brand = $brand;
        $this->color = $color;
    }

    //methods

    public function getColor(){
        return "the color is " . $this->color;
     
     }

    //getter & setter methods
    public function setColor($color)
    {
        //allowed colors
       $allowedColors = ['red', 'blue', 'green', 'yellow'];
       if (in_array($color, $allowedColors))// if the color is in the allowed colors 
       {
             $this->color = $color;
       } 
    }
}


?>