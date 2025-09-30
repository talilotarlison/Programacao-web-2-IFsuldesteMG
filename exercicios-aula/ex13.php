<?php
    class MyClass {
        // Definindo uma constante dentro de uma classe
        const CONSTANTE_CLASSE = 'Valor da constante de classe';

        public function mostrarConstante() {
            echo self::CONSTANTE_CLASSE;
        }
    }

    // Criando uma instância da classe e exibindo a constante
    $objeto = new MyClass();
    $objeto->mostrarConstante();
?>
