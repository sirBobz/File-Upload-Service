<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FileUpload;
use App\Transaction;
use Illuminate\Support\Facades\Input;
use DB, Redirect, Exception, Excel, Log, Session;

class FileUploadController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


     /**
     * receives validated file upload
     * validates the file content 
     * and inserts the content ito a DB
     *
     * @return http response
     */
    public function index(FileUpload $request)
    {
 
    try 
     {
         DB::beginTransaction();

         if(Input::hasFile('file')){

          $path = Input::file('file')->getRealPath();
          $data = Excel::load($path, function($reader) {})->get();

         if(!empty($data) && $data->count()){
         
          foreach ($data as $key => $value) {  

            if (is_numeric(trim($value->amount))  || is_numeric(trim($value->phone))) {

                $Transaction = new Transaction;
                $Transaction->request_id = "jumoworld" . preg_replace('/\D/', '', date('Y-m-d H:i:s')) . str_random(10);
                $Transaction->amount = $value->amount;
                $Transaction->phone_number = "254" . substr($value->phone, -9);
                $Transaction->save();

            }

            else
            {

                Session::flash('errorbulk', 'Non Numeric Data or CSV Header Error.');
                return Redirect::back();
            }

          }


        }
      }

      Session::flash('success', 'File Being Processed.');

      DB::commit();

      return Redirect::back();

     }
    catch (Exception $e) 
     {
        
        Session::flash('errorbulk', 'Failed To Fetch DATA From File.');
        DB::rollback(); 
        return Redirect::back();
     } 

  }
}
