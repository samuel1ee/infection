<?php

declare(strict_types=1);


namespace Infection\Mutator\ReturnValue;

use Infection\Mutator\Mutator;
use PhpParser\Node;

class This implements Mutator
{
    public function mutate(Node $node)
    {
        return new Node\Stmt\Return_(
            new Node\Expr\ConstFetch(new Node\Name('null'))
        );
    }

    public function shouldMutate(Node $node): bool
    {
        return $node instanceof Node\Stmt\Return_ &&
            $node->expr instanceof Node\Expr\Variable &&
            $node->expr->name === 'this';
    }
}