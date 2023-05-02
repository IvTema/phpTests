<!-- 
 * Массив employees ссылается на массив positions по коду типа сотрудника position_code
 * Массив vacations ссылкается на массив employees по id сотрудника - employee_id
 * 
 * Задание 1 (нужен массив employee и positions)
 * Найти общую сумму зарплат сотрудников и вывести на экран (зарплата в массиве указана за месяц) -->

 <?php
$employees = require_once('arrays/employees.php');
$positions = require_once('arrays/positions.php');
$vacations = require_once('arrays/vacations.php');

// var_dump($employees);
// var_dump($positions);
// var_dump($vacations);

$total_sum;

foreach($employees as $employee){
    $employeeCode = $employee['position_code'];
    // var_dump($employeeCode);
    foreach($positions as $position){
        if ($employeeCode == $position['position_code']){
            $total_sum += $position['salary'];
        }
    }
}

echo($total_sum);
