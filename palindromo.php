<?php
declare(strict_types=1);
function verifica_palindromo($texto_processado, $texto_original) {
    $texto_original = explode(' ', trim($texto_original));
    $palavras = explode(' ', trim($texto_processado));
    foreach (array_combine($texto_original, $palavras) as $texto_original => $palavra)
        echo message($palavra, $texto_original) . "\n";
}

function message($palavra, $texto_original) {
    if ($palavra == strrev($palavra))
        return $texto_original . ' : é palíndromo';
    return $texto_original . ' : não é palíndromo';
}

function remove_unicode($texto) {
    return ($processamento = iconv('UTF-8', 'ASCII//TRANSLIT', $texto));
}

function valida_exit() {
    while (true) {
        $option = strtolower(trim(readline('Deseja continuar? Digite S ou N: ')));
        if ($option == 's' || $option == 'n') 
            return $option == 'n';
    }
}

function execute() {
    while (true) {
        $texto_original = readline('Digite uma frase ou palavra/número: ');
        verifica_palindromo(remove_unicode($texto_original), $texto_original);
        if (valida_exit()) 
            break; 
    }    
}

if (PHP_SAPI == 'cli')
    execute();
