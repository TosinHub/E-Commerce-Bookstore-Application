<?php 

include 'class.employee.php';
include 'class.HourlyEmployees.php';

$hemp = new HourlyEmployees(40, "maja", "IT", 20);

$hemp->calculateSalary();