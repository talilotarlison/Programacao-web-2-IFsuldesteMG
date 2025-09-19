# Curso de Lógica de Programação em PHP - Técnico em Desenvolvimento de Sistemas

Este repositório contém os materiais e exercícios do curso de Lógica de Programação em PHP, voltado para o curso Técnico em Desenvolvimento de Sistemas. O foco do curso é ensinar os fundamentos da lógica de programação utilizando PHP, abordando desde estruturas básicas até técnicas mais avançadas para a resolução de problemas.

## Objetivos

- Compreender os conceitos fundamentais da lógica de programação.
- Desenvolver habilidades para implementar algoritmos e estruturas de dados.
- Aplicar os conhecimentos de lógica em PHP para desenvolver soluções práticas.
- Preparar os alunos para desafios técnicos na área de Desenvolvimento de Sistemas.

## Pré-requisitos

Para acompanhar o curso, é necessário ter:
- Conhecimento básico de informática.
- Conhecimento básico de lógica matemática (não é obrigatório, mas é recomendado).
- Instalação do PHP e um servidor local (como XAMPP ou WAMP).

## Estrutura do Curso

O curso é dividido em várias seções, com uma abordagem progressiva. As principais estruturas de lógica abordadas incluem:

- **Algoritmos e Fluxogramas**: Definição, análise e construção de algoritmos.
- **Estruturas de Controle**:
  - Condicionais: `if`, `else`, `switch`.
  - Laços de repetição: `for`, `while`, `foreach`.
- **Funções**: Definição e utilização de funções.
- **Estruturas de Dados**:
  - Arrays e Matrizes.
  - Manipulação de strings.
- **Manipulação de Arquivos**: Leitura e escrita de arquivos em PHP.
- **Orientação a Objetos** (Básico): Introdução ao conceito de classes e objetos.

## Como Rodar os Exercícios

1. **Clone o repositório**:
   ```bash
   git clone https://github.com/SEU-USUARIO/nome-do-repositorio.git

2. Instale o PHP:
Certifique-se de que o PHP está instalado no seu computador. Você pode baixar a versão mais recente do PHP aqui
.
3. Configure um servidor local:
Você pode utilizar o XAMPP
 ou WAMP
 para configurar um servidor Apache e MySQL local.

4. Acesse os arquivos:
Coloque os arquivos PHP dentro da pasta htdocs (no caso do XAMPP) ou a pasta equivalente de seu servidor local.

5. Execute o script PHP:
Abra seu navegador e acesse o arquivo PHP desejado através da URL:

http://localhost/nomedapasta/arquivo.php

### Contribuições

Contribuições são bem-vindas! Se você deseja melhorar o curso, adicionar novos exemplos ou corrigir erros, fique à vontade para abrir uma issue ou fazer um pull request.

### Licença

Este projeto está licenciado sob a Licença MIT - veja o arquivo LICENSE
 para mais detalhes.


## Uso de HTML, CSS e Javascript

### Para Garantir o Preenchimento Automático Correto do Navegador

Para garantir que o navegador preencha corretamente um campo de formulário que já tenha um atributo `id` ou `name`, você precisa adicionar o atributo `autocomplete` ao elemento `<input>`, `<select>` ou `<textarea>`. Esse atributo fornece uma dica ao navegador sobre o tipo de dado esperado no campo, permitindo sugestões de preenchimento mais precisas.

### Como Adicionar o Atributo `autocomplete`

Você pode adicionar o atributo `autocomplete` diretamente ao elemento `<input>`, `<select>` ou `<textarea>`. O valor do atributo `autocomplete` deve corresponder ao tipo de informação esperada no campo.

### Exemplos:

#### Para um Campo de Nome:

```html
<input type="text" id="firstName" name="firstName" autocomplete="given-name">
```

#### Para um Campo de E-mail:

```html
<input type="email" id="email" name="email" autocomplete="email">
```

#### Para um Campo de Endereço:

```html
<input type="text" id="streetAddress" name="streetAddress" autocomplete="street-address">
```

#### Para um Campo de Número de Cartão de Crédito:

```html
<input type="text" id="cardNumber" name="cardNumber" autocomplete="cc-number">
```

### Notas:

* Se você quiser **desativar o preenchimento automático** para um campo específico, use `autocomplete="off"`.
* Caso um elemento não tenha um atributo `autocomplete`, ele herdará a configuração de `autocomplete` do elemento `<form>` pai.

```

Esse é o conteúdo no formato Markdown. Você pode copiar e colar isso em seu editor Markdown para visualizar o formato corretamente. Se precisar de mais alguma coisa, só avisar!
```
Aqui está o código conforme solicitado, com o uso do atributo `autocomplete` para garantir o preenchimento automático correto dos campos:

```html
<form>
    <!-- Campo para nome -->
    <input type="text" id="firstName" name="firstName" autocomplete="given-name">

    <!-- Campo para e-mail -->
    <input type="email" id="email" name="email" autocomplete="email">

    <!-- Campo para endereço -->
    <input type="text" id="streetAddress" name="streetAddress" autocomplete="street-address">

    <!-- Campo para número do cartão de crédito -->
    <input type="text" id="cardNumber" name="cardNumber" autocomplete="cc-number">
</form>
```

### Apostila HTML Alura:

`https://www.alura.com.br/apostila-html-css-javascript/03CA-a-spec-html`

`https://ricardo-reis.medium.com/servidor-php-no-macos-33dc078b4080#`

### Middleware em PHP
#### Para transformar esse trecho de código PHP em um middleware para proteger rotas (e redirecionar se o usuário não estiver autenticado), você pode criar uma função reutilizável que será incluída nas páginas que precisam de proteção — como se fosse um middleware simples em frameworks como Laravel ou Express.js.

| Nome da função/método       | Significado                                                  | Claro e direto? |
| --------------------------- | ------------------------------------------------------------ | --------------- |
| `checkGuest()`              | Verifica se é um visitante (não logado)                      | ✅ Sim           |
| `isGuest()`                 | Retorna `true` se **não autenticado**                        | ✅ Sim           |
| `checkUnauthenticated()`    | Verifica se não está autenticado                             | ✅ Sim           |
| `redirectIfAuthenticated()` | Redireciona se já estiver logado (usado em rotas como login) | ✅ Sim           |
| `onlyGuest()`               | Garante que só visitantes acessem                            | ✅ Sim           |


```php
<?php

class Middleware
{
    public static function proteger(string $rotaRedirecionamento = '/login')
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['usuario'])) {
            header("Location: $rotaRedirecionamento");
            exit;
        }
    }
}

```
