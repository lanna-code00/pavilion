<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## cloning and setting up this repository

1. clone this repository by using this command "git clone https://github.com/lanna-code/pavilion.git"
2. navigate into this project you just cloned
3. Install composer dependencies by running "composer install"
4. Install the NPM dependencies as well using "npm install" you can use yarn (yarn install) as well.
5. create a copy of the .env file "cp .env.example .env"
6. Generate app key "php artisan key:generate" the key generated will be seen inside your .env
7. Create a database and connect your app to it through the .env file (I used workbench for my DB) you can use any database tool you prefer
8. Once, youre done run the migrations. I have created a seeder you can seed as well while migrating i.e "php artisan migrate --seed" or run only "php artisan migrate" if you don't want to seed.
9. run "npm run dev" to build the frontend assests
10. Start the app "php artisan serve" then open another CMD and run "npm run watch". I scaffolded vue.js inside the app, I used webpack as well.
11. I used google mail smtp for the mailing, cloudinary for the images and djokicpn(for email logging).

## Usage
The application comes with some sample routes(inside the api.php) and components(inside the resources folder) to get you started.

To view the sample routes, navigate to routes/api.php. You can create additional routes here.

Thank you.

