<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    CartController,
    ClientController,
    AuthController,
    DashboardController,
    RegisterController,
    LoginController,
    HomeController,
    modifController,
    DetprodController,
    UserController,
    ProductController,
    OrdersController,
    OrderController,
    PaymentController,
    ProfileController,
    ProfileeController
};

// ------------------- PUBLIC ROUTES -------------------
Route::get('/', function () {
    return view('shop');
})->name('shop');




Route::get('/signin', [LoginController::class, 'showLoginForm'])->name('signin');
Route::post('/signin', [LoginController::class, 'login'])->name('signin.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

Route::post('/role-selection', [RegisterController::class, 'redirectToRoleSignup'])->name('role.redirect');
Route::get('/signup/client', [RegisterController::class, 'showClientSignupForm'])->name('signup.client');
Route::get('/signup/boutique', [RegisterController::class, 'showBoutiqueSignupForm'])->name('signup.boutique');

// ------------------- CLIENT ROUTES -------------------



Route::get('/welcome-client', [ProductController::class, 'welcomeClient'])->name('welcome-client');

    // Commandes / Panier
    Route::get('/detorder', [CartController::class, 'index'])->name('detorder.index');
    Route::post('/detorder/add', [CartController::class, 'add'])->name('detorder.add');
    Route::delete('/detorder/remove', [CartController::class, 'remove'])->name('detorder.remove');
    Route::get('/detorder/payment', [CartController::class, 'payment'])->name('detorder.payment');
    Route::post('/detorder/process-payment', [CartController::class, 'processPayment'])->name('detorder.process_payment');
    Route::get('/detorder/success', [CartController::class, 'success'])->name('detorder.success');
    Route::post('/orders/confirm', [OrdersController::class, 'confirm'])->name('orders.confirm');


// ------------------- BOUTIQUE ROUTES -------------------
Route::middleware(['auth', 'role:boutique'])->group(function () {
    Route::get('/welcome-boutique', [HomeController::class, 'welcomeboutique'])->name('welcomeb');

    // Gestion produits
    Route::get('/addproduct', [ProductController::class, 'create'])->name('addproduct');
    Route::post('/addproduct', [ProductController::class, 'store'])->name('products.store');

    Route::get('/product/add', [ProductController::class, 'createForm'])->name('product.add');
    Route::post('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::get('/product/{id}/edit', [ProductController::class, 'editForm'])->name('product.edit');
    Route::put('/product/{id}/update', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/{id}/delete', [ProductController::class, 'delete'])->name('product.delete');

;
});

// ------------------- ADMIN ROUTES -------------------
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'admin'])->name('admin.dashboard');
    Route::resource('users', UserController::class);
});

// ------------------- PROFIL ROUTES -------------------
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileeController::class, 'index'])->name('profile.index');
    Route::put('/profile', [ProfileeController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileeController::class, 'updatePassword'])->name('profile.password');

    Route::get('/modiprofil', [modifController::class, 'edit'])->name('modiprofil');
    Route::get('/detprod', [DetprodController::class, 'edit'])->name('detprod');
    Route::get('/parab', [ProfileController::class, 'parab'])->name('parab');
});

// ------------------- PAIEMENT -------------------
Route::middleware(['auth'])->group(function () {
    Route::get('/paiement', function () {
        return view('paiement');
    })->name('payment.page');

    Route::post('/detorder/process-payment', [PaymentController::class, 'processPayment'])
        ->name('detorder.process_payment');
});

// ------------------- AUTH SOCIAL -------------------
Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('auth.google.callback');

Route::get('/auth/github', [AuthController::class, 'redirectToGitHub'])->name('auth.github');
Route::get('/auth/github/callback', [AuthController::class, 'handleGitHubCallback'])->name('auth.github.callback');

// ------------------- AUTRES ROUTES STATIQUES -------------------
Route::get('/shop', function () { return view('shop'); });
Route::get('/order', function () { return view('order'); })->name('order');
Route::get('/addproduct2', function () { return view('addproduct'); })->name('addproduct2');
Route::get('/parametre', function () { return view('parametre'); })->name('parametre');
Route::get('/payment', function () { return view('payment'); })->name('payment');
Route::get('/sellers', function () { return view('sellers'); })->name('sellers');
Route::get('/stat', function () { return view('stat'); })->name('stat');
Route::get('/gest', function () { return view('gest'); })->name('gest');
Route::get('/tab', function () { return view('tab'); })->name('tab');
Route::get('/orr', function () { return view('orr'); })->name('orr');
Route::get('/parab', function () { return view('parab'); })->name('parab');
    Route::get('/produits', [ProductController::class, 'listProducts'])->name('products.index');
    Route::get('/produit/{id}', [ProductController::class, 'show'])->name('product.show');



Route::middleware(['auth'])->get('/orr', [OrderController::class, 'index'])->name('orr');

Route::middleware(['auth'])->group(function () {
    Route::get('/orderdetails/{id}/edit', [OrdersController::class, 'edit'])
        ->name('orderdetails.edit');

    Route::delete('/orderdetails/{id}', [OrdersController::class, 'destroy'])
        ->name('orderdetails.destroy');
});

Route::get('/order', function () {
    return view('order');
});

Route::get('/orr', [OrdersController::class, 'index'])->name('orders.client');

// Pour boutique
Route::get('/order', [OrdersController::class, 'boutiqueIndex'])->name('orders.boutique');

// Détails d’une commande
Route::get('/orders/{id}', [OrdersController::class, 'show'])->name('orders.show');

// Modifier une commande
Route::get('/orders/{id}/edit', [OrdersController::class, 'edit'])->name('orders.edit');

// Mise à jour
Route::put('/orders/{id}', [OrdersController::class, 'update'])->name('orders.update');

// Suppression
Route::delete('/orders/{id}', [OrdersController::class, 'destroy'])->name('orders.destroy');

// Confirmation
Route::post('/orders/confirm', [OrdersController::class, 'confirm'])->name('orders.confirm');


Route::get('/profile', [ProfileController::class, 'show'])->name('show');
Route::put('/profile', [ProfileController::class, 'update'])->name('show.update');
