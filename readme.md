#Installation
##Requirements
PHP >=5.6.4, recommended PHP >=7  
OpenSSL PHP Extension  
PDO PHP Extension  
Mbstring PHP Extension  
Tokenizer PHP Extension  
XML PHP Extension  
MySql  
Composer 
##Clone repository from Github
git clone https://github.com/arvyjaar/park.git  
'public' directory is your document root. Feel free to rename it to 'public_html' if you need it. 
##Run Composer install
From CLI in your application root run: composer install
##Create MySql database
##Fill database credentials
You should create .env file in the application root directory or you can rename existing .env.example and fill your database credentials there.
##Fill email configuration in .env
For password reminder.
##Generate application key
From CLI in your application root run: php artisan key:generate
##Run database migrations
From CLI in your application root run: php artisan migrate 
  
 