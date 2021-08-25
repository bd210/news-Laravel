<?php

use Illuminate\Support\Facades\Route;


Route::pattern('id', '[0-9]+');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';



//INDEX
    Route::get('/', [ \App\Http\Controllers\front\FrontendController::class, 'index'])->name('index');


//SINGLE POST
    Route::get('/post/single/{postID}', [\App\Http\Controllers\front\FrontendController::class, 'single'])->name('singlePost');

//COMMENTS - FRONT
    Route::group(['prefix' => '/user/comment'], function (){

        Route::post('/store/{postID}', [\App\Http\Controllers\front\CommentController::class, 'store'])->name('storeComment');
        Route::get('/confirm/view/{commentID}', [\App\Http\Controllers\front\CommentController::class, 'confirmCommentView'])->name('confirmCommentView');
        Route::post('/confirm/{commentID}/{selector}', [\App\Http\Controllers\front\CommentController::class, 'confirm'])->name('confirmComment');
        Route::delete('/delete/{commentID}/{postID}', [\App\Http\Controllers\front\CommentController::class, 'destroy'])->name('frontDeleteComment');
        Route::get('/edit/{commentID}/{postID}', [\App\Http\Controllers\front\CommentController::class, 'edit'])->name('frontEditComment');
        Route::put('/update/{commentID}/{postID}', [\App\Http\Controllers\front\CommentController::class, 'update'])->name('frontUpdateComment');

    });

//SINGLE CATEGORY
    Route::get('/category/{cat}', [\App\Http\Controllers\front\FrontendController::class, 'category'])->name('singleCategory');


//LIKES
    Route::post('/post/like/{postID}', [ \App\Http\Controllers\front\LikeControlller::class, 'like'])->name('likePost');
    Route::delete('/post/unlike/{postID}', [\App\Http\Controllers\front\LikeControlller::class, 'unlike'])->name('unlikePost');




//MY LOGOUT
Route::get('/logout', [\App\Http\Controllers\back\LoginController::class, 'logout'])->name('myLogout');


