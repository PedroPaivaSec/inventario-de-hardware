# Inventário de Hardware

Plataforma privada para técnicos de suporte em hardware registrarem e acompanharem os serviços que estão fazendo, com o objetivo de organizar o trabalho do dia a dia em um só lugar.

Projeto final da disciplina de desenvolvimento web (curso de Gestão da Tecnologia da Informação, IF Sudeste MG), em que cada aluno cria um site do próprio interesse e monta o backend dele.

## Status do projeto

Em desenvolvimento. Hoje o repositório contém apenas o **front-end estático** (HTML e CSS). As telas existem, mas ainda não há backend, banco de dados nem login funcionando.

Os equipamentos que aparecem nas telas são dados fictícios, escritos direto no HTML, apenas para mostrar como o site vai ficar com serviços cadastrados.

## Como o sistema vai funcionar

- **Acesso:** um único usuário administrador. Não haverá tela de cadastro, porque a plataforma é de uso individual.
- **Login:** única porta de entrada do sistema.
- **Adicionar equipamento:** o técnico registra o cliente, o equipamento e o problema relatado.
- **Equipamentos:** lista de todos os serviços em um só lugar, com o status de cada um.
- **Início:** painel com o resumo geral dos serviços.

## Páginas

| Página | Arquivo | Função |
| --- | --- | --- |
| Início | `index.html` | Painel com o resumo geral |
| Equipamentos | `equipamentos.html` | Lista dos aparelhos em atendimento |
| Adicionar equipamento | `adicionar_equipamento.html` | Formulário de cadastro de um novo aparelho |
| Login | `login.html` | Acesso do administrador |

## Estrutura de pastas

```
inventario_hardware/
├── index.html
├── equipamentos.html
├── adicionar_equipamento.html
├── login.html
├── css/
│   ├── style.css
│   └── variaveis.css
├── img/
├── php/
└── layout.txt
```

- `css/variaveis.css` concentra as cores, o raio das bordas e o espaçamento padrão do tema escuro.
- `css/style.css` contém os estilos globais, a barra lateral e os cartões de equipamento.
- `img/` guarda imagens ilustrativas usadas nos exemplos.
- `php/` é reservada para os arquivos de apoio do backend (conexão com o banco, configuração).

## Tecnologias

- **Atual:** HTML5 e CSS3 (flexbox, grid e variáveis CSS).
- **Planejado:** PHP e MySQL, com PDO e consultas preparadas, autenticação com `password_hash` e sessões, e uma stored procedure para o resumo do painel.

## Como visualizar

Por enquanto basta abrir o arquivo `index.html` no navegador.

Quando o backend for adicionado, será necessário o PHP instalado. Dentro da pasta do projeto:

```bash
php -S localhost:8000
```

E acessar `http://localhost:8000`.

## Roadmap

- [x] Layout das quatro páginas
- [x] Tema escuro com variáveis CSS
- [x] Script SQL com as tabelas `usuarios` e `equipamentos`
- [x] Conexão com o MySQL usando PDO
- [x] Login com sessão
- [x] Proteção das páginas para usuários não autenticados
- [ ] Sistema de logout
- [ ] Configuração de cookies
- [ ] Cadastro de equipamento gravando no banco
- [ ] Listagem de equipamentos vinda do banco
- [ ] Atualização do status de um equipamento
- [ ] Painel inicial com contagem por status (stored procedure)

## Autor

Pedro Otávio, estudante de Gestão da Tecnologia da Informação no IF Sudeste MG, campus São João del-Rei.
