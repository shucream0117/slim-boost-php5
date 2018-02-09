<?php

namespace Shucream0117\SlimBoost\Validators;

/**
 * IteratorAggregate を実装しており、
 * このクラスのオブジェクトをforeachに入れると$this->rulesをイテレート出来る
 */
class ValidationRuleSet implements \IteratorAggregate
{
    /** @var array */
    private $rules = [];

    /**
     * @param array $rules ['key1' => Validator::stringType()->alnum(), ...] みたいな配列
     */
    public function __construct(array $rules)
    {
        $this->rules = $rules;
    }

    /**
     * @return array
     */
    public function getKeys()
    {
        return array_keys($this->rules);
    }

    /**
     * @return \ArrayIterator
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->rules);
    }
}
