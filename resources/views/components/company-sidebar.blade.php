@section('sidemenu')

<li>
  <a class="active" href="{{ route('company.show', $companyInfo) }}"><i class="sidebar-item-icon fa fa-university"></i><span class="nav-label font-bold">@php
      echo wordwrap($companyInfo->name,20,"<br>\n");
  @endphp </span></a>
</li>
<li>
    <a href="{{ route('document.show', $companyInfo) }}"><i class="sidebar-item-icon fa fa-file"></i>
        <span class="nav-label">Document</span>
    </a>
</li>
<li>
    <a href="{{ route('shareholder.show', $companyInfo) }}"><i class="sidebar-item-icon fa fa-users"></i>
        <span class="nav-label">Shareholder</span>
    </a>
</li>
<li>
    <a href="{{ route('renew.show', $companyInfo)}}"><i class="sidebar-item-icon fa fa-redo"></i>
        <span class="nav-label">Renew</span>
    </a>
</li>
<li>
  <a href="{{ route('audit.show', $companyInfo)}}"><i class="sidebar-item-icon fa fa-book"></i>
      <span class="nav-label">Audit</span>
  </a>
</li>
<li>
  <a href="{{ route('namechange.show', $companyInfo)}}"><i class="sidebar-item-icon fa fa-address-card"></i>
      <span class="nav-label">Name Change</span>
  </a>
</li>

@endsection

 