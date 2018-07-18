# File-Upload-Service
This is a Laravel 5.6 powered web application that receives an uploaded file, validates and inserts the data into a database table.

### Minimum requirements 
* php >= 7.1.3

### Installation ###
* type `https://github.com/sirBobz/File-Upload-Service.git Airtime` to clone the repository 
* type `Airtime`
* type `composer install`
* type `composer update`
* copy *.env.example* to *.env*
* type `php artisan key:generate`to generate secure key in *.env* file
* if you use MySQL in *.env* file :
   * set DB_CONNECTION
   * set DB_DATABASE
   * set DB_USERNAME
   * set DB_PASSWORD

* type `php artisan migrate` to create tables


### Included packages ###

* [maatwebsite/excel](https://github.com/Maatwebsite/Laravel-Excel) the Laravel Flavoured PhpSpreadsheet 

### Features ###


* Authentication (registration, login, logout)
* On register/login, view the transactions on the dashboard. The transactions are as a result of file upload.

