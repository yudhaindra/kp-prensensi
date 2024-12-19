<?php

namespace App\Http\Controllers;

abstract class Controller
{
    /**
     * Path to public
     */
    const MainPath = "/";

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function getLoadPath(String $path): String
    {
        return self::MainPath . $path;
    }
}
