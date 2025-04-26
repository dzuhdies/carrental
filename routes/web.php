<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Car;
use App\Models\User;
use App\Models\Booking;

Route::get('/', fn() => view('auth.login'))->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', fn() => view('auth.register'));
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/dashboard', function () {
    if (Auth::user()->role == 'admin') {
        $totalCars = Car::count();
        $totalUsers = User::where('role', 'user')->count();
        $totalEarnings = Booking::whereMonth('start_date', Carbon::now()->month)
                                ->whereYear('start_date', Carbon::now()->year)
                                ->sum('total_price');

        $topCars = Car::withCount('bookings')
            ->orderByDesc('bookings_count')
            ->limit(10)
            ->get();

        return view('admin.dashboard', compact('totalCars', 'topCars', 'totalEarnings', 'totalUsers'));
    } else {
        return view('user.dashboard');
    }
})->middleware('auth')->name('dashboard');



Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
    Route::get('/cars/{car}/booking', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/cars/{car}/booking', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/my-bookings', [BookingController::class, 'myBookings'])->name('bookings.my');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/cars', [CarController::class, 'index'])->name('admin.cars.index');
    Route::get('/cars/create', [CarController::class, 'create'])->name('admin.cars.create');
    Route::post('/cars', [CarController::class, 'store'])->name('admin.cars.store');
    Route::get('/cars/{car}/edit', [CarController::class, 'edit'])->name('admin.cars.edit');
    Route::put('/cars/{car}', [CarController::class, 'update'])->name('admin.cars.update');
    Route::delete('/cars/{car}', [CarController::class, 'destroy'])->name('admin.cars.destroy');
    Route::get('/bookings', [BookingController::class, 'adminIndex'])->name('admin.bookings.index');
});
