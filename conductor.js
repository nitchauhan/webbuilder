function css( element, property ) {
	return window.getComputedStyle( element, null ).getPropertyValue( property );
}


function pqr(ev)
{
	ev.preventDefault();
			//alert("hi");
			var obj = document.getElementById(event.target.id);
			obj.style.boxShadow ="0 0 6px red";
			obj.style.padding = "50px 10px 20px 30px";

}

function noAllowDrop(ev) 
{
	//alert("fff");
	ev.stopPropagation();
}

function drag_end(event,a)
{
	var obj = document.getElementById(event.target.id);
	obj.style.boxShadow ="none";	
}



function get_filename()
{
	var path = window.location.pathname;
	// alert(path);
	var page = path.split("/").pop();
	var folder = path.split("/")[path.split("/").length-2];
	// alert(folder);	
	// alert(page);
	var fullpath = folder + "\\" + page;
	// alert(fullpath);
	return fullpath;
}

function img_popup(a)
{
		
	var path = window.location.pathname;
	// alert(path);
	var page = path.split("/").pop();
	var folder = path.split("/")[path.split("/").length-2];
	// alert(folder);	
	// alert(page);
	var fullpath = folder + "\\" + page;
	// alert(fullpath);
	// var x = document.getElementById(a.id).tagName;
	
	// alert(x.toLowerCase());
	console.log(a.src);
	var src_data = a.src;
	var img_file_name = src_data.split("/").pop();
	var img_folder = src_data.split("/")[src_data.split("/").length-2];
	var full_src_data = unescape( img_folder + "/" + img_file_name);
	console.log(full_src_data);
	parent.del_img_view(a.id,fullpath,full_src_data);
}




function abcdef(a)
{
	
	var font_name = css(a,'font-family');			
	var font_color_name = css(a,'color');		
	var path = window.location.pathname;
	// alert(path);
	var page = path.split("/").pop();
	var folder = path.split("/")[path.split("/").length-2];
	// alert(folder);	
	// alert(page);
	var fullpath = folder + "\\" + page;
	// alert(fullpath);
	var x = document.getElementById(a.id).tagName;
	
	// alert(x.toLowerCase());
	parent.popup_view(a.id,a.classList,a.innerHTML.trim(),font_name,font_color_name,fullpath,x);
}