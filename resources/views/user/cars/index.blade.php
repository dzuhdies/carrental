<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Mobil | RentCar</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4361ee;
            --primary-light: #e6e9ff;
            --text: #2b2d42;
            --text-light: #8d99ae;
            --bg: #f8f9fa;
            --card-bg: #ffffff;
            --border: #e9ecef;
            --success: #4cc9f0;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--bg);
            color: var(--text);
            line-height: 1.6;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        header {
            background-color: var(--card-bg);
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            padding: 20px 0;
            margin-bottom: 40px;
        }
        
        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary);
            text-decoration: none;
        }
        
        .page-title {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 30px;
            color: var(--text);
        }
        
        .booking-form {
            background-color: var(--card-bg);
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.03);
            margin-bottom: 40px;
        }
        
        .form-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 20px;
            color: var(--text);
        }
        
        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }
        
        .form-group {
            display: flex;
            flex-direction: column;
        }
        
        label {
            font-size: 0.9rem;
            font-weight: 500;
            margin-bottom: 8px;
            color: var(--text-light);
        }
        
        input[type="date"] {
            padding: 12px 15px;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
            transition: border-color 0.3s;
        }
        
        input[type="date"]:focus {
            outline: none;
            border-color: var(--primary);
        }
        
        .search-btn {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 1rem;
        }
        
        .search-btn:hover {
            background-color: #3a56d4;
            transform: translateY(-2px);
        }
        
        .results-section {
            background-color: var(--card-bg);
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.03);
        }
        
        .results-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 20px;
            color: var(--text);
        }
        
        .car-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }
        
        .car-card {
            background-color: var(--card-bg);
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.03);
            transition: transform 0.3s, box-shadow 0.3s;
            border: 1px solid var(--border);
        }
        
        .car-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.05);
        }
        
        .car-name {
            font-size: 1.2rem;
            font-weight: 600;
            margin: 0 0 5px;
            color: var(--text);
        }
        
        .car-brand {
            font-size: 1rem;
            color: var(--text-light);
            margin: 0 0 10px;
        }
        
        .car-price {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--primary);
            margin: 0 0 15px;
        }
        
        .book-btn {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 0.9rem;
            text-decoration: none;
            display: inline-block;
        }
        
        .book-btn:hover {
            background-color: #3a56d4;
            transform: translateY(-2px);
        }
        
        .no-cars {
            color: var(--text-light);
            font-size: 1rem;
            text-align: center;
            padding: 30px 0;
        }
        
        .date-display {
            font-size: 0.9rem;
            color: var(--text-light);
            margin-bottom: 20px;
            font-style: italic;
        }
    </style>
</head>
<body>
    <header>
        <div class="container nav-container">
            <a href="/" class="logo">RentCar</a>
        </div>
    </header>
    
    <main class="container">
        <h1 class="page-title">Booking Mobil</h1>
        
        <div class="booking-form">
            <h2 class="form-title">Cari Mobil Tersedia</h2>
            <form method="GET" action="{{ route('cars.index') }}">
                <div class="form-grid">
                    <div class="form-group">
                        <label for="start_date">Tanggal Mulai</label>
                        <input type="date" id="start_date" name="start_date" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="end_date">Tanggal Selesai</label>
                        <input type="date" id="end_date" name="end_date" required>
                    </div>
                </div>
                <button type="submit" class="search-btn">Cari Mobil</button>
            </form>
        </div>
        
        @if(request()->filled('start_date') && request()->filled('end_date'))
        <div class="results-section">
            <h2 class="results-title">Mobil Tersedia</h2>
            <p class="date-display">
                Periode: {{ \Carbon\Carbon::parse(request('start_date'))->format('d M Y') }} - 
                {{ \Carbon\Carbon::parse(request('end_date'))->format('d M Y') }}
            </p>
            
            @if(count($cars) > 0)
                <div class="car-list">
                    @foreach($cars as $car)
                    <div class="car-card">
                        <h3 class="car-name">{{ $car->name }}</h3>
                        <p class="car-brand">{{ $car->brand }}</p>
                        <p class="car-price">Rp {{ number_format($car->price_per_day, 0, ',', '.') }}/hari</p>
                        <a href="{{ route('bookings.create', ['car' => $car->id, 'start_date' => request('start_date'), 'end_date' => request('end_date')]) }}" 
                           class="book-btn">
                            Booking Sekarang
                        </a>
                    </div>
                    @endforeach
                </div>
            @else
                <p class="no-cars">Tidak ada mobil tersedia di tanggal tersebut.</p>
            @endif
        </div>
        @endif
    </main>
</body>
</html>