@section('sidemenu')
<li>
    <a href="{{ route('documentreport.index') }}"><i class="sidebar-item-icon fa fa-file"></i>
        <span class="nav-label">दफा १८४ दफा ९२ दफा ३१ <br> दफा १११ को विवरण ३ महिना भित्र</span>
    </a>
</li>
<li>
    <a href="{{ route('audit.index') }}"><i class="sidebar-item-icon fa fa-book"></i>
        <span class="nav-label">असोज ५ भित्र</span>
    </a>
</li>
<li>
    <a href="{{ route('renew.index') }}"><i class="sidebar-item-icon fa fa-redo"></i>
        <span class="nav-label">पाैष मसान्त भित्र</span>
    </a>
</li>
<li>
    <a href="{{ route('namechange.index') }}"><i class="sidebar-item-icon fa fa-address-card"></i>
        <span class="nav-label">नाम परिवर्तन भएको १ महिना <br> भित्र</span>
    </a>
</li>
@endsection