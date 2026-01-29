<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

public function editForm($id)
{
    $product = Product::findOrFail($id);
    return view('/modiproduct', compact('product'));
}
  public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'main_image' => 'nullable|image|max:2048',
            'manufacturer_name' => 'required|string|max:255',
            'manufacturer_brand' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0|max:100',
        ]);

        $product = new Product();
 $product->title = $request->title;
    $product->description = $request->description;
    $product->manufacturer_name = $request->manufacturer_name;
    $product->manufacturer_brand = $request->manufacturer_brand;
    $product->stock = $request->stock;
    $product->price = $request->price;
    $product->discount = $request->discount ?? 0;
    $product->orders = $request->orders ?? 0;

    if ($request->hasFile('main_image')) {

        if ($product->main_image && Storage::exists('public/' . $product->main_image)) {
            Storage::delete('public/' . $product->main_image);
        }
        $product->main_image = $request->file('main_image')->store('products', 'public');
    }


    if ($request->hasFile('gallery')) {
        $gallery = [];
        foreach ($request->file('gallery') as $file) {
            $gallery[] = $file->store('products/gallery', 'public');
        }
        $product->gallery = json_encode($gallery);
    }

    $product->save();

    return redirect()->route('welcomeb')->with('success', 'Produit mis à jour avec succès !');
    }
public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'main_image' => 'nullable|image|max:2048',
        'manufacturer_name' => 'required|string|max:255',
        'manufacturer_brand' => 'required|string|max:255',
        'stock' => 'required|integer|min:0',
        'price' => 'required|numeric|min:0',
        'discount' => 'nullable|numeric|min:0|max:100',
    ]);

    $product->title = $request->title;
    $product->description = $request->description;
    $product->manufacturer_name = $request->manufacturer_name;
    $product->manufacturer_brand = $request->manufacturer_brand;
    $product->stock = $request->stock;
    $product->price = $request->price;
    $product->discount = $request->discount ?? 0;
    $product->orders = $request->orders ?? 0;

    if ($request->hasFile('main_image')) {

        if ($product->main_image && Storage::exists('public/' . $product->main_image)) {
            Storage::delete('public/' . $product->main_image);
        }
        $product->main_image = $request->file('main_image')->store('products', 'public');
    }


    if ($request->hasFile('gallery')) {
        $gallery = [];
        foreach ($request->file('gallery') as $file) {
            $gallery[] = $file->store('products/gallery', 'public');
        }
        $product->gallery = json_encode($gallery);
    }

    $product->save();


}

   public function welcomeBoutique()
{
    $products = Product::all();
    return view('welcome-boutique', compact('products'));
}

public function welcomeClient()
{
    $products = Product::all();
    return view('welcome-client', compact('products'));
}


public function delete($id)
{
    $product= Product::find($id);
    $product->delete();



    return redirect('/welcome-boutique')->with('success', 'Produit supprimé avec succès.');
}

