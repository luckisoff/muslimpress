<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Repositories\SettingRepository;
use Illuminate\Support\Facades\Validator;

class SettingController extends MainAdminController
{

    function __construct(SettingRepository $repo){
        $this->repo = $repo;
    }

    public function index(){
        try {
            if(!isAdmin()) abort(403,'Permission denied');
            $setting = settings();
            return view('admin.partials.settings', compact('setting'));
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function store(Request $request) {
        try {
            if(!isAdmin()) abort(403, 'Permission denied');
            if(!$this->repo->save($request->except('files','_token'))) throw new \Exception('Settings can not be saved');
            return back()->with('success', 'Settings saved');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function list() {
        try {
            $settings = $this->repo->getSettings();
            return $this->success(['settings' => $settings], 'Settings listing');
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 500);
        }
    }

    public function storeLogo(Request $request) {
        try {

            $validator = Validator::make($request->all(),[
                'logo'  => 'mimes:png,jpe,jpeg',
                'icon'  => 'mimes:png,jpe,jpeg,ico',
            ]);

            if($validator->fails()) throw new \Exception($validator->errors()->first());

            if(!$request->logo && !$request->icon) throw new \Exception('Please choose at least a logo or a icon.');

            if($request->logo) {
                if(!$this->repo->uploadLogo($request->logo)) throw new \Exception('Logo can not be uploaded');
            }

            if($request->icon) {
                if(!$this->repo->uploadIcon($request->icon)) throw new \Exception('Icon can not be uploaded');
            }

            return back()->with('success', 'Logo and Icon are saved');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
