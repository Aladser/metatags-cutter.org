<?php

// коллекция DOM-элементов
class MyDOMTree implements Iterator
{
    // массив, в котором хранятся элементы
    private $elements = [];

    // возвращает текущий элемент
    public function current()
    {
      return current($this -> elements);
    }

    // возвращает ключ текущего элемента
    public function key()
    {
      return key($this -> elements);
    }

    // передвигаемся вперед на один элемент
    public function next()
    {
      next($this -> elements);
    }

    // возврат индекса в начало массива
    public function rewind()
    {
      reset($this -> elements);
    }

    // проверка конца массива
    public function valid()
    {
      return current($this -> elements) !== false;
    }

    // добавить элемент
    public function set($elem, $value)
    {
      $this -> elements[$elem] = $value;
      return $this;
    }

    // получить значение элемента
    public function get($elem)
    { 
      return $this -> elements[$elem];
    }

    // количество элементов
    public function count(){
      return count($this -> elements);
    }
}

?>