<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - Dashboard Pro</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

    :root {
      --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
      --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
      --warning-gradient: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
      --primary-color: #667eea;
      --secondary-color: #1a202c;
      --success-color: #48bb78;
      --warning-color: #ed8936;
      --danger-color: #f56565;
      --light-bg: #f7fafc;
      --card-bg: rgba(255, 255, 255, 0.95);
      --glass-bg: rgba(255, 255, 255, 0.1);
      --text-primary: #2d3748;
      --text-secondary: #718096;
      --border-color: rgba(226, 232, 240, 0.8);
      --shadow-sm: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
      --shadow-md: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
      --shadow-lg: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
      --border-radius: 16px;
      --border-radius-lg: 24px;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
      background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
      line-height: 1.6;
      color: var(--text-primary);
    }

    /* Sidebar avec glassmorphism */
    .sidebar {
      position: fixed;
      left: 0;
      top: 0;
      height: 100vh;
      width: 300px;
      background: var(--primary-gradient);
      backdrop-filter: blur(20px);
      border-right: 1px solid rgba(255, 255, 255, 0.1);
      padding: 2rem 0;
      z-index: 1000;
      transform: translateX(-100%);
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      box-shadow: var(--shadow-lg);
    }

    .sidebar.active {
      transform: translateX(0);
    }

    .sidebar::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.05)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.05)"/><circle cx="50" cy="10" r="0.5" fill="rgba(255,255,255,0.03)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
      pointer-events: none;
    }

    .sidebar-logo {
      display: flex;
      align-items: center;
      padding: 0 2rem;
      margin-bottom: 3rem;
      color: white;
      text-decoration: none;
      font-size: 1.75rem;
      font-weight: 800;
      position: relative;
    }

    .sidebar-logo::after {
      content: '';
      position: absolute;
      bottom: -1rem;
      left: 2rem;
      right: 2rem;
      height: 1px;
      background: rgba(255, 255, 255, 0.2);
    }

    .sidebar-logo i {
      background: var(--glass-bg);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: 12px;
      padding: 12px;
      margin-right: 16px;
      font-size: 1.5rem;
      box-shadow: var(--shadow-sm);
    }

    .sidebar-menu {
      list-style: none;
      padding: 0 1.5rem;
    }

    .sidebar-menu li {
      margin-bottom: 0.75rem;
    }

    .sidebar-menu a {
      display: flex;
      align-items: center;
      padding: 1rem 1.5rem;
      color: rgba(255, 255, 255, 0.8);
      text-decoration: none;
      border-radius: var(--border-radius);
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      font-weight: 500;
      font-size: 0.95rem;
      position: relative;
      overflow: hidden;
    }

    .sidebar-menu a::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: var(--glass-bg);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.1);
      border-radius: var(--border-radius);
      opacity: 0;
      transition: opacity 0.3s ease;
    }

    .sidebar-menu a:hover::before,
    .sidebar-menu a.active::before {
      opacity: 1;
    }

    .sidebar-menu a:hover,
    .sidebar-menu a.active {
      color: white;
      transform: translateX(8px);
      box-shadow: var(--shadow-md);
    }

    .sidebar-menu a i {
      width: 24px;
      margin-right: 16px;
      text-align: center;
      position: relative;
      z-index: 1;
    }

    .sidebar-menu a span {
      position: relative;
      z-index: 1;
    }

    /* Main Content avec améliorations */
    .main-wrapper {
      margin-left: 0;
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      min-height: 100vh;
    }

    .main-wrapper.sidebar-open {
      margin-left: 300px;
    }

    /* Header modernisé */
    .header {
      background: var(--card-bg);
      backdrop-filter: blur(20px);
      border-bottom: 1px solid var(--border-color);
      padding: 1.5rem 2rem;
      box-shadow: var(--shadow-sm);
      display: flex;
      align-items: center;
      justify-content: space-between;
      position: sticky;
      top: 0;
      z-index: 100;
    }

    .sidebar-toggle {
      background: var(--primary-gradient);
      border: none;
      font-size: 1.25rem;
      color: white;
      cursor: pointer;
      padding: 12px;
      border-radius: 12px;
      transition: all 0.3s ease;
      box-shadow: var(--shadow-sm);
    }

    .sidebar-toggle:hover {
      transform: translateY(-2px);
      box-shadow: var(--shadow-md);
    }

    .header-search {
      flex: 1;
      max-width: 500px;
      margin: 0 2rem;
      position: relative;
    }

    .header-search input {
      width: 100%;
      padding: 1rem 1.25rem 1rem 3.5rem;
      border: 2px solid var(--border-color);
      border-radius: var(--border-radius);
      font-size: 0.95rem;
      background: white;
      transition: all 0.3s ease;
      box-shadow: var(--shadow-sm);
    }

    .header-search input:focus {
      outline: none;
      border-color: var(--primary-color);
      box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
      transform: translateY(-1px);
    }

    .header-search i {
      position: absolute;
      left: 1.25rem;
      top: 50%;
      transform: translateY(-50%);
      color: var(--text-secondary);
      font-size: 1.1rem;
    }

    .header-actions {
      display: flex;
      align-items: center;
      gap: 1rem;
    }

    .notification-btn {
      position: relative;
      background: var(--light-bg);
      border: 2px solid var(--border-color);
      font-size: 1.25rem;
      color: var(--text-secondary);
      cursor: pointer;
      padding: 12px;
      border-radius: 12px;
      transition: all 0.3s ease;
      box-shadow: var(--shadow-sm);
    }

    .notification-btn:hover {
      background: var(--primary-gradient);
      color: white;
      transform: translateY(-2px);
      box-shadow: var(--shadow-md);
    }

    .notification-badge {
      position: absolute;
      top: -6px;
      right: -6px;
      background: var(--secondary-gradient);
      color: white;
      font-size: 0.75rem;
      padding: 4px 8px;
      border-radius: 20px;
      min-width: 20px;
      text-align: center;
      font-weight: 600;
      box-shadow: var(--shadow-sm);
    }

    .user-menu {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 8px 16px;
      background: var(--light-bg);
      border: 2px solid var(--border-color);
      border-radius: var(--border-radius);
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: var(--shadow-sm);
    }

    .user-menu:hover {
      background: var(--primary-gradient);
      color: white;
      transform: translateY(-2px);
      box-shadow: var(--shadow-md);
    }

    .user-avatar {
      width: 44px;
      height: 44px;
      border-radius: 12px;
      object-fit: cover;
      box-shadow: var(--shadow-sm);
    }

    /* Page Content */
    .page-content {
      padding: 2.5rem;
      position: relative;
    }

    .page-header {
      margin-bottom: 3rem;
      text-align: center;
    }

    .page-title {
      font-size: 3rem;
      font-weight: 800;
      background: var(--primary-gradient);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      margin-bottom: 0.75rem;
    }

    .page-subtitle {
      color: var(--text-secondary);
      font-size: 1.25rem;
      font-weight: 400;
    }

    /* Stats Cards améliorées */
    .stats-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 2rem;
      margin-bottom: 3rem;
    }

    .stat-card {
      background: var(--card-bg);
      backdrop-filter: blur(20px);
      border: 1px solid var(--border-color);
      padding: 2.5rem;
      border-radius: var(--border-radius-lg);
      box-shadow: var(--shadow-md);
      position: relative;
      overflow: hidden;
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .stat-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 6px;
      background: var(--primary-gradient);
      transition: all 0.3s ease;
    }

    .stat-card.success::before {
      background: var(--success-gradient);
    }

    .stat-card.warning::before {
      background: var(--warning-gradient);
    }

    .stat-card.danger::before {
      background: var(--secondary-gradient);
    }

    .stat-card:hover {
      transform: translateY(-8px);
      box-shadow: var(--shadow-lg);
    }

    .stat-card:hover::before {
      height: 12px;
    }

    .stat-icon {
      position: absolute;
      top: 2rem;
      right: 2rem;
      font-size: 3rem;
      opacity: 0.1;
      transition: all 0.3s ease;
    }

    .stat-card:hover .stat-icon {
      opacity: 0.2;
      transform: scale(1.1);
    }

    .stat-label {
      font-size: 0.875rem;
      color: var(--text-secondary);
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.1em;
      margin-bottom: 1rem;
    }

    .stat-value {
      font-size: 2.75rem;
      font-weight: 800;
      color: var(--text-primary);
      margin-bottom: 1rem;
      line-height: 1;
    }

    .stat-change {
      display: flex;
      align-items: center;
      font-size: 0.9rem;
      font-weight: 600;
      gap: 0.5rem;
    }

    .stat-change.positive {
      color: var(--success-color);
    }

    .stat-change.negative {
      color: var(--danger-color);
    }

    /* Content Cards modernisées */
    .content-card {
      background: var(--card-bg);
      backdrop-filter: blur(20px);
      border: 1px solid var(--border-color);
      border-radius: var(--border-radius-lg);
      box-shadow: var(--shadow-md);
      margin-bottom: 2.5rem;
      overflow: hidden;
      transition: all 0.3s ease;
    }

    .content-card:hover {
      box-shadow: var(--shadow-lg);
    }

    .card-header {
      background: var(--primary-gradient);
      color: white;
      padding: 2rem 2.5rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      position: relative;
    }

    .card-header::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="dots" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23dots)"/></svg>');
      pointer-events: none;
    }

    .card-title {
      font-size: 1.5rem;
      font-weight: 700;
      display: flex;
      align-items: center;
      gap: 1rem;
      margin: 0;
      flex: 1;
      position: relative;
      z-index: 1;
    }

    .card-body {
      padding: 2.5rem;
    }

    /* Tables modernisées */
    .table-wrapper {
      overflow-x: auto;
      border-radius: var(--border-radius);
      box-shadow: var(--shadow-sm);
    }

    .data-table {
      width: 100%;
      border-collapse: collapse;
      background: white;
    }

    .data-table th {
      background: var(--light-bg);
      padding: 1.5rem;
      text-align: left;
      font-weight: 700;
      color: var(--text-primary);
      font-size: 0.875rem;
      text-transform: uppercase;
      letter-spacing: 0.1em;
      border-bottom: 2px solid var(--border-color);
      position: sticky;
      top: 0;
      z-index: 10;
    }

    .data-table td {
      padding: 1.5rem;
      border-bottom: 1px solid var(--border-color);
      transition: all 0.3s ease;
    }

    .data-table tbody tr {
      transition: all 0.3s ease;
    }

    .data-table tbody tr:hover {
      background: linear-gradient(135deg, rgba(102, 126, 234, 0.02) 0%, rgba(118, 75, 162, 0.02) 100%);
      transform: translateX(4px);
    }

    /* Status Badges */
    .status-badge {
      padding: 0.6rem 1.2rem;
      border-radius: 50px;
      font-size: 0.75rem;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.1em;
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      position: relative;
      overflow: hidden;
    }

    .status-pending {
      background: linear-gradient(135deg, rgba(245, 158, 11, 0.15) 0%, rgba(245, 158, 11, 0.25) 100%);
      color: #92400e;
      border: 1px solid rgba(245, 158, 11, 0.3);
    }

    .status-completed {
      background: linear-gradient(135deg, rgba(16, 185, 129, 0.15) 0%, rgba(16, 185, 129, 0.25) 100%);
      color: #047857;
      border: 1px solid rgba(16, 185, 129, 0.3);
    }

    .status-cancelled {
      background: linear-gradient(135deg, rgba(239, 68, 68, 0.15) 0%, rgba(239, 68, 68, 0.25) 100%);
      color: #dc2626;
      border: 1px solid rgba(239, 68, 68, 0.3);
    }

    /* Buttons améliorés */
    .btn {
      padding: 0.875rem 1.75rem;
      border-radius: var(--border-radius);
      border: none;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 0.75rem;
      font-size: 0.9rem;
      box-shadow: var(--shadow-sm);
    }

    .btn-primary {
      background: var(--primary-gradient);
      color: white;
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: var(--shadow-md);
    }

    .btn-outline {
      background: transparent;
      color: var(--primary-color);
      border: 2px solid var(--primary-color);
    }

    .btn-outline:hover {
      background: var(--primary-gradient);
      color: white;
      transform: translateY(-2px);
      box-shadow: var(--shadow-md);
    }

    .btn-sm {
      padding: 0.6rem 1.25rem;
      font-size: 0.825rem;
    }

    /* Action buttons pour les tableaux */
    .action-btn {
      padding: 0.5rem;
      border-radius: 8px;
      border: none;
      cursor: pointer;
      transition: all 0.3s ease;
      font-size: 0.875rem;
      margin-right: 0.5rem;
      box-shadow: var(--shadow-sm);
    }

    .action-btn:hover {
      transform: translateY(-2px);
      box-shadow: var(--shadow-md);
    }

    .action-btn.bg-blue-500 {
      background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
      color: white;
    }

    .action-btn.bg-amber-500 {
      background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
      color: white;
    }

    .action-btn.bg-red-500 {
      background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
      color: white;
    }

    /* Quick Actions */
    .quick-actions {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
      gap: 2.5rem;
    }

    .form-group {
      margin-bottom: 1.75rem;
    }

    .form-label {
      display: block;
      font-weight: 600;
      color: var(--text-primary);
      margin-bottom: 0.75rem;
      font-size: 0.95rem;
    }

    .form-input {
      width: 100%;
      padding: 1rem 1.25rem;
      border: 2px solid var(--border-color);
      border-radius: var(--border-radius);
      transition: all 0.3s ease;
      font-size: 0.95rem;
      background: white;
      box-shadow: var(--shadow-sm);
    }

    .form-input:focus {
      outline: none;
      border-color: var(--primary-color);
      box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
      transform: translateY(-1px);
    }

    /* Avatar pour les utilisateurs */
    .avatar {
      background: var(--primary-gradient);
      width: 44px;
      height: 44px;
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-weight: 700;
      font-size: 1rem;
      margin-right: 1rem;
      flex-shrink: 0;
      box-shadow: var(--shadow-sm);
    }

    /* Empty state */
    .empty-state {
      text-align: center;
      padding: 4rem 2rem;
      color: var(--text-secondary);
    }

    .empty-state i {
      font-size: 4rem;
      opacity: 0.3;
      margin-bottom: 1.5rem;
    }

    /* Responsive amélioré */
    @media (max-width: 1024px) {
      .main-wrapper.sidebar-open {
        margin-left: 0;
      }

      .header {
        padding: 1rem;
      }

      .header-search {
        margin: 0 1rem;
        max-width: 300px;
      }

      .page-content {
        padding: 1.5rem;
      }

      .page-title {
        font-size: 2.25rem;
      }
    }

    @media (max-width: 768px) {
      .stats-grid {
        grid-template-columns: 1fr;
      }

      .quick-actions {
        grid-template-columns: 1fr;
      }

      .header-search {
        display: none;
      }

      .page-title {
        font-size: 1.875rem;
      }

      .card-header {
        padding: 1.5rem;
      }

      .card-body {
        padding: 1.5rem;
      }
    }

    /* Animations */
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .animate-fade-in {
      animation: fadeInUp 0.8s ease-out;
    }

    /* Scroll animations */
    .fade-in-element {
      opacity: 0;
      transform: translateY(30px);
      transition: all 0.6s ease;
    }

    .fade-in-element.visible {
      opacity: 1;
      transform: translateY(0);
    }
  </style>
