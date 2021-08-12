<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Unirest\Response;
use App\Models\User;

use Illuminate\Support\Facades\DB;


class UserController extends Controller
{

    public function index()
    {




       /*$res=[
          "aa" =>1,
          "bb" =>2
        ];

        return Response()->json($res); */

        $input=Request()->input();

       // $userdata=DB::select(" select * from user limit 1 ");
        $names=[];
        $i=1;
        DB::table('campaign')->orderBy('ID')->chunk(5,function($users) use(&$names,$i){

            foreach ($users as $user){
                $names[]=$user->Title;
                echo "<pre/>第".$i."ccc";
                echo $user->Title;
                echo "</pre>";
                $i++;
            }


        });

        //var_dump($names);
    }


    public function jugg(){


        $res=DB::table('User')->where('uid',1)->orwhere(function($query){

            $query->whereDate("CreateTime",'<',"2016-01-01")->whereTime("CreateTime","15:00");

        })->get();

        var_dump($res);


        $user=User::FindorFail(2183);

        return $user;


    }

    public function testinput(){


        //return request()->input();
        return view('welcome');

    }

}
