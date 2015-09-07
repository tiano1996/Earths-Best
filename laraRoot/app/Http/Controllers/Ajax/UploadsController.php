<?php namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Request;
use Input;
use Validator;
use Response;

class UploadsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function uploadImage(Request $request)
    {
        $file = Input::file('image');
        $input = array('image' => $file);
        $rules = array(
            'image' => 'image'
        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return Response::json([
                'success' => false,
                'msg' => 'Validator failed',
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }

        $destinationPath = '/uploads/images/';
        $filename = $this->getRandomName($file->getClientOriginalName(), "{yy}{mm}{dd}-{rand:6}-{filename}",$file->getClientOriginalExtension());
        if ($file->move(base_path() . '/../' . $destinationPath, $filename)) {
            return Response::json(
                [
                    'success' => true,
                    'msg' => 'ok',
                    'urlPath' => $destinationPath . $filename,
                ]
            );
        } else {
            return Response::json(
                [
                    'success' => false,
                    'msg' => '上传失败',
                ]
            );
        }
    }

    public function uploadFile(Request $request)
    {
        $file = Input::file('file');
        $input = array('file' => $file);
        $rules = array(
            'file' => 'mimes:xls,doc,ppt'
        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return Response::json([
                'success' => false,
                'msg' => 'Validator failed',
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }

        $destinationPath = '/uploads/files/';
        $filename = $this->getRandomName($file->getClientOriginalName(), "{yy}{mm}{dd}-{rand:6}-{filename}",$file->getClientOriginalExtension());
        if ($file->move(base_path() . '/../' . $destinationPath, $filename)) {
            return Response::json(
                [
                    'success' => true,
                    'msg' => 'ok',
                    'urlPath' => $destinationPath . $filename,
                ]
            );
        } else {
            return Response::json(
                [
                    'success' => false,
                    'msg' => '上传失败',
                ]
            );
        }
    }

    /**
     * 重命名文件
     * @param $name
     * @param $config
     * @return string
     */
    protected function getRandomName($name, $config, $ext = 'jpg')
    {
        //替换日期事件
        $t = time();
        $d = explode('-', date("Y-y-m-d-H-i-s"));
        $format = $config;
        $format = str_replace("{yyyy}", $d[0], $format);
        $format = str_replace("{yy}", $d[1], $format);
        $format = str_replace("{mm}", $d[2], $format);
        $format = str_replace("{dd}", $d[3], $format);
        $format = str_replace("{hh}", $d[4], $format);
        $format = str_replace("{ii}", $d[5], $format);
        $format = str_replace("{ss}", $d[6], $format);
        $format = str_replace("{time}", $t, $format);

        //过滤文件名的非法自负,并替换文件名
        $oriName = substr($name, 0, strrpos($name, '.'));
        $oriName = preg_replace("/[\|\?\"\<\>\/\*\\\\]+/", '', $oriName);
        $format = str_replace("{filename}", $oriName, $format);

        //替换随机字符串
        $randNum = rand(1, 10000000000) . rand(1, 10000000000);
        if (preg_match("/\{rand\:([\d]*)\}/i", $format, $matches)) {
            $format = preg_replace("/\{rand\:[\d]*\}/i", substr($randNum, 0, $matches[1]), $format);
        }
        return $format . '.' . $ext;
    }
}