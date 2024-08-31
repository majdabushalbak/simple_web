<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('categories')->insert([
            [
                'id' => null,
                'name' => 'مكسرات',
                'description' => 'المكسّرات هي بذور جافة صالحة للأكل وعادة ما تحتوي على نسبة عالية من الدهون.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => null,
                'name' => 'بهارات',
                'description' => 'هي مادة أو مجموعة مواد تضاف عادة إلى الطعام بكميات قليلة وتستعمل لإعطاء نكهة للأطعمة المختلفة، وتصنع البهارات من كافة أجزاء النباتات كالبذور والثمرات والأوراق واللحاء والجذور.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => null,
                'name' => 'فواكه مجففة',
                'description' => 'ي تلك الفواكه التي لا تحتوي على نسبة من الماء داخل مكوناتها، مما يساعدها على البقاء صالحة للاستهلاك البشري مدة طويلة. والفواكه المجففة هي تلك الفواكه التي مرت بعملية إخراج للسوائل بهدف المحافظة عليها. ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => null,
                'name' => 'حلويات',
                'description' => 'هي كل ما عولج بسكر أو عسل من الطعام، وكل ما يصنع من محلول السكر في الماء.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

    }
}
