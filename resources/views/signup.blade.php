<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Inscription - LuxeShop</title>

  <!-- Google Fonts -->
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
      --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.1);
      --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.12);
      --shadow-lg: 0 10px 30px rgba(0, 0, 0, 0.18);
      --shadow-xl: 0 20px 40px rgba(0, 0, 0, 0.2);
      --border-radius: 18px;
      --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
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

    /* Background Particles */
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

    /* Register Container */
    .register-wrapper {
      max-width: 500px;
      width: 100%;
      position: relative;
      z-index: 10;
    }

    .register-card {
      background: rgba(255, 255, 255, 0.94);
      backdrop-filter: blur(12px);
      border-radius: var(--border-radius);
      box-shadow: var(--shadow-xl);
      overflow: hidden;
      transition: var(--transition);
    }

    .register-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.25);
    }

    .register-header {
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

    .register-header::after {
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

    .register-body {
      padding: 40px;
    }

    .form-title {
      font-size: 1.3rem;
      font-weight: 600;
      color: var(--text-dark);
      margin-bottom: 28px;
      text-align: center;
    }

    /* Form Group */
    .form-group {
      position: relative;
      margin-bottom: 20px;
    }

    .form-icon {
      position: absolute;
      left: 16px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--primary-light);
      font-size: 17px;
      z-index: 2;
      transition: color 0.3s ease;
    }

    .form-control {
      width: 100%;
      padding: 15px 16px 15px 48px;
      border: 1px solid #e2e8f0;
      border-radius: 14px;
      font-size: 1rem;
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

    /* Select */
    .form-select {
      width: 100%;
      padding: 14px 16px;
      border: 1px solid #e2e8f0;
      border-radius: 14px;
      font-size: 1rem;
      color: var(--text-dark);
      background: var(--white);
      transition: var(--transition);
      outline: none;
    }

    .form-select:focus {
      border-color: var(--primary-light);
      box-shadow: 0 0 0 4px rgba(123, 44, 191, 0.15);
    }

    .form-label {
      display: block;
      font-size: 0.95rem;
      color: var(--text-light);
      margin-bottom: 8px;
      font-weight: 500;
    }

    /* Bouton Google */
    .btn-google {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      background: white;
      color: #333;
      padding: 12px 20px;
      border: 1px solid #ddd;
      border-radius: 14px;
      text-decoration: none;
      font-weight: 500;
      transition: all 0.2s ease;
      width: 100%;
    }

    .btn-google:hover {
      background: #f1f1f1;
      border-color: #c6c6c6;
      box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }

    /* Boutons sociaux */
    .social-buttons {
      display: flex;
      gap: 16px;
      margin: 30px 0 20px;
    }

    .btn-social {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      padding: 12px;
      border-radius: 14px;
      font-weight: 600;
      font-size: 0.98rem;
      text-decoration: none;
      transition: var(--transition);
      border: 1px solid #e2e8f0;
      background: var(--white);
      color: var(--text-dark);
      box-shadow: var(--shadow-sm);
    }

    .btn-social i {
      font-size: 1.1rem;
    }

    .btn-social.github:hover {
      background: #f8f9fa;
      transform: translateY(-2px);
    }

    .social-divider {
      display: flex;
      align-items: center;
      text-align: center;
      margin: 20px 0;
      color: var(--text-light);
      font-size: 0.9rem;
    }

    .social-divider::before,
    .social-divider::after {
      content: '';
      flex: 1;
      border-bottom: 1px solid #e2e8f0;
    }

    .social-divider::before {
      margin-right: 12px;
    }

    .social-divider::after {
      margin-left: 12px;
    }

    /* Bouton principal */
    .btn-register {
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

    .btn-register::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
      transition: left 0.7s ease;
    }

    .btn-register:hover::before {
      left: 120%;
    }

    .btn-register:hover {
      transform: translateY(-3px);
      box-shadow: var(--shadow-lg);
    }

    .btn-register:active {
      transform: translateY(-1px);
    }

    /* Footer */
    .register-footer {
      text-align: center;
      margin-top: 24px;
      font-size: 0.95rem;
      color: var(--text-light);
    }

    .register-footer a {
      color: var(--primary-light);
      font-weight: 600;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .register-footer a:hover {
      color: var(--accent);
      text-decoration: underline;
    }

    /* Alert d'erreur */
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
    }

    .alert-danger li {
      display: flex;
      align-items: center;
      gap: 8px;
    }

    /* Responsive */
    @media (max-width: 480px) {
      .social-buttons {
        flex-direction: column;
      }

      .register-body {
        padding: 30px 24px;
      }

      .register-header {
        font-size: 1.8rem;
        padding: 32px 20px 24px;
      }

      .btn-register {
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

  <!-- Register Form -->
  <div class="register-wrapper">
    <div class="register-card">
      <div class="register-header">
        Créer un compte
      </div>

      <div class="register-body">

        <!-- Affichage des erreurs -->
        @if($errors->any())
          <div class="alert-danger">
            <ul>
              @foreach($errors->all() as $error)
                <li><i class="fas fa-exclamation-circle"></i> {{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form method="POST" action="{{ route('register.submit') }}">
          @csrf

          <div class="form-title">Inscrivez-vous pour accéder à tout</div>

          <!-- Nom -->
          <div class="form-group">
            <i class="fas fa-user form-icon"></i>
            <input
              type="text"
              name="name"
              class="form-control"
              placeholder="Nom complet"
              value="{{ old('name') }}"
              required
              autofocus
              aria-label="Nom complet"
            />
          </div>

          <!-- Email -->
          <div class="form-group">
            <i class="fas fa-envelope form-icon"></i>
            <input
              type="email"
              name="email"
              class="form-control"
              placeholder="Adresse email"
              value="{{ old('email') }}"
              required
              aria-label="Adresse email"
            />
          </div>

          <!-- Mot de passe -->
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

          <!-- Confirmation -->
          <div class="form-group">
            <i class="fas fa-check-circle form-icon"></i>
            <input
              type="password"
              name="password_confirmation"
              class="form-control"
              placeholder="Confirmer le mot de passe"
              required
              aria-label="Confirmer le mot de passe"
            />
          </div>

          <!-- Rôle -->
          <div class="mb-3">
            <label for="role" class="form-label">Rôle</label>
            <select class="form-select" name="role" id="role" required>
              <option value="" disabled selected>Choisir un rôle</option>
              <option value="client" {{ old('role') == 'client' ? 'selected' : '' }}>Client</option>
              <option value="boutique" {{ old('role') == 'boutique' ? 'selected' : '' }}>Boutique</option>
            </select>
          </div>

          <!-- Submit -->
          <button type="submit" class="btn-register">
            <i class="fas fa-user-plus"></i> S'inscrire
          </button>

          <!-- Séparateur -->
          <div class="social-divider">Ou continuer avec</div>

          <!-- Boutons sociaux -->
          <div class="social-buttons">
            <a href="{{ route('auth.google') }}" class="btn-google">
              <i class="fab fa-google"></i>
              Google
            </a>
            <a href="{{ route('auth.github') }}" class="btn-social github">
              <i class="fab fa-github"></i> GitHub
            </a>
          </div>

          <!-- Footer -->
          <div class="register-footer">
            Déjà un compte ? <a href="{{ route('signin') }}">Se connecter</a>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>
</html>
