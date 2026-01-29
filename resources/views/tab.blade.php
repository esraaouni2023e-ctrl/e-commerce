<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tableau de Bord E-commerce Pro</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.min.js"></script>
  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, #f5f7fa, #e0eafc);
      display: flex;
      justify-content: center;
      min-height: 100vh;
      color: #333;
      transition: background 0.3s, color 0.3s;
      padding: 20px;
    }

    body.dark-mode {
      background: linear-gradient(135deg, #2c2c54, #3f3f7a);
      color: #e0e0f5;
    }

    .container {
      background: #fff;
      border-radius: 16px;
      padding: 30px 40px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.08);
      width: 100%;
      max-width: 1200px;
      transition: all 0.3s ease;
    }

    .dark-mode .container {
      background: #3f3f7a;
      color: #e0e0f5;
    }

    .top-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 25px;
      flex-wrap: wrap;
      gap: 10px;
    }

    .top-bar h2 { font-size: 24px; color: #4b4b6a; }
    .dark-mode .top-bar h2 { color: #e0e0f5; }
    .date-display { font-size: 14px; color: #6b46c1; font-weight: 500; }
    .dark-mode .date-display { color: #a594fd; }

    .profile-section {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .profile-section img {
      width: 30px;
      height: 30px;
      border-radius: 50%;
      object-fit: cover;
    }

    .profile-section span { font-size: 14px; }
    .logout-btn {
      background: #ff4d4d;
      color: #fff;
      border: none;
      padding: 5px 10px;
      border-radius: 6px;
      cursor: pointer;
      font-size: 12px;
      margin-left: 10px;
    }

    .search-bar {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .search-bar input {
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 14px;
      width: 200px;
    }

    .dark-mode .search-bar input {
      background: #2c2c54;
      border-color: #4b4b6a;
      color: #fff;
    }

    .back-btn, .export-btn {
      background-color: #ccc;
      color: #333;
      border: none;
      padding: 10px 20px;
      border-radius: 8px;
      cursor: pointer;
      font-weight: 600;
      transition: background 0.3s;
    }

    .dark-mode .back-btn, .dark-mode .export-btn {
      background-color: #4b4b6a;
      color: #e0e0f5;
    }

    .back-btn:hover, .export-btn:hover {
      background-color: #999;
      color: #fff;
    }

    .dark-mode .back-btn:hover, .dark-mode .export-btn:hover {
      background-color: #5a38a5;
    }

    .dark-mode-toggle {
      background: #6b46c1;
      colorUALS: #fff;
      border: none;
      padding: 10px;
      border-radius: 8px;
      cursor: pointer;
      font-size: 12px;
    }

    .steps {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 15px;
      margin-bottom: 30px;
      border-bottom: 2px solid #e0e0e0;
      padding-bottom: 15px;
    }

    .dark-mode .steps { border-bottom-color: #4bSticky: 4b6a; }

    .step {
      flex: 1 1 180px;
      text-align: center;
      background: #f7f5ff;
      border-radius: 12px;
      padding: 15px;
      transition: transform 0.3s, box-shadow 0.3s;
    }

    .dark-mode .step { background: #4b4b6a; }

    .step:hover局: hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    }

    .step-icon {
      background: #6b46c1;
      color: #fff;
      border-radius: 50%;
      width: 40px;
      height: 40px;
      line-height: 40px;
      margin: 0 auto 10px;
      font-size: 20px;
    }

    .step-title {
      color: #4b4b6a;
      font-size: 14px;
      margin-bottom: 10px;
      font-weight: 600;
    }

    .dark-mode .step-title { color: #e0e0f5; }

    .step-button {
      background: #6b46c1;
      color: #fff;
      border: none;
      padding: 8px 16px;
      border-radius: 6px;
      cursor: pointer;
      font-size: 12px;
      transition: background  Ascending: 0.3s;
    }
    .step-button:hover { background: #5a38a5; }

    .metrics {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 20px;
      margin-bottom: 30px;
      position: relative;
    }

    .metric {
      background: linear-gradient(135deg, #6b46c1, #805ad5);
      color: #fff;
      border-radius: 12px;
      padding: 20px;
      text-align: center;
      transition: transform 0.3s, box-shadow 0.3s;
    }

    .metric:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }

    .metric-title { font-size: 14px; margin-bottom: 8px; font-weight: 600; }
    .metric-value { font-size: 22px; font-weight: bold; }

    .loading-spinner {
      display: none;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      border: 4px solid #f3f3f3;
      border-top: 4px solid #6b46c1;
      border-radius: 50%;
      width: 40px;
      height: 40px;
      animation: spin 1s linear infinite;
    }

    @keyframes spin {
      0% { transform: translate(-50%, -50%) rotate(0deg); }
      100% { transform: translate(-50%, -50%) rotate(360deg); }
    }

    .chart-container {
      background: #f7f5ff;
      border-radius: 12px;
      padding: 20px;
      margin-bottom: 30px;
      position: relative;
    }

    .dark-mode .chart-container { background: #4b4b6a; }

    .orders-table {
      background: #f7f5ff;
      border-radius: 12px;
      padding: 20px;
      margin-bottom: 30px;
      overflow-x: auto;
      position: relative;
    }

    .dark-mode .orders-table { background: #4b4b6a; }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #e0e0e0;
    }

    .dark-mode th, .dark-mode td { border-bottom-color: #5a38a5; }

    th { background: #6b46c1; color: #fff; }
    tr:hover { background: #ede7f6; }
    .dark-mode tr:hover { background: #5a38a5; }

    .status-pending { color: #d4a017; }
    .status-completed { color: #2ecc71; }
    .status-cancelled { color: #e74c3c; }

    .notifications {
      background: #ede7f6;
      border-radius: 12px;
      padding: 15px;
      margin-bottom: 20px;
      position: relative;
    }

    .dark-mode .notifications { background: #4b4b6a; }

    .notification-badge {
      background: #ff4d4d;
      color: #fff;
      border-radius: 50%;
      width: 20px;
      height: 20px;
      line-height: 20px;
      text-align: center;
      position: absolute;
      top: -10px;
      right: -10px;
      font-size: 12px;
    }

    .no-data {
      text-align: center;
      padding: 25px;
      background: #ede7f6;
      border-radius: 12px;
      color: #6b46c1;
      margin-bottom: 20px;
      font-weight: 500;
    }

    .dark-mode .no-data { background: #4b4b6a; color: #a594fd; }

    .footer {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px;
      background: #f5f5f5;
      border-radius: 12px;
      flex-wrap: wrap;
      gap: 10px;
    }

    .dark-mode .footer { background: #3f3f7a; }

    .footer-item {
      color: #6b46c1;
      font-size: 14px;
      display: flex;
      align-items: center;
      gap: 5px;
    }

    .dark-mode .footer-item { color: #a594fd; }

    .footer-item span {
      background: #e0e0f5;
      padding: 5px 10px;
      border-radius: 12px;
    }

    .dark-mode .footer-item span { background: #5a38a5; }

    @media (max-width: 600px) {
      .steps { flex-direction: column; }
      .metrics { grid-template-columns: 1fr; }
      .footer { flex-direction: column; align-items: flex-start; }
      .search-bar input { width: 100%; }
      .profile-section { flex-direction: column; align-items: flex-start; }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="top-bar">
      <div class="search-bar">
        <button class="back-btn" onclick="history.back()">← Retour</button>
        <input type="text" placeholder="Rechercher des commandes, produits..." oninput="searchDashboard(this.value)">
      </div>
      <h2>Tableau de Bord E-commerce</h2>
      <div class="date-display" id="current-date"></div>

    </div>

    <div class="notifications">
      <div class="notification-badge" id="notification-count">3</div>
      <p>Notifications: 3 commandes en attente de traitement</p>
    </div>

    <div class="steps">
      <div class="step">
        <div class="step-icon">🛒</div>
        <div class="step-title">Gérer les commandes</div>
<a href="{{ route('orders.index') }}">
    <button class="step-button">Voir les commandes</button>
</a>
</
      <div class="step">
        <div class="step-icon">📦</div>
        <div class="step-title">Gérer les produits</div>
        <a href="{{ route('welcomeb') }}"><button class="step-button">Voir les produits</button></a>
      </div>
      <div class="step">
        <div class="step-icon">📊</div>
        <div class="step-title">Analyser les statistiques</div>
        <a href="{{ route('stat') }}"><button class="step-button">Voir les statistiques</button></a>
      </div>
    </div>

    <div class="metrics">
      <div class="loading-spinner" id="metrics-spinner"></div>
      <div class="metric">
        <div class="metric-title">Commandes aujourd'hui</div>
        <div class="metric-value">0.00 $</div>
      </div>
      <div class="metric">
        <div class="metric-title">Commandes cette semaine</div>
        <div class="metric-value">0.00 $</div>
      </div>
      <div class="metric">
        <div class="metric-title">Commandes ce mois-ci</div>
        <div class="metric-value">0.00 $</div>
      </div>
      <div class="metric">
        <div class="metric-title">Revenus totaux</div>
        <div class="metric-value">0.00 $</div>
      </div>
    </div>

    <div class="chart-container">
      <div class="loading-spinner" id="chart-spinner"></div>
      <canvas id="orderChart" height="100"></canvas>
    </div>

    <div class="orders-table">
      <h3>Dernières Commandes</h3>
      <table>
        <thead>
          <tr>
            <th>ID Commande</th>
            <th>Client</th>
            <th>Date</th>
            <th>Statut</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>#1234</td>
            <td>Jean Dupont</td>
            <td>20/08/2025</td>
            <td class="status-pending">En attente</td>
            <td>150.00 $</td>
          </tr>
          <tr>
            <td>#1233</td>
            <td>Marie Dubois</td>
            <td>19/08/2025</td>
            <td class="status-completed">Livré</td>
            <td>89.99 $</td>
          </tr>
          <tr>
            <td>#1232</td>
            <td>Pierre Martin</td>
            <td>18/08/2025</td>
            <td class="status-cancelled">Annulé</td>
            <td>45.00 $</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="no-data">
      Suivi de commande <i>?</i><br>
      Aucune donnée disponible
    </div>

    <div class="footer">
      <div class="footer-item">Commandes <span>0 Commandes</span></div>
      <div class="footer-item">Trafic des commandes <span>0 Visites</span></div>
    </div>
  </div>

  <script>
    // Display current date
    document.getElementById('current-date').textContent = new Date().toLocaleDateString('fr-FR', {
      weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'
    });

    // Dark mode toggle
    function toggleDarkMode() {
      document.body.classList.toggle('dark-mode');
      localStorage.setItem('darkMode', document.body.classList.contains('dark-mode'));
    }

    // Load dark mode preference
    if (localStorage.getItem('darkMode') === 'true') {
      document.body.classList.add('dark-mode');
    }

    // Simulated data loading with spinner
    function loadDashboardData() {
      document.getElementById('metrics-spinner').style.display = 'block';
      document.getElementById('chart-spinner').style.display = 'block';
      setTimeout(() => {
        document.getElementById('metrics-spinner').style.display = 'none';
        document.getElementById('chart-spinner').style.display = 'none';
      }, 1000); // Simulated delay
    }

    // Search functionality (placeholder)
    function searchDashboard(query) {
      console.log('Recherche:', query);
      // Implement search logic here (e.g., filter orders table)
    }

    // Export data functionality (placeholder)
    function exportData() {
      alert('Exportation des données en cours... (CSV/PDF)');
      // Implement export logic here
    }

    // Chart.js configuration for order trends
    const ctx = document.getElementById('orderChart').getContext('2d');
    new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'],
        datasets: [{
          label: 'Commandes cette semaine',
          data: [12, 19, 3, 5, 2, 3, 7], // Sample data
          borderColor: '#6b46c1',
          backgroundColor: 'rgba(107, 70, 193, 0.2)',
          fill: true,
          tension: 0.4
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: { position: 'top' },
          tooltip: { enabled: true },
          datalabels: {
            display: true,
            color: '#4b4b6a',
            font: { weight: 'bold' },
            formatter: (value) => value
          }
        },
        scales: {
          y: { beginAtZero: true, title: { display: true, text: 'Nombre de commandes' } },
          x: { title: { display: true, text: 'Jour' } }
        }
      }
    });

    // Initialize dashboard
    loadDashboardData();
  </script>
</body>
</html>
