<?php
/**
 * Created by PhpStorm.
 * User: bob
 * Date: 2015/6/25
 * Time: 15:15
 */
DB::listen(function($sql,$bindings,$time){
    Log::info('[SQL]:'.$time.":".join(',',$sql));
});