<?php

namespace App\Http\Controllers;

use App\Codes\Note\Services\NoteService;
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
        return $this->noteService->getList($request->user_id);
    }
}
