<?php
/**
 * Created by PhpStorm.
 * User: henno
 * Date: 30/10/2018
 * Time: 12:21
 */

class Github
{
    static function getFollowerCount($username)
    {

        return 3;
    }

    public static function userFollowsUser(string $follower, string $followee, HTTP $http)
    {

        $followers = $http->get("https://api.github.com/users/$followee/followers");


        //die(var_dump($followers));

        foreach ($followers as $current_follower) {
            if($current_follower->login == $follower){
                return true;
            }
        }

        return false;
    }

}