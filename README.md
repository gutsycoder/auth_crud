To run this project Do
Download Laravel and XAMPP and Make a database in XAMPP
Steps:-

1.git clone git@github.com:gutsycoder/auth_crud

2.composer require laravel/ui --dev

3.Install npm files

4.php artisan ui bootstrap --auth

5.npm install && npm run dev

6.php artisan migrate

7. php artisan serve 


Login : http://127.0.0.1:8000/login

Register : http://127.0.0.1:8000/register
Delete the create_students_table from migrations

php artisan make:migration create_students_table
 
php artisan migrate

