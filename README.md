<p align="center"><img src="http://vipdv.ru/vipdv.jpg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

# Tasks 
## API 
Using the provided CSV data, create an API route using Laravel that allows the data to be searched. 
The data should be converted to a database table. Provide Laravel migrations and seeders within the project. 
The API should search on: 
Name: Should also match on partial names
Bedrooms: Exact match
Bathrooms: Exact match 
Storeys: Exact match 
Garages: Exact match 
Price: Range (between $X and $Y) 
 
All search parameters should be optional, we should be able to search for 2 bedroom houses, or 4 bedroom and 2 bathroom houses, etc. 
 
The API should return JSON, with pure numeric data (not HTML content). 
 
## Frontend (Search Form) 
 
Create a basic search form that will query the API using AJAX and display the results it receives from the backend. The searching result should be rendering to HTML table dynamically on the frontend, using reactive Vue.js

There should be some sort of searching indicator, a spinning icon or similar. 
 
A message should be displayed if no results were found. 


## Installation
 
```
composer install
```

Generate APP_KEY

```
mv .env.example .env
php artisan key:generate
```

Open .env file and fill database connection

Run migrations (seeder has autostart) 

```
php artisan migrate
```
