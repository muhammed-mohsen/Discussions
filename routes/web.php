<?php

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
Route::get('/discuss', function () {
    return view('discuss');
});

Auth::routes();
Route::get(
    'discussion/{slug}',
    [
        'uses' => 'DiscussionsController@show',
        'as' => 'discussion',

    ]
);

Route::get('/forum', [
    'uses'=>'ForumController@index',
    'as'=>'forum',
]);
Route::get('{provider}/auth',['uses'=>'socialsController@auth',
'as'=>'social.auth',
]);
Route::get('/{provider}/redirect',[
'uses'=>'SocialsController@auth_callback',
'as'=>'social.callback',]
);

// Route::group(['middleware'=>'auth'],funtion(){

//     Route::resource('channels','ChannelController');
// });

Route::get('/channel/{slug}',[
    'uses'=>'ForumController@channel',
    'as'=>'channel',
    
]);



Route::group(['middleware' => 'auth'], function () {

    Route::resource('channels','ChannelController');
    
    Route::get('discussion/create/new',[
        'uses'=>'DiscussionsController@create',
        'as'=>'discussion.create',
        
    ]);
    Route::get('discussion/edit/{slug}',[
        'uses'=>'DiscussionsController@edit',
        'as'=>'discussion.edit',
        
    ]);
    Route::post(
        'discussions/update/{discussion}',
        [
            'uses' => 'DiscussionsController@update',
            'as' => 'discussion.update',
        ]
    );
    Route::get('reply/{reply}',[
        'uses'=>'RepliesController@edit',
        'as'=>'reply.edit',
        
    ]);
    Route::post(
        'reply/update/{reply}',
        [
            'uses' => 'RepliesController@update',
            'as' => 'reply.update',
        ]
    );
  
     Route::post('discussions/store',
     [
         'uses'=>'DiscussionsController@store',
         'as'=>'discussion.store',
     ]);
  
     Route::post('discussion/rply/{reply}',[
         'uses'=>'ForumController@reply',
         'as'=>'discussion.reply',
         
     ]);

     Route::get('/reply/like/{reply}',[
         'uses'=>'RepliesController@like',
         'as'=>'reply.like',
         
     ]);
    Route::get('/reply/unlike/{reply}', [
        'uses' => 'RepliesController@unlike',
        'as' => 'reply.unlike',

    ]);
    Route::get('/discussion/watcher/{id}',[
        'uses'=>'WatchersController@watch',
        'as'=>'discussion.watch',     
    ]);
    Route::get('/discussion/unwatcher/{id}',[
        'uses'=>'WatchersController@unwatch',
        'as'=>'discussion.unwatch',     
    ]);
    Route::get('/discussion/best-answer/{id}',[
        'uses'=>'RepliesController@best_answer',
        'as'=>'discussion.best.asnwer',     
    ]);

});