<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdminLayout extends Component
{
    /** @var array<int, array{name?:string,label?:string,route?:string,href?:string,params?:array}> */
    public array $breadcrumbs;

    public ?string $title;

    public function __construct(array $breadcrumbs = [], ?string $title = null)
    {
        $this->breadcrumbs = $breadcrumbs;
        $this->title = $title;
    }

    public function render(): View
    {
        // resources/views/layouts/admin.blade.php
        return view('layouts.admin');
    }
}