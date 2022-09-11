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
            
        $params = array();
        for ($i=0; $i<6; $i++) {
        $params[] = [
        'id' => $i + 1,
        'name' => $title[$i],
         ];
        }
        
        
        foreach($params as $param){
            DB::table('titles')->insert($param); 
        }
    }
}
