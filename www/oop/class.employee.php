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


		
		abstract public function calculateSalary();


}
		













