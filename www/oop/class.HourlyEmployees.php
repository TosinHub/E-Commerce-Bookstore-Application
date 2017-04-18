<?php



	class HourlyEmployees extends Employee{

				const rate = 5;
				protected $expectedHours;
				protected $hoursWorked;



		
		public function __construct($expHrs,$name,$dept,$hrsWorked){
			$this->expectedHours = $expHrs;
			$this->name = $name;
			$this->dept = $dept;
			$this->hoursWorked = $hrsWorked;
		}

		public function calculateSalary(){

					$overtime = 0;
			if ($this->hoursWorked>$this->expectedHours){
				$overtime = $this->hoursWorked - $this->expectedHours;
				$totalTime = $overtime + $this->expectedHours;
				$this->salary = self::rate * $totalTime;



			}else{
				$this->salary = self::rate * $this->hoursWorked;
			}

			echo "........</br>";
			echo "Name:" .$this->getName(). "</br>";
			echo "Department:" .$this->getDept()."</br>";
			echo "Salary:" .$this->getSalary()."</br>";


		}


	}