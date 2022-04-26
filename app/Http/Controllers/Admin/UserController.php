<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepositoryInterface;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepository->getAll();

        return view('admin.user.index', compact('users'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->can('edit-user')) {
            $user = $this->userRepository->find($id);

            return view('admin.user.edit', compact('user'));

        } 

        return redirect()->route('user.index');
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
        if (Auth::user()->can('edit-user')) {
            $data = $request->only([
                'name',
                'email',
                'phone',
                'address',
            ]);
            if ($request->hasFile('images')) {
                $filename = $request->images->getClientOriginalName();
                $data = [
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'phone' => $request['phone'],
                    'address' => $request['address'],
                    'image' => $filename,
                ];
                $request->images->storeAs('public/images', $filename);
            }
            $this->userRepository->update($data, $id);


            return redirect()->route('user.index')->with('success', trans('message.updateSuccess'));
        } 

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->can('remove-user')) {
            $user = $this->userRepository->delete($id);

            return response()->json(true);

        } 

        return redirect()->route('user.index');
    }
}
