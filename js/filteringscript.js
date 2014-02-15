var selectedCompanies = new Array;
var selectedCategories = new Array;
var searchWord = "";
$("input:checkbox.categories").change(function() {
  selectedCategories = new Array;
  $('input.categories:checked').each(function(){
      selectedCategories.push($(this).val());
    });
	
});

$("input:checkbox.companies").change(function() {
  selectedCompanies = new Array;
  $('input.companies:checked').each(function(){
      selectedCompanies.push($(this).val());
    });
  alert(selectedCompanies);
});

$("#filter-searchbar").change(function(){
	searchWord = $("#filter-searchbar").val();
	alert(searchWord);
});

$(window).load(function() {
      searchWord = $("#filter-searchbar").val();
		alert(searchWord);
});