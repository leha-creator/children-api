<?php

namespace Children\Controllers;

require_once "Controller.php";
require_once "../Models/Song.php";

use Children\Controller;
use Children\Models\Song;

class SongsController implements Controller
{

    public function getData($id = null)
    {

        if (empty($id)) {
            $data = Song::all();
        } else {
            $data = Song::find($id);
        }

        return $data;

    }
}