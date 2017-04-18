<?php 

abstract class Employee{
		protected $name;
		protected $dept;
		protected $salary;



		public function setName($staffName){

			$this->name = $staffName;
		}

		public function getName(){
			return $this->name;
		}




		public function setDept($dept){

			$this->dept = $dept;
		}

		public function getDept(){
			return $this->dept;
		}



		public function getSalary(){
			return $this->salary;
		}


		abstract public function salary();


}
		



	class HourlyEmployees extends Employee{

				const $rate = 5;
				protected $expectedHours = 40;





		}


		class CommissionedEmployees extends Employee{

				const $rate = 5;
				protected $sales;





		}

		class SalariedEmployees extends Employee{

				const $base = 2000;
				


		}


		class SalariedCommissionedEmployees extends Employee{

				const $rate = 2;
				protected $sales;
				protected $base = 5000;





		}



