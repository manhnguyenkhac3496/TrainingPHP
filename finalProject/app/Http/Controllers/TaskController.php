<?php

namespace App\Http\Controllers;

use App\Models\ListTask;
use App\Models\Users;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    private $listTask;
    private $user;

    public function __construct()
    {
        $this->listTask = new ListTask();
        $this->user = new Users();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userTmp = $this->user->where('user_name', $request->input('username'))
            ->first();
        $userId = $userTmp['id'];
        $data = $request->all();
        $data[] = ['user_id', $userId];
        $data[] = ['status', 0];
        response($this->listTask->create($data), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        response($this->listTask->where('id', $id)->first(), 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->listTask->where('id', $id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->listTask->where('id', $id)->delete();
    }
}
