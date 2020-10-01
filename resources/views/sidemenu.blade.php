@section('sidemenu')
    <li class="{{ (request()->is('company','company/create*','company/report*')) ? 'active' : '' }}">
        <a href="javascript:;"><i class="sidebar-item-icon fa  fa-university"></i>
            <span class="nav-label">Company</span><i class="fa fa-angle-left arrow"></i></a>
        <ul class="nav-2-level collapse">
            <li>
                <a href="{{ route('company.create') }}" class="{{ (request()->is('company/create*')) ? 'active' : '' }}">Register</a>
            </li>
            <li>
                <a href="{{ route('company.index') }}" class="{{ (request()->is('company')) ? 'active' : '' }}">List</a>
            </li>
            <li>
                <a href="{{ route('company.report') }}" class="{{ (request()->is('company/report*')) ? 'active' : '' }}">Advance Search</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="{{ route('shareholder-search.result') }}" class="{{ (request()->is('shareholder/search*')) ? 'active' : '' }}""><i class="sidebar-item-icon fa fa-sitemap"></i>
            <span class="nav-label">Shareholder Search</span>
        </a>
    </li>
    <li>
        <a href="{{ route('documentreport.index') }}" class="{{ (request()->is('documentreport*')) ? 'active' : '' }}"><i class="sidebar-item-icon fa fa-file"></i>
            <span class="nav-label">सुरु विवरण</span>
        </a>
    </li>
    <li>
        <a href="{{ route('audit.index') }}" class="{{ (request()->is('audit','search/audit')) ? 'active' : '' }}"><i class="sidebar-item-icon fa fa-book"></i>
            <span class="nav-label">लेखा परिक्षण</span>
        </a>
    </li>
    <li>
        <a href="{{ route('renew.index') }}" class="{{ (request()->is('renew','search/renew')) ? 'active' : '' }}"><i class="sidebar-item-icon fa fa-retweet"></i>
            <span class="nav-label">वार्षिक अध्यावधिक</span>
        </a>
    </li>
    <li>
        <a href="{{ route('namechange.index') }}" class="{{ (request()->is('namechange','search/changename')) ? 'active' : '' }}"><i class="sidebar-item-icon fa fa-address-card"></i>
            <span class="nav-label">नाम परिवर्तन</span>
        </a>
    </li>
    <li>
        <a href="{{ route('company-sherepurchasesele') }}" class="{{ (request()->is('sherepurchasesele*')) ? 'active' : '' }}"><i class="sidebar-item-icon fa fa-shopping-bag"></i>
            <span class="nav-label">शेयर खरिद बिक्री</span>
        </a>
    </li>
    <li>
        <a href="{{ route('company-capitalincrease') }}" class="{{ (request()->is('capitalincrease*')) ? 'active' : '' }}"><i class="sidebar-item-icon fa fa-money-bill"></i>
            <span class="nav-label">पूँजी वृद्धि</span>
        </a>
    </li>
    <li class="{{ (request()->is('register','user*')) ? 'active' : '' }}">
        <a href="javascript:;"><i class="sidebar-item-icon fa fa-users"></i>
            <span class="nav-label">Users</span><i class="fa fa-angle-left arrow"></i></a>
        <ul class="nav-2-level collapse">
            <li>
                <a href="{{ route('register') }}" class="{{ (request()->is('register*')) ? 'active' : '' }}">Register</a>
            </li>
            <li>
                <a href="{{ route('list.index') }}" class="{{ (request()->is('user*')) ? 'active' : '' }}">List</a>
            </li>
        </ul>
    </li>
    <li class="{{ (request()->is('setdate*','thresholddate*','profile*','documenttype*','contactus*','custommail')) ? 'active' : '' }}">
        <a href="javascript:;"><i class="sidebar-item-icon fa fa-cog"></i>
            <span class="nav-label">Setting</span><i class="fa fa-angle-left arrow"></i></a>
        <ul class="nav-2-level collapse">
            <li class="{{ (request()->is('setdate*')) ? 'active' : '' }}">
                <a href="{{ route('setdate.index') }}" >Set Fiscal Year</a>
            </li>
            <li class="{{ (request()->is('thresholddate*')) ? 'active' : '' }}">
                <a href="{{ route('thresholddate.index') }}">Set Threshold Date</a>
            </li>
            <li class="{{ (request()->is('profile*')) ? 'active' : '' }}">
                <a href="{{ route('profile.index') }}">Company Profile</a>
            </li>
            <li class="{{ (request()->is('documenttype*')) ? 'active' : '' }}">
                <a href="{{ route('documenttype.index') }}">Document Type</a>
            </li>
            <li class="{{ (request()->is('download*')) ? 'active' : '' }}">
                <a href="{{ route('download.index') }}">Downloads</a>
            </li>
            <li class="{{ (request()->is('contactus*')) ? 'active' : '' }}">
                <a href="{{ route('contactus.index') }}">Contact Us List</a>
            </li>
            <li class="{{ (request()->is('custommail')) ? 'active' : '' }}">
                <a href="{{ route('custommail.create') }}">Send Mail</a>
            </li>
        </ul>
    </li>
@endsection
