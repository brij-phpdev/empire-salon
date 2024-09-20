<?php

require 'vendor/autoload.php'; // Ensure you include Composer's autoload

// Load .env variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Define constants from .env
define('SITE_URL', $_ENV['SITE_URL']);
define('SITE_TITLE', $_ENV['SITE_TITLE']);
define('SITE_BOOK_URL', $_ENV['SITE_BOOK_URL']);
define('SHOP_URL', $_ENV['SHOP_URL']);
define('WHATSAPP_URL', $_ENV['WHATSAPP_URL']);

define('EMAIL', $_ENV['EMAIL']);
define('ADMIN_EMAIL', $_ENV['ADMIN_EMAIL']);
define('PARAS_EMAIL', $_ENV['PARAS_EMAIL']);
define('PHONE', $_ENV['PHONE']);
define('LANDLINE', $_ENV['LANDLINE']);
define('ADDRESS', $_ENV['ADDRESS']);
define('INVOICE_ADDRESS', $_ENV['INVOICE_ADDRESS']);
define('OFFICE_CITY', $_ENV['OFFICE_CITY']);

define('INSTA_SOCIAL', $_ENV['INSTA_SOCIAL']);
define('FB_SOCIAL', $_ENV['FB_SOCIAL']);
define('YOUTUBE_SOCIAL', $_ENV['YOUTUBE_SOCIAL']);

define('DB_HOST', $_ENV['DB_HOST']);
define('DB_USER_NAME', $_ENV['DB_USER_NAME']);
define('DB_USER_PASSWORD', $_ENV['DB_USER_PASSWORD']);
define('DB_NAME', $_ENV['DB_NAME']);

define('FAST2SMS_API_URL', $_ENV['FAST2SMS_API_URL']);
define('FAST2SMS_API_KEY', $_ENV['FAST2SMS_API_KEY']);

define('RECAPTCHA_SITE_KEY', $_ENV['RECAPTCHA_SITE_KEY']);
define('RECAPTCHA_SITE_SECRET', $_ENV['RECAPTCHA_SITE_SECRET']);

define('EMAIL_USERNAME', $_ENV['EMAIL_USERNAME']);
define('EMAIL_PASSWORD', $_ENV['EMAIL_PASSWORD']);
define('EMAIL_HOST', $_ENV['EMAIL_HOST']);
define('EMAIL_PORT', $_ENV['EMAIL_PORT']);

define('DEBUG', $_ENV['DEBUG'] === 'TRUE');

define('MERCHANT_KEY', $_ENV['MERCHANT_KEY']);
define('MERCHANT_SALT', $_ENV['MERCHANT_SALT']);

define('SGST', (int)$_ENV['SGST']);
define('CGST', (int)$_ENV['CGST']);

define('CURRENCY', $_ENV['CURRENCY']);

//define('DISABLE_LINKS', true);