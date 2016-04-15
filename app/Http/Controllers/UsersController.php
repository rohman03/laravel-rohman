<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Validator, Session, Redirect, Hash, Mail;
use App\User;
class UsersController extends Controller
{
  public function create()
    {
      return View('users.create');
    }
    public function store(Request $request)
    {
      $data = $request->all();
      $validate = Validator::make($data, User::valid());
      if($validate->fails()) {
        return Redirect::to('users/create')
          ->withErrors($validate)
          ->withInput();
      } else {
        $user = new User;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->save();
        Session::flash('notice', 'Signup Success');
        return Redirect::to('users/create');
      }
    }    //

    public function reset_password() {
        return view('users.reset_password');
      }

      public function process_reset_password(Request $request) {
        $valid = array(
          'email' => 'required|email'
        );
        $data = $request->all();
        $validate = Validator::make($data, $valid);
        $find_data = User::where('email', $request->email)->first();
        if($validate->fails()) {
          return Redirect::to('reset-password')
          ->withErrors($validate)
          ->withInput();
        } elseif(empty($find_data)) {
          Session::flash('error', 'Email not found' . $request->email);
          return Redirect::to('reset-password')
            ->withErrors($validate)
            ->withInput();
        } else {
          $find_data->forgot_token = str_random(60);
          $find_data->save();
     Mail::send('emails.instructionresetpassword', $find_data->toArray(), function($message) use($find_data) {
        $message->from('portal_gam@gramedia.com','Reset Password');
        $message->to($find_data->email, $find_data->name)->subject('Reset Password Instruction to Jambal Laravel');
          });
        Session::flash('notice', 'Check your email, the reset password instruction has sent to '.$find_data->email);
          return Redirect::to('/sessions/create');
        }
      }

      public function change_password($forgot_token) {
        $find_user = User::where('forgot_token', $forgot_token)->first();
        if(empty($find_user)) {
          Session::flash('error', 'Token not valid, :)');
            return Redirect::to('/');
        } else {
          return view('users.change_password')
            ->with( 'forgot_token', $find_user->forgot_token);
        }
      }

      public function process_change_password(Request $request, $forgot_token) {
        $valid = array(
        'password' => ('required|min: 8|confirmed')
        );
        $data = $request->all();
        $find_data = User::where('forgot_token', $forgot_token)->first();
        $validate = Validator::make($data, $valid);
        if($validate->fails()) {
          return Redirect::to('change-password/'.$find_data->forgot_token)
            ->withErrors($validate);
        } else {
          $find_data->password = Hash::make($request->password);
          $find_data->forgot_token = null;
          $find_data->save();
          Session::flash('notice ', 'Hai ' . $find_data->username . ' Password has change lets login');
          return Redirect::to('sessions/create');
        }
      }
}
