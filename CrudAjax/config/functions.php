<?php

require_once '../vendor/autoload.php';

function getCount(string $table): int
{
    $useDb = new \App\UseDb();
    return $useDb->query("SELECT COUNT(*) FROM $table")->findColumn();
}

// Проверяем соответствует ли набор данных тому, что мы ожидаем
function load(array $variables): array {
    $load_data = $variables;
    $data =[];
    foreach ($load_data as $key) {
        $data[$key] = trim($_POST[$key]);
    }

    return $data;
}

// Заносит ошибки в список
function getErrors(array $errors): string {
    $html = '<ul class="list-unstyled text-danger text-start">';
    foreach ($errors as $error) {
        foreach ($error as $key) {
            $html .= "<li>>{$key}</li>";
        }
    }
    $html .= '</ul>';
    return $html;
}