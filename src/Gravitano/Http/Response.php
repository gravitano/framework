<?php namespace Gravitano\Http;

use Gravitano\Contracts\RenderableInterface;

class Response {

    protected $contents;

    /**
     * @var int
     */
    protected $code;

    /**
     * @var array
     */
    protected  $headers;

    public function __construct($contents = null, $code = 200, array $headers = [])
    {
        $this->contents = $contents;
        $this->code = $code;
        $this->headers = $headers;
    }

    /**
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param int $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return null
     */
    public function getContents()
    {
        return $this->contents;
    }

    /**
     * @param null $contents
     */
    public function setContents($contents)
    {
        $this->contents = $contents;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param array $headers
     */
    public function setHeaders($headers)
    {
        $this->headers = $headers;
    }

    public function getResponse()
    {
        $contents = $this->contents;

        if(is_array($contents))
        {
            $this->headers['Content-Type'] = 'Application\json';

            $contents = json_encode($contents);
        }

        if($contents instanceof RenderableInterface)
        {
            $contents = $contents->render();
        }

        foreach($this->getHeaders() as $key => $value)
        {
            header("{$key}: {$value}", null, $this->getCode());
        }

        return $contents;
    }

    public function __toString()
    {
        return $this->getResponse();
    }


}
