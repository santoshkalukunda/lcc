<style>
    .profile{
        background-color:rgb(77, 79, 85); 
    }
  
    .menu-profile:hover{
        background-color:rgb(56, 52, 58);
        color: white;
    }
</style>
<div class="border profile" style="height:100%;">
    <nav class="navbar navbar-expand-lg  navbar-light col-md-3 ">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

            <ul class="nav flex-column">
               <a class="navbar-brand text-white" href="{{ route('company.show', $companyInfo) }}">
            <h6> {{ $companyInfo->name }}</h6>
                </a>
               
                <li class="nav-item mt-3">
                    <a class="nav-link text-white menu-profile" href="{{ route('company.show', $companyInfo) }}">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white menu-profile" href="{{ route('document.show', $companyInfo) }}">Document</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white menu-profile" href="{{ route('shareholder.show', $companyInfo) }}">Shareholder</a>
                </li>
            </ul>

        </div>
    </nav>
</div>
