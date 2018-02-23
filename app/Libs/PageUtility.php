<?php

namespace App\Libs;

use DB;
use App\Http\Models\Page;

class PageUtility
{
    /**
     * 検索
     *
     * @param $keyword
     * @return array
     */
    public static function findUserViewedPage($keyword){

        //検索キーワードが「なし(空)」の場合、空の配列を返す。
        if(empty($keyword)) {
            return [];
        }

        //検索キーワードを引数にし、結果を取得する。
        $userPageObject = self::getUserPageObject($keyword);

        //オブジェクト型から配列に変換
        $userPageArray = self::convertDataObjectToDataArray($userPageObject);

        return $userPageArray;
    }


//////////////////////////////
    /**
     * @param $keyword
     * @return mixed
     */
    private static function getUserPageObject($keyword){
       $result = Page::select(DB::raw("page.id AS page_id,user.name as user_name,activity.user_id as user_id,page.title as page_title,COUNT(activity.user_id) as view_count"))
                ->leftJoin('activity','page.id', '=', 'activity.page_id')
                ->leftJoin('user', 'user.id', '=', 'activity.user_id')
                ->where('page.title','LIKE', "$keyword%")
                ->groupby ('activity.user_id', 'user.name', 'page.id', 'page.title')
                ->orderbyraw('activity.user_id IS NULL ASC')
                ->orderby('activity.user_id','ASC')
                //ソートを分けることで、ぺージIDのソートはoderbyrawの影響を受けない
                ->orderby('page.id','ASC')
                ->get();

      return $result;
    }

//////////////////////////////
    /**
     * @param $userPageObject
     * @return array
     */
    private static function convertDataObjectToDataArray($userPageObject){
        $userPageString = json_encode($userPageObject);
        $userPageArray = json_decode($userPageString, TRUE);

        return $userPageArray;
    }
}
