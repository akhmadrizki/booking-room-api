# Booking Room App API
> API Server based on [Laravel v8](https://laravel.com)

## Table of contents

- [Prerequisites](#prerequisites)
- [Setup](#setup)
- [Running the app](#running-the-app)
- [Database setup](#database-setup)

## Prerequisites

- PHP (8)

Please install these extensions on your code editor :

- laravel intellisense

## Setup

1. Fork this Repository:
2. Clone Repository for your fork
```sh
$ git clone https://github.com/{username-anda}/booking-room-api.git
```
3. Add upstream to the clone results
```sh
$ git remote add upstream https://github.com/akhmadrizki/booking-room-api.git
```
4. Copy file `.env.example` to `.env`:
5. Install all package
```sh
$ composer install
```



## Running the app

```sh
$ php artisan serve
```

## Database setup

```sh
...
DB_DATABASE=sibook
DB_USERNAME=root
DB_PASSWORD=
...
```

- Run this command:
```sh
$ php artisan key:generate
$ composer dump-autoload
$ php artisan migrate:fresh --seed
$ php artisan storage:link
```
- For use Passport
```sh
$ composer require laravel/passport
$ php artisan migrate
$ php artisan passport:install
```


### Following are the steps that must be taken in the contribution process
1. Always pull upstream whenever you want to start developing
```sh
$ git pull upstream master
```
2. Create a new branch for each developed feature. Example:
```sh
$ git branch feature/add-login // Contoh saat membuat branch untuk fitur baru
$ git branch bug/fix-menu // Contoh saat membuat branch untuk fix bug
```
3. If your work already done, push to the repo of your fork
```sh
$ git push origin {nama-branch}
```
4. When ready to be taken to the main repository. Make a Pull Request from your branch to the `master` branch. Before the pull request, make sure the branch is clean. If there is a conflict, please fix the conflict. Make sure to make a good title and description so it's easy to understand!
5. Ganbatte!!!
