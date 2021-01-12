Teste de seleção para a empresa UpLexis



<h1>Sobre</h1>
<li>A aplicação que realiza uma requisição via CURL com PHP ao site Quest MultiMarcas (https://www.questmultimarcas.com.br/estoque) e captura os dados dos veículos retornados na busca utilizando REGEX.</li>


<h1>Requisitos</h1>
<li>PHP 7.2+</li>
<li>Laravel 8+</li>
<li>MSYQL 5.7+</li>
<li>Composer</li>


<h1>Orientações</h1>
<li>Utilizar "composer install" para que seja instalado todas as dependências do Projeto.</li>
<li>Para fazer as configurações você precisa fazendo uma cópia do .env-exemple renomea-lo para .env caso não seja gerado automaticamente, trocar as informações dos seguintes trecho de código para acessar a base de dados:
<p>
<li>DB_CONNECTION=mysql</li>
<li>DB_HOST=127.0.0.1</li>
<li>DB_PORT=3306</li>
<li>DB_DATABASE=</li>
<li>DB_USERNAME=</li>
<li>DB_PASSWORD=</li>
</p>
</li>
<li>Após instalar as dependências utilize "npm install" para que sejam instaladas todas as dependências do Webpack. Em seguida utilize "npm run dev" para executar o Webpack.</li>
<li>Por fim, execute o camando "php artisan migrate --seed" no terminal para que todas as tabelas sejam criadas e preenchidas.</li>

