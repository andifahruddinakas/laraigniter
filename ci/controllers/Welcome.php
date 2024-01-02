<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;

defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     *
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        // dd(app());
        // dd(app()->version());
        // // log
        // info('test info');
        // // session()->put('akas', 'aaaaaaaaaa');
        // session()->flash('akas', 'aaaaaaaaaa');
        dd(session()->all());
        // // dd(config('app'));
        
        // // // dd(app());
        $akas = encrypt('ini akas');

        dd([
            'akas' => $akas,
            'decrypt' => decrypt($akas),
        ]);
        // // dd(app('cache'));
        dd(User::get()->toArray());
        // dd(DB::table('users')->get()->toArray());
        // cache()->flush();
        // $akas = cache()->remember('akas', 10000, function () {
        //     return 'ini akssas';
        // });

        // dd($akas);
        // dd(app('cache'));
        // User::create([
        //     'name'     => 'test'.uniqid(),
        //     'email'    => 'test'.uniqid().'@test.com',
        //     'password' => md5('test'.uniqid()),
        // ]);

        // dd(app());
        $users = User::limit(10)->get();

        dd($users->toArray());
        
        return view('users', compact('users'));
    }

    public function akas()
    {
        return view('akas');
    }
}
