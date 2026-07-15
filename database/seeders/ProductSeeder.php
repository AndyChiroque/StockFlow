<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('role', 'admin')->first();
        $mid   = User::where('role', 'mid')->first();
        $low   = User::where('role', 'low')->first();

        $products = [
            [
                'nombre' => 'Laptop Pro X',
                'descripcion' => 'Laptop de alto rendimiento con 16GB RAM y 512GB SSD.',
                'precio' => 1299.99,
                'stock' => 15,
                'categoria' => 'Tecnología',
                'imagen' => 'https://placehold.co/400x300?text=Laptop',
                'user_id' => $admin->id,
            ],
            [
                'nombre' => 'Mouse Inalámbrico',
                'descripcion' => 'Mouse ergonómico con batería de larga duración.',
                'precio' => 29.99,
                'stock' => 50,
                'categoria' => 'Accesorios',
                'imagen' => null,
                'user_id' => $mid->id,
            ],
            [
                'nombre' => 'Monitor 27" 4K',
                'descripcion' => 'Monitor IPS con resolución 3840x2160 y HDR.',
                'precio' => 449.99,
                'stock' => 8,
                'categoria' => 'Tecnología',
                'imagen' => 'https://placehold.co/400x300?text=Monitor',
                'user_id' => $admin->id,
            ],
            [
                'nombre' => 'Teclado Mecánico RGB',
                'descripcion' => 'Switches Cherry MX Blue, retroiluminación personalizable.',
                'precio' => 89.99,
                'stock' => 25,
                'categoria' => 'Accesorios',
                'imagen' => null,
                'user_id' => $mid->id,
            ],
            [
                'nombre' => 'Auriculares Bluetooth',
                'descripcion' => 'Cancelación de ruido activa, 30h de batería.',
                'precio' => 79.99,
                'stock' => 0,
                'categoria' => 'Audio',
                'imagen' => 'https://placehold.co/400x300?text=Auriculares',
                'user_id' => $admin->id,
            ],
            [
                'nombre' => 'Webcam HD 1080p',
                'descripcion' => 'Webcam con micrófono integrado y autoenfoque.',
                'precio' => 59.99,
                'stock' => 20,
                'categoria' => 'Accesorios',
                'imagen' => null,
                'user_id' => $mid->id,
            ],
            [
                'nombre' => 'SSD 1TB NVMe',
                'descripcion' => 'Disco de estado sólido M.2 con velocidad 3500MB/s.',
                'precio' => 109.99,
                'stock' => 30,
                'categoria' => 'Componentes',
                'imagen' => 'https://placehold.co/400x300?text=SSD',
                'user_id' => $admin->id,
            ],
            [
                'nombre' => 'Hub USB-C 7 en 1',
                'descripcion' => 'Adaptador con HDMI, USB-A, USB-C, SD y PD 100W.',
                'precio' => 39.99,
                'stock' => 40,
                'categoria' => 'Accesorios',
                'imagen' => null,
                'user_id' => $mid->id,
            ],
            [
                'nombre' => 'Tablet 10" Android',
                'descripcion' => 'Tablet con 64GB almacenamiento y stylus incluido.',
                'precio' => 199.99,
                'stock' => 12,
                'categoria' => 'Tecnología',
                'imagen' => 'https://placehold.co/400x300?text=Tablet',
                'user_id' => $admin->id,
            ],
            [
                'nombre' => 'Cargador USB-C 65W',
                'descripcion' => 'Carga rápida GaN, compatible con laptops y móviles.',
                'precio' => 34.99,
                'stock' => 60,
                'categoria' => 'Accesorios',
                'imagen' => null,
                'user_id' => $mid->id,
            ],
            [
                'nombre' => 'RAM DDR5 32GB',
                'descripcion' => 'Kit 2x16GB 6000MHz CL30 para sistemas de alto rendimiento.',
                'precio' => 149.99,
                'stock' => 18,
                'categoria' => 'Componentes',
                'imagen' => 'https://placehold.co/400x300?text=RAM',
                'user_id' => $admin->id,
            ],
            [
                'nombre' => 'Alfombrilla XXL',
                'descripcion' => 'Alfombrilla deskmat 90x40cm con base antideslizante.',
                'precio' => 19.99,
                'stock' => 100,
                'categoria' => 'Accesorios',
                'imagen' => null,
                'user_id' => $low->id,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}