# PHP-OOP-Enhanced

### Sample project
- Pig Sales & Inventory

### How to setup?
- just edit core.php file

```php

/**
     * To hide the error when in production
     * set to 1 if you're on development - e.g. ini_set('display_errors', 1); 
     * and 0 in production - e.g. ini_set('display_errors', 0);
     */
        ini_set('display_errors', 1);

    /**
     * Database Information
     */
        define('DBHOST','localhost');
        define('DBNAME','baboy');
        define('DBUSER','root');
        define('DBPASS','');
        define('CHARSET','utf8');
        define('DBPORT',':3306');
    
    /**
     * Bas URL
     */
    define('BASE_URL','http://localhost/pigs/');  // change it if you use it online (or uploaded to hosting server)

```