@extends('layouts.app')

@section('template_title')
    Animales
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Animales') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('animales.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nuevo Animal') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
									<th >Nombre</th>
									<th >Tipo</th>
									<th >Lugar</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($animales as $animale)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $animale->nombre }}</td>
										<td >{{ $animale->tipo }}</td>
										<td >{{ $animale->lugar }}</td>

                                            <td>
                                                <form action="{{ route('animales.destroy', $animale->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('animales.show', $animale->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('animales.edit', $animale->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Está seguro de eliminar el registro?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $animales->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
