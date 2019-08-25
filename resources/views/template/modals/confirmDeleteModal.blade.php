<!-- Modal delete -->
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="tituloModalDelete" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h3 class="modal-title text-warning" id="tituloModalDelete">
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
        <a href="#" data-article-id="" onclick="deleteArticle(this);" id="delete-article-link" class="btn btn-success">Sim</a>
      </div>
    </div>
  </div>
</div>