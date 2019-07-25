<?php

namespace Whise\Response;

class AltListResponseBuffer extends ListResponseBuffer
{
    protected function bufferPage(int $page)
    {
        if ($this->request->page === $page) return;
        $this->request->page = $page;
        
        $response = $this->apiAdapter->request($this->request);
        $this->bufferResponse($response);

        // Correct erroneous rowCounts returned from Whise
        if (!empty($this->buffer)) $this->rowCount = max($this->rowCount, $page * $this->request->rowsPerPage + count($this->buffer));
    }
}
