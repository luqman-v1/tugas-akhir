<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use App\User;
Use App\Role;
use Auth;
use App\role_user;
use Illuminate\Support\Facades\Validator;
use Image;
use Illuminate\Support\Facades\Input;
use App\Config;
class UserController extends Controller
{
    	public function __construct(){

  		$this->middleware('auth');

		}

    	public function dashboard(){

    		// $config = Config::all()->first();
    	 //    $pertama = $config->no1;
    	 //    $kedua = $config->no2;
    	 //    $ketiga = $config->no3;
    	    
    	 //    if ($ketiga < 99) {
    	 //    	$config->no3=$config->no3+1;
    	 //    	$config->save();
    	    	
    	 //    }elseif ($kedua < 99) {
    	 //    	$config->no3 = 00;
    	 //    	$config->no2=$config->no2+1;
    	 //    	$config->save();
    	    	
    	 //    }else{
    	 //    	$config->no3 = 00;
    	 //    	$config->no2 = 00;
    	 //    	$config->no1=$config->no1+1;
    	 //    	$config->save();

    	 //    }
    		// $awal = $pertama<10?'0'.$pertama:$pertama;
    		// $tengah = $kedua<10?'0'.$kedua:$kedua;
    		// $akhir = $ketiga<10?'0'.$ketiga:$ketiga;
    		
    		// echo $awal.'-'.$tengah.'-'.$akhir;

			// Alert::success('oke bos', 'berhasil hore hore asik');
		
			return view('home');
		}

		public function profile($id){

			$detailProf = User::find($id);

			return view('user.profile')->with('detailProf',$detailProf);

		}

		public function update(Request $request, $id){
	
			$this->validate($request, [
    	 	// 'username' => 'required|alpha_dash|unique:users',
    		'name' => 'required',
    	 	'email' => 'required|email|max:255|unique:users',
    	 	'noHp' =>'required',
    	 	'foto' => 'required',
			]);

  			if(Input::file()){
  
            $image = Input::file('foto');
            $filename  = time() . '.' . $image->getClientOriginalExtension();

            $path = public_path('foto/' . $filename);
 
        
            Image::make($image->getRealPath())->resize(200, 200)->save($path);
                       
            $update = User::find($id);
			// $update->username = $request->get('username');
			$update->name = $request->get('name');
			$update->email = $request->get('email');
		    $update->noHp = $request->get('noHp');
			$update->foto = $filename;
			$update->save(); 
           }
			
			Alert::success('Update Sukses', 'Profile Telah diupdate');
			return back();

		}

		public function updatePassword(Request $request, $id){
				$this->validate($request, [
    	 	  'password' => 'required|min:6|confirmed',

			]);

			 $update = User::find($id);
		    $update->password = bcrypt($request['password']);
			$update->save(); 

				Alert::success('Update Sukses', 'password Telah diupdate');
			return back();
		}

        public function list(){
             $role = Role::all();
            $user = role_user::join('users','user_id','users.id')->get();
            return view('User.list')->with('user',$user)->with('role',$role);
        }

        public function register(Request $request){
        $this->validate($request, [
            'username' => 'required|alpha_dash|unique:users',
            'name' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'noHp' =>'required',
            'jabatan' => 'required',
            'password' => 'required|min:6|confirmed',
            ]);

           $user = User::create([
            'username' => $request['username'],
            'name' => $request['name'],
            'email' => $request['email'],
            'foto' => 'avatar2.png',
            'noHp' => $request['noHp'],
            'password' => bcrypt($request['password']),
        ]);

        $member = Role::where('id',$request->jabatan)->first();
        $user->attachRole($member->id);

        Alert::success('Sukses', 'User telah ditambahkan');
            return back();
        }

        public function ubahPassword(Request $request){

         $this->validate($request, [
            'password' => 'required|min:6|confirmed',
            ]);

           $user = User::find($request->id);
           $user->password = bcrypt($request->password);
           $user->save();

            Alert::success('Sukses', 'Password User telah diUbah');
            return back();
        }
		
}
