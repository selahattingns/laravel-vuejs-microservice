<?php
namespace App\Codes\Note\Repositories;

use App\Codes\Note\Interfaces\NoteInterface;
use App\Models\Note;

class NoteRepository implements NoteInterface
{
    /**
     * @var Note
     */
    private $model;

    /**
     * NoteRepository constructor.
     * @param Note $model
     */
    public function __construct(Note $model)
    {
        $this->model = $model;
    }

    /**
     * @param $userId
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getList($userId)
    {
        return $this->model->query()->where('user_id', $userId)->get();
    }

    /**
     * @param $userId
     * @param $title
     * @param $note
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    public function store($userId, $title, $note)
    {
        return $this->model->query()->create([
            "user_id" => $userId,
            "title" => $title,
            "note" => $note,
        ]);
    }

    /**
     * @param $user_id
     * @param $id
     * @return mixed
     */
    public function delete($user_id, $id)
    {
        return $this->model->query()->where('id', $id)->where('user_id', $user_id)->forceDelete();
    }
}
