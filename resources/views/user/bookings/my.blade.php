<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Booking | RentCar</title>
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
            --success-bg: #e8f7fc;
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
        
        .nav-links {
            display: flex;
            gap: 25px;
            align-items: center;
        }
        
        .nav-links a {
            text-decoration: none;
            color: var(--text-light);
            font-weight: 500;
            transition: color 0.3s;
            font-size: 0.95rem;
        }
        
        .nav-links a:hover {
            color: var(--primary);
        }
        
        .logout-btn {
            background-color: var(--primary-light);
            color: var(--primary);
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 0.95rem;
        }
        
        .logout-btn:hover {
            background-color: var(--primary);
            color: white;
        }
        
        .page-title {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 30px;
        }
        
        .alert-success {
            background-color: var(--success-bg);
            color: var(--text);
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .alert-success::before {
            content: "✓";
            color: var(--success);
            font-weight: bold;
        }
        
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            background-color: var(--card-bg);
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.03);
        }
        
        .empty-icon {
            font-size: 3rem;
            color: var(--text-light);
            margin-bottom: 20px;
        }
        
        .empty-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 10px;
        }
        
        .empty-description {
            color: var(--text-light);
            margin-bottom: 20px;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .empty-action {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 1rem;
            text-decoration: none;
            display: inline-block;
        }
        
        .empty-action:hover {
            background-color: #3a56d4;
            transform: translateY(-2px);
        }
        
        .bookings-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background-color: var(--card-bg);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.03);
        }
        
        .bookings-table thead th {
            background-color: var(--primary-light);
            color: var(--primary);
            font-weight: 600;
            text-align: left;
            padding: 15px 20px;
        }
        
        .bookings-table tbody tr {
            transition: background-color 0.3s;
        }
        
        .bookings-table tbody tr:hover {
            background-color: rgba(0,0,0,0.02);
        }
        
        .bookings-table tbody td {
            padding: 15px 20px;
            border-bottom: 1px solid var(--border);
        }
        
        .bookings-table tbody tr:last-child td {
            border-bottom: none;
        }
        
        .car-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .car-image {
            width: 60px;
            height: 40px;
            background-color: var(--bg);
            border-radius: 4px;
            overflow: hidden;
        }
        
        .car-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .car-name {
            font-weight: 500;
        }
        
        .car-brand {
            color: var(--text-light);
            font-size: 0.9rem;
        }
        
        .date-cell {
            font-weight: 500;
        }
        
        .price-cell {
            font-weight: 600;
            color: var(--primary);
        }
        
        .status-badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 0.8rem;
            font-weight: 500;
        }
        
        .status-active {
            background-color: #e8f5e9;
            color: #2e7d32;
        }
        
        .status-completed {
            background-color: #f5f5f5;
            color: #616161;
        }
        
        .mobile-booking {
            display: none;
            background-color: var(--card-bg);
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.03);
        }
        
        .mobile-booking-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }
        
        .mobile-car-name {
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .mobile-car-brand {
            color: var(--text-light);
            font-size: 0.9rem;
        }
        
        .mobile-booking-dates {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 15px;
        }
        
        .mobile-date-group {
            display: flex;
            flex-direction: column;
        }
        
        .mobile-date-label {
            font-size: 0.8rem;
            color: var(--text-light);
            margin-bottom: 5px;
        }
        
        .mobile-date-value {
            font-weight: 500;
        }
        
        .mobile-booking-price {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 15px;
            border-top: 1px solid var(--border);
        }
        
        .mobile-price-label {
            color: var(--text-light);
        }
        
        .mobile-price-value {
            font-weight: 600;
            color: var(--primary);
        }
        
        @media (max-width: 768px) {
            .bookings-table {
                display: none;
            }
            
            .mobile-booking {
                display: block;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container nav-container">
            <a href="/" class="logo">RentCar</a>
            <div class="nav-links">
                <a href="{{ route('cars.index') }}">Cari Mobil</a>
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <form action="/logout" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="logout-btn">Logout</button>
                </form>
            </div>
        </div>
    </header>
    
    <main class="container">
        <h1 class="page-title">Riwayat Booking Saya</h1>
        
        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        @if ($bookings->isEmpty())
            <div class="empty-state">
                <div class="empty-icon">📭</div>
                <h3 class="empty-title">Belum ada booking</h3>
                <p class="empty-description">Anda belum melakukan booking mobil. Temukan mobil yang sesuai dengan kebutuhan Anda.</p>
                <a href="{{ route('cars.index') }}" class="empty-action">Cari Mobil</a>
            </div>
        @else
            <table class="bookings-table">
                <thead>
                    <tr>
                        <th>Mobil</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                    <tr>
                        <td>
                            <div class="car-info">
                                <div>
                                    <div class="car-name">{{ $booking->car->name }}</div>
                                    <div class="car-brand">{{ $booking->car->brand }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="date-cell">
                            {{ \Carbon\Carbon::parse($booking->start_date)->format('d M Y') }}
                        </td>
                        <td class="date-cell">
                            {{ \Carbon\Carbon::parse($booking->end_date)->format('d M Y') }}
                        </td>
                        <td class="price-cell">
                            Rp {{ number_format($booking->total_price, 0, ',', '.') }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            @foreach ($bookings as $booking)
            <div class="mobile-booking">
                <div class="mobile-booking-header">
                    <div>
                        <div class="mobile-car-name">{{ $booking->car->name }}</div>
                        <div class="mobile-car-brand">{{ $booking->car->brand }}</div>
                    </div>
                </div>
                
                <div class="mobile-booking-dates">
                    <div class="mobile-date-group">
                        <div class="mobile-date-label">Mulai</div>
                        <div class="mobile-date-value">{{ \Carbon\Carbon::parse($booking->start_date)->format('d M Y') }}</div>
                    </div>
                    <div class="mobile-date-group">
                        <div class="mobile-date-label">Selesai</div>
                        <div class="mobile-date-value">{{ \Carbon\Carbon::parse($booking->end_date)->format('d M Y') }}</div>
                    </div>
                </div>
                
                <div class="mobile-booking-price">
                    <div class="mobile-price-label">Total Harga</div>
                    <div class="mobile-price-value">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</div>
                </div>
            </div>
            @endforeach
        @endif
    </main>
</body>
</html>