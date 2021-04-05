function searchtable()
{
	var searchBar = document.getElementById("searchbar");
	search = searchBar.value.toLowerCase();
	var table = document.getElementById("filtertable");
	var rows = table.getElementsByTagName("tr");

	for(i=0; i<rows.length; i++)
	{
		row = rows[i].getElementsByTagName("td")[0];
		if(row)
		{
			var text = row.innerText;
			if(text.toLowerCase().indexOf(search) > -1)
			{
				row.style.display = "";
			}
			else
			{
				row.style.display = "none";
			}
		}
	}
}