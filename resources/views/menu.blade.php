<div class="col-md-6">
    <form action="{{ route('company-search') }}" method="post">
        @csrf
        
        <div class="input-group col-12 ">
            <input type="text" id="company-search-input" name="search"
                class="form-control badge-pill " list="suggestions-data-list"
                placeholder="Search Company" aria-label="Search Company"
                aria-describedby="search">
            
            <div class="input-group-append">
                <span id="search">
                    <button type="submit" class="btn btn-secondary"><i
                            class="fa fa-search"></i></button></span>
            </div>
            <datalist id="suggestions-data-list">
            </datalist>
        </div>
    </form>   
</div>
<h6 >
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link text-white menu" href="{{route('home')}}">Home</a>
        </li>
        <li class="nav-item dropdown menu">
            
            <a class="nav-link dropdown-toggle text-white " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Company
            </a>
            <div class="dropdown-menu" style="background-color: #3a76a0;" aria-labelledby="navbarDropdown">
              <a class="dropdown-item menu"  href="{{ route('company.create') }}">Register</a>
              <a class="dropdown-item menu" href="{{ route('company.index') }}">List</a>
            </div>
          </li>
          <li class="nav-item dropdown menu">
            <a class="nav-link dropdown-toggle text-white " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Shareholder
            </a>
            <div class="dropdown-menu" style="background-color: #3a76a0;" aria-labelledby="navbarDropdown">
              <a class="dropdown-item menu"  href="{{route('shareholder-search')}}">Search</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white manu" href="{{route('report')}}">Report</a>
        </li>
       
    </ul>
</h6>

