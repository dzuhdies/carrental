<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Booking | RentCar</title>
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
            max-width: 800px;
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
            margin-bottom: 10px;
            color: var(--text);
        }
        
        .page-subtitle {
            color: var(--text-light);
            margin-bottom: 30px;
            font-size: 1rem;
        }
        
        .booking-container {
            display: grid;
            grid-template-columns: 1fr;
            gap: 30px;
        }
        
        @media (min-width: 768px) {
            .booking-container {
                grid-template-columns: 1fr 1fr;
            }
        }
        
        .car-details {
            background-color: var(--card-bg);
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.03);
            border: 1px solid var(--border);
        }
        
        .car-image {
            width: 100%;
            height: 200px;
            background-color: var(--bg);
            border-radius: 8px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-light);
            overflow: hidden;
        }
        
        .car-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .car-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin: 0 0 5px;
        }
        
        .car-subtitle {
            color: var(--text-light);
            margin: 0 0 20px;
            font-size: 1rem;
        }
        
        .price-display {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--primary);
            margin: 20px 0;
        }
        
        .detail-item {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid var(--border);
        }
        
        .detail-label {
            color: var(--text-light);
        }
        
        .detail-value {
            font-weight: 500;
        }
        
        .booking-form {
            background-color: var(--card-bg);
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.03);
            border: 1px solid var(--border);
        }
        
        .form-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 20px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            font-size: 0.9rem;
            font-weight: 500;
            margin-bottom: 8px;
            color: var(--text-light);
        }
        
        input[type="date"] {
            width: 100%;
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
        
        .submit-btn {
            width: 100%;
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 14px 24px;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 1rem;
            margin-top: 10px;
        }
        
        .submit-btn:hover {
            background-color: #3a56d4;
            transform: translateY(-2px);
        }
        
        .total-price {
            background-color: var(--primary-light);
            padding: 20px;
            border-radius: 8px;
            margin-top: 30px;
            text-align: center;
        }
        
        .total-label {
            color: var(--text-light);
            font-size: 0.9rem;
            margin-bottom: 5px;
        }
        
        .total-value {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary);
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
        <h1 class="page-title">Konfirmasi Booking</h1>
        <p class="page-subtitle">Silakan periksa detail mobil dan lengkapi informasi booking Anda</p>
        
        <div class="booking-container">
            <div class="car-details">
                <h2 class="car-title">{{ $car->brand }} {{ $car->name }}</h2>
                <p class="car-subtitle">Tersedia untuk disewa</p>
                
                <div class="price-display">
                    Rp {{ number_format($car->price_per_day, 0, ',', '.') }} <span style="font-size: 1rem; color: var(--text-light)">/hari</span>
                </div>
            
            
            <div class="booking-form">
                <h3 class="form-title">Detail Penyewaan</h3>
                <form method="POST" action="{{ route('bookings.store', $car) }}">
                    @csrf
                    
                    <div class="form-group">
                        <label for="start_date">Tanggal Mulai</label>
                        <input type="date" id="start_date" name="start_date" value="{{ $startDate }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="end_date">Tanggal Selesai</label>
                        <input type="date" id="end_date" name="end_date" value="{{ $endDate }}" required>
                    </div>
                    
                    <div class="total-price">
                        <div class="total-label">Total Perkiraan</div>
                        <div class="total-value">Rp {{ number_format($car->price_per_day, 0, ',', '.') }}</div>
                    </div>
                    
                    <button type="submit" class="submit-btn">Konfirmasi Booking</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>