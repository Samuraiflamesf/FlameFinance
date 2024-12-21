<h1 align="center"> FlameFinance </h1>
<p align="center">
	<img src="https://img.shields.io/badge/version project-1.0-brightgreen" alt="version project">
    <img src="https://img.shields.io/badge/Php-8.1-informational" alt="stack php">
    <img src="https://img.shields.io/badge/Laravel-10.46-informational&color=brightgreen" alt="stack laravel">
    <img src="https://img.shields.io/badge/Filament-3.2-informational" alt="stack Filament">
    <img src="https://img.shields.io/badge/TailwindCss-3.1-informational" alt="stack Tailwind">
	<a href="https://opensource.org/licenses/GPL-3.0">
		<img src="https://img.shields.io/badge/license-MIT-blue.svg" alt="GPLv3 License">
	</a>
</p>

**FlameFinance** é um aplicativo intuitivo e poderoso para o gerenciamento de finanças pessoais, projetado para ajudá-lo a controlar suas finanças de forma eficaz e simplificada. Ele foi desenvolvido em **PHP** (utilizando o **Laravel Framework**) e o **Filament v3**.

## **Funcionalidades**
- Multi conta  
- Multi moeda  
- Carteiras  
- Categorias  
- Orçamentos  
- Metas  
- Dívidas  
- Transações  
- Relatórios  

## **Instalação**
1. Clone o repositório:  
   ```bash
   git clone <url-do-repositorio>
   ```

2. Execute o comando:  
   ```bash
   composer install
   ```

3. Copie e configure o arquivo **`.env`**:  
   ```bash
   cp .env.example .env
   ```

4. Gere a chave da aplicação:  
   ```bash
   php artisan key:generate
   ```

5. Execute as migrações do banco de dados com os seeders (certifique-se de configurar a conexão com o banco no arquivo **`.env`** antes de migrar):  
   ```bash
   php artisan migrate --seed
   ```

6. Inicie a aplicação:  
   ```bash
   php artisan serve
   ```

7. Acesse a aplicação no navegador:  
   > URL: [http://localhost:8000/](http://localhost:8000/)

8. Faça login utilizando as seguintes credenciais:  
   - **E-mail**: `admin@admin.com`  
   - **Senha**: `12345678`  


### :sparkles: Contribuidores
<table>
  <tr>
    <td align="center"><a href="https://github.com/Shipu">
        <img style="border-radius: 50%;" src="https://avatars.githubusercontent.com/u/4118421?v=4" width="100px;" alt=""/>
    <br /><sub><b>Shipu Ahamed</b></sub></a></td>    
    <td align="center"><a href="https://github.com/shojibflamon">
        <img style="border-radius: 50%;" src="https://avatars.githubusercontent.com/u/5617542?v=4" width="100px;" alt=""/>
    <br /><sub><b>Md. Jahidul Islam</b></sub></a></td>   
    <td align="center"><a href="https://github.com/devalade">
        <img style="border-radius: 50%;" src="https://avatars.githubusercontent.com/u/74435372?v=4" width="100px;" alt=""/>
    <br /><sub><b>Alade YESSOUFOU</b></sub></a></td>    
    <td align="center"><a href="https://github.com/RafaelBlum">
        <img style="border-radius: 50%;" src="https://avatars.githubusercontent.com/u/41844692?v=4" width="100px;" alt=""/>
    <br /><sub><b>Rafael Blum</b></sub></a></td> 
  </tr>
</table>

> Ninguém é tão sábio que não tenha algo a aprender, nem tão tolo que não tenha algo a ensinar. `Blaise Pascal`.
