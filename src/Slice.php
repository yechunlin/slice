<?php
namespace Slice;

class Slice
{
	public static function downloadFile($url, $size=0, $saveName=''){
		$handel = fopen($url, 'rb');
		if($handel === false){
			exit('Bad file or open faild!');
		}
		$chunkSize = $size ? $size : 1 * 1024 * 1024;//1M
		$save = $saveName ? $saveName : time().rand(1000,999).'.mp4';
		$loadSize  = 0;
		while (!feof($handel)) {
			$buffer = fread($handel, $chunkSize);
			file_put_contents($save, $buffer, FILE_APPEND);
		}
		fclose($handel);
		return $save;
	}
}
