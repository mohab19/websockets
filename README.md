## Pangaea Task for implementing Websockets
	This is a websocket implementation for private channels
	that Broadcast only to subscribed users.

    #### How to setup:
		- first you need to install composer needed files:
	 	` composer install `
		this step might rewrite some files, make sure the broadcasting provider is
		uncommented in the ` config/app.php ` file.

		- then you need to install pusher:
		` composer require pusher/pusher-php-server `

		- then you need you install `npm` and needed packages for this project:
		` npm install `

		` npm install --save-dev laravel-echo pusher-js `

		- install laravel mix too:
		` npm install laravel-mix --save-dev `

		after you finish all these installation you will need to add pusher account keys,
		please make sure to add them in the ` .env ` file.

		Also don't forget start the server on post:8000 like so:
		` php artisan serve --port:8000 `
