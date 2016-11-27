<?php

namespace App\Http\Controllers\Auth;
use App\Patchack\PatternChack;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
class AuthController extends Controller
{
    public function getLogin(){
        return view("auth.login");
    }

    public function postLogin(Request $req){
        //检测参数
        //检测email
        if(!PatternChack::trim($req->email)){
            return back()->with("warning","请填写email");
        }

        if(!PatternChack::check($req->email,"email")){
            return back()->with("warning","邮件不合法!");
        }
        //查看是否有此用户名
        $user = User::where("email",$req->email)->first();
        if(!$user){
            return back()->with("warning","该用户名不存在");
        }
        //检测密码
        if(!strlen($req->password)){
            return back()->with("warning","请填写密码");
        }
        if(!Hash::check($req->password,$user->password)){
            return back()->with("warning","密码错误");
        }
        $user->lastlogin = time();
        $user->save();
        Auth::loginUsingId($user->uid);
        return redirect("index");
    }

    public function getRegister(){
        return view("auth.register");
    }

    public function postRegister(Request $req){
        //接收参数
        //验证参数
        $req->name;
        $req->email;
        $req->password;
        //检测邮箱是否正确
        if(!PatternChack::check($req->email,"email")){
            return back()->with("warning","邮箱格式不合法");
        }
        if(!PatternChack::check($req->password,"pwd6-16")){
            return back()->with("warning","密码为6-16位");
        }
        $user = User::where('email',$req->email)->first();
        if($user){
            return back()->with("warning","该邮箱已被注册!");
        }
        $user = new User();
        $user->username = $req->name;
        $user->password = Hash::make($req->password);
        $user->email = $req->email;
        $user->regtime = time();
        $user->save();
        Auth::loginUsingId($user->uid);
        return redirect("index");
    }

    public function checkMail(Request $req){
        //验证邮箱是否存在
        $user = User::where("email",$req->email)->first();
        if($user){
            return response()->json(["error"=>1,"msg"=>"该邮箱已被注册!"]);
        }else{
            return response()->json(["error"=>0,"msg"=>"该邮箱可以注册!"]);
        }
    }
}