</head>
<body>

  <!-- Main Content Wrapper -->
  <div class="main-wrapper" id="mainWrapper">
    <!-- Header -->
    <header class="header">
      <button class="sidebar-toggle" id="sidebarToggle">
        <i class="fas fa-bars"></i>
      </button>

      <div class="header-search">
        <i class="fas fa-search"></i>
        <input type="text" placeholder="Rechercher des commandes, clients, produits...">
      </div>

      <div class="header-actions">
        <button class="notification-btn">
          <i class="fas fa-bell"></i>
          <span class="notification-badge">3</span>
        </button>

        <div class="user-menu">
          <img src="https://ui-avatars.com/api/?name=Admin&background=667eea&color=fff&size=44" alt="Admin" class="user-avatar">
          <div>
            <div style="font-weight: 600; font-size: 0.9rem;">Admin</div>
            <div style="font-size: 0.75rem; opacity: 0.8;">Administrateur</div>
          </div>
          <i class="fas fa-chevron-down" style="margin-left: 0.5rem; opacity: 0.6;"></i>
        </div>
      </div>
    </header>

    <!-- Page Content -->
    <main class="page-content">
      <!-- Page Header -->
      <div class="page-header animate-fade-in">
        <h1 class="page-title">Dashboard Administration</h1>

      </div>

      <!-- Stats Cards -->
      <div class="stats-grid animate-fade-in">
        <div class="stat-card">
          <i class="fas fa-shopping-cart stat-icon"></i>
          <div class="stat-label">Total Commandes</div>
          <div class="stat-value">2,847</div>
          <div class="stat-change positive">
            <i class="fas fa-arrow-up"></i>
            <span>+12.5% vs mois dernier</span>
          </div>
        </div>

        <div class="stat-card success">
          <i class="fas fa-dollar-sign stat-icon"></i>
          <div class="stat-label">Chiffre d'affaires</div>
          <div class="stat-value">47,582 DT</div>
          <div class="stat-change positive">
            <i class="fas fa-arrow-up"></i>
            <span>+8.2% vs mois dernier</span>
          </div>
        </div>

        <div class="stat-card warning">
          <i class="fas fa-users stat-icon"></i>
          <div class="stat-label">Nouveaux clients</div>
          <div class="stat-value">234</div>
          <div class="stat-change negative">
            <i class="fas fa-arrow-down"></i>
            <span>-3.1% vs mois dernier</span>
          </div>
        </div>

        <div class="stat-card danger">
          <i class="fas fa-truck stat-icon"></i>
          <div class="stat-label">Livraisons</div>
          <div class="stat-value">1,926</div>
          <div class="stat-change positive">
            <i class="fas fa-arrow-up"></i>
            <span>+15.3% vs mois dernier</span>
          </div>
        </div>
      </div>

      <!-- Recent Orders -->
      <div class="content-card animate-fade-in">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-list-alt"></i>
            Commandes récentes
          </h3>
          <a href="#" class="btn btn-outline btn-sm">
            <i class="fas fa-external-link-alt"></i>
            Voir toutes
          </a>
        </div>
        <div class="card-body">
          <div class="table-wrapper">
            <table class="data-table">
              <thead>
                <tr>
                  <th><input type="checkbox" class="form-checkbox"></th>
                  <th>ID</th>
                  <th>Client</th>
                  <th>Produits</th>
                  <th>Date</th>
                  <th>Total</th>
                  <th>Paiement</th>
                  <th>Statut</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @forelse($orders as $order)
                  <tr>
                    <td><input type="checkbox" class="form-checkbox"></td>
                    <td class="font-bold text-purple-600">#{{ $order->id }}</td>
                    <td>
                      <div class="flex items-center">
                        <div class="avatar">{{ substr($order->user->name ?? 'U', 0, 1) }}</div>
                        <div>
                          <div class="font-semibold text-gray-900">{{ $order->user->name ?? 'Utilisateur' }}</div>
                          <div class="text-xs text-gray-500">{{ $order->user->email ?? 'N/A' }}</div>
                        </div>
                      </div>
                    </td>
                    <td>
                      @foreach($order->orderDetails as $detail)
                        <div class="mb-1">
                          <span class="font-medium text-gray-900">{{ $detail->product?->title ?? 'Produit supprimé' }}</span>
                          <span class="text-gray-500 text-sm"> ×{{ $detail->quantity }}</span>
                        </div>
                      @endforeach
                    </td>
                    <td>
                      <div class="font-medium">{{ $order->created_at->format('d M') }}</div>
                      <div class="text-xs text-gray-500">{{ $order->created_at->format('H:i') }}</div>
                    </td>
                    <td class="font-bold text-green-600 text-lg">{{ number_format($order->total, 2, ',', ' ') }} €</td>
                    <td>
                      <div class="flex items-center">
                        <i class="ri-mastercard-fill text-yellow-500 mr-2 text-xl"></i>
                        <span class="text-gray-700 font-medium">Mastercard</span>
                      </div>
                    </td>
                    <td>
                      @php
                        $statusConfig = [
                          'pending' => ['bg' => 'status-pending', 'text' => 'En attente'],
                          'processing' => ['bg' => 'status-pending', 'text' => 'En cours'],
                          'shipped' => ['bg' => 'status-completed', 'text' => 'Expédiée'],
                          'delivered' => ['bg' => 'status-completed', 'text' => 'Livré'],
                          'cancelled' => ['bg' => 'status-cancelled', 'text' => 'Annulée'],
                        ];
                        $config = $statusConfig[$order->status] ?? ['bg' => 'status-cancelled', 'text' => 'Inconnu'];
                      @endphp
                      <span class="status-badge {{ $config['bg'] }}">{{ $config['text'] }}</span>
                    </td>
                    <td>
                      <div class="flex space-x-2">
                        <a href="{{ route('orders.show', $order->id) }}" class="action-btn bg-blue-500" title="Voir">
                          <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('orders.edit', $order->id) }}" class="action-btn bg-amber-500" title="Modifier">
                          <i class="fas fa-pencil-alt"></i>
                        </a>
                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cette commande ?');">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="action-btn bg-red-500" title="Supprimer">
                            <i class="fas fa-trash-alt"></i>
                          </button>
                        </form>
                      </div>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="9" class="empty-state">
                      <i class="fas fa-shopping-bag text-6xl mb-4 opacity-80"></i>
                      <h3 class="text-xl font-semibold mb-2">Aucune commande trouvée</h3>
                      <p class="opacity-80">Les commandes apparaîtront ici une fois créées</p>
                    </td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Quick Actions -->
      <div class="quick-actions animate-fade-in">
        <div class="content-card">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-plus-circle"></i>
              Ajouter un produit
            </h3>
          </div>
          <div class="card-body">
            <form>
              <div class="form-group">
                <label class="form-label">Nom du produit</label>
                <input type="text" class="form-input" placeholder="Ex: Smartphone Samsung Galaxy">
              </div>
              <div class="form-group">
                <label class="form-label">Prix (DT)</label>
                <input type="number" class="form-input" step="0.01" placeholder="299.99">
              </div>
              <div class="form-group">
                <label class="form-label">Stock disponible</label>
                <input type="number" class="form-input" placeholder="25">
              </div>
              <button type="submit" class="btn btn-primary" style="width: 100%;">
                <i class="fas fa-save"></i>
                Enregistrer le produit
              </button>
            </form>
          </div>
        </div>

        <div class="content-card">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-chart-bar"></i>
              Top produits vendus
            </h3>
          </div>
          <div class="card-body">
            <div style="space-y: 1rem;">
              <div style="display: flex; justify-content: space-between; align-items: center; padding: 1rem 0; border-bottom: 1px solid var(--border-color);">
                <div>
                  <div style="font-weight: 600;">iPhone 15 Pro</div>
                  <div style="font-size: 0.875rem; color: var(--text-secondary);">Smartphones</div>
                </div>
                <div style="text-align: right;">
                  <div style="font-weight: 700; color: var(--primary-color);">47 unités</div>
                  <div style="font-size: 0.875rem; color: var(--success-color);">+12%</div>
                </div>
              </div>

              <div style="display: flex; justify-content: space-between; align-items: center; padding: 1rem 0; border-bottom: 1px solid var(--border-color);">
                <div>
                  <div style="font-weight: 600;">AirPods Pro</div>
                  <div style="font-size: 0.875rem; color: var(--text-secondary);">Accessoires</div>
                </div>
                <div style="text-align: right;">
                  <div style="font-weight: 700; color: var(--primary-color);">32 unités</div>
                  <div style="font-size: 0.875rem; color: var(--success-color);">+8%</div>
                </div>
              </div>

              <div style="display: flex; justify-content: space-between; align-items: center; padding: 1rem 0; border-bottom: 1px solid var(--border-color);">
                <div>
                  <div style="font-weight: 600;">MacBook Air M3</div>
                  <div style="font-size: 0.875rem; color: var(--text-secondary);">Ordinateurs</div>
                </div>
                <div style="text-align: right;">
                  <div style="font-weight: 700; color: var(--primary-color);">18 unités</div>
                  <div style="font-size: 0.875rem; color: var(--success-color);">+25%</div>
                </div>
              </div>

              <div style="display: flex; justify-content: space-between; align-items: center; padding: 1rem 0;">
                <div>
                  <div style="font-weight: 600;">Samsung Galaxy Watch</div>
                  <div style="font-size: 0.875rem; color: var(--text-secondary);">Montres connectées</div>
                </div>
                <div style="text-align: right;">
                  <div style="font-weight: 700; color: var(--primary-color);">15 unités</div>
                  <div style="font-size: 0.875rem; color: var(--danger-color);">-3%</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Users Table -->
      <div class="content-card animate-fade-in">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-users"></i>
            Liste des Utilisateurs
          </h3>
          <a href="#" class="btn btn-outline btn-sm">
            <i class="fas fa-external-link-alt"></i>
            Voir tous
          </a>
        </div>
        <div class="card-body">
          <div class="table-wrapper">
            <table class="data-table">
              <thead>
                <tr>
                  <th><input type="checkbox" class="form-checkbox"></th>
                  <th>ID</th>
                  <th>Nom</th>
                  <th>Email</th>
                  <th>Rôle</th>
                  <th>Date de Création</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @forelse($users as $user)
                  <tr>
                    <td><input type="checkbox" class="form-checkbox"></td>
                    <td><strong>#{{ $user->id }}</strong></td>
                    <td>
                      <div class="flex items-center">
                        <div class="avatar">{{ substr($user->name, 0, 1) }}</div>
                        <div>
                          <div class="font-semibold">{{ $user->name }}</div>
                          <div class="text-xs text-gray-500">{{ $user->email }}</div>
                        </div>
                      </td>
                    <td>{{ $user->email }}</td>
                    <td>
                      <span class="status-badge
                        {{ $user->role === 'admin' ? 'status-completed' : ($user->role === 'boutique' ? 'status-pending' : 'status-cancelled') }}">
                        {{ ucfirst($user->role ?? 'utilisateur') }}
                      </span>
                    </td>
                    <td>
                      <div class="font-medium">{{ $user->created_at->format('d M Y') }}</div>
                      <div class="text-xs text-gray-500">{{ $user->created_at->format('H:i') }}</div>
                    </td>
                    <td>
                      <div class="flex space-x-2">
                        <a href="{{ route('users.show', $user->id) }}" class="action-btn bg-blue-500" title="Voir">
                          <i class="fas fa-eye"></i>
                        </a>

                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?');">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="action-btn bg-red-500" title="Supprimer">
                            <i class="fas fa-trash-alt"></i>
                          </button>
                        </form>
                      </div>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="7" class="empty-state">
                      <i class="fas fa-users text-6xl mb-4 opacity-80"></i>
                      <h3 class="text-xl font-semibold mb-2">Aucun utilisateur trouvé</h3>
                      <p class="opacity-80">Les utilisateurs apparaîtront ici une fois créés</p>
                    </td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </main>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Sidebar Toggle
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('sidebar');
    const mainWrapper = document.getElementById('mainWrapper');

    sidebarToggle.addEventListener('click', function() {
      sidebar.classList.toggle('active');
      mainWrapper.classList.toggle('sidebar-open');
    });

    // Auto close sidebar on mobile when clicking outside
    document.addEventListener('click', function(event) {
      const isClickInsideSidebar = sidebar.contains(event.target);
      const isClickOnToggle = sidebarToggle.contains(event.target);

      if (!isClickInsideSidebar && !isClickOnToggle && window.innerWidth <= 1024) {
        sidebar.classList.remove('active');
        mainWrapper.classList.remove('sidebar-open');
      }
    });

    // Responsive sidebar behavior
    window.addEventListener('resize', function() {
      if (window.innerWidth > 1024) {
        sidebar.classList.add('active');
        mainWrapper.classList.add('sidebar-open');
      } else {
        sidebar.classList.remove('active');
        mainWrapper.classList.remove('sidebar-open');
      }
    });

    // Initialize sidebar state
    if (window.innerWidth > 1024) {
      sidebar.classList.add('active');
      mainWrapper.classList.add('sidebar-open');
    }

    // Animate elements on scroll
    const observerOptions = {
      threshold: 0.1,
      rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.style.opacity = '1';
          entry.target.style.transform = 'translateY(0)';
        }
      });
    }, observerOptions);

    document.querySelectorAll('.animate-fade-in').forEach(el => {
      el.classList.add('fade-in-element');
      observer.observe(el);
    });
  </script>
</body>
</html>
