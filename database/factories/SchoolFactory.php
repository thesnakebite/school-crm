<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\School>
 */
class SchoolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // 30% de probabilidades de tener logo
        $hasLogo = $this->faker->boolean(30);

        return [
            'name' => fake()->company() . ' School',
            'address' => fake()->address(),
            'logo' => $hasLogo ? '/storage/logos/' . $this->generateLogo() : null,
            'email' => fake()->companyEmail(),
            'phone' => fake()->phoneNumber(),
            'website' => fake()->url(),
        ];
    }

    private function generateLogo(): string
    {
        $fileName = md5(uniqid()) . '.png';
        $filePath = storage_path('app/public/logos/' . $fileName);
        
        // Crear imagen de 200x200 píxeles
        $image = imagecreatetruecolor(200, 200);
        
        // Generar colores aleatorios
        $bgColor = imagecolorallocate($image, 
            rand(0, 255), 
            rand(0, 255), 
            rand(0, 255)
        );
        
        // Rellenar el fondo
        imagefill($image, 0, 0, $bgColor);
        
        // Guardar la imagen
        imagepng($image, $filePath);
        imagedestroy($image);

        return $fileName;
    }
}
