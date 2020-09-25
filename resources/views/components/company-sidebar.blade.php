@include('sidemenu')

<div class=" container-fluid">
<div class="col-md-12  bg-ebony p-4" >
   <div class=" font-26 text-capitalize bold text-white">{{$companyInfo->name}}</div> 
   <div class=" font-12 text-capitalize bold text-white">{{$companyInfo->address}}</div> 
   <div class=" font-12 text-capitalize bold text-white">{{$companyInfo->contact_no}}</div> 
   <div class=" font-12 text-capitalize bold text-white">{{$companyInfo->email}}</div> 
</div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
     
    </button>
    <div class="collapse navbar-collapse " id="navbarTogglerDemo03">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item ">
          <a class="nav-link text-white menu {{ (request()->is('company*')) ? 'active' : '' }}" href="{{ route('company.show', $companyInfo) }}">About </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-white menu {{ (request()->is('capital*')) ? 'active' : '' }}" href="{{ route('capital.show', $companyInfo) }}">Capital</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white menu {{ (request()->is('shareholder*')) ? 'active' : '' }}" href="{{ route('shareholder.show', $companyInfo) }}">Shareholder</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white menu {{ (request()->is('document*')) ? 'active' : '' }}" href="{{ route('document.show', $companyInfo) }}">Document</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white menu {{ (request()->is('audit*')) ? 'active' : '' }}" href="{{ route('audit.show', $companyInfo)}}">Audit Report</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white menu {{ (request()->is('renew*')) ? 'active' : '' }}" href="{{ route('renew.show', $companyInfo)}}">Renew Report</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white menu {{ (request()->is('namechange*')) ? 'active' : '' }}" href="{{ route('namechange.show', $companyInfo)}}">Name Chnage</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white menu {{ (request()->is('fee*')) ? 'active' : '' }}" href="{{ route('fee.show', $companyInfo)}}">Fee</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white menu {{ (request()->is('custommail*')) ? 'active' : '' }}" href="{{ route('custommail.show', $companyInfo)}}">Send Mail</a>
          </li>
          
      </ul>
    </div>
  </nav>
</div>


 