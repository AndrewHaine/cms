<?php

namespace Statamic\Http\Controllers\CP;

use Facades\Statamic\Extend\AddonInstaller;
use Illuminate\Http\Request;

class AddonsController extends CpController
{
    public function __construct()
    {
        $this->middleware(\Illuminate\Auth\Middleware\Authorize::class.':configure addons');
    }

    public function index()
    {
        return view('statamic::addons.index', [
            'title' => __('Addons'),
        ]);
    }

    public function install(Request $request)
    {
        return AddonInstaller::install($request->addon);
    }

    public function uninstall(Request $request)
    {
        return AddonInstaller::uninstall($request->addon);
    }
}
