<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\front\ {

    FrontendController,
    LikeControlller,
    CommentController,
    LoginController
};

use App\Http\Controllers\back\ {

    BackendController,
    UserController,
    PostController,
    RoleController,
    TagController,
    CategoryController,
    BadWordController,
    PermissionController,
    PermissionRoleController

};

//Route::pattern('id', '[0-9]+');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';



//INDEX
    Route::get('/', [ FrontendController::class, 'index'])->name('index');


//SINGLE POST
    Route::get('/post/single/{postID}', [ FrontendController::class, 'single'])->name('singlePost');

//COMMENTS - FRONT
    Route::group(['prefix' => '/user/comment'], function (){

        Route::post('/store/{postID}', [ CommentController::class, 'store'])->name('storeComment');
        Route::get('/confirm/view/{commentID}', [ CommentController::class, 'confirmCommentView'])->name('confirmCommentView');
        Route::post('/confirm/{commentID}/{selector}', [ CommentController::class, 'confirm'])->name('confirmComment');
        Route::delete('/delete/{commentID}/{postID}', [ CommentController::class, 'destroy'])->name('frontDeleteComment');
        Route::get('/edit/{commentID}/{postID}', [ CommentController::class, 'edit'])->name('frontEditComment');
        Route::put('/update/{commentID}/{postID}', [ CommentController::class, 'update'])->name('frontUpdateComment');

    });

//SINGLE CATEGORY
    Route::get('/category/{cat}', [ FrontendController::class, 'category'])->name('singleCategory');


//LIKES
    Route::post('/post/like/{postID}', [ LikeControlller::class, 'like'])->name('likePost');
    Route::delete('/post/unlike/{postID}', [ LikeControlller::class, 'unlike'])->name('unlikePost');




//MY LOGOUT
Route::get('/logout', [ LoginController::class, 'logout'])->name('myLogout');


