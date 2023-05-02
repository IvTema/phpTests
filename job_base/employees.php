<?php
$employees = require_once('arrays/employees.php');
$positions = require_once('arrays/positions.php');
$vacations = require_once('arrays/vacations.php');

var_dump($employees);
var_dump($positions);
var_dump($vacations);

/**
 * Массив employees ссылается на массив positions по коду типа сотрудника position_code
 * Массив vacations ссылкается на массив employees по id сотрудника - employee_id
 * 
 * Задание 1 (нужен массив employee и positions)
 * Найти общую сумму зарплат сотрудников и вывести на экран (зарплата в массиве указана за месяц)
 * 
 * Задание 2 (нужен массив employee и positions)
 * Найти среднюю зарплату сотрудника и вывести на экран
 * 
 * Задание 3 (нужны все 3 массива)
 * Найти общую сумму зарплат сотрудников, которые не в отпуске
 * 
 * Задание 4 (нужны все 3 массива)
 * Найти среднюю зарплату сотрудников, которые не в отпуске
 */
