<?php

namespace Lesson_17;

class HtmlNode
{
    protected $tag;
    protected $content = null;
    protected $attributes = [];

    public function __construct($tag, $content = null,  $attributes = [])
    {
        $this->tag = $tag;
        $this->content = $content;
        $this->attributes = $attributes;
    }

    public static function __callStatic($method, array $args = [])
    {

        $content = $args[0] ?? null;

        $attributes = $args[1] ?? [];

        return new HtmlNode($method, $content, $attributes);
    }

    /**
     * @throws \Exception
     */
    public function __call($method, array $args = [])
    {
        if (!isset($args[0])) {
            throw new \Exception("Sin argumentos para el método $method");
        }

        $this->attributes[$method] = $args[0];

        return $this;
    }

    public function render(): string
    {
        $result =  "<$this->tag {$this->renderAttributes()}>";

        if ($this->content != null){
            $result .= $this->content;

            $result .= "</{$this->tag}>";
        }

        return $result;
    }

    protected function renderAttributes(): string
    {
        $result = "";

        foreach ($this->attributes as $name => $value)
        {
            $result .= sprintf(' %s="%s"', $name, $value);
        }

        return $result;
    }
}