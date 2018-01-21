<?php
namespace App\Http\Controllers;

use Auth;
use SplFileInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class UploadFilesController extends Controller
{
	/**
	 ******************************************************************************************
	 *	Function saves file on path "downloads/user_id/hash/hash/hash.jpg" (any file extension)
	 *	
	 *	@param  $request
	 *	@return $path_from_root	(It's path where file was saved)
	 ******************************************************************************************
	 **/
	public function uploadFiles(Request $request)
	{
		$user_id = Auth::user()->id;
		
		$filename = $_FILES['userfile']['name'];

		$user_folder_path = __DIR__.'/../../../public/downloads/'.$user_id;

		// substr(strrchr($filename,'.'), 1);
		$info = new SplFileInfo($filename);
		$extension = $info->getExtension();

		$first_lvl = $user_folder_path.'/'.substr(md5($filename),0,2);
		$second_lvl = $first_lvl.'/'.substr(md5($filename),2,2);

		$file_path = $second_lvl.'/'.substr(md5($filename),4,1).'.'.$extension;
		$path_from_root = 'downloads/'.$user_id.'/'.substr(md5($filename),0,2).'/'.substr(md5($filename),2,2).'/'.substr(md5($filename),4,1).'.'.$extension;

		if(!is_dir($user_folder_path))
		{
			mkdir($user_folder_path);
		}

		if(is_dir($user_folder_path))
		{
			if(!is_dir($first_lvl))
				mkdir($first_lvl);

			if(is_dir($first_lvl))
			{
				if(!is_dir($second_lvl))
					mkdir($second_lvl);

				if(is_dir($second_lvl))
				{
					copy($_FILES['userfile']['tmp_name'], $file_path);
					echo $path_from_root;
				}
			}
			
		}

	}
}