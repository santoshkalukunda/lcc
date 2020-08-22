<style>

    .sidebar {
      margin: 0;
      padding: 0;
      width: 300px;
      background-color: #f1f1f1;
      position: fixed;
      height: 100%;
      overflow: auto;
      
    }
    
    .sidebar a {
      display: block;
      color: black;
      padding: 16px;
      text-decoration: none;
    }
     
    .sidebar a.active {
      background-color: #4CAF50;
      color: white;
    }
    
    .sidebar a:hover:not(.active) {
      background-color: #555;
      color: white;
    }
    @media screen and (max-width: 800px) {
      .sidebar {
        width: 100%;
        height: auto;
        position: relative;
      }
      .sidebar a {float: none; text-align: center;}
    }
    
    @media screen and (max-width: 700px) {
      .sidebar {
        width: 100%;
        height: auto;
        position: relative;
      }
      .sidebar a {float: none; text-align: center;}
    }
    
    @media screen and (max-width: 400px) {
      .sidebar a {
        text-align: center;
        float: none;
      }
    }
    </style>
    
<div class="sidebar">
    <a class="active" href="{{ route('company.show', $companyInfo) }}">{{ $companyInfo->name }}</a>
    <a href="{{ route('company.show', $companyInfo) }}">Profile</a>
    <a href="{{ route('document.show', $companyInfo) }}">Document</a>
    <a href="{{ route('shareholder.show', $companyInfo) }}">Shareholder</a>
  </div>
 