<div class="text">
    <h2>CLASSES</h2>
    <h3>class Lexical</h3>
    <div class="programminblock">
        //Iniciação <br>
        $lex = new Lexical(string $string); <br>
        $lex->validate(); <br>
        Retorno:  <br>
        [ <br>
            'sucess' => Automato::validate($this->chars, $Lexical) // Valida através do automato, <br>
            'tokens' =>  Automato::parseTokens($this->chars, $Lexical)['tokenList'] // TokenList da análise do automato, <br>
            'erros' =>  Automato::parseTokens($this->chars, $Lexical)['errorsList'] // Erros da análise do do automato, <br>
        ] <br>
    </div>
    <h3>class Automato</h3>
    <div class="programminblock">
        //Iniciação <br>
        Automato::validate(chars $chars, array $tabelaLexica) <br>
        Retorno: bool, variando se a string é válida. <br>
        Automato::parseTokens($this->chars, $Lexical) <br>
        Retorno: [
            'tokens'=> Tokens da análise léxica,
            'erros'=> Erros da análise léxica
        ]
    </div>
    <h3>class Token</h3>
    <div class="programminblock">
        //Iniciação <br>
        $tok = new Token(string $name, string $lexeme, int $inicio, int $fim); <br>
        $tok->getName() : string; <br>
        $tok->setName(string $name); <br>
        $tok->getLexeme() : string; <br>
        $tok->setLexeme(string $lexeme); <br>
        $tok->getInicio() : int; <br>
        $tok->setInicio(int $inicio); <br>
        $tok->setFim(int $fim); <br>
        $tok->getFim() : int; <br>
    </div>
    <h2>ROTAS</h2>
    <h3 class="pd0">POST</h3>
    <h3>domain/validate/</h3>
    <div class="programminblock">
        curl --location 'http://localhost:8181/validate/' \ <br>
        --form 'string="se"'
    </div>
    <p>Assim obtemos o retorno: </p>
    <div class="programminblock">
        {"resp":{<br>
            "tokens":[
                <br>"O:5:<br>
                    \"Token\"<br>:
                    4:<br>
                    {s:11:\"\u0000Token\u0000name\";<br>s:2:\"IF\";<br>s:13:\"\u0000Token\u0000lexeme\";<br>s:2:\"se\";<br>s:13:\"\u0000Token\u0000inicio\";<br>i:1;<br>s:11:\"\u0000Token\u0000line\";<br>i:1;<br>
                    }"<br>
                    ],<br>
                    "errors":<br>[]<br>}<br>}    
    </div>
</div>