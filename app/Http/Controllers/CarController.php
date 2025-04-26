<?php


namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    public function index(Request $request)
{
    $cars = Car::query();

    if ($request->filled('start_date') && $request->filled('end_date')) {
        $start = $request->start_date;
        $end = $request->end_date;

        $cars->whereDoesntHave('bookings', function ($q) use ($start, $end) {
            $q->where(function ($query) use ($start, $end) {
                $query->whereBetween('start_date', [$start, $end])
                      ->orWhereBetween('end_date', [$start, $end])
                      ->orWhere(function ($query) use ($start, $end) {
                          $query->where('start_date', '<=', $start)
                                ->where('end_date', '>=', $end);
                      });
            });
        });
    }

    $cars = $cars->get();

    if (Auth::user()->role == 'admin') {
        return view('admin.cars.index', compact('cars'));
    } else {
        return view('user.cars.index', compact('cars'));
    }
}
    public function create() {
        return view('admin.cars.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'year' => 'required',
            'capacity' => 'required|integer',
            'price_per_day' => 'required|numeric',
        ]);

        Car::create($request->all());
        return redirect()->route('admin.cars.index')->with('success', 'Mobil berhasil ditambahkan');
    }

    public function edit(Car $car)
    {
        return view('admin.cars.edit', compact('car'));
    }

    public function update(Request $request, Car $car)
    {
        $car->update($request->all());
        return redirect()->route('admin.cars.index')->with('success', 'Mobil diperbarui');
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return back()->with('success', 'Mobil dihapus');
    }
}

