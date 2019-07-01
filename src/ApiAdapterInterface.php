<?php

namespace Whise;

interface ApiAdapterInterface
{
    public function setDefaultParams(array $params);
    public function getBody(Request\Request $request): string;
}
