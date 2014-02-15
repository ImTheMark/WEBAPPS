var selectedCompanies = new Array;
var selectedCategories = new Array;
var searchWord = "";
$("input:checkbox.categories").change(function() {
  selectedCategories = new Array;
  $('input.categories:checked').each(function(){
      selectedCategories.push($(this).val());
    });
	
	$.ajax({
   type: "POST",
   data: {'searchWord' : searchWord , 'selectedCategories':selectedCategories , 'selectedCompanies' : selectedCompanies},
   url: "phpscripts/searchfilter.php",
   success: function(data){
     replace list to the string that will be created by the searchfilter.php
	}
	});
});

$("input:checkbox.companies").change(function() {
  selectedCompanies = new Array;
  $('input.companies:checked').each(function(){
      selectedCompanies.push($(this).val());
    });
});

$("textbox").change(function(){
	searchWord = $("textbox").val();
});