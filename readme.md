
## Crawler Laravel

O CrawlerLaravel é um projeto criado a partir Curl com a linguagem PHP, usando o framework Laravel. Deixando assim com estrutura robusta e de fácil compreensão.

## Instalação

- git clone "https://github.com/juniormelo94/crawlerLaravel.git".
- Renomear o arquivo ".env.dev" para ".env".
- Abrir o terminal e percorer até a pasta do projeto, depois digite o comando "composer install".
- Criar um novo banco de dados com o nome "bloguplexis".
- Digite o comando "php artisan migrate" para criar as tabelas necessárias para o nosso projeto.

## Como Utilizar

- Acesse o projeto com o caminho "http://localhost/crawlerLaravel/public/" ou digite o comando "php artisan serve" e acesse o caminho "http://localhost:8000".
- Crie um usuário "admin", e-mail "admin@admin.com" e senha  "admin".
- Faça uma busca no campo de pesquisa do projeto, que ira até o site "https://uplexis.com.br/blog/" e pegará todos os temas relacionado ao assunto digitado e salvará no no banco de dados.
- Para ver os artigos salvos clique no botão visualizar, que redirecionara a tela para uma tabela que ira listar todos, podendo também filtrar esses dados com o campo pesquisar.
- Caso deseje deletar alguma artigo, basta clicar no icone "lixeira" correspondente a linha da tabela ao qual será apagada e confirme a ação, para que o ajax se encarregue da tarefa.
- Se necessitar voltar a página de captura, basta clicar no botão "Buscar" e mais uma vez a tela será redirecionada para lá.
- Para deslogar vá até a barra menu do projeto e click no icone "Usuário", e efetuando no campo "Logout".

## Browsers Tests

- Para fazermos os testes será necessário digitar o comando "php artisan serve", se não  houver usado o comando antes. Lembrando que esse comando precisará de um terminal a parte.
- Antes de começarmos fazer os testes, é necessário que você esteja deslogado no nosso projeto, pois uma das funções de nossos testes é tentar fazer o login, ao qual dará erro se o usuário já estiver logado.   
- Digite também o comando "php artisan dusk:install" e agora efetuaremos os testes digitando o comando "php artisan dusk". Se obtivermos um "OK", os nossos testes foram realizados com sucesso.


