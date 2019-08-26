@extends('template.template')

@section('content')
	<!-- Begin Page Content -->
	<div class="container-fluid margin-top">
		<!-- DataTales Example -->
		<div class="card shadow mb-4">
		  <div class="card-header py-3">
		    <h3 class="m-0 font-weight-bold text-primary float-left  mt-1">ARTIGOS</h3>
		    <a href='{{ route("/") }}' class="btn btn-primary float-right">
               <i class="fas fa-search fa-fw"></i>
               Buscar
            </a>
		  </div>
		  <div class="card-body">
		    <div class="table-responsive">
		      <table class="table table-bordered" id="listArticlesDataTable" width="100%" cellspacing="0">
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
	                <tr id="article-{{$article->id}}">
	                  <td>{{$article->titulo}}</td>
	                  <td>
		                  <a href="{{$article->link}}" target="_blank">
		                  	{{$article->link}}
		                  </a>
	                  </td>
		              <td class="text-center">
	                    <a href="#" class="delete-article" id="{{$article->id}}" data-toggle="modal" data-target="#modalDelete">
	                      <i class="fas fa-trash fa-fw"></i>
	                    </a>
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

	@extends('template.modals.confirmDeleteModal')
	@extends('template.modals.infoModal')
@endsection