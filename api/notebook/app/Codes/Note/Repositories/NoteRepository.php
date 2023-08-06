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
}
