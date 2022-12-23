<?php

namespace App\Controllers;

class Board extends BaseController
{
    public function index()
    {
        return view('board/index');
    }

    public function dbtest(){
        
        $db = \Config\Database::connect();
        
        $query = $db->query('SELECT * FROM book');
        $results = $query->getResultArray();
        
        echo "<xmp>";
        print_r($results);
        echo "</xmp>";
        
    }

    public function view($page = 'home'){

        if (! is_file(APPPATH . 'Views/board/' . $page . '.php')) {
            
            echo "참";
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }

        $data['title'] = ucfirst($page);

        return view('board/templates/header', $data)
            . view('board/' . $page)
            . view('board/templates/footer');

    }
}
