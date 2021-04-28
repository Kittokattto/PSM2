<?php




//Vehicle Brand  in View of vehicle module
if (!function_exists('getUserName')) {
	function getUserName($id)
	{	
		
		$name = DB::table('users')->where('id','=',$id)->first();
		
		if(!empty($name))
		{
			
             $names = $name->name;
			return $names;
		}
		
	}
}

if (!function_exists('getAccessStatusUser')) {
	function getAccessStatusUser()
	{	
		$id = Auth::user()->id;

		$user = DB::table('users')->where('id','=',$id)->first();
		
		$userrole = $user->role;
		
		if($userrole == 'admin')
		{
			return 'yes';
		}

		else
		{
			return 'no';
		}

	}
}


?>