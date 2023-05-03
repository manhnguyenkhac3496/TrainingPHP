<?php

namespace App\Http\Controllers;

use App\Models\ListTask;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Exception;

class TaskController extends Controller
{
    private $listTask;
    private $user;

    public function __construct()
    {
        $this->listTask = new ListTask();
        $this->user = new User();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $list = $this->listTask->where('user_name', Auth::user()->user_name)
            ->limit(10)
            ->offset(0)
            ->get();
        $total = count($this->listTask->where('user_name', Auth::user()->user_name)->get());
        return view('task/listTask', ['taskList' => $list, 'total' => $total, 'pageCount' => $total%10 == 0 ? $total/10 : $total/10 + 1]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function index()
    public function paging(Request $request)
    {
        $page = $request->input('page');
        $limit = $request->input('limit');;
        $offset = $page*$limit;
        $list = $this->listTask->where('user_name', Auth::user()->user_name)
            ->limit($limit)
            ->offset($offset)
            ->get();
        $total = count($this->listTask->where('user_name', Auth::user()->user_name)->get());
        return view('task/listTask', ['taskList' => $list, 'total' => $total, 'pageCount' => $total%$limit == 0 ? $total/$limit : $total/$limit + 1]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('task/addTask');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array('title' => $request->input('title'),
            'description' => $request->input('description'));
        $data['user_name'] = Auth::user()->user_name;
        switch ($request->input('status')) {
            case 'inprogress': {
                $data['status'] =  2;
                break;
            }
            case 'complete': {
                $data['status'] =  3;
                break;
            }
            default: {
                $data['status'] =  1;
                break;
            }
        }
        try {
            $this->listTask->create($data);
            redirect(route('list'));
        } catch (Exception $e) {
            redirect(route('error'));
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = $this->listTask->find($id);
        return view('task/detailTask', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = $this->listTask->find($id);
        return view('task/updateTask', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = array('title' => $request->input('title'),
            'description' => $request->input('description'));
        $data['user_name'] = Auth::user()->user_name;
        switch ($request->input('status')) {
            case 'inprogress': {
                $data['status'] =  2;
                break;
            }
            case 'complete': {
                $data['status'] =  3;
                break;
            }
            default: {
                $data['status'] =  1;
                break;
            }
        }
        $this->listTask->where('id', $request->input('id'))->update($data);
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
        redirect(route('list'));
    }

    /**
     * Export file csv.
     *
     * @param
     * @return
     */
    public function exportCsv(Request $request) {
        $data = array(
            array($request->input('user_name'), $request->input('title'), $request->input('status'), $request->input('description'))
        );

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=task_list.csv",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $callback = function () use ($data) {
            $file = fopen('php://output', 'w');

            fputcsv($file, array('User Name', 'Title', 'Status', 'Description'));

            foreach ($data as $row) {
                fputcsv($file, $row);
            }

            fclose($file);
        };

        return response()->streamDownload($callback, 'task_list.csv', $headers);
    }
}
