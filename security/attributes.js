window.onload = function(){
	document.getElementById('main').style.padding = "10px";
}
function selectAll(id)
{
	s = document.getElementById(id);
	
	for(i = 0; i < s.length; ++i)
	{
		s[i].selected = true;
	}
}

function swap(srcId,dstId)
{
	src = document.getElementById(srcId);
	dst = document.getElementById(dstId);
	
	index = src.selectedIndex;
	
	if(index != -1)
	{
		txt = src.options[ index ].text;
		value = src.options[ index ].value;
		
		dst.options[ dst.options.length] = new Option( txt, value );
		src.options[ index ] = null;
	}
}	

function selectAll(id)
{
	s = document.getElementById(id);

	for(i = 0; i < s.length; ++i)
	{
		s[i].selected = true;
	}
}

function swap(srcId,dstId)
{
	src = document.getElementById(srcId);
	dst = document.getElementById(dstId);
	index = src.selectedIndex;

	if(index != -1)
	{
		txt = src.options[ index ].text;
		value = src.options[ index ].value;

		dst.options[ dst.options.length] = new Option( txt, value );
		src.options[ index ] = null;
	}
}