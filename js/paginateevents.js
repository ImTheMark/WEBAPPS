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

$(document).ready(function() {
      searchWord = $("#filter-searchbar").val();
	  paginate();
});

$("#filter-button").click( function(){
      searchWord = $("#filter-searchbar").val();
	  paginate();
	  
});

$(".paginate_click").click( function () {
	var clicked_id = $(this).attr("id").split("-");
	var page_num = parseInt(clicked_id[0]);
	$('.paginate_click').removeClass('active');
	$.ajax({
	  type: "POST",
	  data: {
		 'page' : page_num,
		 'companies' : selectedCompanies , 
		 'categories' : selectedCategories, 
		 'searchWord' : searchWord, 
	  },
	  url: "php/fetchevents.php",
	  success: function(data){
			$("#event-results").html(data);
		}
	});
	$(this).addClass('active');
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
		 if(data == ""){
			$("#event-results").html("No results found");
		 }
		 else if(data == "one-pager"){
			$("#pages").html("");
			displayFirstPage();
		 }
		 else{
			$("#pages").html(data);
			displayFirstPage();
		  }
		}
	});
}

function displayFirstPage(){
	$.ajax({
		  type: "POST",
		  data: {
		     'page' : 1,
			 'companies' : selectedCompanies , 
			 'categories' : selectedCategories, 
			 'searchWord' : searchWord, 
		  },
		  url: "php/fetchevents.php",
		  success: function(data){
				$("#event-results").html(data);
			}
		});
}






