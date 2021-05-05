function searchtable(row)
{
	var searchBar = document.getElementById("searchbar");
	search = searchBar.value.toLowerCase();
	var table = document.getElementById("filtertable");
	var rows = table.getElementsByTagName("tr");

	for(i=0; i<rows.length; i++)
	{
		nameCol = rows[i].getElementsByTagName("td")[row];
		if(nameCol)
		{
			var text = nameCol.innerText;
			if(text.toLowerCase().indexOf(search) > -1)
			{
				rows[i].style.display = "";
			}
			else
			{
				rows[i].style.display = "none";
			}
		}
	}
}