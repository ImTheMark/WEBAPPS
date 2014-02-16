var selectedCompanies = new Array;
var selectedCategories = new Array;
var searchWord = "";
$("input:checkbox.categories").change(function() {
  selectedCategories = new Array;
  $('input.categories:checked').each(function(){
      selectedCategories.push($(this).val());
    });
	paginate();
});

$("input:checkbox.companies").change(function() {
  selectedCompanies = new Array;
  $('input.companies:checked').each(function(){
      selectedCompanies.push($(this).val());
    });
	paginate();
});

$("#filter-searchbar").change(function(){
	searchWord = $("#filter-searchbar").val();
	paginate();
});

$(window).load(function() {
      searchWord = $("#filter-searchbar").val();
	  paginate();
});

$("#filter-button").click( function(){
      searchWord = $("#filter-searchbar").val();
	  paginate();
});


function paginate(){
	$.ajax({
      type: "POST",
      data: {
		 'companies' : selectedCompanies , 
		 'categories' : selectedCategories, 
		 'searchWord' : searchWord, 
	  },
      url: "php/paginateevents.php",
      success: function(data){
         alert(data);
		}
	});
}

