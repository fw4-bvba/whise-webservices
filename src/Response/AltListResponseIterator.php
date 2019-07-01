<?php

namespace Whise\Response;

class AltListResponseIterator extends ListResponseIterator
{
    public function valid(): bool
    {
        if ($this->position < 0) return false;
        if ($this->position === $this->response->count() && $this->response->count() === ($this->response->getPage() + 1) * $this->response->getRowsPerPage()) {
            $this->response->get($this->position);
        }
        return $this->position < $this->response->count();
    }
}
