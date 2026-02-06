<?php

namespace App\Traits;

use App\Models\User;

trait UserTraits
{
  private function fetchUsers()
  {
    $users = User::orderBy('name')->get();		

		return $users;
  }


	private function fetchUser($id)
	{
		return User::find(decrypt($id));
	}


	private function saveUser($request)
	{
		return User::create($request->all());
	}


	private function updateUser($request, $id)
  {
    $user = $this->fetchUser($id);

    if($request->password){
			$user->password = bcrypt($request->password);
		}      

    $user->name       		= $request->name;
    $user->email      		= $request->email;
    $user->is_active  		= $request->is_active ? 1 : 0;

    $user->save();

    showNotification('success', 'User entry updated successfully.');
  }


	private function checkDuplicateEntry($request, $id = 0, $action = 'store')
	{
		$duplicate_name   = User::where('name', $request->name)->active();
    $duplicate_email  = User::where('email', $request->email)->active();

    if($action == 'update'){
      $duplicate_name   = $duplicate_name->where('id', '!=', $id);
      $duplicate_email  = $duplicate_email->where('id', '!=', $id);
    }

    $duplicate_name   = $duplicate_name->get(['id']);
    $duplicate_email  = $duplicate_email->get(['id']);

    $error_msg = '';

    if($duplicate_name->count())
      $error_msg .= '<li>Duplicate name was found on the record.</li>';

    if($duplicate_email->count())
      $error_msg .= '<li>Duplicate email was found on the record.</li>';

    if($error_msg)
      showNotification('error', 'Ooops... it seems like you missed something :<br/><br/><ul>' . $error_msg . '</ul>');

    return $error_msg;
	}
}
