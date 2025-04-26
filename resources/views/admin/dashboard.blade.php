<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --secondary: #f3f4f6;
            --light: #ffffff;
            --dark: #111827;
            --text-primary: #1f2937;
            --text-secondary: #6b7280;
            --danger: #ef4444;
            --success: #10b981;
            --warning: #f59e0b;
            --border: #e5e7eb;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        }
        
        body {
            background-color: #f9fafb;
            color: var(--text-primary);
            line-height: 1.5;
        }
        
        .layout {
            display: flex;
            min-height: 100vh;
        }
        
        .sidebar {
            width: 250px;
            background-color: var(--light);
            border-right: 1px solid var(--border);
            padding: 1.5rem;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
        }
        
        .brand {
            display: flex;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--border);
        }
        
        .brand-logo {
            background-color: var(--primary);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 0.75rem;
        }
        
        .brand-text {
            font-weight: 700;
            font-size: 1.25rem;
            color: var(--dark);
        }
        
        .nav-menu {
            list-style: none;
            margin-bottom: 2rem;
        }
        
        .nav-item {
            margin-bottom: 0.5rem;
        }
        
        .nav-link {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            color: var(--text-secondary);
            text-decoration: none;
            transition: all 0.2s ease;
        }
        
        .nav-link:hover {
            background-color: var(--secondary);
            color: var(--primary);
        }
        
        .nav-link.active {
            background-color: var(--primary);
            color: var(--light);
        }
        
        .nav-icon {
            margin-right: 0.75rem;
        }
        
        .content {
            flex: 1;
            margin-left: 250px;
            padding: 2rem;
        }
        
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--border);
        }
        
        .welcome {
            font-weight: 600;
            color: var(--text-primary);
        }
        
        .logout-btn {
            background-color: var(--light);
            color: var(--text-primary);
            border: 1px solid var(--border);
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            cursor: pointer;
            transition: all 0.2s ease;
            font-size: 0.875rem;
            display: flex;
            align-items: center;
        }
        
        .logout-btn:hover {
            background-color: var(--danger);
            color: var(--light);
            border-color: var(--danger);
        }
        
        .logout-icon {
            margin-right: 0.5rem;
        }
        
        .dashboard-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .card {
            background-color: var(--light);
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
        }
        
        .card-title {
            font-size: 1rem;
            font-weight: 600;
            color: var(--text-secondary);
            margin-bottom: 1rem;
        }
        
        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }
        
        .stat-label {
            color: var(--text-secondary);
            font-size: 0.875rem;
        }
        
        .card-icon {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--primary);
            color: var(--light);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0.8;
        }
        
        .section-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: var(--text-primary);
        }
        
        .table-container {
            background-color: var(--light);
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        thead {
            background-color: var(--secondary);
        }
        
        th {
            padding: 1rem;
            text-align: left;
            font-weight: 600;
            font-size: 0.875rem;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        
        td {
            padding: 1rem;
            border-top: 1px solid var(--border);
            font-size: 0.875rem;
        }
        
        .rank {
            font-weight: 600;
            text-align: center;
        }
        
        .car-name {
            font-weight: 500;
        }
        
        .booking-count {
            font-weight: 600;
            text-align: right;
        }
        
        .empty-message {
            text-align: center;
            padding: 2rem;
            color: var(--text-secondary);
        }
        
        .badge {
            display: inline-block;
            padding: 0.25rem 0.5rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 500;
        }
        
        .badge-primary {
            background-color: rgba(79, 70, 229, 0.1);
            color: var(--primary);
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .sidebar {
                width: 80px;
                padding: 1rem;
            }
            
            .brand-text,
            .nav-text {
                display: none;
            }
            
            .brand {
                justify-content: center;
            }
            
            .brand-logo {
                margin-right: 0;
            }
            
            .nav-link {
                justify-content: center;
                padding: 0.75rem;
            }
            
            .nav-icon {
                margin-right: 0;
            }
            
            .content {
                margin-left: 80px;
            }
        }
        
        @media (max-width: 768px) {
            .layout {
                flex-direction: column;
            }
            
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                padding: 1rem;
                border-right: none;
                border-bottom: 1px solid var(--border);
            }
            
            .nav-menu {
                display: flex;
                justify-content: space-between;
                margin-bottom: 0;
            }
            
            .nav-item {
                margin-bottom: 0;
                flex: 1;
            }
            
            .brand-text {
                display: block;
            }
            
            .nav-text {
                display: none;
            }
            
            .nav-link {
                justify-content: center;
                padding: 0.5rem;
            }
            
            .content {
                margin-left: 0;
                padding: 1rem;
            }
            
            .dashboard-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="layout">
        <div class="sidebar">
            <div class="brand">
                <div class="brand-logo">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="3" y1="9" x2="21" y2="9"></line>
                        <line x1="9" y1="21" x2="9" y2="9"></line>
                    </svg>
                </div>
                <div class="brand-text">CarRental Admin</div>
            </div>
            
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="#" class="nav-link active">
                        <span class="nav-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                        </span>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.cars.index') }}" class="nav-link">
                        <span class="nav-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"></path>
                                <circle cx="7" cy="17" r="2"></circle>
                                <circle cx="17" cy="17" r="2"></circle>
                            </svg>
                        </span>
                        <span class="nav-text">Kelola Mobil</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.bookings.index') }}" class="nav-link">
                        <span class="nav-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                                <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                                <path d="M9 14l2 2 4-4"></path>
                            </svg>
                        </span>
                        <span class="nav-text">Booking</span>
                    </a>
                </li>
            </ul>
        </div>
        
        <div class="content">
            <div class="header">
                <h1 class="welcome">Selamat datang, Admin!</h1>
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <span class="logout-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                <polyline points="16 17 21 12 16 7"></polyline>
                                <line x1="21" y1="12" x2="9" y2="12"></line>
                            </svg>
                        </span>
                        Logout
                    </button>
                </form>
            </div>
            
            <div class="dashboard-container">
                <div class="card" style="position: relative;">
                    <div class="card-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"></path>
                            <circle cx="7" cy="17" r="2"></circle>
                            <circle cx="17" cy="17" r="2"></circle>
                        </svg>
                    </div>
                    <h3 class="card-title">Unit Mobil</h3>
                    <div class="stat-value">{{ $totalCars }}</div>
                    <div class="stat-label">Total Unit Tersedia</div>
                </div>
                
                <div class="card" style="position: relative;">
                    <div class="card-icon" style="background-color: #10b981;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                            <line x1="8" y1="21" x2="16" y2="21"></line>
                            <line x1="12" y1="17" x2="12" y2="21"></line>
                        </svg>
                    </div>
                    <h3 class="card-title">Pendapatan</h3>
                    <div class="stat-value">
                        Rp {{ number_format($totalEarnings, 0, ',', '.') }}
                    </div>
                    <div class="stat-label">Bulan Ini</div>
                </div>
                
                <div class="card" style="position: relative;">
                    <div class="card-icon" style="background-color: #f59e0b;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                    </div>
                    <h3 class="card-title">Pelanggan</h3>
                    <div class="stat-value">
                        {{ $totalUsers }}
                    </div>
                    <div class="stat-label">Total Pelanggan</div>
                </div>
                
            
            <h2 class="section-title">Top 10 Mobil Paling Sering Disewa</h2>
            
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 10%;">No</th>
                            <th style="width: 60%;">Nama Mobil</th>
                            <th style="width: 30%;">Jumlah Disewa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($topCars as $car)
                            <tr>
                                <td class="rank">{{ $loop->iteration }}</td>
                                <td class="car-name">{{ $car->name }}</td>
                                <td class="booking-count">
                                    <span class="badge badge-primary">{{ $car->bookings_count }} kali</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="empty-message">Belum ada data penyewaan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>