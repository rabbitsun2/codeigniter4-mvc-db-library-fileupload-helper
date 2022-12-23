<?php

namespace App\Controllers;

use CodeIgniter\Files\File;            // 라이브러리 File 사용하기

class Viewex extends BaseController
{
    protected $helpers = ['form'];

    public function index()
    {
        return view('viewex/blog_view');
    }

    public function multi_db_list(){

        // $db = \Config\Database::connect();
        $db = db_connect();
        
        $query = $db->query('SELECT * FROM book');
        $results = $query->getResultArray();

        //$bookDTO = new BookDTO();

        //print_r($results);

        $db->close();       // 수동 연결 종료

        $data = [
            'page_title' => 'Your title',
            'heading' => 'My Heading',
            'message' => 'My Message', 
            'hello' => $query->getResultArray(),
        ];

        // 주제1: ['saveData' => false] 옵션 
        // 설명: 데이터가 다른 뷰로 유입되는 것을 차단함.

        return view('viewex/template/header')
            . view('viewex/multi_db_list', $data, ['saveData' => false])
            . view('viewex/template/footer');

    }

    public function single_upload_form(){
        return view('viewex/single_upload_form', ['errors' => []] );
    }

    public function single_upload(){

        $validationRule = [
            'userfile' => [
                'label' => 'Image File',
                'rules' => 'uploaded[userfile]'
                    . '|is_image[userfile]'
                    . '|mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    . '|max_size[userfile,1000]'
                    . '|max_dims[userfile,1024,768]',
            ],
        ];
        if (! $this->validate($validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];

            return view('viewex/single_upload_form', $data);
        }

        $img = $this->request->getFile('userfile');

        if (! $img->hasMoved()) {
            $filepath = WRITEPATH . 'uploads/' . $img->store();

            $usrfile = new File($filepath);

            $data = ['uploaded_flleinfo' => $usrfile,
                    'hello' => '반갑다'];

            //print_r($data);
            return view('viewex/single_upload_success', $data);
        }
        $data = ['errors' => 'The file has already been moved.'];

        return view('viewex/single_upload_form', $data);

    }

    public function multi_upload_form(){
        return view('viewex/multi_upload_form', ['errors' => []] );
    }
    public function multi_upload(){

        if ($imagefile = $this->request->getFiles()) {
            
            $files = $this->request->getFileMultiple('userfile');

            $fileInfos = array();    // fileInfos 담기

            foreach ($files as $file) {
                 
                if ($file->isValid() && ! $file->hasMoved()) {

                    $newName = $file->getRandomName();
                    $data['fileName'] = $file->getName();
                    $data['newName'] = $newName;
                    $data['fileType'] = $file->getClientMimeType();
                    $data['fileSize'] = $file->getSize();

                    $file->move('public/uploads', $newName);
                    array_push($fileInfos, $data);
                    
                }

            }
            
            $data['fileInfos'] = $fileInfos;
            return view('viewex/multi_upload_success', $data);

        }

        $data = ['errors' => 'The file has already been moved.'];

        return view('viewex/multi_upload_form', $data);

    }

}
