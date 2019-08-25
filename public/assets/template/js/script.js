$(".delete-article").click(function(){
	console.log("O id é:",this.id);
	$("#delete-article-link").attr("data-article-id", this.id);
});

// $(document).ready(function() {
    var listArticlesTable = $('#listArticlesDataTable').DataTable( {
        "language": {
            "lengthMenu": "Artigos encontrados",
            "zeroRecords": "Desculpe, não achei nada",
            "info": "Página _PAGE_ de _PAGES_",
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
// });

function deleteArticle(element){
	var id = $(element).attr('data-article-id');
	
	$.ajax({
	    url: "delete/"+id,
	    type: "get",
	    contentType: "application/json; charset=utf-8",
		dataType: "json",
	    success: function (response) {
	    	console.log(response);
	    	$('#modalDelete').modal('hide');
	    	$("#modalInfoMessage").text(response.message);
	    	$('#modalInfo').modal('show');
	    	$('#article-'+id).remove();
	    	listArticlesTable.reload();
	    },
	    error: function(jqXHR, textStatus, errorThrown) {
	       console.log(textStatus, errorThrown);
	    }
	});
}