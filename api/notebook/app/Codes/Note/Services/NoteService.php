<?php
namespace App\Codes\Note\Services;

use App\Codes\Note\Interfaces\NoteInterface;

class NoteService
{
    /**
     * @var NoteInterface
     */
    private $noteRepository;

    /**
     * NoteService constructor.
     * @param NoteInterface $noteRepository
     */
    public function __construct(NoteInterface $noteRepository)
    {
        $this->noteRepository = $noteRepository;
    }

    /**
     * @param $userId
     * @return mixed
     */
    public function getList($userId)
    {
        return $this->noteRepository->getList($userId);
    }

    /**
     * @param $userId
     * @param $title
     * @param $note
     * @return mixed
     */
    public function store($userId, $title, $note)
    {
        return $this->noteRepository->store($userId, $title, $note);
    }

    /**
     * @param $userId
     * @param $id
     * @return mixed
     */
    public function delete($userId, $id)
    {
        return $this->noteRepository->delete($userId, $id);
    }
}
