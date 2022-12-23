<?php

namespace App\Controllers;

class Formex extends BaseController
{
    // 생성자로 선언함.
    public function __construct(){
        helper('form');     // 헬퍼 로드
    }

    public function formex_1(){

        return view('formex/formex_1');

    }

    public function formex_2(){

        return view('formex/formex_2');

    }

    public function formex_result_post(){

        return view('formex/formex_result_post');

    }
    
    public function formex_result_get(){

        return view('formex/formex_result_get');

    }

}