<?php

use Illuminate\Database\Seeder;

class ArticlesSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $articles = [
        [
          "title"=>"Komen 1.",
          "content" => "1. lorop imsum sadsdas lorop imsum sadsdaslorop imsum sadsdaslorop imsum sadsdaslorop imsum sadsdaslorop imsum sadsdaslorop imsum sadsdaslorop imsu"
        ],
        [
          "title"=>"Komen 2.",
          "content" => "2. lorop imsum sadsdas lorop imsum sadsdaslorop imsum sadsdaslorop imsum sadsdaslorop imsum sadsdaslorop imsum sadsdaslorop imsum sadsdaslorop imsu"
        ],
        [
          "title"=>"Komen 3.",
          "content" => "3.lorop imsum sadsdas lorop imsum sadsdaslorop imsum sadsdaslorop imsum sadsdaslorop imsum sadsdaslorop imsum sadsdaslorop imsum sadsdaslorop imsu"
        ],
        [
          "title"=>"Komen 4.",
          "content" => "4.lorop imsum sadsdas lorop imsum sadsdaslorop imsum sadsdaslorop imsum sadsdaslorop imsum sadsdaslorop imsum sadsdaslorop imsum sadsdaslorop imsu"
        ],
        [
          "title"=>"Komen 5.",
          "content" => "5.lorop imsum sadsdas lorop imsum sadsdaslorop imsum sadsdaslorop imsum sadsdaslorop imsum sadsdaslorop imsum sadsdaslorop imsum sadsdaslorop imsu"
        ],
        [
          "title"=>"Komen 6.",
          "content" => "6.lorop imsum sadsdas lorop imsum sadsdaslorop imsum sadsdaslorop imsum sadsdaslorop imsum sadsdaslorop imsum sadsdaslorop imsum sadsdaslorop imsu"
        ],
        [
          "title"=>"Komen 7.",
          "content" => "7.lorop imsum sadsdas lorop imsum sadsdaslorop imsum sadsdaslorop imsum sadsdaslorop imsum sadsdaslorop imsum sadsdaslorop imsum sadsdaslorop imsu"
        ],
        [
          "title"=>"Komen 9.",
          "content" => "9.lorop imsum sadsdas lorop imsum sadsdaslorop imsum sadsdaslorop imsum sadsdaslorop imsum sadsdaslorop imsum sadsdaslorop imsum sadsdaslorop imsu"
        ]

      ];

      DB::table('articles')->insert($articles);
        //
    }
}
