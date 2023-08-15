<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Book;

use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Random;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition(): array
    {
        $category = Category::inRandomOrder()->first(); // Obtener una categoría aleatoria
        $url = json_decode('[{
            "image": "http://dummyimage.com/176x100.png/ff4444/ffffff"
          }, {
            "image": "http://dummyimage.com/113x100.png/5fa2dd/ffffff"
          }, {
            "image": "http://dummyimage.com/165x100.png/dddddd/000000"
          }, {
            "image": "http://dummyimage.com/169x100.png/5fa2dd/ffffff"
          }, {
            "image": "http://dummyimage.com/237x100.png/5fa2dd/ffffff"
          }, {
            "image": "http://dummyimage.com/143x100.png/ff4444/ffffff"
          }, {
            "image": "http://dummyimage.com/148x100.png/ff4444/ffffff"
          }, {
            "image": "http://dummyimage.com/190x100.png/5fa2dd/ffffff"
          }, {
            "image": "http://dummyimage.com/133x100.png/cc0000/ffffff"
          }, {
            "image": "http://dummyimage.com/112x100.png/dddddd/000000"
          }, {
            "image": "http://dummyimage.com/125x100.png/cc0000/ffffff"
          }, {
            "image": "http://dummyimage.com/129x100.png/cc0000/ffffff"
          }, {
            "image": "http://dummyimage.com/207x100.png/dddddd/000000"
          }, {
            "image": "http://dummyimage.com/139x100.png/dddddd/000000"
          }, {
            "image": "http://dummyimage.com/179x100.png/ff4444/ffffff"
          }, {
            "image": "http://dummyimage.com/143x100.png/cc0000/ffffff"
          }, {
            "image": "http://dummyimage.com/233x100.png/5fa2dd/ffffff"
          }, {
            "image": "http://dummyimage.com/166x100.png/dddddd/000000"
          }, {
            "image": "http://dummyimage.com/125x100.png/ff4444/ffffff"
          }, {
            "image": "http://dummyimage.com/241x100.png/5fa2dd/ffffff"
          }, {
            "image": "http://dummyimage.com/129x100.png/dddddd/000000"
          }, {
            "image": "http://dummyimage.com/134x100.png/5fa2dd/ffffff"
          }, {
            "image": "http://dummyimage.com/168x100.png/ff4444/ffffff"
          }, {
            "image": "http://dummyimage.com/222x100.png/5fa2dd/ffffff"
          }, {
            "image": "http://dummyimage.com/142x100.png/ff4444/ffffff"
          }, {
            "image": "http://dummyimage.com/209x100.png/cc0000/ffffff"
          }, {
            "image": "http://dummyimage.com/120x100.png/ff4444/ffffff"
          }, {
            "image": "http://dummyimage.com/160x100.png/ff4444/ffffff"
          }, {
            "image": "http://dummyimage.com/135x100.png/cc0000/ffffff"
          }, {
            "image": "http://dummyimage.com/233x100.png/cc0000/ffffff"
          }, {
            "image": "http://dummyimage.com/145x100.png/ff4444/ffffff"
          }, {
            "image": "http://dummyimage.com/236x100.png/cc0000/ffffff"
          }, {
            "image": "http://dummyimage.com/161x100.png/ff4444/ffffff"
          }, {
            "image": "http://dummyimage.com/184x100.png/ff4444/ffffff"
          }, {
            "image": "http://dummyimage.com/147x100.png/dddddd/000000"
          }, {
            "image": "http://dummyimage.com/231x100.png/dddddd/000000"
          }, {
            "image": "http://dummyimage.com/152x100.png/5fa2dd/ffffff"
          }, {
            "image": "http://dummyimage.com/153x100.png/dddddd/000000"
          }, {
            "image": "http://dummyimage.com/233x100.png/dddddd/000000"
          }, {
            "image": "http://dummyimage.com/200x100.png/dddddd/000000"
          }, {
            "image": "http://dummyimage.com/214x100.png/dddddd/000000"
          }, {
            "image": "http://dummyimage.com/103x100.png/cc0000/ffffff"
          }, {
            "image": "http://dummyimage.com/209x100.png/ff4444/ffffff"
          }, {
            "image": "http://dummyimage.com/107x100.png/ff4444/ffffff"
          }, {
            "image": "http://dummyimage.com/233x100.png/cc0000/ffffff"
          }, {
            "image": "http://dummyimage.com/241x100.png/ff4444/ffffff"
          }, {
            "image": "http://dummyimage.com/192x100.png/ff4444/ffffff"
          }, {
            "image": "http://dummyimage.com/149x100.png/dddddd/000000"
          }, {
            "image": "http://dummyimage.com/167x100.png/5fa2dd/ffffff"
          }, {
            "image": "http://dummyimage.com/204x100.png/ff4444/ffffff"
          }, {
            "image": "http://dummyimage.com/201x100.png/dddddd/000000"
          }, {
            "image": "http://dummyimage.com/200x100.png/cc0000/ffffff"
          }, {
            "image": "http://dummyimage.com/165x100.png/5fa2dd/ffffff"
          }, {
            "image": "http://dummyimage.com/216x100.png/ff4444/ffffff"
          }, {
            "image": "http://dummyimage.com/215x100.png/cc0000/ffffff"
          }, {
            "image": "http://dummyimage.com/150x100.png/dddddd/000000"
          }, {
            "image": "http://dummyimage.com/221x100.png/ff4444/ffffff"
          }, {
            "image": "http://dummyimage.com/141x100.png/5fa2dd/ffffff"
          }, {
            "image": "http://dummyimage.com/208x100.png/cc0000/ffffff"
          }, {
            "image": "http://dummyimage.com/218x100.png/5fa2dd/ffffff"
          }, {
            "image": "http://dummyimage.com/108x100.png/cc0000/ffffff"
          }, {
            "image": "http://dummyimage.com/189x100.png/cc0000/ffffff"
          }, {
            "image": "http://dummyimage.com/151x100.png/5fa2dd/ffffff"
          }, {
            "image": "http://dummyimage.com/249x100.png/ff4444/ffffff"
          }, {
            "image": "http://dummyimage.com/201x100.png/dddddd/000000"
          }, {
            "image": "http://dummyimage.com/182x100.png/cc0000/ffffff"
          }, {
            "image": "http://dummyimage.com/203x100.png/cc0000/ffffff"
          }, {
            "image": "http://dummyimage.com/168x100.png/cc0000/ffffff"
          }, {
            "image": "http://dummyimage.com/156x100.png/5fa2dd/ffffff"
          }, {
            "image": "http://dummyimage.com/192x100.png/ff4444/ffffff"
          }, {
            "image": "http://dummyimage.com/168x100.png/5fa2dd/ffffff"
          }, {
            "image": "http://dummyimage.com/204x100.png/cc0000/ffffff"
          }, {
            "image": "http://dummyimage.com/226x100.png/5fa2dd/ffffff"
          }, {
            "image": "http://dummyimage.com/105x100.png/cc0000/ffffff"
          }, {
            "image": "http://dummyimage.com/133x100.png/ff4444/ffffff"
          }, {
            "image": "http://dummyimage.com/211x100.png/cc0000/ffffff"
          }, {
            "image": "http://dummyimage.com/196x100.png/5fa2dd/ffffff"
          }, {
            "image": "http://dummyimage.com/187x100.png/dddddd/000000"
          }, {
            "image": "http://dummyimage.com/109x100.png/5fa2dd/ffffff"
          }, {
            "image": "http://dummyimage.com/142x100.png/cc0000/ffffff"
          }, {
            "image": "http://dummyimage.com/171x100.png/dddddd/000000"
          }, {
            "image": "http://dummyimage.com/136x100.png/dddddd/000000"
          }, {
            "image": "http://dummyimage.com/205x100.png/cc0000/ffffff"
          }, {
            "image": "http://dummyimage.com/196x100.png/ff4444/ffffff"
          }, {
            "image": "http://dummyimage.com/138x100.png/5fa2dd/ffffff"
          }, {
            "image": "http://dummyimage.com/188x100.png/cc0000/ffffff"
          }, {
            "image": "http://dummyimage.com/125x100.png/5fa2dd/ffffff"
          }, {
            "image": "http://dummyimage.com/140x100.png/5fa2dd/ffffff"
          }, {
            "image": "http://dummyimage.com/113x100.png/5fa2dd/ffffff"
          }, {
            "image": "http://dummyimage.com/103x100.png/cc0000/ffffff"
          }, {
            "image": "http://dummyimage.com/189x100.png/5fa2dd/ffffff"
          }, {
            "image": "http://dummyimage.com/109x100.png/5fa2dd/ffffff"
          }, {
            "image": "http://dummyimage.com/229x100.png/cc0000/ffffff"
          }, {
            "image": "http://dummyimage.com/206x100.png/cc0000/ffffff"
          }, {
            "image": "http://dummyimage.com/121x100.png/dddddd/000000"
          }, {
            "image": "http://dummyimage.com/206x100.png/dddddd/000000"
          }, {
            "image": "http://dummyimage.com/223x100.png/cc0000/ffffff"
          }, {
            "image": "http://dummyimage.com/115x100.png/cc0000/ffffff"
          }, {
            "image": "http://dummyimage.com/241x100.png/cc0000/ffffff"
          }, {
            "image": "http://dummyimage.com/219x100.png/dddddd/000000"
          }]');
        return [
            'name' => $this->faker->sentence,
            'author' => $this->faker->name,
            'editorial' => $this->faker->company,
            'edition' => $this->faker->numberBetween(1, 10),
            'year' => $this->faker->year,
            'pages' => $this->faker->numberBetween(100, 500),
            'isbn' => $this->faker->isbn13,
            'language' => $this->faker->languageCode,
            'country' => $this->faker->country,
            'description' => $this->faker->paragraph,
            'image' =>  $url[$this->faker->numberBetween(0, 49)]->image,
            'file' =>  $url[$this->faker->numberBetween(0, 49)]->image,
            'status' => 'Disponible',
            'category_id' => $category->id,

        ];
    }
}
