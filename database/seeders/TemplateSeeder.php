<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Template;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TemplateSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Template::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $templates = [
            ['name' => 'Royal Burgundy Gold', 'category' => 'luxury', 'img' => 'https://images.unsplash.com/photo-1526047932273-341f2a7631f9?auto=format&fit=crop&w=800&q=80'],
            ['name' => 'Botanical Elegance', 'category' => 'floral', 'img' => 'https://images.unsplash.com/photo-1523438885200-e635ba2c371e?auto=format&fit=crop&w=800&q=80'],
            ['name' => 'Golden Arch Luxury', 'category' => 'luxury', 'img' => 'https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=800&q=80'],
            ['name' => 'Minimalist Charcoal', 'category' => 'modern', 'img' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=800&q=80'],
            ['name' => 'Emerald Gold Palace', 'category' => 'royal', 'img' => 'https://images.unsplash.com/photo-1508615070457-7baeba4003ab?auto=format&fit=crop&w=800&q=80'],
            ['name' => 'Eucalyptus Greenery', 'category' => 'botanical', 'img' => 'https://images.unsplash.com/photo-1518531933037-91b2f5f229cc?auto=format&fit=crop&w=800&q=80'],
            ['name' => 'Rose Gold Romance', 'category' => 'romantic', 'img' => 'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?auto=format&fit=crop&w=800&q=80'],
            ['name' => 'Classic Script Elegance', 'category' => 'classic', 'img' => 'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?auto=format&fit=crop&w=800&q=80'],
            ['name' => 'Vintage Lace Floral', 'category' => 'vintage', 'img' => 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?auto=format&fit=crop&w=800&q=80'],
            ['name' => 'Modern Monogram', 'category' => 'modern', 'img' => 'https://images.unsplash.com/photo-1520854221256-17451cc331bf?auto=format&fit=crop&w=800&q=80'],
            ['name' => 'Celestial Night Sky', 'category' => 'luxury', 'img' => 'https://images.unsplash.com/photo-1532712938310-34cb3982ef74?auto=format&fit=crop&w=800&q=80'],
            ['name' => 'Ivory Pearl Classic', 'category' => 'classic', 'img' => 'https://images.unsplash.com/photo-1519225421980-715cb0215aed?auto=format&fit=crop&w=800&q=80'],
            ['name' => 'Sunset Crimson', 'category' => 'romantic', 'img' => 'https://images.unsplash.com/photo-1509924603848-aca550f96323?auto=format&fit=crop&w=800&q=80'],
            ['name' => 'Traditional Royal Heritage', 'category' => 'royal', 'img' => 'https://images.unsplash.com/photo-1544078751-58fee2d8a03b?auto=format&fit=crop&w=800&q=80'],
            ['name' => 'Boho Terracotta Warmth', 'category' => 'boho', 'img' => 'https://images.unsplash.com/photo-1515934751635-c81c6bc9a2d8?auto=format&fit=crop&w=800&q=80'],
            ['name' => 'Pastel Watercolor Petals', 'category' => 'floral', 'img' => 'https://images.unsplash.com/photo-1490750967868-88aa4486c946?auto=format&fit=crop&w=800&q=80'],
            ['name' => 'Midnight Gold Sparkle', 'category' => 'luxury', 'img' => 'https://images.unsplash.com/photo-1507679799987-c73779587ccf?auto=format&fit=crop&w=800&q=80'],
            ['name' => 'Serene Blue Blossom', 'category' => 'botanical', 'img' => 'https://images.unsplash.com/photo-1470058869958-2a77ade41c02?auto=format&fit=crop&w=800&q=80'],
            ['name' => 'Opulent Crown Heritage', 'category' => 'royal', 'img' => 'https://images.unsplash.com/photo-1513151233558-d860c5398176?auto=format&fit=crop&w=800&q=80'],
            ['name' => 'Sleek Black Minimalist', 'category' => 'modern', 'img' => 'https://images.unsplash.com/photo-1492684223066-81342ee5ff30?auto=format&fit=crop&w=800&q=80'],
            ['name' => 'Golden Velvet Royalty', 'category' => 'luxury', 'img' => 'https://images.unsplash.com/photo-1517457373958-b7bdd4587205?auto=format&fit=crop&w=800&q=80'],
            ['name' => 'Wildflower Garden', 'category' => 'floral', 'img' => 'https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=800&q=80'],
            ['name' => 'Rustic Forest Charm', 'category' => 'botanical', 'img' => 'https://images.unsplash.com/photo-1448375240586-882707db888b?auto=format&fit=crop&w=800&q=80'],
            ['name' => 'Ocean Breeze Blue', 'category' => 'modern', 'img' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=800&q=80'],
            ['name' => 'Golden Autumn Glow', 'category' => 'romantic', 'img' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=800&q=80'],
            ['name' => 'Crystal Winter Fairytale', 'category' => 'royal', 'img' => 'https://images.unsplash.com/photo-1483921020237-2ff51e8e4b22?auto=format&fit=crop&w=800&q=80'],
            ['name' => 'Blushing Orchid Elegance', 'category' => 'floral', 'img' => 'https://images.unsplash.com/photo-1526047932273-341f2a7631f9?auto=format&fit=crop&w=800&q=80'],
        ];

        foreach ($templates as $tmpl) {
            Template::create([
                'name' => $tmpl['name'],
                'slug' => Str::slug($tmpl['name']),
                'category' => $tmpl['category'],
                'design_schema' => json_encode(['header_img' => $tmpl['img']]),
                'is_active' => true,
            ]);
        }
    }
}