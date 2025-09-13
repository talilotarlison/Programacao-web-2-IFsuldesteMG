
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
