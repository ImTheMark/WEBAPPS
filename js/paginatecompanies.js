
var selectedCategories = new Array;
var searchWord = "";
var pastPage = 1;
if(sessionStorage.getItem('CselectedCategories') != null){
	selectedCategories = JSON.parse(sessionStorage.getItem('CselectedCategories'));
	$('input:checkbox.categories').each(function() {
		if(selectedCategories.indexOf($(this).val()) != -1){
			$(this).prop({checked:true});
		}
	});
}
if(sessionStorage.getItem('CsearchWord') != null){
	searchWord = sessionStorage.getItem('CsearchWord');
	$('#filter-searchbar').val(searchWord);
}

if(sessionStorage.getItem('CpastPage') != null){
	pastPage = sessionStorage.getItem('CpastPage');
}

$("input:checkbox.categories").change(function() {
  selectedCategories = new Array;
  $('input.categories:checked').each(function(){
      selectedCategories.push($(this).val());
    });
	sessionStorage.setItem('CselectedCategories', JSON.stringify(selectedCategories));
	paginate();
});

$("#filter-searchbar").change(function(){
	searchWord = $("#filter-searchbar").val();
	sessionStorage.setItem('CsearchWord', searchWord);
	window.location.replace("company.php");
	paginate();
});

$(document).ready(function() {
      searchWord = $("#filter-searchbar").val();
	  sessionStorage.setItem('CsearchWord', searchWord);
	  paginate();
});

$("#filter-button").click( function(){
      searchWord = $("#filter-searchbar").val();
	  sessionStorage.setItem('CsearchWord', searchWord);
	  paginate();
	  
});

function paginate(){
	$.ajax({
      type: "POST",
      data: {
		 'pastPage' : pastPage, 
		 'categories' : selectedCategories, 
		 'searchWord' : searchWord, 
	  },
      url: "php/paginatecompanies.php",
      success: function(data){
		 if(data == ""){
			$("#company-results").html("No results found");
		 }
		 else if(data == "one-pager"){
			$("#pages").html("");
			displayCurrPage();
		 }
		 else{
			alert(data);
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
		sessionStorage.setItem('CpastPage', page_num);
		displayPage(page_num,$(this));
	});
}

function displayPage(page_num,elem){
	$.ajax({
		  type: "POST",
		  data: {
			 'page' : page_num,
			 'categories' : selectedCategories, 
			 'searchWord' : searchWord, 
		  },
		  url: "php/fetchcompanies.php",
		  success: function(data){
				$("#company-results").html(data);
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








