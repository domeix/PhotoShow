<?php
/*
    This file is part of PhotoShow.

    PhotoShow is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    PhotoShow is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with PhotoShow.  If not, see <http://www.gnu.org/licenses/>.
*/

class Image
{
	private $file;
	private $dir;
	private $x;
	private $y;
	
	public function __construct($file=NULL){
		if(!isset($file)) return;
		
		if(File::Type($file) != "Image")
			throw new Exception("$file is not an image");
		
		
		$this->file	=	urlencode(File::a2r($file));
		$this->dir	=	urlencode(dirname(File::a2r($file)));
		list($this->x,$this->y)=getimagesize($file);
	}
	
	public function toHTML(){
		echo 	"<div id='image_big' ";
		echo 	"style='";
		echo 		" max-width:".$this->x."px;";
		echo 		" background: black url(\"src/getfile.php?file=$this->file\") no-repeat center center;";
		echo 		" background-size: contain";
		echo 	"';>";
		echo 	"<a href='?f=$this->dir'>"; 
		echo 	"<img src='inc/img.png' height='100%' width='100%' style='opacity:0;'>";
		echo 	"</a>";
		return 	"</div>";
	}
}

?>