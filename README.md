
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>



# Laravel Book CRUD App Documentation

Welcome to the 'Readme' project. This is a simple Create, Read, Update, and Delete (CRUD) application for managing books. Each user can add their own books, and while the books added are visible to all users, only the user who added a book can update or delete it.

## Focus of This Project
The primary intent of this exercise was to test and showcase proficiency in Laravel and PHP, rather than focusing on the design aspects. Thus, the app may not have advanced design features or styles but has full functionality a CRUD application requires, implemented using Laravel and PHP.

## Features
- **User Home:** A logged-in user will see their added books here.
- **All Books:** View all books added by all users.
- **Add Book:** Functionality to add new books.
- **Update/Delete Book:** Only the user who added a book has the option to update or delete that book.
- **Filter by Category:** View books grouped by their categories.
- **Filter by Author:** View books grouped by their authors.
- **Search Books:** You can search for books by title, author, or description.

### Technical Details
This project uses the following technology stack:
- Laravel Framework (v11.2.0)
- PHP (v8.2)
- MySQL

### Installation and Set-Up
To get this project running on your local machine, follow the steps below:

1. Clone this repository using `git clone` followed by the repository URL.

>  cd readme_project

> composer install

> npm install
> 
### Copy .env.example to .env and configure your database settings.
>  php artisan migrate 

### Start the server.
>     php artisan serve

> You will now be able to access the application at localhost:8000.


### Note
This project uses Bootstrap for front-end styling instead of Tailwind CSS.


### Contributing
For contributing to this project, please fork the repository and submit a pull request with your changes.


![blogs list](/resources/img/crudBooks.jpg)


