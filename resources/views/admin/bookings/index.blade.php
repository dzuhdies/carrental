<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Booking Mobil</title>
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
            --info: #3b82f6;
            --border: #e5e7eb;
            --pending: #f59e0b;
            --completed: #10b981;
            --cancelled: #ef4444;
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
        
        .page-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-primary);
        }
        
        .header-actions {
            display: flex;
            gap: 0.5rem;
        }
        
        .btn {
            display: inline-flex;
            align-items: center;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            font-weight: 500;
            font-size: 0.875rem;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
        }
        
        .btn-primary {
            background-color: var(--primary);
            color: var(--light);
            border: 1px solid var(--primary);
        }
        
        .btn-primary:hover {
            background-color: var(--primary-hover);
            border-color: var(--primary-hover);
        }
        
        .btn-outline {
            background-color: transparent;
            color: var(--text-primary);
            border: 1px solid var(--border);
        }
        
        .btn-outline:hover {
            background-color: var(--secondary);
        }
        
        .btn-danger {
            background-color: var(--danger);
            color: var(--light);
            border: 1px solid var(--danger);
        }
        
        .btn-danger:hover {
            background-color: #dc2626;
            border-color: #dc2626;
        }
        
        .btn-icon {
            margin-right: 0.5rem;
        }
        
        .table-container {
            background-color: var(--light);
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 2rem;
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
            vertical-align: middle;
        }
        
        .index-col {
            width: 5%;
            text-align: center;
            font-weight: 600;
        }
        
        .user-col, .car-col {
            width: 15%;
        }
        
        .date-col {
            width: 15%;
        }
        
        .price-col {
            width: 15%;
            font-weight: 600;
        }
        
        .status-col {
            width: 10%;
        }
        
        .status-badge {
            display: inline-block;
            padding: 0.25rem 0.5rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 500;
            text-align: center;
        }
        
        .status-pending {
            background-color: rgba(245, 158, 11, 0.1);
            color: var(--pending);
        }
        
        .status-completed {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--completed);
        }
        
        .status-cancelled {
            background-color: rgba(239, 68, 68, 0.1);
            color: var(--cancelled);
        }
        
        .empty-message {
            text-align: center;
            padding: 2rem;
            color: var(--text-secondary);
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
        
        /* Filter Form */
        .filter-container {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
            align-items: center;
            flex-wrap: wrap;
        }
        
        .filter-input {
            padding: 0.5rem 0.75rem;
            border: 1px solid var(--border);
            border-radius: 0.5rem;
            font-size: 0.875rem;
            min-width: 150px;
        }
        
        .filter-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 2px rgba(79, 70, 229, 0.1);
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
            
            .table-container {
                overflow-x: auto;
            }
            
            .filter-container {
                flex-direction: column;
                align-items: stretch;
            }
            
            .filter-input {
                width: 100%;
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
                    <a href="/dashboard" class="nav-link">
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
                    <a href="{{ route('admin.bookings.index') }}" class="nav-link active">
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
                <h1 class="page-title">Daftar Booking Mobil</h1>
                <div class="header-actions">
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
            </div>
            
            
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th class="index-col">No</th>
                            <th class="user-col">Nama Penyewa</th>
                            <th class="car-col">Nama Mobil</th>
                            <th class="date-col">Tanggal Mulai</th>
                            <th class="date-col">Tanggal Selesai</th>
                            <th class="price-col">Total Harga</th>
                            <th class="status-col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bookings as $booking)
                            <tr>
                                <td class="index-col">{{ $loop->iteration }}</td>
                                <td class="user-col">{{ $booking->user->name }}</td>
                                <td class="car-col">{{ $booking->car->name }}</td>
                                <td class="date-col">{{ $booking->start_date }}</td>
                                <td class="date-col">{{ $booking->end_date }}</td>
                                <td class="price-col">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</td>
                                <td class="status-col">
                                    @if($booking->status == 'pending')
                                        <span class="status-badge status-pending">Pending</span>
                                    @elseif($booking->status == 'confirmed')
                                        <span class="status-badge status-completed">Confirmed</span>
                                    @elseif($booking->status == 'completed')
                                        <span class="status-badge status-completed">Completed</span>
                                    @elseif($booking->status == 'cancelled')
                                        <span class="status-badge status-cancelled">Cancelled</span>
                                    @else
                                        <span class="status-badge">{{ ucfirst($booking->status) }}</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="empty-message">Belum ada data booking.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>