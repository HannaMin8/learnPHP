<?php
declare(strict_types=1);

interface MapInterface {
    public function add(string $key, int $value): void;
    public function get(string $searchKey);
    public function unset(string $searchKey): void;
    public function set(string $key, int $newValue): void;
    public function each(callable $callback): void;
} 