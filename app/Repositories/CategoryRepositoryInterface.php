<?php
namespace App\Repositories;

interface CategoryRepositoryInterface
{
    public function list(array $filters = []);
}
