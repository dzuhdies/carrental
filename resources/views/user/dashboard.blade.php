<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
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
            position: sticky;
            top: 0;
            z-index: 100;
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
        
        .dashboard-header {
            margin: 40px 0 30px;
        }
        
        .welcome-card {
            background-color: var(--card-bg);
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.03);
            margin-bottom: 30px;
        }
        
        .welcome-title {
            font-size: 1.8rem;
            font-weight: 600;
            margin: 0 0 10px;
        }
        
        .welcome-subtitle {
            color: var(--text-light);
            margin: 0;
            font-size: 1rem;
        }
        
        .quick-actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }
        
        .action-card {
            background-color: var(--card-bg);
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.03);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .action-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.05);
        }
        
        .action-icon {
            background-color: var(--primary-light);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            color: var(--primary);
            font-size: 1.5rem;
        }
        
        .action-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin: 0 0 10px;
        }
        
        .action-desc {
            color: var(--text-light);
            margin: 0 0 15px;
            font-size: 0.9rem;
        }
        
        .action-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
        }
        
        .action-link:hover {
            text-decoration: underline;
        }
        
        .action-link svg {
            margin-left: 5px;
            transition: transform 0.3s;
        }
        
        .action-link:hover svg {
            transform: translateX(3px);
        }
    </style>
</head>
<body>
    <header>
        <div class="container nav-container">
            <div class="logo">RentCar</div>
            <div class="nav-links">
                <a href="{{ route('cars.index') }}">Cari Mobil</a>
                <a href="{{ route('bookings.my') }}">Riwayat Booking</a>
                <form action="/logout" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="logout-btn">Logout</button>
                </form>
            </div>
        </div>
    </header>
    
    <main class="container">
        <div class="dashboard-header">
            <div class="welcome-card">
                <h1 class="welcome-title">Selamat datang, {{ Auth::user()->name }}!</h1>
                <p class="welcome-subtitle">Apa yang ingin Anda lakukan hari ini?</p>
            </div>
            
            <div class="quick-actions">
                <div class="action-card">
                    <div class="action-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                    </div>
                    <h3 class="action-title">Cari Mobil</h3>
                    <p class="action-desc">Temukan mobil yang sesuai dengan kebutuhan perjalanan Anda</p>
                    <a href="{{ route('cars.index') }}" class="action-link">
                        Mulai mencari
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
                
                <div class="action-card">
                    <div class="action-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                            <polyline points="10 9 9 9 8 9"></polyline>
                        </svg>
                    </div>
                    <h3 class="action-title">Riwayat Booking</h3>
                    <p class="action-desc">Lihat dan kelajari semua riwayat pemesanan mobil Anda</p>
                    <a href="{{ route('bookings.my') }}" class="action-link">
                        Lihat riwayat
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>