public function show($id)
    {
        $products = [
            1 => [
                'title' => 'Half Sleeve Round Neck T-Shirts',
                'category' => 'Fashion',
                'price' => 215.00,
                'stock' => 48,
                'rating' => 4.2,
                'date' => '12 Oct, 2021',
                'image' => 'assets/images/products/img-1.png',
                'description' => 'This Half Sleeve Round Neck T-Shirt is crafted from premium cotton for ultimate comfort and durability. Perfect for casual wear, it features a classic design with a soft feel, making it ideal for everyday use. Available in multiple colors and sizes.',
                'specs' => [
                    'Material' => '100% Cotton',
                    'Size' => 'S, M, L, XL',
                    'Care Instructions' => 'Machine Washable, Tumble Dry',
                ],
                'reviews' => '4.2 (Based on 150 reviews) - "Great quality and comfortable fit! Highly recommend for casual outings." - John D.',
            ],
            2 => [
                'title' => 'Urban Ladder Pashe Chair',
                'category' => 'Furniture',
                'price' => 160.00,
                'stock' => 30,
                'rating' => 4.3,
                'date' => '06 Jan, 2021',
                'image' => 'assets/images/products/img-2.png',
                'description' => 'A stylish and ergonomic chair designed for modern living rooms, featuring a sturdy wooden frame and cushioned seating. Perfect for comfort and durability.',
                'specs' => [
                    'Material' => 'Wood & Fabric',
                    'Weight Capacity' => '150 kg',
                    'Assembly' => 'Required',
                ],
                'reviews' => '4.3 (Based on 120 reviews) - "Very comfortable and well-built chair. Easy to assemble!" - Sarah K.',
            ],
            3 => [
                'title' => '350 ml Glass Grocery Container',
                'category' => 'Grocery',
                'price' => 125.00,
                'stock' => 48,
                'rating' => 4.5,
                'date' => '26 Mar, 2021',
                'image' => 'assets/images/products/img-3.png',
                'description' => 'A durable glass container ideal for storing groceries, with a 350 ml capacity. BPA-free and microwave-safe, perfect for kitchen organization.',
                'specs' => [
                    'Material' => 'Glass',
                    'Capacity' => '350 ml',
                    'Features' => 'Microwave Safe, Airtight Lid',
                ],
                'reviews' => '4.5 (Based on 200 reviews) - "Excellent quality glass, keeps food fresh for longer." - Emily R.',
            ],
            4 => [
                'title' => 'Fabric Dual Tone Living Room Chair',
                'category' => 'Furniture',
                'price' => 340.00,
                'stock' => 40,
                'rating' => 4.2,
                'date' => '19 Apr, 2021',
                'image' => 'assets/images/products/img-4.png',
                'description' => 'Elegant dual-tone fabric chair for living rooms, offering comfort with a modern design and sturdy construction.',
                'specs' => [
                    'Material' => 'Fabric & Wood',
                    'Dimensions' => '80cm x 60cm x 90cm',
                    'Assembly' => 'Not Required',
                ],
                'reviews' => '4.2 (Based on 80 reviews) - "Looks great in my living room, very comfy!" - Michael T.',
            ],
            5 => [
                'title' => 'Crux Motorsports Helmet',
                'category' => 'Automotive',
                'price' => 175.00,
                'stock' => 55,
                'rating' => 4.4,
                'date' => '30 Mar, 2021',
                'image' => 'assets/images/products/img-5.png',
                'description' => 'High-performance helmet for motorsports, with advanced ventilation and impact protection for safety and comfort.',
                'specs' => [
                    'Material' => 'Polycarbonate Shell',
                    'Size' => 'M, L, XL',
                    'Certification' => 'DOT Approved',
                ],
                'reviews' => '4.4 (Based on 90 reviews) - "Excellent protection and fits perfectly." - Alex P.',
            ],
            6 => [
                'title' => 'Half Sleeve T-Shirts (Blue)',
                'category' => 'Fashion',
                'price' => 225.00,
                'stock' => 48,
                'rating' => 4.2,
                'date' => '12 Oct, 2021',
                'image' => 'assets/images/products/img-6.png',
                'description' => 'Comfortable blue half sleeve T-shirt made from breathable fabric, ideal for summer wear and casual occasions.',
                'specs' => [
                    'Material' => 'Cotton Blend',
                    'Size' => 'S, M, L, XL',
                    'Care Instructions' => 'Machine Wash',
                ],
                'reviews' => '4.2 (Based on 110 reviews) - "Nice color and good fabric quality." - Lisa M.',
            ],
            7 => [
                'title' => 'Noise Evolve Smartwatch',
                'category' => 'Watches',
                'price' => 105.00,
                'stock' => 45,
                'rating' => 4.3,
                'date' => '15 May, 2021',
                'image' => 'assets/images/products/img-7.png',
                'description' => 'Feature-packed smartwatch with fitness tracking, heart rate monitoring, and long battery life for daily use.',
                'specs' => [
                    'Display' => 'AMOLED',
                    'Battery Life' => 'Up to 7 days',
                    'Water Resistance' => 'IP68',
                ],
                'reviews' => '4.3 (Based on 140 reviews) - "Great battery and accurate tracking features." - David L.',
            ],
            8 => [
                'title' => 'Sweatshirt for Men (Pink)',
                'category' => 'Fashion',
                'price' => 120.00,
                'stock' => 48,
                'rating' => 4.2,
                'date' => '21 Jun, 2021',
                'image' => 'assets/images/products/img-8.png',
                'description' => 'Cozy pink sweatshirt for men, made from soft fleece material, perfect for casual and athletic wear.',
                'specs' => [
                    'Material' => 'Fleece',
                    'Size' => 'M, L, XL',
                    'Care Instructions' => 'Machine Wash Cold',
                ],
                'reviews' => '4.2 (Based on 95 reviews) - "Warm and stylish, love the color!" - Chris B.',
            ],
            9 => [
                'title' => 'Reusable Ecological Coffee Cup',
                'category' => 'Grocery',
                'price' => 325.00,
                'stock' => 55,
                'rating' => 4.3,
                'date' => '15 Jan, 2021',
                'image' => 'assets/images/products/img-9.png',
                'description' => 'Eco-friendly reusable coffee cup made from sustainable materials, designed to reduce waste and keep drinks hot.',
                'specs' => [
                    'Material' => 'Bamboo & Silicone',
                    'Capacity' => '400 ml',
                    'Features' => 'Insulated, Leak-Proof',
                ],
                'reviews' => '4.3 (Based on 160 reviews) - "Perfect for on-the-go, eco-friendly and durable." - Anna S.',
            ],
            10 => [
                'title' => 'Travel Carrying Pouch Bag',
                'category' => 'Kids',
                'price' => 180.00,
                'stock' => 60,
                'rating' => 4.3,
                'date' => '15 Jun, 2021',
                'image' => 'assets/images/products/img-10.png',
                'description' => 'Compact and durable pouch bag for travel, suitable for kids with multiple compartments for organization.',
                'specs' => [
                    'Material' => 'Nylon',
                    'Dimensions' => '20cm x 15cm x 5cm',
                    'Features' => 'Water Resistant, Zipper Closure',
                ],
                'reviews' => '4.3 (Based on 130 reviews) - "Great for kids\' travel essentials, sturdy and cute." - Jessica W.',
            ],
             ];

 $product = \App\Models\Product::find($id);


    if (!$product && isset($products[$id])) {
        $product = (object) $products[$id];
        $product->id = $id;
    }

    if (!$product) {
        abort(404);
    }

    return view('detprod', compact('product'));
}





    public function listProducts()
{
    $products = Product::all();
    return view('detprod_index', compact('products'));
}

}
