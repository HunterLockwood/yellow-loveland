<?php
// Berlin extension, https://github.com/annaesvensson/yellow-berlin
// Serial numbers shaved off by Hunter Lockwood to make the Loveland theme
// I literally have no idea if this will or should work

class YellowLoveland {
    const VERSION = "0.9.2";
    public $yellow;         // access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }
    
    // Handle update
    public function onUpdate($action) {
        $fileName = $this->yellow->system->get("coreExtensionDirectory").$this->yellow->system->get("coreSystemFile");
        if ($action=="install") {
            $this->yellow->system->save($fileName, array("theme" => "loveland"));
        } elseif ($action=="uninstall" && $this->yellow->system->get("theme")=="loveland") {
            $this->yellow->system->save($fileName, array("theme" => $this->yellow->system->getDifferent("theme")));
        }
    }
}
