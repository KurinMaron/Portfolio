<?php

use Illuminate\Database\Seeder;

class TitleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $title = [
            'ゆるキャン', '五等分の花嫁', '物語シリーズ', '青春ブタ野郎はバニーガール先輩の夢を見ない', 
            '咲','ゆゆ式'
            ];
            
        $author = [
            'あfろ', '春場ねぎ', '西尾維新', '鴨志田一', '小林立', '三上小又'
            ];
            
        $publisher = [
            ''
            ];
            
        $params = array();
        for ($i=0; $i<6; $i++) {
        $params[] = [
        'id' => $i + 1,
        'name' => $title[$i],
        'author' => $author[$i],
         ];
         
        }
        
        
        foreach($params as $param){
            DB::table('titles')->insert($param); 
        }
    }
}
