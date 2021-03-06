<?php

namespace Vanry\Scout\Tokenizers;

use Latrell\Scws\Scws;

class ScwsTokenizer extends Tokenizer
{
    protected $scws;

    public function __construct(array $config = [])
    {
        $this->scws = new Scws($config);
    }

    public function getTokens($text)
    {
        $this->scws->sendText($text);

        $result = $this->scws->getResult();

        return $result === false ? [] : array_column($result, 'word');
    }
}
