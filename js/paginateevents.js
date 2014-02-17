
var selectedCompanies = new Array;
var selectedCategories = new Array;
var searchWord = "";

if(sessionStorage.getItem('selectedCompanies') != null){
	selectedCompanies = JSON.parse(sessionStorage.getItem('selectedCompanies'));
	$('input:checkbox.companies').each(function() {
		if(selectedCompanies.indexOf($(this).val()) != -1){
			$(this).prop({checked:true});
		}
	});
	
}
if(sessionStorage.getItem('selectedCategories') != null){
	selectedCategories = JSON.parse(sessionStorage.getItem('selectedCategories'));
	$('input:checkbox.categories').each(function() {
		if(selectedCategories.indexOf($(this).val()) != -1){
			$(this).prop({checked:true});
		}
	});
}
if(sessionStorage.getItem('searchWord') != null){
	searchWord = sessionStorage.getItem('searchWord');
	$('#filter-searchbar').val(searchWord);
}

$("input:checkbox.categories").change(function() {
  selectedCategories = new Array;
  $('input.categories:checked').each(function(){
      selectedCategories.push($(this).val());
    });
	sessionStorage.setItem('selectedCategories', JSON.stringify(selectedCategories));
	paginate();
});

$("input:checkbox.companies").change(function() {
  selectedCompanies = new Array;
  $('input.companies:checked').each(function(){
      selectedCompanies.push($(this).val());
    });
	sessionStorage.setItem('selectedCompanies', JSON.stringify(selectedCompanies));
	paginate();
});

$("#filter-searchbar").change(function(){
	searchWord = $("#filter-searchbar").val();
	sessionStorage.setItem('searchWord', searchWord);
	window.location.replace("search.php");
	paginate();
});

$(document).ready(function() {
      searchWord = $("#filter-searchbar").val();
	  sessionStorage.setItem('searchWord', searchWord);
	  paginate();
});

$("#filter-button").click( function(){
      searchWord = $("#filter-searchbar").val();
	  sessionStorage.setItem('searchWord', searchWord);
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
			setPagesListener();
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

function setPagesListener(){
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
}




