
	var subjects = new Array();
	if(sessionStorage.getItem('subjects') != null){
		subjects = JSON.parse(sessionStorage.getItem('subjects'));
		writeSchedule();
		updateEnrollCourseTableOnLoad();
		
	}
	
	function updateEnrollCourseTableOnLoad(){
		var table = document.getElementById('course-table');
		var rows = table.getElementsByTagName('tr');
		for(var i = 0 ; i<subjects.length;i++){
			for(var j = 1 ; j<rows.length ; j++){
				var row = rows[j];
				var cols = row.getElementsByTagName("td");
				if(cols[1].textContent == subjects[i]){
					var cbArr = cols[0].childNodes;
					var cb = cbArr[0];
					cb.checked = true;
				}
			}
		}
	}
	
	
	function addSubject(subject){
		if(subjects.indexOf(subject)== -1){
			subjects.push(subject);
			writeSchedule();
		}
		sessionStorage.setItem('subjects',JSON.stringify(subjects));
	}
	
	function writeSchedule(){
			var h3 = document.getElementById('subjects');
			if(subjects.length>0){
				h3.innerHTML = "Scheduling Planner contents :<br><br>" + subjects.toString();
			}
			else{
				h3.innerHTML = "Scheduling Planner contents :<br><br>none";
			}
	}
	
	function removeSubject(subject){
		var index = subjects.indexOf(subject);
		if(index!=-1){
			subjects.splice(index,1);
			writeSchedule();
		}
		sessionStorage.setItem('subjects',JSON.stringify(subjects));
	}
	
	function getRow(n) {
        var row = n.parentNode.parentNode;
        var cols = row.getElementsByTagName("td");
		if(n.checked){
			if (cols[4].textContent == "No"){
				alert("This course is not offered for this enrollment period!");
				n.checked= false;
			}
			else if (cols[3].textContent == "No"){
				alert("You will not get any credit even after passing this course!");
				addSubject(cols[1].textContent);
			}
			else{
				addSubject(cols[1].textContent);
			}
		}
		else{
			removeSubject(cols[1].textContent);
		}
    } 
	
	