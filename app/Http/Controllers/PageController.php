<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    public function index($form_uid){
        // get json from api
        $data = Http::get("http://localhost/test_data/public/api/forms/$form_uid")->body();

        // json to associative array
        $decoded_data = json_decode($data, true);

        // api fails
        if (empty($decoded_data)){
            Session::flash('info', 'Api not working or form not found!');
            return redirect()->back();
        }

        $fields = $decoded_data['data']['fields'];
        unset($decoded_data['data']['fields']);
        $form = $decoded_data['data'];

        return view('index')->with('form', $form)->with('fields', $fields);
    }
}
