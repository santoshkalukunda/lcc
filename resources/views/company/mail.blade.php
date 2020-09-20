@extends('dashboard')
@section('title')
    Send Mail
@endsection
@section('content')
    <x-company-sidebar :id="$company_id->id"></x-company-sidebar>
    <script src="https://cdn.ckeditor.com/ckeditor5/22.0.0/classic/ckeditor.js"></script>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if (Session::has('success'))
                    <div class="bg-success text-white p-2">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">Send Mail</div>
                    <div class="card-body">
                        <form action="{{ route('companyshareholder.mail', $company_id->id) }}" method="post">
                            @csrf
                            <div class="row form-group">
                                <div class="col-md-1"><label for="subject">Subject</label></div>
                                <div class="col-md-7"><input type="text" name="subject" class="form-control"
                                        placeholder="Email Subject" required autofocus></div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-1"><label for="message">Message</label></div>
                                <div class="col-md-7">
                                <textarea name="message" id="editor" class="form-control"></textarea>
                                </div>
                                    <script>
                                        ClassicEditor
                                            .create(document.querySelector('#editor'), )
                                            .catch(error => {
                                                console.error(error);
                                            });
                                    </script>
                                 
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-1"></div>
                                <div class="col-md-2">
                                    <input type="submit" class="form-control btn-info" value="Send">
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
