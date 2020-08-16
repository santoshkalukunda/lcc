<div class="card border-info" style="max-width: 18rem;">
    @isset($companyInfo)
        <div class="card-header text-info">{{ $companyInfo->name }}</div>
        <div class="card-body text-info">
            <p class="card-text">Contact: {{ $companyInfo->contact_no }}</p>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action" id="list-about-list" 
                        href="{{ route('company.show', $companyInfo) }}" role="tab" aria-controls="about">About</a>
                    <a class="list-group-item list-group-item-action" id="list-documenet-list" 
                        href="{{ route('document.show', $companyInfo) }}" role="tab" aria-controls="documenet">Document</a>
                    <a class="list-group-item list-group-item-action" id="list-Shareholder-list" 
                        href="{{ route('shareholder.show', $companyInfo) }}" role="tab" >Shareholder</a>
                  
                <hr>
                        <a class="alert alert-danger mt-5" 
                        href="#" > <form method="post" action="{{ route('company.destroy', $companyInfo) }}">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-md" type="submit"
                                onclick="return confirm('Are you sure to delete?')"><i
                                    class="fa fa-trash" data-toggle="tooltip" data-placement="bottom"
                                    title="Delete"> Company Delete </i></button>

                        </form></a>
                   
                </div>
            </div>
           
        </div>

    @endisset
</div>
