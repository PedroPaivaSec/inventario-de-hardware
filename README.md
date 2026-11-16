# Inventário de Hardware

Plataforma privada para técnicos de suporte em hardware registrarem e acompanharem os serviços que estão fazendo, com o objetivo de organizar o trabalho do dia a dia em um só lugar.

Projeto final da disciplina de desenvolvimento web (curso de Gestão da Tecnologia da Informação, IF Sudeste MG), em que cada aluno cria um site do próprio interesse e monta o backend dele.

## Status do projeto

Em desenvolvimento. O backend em PHP com MySQL já cobre toda a parte de autenticação: login com sessão, proteção das páginas internas e logout. O painel ainda exibe dados fictícios escritos direto no HTML, apenas para mostrar como o site fica com serviços concluídos.

## Como o sistema funciona

- **Acesso:** um único usuário administrador. Não há tela de cadastro, porque a plataforma é de uso individual inicialmente.
- **Login:** única porta de entrada do sistema. O usuário e a senha são conferidos no MySQL, e as mensagens de erro aparecem na própria tela de login.
- **Proteção das páginas:** quem não está autenticado é redirecionado para o login ao tentar abrir qualquer página interna.
- **Logout:** o botão **Sair**, na barra lateral, encerra a sessão e volta para o login.
- **Adicionar equipamento:** o técnico registra o cliente, o equipamento e o problema relatado.
- **Equipamentos:** lista de todos os serviços em um só lugar, com o status de cada um.
- **Início:** painel que lista os serviços prontos.

## Páginas

|Página|Arquivo|Acesso|Função|
|---|---|---|---|
|Login|`login.php`|Público|Acesso do administrador|
|Início|`index.php`|Restrito|Painel de listagem de itens concluídos|
|Equipamentos|`equipamentos.php`|Restrito|Lista dos aparelhos em atendimento|
|Adicionar equipamento|`adicionar_equipamento.php`|Restrito|Formulário de cadastro de um novo aparelho|

## Estrutura de pastas

```
inventario_hardware/
├── index.php
├── equipamentos.php
├── adicionar_equipamento.php
├── login.php
├── css/
│   ├── style.css
│   └── variaveis.css
├── database/
│   └── schema.sql
├── img/
├── php/
│   ├── block.php
│   ├── connect.php
│   ├── loginBack.php
│   ├── logout.php
│   ├── query.php
│   ├── requires.php
|   └── novo_equip.php
├── itens_temporarios/
│   └── hash_generator.php
└── README.md
```

- `css/variaveis.css` concentra as cores, o raio das bordas e o espaçamento padrão do tema escuro.
- `css/style.css` contém os estilos globais, a barra lateral e os cartões de equipamento.
- `database/schema.sql` cria o banco `inventariohardware`, as tabelas e o usuário de teste.
- `img/` guarda imagens ilustrativas usadas nos exemplos.
- `php/connect.php` faz a conexão com o MySQL usando PDO.
- `php/requires.php` inicia a sessão, define a URL base e carrega os demais arquivos de apoio.
- `php/block.php` reúne as funções de bloqueio: página restrita a usuários logados, aceitação apenas de requisições POST e validação de campos vazios.
- `php/query.php` guarda as consultas ao banco, separadas da lógica de cada página.
- `php/loginBack.php` processa o formulário de login.
- `php/logout.php` encerra a sessão do usuário.
- `php/novo_equip.php` cadastra um novo equipamento no banco de dados.
- `itens_temporarios/hash_generator.php` gera o hash da senha do usuário de teste.

## Banco de dados

Duas tabelas:

- **`usuarios`**: `id`, `usuario` (único) e `senha_hash`.
- **`equipamentos`**: `id`, `cliente`, `imagem`, `equipamento`, `problema`, `status` e `data_entrada`. O status aceita os valores `Recebido`, `Em conserto`, `Pronto` e `Entregue`, e o padrão é `Recebido`.

## Segurança

- Consultas preparadas com PDO, sem concatenar dados do usuário no SQL.
- Senhas armazenadas com `password_hash` e conferidas com `password_verify`.
- Comparação de usuário sensível a maiúsculas e minúsculas (`BINARY`).
- `session_regenerate_id` após o login, para evitar fixação de sessão.
- Mensagens de erro do login escapadas com `htmlspecialchars` e sem revelar se o usuário ou a senha foi o campo errado.
- Logout e processamento do login aceitam apenas o método POST.
- Credenciais do banco fora do versionamento (`.env` no `.gitignore`).

## Tecnologias

- **Backend:** PHP, MySQL, PDO e sessões.
- **Frontend:** HTML5 e CSS3 (flexbox, grid e variáveis CSS).
- **Planejado:** stored procedure para o resumo do painel.

## Como executar

Requisitos: PHP 8 ou superior com a extensão `pdo_mysql` e um servidor MySQL.

1. Clone o repositório e entre na pasta do projeto.
2. Crie o banco e as tabelas:

```bash
mysql -u root -p < database/schema.sql
```

3. Confira em `php/connect.php` o host, o usuário e a senha da conexão e ajuste para o seu ambiente.
4. Suba o servidor embutido do PHP dentro da pasta do projeto:

```bash
php -S localhost:8000
```

5. Acesse `http://localhost:8000/login.php`.

O `schema.sql` cria o usuário `Teste`. A senha dele é a que está definida em `itens_temporarios/hash_generator.php`.

## Roadmap

- [x] Layout das quatro páginas
- [x] Tema escuro com variáveis CSS
- [x] Script SQL com as tabelas `usuarios` e `equipamentos`
- [x] Conexão com o MySQL usando PDO
- [x] Login com sessão
- [x] Proteção das páginas para usuários não autenticados
- [x] Sistema de logout
- [x] Cadastro de equipamento gravando no banco
- [x] Listagem de equipamentos vinda do banco
- [ ] Atualização do status de um equipamento
- [ ] Painel inicial com contagem por status (stored procedure)
- [ ] Configuração de cookies da sessão

## Autor

Pedro Otávio, estudante de Gestão da Tecnologia da Informação no IF Sudeste MG, campus São João del-Rei.