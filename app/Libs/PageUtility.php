<?php

namespace App\Libs;

use App\Http\Models\Activity;
use App\Http\Models\Page;
use App\Http\Models\User;

class PageUtility
{
    /**
     * 検索
     *
     * @param $keyword
     * @return array
     */
    public static function findUserViewedPage($keyword){
        $pages = Page::where('title', 'LIKE', "$keyword%")->get();
        $activities = Activity::all();
        $users = User::all();

        $userPageMap = [];
        $userPageArray = [];

        foreach ($pages as $single_page) {
            $isFound = false;
            foreach ($activities as $single_activity) {
                if ($single_page->id == $single_activity->page_id) {
                    foreach ($users as $single_user) {
                        if ($single_user->id == $single_activity->user_id) {
                            if(array_key_exists($single_user->id, $userPageMap)){
                                $userPageMap[$single_user->id]['view_count'] = $userPageMap[$single_user->id]['view_count'] + 1;
                            }else{
                                $isFound = true;
                                $userPage = [];
                                $userPage['page_id'] = $single_page->id;
                                $userPage['page_title'] = $single_page->title;
                                $userPage['user_id'] = $single_user->id;
                                $userPage['user_name'] = $single_user->name;
                                $userPage['view_count'] = 1;
                                $userPageMap[$single_user->id] = $userPage;
                            }
                        }
                        break;
                    }
                }
                break;
            }
            if (!$isFound) {
                $userPage = [];
                $userPage['page_id'] = $single_page->id;
                $userPage['page_title'] = $single_page->title;
                $userPageArray[] = $userPage;
            }
        }

        // ユーザIDでソート
        ksort($userPageMap);

        foreach ($userPageMap as $userPage) {
            $userPageArray[] = $userPage;
        }

        return $userPageArray;
    }
}
