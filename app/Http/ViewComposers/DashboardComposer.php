<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\WebSettings;

class DashboardComposer {

    public function compose(View $view)
    {
        $webSettings = WebSettings::find(1);

        $view->with([
            'webSettings' => $webSettings
        ]);
    }

}
