<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DbController extends Controller
{

    public function change(){
        $con = mysqli_connect(env('DB_HOST'),env('DB_USERNAME'),env('DB_PASSWORD'),env('DB_DATABASE'),env('DB_PORT'));

        $sql = 'SELECT stop_access FROM dbs WHERE id=1';
        $query = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($query);
        if($row['stop_access'] == 0){
            $sql = 'UPDATE dbs SET stop_access = 1 WHERE id=1';
            $query = mysqli_query($con,$sql);
        }else{
            $sql = 'UPDATE dbs SET stop_access = 0 WHERE id=1';
            $query = mysqli_query($con,$sql);
        }
        return response()->json(['stop_access'=> !($row['stop_access'])], 200);
    }
}
