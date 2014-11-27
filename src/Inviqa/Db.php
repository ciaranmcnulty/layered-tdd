<?php

namespace Inviqa;

class Db
{
    /**
     * @var string
     */
    private $path;

    /**
     * @param string $path
     */
    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * Serialise an array to disk
     *
     * @param array $data
     * @return string ID
     */
    public function saveData($data)
    {
        if (!$this->path) {
            throw new \RuntimeException('No data path set up');
        }
        $id = base64_encode(time());
        file_put_contents($this->path . '/' . $id, serialize($data));
    }

    /**
     * Load an array from disk
     *
     * @param string $id
     * @return array
     */
    public function loadData($id)
    {
        if (!$this->path) {
            throw new \RuntimeException('No data path set up');
        }
        return unserialize(file_get_contents($this->path . '/' . $id));
    }
} 