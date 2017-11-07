## OnChain Wallet CMS


#### Language and framework
PHP >=7.0.0  
Laravel v5.5.*  
AdminLTE v2.3.8  
Bootstrap v3.3.7  

#### Url
API Url : http://[domain]/api/doc/  
CMS Url : http://[domain]

#### Install and run
[Deploy the server environment](http://www.jianshu.com/p/1f17a69f6dcf)

Reboot server.

Go in project path :
```bash
$ cd [project path]

$ composer install
$ npm install

$ cp .env.example .env
## Configure database parameters.

$ php artisan migrate:install
$ php artisan migrate
$ php artisan db:seed
```

Increase business database files and permissions data.

End.