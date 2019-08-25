@extends('template.template2')

@section('content')

	<!-- Begin Page Content -->
	<div class="container-fluid margin-top">

		<!-- DataTales Example -->
		<div class="card shadow mb-4">
		  <div class="card-header py-3">
		    <h3 class="m-0 font-weight-bold text-primary float-left  mt-1">ARTIGOS</h3>
		    <a href='{{ route("index") }}' class="btn btn-primary float-right">
               <i class="fas fa-angle-left fa-fw"></i>
                Voltar
            </a>
		  </div>
		  <div class="card-body">
		    <div class="table-responsive">
		      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		        <thead>
		          <tr class="text-center">
		            <th>TITULO:</th>
		            <th>LINK:</th>
		            <th>AÇÕES:</th>
		          </tr>
		        </thead>
		        <tfoot>
		          <tr class="text-center">
		            <th>TITULO:</th>
		            <th>LINK:</th>
		            <th>AÇÕES:</th>
		          </tr>
		        </tfoot>
		        <tbody>
				@foreach($dataArticles as $article)
	                <tr>
	                  <td>{{$article->titulo}}</td>
	                  <td>{{$article->link}}</td>
		              <td class="text-center">
	                    <a href='' data-toggle="modal" data-target="#modalExcluir">
	                      <i class="fas fa-trash fa-fw"></i>
	                    </a>
<!-- 				        {!! Form::open(['route' => ['excluir', $article->id], 'method' => 'post' ]) !!}
		                  @method('delete')
		                  @csrf

		                  {{ method_field('post') }}

		                  <a href='' type="submit" class="btn btn-primary">
		                    <i class="fas fa-trash fa-fw"></i>
		                  </a>
		                  {{ Form::button('<i class="fas fa-trash fa-fw"></i>', ['type' => 'submit'] )  }}
		                {!! Form::close() !!} -->
	                  </td>
		            </tr>
                @endforeach()
		        </tbody>
		      </table>
		    </div>
		  </div>
		</div>

	</div>
	<!-- /.container-fluid -->

	<!-- Modal excluir -->
	<div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="tituloModalExcluir" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content ">
	      <div class="modal-header">
	        <h3 class="modal-title text-warning" id="tituloModalExcluir">
	      	  <i class="fa fa-exclamation-triangle fa-fw"></i>
	          Alerta!
	    	</h3>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        Deseja realmente excluir esse artigo.
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
	        <button type="submit" class="btn btn-success">Sim</button>
	      </div>
	    </div>
	  </div>
	</div>

@endsection