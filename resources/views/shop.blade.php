<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Bienvenue sur LuxeShop | Élégance & Excellence</title>
  <meta name="description" content="Découvrez des produits d'exception. Livraison rapide, qualité premium, style intemporel." />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    :root {
      --primary: #5a189a;        /* Deep Purple */
      --primary-light: #7b2cbf;  /* Soft Violet */
      --primary-dark: #3c096c;   /* Dark Purple */
      --secondary: #3a86ff;      /* Bright Blue */
      --secondary-light: #4361ee; /* Deep Blue */
      --accent: #8338ec;         /* Electric Purple */
      --text-dark: #1a1a2e;
      --text-light: #5e5e72;
      --bg-light: #f8f9ff;
      --white: #ffffff;
      --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.1);
      --shadow-md: 0 4px 12px rgba(0, 0, 0, 0.1);
      --shadow-lg: 0 10px 25px rgba(0, 0, 0, 0.15);
      --shadow-xl: 0 20px 30px rgba(0, 0, 0, 0.2);
      --border-radius: 16px;
      --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, var(--primary-dark), var(--primary), var(--secondary-light));
      color: var(--text-dark);
      min-height: 100vh;
      overflow-x: hidden;
      background-attachment: fixed;
    }

    /* Animated Background Shapes */
    .bg-animation {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 0;
      pointer-events: none;
      overflow: hidden;
    }

    .floating-shape {
      position: absolute;
      opacity: 0.1;
      border-radius: 30%;
      animation: float 8s ease-in-out infinite;
    }

    .shape-1 {
      top: 15%;
      left: 10%;
      width: 100px;
      height: 100px;
      background: var(--secondary);
      animation-delay: 0s;
    }

    .shape-2 {
      top: 60%;
      right: 20%;
      width: 80px;
      height: 80px;
      background: var(--primary);
      animation-delay: 3s;
    }

    .shape-3 {
      bottom: 30%;
      left: 25%;
      width: 60px;
      height: 60px;
      background: var(--accent);
      transform: rotate(30deg);
      animation-delay: 5s;
    }

    @keyframes float {
      0%, 100% { transform: translateY(0) rotate(0deg); }
      33% { transform: translateY(-25px) rotate(10deg); }
      66% { transform: translateY(15px) rotate(-5deg); }
    }

    /* Navigation */
    nav {
      position: relative;
      z-index: 100;
      padding: 24px 0;
    }

    .nav-container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .logo {
      font-family: 'Playfair Display', serif;
      font-size: 2.7rem;
      font-weight: 700;
      color: var(--white);
      text-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
      letter-spacing: -1px;
      position: relative;
    }

    .logo span {
      color: var(--secondary-light);
      position: relative;
    }

    .logo span::after {
      content: '';
      position: absolute;
      bottom: -6px;
      left: 0;
      width: 100%;
      height: 4px;
      background: linear-gradient(90deg, var(--secondary-light), var(--accent));
      border-radius: 2px;
      box-shadow: 0 2px 8px rgba(67, 97, 238, 0.4);
    }

    .auth-buttons {
      display: flex;
      gap: 16px;
      align-items: center;
    }

    .btn {
      padding: 14px 28px;
      border-radius: var(--border-radius);
      font-size: 1rem;
      font-weight: 600;
      text-decoration: none;
      transition: var(--transition);
      display: inline-flex;
      align-items: center;
      gap: 10px;
      position: relative;
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.2);
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .btn::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
      transition: left 0.6s ease;
      z-index: -1;
    }

    .btn:hover::before {
      left: 100%;
    }

    .btn-signin {
      background: rgba(255, 255, 255, 0.1);
      color: var(--white);
    }

    .btn-signin:hover {
      background: rgba(255, 255, 255, 0.2);
      transform: translateY(-3px);
      box-shadow: var(--shadow-lg);
    }

    .btn-signup {
      background: var(--white);
      color: var(--primary-dark);
      font-weight: 700;
    }

    .btn-signup:hover {
      background: #fff;
      transform: translateY(-3px);
      box-shadow: var(--shadow-xl);
      color: var(--accent);
    }

    /* Hero Section */
    .hero {
      position: relative;
      z-index: 10;
      text-align: center;
      padding: 100px 20px 140px;
      max-width: 1200px;
      margin: 0 auto;
    }

    .promo-badge {
      background: linear-gradient(135deg, var(--accent), var(--secondary));
      color: var(--white);
      padding: 14px 28px;
      border-radius: 50px;
      font-size: 1rem;
      font-weight: 600;
      display: inline-flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 32px;
      box-shadow: var(--shadow-md);
      animation: pulse 2s infinite;
      letter-spacing: 0.5px;
    }

    @keyframes pulse {
      0%, 100% { transform: scale(1); opacity: 1; }
      50% { transform: scale(1.08); opacity: 0.9; }
    }

    .hero h1 {
      font-family: 'Playfair Display', serif;
      font-size: clamp(2.8rem, 6vw, 4.5rem);
      font-weight: 700;
      color: var(--white);
      margin-bottom: 24px;
      text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
      line-height: 1.15;
      letter-spacing: -0.5px;
    }

    .hero .lead {
      font-size: 1.3rem;
      color: rgba(255, 255, 255, 0.95);
      margin-bottom: 48px;
      line-height: 1.7;
      max-width: 700px;
      margin-left: auto;
      margin-right: auto;
      font-weight: 300;
      letter-spacing: 0.3px;
    }

    .cta-button {
      display: inline-flex;
      align-items: center;
      gap: 14px;
      background: var(--white);
      color: var(--primary-dark);
      font-weight: 700;
      font-size: 1.15rem;
      padding: 18px 40px;
      border-radius: 20px;
      text-decoration: none;
      margin: 20px 0 70px;
      transition: var(--transition);
      box-shadow: var(--shadow-lg);
      position: relative;
      overflow: hidden;
      letter-spacing: 0.5px;
    }

    .cta-button::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(135deg, var(--secondary), var(--accent));
      opacity: 0;
      transition: opacity 0.4s ease;
      z-index: -1;
    }

    .cta-button:hover {
      transform: translateY(-5px);
      box-shadow: var(--shadow-xl);
      color: var(--white);
    }

    .cta-button:hover::before {
      opacity: 1;
    }

    .cta-button:active {
      transform: translateY(-2px);
    }

    /* Features Section */
    .features {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 32px;
      margin-top: 90px;
      padding: 0 20px;
      max-width: 1200px;
      margin-left: auto;
      margin-right: auto;
    }

    .feature {
      background: var(--white);
      border-radius: var(--border-radius);
      padding: 40px 25px;
      box-shadow: var(--shadow-md);
      transition: var(--transition);
      position: relative;
      overflow: hidden;
      backdrop-filter: blur(10px);
    }

    .feature::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 6px;
      background: linear-gradient(90deg, var(--primary), var(--secondary));
    }

    .feature:hover {
      transform: translateY(-10px);
      box-shadow: var(--shadow-xl);
    }

    .feature-icon {
      width: 72px;
      height: 72px;
      background: linear-gradient(135deg, var(--primary), var(--accent));
      border-radius: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 24px;
      box-shadow: 0 8px 16px rgba(90, 24, 154, 0.2);
    }

    .feature i {
      font-size: 1.9rem;
      color: var(--white);
    }

    .feature h3 {
      font-size: 1.45rem;
      font-weight: 600;
      color: var(--text-dark);
      margin-bottom: 16px;
      text-align: center;
    }

    .feature p {
      font-size: 1rem;
      color: var(--text-light);
      line-height: 1.7;
      text-align: center;
    }

    /* Footer */
    footer {
      margin-top: 140px;
      text-align: center;
      color: rgba(255, 255, 255, 0.85);
      font-size: 0.95rem;
      padding: 50px 20px 40px;
      position: relative;
      z-index: 10;
    }

    footer::before {
      content: '';
      position: absolute;
      top: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 120px;
      height: 1px;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
    }

    footer a {
      color: var(--secondary-light);
      text-decoration: none;
      font-weight: 500;
      transition: all 0.3s ease;
    }

    footer a:hover {
      color: var(--white);
      text-decoration: underline;
    }

    /* Animation d'entrée */
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(40px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .hero,
    .features {
      animation: fadeInUp 1s ease-out;
    }

    .features {
      animation-delay: 0.3s;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .nav-container {
        flex-direction: column;
        gap: 20px;
        text-align: center;
      }

      .auth-buttons {
        flex-direction: column;
        width: 100%;
        max-width: 320px;
      }

      .btn {
        width: 100%;
        justify-content: center;
      }

      .hero {
        padding: 80px 20px 100px;
      }

      .hero h1 {
        font-size: 3rem;
      }

      .features {
        grid-template-columns: 1fr;
        gap: 24px;
        margin-top: 70px;
      }

      .feature {
        padding: 32px 20px;
      }
    }

    @media (max-width: 480px) {
      .logo {
        font-size: 2.3rem;
      }

      .promo-badge {
        font-size: 0.9rem;
        padding: 10px 20px;
      }

      .cta-button {
        font-size: 1.05rem;
        padding: 16px 32px;
      }

      footer {
        margin-top: 100px;
        font-size: 0.9rem;
      }
    }
  </style>
</head>
<body>
  <!-- Background Animation -->
  <div class="bg-animation">
    <div class="floating-shape shape-1"></div>
    <div class="floating-shape shape-2"></div>
    <div class="floating-shape shape-3"></div>
  </div>

  <!-- Navigation -->
  <nav>
    <div class="nav-container">
      <div class="logo">LUXE<span>SHOP</span></div>
      <div class="auth-buttons">
        <a href="{{ '/signin' }}" class="btn btn-signin">
          <i class="fas fa-sign-in-alt"></i>
          Se connecter
        </a>
        <a href="{{ route('register') }}" class="btn btn-signup">
          <i class="fas fa-user-plus"></i>
          S'inscrire
        </a>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero">
    <div class="promo-badge">
      <i class="fas fa-gift"></i>
      OFFRE EXCLUSIVE : -30% pour les nouveaux clients
    </div>

    <h1>Élégance. Style. Excellence.</h1>
    <p class="lead">
      Des produits soigneusement sélectionnés, des finitions irréprochables,
      une expérience d'achat digne des plus grandes maisons de luxe.
    </p>


    <a href="/welcome-client" class="cta-button">
      <i class="fas fa-shopping-bag"></i>
      Explorer la Collection
    </a>


    <div class="features">
      <div class="feature">
        <div class="feature-icon">
          <i class="fas fa-truck"></i>
        </div>
        <h3>Livraison Premium</h3>
        <p>Gratuite dès 100€. Emballage cadeau offert pour une expérience d'exception.</p>
      </div>
      <div class="feature">
        <div class="feature-icon">
          <i class="fas fa-shield-alt"></i>
        </div>
        <h3>Sécurité Totale</h3>
        <p>Paiements cryptés, protection des données, garantie d'authenticité pour votre tranquillité.</p>
      </div>
      <div class="feature">
        <div class="feature-icon">
          <i class="fas fa-undo-alt"></i>
        </div>
        <h3>Retours Faciles</h3>
        <p>30 jours pour changer d'avis, sans frais ni justification nécessaire.</p>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <p>&copy; 2025 LuxeShop. Tous droits réservés.</p>
    <p style="margin-top: 12px;">
      <a href="/cgu">CGU</a> |
      <a href="/confidentialite">Confidentialité</a> |
      <a href="/contact">Support</a>
    </p>
  </footer>
</body>
</html>
