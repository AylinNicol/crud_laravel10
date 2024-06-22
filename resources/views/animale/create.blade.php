@extends('layouts.app')

@section('template_title')
    {{ __('Crear') }} Animal
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Crear') }} Animal</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('animales.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('animales.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('animale.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