//ADMIN ROUTES
Route::group(['middleware' => [ 'auth', 'admin']], function (){


//USERS
    Route::group(['prefix' => '/users' ], function (){

        Route::get('/all', [ UserController::class, 'index'])->name('allUsers');
        Route::get('/create-view', [ UserController::class, 'create'])->name('createUserView');
        Route::post('/create-user', [ UserController::class, 'store'])->name('createUser');
        Route::delete('/delete/{userID}', [ UserController::class, 'destroy'])->name('deleteUser');
        Route::get('/edit/{userID}', [ UserController::class, 'edit'])->name('editUser');
        Route::patch('/update/{userID}', [ UserController::class, 'update'])->name('updateUser');
        Route::patch('/update-password/{userID}', [ UserController::class, 'updatePassword'])->name('updateUserPassword');

    });


//NEWS - POSTS
    Route::group(['prefix' => '/posts' ], function (){

        Route::get('/all', [ PostController::class, 'index'])->name('allPosts');
        Route::get('/create-view', [ PostController::class, 'create'])->name('createPostView');
        Route::post('/create-post', [ PostController::class, 'store'])->name('createPost');
        Route::delete('/delete/{postID}', [ PostController::class, 'destroy'])->name('deletePost');
        Route::delete('/delete-file/{postID}/{fileID}', [ PostController::class, 'destroyFile'])->name('deletePostFile');
        Route::get('/pending', [ PostController::class, 'pending'])->name('pendingPosts');
        Route::get('/edit/{postID}', [ PostController::class, 'edit'])->name('editPost');
        Route::put('/update/{postID}', [ PostController::class, 'update'])->name('updatePost');
        Route::patch('/approve/{postID}', [ PostController::class, 'approve'])->name('approvePost');

    });

//ROLES
    Route::group(['prefix' => '/roles' ], function (){

        Route::get('/all', [ RoleController::class, 'index'])->name('allRoles');
        Route::get('/create-view', [ RoleController::class, 'create'])->name('createRoleView');
        Route::post('/create-role', [ RoleController::class, 'store'])->name('createRole');
        Route::delete('/delete/{roleID}', [ RoleController::class, 'destroy'])->name('deleteRole');
        Route::get('/edit/{roleID}', [ RoleController::class, 'edit'])->name('editRole');
        Route::put('/update/{roleID}', [ RoleController::class, 'update'])->name('updateRole');

    });


//TAGS
    Route::group(['prefix' => '/tags' ], function (){

        Route::get('/all', [ TagController::class, 'index'])->name('allTags');
        Route::get('/create-view', [ TagController::class, 'create'])->name('createTagView');
        Route::post('/create-tag', [ TagController::class, 'store'])->name('createTag');
        Route::delete('/delete/{tagID}', [ TagController::class, 'destroy'])->name('deleteTag');
        Route::get('/edit/{tagID}', [ TagController::class, 'edit'])->name('editTag');
        Route::put('/update/{tagID}', [ TagController::class, 'update'])->name('updateTag');

    });

//CATEGORIES
    Route::group(['prefix' => '/categories' ], function (){

        Route::get('/all', [ CategoryController::class, 'index'])->name('allCategories');
        Route::get('/create-view', [ CategoryController::class, 'create'])->name('createCategoryView');
        Route::post('/create-category', [ CategoryController::class, 'store'])->name('createCategory');
        Route::delete('/delete/{cat}', [ CategoryController::class, 'destroy'])->name('deleteCategory');
        Route::get('/edit/{cat}', [ CategoryController::class, 'edit'])->name('editCategory');
        Route::put('/update/{cat}', [ CategoryController::class, 'update'])->name('updateCategory');

    });


//FORBIDDEN WORDS
    Route::group(['prefix' => '/forbidden-words' ], function (){

        Route::get('/all', [ BadWordController::class, 'index'])->name('allForbiddenWords');
        Route::get('/create-view', [ BadWordController::class, 'create'])->name('createForbiddenWordView');
        Route::post('/create-forbidden-word', [ BadWordController::class, 'store'])->name('createForbiddenWord');
        Route::delete('/delete/{bw}', [ BadWordController::class, 'destroy'])->name('deleteForbiddenWord');
        Route::get('/edit/{bw}', [ BadWordController::class, 'edit'])->name('editForbiddenWord');
        Route::put('/update/{bw}', [ BadWordController::class, 'update'])->name('updateForbiddenWord');

    });


//COMMENTS
    Route::group(['prefix' => '/comments' ], function (){

        Route::get('/all', [\App\Http\Controllers\back\CommentController::class, 'index'])->name('allComments');
        Route::delete('/delete/{com}', [\App\Http\Controllers\back\CommentController::class, 'destroy'])->name('deleteComment');

    });

//PERMISSIONS
    Route::group(['prefix' => '/permissions' ], function (){

        Route::get('/all', [ PermissionController::class, 'index'])->name('allPermissions');
        Route::get('/create-view', [ PermissionController::class, 'create'])->name('createPermissionView');
        Route::post('/create-permission', [ PermissionController::class, 'store'])->name('createPermission');
        Route::delete('/delete/{permissionID}', [ PermissionController::class, 'destroy'])->name('deletePermission');
        Route::get('/edit/{permissionID}', [ PermissionController::class, 'edit'])->name('editPermission');
        Route::put('/update/{permissionID}', [ PermissionController::class, 'update'])->name('updatePermission');

    });

//PERMISSIONS ROLES
    Route::group(['prefix' => '/permissions-roles' ], function (){

        Route::get('/all', [ PermissionRoleController::class, 'index'])->name('allPermissionRoles');
        Route::get('/permissions/{prID}', [ PermissionRoleController::class, 'show'])->name('showPermissions');
        Route::put('/update', [ PermissionRoleController::class, 'update'])->name('updatePermissionRole');

    });

//SEARCH
    Route::get('/search', [ BackendController::class, 'search'])->name('search');

});
