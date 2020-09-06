    <?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/posts','PostController');

//Route::get('/live-wire-posts','PostController@index_livewire');
Route::livewire('livewire/posts','posts');
Route::livewire('livewire/posts/create','create-post');
Route::livewire('livewire/posts/{post_id}/edit','edit-post');
Route::livewire('livewire/posts/{post_id}','show-post');
