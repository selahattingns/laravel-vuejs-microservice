<?php
namespace App\Codes\Note\Services;

use App\Codes\Note\Interfaces\NoteInterface;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;

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
        $store = $this->noteRepository->store($userId, $title, $note);
        if ($store){
            try{
                Http::withHeaders([
                    'Authorization' => request()->header('Authorization'),
                    'userId' => request()->header('userId')
                ])->post('http://127.0.0.1:5000/api/logs', [
                    "title" => $title
                ]);
            }catch (ConnectionException $exception){}
        }
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
