# larapres
word press adminpanel for laravel it is my test on corcel 
find orginal on corcel <a href="https://github.com/corcel/corcel.git">corcel</a>
in here i add and play with the orginal one so mine can has bugs or simply didnt work at all.
if you are not want to fix my errors. go to the orginal address.
mine hasent support at all. no documentaion. 
its for me. but i let you cat do wat ever you want with it.
# pakages
- 1- bootstrap
- 2- free version of mdbootstrap
- 3- mdbootstrap free admin panel
- 4- awsome wordpress
- 5- font awsome 
- 6-google font

# befor INSTALL download this
- [Git bash](https://git-scm.com/downloads)
- [composr for windows](https://getcomposer.org/Composer-Setup.exe)
- [COMPOSER for linux or mac](https://getcomposer.org/download/)
- [nodejs for npm packges](https://nodejs.org/en/)

- 

# how to install

- type or copy this lines to your gitbash in the addrees that you wish to have this
- for example C:/XAMPP/HTDOCS
- right click
- open gitbash here
- [if you don't have gitbash installed on your operating system](https://git-scm.com/downloads)


- 1- 

```
git clone https://github.com/gitKoodex/larapress.git
```

- 2- 

```
cd larapress
```

- 3- 

```
composer update 
```

- 4- 

```
npm update
```

- 5- 

```
cp .env.example .env
```

- 6- 

```
php artisan key:generate

```

- 7- for add my awsome helper base on laravel awsome helpel

```
git clone https://github.com/gitKoodex/laravel-hellpers.git

```

- 8- 
```
 chmod a+rwx vendor
```

- 9-

```
cp laravel-hellpers/Jdate.php vendor/laravel/framework/src/Illuminate/Foundation/Jdate.php

```

- 10-

```
cp laravel-hellpers/googleTranslate.php vendor/laravel/framework/src/Illuminate/Foundation/googleTranslate.php

```
- 11-

```
cp laravel-hellpers/helpers.php vendor/laravel/framework/src/Illuminate/Foundation/helpers.php

```

# use only my awsome pakge for your admin panel
- i use simple user role and seeders in this project if you like them for your own project you can download them from [https://github.com/gitKoodex/laravel-user-role](https://github.com/gitKoodex/laravel-user-role.git)
- i use [summernote](https://github.com/summernote/summernote) as a Super simple WYSIWYG Editor.
- i use persian date picker [babakhani](http://babakhani.github.io/PersianWebToolkit/beta/datepicker)
- i use my own convert babakany to php [laravel-hellpers](https://github.com/gitKoodex/laravel-hellpers)
