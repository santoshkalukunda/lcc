
<div class="sidebar">
    <a class="active" href="{{ route('company.show', $companyInfo) }}">{{ $companyInfo->name }}</a>
    <a href="{{ route('company.show', $companyInfo) }}">Profile</a>
    <a href="{{ route('document.show', $companyInfo) }}">Document</a>
    <a href="{{ route('shareholder.show', $companyInfo) }}">Shareholder</a>
    <a href="{{ route('renew.show', $companyInfo)}}">Renew</a>
  </div>
 