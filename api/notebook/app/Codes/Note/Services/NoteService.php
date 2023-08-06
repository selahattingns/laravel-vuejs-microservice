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
}
