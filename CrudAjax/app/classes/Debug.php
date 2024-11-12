<?php

namespace App;

class Debug
{
    public function dump(array $data): void
    {
        echo '<pre>' . print_r($data) . '</pre>';
    }

    public function dd(array $data): void {
        $this->dump($data);
        die;
    }
}
