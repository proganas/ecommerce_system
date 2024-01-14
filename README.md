# eCommerce System
## contains:
-	Categories (multi-levels)
-	Products (can assign it to any category parent or child)
-	Shop products (some products can be added to the shop once or more)
-	Orders (on shop products)
  
### Using Laravel 9 framework

### Use Laravel eloquent while dealing with models

## Tasks:
- Create migration for needing tables
- Create DB seeds
- Define model relations
- Make API to return the latest shop products (you should get one from each category)
- Make API with input category ID and output "child categories and all shop products under this category or any child category"
- Make API to add order on a shop product (note: you should validate the request) 
- Make a form to add orders using Ajax posting to the previous API

___
## Don't Forget

- Run Migrations:
  ```
  php artisan migrate
  ```

- Seed the Database:
  ```
  php artisan db:seed
  ```
