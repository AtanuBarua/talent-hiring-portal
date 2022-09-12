git clone https://github.com/niloy888/Talent-Hiring-Portal.git 

composer install

cp .env.example .env

php artisan key:generate

you will find the sql file in the database folder

php artisan serve

admin login:
email: admin@email.com
password: 12345678
