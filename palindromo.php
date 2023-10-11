<?php

function verifica_palindromo($texto_processado) : void {
    $processamento = str_replace(' ', '', $texto_processado);
    $processamento = preg_replace('/[?.,;?+=$%#]/ui', '',$processamento);
    echo message(strtolower($processamento));
}

function message($palavra) : string {
    if ($palavra == strrev($palavra))
        return 'é palíndromo';
    return 'não é palíndromo';
}

function remove_unicode($texto) {
    return iconv('UTF-8', 'ASCII//TRANSLIT', $texto);
}

function execute() {
    $texto_original = readline('Digite uma frase ou palavra/número: ');
    verifica_palindromo(remove_unicode($texto_original));
}

if (PHP_SAPI == 'cli')
    execute();
