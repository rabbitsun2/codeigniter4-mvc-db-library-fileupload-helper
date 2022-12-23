<?php

namespace App\Controllers;

class Dbex extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        
        $query = $db->query('SELECT * FROM book');
        $results = $query->getResultArray();
        
        echo "<xmp>";
        print_r($results);
        echo "</xmp>";
    }

    public function preparedInsert(){

        $db = db_connect();

        $pQuery = $db->prepare(static function($db){

            return $db->table('book')->insert([
                'title' => 'Hello',
                'body' => '반가워요.',
                'totalpage' => 125,
                'author' => '매실',
            ]);

        });

        $title = '안녕하세요(Hello)';
        $body = '반~갑습니다.';
        $totalpage = 127;
        $author = '매실주스';

        $results = $pQuery->execute($title, $body, $totalpage, $author);

        $pQuery->close();   // prepared Query 종료(좋은 습관)

    }

}
