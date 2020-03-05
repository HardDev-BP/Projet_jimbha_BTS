		window.onload = function()
		{
			  var link =  document.getElementById('rulink');
			  var box  =   document.getElementById('box');
			  var close = document.getElementById('close');  
			  link.onclick = function()
			  {
			      box.style.display = 'block'
			  }  
			    close.onclick = function()
			    {
			      box.style.display = 'none';
			    }
	   	}