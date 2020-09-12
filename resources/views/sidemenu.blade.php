@section('sidemenu')
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
@endsection