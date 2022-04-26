<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Suggest;
use Auth;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Suggest\SuggestRepositoryInterface;

class UserController extends Controller
{
    private $userRepository;
    private $suggestRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
        SuggestRepositoryInterface $suggestRepository
    )
    {
        $this->userRepository = $userRepository;
        $this->suggestRepository = $suggestRepository;
    }

    public function profileUser($id)
    {
        $user = $this->userRepository->find($id);

        return view('client.user.view', compact('user'));
    }

    public function editUser($id)
    {
        $user = $this->userRepository->find($id);

        return view('client.user.edit',compact('user'));
    }

    public function updateUser(Request $request, $id) {
        $data = $request->only([
            'phone',
            'address',
        ]);
        if ($request->hasFile('images')) {
            $filename = $request->images->getClientOriginalName();
            $data = [
                'phone' => $request['phone'],
                'address' => $request['address'],
                'image' => $filename,
            ];
            $request->images->storeAs('public/images', $filename);
        }
        $this->userRepository->update($data, $id);

        return redirect()->back()->with('success', trans('message.updateSuccess'));
    }

    public function getSuggest()
    {
        return view('client.suggest.index');
    }

    public function postSuggest(Request $request)
    {
        $data = $request->only([
            'name',
            'price',
            'description',
        ]);
        if ($request->hasFile('images')) {
            $filename = $request->images->getClientOriginalName();
            $data = [
                'name' => $request['name'],
                'price' => $request['price'],
                'description' => $request['description'],
                'image' => $filename,
                'user_id' => Auth::user()->id,
            ];
            $request->images->storeAs('public/images', $filename);

            $this->suggestRepository->create($data);
        }

        return redirect()->back()->with('success', trans('message.createSuccess'));
    }
}
