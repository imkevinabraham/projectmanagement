<?php

global $CONFIG;
global $CS_CONFIG;

$CONFIG = array();
$CS_CONFIG = array();

//DEBUGGING
//Set this variable to true to enable debugging. Set it to false to turn debugging off.
$CONFIG['enable_debugging'] = false;


define('DEVELOPMENT_ENVIRONMENT', $CONFIG['enable_debugging']);

//DATABASE CONNECTION
define('DB_NAME', 'pm');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('DB_HOST', 'localhost');

//BASE URL
$CONFIG['base_url'] = 'http://localhost/webDev/work/duet/';

//LANGUAGE
$CONFIG['language'] = 'en';

//DATE FORMAT
$CONFIG['datepicker_format'] = 'mm/dd/yy';

//COMPANY DETAILS
$CONFIG['company']['name'] = 'Atlassian';
$CONFIG['company']['address1'] = '';
$CONFIG['company']['address2'] = '';
$CONFIG['company']['email'] = 'kevin@ikeepclient.com';
$CONFIG['company']['phone'] = '';
$CONFIG['company']['website'] = '';

$CONFIG['company']['logo'] = $CONFIG['base_url'] . '/client/images/sample-logo.png';

//EMAIL SETTINGS
$CONFIG['email']['use_smtp'] = true;
$CONFIG['email']['host'] = 'smtp.zoho.com';
$CONFIG['email']['port'] = 587;
$CONFIG['email']['enable_authentication'] = true;
$CONFIG['email']['username'] = 'kevin@ikeepclient';
$CONFIG['email']['password'] = 'kevin101';
$CONFIG['email']['enable_encryption'] = 'tls';

//other email settings
$CONFIG['email']['debug_templates'] = false;
$CONFIG['email']['send_client_emails'] = true;

//INVOICES
$CONFIG['invoice']['base_invoice_number'] = 201000;
$CONFIG['invoice']['tax_rate'] = .01;

//TASKS
$CONFIG['task']['at_risk_timeframe'] = 2;

//UPLOADS
$CONFIG['uploads']['folder_name'] = 'files-folder';
$CONFIG['uploads']['path'] = ROOT . '/' . $CONFIG['uploads']['folder_name'] . '/';
$CONFIG['uploads']['web_path'] = $CONFIG['base_url'] . 'server/' .  $CONFIG['uploads']['folder_name'] . '/';

$CONFIG['uploads']['user_images_folder_name'] = 'user_images';
$CONFIG['uploads']['user_images_path'] = ROOT . '/' . $CONFIG['uploads']['folder_name'] . '/' . $CONFIG['uploads']['user_images_folder_name'] . '/';
$CONFIG['uploads']['user_images_web_path'] = $CONFIG['base_url'] . 'server/' . $CONFIG['uploads']['folder_name'] . '/' . $CONFIG['uploads']['user_images_folder_name'] . '/';

$CONFIG['uploads']['max_file_size'] = 200000000;
$CONFIG['uploads']['allow_client_uploads'] = true;

//PAYMENTS
$CONFIG['currency_symbol'] = '$';

$CONFIG['payments']['method'] = 'stripe';
$CONFIG['payments']['is_sandbox'] = true;

// set your secret key: remember to change this to your live secret key in production
// see your keys here https://manage.stripe.com/account
$CONFIG['payments']['stripe']['publishable_key'] = 'pk_test_2oMv126orqcIJDVKGOCbCVUQ';
$CONFIG['payments']['stripe']['secret_key'] = 'sk_test_Vpq0Ohk43mk9aHtng1E44dgW';

$CONFIG['payments']['paypal']['business_email'] = '';
$CONFIG['payments']['paypal']['language_code'] = '';
$CONFIG['payments']['paypal']['currency_code'] = '';

//CLIENT ACCESS
$CONFIG['disable_client_access'] = false;

//AUTO LOGOUT
$CONFIG['auto_logout']['is_enabled'] = false;
//1800 = 30 mins
$CONFIG['auto_logout']['max_inactivity'] = 1800;

//MODULES TO DISABLE
//comma delimeted list. i.e. Files, Invoices, Calendar
$CONFIG['modules_to_hide'] = '';

//DEFAULT SERVER SIDE ROUTE
$CONFIG['default_route_controller'] = 'portal';
$CONFIG['default_route_action'] = 'home';
$CONFIG['default_action'] = 'get';

//PUBLIC ROUTES
//Routes in this array can be accessible to the public (the user does not need to be logged in)
$CONFIG['public_routes'] = array(
    'paypal/ipn_listener',
    'app/config',
    'language/templates',
    //the client side route
    'forgot_password',
    //the server side route
    'user/forgot_password'
);

//RESTRICTED ROUTES
//There is some functionality that shouldn't be exposed regardless of whether the user is logged in,
//Routes in this array can not be accessed. Using any functionality on these models requires calling directly in another model
//i.e upload is called by the file model
$CONFIG['restricted_routes'] = array(
    'upload/*',
    'stripepayment/*',
    'paypalpayment/get',
    'payment/get',
    'tasksmanager/get'
);

//USER PLACEHOLDER IMAGES
$CONFIG['unknown_user'] = 'client/images/unknown-user-big.jpg';
$CONFIG['unknown_user_thumb'] = 'client/images/unknown-user.jpg';

//MORE DEBUGGING OPTIONS
//will email a list of all queries for a particular request. If you would like to change the logging behaviour you can modify it in
//core/model.class.php
$CONFIG['log_queries'] = false;

//useful for debugging paypal IPN functionality. This logging functionality will simply email a copy of the ipn data to
//the admin email specified in this config file. If you would like to change the logging behaviour you can modify it in
//application/models/paypalpayment.php
$CONFIG['payments']['paypal']['log_ipn_results'] = false;


//PURCHASE CODE
$CONFIG['purchase_code'] = '';


//CLIENT SIDE CONFIG
//Config values necessary for the client side (javascript) code
//DO NOT PLACE ANY SENSITIVE INFORMATION IN THESE VARIABLES
$CS_CONFIG['payment_method'] = $CONFIG['payments']['method'];
$CS_CONFIG['stripe_publishable_key'] = $CONFIG['payments']['stripe']['publishable_key'];
$CS_CONFIG['currency_symbol'] = $CONFIG['currency_symbol'];
$CS_CONFIG['tax_rate'] = $CONFIG['invoice']['tax_rate'];
$CS_CONFIG['datepicker_format'] = $CONFIG['datepicker_format'];

//Determines the format to show in the files view
//Valid values are Tiles or LineItems
$CS_CONFIG['default_file_view'] = 'Tiles';
$CS_CONFIG['default_dashboard_projects_view'] = 'Tiles';
$CS_CONFIG['default_route'] = 'dashboard';
$CS_CONFIG['company_name'] = $CONFIG['company']['name'];
$CS_CONFIG['task_timer_save_interval'] = 3;
$CS_CONFIG['public_routes'] = $CONFIG['public_routes'];
$CS_CONFIG['allow_client_uploads'] = $CONFIG['uploads']['allow_client_uploads'];
$CS_CONFIG['enable_debugging'] = $CONFIG['enable_debugging'];
$CS_CONFIG['modules_to_hide'] = $CONFIG['modules_to_hide'];


?>