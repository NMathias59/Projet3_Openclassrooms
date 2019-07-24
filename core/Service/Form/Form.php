<?php

namespace Core\Service\Form;


use Core\Service\Form\Type\AbstractType;
use Core\Service\Util\ArrayUtil;

class Form
{
    protected $parts;
    protected $isHandled;

    public function __construct()
    {
        // les
        $this->parts = [];
        $this->isHandled = false;
    }

    /**
     * on ajoute un champ au formulaire
     * @param string $name nom du champ
     * @param AbstractType $type le champ (ex: TextArea, PasswordType , ect)
     * @return $this
     */
    public function add(string $name, AbstractType $type)
    {
        $this->parts[$name] = $type;

        return $this;
    }

    /**
     * on recupère les données du parts ex: nom , date ect
     * @param string $name nom du champ
     * @return AbstractType
     */
    public function getPart(string $name)
    {
        return $this->parts[$name];
    }

    public function isSubmitted()
    {
        return ArrayUtil::get($_SERVER, 'REQUEST_METHOD', 'GET') === 'POST';
    }

    public function handleRequest()
    {
        foreach ($this->parts as $name => $type) {
            $type->setValue($_POST[$name] ?? null);
        }
        $this->isHandled = true;
    }

    public function getData($name = null)
    {
        if ($this->isHandled === false) {
            throw new \Exception('Form isn\'t handled');
        }

        if ($name === null) {
            $data = [];
            foreach ($this->parts as $name => $type) {
                $data[$name] = $type->getValue();
            }

            return $data;
        } else {
            return $this->getPart($name)->getValue();
        }
    }

    public function isValid($name = null)
    {
        if ($this->isHandled === false) {
            throw new \Exception('Form isn\'t handled');
        }

        if ($name !== null) {
            return $this->getPart($name)->isValid();
        } else {
            $isValid = true;
            foreach ($this->parts as $name => $type) {
                $isValid = $isValid && $type->isValid();
            }

            return $isValid;
        }
    }

    public function hasErrors($name = null)
    {
        if (!$this->isSubmitted()) {
            return false;
        }

        if ($name !== null) {
            return !$this->isValid($name);
        } else {
            return !$this->isValid();
        }
    }
}