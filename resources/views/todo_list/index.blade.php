@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach(range(1,8) as $i)
                <div class="col-12 col-md-6 col-lg-4 mb-3">
                    <div class="card">
                        <div class="card-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias beatae
                            dignissimos distinctio dolore ducimus eius eos ex ipsam magni molestias natus officiis quibusdam
                            quis quos rem saepe tempora, tenetur veritatis?
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
