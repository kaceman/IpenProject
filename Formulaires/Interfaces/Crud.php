<?php
namespace Formulaires\Interfaces;

interface Crud
{
    public function insertData($conn);
    public function updateData($conn, $id);
}