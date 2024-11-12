<?php
//require_once '../vendor/autoload.php';
//require_once __DIR__ . '/../config/config.php';
//require_once ROOT.'/config/functions.php';
$total = getCount('city');
$per_page = 10;
$page = $_GET['page'] ?? 1;

// Обозначаем с какой записи будем выводить список городов.
// TODO Разобраться с классом пагинация и его методами
$pagination = new App\Pagination($total, $per_page, (int)$page);
$start = $pagination->get_start();
$cities = new \App\CRUD();
$cities = $cities->read('city', null, null, "$start, $per_page");

require_once VIEWS . '/home.tpl.php';