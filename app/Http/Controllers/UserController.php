<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\User;
class UserController extends Controller
{
    public function register(Request $request)
    {
        $rules = [
            'username' => 'required|alpha|min:2|unique:users',
            'firstname' => 'required|alpha|min:2',
            'lastname' => 'required|alpha|min:2',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'usertype' => 'required'
         ];

        $customMessages = [
             'required' => 'Please fill attribute :attribute'
        ];
        $this->validate($request, $rules, $customMessages);

        try {
            $hasher = app()->make('hash');
            $username = $request->input('username');
            $firstname = $request->input('firstname');
            $lastname = $request->input('lastname');
            $email = $request->input('email');
            $password = $hasher->make($request->input('password'));
            $usertype = $request->input('usertype');

            $save = User::create([
                'username'=> $username,
                'firstname'=> $firstname,
                'lastname'=> $lastname,
                'email'=> $email,
                'password'=> $password,
                'api_token'=> sha1(time()),
                'usertype'=> $usertype
            ]);
            $res['status'] = true;
            $res['message'] = 'Registration success!';
            return response($res, 200);
        } catch (\Illuminate\Database\QueryException $ex) {
            $res['status'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        }
    }

    public function get_user()
    {
        $user = User::all();
        if ($user) {
              $res['status'] = true;
              $res['message'] = $user;

              return response($res);
        }else{
          $res['status'] = false;
          $res['message'] = 'Cannot find user!';

          return response($res);
        }
    }
}