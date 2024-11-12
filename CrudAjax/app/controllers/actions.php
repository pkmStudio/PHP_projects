<?php
//require_once '../vendor/autoload.php';
//require_once __DIR__ . '/config/config.php';
//require_once ROOT.'/config/functions.php';
// pagination READ
$data = json_decode(file_get_contents('php://input'), true);
if (isset($data['page'])) {
    $page = (int)$data['page'];
    $total = getCount('city');
    $per_page = 10;
    $pagination = new App\Pagination($total, $per_page, (int)$page);
    $start = $pagination->get_start();
    $cities = new \App\CRUD();
    $cities = $cities->read('city', null, null, "$start, $per_page");
    require_once VIEWS . '/incs/content/home-content.tpl.php';
    die;
}

// Add City CREATE
if (isset($_POST['addCity'])) {
    $load_data = ['name', 'population'];
    $data = load($load_data);
    $validator = new App\Validator();
    $validation = $validator->validate($data, [
        'name' => [
            'required' => true,
            'min' => 2,
            'max' => 50
        ],
        'population' => [
            'required' => true,
            'minNum' => 2
        ]
    ]);
    if ($validation->hasErrors()) {
        $errors = $validation->getErrors();
        $errors = getErrors($errors);
        $result = ['status' => 'error', 'errors' => $errors];
        echo json_encode($result);
        die;
    }

    $addCity = new \App\CRUD();
    $addCity = $addCity->create('city', $data);
    $result = ['status' => 'success'];
    echo json_encode($result);
    die;
}

//Get City
if (isset($data['action']) && $data['action'] == 'getCity') {
    $id = isset($data['id']) ? (int)$data['id'] : 0;
    $city = new \App\CRUD();
    $city = $city->read('city', "id = $id")[0];

    if (!$city) {
        $result = ['status' => 'error'];
        echo json_encode($result);
        die;
    }

    $result = ['status' => 'success', 'city' => $city];
    echo json_encode($result);
    die;
}

// Edit City UPDATE
if (isset($_POST['editCity'])) {
    $load_data = ['id', 'name', 'population'];
    $data = load($load_data);
    $id = isset($data['id']) ? (int)$data['id'] : 0;
    $validator = new App\Validator();
    $validation = $validator->validate($data, [
        'name' => [
            'required' => true,
            'min' => 2,
            'max' => 50
        ],
        'population' => [
            'required' => true,
            'minNum' => 2
        ],
        'id' => [
            'minNum' => 1
        ]
    ]);
    if ($validation->hasErrors()) {
        $errors = $validation->getErrors();
        $errors = getErrors($errors);
        $result = ['status' => 'error', 'errors' => $errors];
        echo json_encode($result);
        die;
    }

    $editCity = new \App\CRUD();
    $editCity = $editCity->update('city', $data, "id = $id");
    $result = ['status' => 'success'];
    echo json_encode($result);
    die;
}

// Delete City DELETE
if (isset($data['action']) && $data['action'] == 'deleteCity') {
    $id = isset($data['id']) ? (int)$data['id'] : 0;
    $city = new \App\CRUD();
    $city = $city->delete('city', "id = $id");

    if (!$city) {
        $result = ['status' => 'error'];
        echo json_encode($result);
        die;
    }

    $result = ['status' => 'success'];
    echo json_encode($result);
    die;
}