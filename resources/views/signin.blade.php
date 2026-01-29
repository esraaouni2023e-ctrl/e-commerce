<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Connexion - LuxeShop</title>

  <!-- Google Fonts : Élégance & lisibilité -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@700;800&display=swap" rel="stylesheet">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    :root {
      --primary: #5a189a;
      --primary-light: #7b2cbf;
      --secondary: #3a86ff;
      --accent: #8338ec;
      --text-dark: #1a1a2e;
      --text-light: #5e5e72;
      --white: #ffffff;
      --bg-dark: #0f0f1a;
      --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.1);
      --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.12);
      --shadow-lg: 0 10px 30px rgba(0, 0, 0, 0.18);
      --shadow-xl: 0 20px 40px rgba(0, 0, 0, 0.2);
      --border-radius: 18px;
      --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      --transition-fast: all 0.2s ease;
    }

    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, #1e1e3f, var(--primary), var(--secondary-light));
      color: var(--text-dark);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
      position: relative;
      overflow: hidden;
      background-attachment: fixed;
    }

    /* Background Animé : Particules flottantes */
    .bg-particle {
      position: absolute;
      border-radius: 50%;
      opacity: 0.1;
      pointer-events: none;
      filter: blur(20px);
      animation: float 8s infinite ease-in-out alternate;
    }

    .particle-1 {
      width: 200px;
      height: 200px;
      background: var(--secondary);
      top: 10%;
      right: 10%;
      animation-delay: 0s;
    }

    .particle-2 {
      width: 150px;
      height: 150px;
      background: var(--accent);
      bottom: 15%;
      left: 10%;
      animation-delay: 4s;
    }

    @keyframes float {
      0% { transform: translateY(0) rotate(0deg); }
      100% { transform: translateY(-30px) rotate(10deg); }
    }

    /* Login Container */
    .login-wrapper {
      max-width: 460px;
      width: 100%;
      position: relative;
      z-index: 10;
    }

    .login-card {
      background: rgba(255, 255, 255, 0.92);
      backdrop-filter: blur(12px);
      border-radius: var(--border-radius);
      box-shadow: var(--shadow-xl);
      overflow: hidden;
      transition: var(--transition);
    }

    .login-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.25);
    }

    .login-header {
      background: linear-gradient(135deg, var(--primary), var(--accent));
      color: var(--white);
      padding: 40px 30px 30px;
      text-align: center;
      font-family: 'Playfair Display', serif;
      font-size: 2.1rem;
      font-weight: 800;
      letter-spacing: -1px;
      position: relative;
    }

    .login-header::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 60px;
      height: 4px;
      background: var(--white);
      border-radius: 2px;
      margin-top: 12px;
    }

    .login-body {
      padding: 40px;
    }

    .form-title {
      font-size: 1.3rem;
      font-weight: 600;
      color: var(--text-dark);
      margin-bottom: 28px;
      text-align: center;
    }

    .form-group {
      position: relative;
      margin-bottom: 24px;
    }

    .form-icon {
      position: absolute;
      left: 16px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--primary-light);
      font-size: 18px;
      z-index: 2;
      transition: var(--transition-fast);
    }

    .form-control {
      width: 100%;
      padding: 15px 16px 15px 48px;
      border: 1px solid #e2e8f0;
      border-radius: 14px;
      font-size: 1rem;
      font-family: 'Inter', sans-serif;
      color: var(--text-dark);
      background: var(--white);
      transition: var(--transition);
      outline: none;
    }

    .form-control:focus {
      border-color: var(--primary-light);
      box-shadow: 0 0 0 4px rgba(123, 44, 191, 0.15);
      transform: translateY(-1px);
    }

    .form-control:focus + .form-icon {
      color: var(--accent);
    }

    /* Bouton moderne avec effet de surbrillance */
    .btn-login {
      display: block;
      width: 100%;
      padding: 15px;
      background: linear-gradient(135deg, var(--primary), var(--secondary));
      color: var(--white);
      font-weight: 600;
      font-size: 1.05rem;
      border: none;
      border-radius: 14px;
      cursor: pointer;
      transition: var(--transition);
      box-shadow: var(--shadow-md);
      position: relative;
      overflow: hidden;
    }

    .btn-login::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
      transition: left 0.7s ease;
    }

    .btn-login:hover::before {
      left: 120%;
    }

    .btn-login:hover {
      transform: translateY(-3px);
      box-shadow: var(--shadow-lg);
    }

    .btn-login:active {
      transform: translateY(-1px);
    }

    .login-footer {
      text-align: center;
      margin-top: 28px;
      font-size: 0.95rem;
      color: var(--text-light);
    }

    .login-footer a {
      color: var(--primary-light);
      font-weight: 600;
      text-decoration: none;
      transition: var(--transition);
    }

    .login-footer a:hover {
      color: var(--accent);
      text-decoration: underline;
    }

    /* Alert d'erreur stylisée */
    .alert-danger {
      background: #fee2e2;
      color: #b91c1c;
      padding: 14px;
      border-radius: 12px;
      font-size: 0.92rem;
      margin-bottom: 24px;
      border-left: 4px solid #ef4444;
    }

    .alert-danger ul {
      list-style: none;
      padding-left: 0;
      margin: 0;
    }

    .alert-danger li {
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .alert-danger i {
      font-size: 0.8rem;
    }

    /* Responsive */
    @media (max-width: 480px) {
      .login-body {
        padding: 30px 24px;
      }

      .login-header {
        font-size: 1.8rem;
        padding: 32px 20px 24px;
      }

      .form-title {
        font-size: 1.2rem;
      }

      .btn-login {
        padding: 14px;
        font-size: 1rem;
      }
    }
  </style>
</head>
<body>

  <!-- Background Particles -->
  <div class="bg-particle particle-1"></div>
  <div class="bg-particle particle-2"></div>

  <!-- Login Form -->
  <div class="login-wrapper">
    <div class="login-card">
      <div class="login-header">
        Bienvenue
      </div>

      <div class="login-body">
        <!-- Exemple d'erreur (décommenter si nécessaire) -->
        <!--
        <div class="alert-danger">
          <ul>
            <li><i class="fas fa-exclamation-circle"></i> Email ou mot de passe incorrect.</li>
          </ul>
        </div>
        -->

        <form method="POST" action="/signin">
          @csrf

          <div class="form-title">Connectez-vous à votre compte</div>

          <div class="form-group">
            <i class="fas fa-envelope form-icon"></i>
            <input
              type="email"
              name="email"
              class="form-control"
              placeholder="Adresse email"
              required
              autofocus
              aria-label="Adresse email"
            />
          </div>

          <div class="form-group">
            <i class="fas fa-lock form-icon"></i>
            <input
              type="password"
              name="password"
              class="form-control"
              placeholder="Mot de passe"
              required
              aria-label="Mot de passe"
            />
          </div>

          <button type="submit" class="btn-login">
            <i class="fas fa-sign-in-alt"></i> Se connecter
          </button>

          <div class="login-footer">
            Pas encore de compte ? <a href="/register">S'inscrire</a>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>
</html>
