

<?php

    class Student{
        static private $count = 0;
        private function __construct(){
            echo "object is created <br>";
            self::$count =+1;
        }

        static function createobject(){
            if(Student::$count===0){
                return new Student();
            }
            throw new Exception("Only one object can be created");
        }



    }


    // $s = new Student();

    // $s2 = new Student(); 
    $s = Student::createobject();
    $s2= Student::createobject(); # raise exception 


    /**
     * 
     *  function abc(){
     * retrun x + y;
     *      }
     * 
     * @test
     * function abc(){
     *  return x+y ===10 
     * }
     * 
     * 
    */

    $students  = ["ibrahim","Mohamed", "Yasser","Ali"];

    var_dump(next($students)); # Ibrahim
    var_dump(end($students)); # Ali