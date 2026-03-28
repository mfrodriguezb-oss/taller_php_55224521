<?php
require 'Nodo.php';

class ArbolBinario
{
  
    public function construirPreIn($pre, $in)
    {
        if (empty($pre) || empty($in)) return null;

        $raizValor = array_shift($pre);
        $raiz = new Nodo($raizValor);

        $pos = array_search($raizValor, $in);

        $inIzq = array_slice($in, 0, $pos);
        $inDer = array_slice($in, $pos + 1);

        $preIzq = array_slice($pre, 0, count($inIzq));
        $preDer = array_slice($pre, count($inIzq));

        $raiz->izq = $this->construirPreIn($preIzq, $inIzq);
        $raiz->der = $this->construirPreIn($preDer, $inDer);

        return $raiz;
    }

  
    public function construirPostIn($post, $in)
    {
        if (empty($post) || empty($in)) return null;

        $raizValor = array_pop($post);
        $raiz = new Nodo($raizValor);

        $pos = array_search($raizValor, $in);

        $inIzq = array_slice($in, 0, $pos);
        $inDer = array_slice($in, $pos + 1);

        $postIzq = array_slice($post, 0, count($inIzq));
        $postDer = array_slice($post, count($inIzq));

        $raiz->izq = $this->construirPostIn($postIzq, $inIzq);
        $raiz->der = $this->construirPostIn($postDer, $inDer);

        return $raiz;
    }


    public function preorden($n, &$r = [])
    {
        if (!$n) return;
        $r[] = $n->valor;
        $this->preorden($n->izq, $r);
        $this->preorden($n->der, $r);
    }

    public function inorden($n, &$r = [])
    {
        if (!$n) return;
        $this->inorden($n->izq, $r);
        $r[] = $n->valor;
        $this->inorden($n->der, $r);
    }

    public function postorden($n, &$r = [])
    {
        if (!$n) return;
        $this->postorden($n->izq, $r);
        $this->postorden($n->der, $r);
        $r[] = $n->valor;
    }
}