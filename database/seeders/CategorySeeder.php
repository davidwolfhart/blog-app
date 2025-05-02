<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                "name" => "Technology",
                "slug" => "technology",
                "image" => "category-images/technology.jpg",
                "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse pellentesque placerat dignissim."
            ],
            [
                "name" => "Design",
                "slug" => "design",
                "image" => "category-images/design.jpg",
                "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse pellentesque placerat dignissim."
            ],
            [
                "name" => "Business",
                "slug" => "business",
                "image" => "category-images/business.jpg",
                "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse pellentesque placerat dignissim."
            ],
            [
                "name" => "Health",
                "slug" => "health",
                "image" => "category-images/health.jpg",
                "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse pellentesque placerat dignissim."
            ],

        ];

        foreach($categories as $category) {
            Category::create($category);
        }
    }
}
