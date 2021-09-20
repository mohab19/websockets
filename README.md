## Pangaea Task for implementing Websockets

This is a websocket implementation for private channels
that Broadcast only to subscribed users.

#### How to setup:
- first you need to install composer needed files:<br>
	` composer install `<br>
this step might rewrite some files, make sure the broadcasting provider is
uncommented in the ` config/app.php ` file.

- then you need to install pusher:<br>
	` composer require pusher/pusher-php-server `

- then you need you install `npm` and needed packages for this project:<br>
	` npm install `

	` npm install --save-dev laravel-echo pusher-js `

- install laravel mix too:<br>
	` npm install laravel-mix --save-dev `

after you finish all these installation you will need to add pusher account keys,
please make sure to add them in the ` .env ` file.<br>

Also don't forget start the server on post:8000 like so:<br>
	` php artisan serve --port:8000 `<br>

### How to use:

First you need to migrate the database files by executing the following command :<br>
	` php artisan migrate `

Also it's best to seed some data into users table by executing:
	` php artisan db:seed `

There's a postman collection file included in the repository to help
use the created APIs.
