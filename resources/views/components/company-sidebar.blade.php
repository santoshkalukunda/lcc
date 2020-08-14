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
                    <a class="list-group-item list-group-item-action" id="list-Shareholder-list" data-toggle="list"
                        href="#list-Shareholder" role="tab" aria-controls="Shareholder">Shareholder</a>
                    <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list"
                        href="#list-settings" role="tab" aria-controls="settings">Settings</a>
                </div>
            </div>
           
        </div>

    @endisset
</div>
