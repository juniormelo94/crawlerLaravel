@extends('template.template')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid margin-top">

        <div class="card shadow mb-2">
          <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary float-left  mt-1">PESQUISA</h4>
            <a href="{{route('articles')}}" class="btn btn-primary float-right">
               <i class="fas fa-eye fa-fw"></i>
                Visualizar
            </a>
          </div>
          <div class="card-body">
            {!! Form::open(['route' => 'search', 'class' => ' mr-auto w-100 navbar-search']) !!}
              @csrf
              <div class="input-group">
                {!! Form::text('search', null, ['placeholder' => 'Pesquisa no blog', 'class' => 'form-control bg-light border-2 small', "required" ]) !!}
                <div class="input-group-append">
                  {!! Form::submit('Capturar', ['class' => 'btn btn-info']) !!}
                </div>
              </div>
            {!! Form::close() !!}
          </div>
        </div>
        @if(!empty($message))
          <div class="alert alert-info" role="alert">
            {{$message}}
          </div>
        @endif
    </div>
    <!-- /.container-fluid -->

@endsection

