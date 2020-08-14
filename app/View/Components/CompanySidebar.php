<?php

namespace App\View\Components;

use App\CompanyInfo;
use Illuminate\View\Component;

class CompanySidebar extends Component
{
    public $companyInfo;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->companyInfo = CompanyInfo::findOrFail($id);
        // $this->msg = $msg;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.company-sidebar');
    }
}
