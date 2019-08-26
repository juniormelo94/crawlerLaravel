
## Crawler Laravel

O CrawlerLaravel é um projeto criado a partir Curl com a linguagem PHP, usando o framework Laravel. Deixando assim com estrutura robusta e de fácil compreensão.

## Installation

- git clone "https://github.com/juniormelo94/crawlerLaravel.git".
- Renomear o arquivo ".env.dev" para ".env".
- Abrir o terminal e percorer até a pasta do projeto, depois digitará o comando "composer install".
- Criar um novo banco de dados com o nome "bloguplexis".
- Digite o comando "php artisan migrate" para criar as tabelas necesarias para o nosso projeto.

## Learning Laravel

- Acesse o projeto com o caminho "http://localhost/crawlerLaravel/public/" ou digite o comando "php artisan serve" e acesse o caminho "http://127.0.0.1:8000".
- Crie um usuário "admin", e-mail "admin@admin.com" e senha  "admin".
- Faça uma busca no campo de pesquisa do projeto, que ira até o site "https://uplexis.com.br/blog/" e pegará todos os temas relacionado ao assunto digitado e salvará no no banco de dados.
- Para ver esses artigos salvos clique no botão visualizar, que redirecionara a tela para uma tabela que listara todos, podendo também filtrar esses dados com o campo pesquisar.
- Caso deseje excluir alguma artigo, basta clicar no icone "lixeira" correspondente a linha da tabela ao qual será apaga e confimar a ação.
- Se necessitar voltar a página de captura, basta clicar no botão "Buscar" e mais uma vez a tela será redirecionada para lá.
- Para deslogar vá até a barra menu do projeto e click no icon "Usuário" efetuando no campo "Logout".

## Browsers Tests

- Para fazermos os testes será necessario digitar o comando "php artisan serve", se não  houver rodado antes. Lembrando que esse comando precisará de terminal a parte.
- Rodar também o comando "php artisan dusk:install" e depois efetuarmos os digite o comando "php artisan dusk".


