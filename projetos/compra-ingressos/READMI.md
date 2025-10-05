Claro! Aqui está o conteúdo transformado em **Markdown (MD)**, com a formatação adequada para facilitar a leitura e visualização em plataformas que suportam Markdown:

---

# 📌 Usando `dataset` em JavaScript para acessar atributos `data-*`

Você pode acessar o valor de um atributo personalizado como `data-preco-total-id` usando a propriedade `dataset` em JavaScript. O JavaScript converte automaticamente nomes de atributos com hífens (como `data-preco-total-id`) para o formato **camelCase** (ou seja, `dataset.precoTotalId`).

---

## 🧱 Exemplo em HTML

```html
<div id="carrinho" data-preco-total-id="24,90">
  Preço Total: 24,90
</div>
```

---

## 💻 Código JavaScript

Para obter o valor do atributo `data-preco-total-id`:

1. Selecione o elemento com `document.querySelector` ou `document.getElementById`.
2. Acesse o valor usando a propriedade `dataset` e o nome do atributo em camelCase.

```javascript
// 1. Seleciona o elemento pelo seu ID
const carrinho = document.getElementById('carrinho');

// 2. Acessa o valor do atributo 'data-preco-total-id'
//    A propriedade em JavaScript será 'dataset.precoTotalId'
const precoTotal = carrinho.dataset.precoTotalId;

console.log(precoTotal); // Saída: "24,90"
```

⚠️ **Use o código com cuidado.**

---

## 📝 Observações importantes

### 1. Formato do valor

O valor obtido via `dataset` **sempre será uma string**, por exemplo: `"24,90"`.

### 2. Conversão para número

Se você precisar fazer cálculos, será necessário converter a string para um número de ponto flutuante com `parseFloat()`.

### 3. Separador decimal

Em JavaScript, números de ponto flutuante usam **ponto (`.`)** como separador decimal. Portanto, é necessário substituir a vírgula:

```javascript
const precoTotal = carrinho.dataset.precoTotalId;
const precoNumero = parseFloat(precoTotal.replace(',', '.'));

console.log(precoNumero); // Saída: 24.90
```

---


# ✅ Requisitos do Sistema

## 📥 Entradas de Dados

* **Quantidade de ingressos inteiros**

  * ➡️ Calcular **valor total**
  * ➡️ Selecionar forma de pagamento:

    * **À vista**
    * **Parcelado (4x)**

* **Quantidade de ingressos meia**

  * ➡️ Valor é **metade do ingresso cheio**
  * ➡️ Selecionar forma de pagamento:

    * **À vista**
    * **Parcelado (4x)**

* **Tipo de ingresso**

  * `Meia` → Valor com 50% de desconto
  * `Inteira` → Valor cheio (sem desconto)

---

## 💳 Formas de Pagamento

* **À vista**:

  * Aplica **desconto de 8%** sobre o total da compra
* **Parcelado (4x)**:

  * **Sem desconto**
  * Divide o valor total igualmente em 4 parcelas

---

## 🧾 Saída

* Exibir **dados de todas as compras**, incluindo:

  * Quantidade de ingressos
  * Tipo (meia ou inteira)
  * Forma de pagamento (à vista ou parcelado)
  * Valor total final
  * Parcelas (se aplicável)

---

# Documentação para Projeto

- [Como criar tags HTML personalizadas (Custom Elements) - DIO](https://www.dio.me/articles/como-criar-tags-html-personalizadas-custom-elements)
- [Convertendo string para número em JavaScript - Alura](https://www.alura.com.br/artigos/convertendo-string-para-numero-em-javascript)
- [Dúvida: como funciona a criação do data-id no elemento? - Fórum Alura](https://cursos.alura.com.br/forum/topico-duvida-como-funciona-a-criacao-do-data-id-no-elemento-255368)
