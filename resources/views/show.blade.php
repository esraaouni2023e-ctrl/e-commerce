<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil</title>
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
        .btn { padding:12px 24px; border-radius:25px; text-decoration:none; font-weight:600; transition:all 0.3s ease; border:none; cursor:pointer; display:inline-flex; align-items:center; gap:8px; font-size:0.95rem;}
        .btn-primary { background:linear-gradient(135deg,#ff6b6b 0%,#ee5a52 100%); color:white; box-shadow:0 4px 15px rgba(255,107,107,0.3);}
        .btn-primary:hover { transform:translateY(-2px); box-shadow:0 8px 25px rgba(255,107,107,0.4);}
        .btn-secondary { background:rgba(255,255,255,0.15); color:white; border:1px solid rgba(255,255,255,0.3);}
        .btn-secondary:hover { background:rgba(255,255,255,0.25); transform:translateY(-1px);}
        main { padding:80px 0;}
        .form-card { background:rgba(255,255,255,0.95); backdrop-filter:blur(20px); border-radius:24px; padding:40px; max-width:600px; margin:0 auto; box-shadow:0 20px 60px rgba(0,0,0,0.1); border:1px solid rgba(255,255,255,0.3);}
        .form-card h1 { text-align:center; color:#2c3e50; margin-bottom:25px; font-size:2rem;}
        .form-group { margin-bottom:20px;}
        .form-group label { display:block; margin-bottom:8px; font-weight:600; color:#2c3e50;}
        .form-group input { width:100%; padding:12px 15px; border-radius:12px; border:1px solid #ccc; font-size:1rem; outline:none; transition:0.3s;}
        .form-group input:focus { border-color:#667eea; box-shadow:0 0 8px rgba(102,126,234,0.4);}
        .success-message { background:#d4edda; color:#155724; padding:12px; border-radius:12px; margin-bottom:20px; text-align:center;}
        .guest-message { text-align:center; color:#fff;}
    </style>
</head>
<body>
    <div class="background-pattern"></div>
    <div class="container">
        <header>
            <nav class="nav-bar">
                <a href="{{ url('/') }}" class="logo">
                    <i class="fas fa-rocket"></i> Parab
                </a>
                <a href="{{ route('parab') }}" class="btn btn-secondary">
                    <i class="fas fa-home"></i> Accueil
                </a>
            </nav>
        </header>

        <main>
            <div class="form-card">
                <h1><i class="fas fa-user-edit"></i> Mon Profil</h1>

                @if(session('success'))
                    <div class="success-message">{{ session('success') }}</div>
                @endif

                @if(auth()->check())
                    <form action="{{ route('show.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Nom</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Mettre à jour
                        </button>
                    </form>
                @else
                    <div class="guest-message">
                        <p>Aucun utilisateur connecté.</p>
                        <a href="{{ route('login') }}" class="btn btn-primary">
                            <i class="fas fa-sign-in-alt"></i> Se connecter
                        </a>
                    </div>
                @endif
            </div>
        </main>
    </div>
</body>
</html>
