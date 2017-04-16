<?php 

  /**
  * 
 
  class MyClass  {
     
     public $prop = "I am a class property!";
     public static $count = 0;

     public function __construct(){

      echo 'The class" ', __CLASS__,'" was inititated! </br>';
     }


     public function __toString(){
      echo "Using the toString method: ";
      return $this->getProperty();


     }
     public function setProperty($newval){

        $this->prop = $newval;


     }


     protected function getProperty(){
            return $this->prop . "</br>";

          }

          public static function plusOne(){

            return "This count is " . ++self::$count . "</br>";
          }
   
  }


    /**
    * 
    
    class MyOtherClass extends MyClass
    {
      
      function __construct()
      {
        parent ::__construct();
        echo "A new constructor in " . __CLASS__ . "</br>";
      }

       

      public function newMethod(){

        echo "From a new method in " .__CLASS__. "</br>";
              }

      public function callProtected(){

        return $this->getProperty();
      }        
    }

    do{
      echo MyClass::plusOne();
    }while( MyClass::$count < 10);

 // $NewObj = new MyOtherClass;

  //echo $NewObj->newMethod();

  //echo $NewObj->callProtected();

  //$obj2 = new MyClass;

 // echo $obj;

// echo $obj->getProperty();
  //echo $obj2->getProperty();

  //$obj->setProperty("I am the new set property");
  //$obj2->setProperty("I am the new parameter property set for the new initiated class");

 // echo $obj->getProperty();
  //echo $obj2->getProperty();



*/

    class Person

        {
          private $_name;
          private $_job;
          private $_age;


          public function __construct($name,$job,$age){

            $this->_name = $name;
            $this->_job = $job;
            $this->_age = $age;
          }
          
          public function changeJob($newJob){

          $this->_job = $newJob;


          }
          public function happyBirthday(){

            ++$this->_age;
          }

        }


        $person1 = new Person("Joe", "Bricklayer", 43);
        $person2 = new Person("Martins", "Instructor",56);

        echo "<pre> Person 1: ",print_r($person1, TRUE), "</pre>";
        echo "<pre> Person 2: ",print_r($person2, TRUE), "</pre>";

        $person1->changeJob("IMPORTER");
        $person1->happyBirthday();


        $person2->happyBirthday();

         echo "<pre> Person 1: ",print_r($person1, TRUE), "</pre>";
        echo "<pre> Person 2: ",print_r($person2, TRUE), "</pre>";