//ADMIN ROUTES
Route::group(['middleware' => [ 'auth', 'admin']], function (){


//USERS
    Route::group(['prefix' => '/users' ], function (){

        Route::get('/all', [\App\Http\Controllers\back\UserController::class, 'index'])->name('allUsers');
        Route::get('/create-view', [\App\Http\Controllers\back\UserController::class, 'create'])->name('createUserView');
        Route::post('/create-user', [\App\Http\Controllers\back\UserController::class, 'store'])->name('createUser');
        Route::delete('/delete/{userID}', [\App\Http\Controllers\back\UserController::class, 'destroy'])->name('deleteUser');
        Route::get('/edit/{userID}', [\App\Http\Controllers\back\UserController::class, 'edit'])->name('editUser');
        Route::patch('/update/{userID}', [\App\Http\Controllers\back\UserController::class, 'update'])->name('updateUser');
        Route::patch('/update-password/{userID}', [\App\Http\Controllers\back\UserController::class, 'updatePassword'])->name('updateUserPassword');

    });


//NEWS - POSTS
    Route::group(['prefix' => '/posts' ], function (){

        Route::get('/all', [\App\Http\Controllers\back\PostController::class, 'index'])->name('allPosts');
        Route::get('/create-view', [\App\Http\Controllers\back\PostController::class, 'create'])->name('createPostView');
        Route::post('/create-post', [\App\Http\Controllers\back\PostController::class, 'store'])->name('createPost');
        Route::delete('/delete/{postID}', [\App\Http\Controllers\back\PostController::class, 'destroy'])->name('deletePost');
        Route::delete('/delete-file/{postID}/{fileID}', [\App\Http\Controllers\back\PostController::class, 'destroyFile'])->name('deletePostFile');
        Route::get('/pending', [\App\Http\Controllers\back\PostController::class, 'pending'])->name('pendingPosts');
        Route::get('/edit/{postID}', [\App\Http\Controllers\back\PostController::class, 'edit'])->name('editPost');
        Route::put('/update/{postID}', [\App\Http\Controllers\back\PostController::class, 'update'])->name('updatePost');
        Route::patch('/approve/{postID}', [\App\Http\Controllers\back\PostController::class, 'approve'])->name('approvePost');

    });

//ROLES
    Route::group(['prefix' => '/roles' ], function (){

        Route::get('/all', [\App\Http\Controllers\back\RoleController::class, 'index'])->name('allRoles');
        Route::get('/create-view', [\App\Http\Controllers\back\RoleController::class, 'create'])->name('createRoleView');
        Route::post('/create-role', [\App\Http\Controllers\back\RoleController::class, 'store'])->name('createRole');
        Route::delete('/delete/{roleID}', [\App\Http\Controllers\back\RoleController::class, 'destroy'])->name('deleteRole');
        Route::get('/edit/{roleID}', [\App\Http\Controllers\back\RoleController::class, 'edit'])->name('editRole');
        Route::put('/update/{roleID}', [\App\Http\Controllers\back\RoleController::class, 'update'])->name('updateRole');

    });


//TAGS
    Route::group(['prefix' => '/tags' ], function (){

        Route::get('/all', [\App\Http\Controllers\back\TagController::class, 'index'])->name('allTags');
        Route::get('/create-view', [\App\Http\Controllers\back\TagController::class, 'create'])->name('createTagView');
        Route::post('/create-tag', [\App\Http\Controllers\back\TagController::class, 'store'])->name('createTag');
        Route::delete('/delete/{tagID}', [\App\Http\Controllers\back\TagController::class, 'destroy'])->name('deleteTag');
        Route::get('/edit/{tagID}', [\App\Http\Controllers\back\TagController::class, 'edit'])->name('editTag');
        Route::put('/update/{tagID}', [\App\Http\Controllers\back\TagController::class, 'update'])->name('updateTag');

    });

//CATEGORIES
    Route::group(['prefix' => '/categories' ], function (){

        Route::get('/all', [\App\Http\Controllers\back\CategoryController::class, 'index'])->name('allCategories');
        Route::get('/create-view', [\App\Http\Controllers\back\CategoryController::class, 'create'])->name('createCategoryView');
        Route::post('/create-category', [\App\Http\Controllers\back\CategoryController::class, 'store'])->name('createCategory');
        Route::delete('/delete/{cat}', [\App\Http\Controllers\back\CategoryController::class, 'destroy'])->name('deleteCategory');
        Route::get('/edit/{cat}', [\App\Http\Controllers\back\CategoryController::class, 'edit'])->name('editCategory');
        Route::put('/update/{cat}', [\App\Http\Controllers\back\CategoryController::class, 'update'])->name('updateCategory');

    });


//FORBIDDEN WORDS
    Route::group(['prefix' => '/forbidden-words' ], function (){

        Route::get('/all', [\App\Http\Controllers\back\BadWordController::class, 'index'])->name('allForbiddenWords');
        Route::get('/create-view', [\App\Http\Controllers\back\BadWordController::class, 'create'])->name('createForbiddenWordView');
        Route::post('/create-forbidden-word', [\App\Http\Controllers\back\BadWordController::class, 'store'])->name('createForbiddenWord');
        Route::delete('/delete/{bw}', [\App\Http\Controllers\back\BadWordController::class, 'destroy'])->name('deleteForbiddenWord');
        Route::get('/edit/{bw}', [\App\Http\Controllers\back\BadWordController::class, 'edit'])->name('editForbiddenWord');
        Route::put('/update/{bw}', [\App\Http\Controllers\back\BadWordController::class, 'update'])->name('updateForbiddenWord');

    });


//COMMENTS
    Route::group(['prefix' => '/comments' ], function (){

        Route::get('/all', [\App\Http\Controllers\back\CommentController::class, 'index'])->name('allComments');
        Route::delete('/delete/{com}', [\App\Http\Controllers\back\CommentController::class, 'destroy'])->name('deleteComment');

    });

//PERMISSIONS
    Route::group(['prefix' => '/permissions' ], function (){

        Route::get('/all', [\App\Http\Controllers\back\PermissionController::class, 'index'])->name('allPermissions');
        Route::get('/create-view', [\App\Http\Controllers\back\PermissionController::class, 'create'])->name('createPermissionView');
        Route::post('/create-permission', [\App\Http\Controllers\back\PermissionController::class, 'store'])->name('createPermission');
        Route::delete('/delete/{permissionID}', [\App\Http\Controllers\back\PermissionController::class, 'destroy'])->name('deletePermission');
        Route::get('/edit/{permissionID}', [\App\Http\Controllers\back\PermissionController::class, 'edit'])->name('editPermission');
        Route::put('/update/{permissionID}', [\App\Http\Controllers\back\PermissionController::class, 'update'])->name('updatePermission');

    });

//PERMISSIONS ROLES
    Route::group(['prefix' => '/permissions-roles' ], function (){

        Route::get('/all', [\App\Http\Controllers\back\PermissionRoleController::class, 'index'])->name('allPermissionRoles');
        Route::get('/permissions/{prID}', [\App\Http\Controllers\back\PermissionRoleController::class, 'show'])->name('showPermissions');
        Route::put('/update', [\App\Http\Controllers\back\PermissionRoleController::class, 'update'])->name('updatePermissionRole');

    });

//SEARCH
    Route::get('/search', [\App\Http\Controllers\back\BackendController::class, 'search'])->name('search');

});
