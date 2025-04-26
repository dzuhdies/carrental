<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function create(Car $car, Request $request)
{
    $startDate = $request->start_date;  
    $endDate = $request->end_date;

    return view('user.bookings.create', compact('car', 'startDate', 'endDate'));
}

    public function store(Request $request, Car $car)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $days = now()->parse($request->start_date)->diffInDays(now()->parse($request->end_date)) + 1;
        $total = $car->price_per_day * $days;

        Booking::create([
            'user_id' => Auth::id(),
            'car_id' => $car->id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'total_price' => $total,
            'status' => 'pending',
        ]);

        return redirect()->route('bookings.my')->with('success', 'Booking berhasil, tunggu konfirmasi admin');
    }

    public function myBookings()
{
    $bookings = Auth::user()->bookings()->with('car')->get();
    return view('user.bookings.my', compact('bookings'));
}

    public function adminIndex()
    {
        $bookings = \App\Models\Booking::with('user', 'car')->orderBy('start_date', 'desc')->get();
        return view('admin.bookings.index', compact('bookings'));
    }
    
    
}
