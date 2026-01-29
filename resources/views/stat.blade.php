<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Statistique</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      min-height: 100vh;
      padding: 2rem 0;
    }

    .dashboard-container {
      backdrop-filter: blur(20px);
      background: rgba(255, 255, 255, 0.95);
      border-radius: 30px;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.2);
      padding: 2rem;
      margin: 0 auto;
      max-width: 1400px;
    }

    .header-section {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 3rem;
      padding-bottom: 1.5rem;
      border-bottom: 2px solid rgba(0, 0, 0, 0.05);
    }

    .dashboard-title {
      background: linear-gradient(135deg, #667eea, #764ba2);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      font-size: 2.5rem;
      font-weight: 800;
      display: flex;
      align-items: center;
      gap: 1rem;
    }

    .dashboard-title i {
      background: linear-gradient(135deg, #667eea, #764ba2);
      color: white;
      padding: 1rem;
      border-radius: 20px;
      font-size: 1.5rem;
    }

    .back-button {
      background: linear-gradient(135deg, #667eea, #764ba2);
      color: white;
      border: none;
      padding: 1rem 2rem;
      border-radius: 25px;
      font-weight: 600;
      display: flex;
      align-items: center;
      gap: 0.8rem;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      text-decoration: none;
      box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
    }

    .back-button:hover {
      transform: translateY(-3px);
      box-shadow: 0 15px 35px rgba(102, 126, 234, 0.4);
      color: white;
    }

    .analytics-card {
      background: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(20px);
      border-radius: 25px;
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
      border: 1px solid rgba(255, 255, 255, 0.2);
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      overflow: hidden;
    }

    .analytics-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
    }

    .metric-card {
      padding: 2.5rem 2rem;
      text-align: center;
      position: relative;
      overflow: hidden;
    }

    .metric-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 4px;
      background: linear-gradient(135deg, #667eea, #764ba2);
    }

    .metric-value {
      font-size: 2.8rem;
      font-weight: 800;
      background: linear-gradient(135deg, #667eea, #764ba2);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      margin-bottom: 0.5rem;
    }

    .metric-label {
      color: #6b7280;
      font-weight: 600;
      font-size: 1.1rem;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .card-header-modern {
      padding: 2rem 2rem 1rem;
      font-weight: 700;
      font-size: 1.3rem;
      color: #1f2937;
      background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
      border-bottom: none;
      position: relative;
    }

    .card-header-modern::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 2rem;
      right: 2rem;
      height: 3px;
      background: linear-gradient(135deg, #667eea, #764ba2);
      border-radius: 3px;
    }

    .chart-container {
      height: 400px;
      padding: 2rem;
      position: relative;
    }

    .country-metric {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1.2rem 2rem;
      border-bottom: 1px solid rgba(0, 0, 0, 0.05);
      transition: all 0.3s ease;
      position: relative;
    }

    .country-metric:hover {
      background: linear-gradient(135deg, rgba(102, 126, 234, 0.05), rgba(118, 75, 162, 0.05));
      transform: translateX(10px);
    }

    .country-metric:last-child {
      border-bottom: none;
      border-radius: 0 0 25px 25px;
    }

    .country-metric span {
      font-weight: 600;
      font-size: 1.1rem;
      color: #374151;
    }

    .country-metric strong {
      font-size: 1.2rem;
      background: linear-gradient(135deg, #667eea, #764ba2);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .stats-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 2rem;
      margin-bottom: 3rem;
    }

    .charts-section {
      display: grid;
      grid-template-columns: 2fr 1fr;
      gap: 2rem;
    }

    @media (max-width: 992px) {
      .charts-section {
        grid-template-columns: 1fr;
      }

      .dashboard-title {
        font-size: 2rem;
      }

      .header-section {
        flex-direction: column;
        gap: 1.5rem;
        text-align: center;
      }
    }

    .floating-elements {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      pointer-events: none;
      z-index: -1;
    }

    .floating-element {
      position: absolute;
      background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
      border-radius: 50%;
      animation: float 20s infinite linear;
    }

    .floating-element:nth-child(1) {
      width: 80px;
      height: 80px;
      top: 20%;
      left: 10%;
      animation-delay: 0s;
    }

    .floating-element:nth-child(2) {
      width: 60px;
      height: 60px;
      top: 60%;
      right: 15%;
      animation-delay: -7s;
    }

    .floating-element:nth-child(3) {
      width: 40px;
      height: 40px;
      bottom: 30%;
      left: 20%;
      animation-delay: -14s;
    }

    @keyframes float {
      0% {
        transform: translateY(0px) rotate(0deg);
        opacity: 0.5;
      }
      50% {
        transform: translateY(-30px) rotate(180deg);
        opacity: 0.8;
      }
      100% {
        transform: translateY(0px) rotate(360deg);
        opacity: 0.5;
      }
    }
  </style>
</head>
<body>
  <div class="floating-elements">
    <div class="floating-element"></div>
    <div class="floating-element"></div>
    <div class="floating-element"></div>
  </div>

  <div class="container">
    <div class="dashboard-container">
      <div class="header-section">
        <h1 class="dashboard-title">
          <i class="ri-store-2-line"></i>
          Statistique
        </h1>
        <a href="#" class="back-button" onclick="goBack()">
          <i class="ri-arrow-left-line"></i>
          Retour
        </a>
      </div>

      <div class="stats-grid">
        <div class="analytics-card metric-card">
          <div class="metric-value">35.2K$</div>
          <div class="metric-label">CA Mensuel</div>
        </div>
        <div class="analytics-card metric-card">
          <div class="metric-value">1,245</div>
          <div class="metric-label">Commandes</div>
        </div>
        <div class="analytics-card metric-card">
          <div class="metric-value">3,875</div>
          <div class="metric-label">Produits Vendus</div>
        </div>
        <div class="analytics-card metric-card">
          <div class="metric-value">820</div>
          <div class="metric-label">Clients Actifs</div>
        </div>
      </div>

      <div class="charts-section">
        <div class="analytics-card">
          <div class="card-header-modern">
            <i class="ri-line-chart-line me-2"></i>Évolution des Ventes
          </div>
          <div class="chart-container">
            <canvas id="salesChart"></canvas>
          </div>
        </div>

        <div class="analytics-card">
          <div class="card-header-modern">
            <i class="ri-earth-line me-2"></i>Ventes par Pays
          </div>
          <div class="chart-container">
            <canvas id="countryChart"></canvas>
          </div>
          <div class="country-metric">
            <span>🇫🇷 France</span><strong>12.4K$</strong>
          </div>
          <div class="country-metric">
            <span>🇪🇸 Espagne</span><strong>7.2K$</strong>
          </div>
          <div class="country-metric">
            <span>🇮🇹 Italie</span><strong>5.9K$</strong>
          </div>
          <div class="country-metric">
            <span>🇩🇪 Allemagne</span><strong>4.6K$</strong>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function goBack() {
      if (window.history.length > 1) {
        window.history.back();
      } else {
        window.location.href = '/';
      }
    }

    // Configuration des graphiques avec un style moderne
    Chart.defaults.font.family = "'Segoe UI', Tahoma, Geneva, Verdana, sans-serif";
    Chart.defaults.font.size = 12;
    Chart.defaults.color = '#6b7280';

    // Graphique des ventes avec gradient
    const salesCtx = document.getElementById("salesChart").getContext('2d');
    const salesGradient = salesCtx.createLinearGradient(0, 0, 0, 300);
    salesGradient.addColorStop(0, 'rgba(102, 126, 234, 0.3)');
    salesGradient.addColorStop(1, 'rgba(102, 126, 234, 0.05)');

    new Chart(salesCtx, {
      type: "line",
      data: {
        labels: ["Jan", "Fév", "Mar", "Avr", "Mai", "Juin", "Juil"],
        datasets: [{
          label: "Ventes ($)",
          data: [4200, 5100, 6100, 7500, 6800, 8200, 9100],
          borderColor: "#667eea",
          backgroundColor: salesGradient,
          fill: true,
          tension: 0.4,
          borderWidth: 3,
          pointBackgroundColor: "#667eea",
          pointBorderColor: "#ffffff",
          pointBorderWidth: 3,
          pointRadius: 6,
          pointHoverRadius: 8
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false
          },
          tooltip: {
            backgroundColor: 'rgba(0, 0, 0, 0.8)',
            titleColor: '#ffffff',
            bodyColor: '#ffffff',
            borderColor: '#667eea',
            borderWidth: 1,
            cornerRadius: 10,
            displayColors: false
          }
        },
        scales: {
          x: {
            grid: {
              display: false
            },
            border: {
              display: false
            }
          },
          y: {
            beginAtZero: true,
            grid: {
              color: 'rgba(0, 0, 0, 0.05)'
            },
            border: {
              display: false
            },
            ticks: {
              callback: function(value) {
                return value.toLocaleString() + '$';
              }
            }
          }
        },
        interaction: {
          intersect: false,
          mode: 'index'
        }
      }
    });

    // Graphique par pays avec couleurs modernes
    new Chart(document.getElementById("countryChart"), {
      type: "doughnut",
      data: {
        labels: ["France", "Espagne", "Italie", "Allemagne", "Autres"],
        datasets: [{
          data: [12400, 7200, 5900, 4600, 3800],
          backgroundColor: [
            "#667eea",
            "#764ba2",
            "#f093fb",
            "#f5576c",
            "#4facfe"
          ],
          borderWidth: 0,
          cutout: "75%"
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false
          },
          tooltip: {
            backgroundColor: 'rgba(0, 0, 0, 0.8)',
            titleColor: '#ffffff',
            bodyColor: '#ffffff',
            borderColor: '#667eea',
            borderWidth: 1,
            cornerRadius: 10,
            callbacks: {
              label: function(context) {
                return context.label + ': ' + context.parsed.toLocaleString() + '$';
              }
            }
          }
        }
      }
    });
  </script>
</body>
</html>
