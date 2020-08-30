<?php
namespace App\Http\Repositories;

use App\Models\Setting;


class SettingRepository
{
    private $storageFolder, $publicFolder;

    public function __construct() {
        $this->storageFolder = 'settings';
    }

    public function save($data = []) {
        foreach($data as $key => $value) {
            if($setting = $this->setting($key)) {
                if(!$this->updateSetting($setting, $value)) return false;
            } else {
                if(!$this->createSetting($key, $value)) return false;
            }
        }
        return true;
    }

    public function getSettings() {
        return Setting::orderBy('key', 'asc')->get();
    }

    public function uploadLogo($logo) {
        $setting = $this->setting('logo');
        if($setting){
            $image_name = uploadImage($logo, $this->storageFolder);

            if($setting->key == 'logo' && $setting->value) {
                deleteImage($setting->value, $this->storageFolder);
            }
            if(!$this->updateSetting($setting, $image_name)) return false;
        } elseif(!$setting) {
            $image_name = uploadImage($logo, $this->storageFolder);
            if(!$this->createSetting('logo', $image_name)) return false;
        }
        return true;
    }

    public function uploadIcon($icon) {
        if($setting = $this->setting('icon')){
            $image_name = uploadImage($icon, $this->storageFolder);
            if($setting->key == 'icon' && $setting->value) {
                deleteImage($setting->value, $this->storageFolder);
            }
            if(!$this->updateSetting($setting, $image_name)) return false;
        } else {
            $image_name =uploadImage($icon, $this->storageFolder);
            if(!$this->createSetting('icon', $image_name)) return false;
        }
        return true;
    }

    private function setting($key) {
        return Setting::where('key', $key)->first();
    }

    private function createSetting( $key, $value ) {
        if(Setting::create(['key' => $key, 'value' => $value])) return true;
        return false;
    }

    private function updateSetting(Setting $setting, $value) {
        if($setting->update(['value' => $value])) return true;
        return false;
    }
}
