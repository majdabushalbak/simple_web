<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 50; $i++) {
            DB::table('products')->insert([
                [
                    'id' => null,
                    'name' => 'بابريكا',
                    'description' => ' نوعاً من التوابل المُعَدة عن طريق طحن فواكه أنوم الفليفلة المجففة نوعاً من التوابل المُعَدة عن طريق طحن فواكه أنوم الفليفلة المجففة نوعاً من التوابل المُعَدة عن طريق طحن فواكه أنوم الفليفلة المجففة نوعاً من التوابل المُعَدة عن طريق طحن فواكه أنوم الفليفلة المجففة نوعاً من التوابل المُعَدة عن طريق طحن فواكه أنوم الفليفلة المجففة نوعاً من التوابل المُعَدة عن طريق طحن فواكه أنوم الفليفلة المجففة نوعاً من التوابل المُعَدة عن طريق طحن فواكه أنوم الفليفلة المجففة نوعاً من التوابل المُعَدة عن طريق طحن فواكه أنوم الفليفلة المجففة نوعاً من التوابل المُعَدة عن طريق طحن فواكه أنوم الفليفلة المجففة نوعاً من التوابل المُعَدة عن طريق طحن فواكه أنوم الفليفلة المجففة ',
                    'price' => 50,
                    'category_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                    'image' => 'lALDxRCWzpLPsAkWJqjxRA9yGomAq3rkOhOBgYgT.jpg',
                ],
                [
                    'id' => null,
                    'name' => 'فلفل أسود',
                    'description' => 'هي نبتة متسلقة من نباتات الكرمة المزهرة في الأسرة الفلفلية، تُزرع من أجل ثمارها، ومغطاة البذور، والتي تجفف عادة وتستخدم كمنكه للأكل وكتوابل أيضا.',
                    'price' => 22.55,
                    'category_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                    'image' => 'ATpVrUfMiWMNuWWrw9olK4ZeOXY4Ko9fqH5KJcsY.jpg',
                ]
            ]);
        }

    }
}
