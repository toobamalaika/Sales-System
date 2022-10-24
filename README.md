# Project Setup
1. Add your .env file
2. composer update
3. php artisan clear-compiled 
4. composer dump-autoload
5. php artisan optimize
6. php artisan key:generate
7. php artisan config:clear
8. php artisan cache:clear
9. php artisan optimize
10. php artisan migrate
11. php artisan db:seed
12. php artisan serve
13. On browser hit the given url: http://localhost:8000/login

# Sales System Details

## Create Authentication for Admins and Customers
1. The users should be authenticated by Auth middleware
2. The users must be able to login with "User Name" and "Email" both

## Create Sales table and product item
1. Admin create products and maintain
2. Product has these columns
   - ID
   - Product
   - Code
   - Price


## Login Details
1. Admin User
   - Email: toobachuhan92@gmail.com
   - Username: tooba
   - Password: 123456
1. Customer User
   - Email: ijuwebdesk@gmail.com
   - Username: ijlal_ahmed
   - Password: 123456