<?php

use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MealPlanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipesController;
use App\Http\Controllers\StarterController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShoppingListController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;

// Public Routes
Route::get('/', [RecipesController::class, 'main'])->name('starter.index');
Route::get('/search', [RecipesController::class, 'search'])->name('search');
Route::get('/about', [StarterController::class, 'about'])->name('starter.about');
Route::get('/tags', [StarterController::class, 'tags'])->name('starter.tags');
Route::get('/categories', [StarterController::class, 'categories'])->name('starter.categories');
Route::get('/all/recipes', [StarterController::class, 'recipes'])->name('starter.recipes');
Route::get('/contact', [StarterController::class, 'contact'])->name('starter.contact');
// Route::get('/404', [StarterController::class, 'page404'])->name('starter.page404');
Route::post('/contact-send', [ContactController::class, 'sendContactForm'])->name('contact.send');
Route::post('/newsletter', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
Route::get('/unsubscribe/{email}/{token}', [NewsletterController::class, 'unsubscribe'])->name('unsubscribe');

// Authenticated User Routes
Route::middleware('auth')->group(function () {
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/collections', [CollectionController::class, 'show'])->name('profile.collections');
    Route::get('/collections/create', [CollectionController::class, 'createCollection'])->name('collections.create');
    Route::post('/collections/create', [CollectionController::class, 'storeCollection'])->name('collections.store');
    Route::post('/collections/{collectionId}/recipes/{recipeId}', [CollectionController::class, 'addRecipeToCollection'])->name('collections.addRecipeToCollection');
    Route::get('/collections/{id}', [CollectionController::class, 'showCollectionID'])->name('collections.showCollectionID');

    // Meal Plans
    Route::get('/mealplans/{id}', [MealPlanController::class, 'showPost'])->name('mealplan.post-page');
    Route::get('/create/mealplan', [MealPlanController::class, 'show'])->name('mealplan.show');
    Route::post('/create/mealplan', [MealPlanController::class, 'store'])->name('mealplan.store');
    Route::get('/mealplan', [MealPlanController::class, 'showMealPlans'])->name('mealplan.showMealPlans');
    Route::get('/addRecipeMealPlan/{mealPlanId}', [MealPlanController::class, 'addRecipeMealPlan'])->name('mealplan.addRecipeMealPlan');
    Route::post('/mealplans/addRecipe/{mealPlanId}', [MealPlanController::class, 'addRecipe'])->name('mealplans.addRecipe');

    // Shopping List
    Route::resource('shopping-list', ShoppingListController::class);
});

// Admin Routes
Route::group(['middleware' => [AdminMiddleware::class], 'prefix' => 'admin'], function () {
    Voyager::routes();
});

// Dashboard Route (Protected by Auth Middleware)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Newsletter Routes (Admin Only)
Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/send-newsletter', [NewsletterController::class, 'showNewsletterForm'])->name('newsletter.form');
    Route::post('/send-newsletter', [NewsletterController::class, 'sendNewsletter'])->name('newsletter.send');
});

// Comment Section Routes
Route::middleware(['auth'])->group(function () {
    Route::post('/comments', [CommentController::class, 'storeCommentAndReview'])->name('comments-and-reviews.store');
    Route::post('/replies', [CommentController::class, 'storeReply'])->name('replies.store');
    Route::post('/comments/mark-helpful/{comment}', [CommentController::class, 'markHelpful'])->name('comments.mark-helpful');
});

// Recipes Routes
Route::prefix('recipes')->name('recipes.')->group(function () {
    // Route::middleware(['auth', 'check-email-verification'])->group(function () {
        // Recipe Upload Routes
        Route::get('/upload-recipe', [RecipesController::class, 'index'])->name('index');
        Route::post('/upload-recipe', [RecipesController::class, 'store'])->name('store');
        Route::get('/user', [RecipesController::class, 'userRecipes'])->name('user.index');

        // Apply the recipes-ownership middleware to edit and update routes
        Route::middleware(['check-ownership'])->group(function () {
            Route::get('/edit/{id}', [RecipesController::class, 'edit'])->name('edit-recipe');
            Route::put('/update/{id}', [RecipesController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [RecipesController::class, 'destroy'])->name('delete');
        });
    // });

    // Public Recipes Routes
    Route::post('/{recipe_id}/upload-image', [RecipesController::class, 'uploadImage'])->name('uploadImage');
    Route::post('/{recipe}/favorite', [RecipesController::class, 'toggleFavorite'])->name('recipes.favorite');
    Route::get('/favorites', [UserController::class, 'favoriteRecipes'])->name('favorites.index');
    Route::get('/list/{tag}', [RecipesController::class, 'show_list'])->name('tag-template');
    Route::get('/categories/{category}', [RecipesController::class, 'show_category_list'])->name('category-list');
    Route::get('/{id}', [RecipesController::class, 'show'])->name('single-recipe');
    Route::get('/{recipe}/print', [RecipesController::class, 'print'])->name('print');
});

// Authentication Routes (Generated by Laravel)
require __DIR__ . '/auth.php';


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});