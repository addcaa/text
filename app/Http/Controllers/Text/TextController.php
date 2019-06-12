<?php

namespace App\Http\Controllers\Text;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use MongoDB\Client;
class TextController extends Controller
{
    //
    public function text(){
        $db_host="mongodb://127.0.0.1:27017";
        $client=new Client($db_host);
        $db = $client->runoob; // 获取名称为 "test" 的数据库
        $collection = $db->text; // 选择集合


        $info=[
            [
                'name'=>"李四",
                'age'=>28,
                'sex'=>"男",
            ],
            [
                'name'=>"冯丹",
                'age'=>18,
                'sex'=>"女",
            ],
            [
                'name'=>"连世杰",
                'age'=>19,
                'sex'=>"男",
            ]
        ];
//        $collection->insertMany($info);


//        $arr=[
//            'name='=>"旺旺",
//            'age'=>200,
//            'sex'=>"女"
//        ];
//        $collection->insertOne($arr);

//        $res=$collection->deleteMany(['name'=>"李四"]);
//
//        $collection->updateMany(['sex'=>"女"],['$set'=>["name"=>"王者"]]);

        $cursor = $collection->find(["name"=>"王者"]);
        var_dump(iterator_to_array($cursor));
//        echo "删除成功";
    }



    public function sw(){
        return view('sw.server');
    }
}
