<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Gestion du Profil Utilisateur" />
    <meta name="author" content="Votre Application" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Profil Utilisateur | Dashboard</title>

    <!-- Google Fonts : Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Font Awesome 6 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --text: #111827;
            --gray-200: #e5e7eb;
            --gray-50: #f9fafb;
            --success-light: #d1fae5;
            --success-dark: #059669;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
            color: var(--text);
            min-height: 100vh;
            padding-top: 2rem;
        }

        .main-content {
            padding-bottom: 2rem;
        }

        .container-fluid {
            max-width: 1400px;
        }

        /* Cover Section */
        .profile-cover {
            height: 200px;
            background: linear-gradient(135deg, var(--primary), #7c3aed);
            border-radius: 12px 12px 0 0;
            position: relative;
            overflow: hidden;
        }

        .profile-cover img {
            object-fit: cover;
            opacity: 0.2;
            width: 100%;
            height: 100%;
        }

        .cover-overlay {
            position: absolute;
            bottom: 1rem;
            right: 1.5rem;
        }

        /* Profile Picture */
        .profile-pic-container {
            position: relative;
            display: inline-block;
            margin-top: -60px;
        }

        .profile-pic {
            width: 110px;
            height: 110px;
            border: 4px solid white;
            border-radius: 50%;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            object-fit: cover;
        }

        .camera-icon {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 32px;
            height: 32px;
            background: var(--primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }

        /* Card & Layout */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            overflow: hidden;
        }

        .card-body {
            padding: 1.8rem;
        }

        /* Tabs */
        .nav-tabs-custom {
            background-color: var(--gray-50);
            border-radius: 12px 12px 0 0;
            padding: 0.5rem;
            margin-bottom: 0;
        }

        .nav-tabs-custom .nav-link {
            color: #6b7280;
            font-weight: 500;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .nav-tabs-custom .nav-link i {
            font-size: 1rem;
        }

        .nav-tabs-custom .nav-link.active {
            background: white;
            color: var(--primary);
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.1);
            border-bottom: 2px solid var(--primary);
        }

        /* Form Controls */
        .form-control {
            border: 1px solid var(--gray-200);
            border-radius: 8px;
            padding: 0.65rem 1rem;
            font-size: 0.95rem;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
        }

        .form-label {
            font-weight: 500;
            color: var(--text);
            margin-bottom: 0.5rem;
        }

        /* Buttons */
        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
            padding: 0.6rem 1.5rem;
            font-weight: 500;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: var(--primary-hover);
            transform: translateY(-1px);
        }

        .btn-soft-success {
            background-color: var(--success-light);
            color: var(--success-dark);
            border: none;
            padding: 0.6rem 1.5rem;
            font-weight: 500;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-soft-success:hover {
            background-color: #a7f3d0;
            transform: translateY(-1px);
        }

        /* Progress Bar */
        .custom-progress {
            height: 8px;
            border-radius: 4px;
            background-color: #e0e7ff;
            margin-bottom: 1rem;
        }

        .progress-bar {
            border-radius: 4px;
            background: var(--primary) !important;
        }

        .progress-label {
            display: flex;
            justify-content: flex-end;
            font-size: 0.8rem;
            color: #4b5563;
            font-weight: 500;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .profile-cover {
                height: 150px;
            }

            .cover-overlay {
                right: 0.5rem;
                bottom: 0.5rem;
            }

            .profile-pic {
                width: 90px;
                height: 90px;
            }

            .nav-tabs-custom .nav-link {
                padding: 0.6rem 1rem;
                font-size: 0.9rem;
            }

            .btn {
                font-size: 0.875rem;
            }
        }
    </style>
</head>
<body>

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- Success Alert -->
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Profile Cover -->
                <div class="position-relative mx-n4 mt-n4">
                    <div class="profile-cover">
                        <img src="/assets/images/profile-bg.jpg" alt="Cover">
                        <div class="cover-overlay">
                            <button class="btn btn-light btn-sm px-3 rounded-pill shadow-sm">
                                <i class="fas fa-image me-1"></i> Changer la couverture
                            </button>
                        </div>
                    </div>
                </div>

                <div class="row g-4 mt-2">
                    <div class="container-fluid mt-4">
    <a href="{{'/welcome-client' }}" class="btn btn-light shadow-sm d-inline-flex align-items-center gap-2 mb-4" style="border-radius: 8px; padding: 0.5rem 1rem;">
        <i class="fas fa-arrow-left"></i>
        <span class="d-none d-sm-inline">Retour</span>
    </a>
</div>
                    <!-- Sidebar -->
                    <div class="col-xxl-3 col-lg-4">
                        <div class="card text-center">
                            <div class="card-body p-4">
                                <div class="profile-pic-container mb-3">
                                    <img src="/assets/images/default-user.png" alt="Profile" class="profile-pic">
                                    <div class="camera-icon">
                                        <i class="fas fa-camera"></i>
                                    </div>
                                </div>
                                <h5 class="mb-1">@auth {{ Auth::user()->name }} @endauth</h5>
                                <p class="text-muted mb-0">@auth {{ Auth::user()->email }} @endauth</p>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h5 class="mb-0">Progression du profil</h5>
                                    <a href="#" class="text-primary small"><i class="fas fa-edit"></i></a>
                                </div>
                                <div class="custom-progress mb-2">
                                    <div class="progress-bar" role="progressbar" style="width: 30%"></div>
                                </div>
                                <div class="progress-label">30% complété</div>
                                <p class="text-muted small mt-2">Ajoutez une photo, votre numéro et d'autres informations pour améliorer votre profil.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Main Content -->
                    <div class="col-xxl-9 col-lg-8">
                        <div class="card">
                            <div class="card-header bg-transparent border-0 p-0">
                                <ul class="nav nav-tabs-custom" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                                            <i class="fas fa-user"></i> Détails Personnels
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#changePassword" role="tab">
                                            <i class="fas fa-lock"></i> Changer Mot de Passe
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">

                                    <!-- Personal Details -->
                                    <!-- Personal Details -->
<!-- Personal Details -->
<div class="tab-pane active" id="personalDetails" role="tabpanel">
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row g-4">
            <!-- Nom complet -->
            <div class="col-md-6">
                <label for="nameInput" class="form-label">Nom complet</label>
                <input type="text"
                       class="form-control @error('name') is-invalid @enderror"
                       id="nameInput"
                       name="name"
                       value="{{ old('name', Auth::user()->name ?? '') }}"
                       placeholder="Jean Dupont">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="col-md-6">
                <label for="emailInput" class="form-label">Email</label>
                <input type="email"
                       class="form-control @error('email') is-invalid @enderror"
                       id="emailInput"
                       name="email"
                       value="{{ old('email', Auth::user()->email ?? '') }}"
                       placeholder="jean@example.com">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Boutons -->
            <div class="col-12">
                <div class="hstack gap-3 justify-content-end">
                    <button type="reset" class="btn btn-soft-success px-4">Annuler</button>
                    <button type="submit" class="btn btn-primary px-4">Enregistrer</button>
                </div>
            </div>
        </div>
    </form>
</div>



                                    <!-- Change Password -->
                                    <div class="tab-pane" id="changePassword" role="tabpanel">
                                        <form action="{{ route('profile.password') }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="row g-4">
                                                <div class="col-md-6">
                                                    <label for="current_password" class="form-label">Mot de passe actuel</label>
                                                    <input type="password" class="form-control @error('current_password') is-invalid @enderror"
                                                           id="current_password" name="current_password"
                                                           placeholder="••••••••">
                                                    @error('current_password')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="password" class="form-label">Nouveau mot de passe</label>
                                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                                           id="password" name="password"
                                                           placeholder="••••••••">
                                                    @error('password')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                                                    <input type="password" class="form-control"
                                                           id="password_confirmation" name="password_confirmation"
                                                           placeholder="••••••••">
                                                </div>
                                                <div class="col-12">
                                                    <div class="text-end">
                                                        <button type="submit" class="btn btn-success px-4">Mettre à jour</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
</body>
</html>
