**Installazione**
```
composer create-project --prefer-dist laravel/laravel:^7.0 .
```

**Avvio server**
```
php artisan serve
```
oppure
```
php -S localhost:8000 -t public
```

**Migrations**
```
php artisan make:migration create_tags_table
```
```
php artisan make:migration create_posts_table
```
```
php artisan make:migration create_post_tag_table
```
eseguire le migrations con:
```
php artisan migrate
```

**Models**
```
php artisan make:model Tag
```
```
php artisan make:model Post
```
Definire anche le relazioni tra tabelle

**Seeders**
```
php artisan make:seeder UserSeeder
```
```
php artisan make:seeder TagSeeder
```
```
php artisan make:seeder PostSeeder
```

In database/seeds/DatabaseSeeder.php (l'ordine è importante!):
```php
public function run()
{
    $this->call(UserSeeder::class);
    $this->call(TagSeeder::class);
    $this->call(PostSeeder::class);
}
```
ora è possibile eseguire i seeder con:
```
php artisan db:seed
```
oppure ripristinare il database (cancellare tutte le tabelle, fare le migration e fare i seeder) con:
```
php artisan migrate:fresh --seed
```

**Controllers**
```
php artisan make:controller Admin/PageController
```
```
php artisan make:controller Admin/PostController --resource --model=Post
```

**Routes**
(L'ordine è importante)
```php
// frontoffice
Route::get('/', 'Guest\PageController@home')->name('guest.home');
Route::get('/posts', 'Guest\PostController@index')->name('guest.posts.index');
Route::get('/posts/{post}', 'Guest\PostController@show')->name('guest.posts.show');

Auth::routes();

// backoffice
Route::middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', 'PageController@dashboard')->name('dashboard');
        Route::resource('posts', 'PostController')->except(['show']);
    });

// Route::get('{any?}', function () {
//     return view('guest.home');
// })->where("any", ".*")->name('guest.home');
```
Controllare le routes con:
```
php artisan route:list --columns=Method,URI,Name,Action
```

**Comandi utitli**
```
php artisan list
```
```
php artisan route:list --columns=Method,URI,Name,Action
```
```
composer dump-autoload
```
```
php artisan migrate:fresh --seed
```
```
php artisan tinker
```
```
php artisan vendor:publish
```
