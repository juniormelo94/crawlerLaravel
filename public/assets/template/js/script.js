$(".delete-article").click(function(){
	$("#delete-article-link").attr("data-article-id", this.id);
});

var listArticlesTable = $('#listArticlesDataTable').DataTable( {
    "language": {
        "lengthMenu": "Artigos encontrados",
        "zeroRecords": "Desculpe, não achei nada",
        "info": "Página PAGE de _PAGES_",
        "infoEmpty": "Nenhum registro encontrado",
        "search": "Pesquisar:",
        "infoFiltered": "",
        "paginate": {
	        "first": "Primeiro",
	        "last": "Ultimo",
	        "next": "Próximo",
	        "previous": "Anterior"
	    }
    }
} );

function deleteArticle(element){
	var id = $(element).attr('data-article-id');
	
	$.ajax({
	    url: "delete/"+id,
	    type: "get",
	    contentType: "application/json; charset=utf-8",
		dataType: "json",
	    success: function (response) {
	    	$('#modalDelete').modal('hide');
	    	$("#modalInfoMessage").text(response.message);
	    	$('#modalInfo').modal('show');

	    	listArticlesTable.row($('#article-'+id))
		        .remove()
		        .draw();
	    },
	    error: function(jqXHR, textStatus, errorThrown) {
	    	$('#modalDelete').modal('hide');
	    	$("#modalInfoMessage").text(textStatus.message);
	    	$('#modalInfo').modal('show');
	    }
	});
}