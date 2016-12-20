<?php
function call($controller, $action)
{
    require_once('controllers/' . $controller . '_controller.php');

    switch ($controller) {
        case 'pages':
            $controller = new PagesController();
            break;
        case 'admin':
            $controller = new AdminController();
            break;
        case 'car':
            // we need the model to query the database later in the controller
            require_once('models/car.php');
            $controller = new CarController();
            break;
        case 'account':
            require_once('models/account.php');
            $controller = new AccountController();
            break;
    }

    $controller->{$action}();
}

// we're adding an entry for the new controller and its actions
$controllers = array('pages' => ['home', 'admin', 'signup', 'error', 'login'],
                     'admin' => ['autos', 'gebruikers', 'reserveringen'],
                     'car' => ['index', 'show'],
                     'account' => ['signup', 'login', 'logout']);

if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
        call($controller, $action);
    } else {
        call('pages', 'error');
    }
} else {
    call('pages', 'error');
}