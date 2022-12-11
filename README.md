# Test Task Installation

### Run the commands below step by step in console for local initialization
1) ```composer install```
2) ```php artisan key:generate``` 
3) Setting up the ```.env``` file (configure database credentials)
4) ```php artisan migrate```

### For importing currencies from Central Bank's API run a command below
```php artisan parser:run```

or run seeder ```php artisan db:seed```

### After that run ```npm``` commands:
1) ```npm install```
2) ```npm run dev```

### Finally, run a server
```php artisan serve```

### For using the interface go to the [DASHBOARD](http://localhost:8000/dashboard)

### There is API endpoint to get currency rates:
- [http://YOUR_URL/api/v1/currencies/CURRENCY_ID/rates?QUERY_PARAMS](http://YOUR_URL/api/v1/currencies/CURRENCY_ID/rates?QUERY_PARAMS)

| QUERY_PARAMS_KEY | QUERY_PARAMS_VALUE | YOUR_URL  |  CURRENCY_ID   |
|------------------|:------------------:|-----------|:--------------:|
| from             |     2022-11-29     | 127.0.0.1 | ID of currency |
| to               |     2022-12-06     |           |                |


