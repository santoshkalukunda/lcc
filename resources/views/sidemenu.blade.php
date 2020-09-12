@section('sidemenu')
<li>
    <a href="javascript:;"><i class="sidebar-item-icon fa  fa-university"></i>
        <span class="nav-label">Company</span><i class="fa fa-angle-left arrow"></i></a>
    <ul class="nav-2-level collapse">
        <li>
            <a href="{{ route('company.create') }}">Register</a>
        </li>
        <li>
            <a href="{{ route('company.index') }}">List</a>
        </li>
        <li>
            <a href="{{ route('company.report') }}">Advance Search</a>
        </li>
    </ul>
</li>
<li>
    <a href="{{ route('shareholder-search.result') }}"><i class="sidebar-item-icon fa fa-users"></i>
        <span class="nav-label">Shareholder Search</span>
    </a>
</li>
<li>
    <a href="{{ route('documentreport.index') }}"><i class="sidebar-item-icon fa fa-file"></i>
        <span class="nav-label">सुरु विवरण</span>
    </a>
</li>
<li>
    <a href="{{ route('audit.index') }}"><i class="sidebar-item-icon fa fa-book"></i>
        <span class="nav-label">लेखा परिक्षण</span>
    </a>
</li>
<li>
    <a href="{{ route('renew.index') }}"><i class="sidebar-item-icon fa fa-redo"></i>
        <span class="nav-label">वार्षिक अध्यावधिक</span>
    </a>
</li>
<li>
    <a href="{{ route('namechange.index') }}"><i class="sidebar-item-icon fa fa-address-card"></i>
        <span class="nav-label">नाम परिवर्तन</span>
    </a>
</li>
<li>
    <a href="{{ route('company-sherepurchasesele') }}"><i class="sidebar-item-icon fa fa-shopping-bag"></i>
        <span class="nav-label">शेयर खरिद बिक्री</span>
    </a>
</li>
<li>
    <a href="{{ route('company-capitalincrease') }}"><i class="sidebar-item-icon fa fa-money-bill"></i>
        <span class="nav-label">पूँजी वृद्धि</span>
    </a>
</li>
<li>
    <a href="javascript:;"><i class="sidebar-item-icon fa fa-user"></i>
        <span class="nav-label">User</span><i class="fa fa-angle-left arrow"></i></a>
    <ul class="nav-2-level collapse">
        <li>
            <a href="{{ route('register') }}">Register</a>
        </li>
        <li>
            <a href="{{ route('list.index') }}">List</a>
        </li>
    </ul>
</li>
<li>
    <a href="javascript:;"><i class="sidebar-item-icon fa fa-cog"></i>
        <span class="nav-label">Setting</span><i class="fa fa-angle-left arrow"></i></a>
    <ul class="nav-2-level collapse">
        <li>
            <a href="{{ route('setdate.index') }}">Set Fiscal Year</a>
        </li>
        <li>
            <a href="#"> Set Threshhold Date</a>
        </li>
        <li>
            <a href="{{route('profile.index')}}">Company Profile</a>
        </li>
        <li>
            <a href="{{route('custommail.create')}}">Send Mail</a>
        </li>
    </ul>
</li>
@endsection