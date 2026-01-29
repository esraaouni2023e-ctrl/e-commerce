<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le Produit - {{ $product->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
    <style>
        :root {
            --primary-purple: #6f42c1;
            --gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --shadow-purple: rgba(111, 66, 193, 0.15);
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }

        .container {
            max-width: 1000px;
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .card {
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 40px var(--shadow-purple);
            border: 1px solid rgba(111, 66, 193, 0.1);
            padding: 30px;
        }

        h1, h5 {
            background: var(--gradient);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
        }

        .btn-gradient {
            background: var(--gradient);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 30px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .btn-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(111, 66, 193, 0.4);
        }

        .object-fit-cover {
            object-fit: cover;
        }

        .form-control:focus {
            border-color: var(--primary-purple);
            box-shadow: 0 0 0 0.2rem rgba(111,66,193,0.15);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="text-center mb-5">
            <h1>✏️ Modifier le Produit</h1>
            <p class="text-muted fs-5 mb-0">Mettez à jour les informations de <strong>"{{ $product->title }}"</strong></p>
        </div>

        <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
            @method('PUT')
            <div class="card">

                <!-- Informations Produit -->
                <h5 class="fw-semibold mb-4"><i class="fas fa-box me-2"></i> Informations du Produit</h5>
                <div class="row g-4 mb-4">
                    <div class="col-md-12">
                        <label class="form-label">Titre du produit</label>
                        <input type="text" class="form-control" name="title" value="{{ old('title', $product->title) }}" required>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description" rows="4">{{ old('description', $product->description) }}</textarea>
                    </div>
                </div>

                <!-- Image Principale -->
                <h5 class="fw-semibold mb-4"><i class="fas fa-image me-2"></i> Image Principale</h5>
                <div class="d-flex align-items-center gap-4 mb-4">
                    <div class="position-relative" style="width:140px; height:140px;">
                        <img src="{{ $product->main_image ? asset('storage/' . $product->main_image) : 'https://via.placeholder.com/140x140?text=No+Image' }}"
                             id="product-preview" class="rounded-3 w-100 h-100 object-fit-cover border" alt="Preview">
                    </div>
                    <div>
                        <label for="main_image" class="btn btn-gradient rounded-pill px-4 py-2">
                            <i class="fas fa-upload me-2"></i> Changer l'image
                        </label>
                        <input type="file" name="main_image" id="main_image" class="d-none" accept="image/*">
                        <small class="text-muted d-block mt-2">Formats supportés : JPG, PNG, WEBP</small>
                    </div>
                </div>

                <!-- Détails Produit -->
                <h5 class="fw-semibold mb-4"><i class="fas fa-cogs me-2"></i> Détails du Produit</h5>
                <div class="row g-4 mb-4">
                    <div class="col-md-6">
                        <label class="form-label">Marque</label>
                        <input type="text" class="form-control" name="manufacturer_name" value="{{ old('manufacturer_name', $product->manufacturer_name) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Gamme / Modèle</label>
                        <input type="text" class="form-control" name="manufacturer_brand" value="{{ old('manufacturer_brand', $product->manufacturer_brand) }}" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Stock</label>
                        <input type="number" class="form-control" name="stock" value="{{ old('stock', $product->stock) }}" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Prix ($)</label>
                        <input type="number" step="0.01" class="form-control" name="price" value="{{ old('price', $product->price) }}" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Réduction (%)</label>
                        <input type="number" step="0.1" class="form-control" name="discount" value="{{ old('discount', $product->discount) }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Commandes</label>
                        <input type="number" class="form-control" name="orders" value="{{ old('orders', $product->orders) }}" readonly>
                    </div>
                </div>

                <!-- SEO -->
                <h5 class="fw-semibold mb-4"><i class="fas fa-search me-2"></i> Référencement (SEO)</h5>
                <div class="row g-4 mb-4">
                    <div class="col-md-6">
                        <label class="form-label">Meta Title</label>
                        <input type="text" class="form-control" name="meta_title" value="{{ old('meta_title', $product->meta_title) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Meta Keywords</label>
                        <input type="text" class="form-control" name="meta_keywords" value="{{ old('meta_keywords', $product->meta_keywords) }}">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Meta Description</label>
                        <textarea class="form-control" name="meta_description" rows="2">{{ old('meta_description', $product->meta_description) }}</textarea>
                    </div>
                </div>

                <!-- Boutons -->
                <div class="d-flex justify-content-end gap-3">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary px-4"><i class="fas fa-arrow-left me-1"></i> Retour</a>
                    <button type="submit" class="btn btn-gradient px-4"><i class="fas fa-save me-1"></i> Enregistrer</button>
                </div>

            </div>
        </form>
    </div>
</body>

<script>
    // Prévisualisation image
    document.getElementById('main_image')?.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if(file){
            const reader = new FileReader();
            reader.onload = function() {
                document.getElementById('product-preview').src = reader.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>

</html>
