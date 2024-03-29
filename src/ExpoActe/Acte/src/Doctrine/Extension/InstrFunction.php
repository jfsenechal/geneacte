<?php

namespace ExpoActe\Acte\Doctrine\Extension;

use  Doctrine\ORM\Query\AST\Functions\FunctionNode;
use  Doctrine\ORM\Query\Lexer;
use  Doctrine\ORM\Query\Parser;
use  Doctrine\ORM\Query\SqlWalker;

class InstrFunction extends FunctionNode
{
    public $originalString = null;

    public $subString = null;

    /**
     * @param \Doctrine\ORM\Query\Parser $parser
     */
    public function parse(Parser $parser): void
    {
        $parser->match(Lexer::T_IDENTIFIER);
        $parser->match(Lexer::T_OPEN_PARENTHESIS);
        $this->originalString = $parser->ArithmeticPrimary();
        $parser->match(Lexer::T_COMMA);
        $this->subString = $parser->ArithmeticPrimary();
        $parser->match(Lexer::T_CLOSE_PARENTHESIS);
    }

    /**
     * @param \Doctrine\ORM\Query\SqlWalker $sqlWalker
     * @return string
     */
    public function getSql(SqlWalker $sqlWalker): string
    {
        return sprintf(
            'INSTR(%s, %s)',
            $this->originalString->dispatch($sqlWalker),
            $this->subString->dispatch($sqlWalker)
        );
    }
}
