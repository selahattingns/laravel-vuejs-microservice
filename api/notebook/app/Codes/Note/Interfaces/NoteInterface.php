<?php
namespace App\Codes\Note\Interfaces;

interface NoteInterface
{
    /**
     * @param $userId
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getList($userId);
}
