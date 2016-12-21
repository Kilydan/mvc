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
        case 'orders':
            require_once('models/orders.php');
            $controller = new OrdersController();
    }

    $controller->{$action}();
}

// we're adding an entry for the new controller and its actions
$controllers = array('pages' => ['home', 'admin', 'signup', 'error', 'login', 'voorwaardes', 'huren', 'account', 'edit_account'],
                     'admin' => ['autos', 'gebruikers', 'reserveringen'],
                     'car' => ['indexadmin', 'index', 'show', 'rent'],
                     'account' => ['signup', 'login', 'logout', 'edit'],
                     'orders' => ['index']);

if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
        call($controller, $action);
    } else {
        call('pages', 'error');
    }
} else {
    call('pages', 'error');
}