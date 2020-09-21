#### Social media status: ![Laravel](https://github.com/MilanMolnar/Laravel-instagram-like-project/workflows/Laravel/badge.svg) 
#### Messenger status: ![Laravel](https://github.com/MilanMolnar/Vue-messenger-app/workflows/Laravel/badge.svg)

# Laravel Socialmedia project
This project is combining two of my previously created apps to create a social media platform.

  ### Social media side:
* Easy to understand and use UI.
* Creating, Editing and Deleting Posts
* Ability to Create and Delete comment and like/dislike the posts.
* Creating and Editing a profile with a profile picture.
* Following other users and having a followings feed.   

### Messenger side
* Easy to understand and use UI.
* Realtime communication between browsers.
* Private chat with other followed users.
* Single-Page designe
#

# Installation!
### 0.
Clone the repository and set up your .env files for both apps to the same database.
### 1.
```sh
cd php-laravel-igclone
composer install
php artisan migrate
php artisan storage:link
cd ..
```
### 2.
```sh
cd chat
composer install
php artisan migrate
```
Note: You can check the artisan command list and its description with the command:
```sh
php artisan
```

### Tech

Used technologies for this project:

* [Laravel] - Best framework for creating awesome apps fast.
* [PHP] - for the best web apps!
* [PHP Storm] - Awesome php text editor by jetbrains.
* [MySQL] - Oracles awesome database.
* [Vue.js] - For a component based front-end.
* [Pusher] - Powering realtime communication b/w browsers
* [Bootstrap] - UI design.
* [Github] - duh.

# Usage
Run the command (default port: '8000')
```sh
 cd chat
 php artisan serve --port=YOUR CHOOSEN PORT
 cd ..
 cd php-laravel-igclone
 php artisan serve --port=DIFFERENT PORT
```

# Capabilities
* This platform is combining my two previously created apps
    * [Instagram-like social media app]
    * [Messenger app]
* This platform allows Users to follow eachother views and like post and chat with eachother.
* Guest can view the shared links by the users but can comment like or modify.


License
----
Free to use, free to modify, free to share.

[//]: # (These are reference links used in the body of this note and get stripped out when the markdown processor does its job. There is no need to format nicely because it shouldn't be seen. Thanks SO - http://stackoverflow.com/questions/4823468/store-comments-in-markdown-syntax)


   [MySQL]: <https://www.mysql.com/>
   [Github]: <https://github.com/>
   [Bootstrap]: <https://getbootstrap.com/>
   [jQuery]: <http://jquery.com>
   [Laravel]: <https://laravel.com/>
   [Php]: <https://www.php.net/>
   [PHP storm]: <https://www.jetbrains.com/phpstorm/>
   [Vue.js]: <https://vuejs.org/>
   [Pusher]: <https://pusher.com/>
   [Instagram-like social media app]: <https://github.com/MilanMolnar/Laravel-instagram-like-project>
   [Messenger app]: <https://github.com/MilanMolnar/Vue-messenger-app>
   
   
