# Test Task Installation

### Run the commands below step by step in console for local initialization
1) ```composer install```
2) ```php artisan key:generate``` 
3) Setting up the ```.env``` file (configure database credentials)
4) ```php artisan migrate```

### For importing currencies from Central Bank's API run a command below
```php artisan parser:run```

or run seeder ```php artisan db:seed```

### Finally, run a server
```php artisan serve```

### For using the interface go to the [DASHBOARD](http://localhost:8000/dashboard)
