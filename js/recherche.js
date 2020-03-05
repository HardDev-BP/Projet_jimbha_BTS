function a()
{
	var link =  document.getElementById('rechercher');
	var box  =   document.getElementById('box');

	link.onclick = function()
	{
		box.style.display = 'block'
	}  

	if(link.onclick==0)
	{
		box.style.display = 'block'
	}else{
		box.style.display = 'none';
	}

	/*
	link.onclick = function()
	{
		box.style.display = 'block'
	}  
	close.onclick = function()
	{
		box.style.display = 'none';
	}
	*/
}