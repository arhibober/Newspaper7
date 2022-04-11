var ind;
function submitForm(proc)
{
  var req = null;
  document.getElementById("dest").innerHTML = "Waiting...";
  if (window.XMLHttpRequest)
    req = new XMLHttpRequest();
  else
  if (window.ActiveXObject)
  {
    try
    {
	  req = new ActiveXObject("Msxml2.XMLHTTP");
	}
    catch (e)
    {
	  try
	  {
		req = new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  catch (e)
	  {
	  }
	}
  }
  req.onreadystatechange = function()
  {
	if (req.readyState == 4)
	  if (req.status == 200)
		document.getElementById("dest").innerHTML = req.responseText;
	  else
		document.getElementById("dest").innerHTML = "Error: returned status code "
		  + req.status + " " + req.statusText;
  };
  ind = document.getElementById("ind").value;
  var url="dinamic"+proc+".php?ind="+escape(ind);
  req.open("GET", url, true);
  req.send(null);
}