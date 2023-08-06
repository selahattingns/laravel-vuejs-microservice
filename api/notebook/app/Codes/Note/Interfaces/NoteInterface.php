<?php
namespace App\Codes\Note\Interfaces;

interface NoteInterface
{
    /**
     * @param $userId
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getList($userId);

    /**
     * @param $userId
     * @param $title
     * @param $note
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    public function store($userId, $title, $note);

    /**
     * @param $user_id
     * @param $id
     * @return mixed
     */
    public function delete($user_id, $id);
}
