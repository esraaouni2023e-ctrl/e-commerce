
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Utilisateur - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --primary-color: #667eea;
            --secondary-color: #1a202c;
            --success-color: #48bb78;
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
            overflow-x: hidden;
        }

        .main-wrapper {
            padding: 3rem 1.5rem;
            min-height: 100vh;
            max-width: 800px;
            margin: 0 auto;
            display: flex;
            align-items: center;
        }

        .content-card {
            background: var(--card-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius-lg);
            box-shadow: var(--shadow-md);
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            width: 100%;
        }

        .content-card:hover {
            box-shadow: var(--shadow-lg);
            transform: translateY(-6px);
        }

        .content-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 8px;
            background: var(--primary-gradient);
            transition: height 0.3s ease;
        }

        .content-card:hover::before {
            height: 16px;
        }

        .card-header {
            background: var(--primary-gradient);
            color: white;
            padding: 1.5rem 2rem;
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
            opacity: 0.5;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin: 0;
            position: relative;
            z-index: 1;
        }

        .card-title i {
            font-size: 1.25rem;
        }

        .card-body {
            padding: 2rem;
        }

        .form-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid var(--border-color);
        }

        .form-header .avatar {
            background: var(--primary-gradient);
            width: 48px;
            height: 48px;
            border-radius: var(--border-radius);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 1.2rem;
            flex-shrink: 0;
            box-shadow: var(--shadow-sm);
        }

        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .form-input,
        .form-select {
            width: 100%;
            padding: 0.875rem 1.25rem;
            border: 2px solid var(--border-color);
            border-radius: var(--border-radius);
            font-size: 0.95rem;
            background: white;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: var(--shadow-sm);
            appearance: none;
        }

        .form-select {
            background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="%23718096"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>');
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 1.2em;
        }

        .form-input:focus,
        .form-select:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
        }

        .form-input:hover,
        .form-select:hover {
            border-color: var(--primary-color);
        }

        .form-group.has-error .form-input,
        .form-group.has-error .form-select {
            border-color: var(--danger-color);
            box-shadow: 0 0 0 4px rgba(245, 101, 101, 0.1);
        }

        .form-error {
            color: var(--danger-color);
            font-size: 0.8rem;
            margin-top: 0.25rem;
            display: block;
            font-weight: 500;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: var(--border-radius);
            border: none;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
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
            background: linear-gradient(135deg, #5a6fd8 0%, #6a3e8e 100%);
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

        .button-group {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            justify-content: flex-end;
        }

        .alert {
            padding: 1rem 1.5rem;
            border-radius: var(--border-radius);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 0.9rem;
            position: relative;
            box-shadow: var(--shadow-sm);
        }

        .alert-success {
            background: rgba(16, 185, 129, 0.15);
            color: var(--success-color);
            border: 1px solid rgba(16, 185, 129, 0.3);
        }

        .alert-danger {
            background: rgba(239, 68, 68, 0.15);
            color: var(--danger-color);
            border: 1px solid rgba(239, 68, 68, 0.3);
        }

        .alert i {
            font-size: 1.1rem;
        }

        @media (max-width: 768px) {
            .main-wrapper {
                padding: 1.5rem;
            }

            .card-header {
                padding: 1rem;
                flex-direction: column;
                align-items: flex-start;
                gap: 0.75rem;
            }

            .card-title {
                font-size: 1.25rem;
            }

            .card-body {
                padding: 1.5rem;
            }

            .form-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .button-group {
                flex-direction: column;
                align-items: stretch;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s ease-out forwards;
        }

        .animate-fade-in-delay-1 {
            animation-delay: 0.1s;
        }

        .animate-fade-in-delay-2 {
            animation-delay: 0.2s;
        }

        .animate-fade-in-delay-3 {
            animation-delay: 0.3s;
        }
    </style>
</head>
<body>
    <div class="main-wrapper">
        <div class="content-card animate-fade-in">
            <div class="card-header">
                <div class="card-title">
                    <i class="fas fa-user-edit"></i>
                    Modifier Utilisateur
                </div>
                <a href="{{ '/admin', $user->id }}" class="btn btn-outline">
                    <i class="fas fa-arrow-left"></i>
                    Retour
                </a>
            </div>
            <div class="card-body">
                <div class="form-header animate-fade-in-delay-1">
                    <div class="avatar">{{ substr($user->name, 0, 1) }}</div>
                    <div>
                        <h4 class="font-semibold text-md">{{ $user->name }}</h4>
                        <p class="text-sm text-gray-500">{{ $user->email }}</p>
                    </div>
                </div>

                @if (session('success'))
                    <div class="alert alert-success animate-fade-in-delay-1">
                        <i class="fas fa-check-circle"></i>
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger animate-fade-in-delay-1">
                        <i class="fas fa-exclamation-circle"></i>
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group animate-fade-in-delay-1 {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name" class="form-label">Nom</label>
                        <input type="text" name="name" id="name" class="form-input" value="{{ old('name', $user->name) }}" required>
                        @error('name')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group animate-fade-in-delay-2 {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-input" value="{{ old('email', $user->email) }}" required>
                        @error('email')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group animate-fade-in-delay-3 {{ $errors->has('role') ? 'has-error' : '' }}">
                        <label for="role" class="form-label">Rôle</label>
                        <select name="role" id="role" class="form-select">
                            <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="boutique" {{ old('role', $user->role) === 'boutique' ? 'selected' : '' }}>Boutique</option>
                            <option value="client" {{ old('role', $user->role) === 'client' ? 'selected' : '' }}>Client</option>
                        </select>
                        @error('role')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="button-group animate-fade-in-delay-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i>
                            Enregistrer
                        </button>
                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-outline">
                            <i class="fas fa-times"></i>
                            Annuler
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Animate elements on load
        document.addEventListener('DOMContentLoaded', () => {
            const elements = document.querySelectorAll('.animate-fade-in, .animate-fade-in-delay-1, .animate-fade-in-delay-2, .animate-fade-in-delay-3');
            elements.forEach(el => {
                el.classList.add('visible');
            });
        });

        // Form input focus animation
        const inputs = document.querySelectorAll('.form-input, .form-select');
        inputs.forEach(input => {
            input.addEventListener('focus', () => {
                const label = input.parentElement.querySelector('.form-label');
                if (label) {
                    label.style.transform = 'translateY(-4px)';
                    label.style.color = 'var(--primary-color)';
                    label.style.fontSize = '0.85rem';
                }
            });
            input.addEventListener('blur', () => {
                const label = input.parentElement.querySelector('.form-label');
                if (label) {
                    label.style.transform = 'translateY(0)';
                    label.style.color = 'var(--text-primary)';
                    label.style.fontSize = '0.9rem';
                }
            });
        });
    </script>
</body>
</html>

