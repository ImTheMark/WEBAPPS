
var selectedCompanies = new Array;
var selectedCategories = new Array;
var searchWord = "";
var c = 'list';
var pastPage = 1;
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
if(sessionStorage.getItem('c') != null){
	c = sessionStorage.getItem('c');
	if(c == 'grid'){
		$("#grid").addClass("active");
		$("#list").removeClass("active");
		if($("#event-results").hasClass('list-group')){
			$("#event-results").removeClass('list-group');
			$("#event-results").addClass("well");
		}
	}
	else if(c == 'list'){
		if($("#event-results").hasClass('well')){
			$("#event-results").removeClass('well');
			$("#event-results").addClass("list-group");
		}
		$("#list").addClass("active");
		$("#grid").removeClass("active");
	}
}

if(sessionStorage.getItem('pastPage') != null){
	pastPage = sessionStorage.getItem('pastPage');
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

$("#grid").click(function(){
	c = "grid";
	sessionStorage.setItem('c',c);
	if($("#event-results").hasClass('list-group')){
		$("#event-results").removeClass('list-group');
		$("#event-results").addClass("well");
	}
	$("#grid").addClass("active");
	$("#list").removeClass("active");
	paginate();
});

$("#list").click(function(){
	c = "list";
	sessionStorage.setItem('c',c);
	if($("#event-results").hasClass('well')){
		$("#event-results").removeClass('well');
		$("#event-results").addClass("list-group");
	}
	$("#list").addClass("active");
	$("#grid").removeClass("active");
	paginate();
});

function paginate(){
	$.ajax({
      type: "POST",
      data: {
		 'pastPage' : pastPage,
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
			displayCurrPage();
		 }
		 else{
			$("#pages").html(data);
			
			displayCurrPage();
			setPagesListener();
		  }
		}
	});
}


function findElemGivenPageNum(page_num){
	$(".paginate_click").each(function (){
		var page = page_num + '-page';
		if($(this).attr('id') == page){
			return $(this);
		}
	});
}

function displayCurrPage(){
	page_num = 1;
	var elem;
	$(".paginate_click").each(function (){
		if($(this).attr('class') == 'paginate_click active'){
			var id = $(this).attr("id").split("-");
			page_num = parseInt(id[0]);
			elem = $(this);
		}
	});
	displayPage(page_num,elem);
}
function setPagesListener(){
	$(".paginate_click").click( function () {
		var clicked_id = $(this).attr("id").split("-");
		var page_num = parseInt(clicked_id[0]);
		sessionStorage.setItem('pastPage', page_num);
		displayPage(page_num,$(this));
	});
}

function displayPage(page_num,elem){
	$.ajax({
		  type: "POST",
		  data: {
			 'page' : page_num,
			 'class' : c,
			 'companies' : selectedCompanies , 
			 'categories' : selectedCategories, 
			 'searchWord' : searchWord, 
		  },
		  url: "php/fetchevents.php",
		  success: function(data){
				$("#event-results").html(data);
			}
		});
	if(elem!=null){	
		if(!elem.hasClass('active')){
			$('.paginate_click').removeClass('active');
			$('.paginate_click button').removeClass('active');
			$('.paginate_click button').each(function(){
			});
			elem.addClass('active');
			elem.children('button').eq(0).addClass('active');
			$('.paginate_click button').each(function(){
			});
		}
	}
	
}




