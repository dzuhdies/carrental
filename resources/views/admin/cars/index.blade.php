<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Mobil</title>
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
        
        .page-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-primary);
        }
        
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.625rem 1.25rem;
            font-size: 0.875rem;
            font-weight: 500;
            line-height: 1.25rem;
            border-radius: 0.5rem;
            transition: all 0.2s ease;
            cursor: pointer;
        }
        
        .btn-primary {
            background-color: var(--primary);
            color: var(--light);
            border: none;
        }
        
        .btn-primary:hover {
            background-color: var(--primary-hover);
        }
        
        .btn-outline {
            background-color: transparent;
            border: 1px solid var(--border);
            color: var(--text-primary);
        }
        
        .btn-outline:hover {
            background-color: var(--secondary);
        }
        
        .btn-danger {
            background-color: var(--danger);
            color: var(--light);
            border: none;
        }
        
        .btn-danger:hover {
            background-color: #dc2626;
        }
        
        .btn-sm {
            padding: 0.375rem 0.75rem;
            font-size: 0.75rem;
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
        
        .actions {
            display: flex;
            gap: 0.5rem;
        }
        
        .price {
            font-weight: 600;
        }
        
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }
        
        .modal-content {
            background-color: var(--light);
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin: 2rem auto;
            padding: 2rem;
            width: 100%;
            max-width: 500px;
            animation: slideIn 0.3s ease-out;
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--border);
        }
        
        .modal-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--text-primary);
        }
        
        .close-button {
            background: none;
            border: none;
            font-size: 1.5rem;
            line-height: 1;
            cursor: pointer;
            color: var(--text-secondary);
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--text-primary);
        }
        
        .form-control {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid var(--border);
            border-radius: 0.375rem;
            font-size: 0.875rem;
            transition: border-color 0.2s;
        }
        
        .form-control:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
        }
        
        .form-footer {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            margin-top: 2rem;
        }
        
        .badge {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.625rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 500;
        }
        
        .badge-success {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--success);
        }
        
        .badge-warning {
            background-color: rgba(245, 158, 11, 0.1);
            color: var(--warning);
        }
        
        .capacity {
            display: flex;
            align-items: center;
        }
        
        .capacity-icon {
            margin-right: 0.375rem;
        }
        
        .year {
            color: var(--text-secondary);
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
            
            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
            
            .table-container {
                overflow-x: auto;
            }
            
            table {
                min-width: 680px;
            }
            
            .modal-content {
                margin: 1rem;
                max-width: none;
                width: auto;
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
                    <a href="{{ route('admin.cars.index') }}" class="nav-link active">
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
                <h1 class="page-title">Kelola Mobil</h1>
                
                <button class="btn btn-primary" onclick="openCreateModal()">
                    <span class="btn-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                    </span>
                    Tambah Mobil
                </button>
            </div>
            
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Brand</th>
                            <th>Tahun</th>
                            <th>Kapasitas</th>
                            <th>Harga/Hari</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cars as $car)
                            <tr>
                                <td>{{ $car->name }}</td>
                                <td>{{ $car->brand }}</td>
                                <td class="year">{{ $car->year }}</td>
                                <td>
                                    <div class="capacity">
                                        <span class="capacity-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="9" cy="7" r="4"></circle>
                                            </svg>
                                        </span>
                                        {{ $car->capacity }} orang
                                    </div>
                                </td>
                                <td class="price">Rp {{ number_format($car->price_per_day, 0, ',', '.') }}</td>
                                <td>
                                    <div class="actions">
                                        <button class="btn btn-outline btn-sm" onclick="openEditModal({{ $car }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                            </svg>
                                        </button>

                                        <form action="{{ route('admin.cars.destroy', $car) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus mobil ini?')">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="createModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Tambah Mobil Baru</h2>
                <button type="button" class="close-button" onclick="closeCreateModal()">&times;</button>
            </div>
            <form method="POST" action="{{ route('admin.cars.store') }}">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="name">Nama Mobil</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Contoh: Toyota Avanza" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="brand">Brand</label>
                    <input type="text" id="brand" name="brand" class="form-control" placeholder="Contoh: Toyota" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="year">Tahun</label>
                    <input type="number" id="year" name="year" class="form-control" placeholder="Contoh: 2023" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="capacity">Kapasitas (orang)</label>
                    <input type="number" id="capacity" name="capacity" class="form-control" placeholder="Contoh: 7" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="price_per_day">Harga per Hari (Rp)</label>
                    <input type="number" id="price_per_day" name="price_per_day" class="form-control" placeholder="Contoh: 500000" required>
                </div>
                
                <div class="form-footer">
                    <button type="button" class="btn btn-outline" onclick="closeCreateModal()">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    
    <div id="editModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Edit Mobil</h2>
                <button type="button" class="close-button" onclick="closeEditModal()">&times;</button>
            </div>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="form-label" for="edit_name">Nama Mobil</label>
                    <input type="text" id="edit_name" name="name" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="edit_brand">Brand</label>
                    <input type="text" id="edit_brand" name="brand" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="edit_year">Tahun</label>
                    <input type="number" id="edit_year" name="year" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="edit_capacity">Kapasitas (orang)</label>
                    <input type="number" id="edit_capacity" name="capacity" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="edit_price_per_day">Harga per Hari (Rp)</label>
                    <input type="number" id="edit_price_per_day" name="price_per_day" class="form-control" required>
                </div>
                
                <div class="form-footer">
                    <button type="button" class="btn btn-outline" onclick="closeEditModal()">Batal</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openCreateModal() {
            document.getElementById('createModal').style.display = 'block';
        }
        
        function closeCreateModal() {
            document.getElementById('createModal').style.display = 'none';
        }

        function openEditModal(car) {
            document.getElementById('editModal').style.display = 'block';

            // isi form dengan data mobil
            document.getElementById('edit_name').value = car.name;
            document.getElementById('edit_brand').value = car.brand;
            document.getElementById('edit_year').value = car.year;
            document.getElementById('edit_capacity').value = car.capacity;
            document.getElementById('edit_price_per_day').value = car.price_per_day;

            // ganti action form
            document.getElementById('editForm').action = '/admin/cars/' + car.id;
        }

        function closeEditModal() {
            document.getElementById('editModal').style.display = 'none';
        }
        
        // Close modal when clicking outside
        window.onclick = function(event) {
            if (event.target.className === 'modal') {
                event.target.style.display = 'none';
            }
        };
    </script>
</body>
</html>