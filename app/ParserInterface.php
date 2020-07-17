<?php

namespace App;

interface ParserInterface
{
    public function __construct(string $html);
    public function getPageInfo(): PageInfo;
}