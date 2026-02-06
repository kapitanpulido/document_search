<?php

namespace App\Http\Controllers;

use App\Traits\UserTraits;

use Illuminate\Http\Request;

class UserController extends Controller
{
	use UserTraits;

  public function index()
  {
    return view('user.index')
			->with('users', $this->fetchUsers())
			;
  }

	/**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('user.create')
				->with('is_active', 1)
				;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $duplicate_entry = $this->checkDuplicateEntry($request);

      if ($duplicate_entry)
        return redirect()->route('user.create')->withInput();

      $request->request->add(['password' => bcrypt($request->password)]);
      $user = $this->saveUser($request);

      showNotification('success', 'User entry created successfully.');

      return redirect(route('user.edit', encrypt($user->id)));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      $user = $this->fetchUser($id);
			
      return view('user.edit')
				->with('user', $user)
				->with('is_active', $user->is_active ? 1 : 0)
				;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      $duplicate_entry = $this->checkDuplicateEntry($request, decrypt($id), 'update');

      if ($duplicate_entry){
				return redirect()->route('maintenance.user.edit', $id)->withInput();
			}
      
      $this->updateUser($request, $id);

      return redirect(route('user.edit', $id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
