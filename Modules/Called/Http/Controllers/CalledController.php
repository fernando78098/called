<?php

namespace Modules\Called\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Called\Repositories\CalledsRepository;

class CalledController extends Controller
{
    private $_called_repository;

    public function __construct()
    {
        $this->_called_repository = new CalledsRepository();
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data = $this->_called_repository->getCalled();
        return view('called::index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('called::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $this->_called_repository->storeCalled($request->all());
        return redirect()->route('home');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $data = $this->_called_repository->showCalled($id);
        return view('called::show', compact('data', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data = $this->_called_repository->editCalled($id);
        return view('called::edit', compact('data', 'id'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request)
    {
        $this->_called_repository->updateCalled($request->all());
        return redirect()->route('called.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->_called_repository->destroyFleet($id);
        return redirect()->route('called.index');
    }

    public function finish(Request $request)
    {
        $this->_called_repository->finishCalled($request->all());
        return redirect()->route('called.index');
    }
}
