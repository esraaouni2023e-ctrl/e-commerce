<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Votre Plateforme Professionnelle</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body { font-family:'Inter',sans-serif; background:linear-gradient(135deg,#667eea 0%,#764ba2 100%); min-height:100vh; color:#333; overflow-x:hidden; }
        .background-pattern { position:fixed; top:0; left:0; width:100%; height:100%; background: radial-gradient(circle at 20% 50%, rgba(120, 119, 198, 0.3) 0%, transparent 50%), radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.1) 0%, transparent 50%), radial-gradient(circle at 40% 80%, rgba(120, 119, 198, 0.2) 0%, transparent 50%); z-index:-1;}
        .container { max-width:1200px; margin:0 auto; padding:0 20px;}
        header { padding:20px 0; position:relative; z-index:10;}
        .nav-bar { display:flex; justify-content:space-between; align-items:center; background:rgba(255,255,255,0.1); backdrop-filter:blur(20px); border:1px solid rgba(255,255,255,0.2); border-radius:20px; padding:15px 30px; box-shadow:0 8px 32px rgba(0,0,0,0.1);}
        .logo { font-size:2rem; font-weight:800; color:white; text-decoration:none; display:flex; align-items:center; gap:10px;}
        .logo i { background:linear-gradient(45deg,#ff6b6b,#4ecdc4); background-clip:text; -webkit-background-clip:text; -webkit-text-fill-color:transparent; font-size:1.8rem;}
        .nav-actions { display:flex; gap:15px; align-items:center;}
        .btn { padding:12px 24px; border-radius:25px; text-decoration:none; font-weight:600; transition:all 0.3s ease; border:none; cursor:pointer; display:inline-flex; align-items:center; gap:8px; font-size:0.95rem;}
        .btn-primary { background:linear-gradient(135deg,#ff6b6b 0%,#ee5a52 100%); color:white; box-shadow:0 4px 15px rgba(255,107,107,0.3);}
        .btn-primary:hover { transform:translateY(-2px); box-shadow:0 8px 25px rgba(255,107,107,0.4);}
        .btn-secondary { background:rgba(0, 250, 250, 0.15); color:rgb(22, 23, 22); border:1px solid rgba(255,255,255,0.3);}
        .btn-secondary:hover { background:rgba(39, 154, 186, 0.25); transform:translateY(-1px);}
        main { padding:80px 0;}
        .hero { text-align:center; margin-bottom:60px;}
        .hero h1 { font-size:4rem; font-weight:800; color:white; margin-bottom:20px; text-shadow:0 2px 20px rgba(0,0,0,0.1);}
        .hero p { font-size:1.3rem; color:rgba(255,255,255,0.9); margin-bottom:40px; max-width:600px; margin-left:auto; margin-right:auto; line-height:1.6;}
        .user-card { background:rgba(255,255,255,0.95); backdrop-filter:blur(20px); border-radius:24px; padding:40px; max-width:550px; margin:0 auto; box-shadow:0 20px 60px rgba(0,0,0,0.1); border:1px solid rgba(255,255,255,0.3);}
        .user-info { text-align:center; margin-bottom:30px;}
        .user-avatar { width:90px; height:90px; background:linear-gradient(135deg,#667eea 0%,#764ba2 100%); border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto 20px; box-shadow:0 8px 25px rgba(102,126,234,0.3);}
        .user-avatar i { color:white; font-size:2rem;}
        .user-name { font-size:1.5rem; font-weight:700; color:#2c3e50; margin-bottom:8px;}
        .user-email { color:#7f8c8d; font-size:1rem; margin-bottom:20px;}
        .welcome-message { background:linear-gradient(135deg,#e8f5e8 0%,#f0f8ff 100%); padding:20px; border-radius:16px; border-left:4px solid #4ecdc4; margin-bottom:25px;}
        .welcome-message h2 { color:#2c3e50; font-size:1.3rem; margin-bottom:8px; display:flex; align-items:center; gap:10px;}
        .welcome-message p { color:#5a6c7d; line-height:1.5;}
        .guest-message { background:linear-gradient(135deg,#fff3cd 0%,#ffeaa7 100%); padding:30px; border-radius:16px; border-left:4px solid #fdcb6e; text-align:center;}
        .guest-message h2 { color:#2c3e50; font-size:1.4rem; margin-bottom:15px; display:flex; align-items:center; justify-content:center; gap:10px;}
        .guest-message p { color:#6c757d; margin-bottom:25px; line-height:1.6;}
        .action-buttons { display:flex; gap:15px; justify-content:center; flex-wrap:wrap;}
        .return-btn { margin-top:25px; text-align:center;}
    </style>
</head>
<body>
    <div class="background-pattern"></div>

    <div class="container">
        <header>
            <nav class="nav-bar">
                <a href="{{ url('/') }}" class="logo">
                    <i class="fas fa-rocket"></i>
                     LuxeShop
                </a>
                <div class="nav-actions">
                    <a href="#" class="btn btn-secondary">
                        <i class="fas fa-info-circle"></i> À propos
                    </a>
                    <a href="#" class="btn btn-primary">
                        <i class="fas fa-envelope"></i> Contact
                    </a>
                </div>
            </nav>
        </header>

        <main>
            <div class="hero">
                <h1>Bienvenue </h1>
                <p>Votre plateforme professionnelle pour une gestion simplifiée et efficace de vos projets</p>
            </div>

            <div class="user-card">
                @if(auth()->check())
                    <!-- Utilisateur connecté -->
                    <div class="user-info">
                        <div class="user-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                       <div class="user-name">{{ auth()->user()->name }}</div>
<div class="user-email">{{ auth()->user()->email }}</div>

                    </div>

                    <div class="welcome-message">
                        <h2>
                            <i class="fas fa-check-circle" style="color:#4ecdc4;"></i>
                            Bon retour !
                        </h2>
                        <p>Nous sommes ravis de vous revoir. Découvrez les dernières mises à jour de votre profil.</p>
                    </div>

                    <div class="action-buttons">
                        <a href="{{ route('show') }}" class="btn btn-primary">
                            <i class="fas fa-user-edit"></i> Voir / Modifier mon profil
                        </a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-secondary">
                                <i class="fas fa-sign-out-alt"></i> Se déconnecter
                            </button>
                        </form>
                    </div>

                    <div class="return-btn">
                        <a href="{{'/welcome-boutique'}}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Retour
                        </a>
                    </div>

                @else
                    <!-- Utilisateur invité -->
                    <div class="guest-message">
                        <h2>
                            <i class="fas fa-sign-in-alt" style="color:#fdcb6e;"></i>
                            Accès à votre espace
                        </h2>
                        <p>Connectez-vous pour accéder à votre tableau de bord personnalisé.</p>

                        <div class="return-btn">
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Retour
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </main>
    </div>
</body>
</html>
