<?php

namespace App\Http\Controllers;

use App\Codes\Note\Services\NoteService;
use App\Http\Requests\NoteStoreRequest;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * @var NoteService
     */
    private $noteService;

    /**
     * NoteController constructor.
     * @param NoteService $noteService
     */
    public function __construct(NoteService $noteService)
    {
        $this->noteService = $noteService;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getList(Request $request)
    {
        return $this->noteService->getList($request->header('userId'));
    }

    /**
     * @param NoteStoreRequest $request
     * @return mixed
     */
    public function store(NoteStoreRequest $request)
    {
        return $this->noteService->store($request->header('userId'), $request->title, $request->note);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete(Request $request, $id)
    {
        return $this->noteService->delete($request->header('userId'), $id);
    }
}
