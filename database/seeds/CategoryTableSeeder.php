<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $title = [
            '不明', 'ジャンプ', 'マガジン', 'きらら', 'ラノベ','その他'
            ];
            
        $params = array();
        for ($i=0; $i<6; $i++) {
        $params[] = [
        'id' => $i + 1,
        'name' => $title[$i],
         ];
        }
        
        
        foreach($params as $param){
            DB::table('categories')->insert($param); 
        }
    }
}
