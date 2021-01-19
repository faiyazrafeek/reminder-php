
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</head>
<body onload="stopRefresh()">
    <div class="container pt-4">
        <div class="display-6 my-3">Add Assignment</div>
        <form class="row g-3" id="ass_data">
            <div class="col-md-6">
                <label for="assignment" class="form-label">Assignment</label>
                <select id="assignment" class="form-select">
                </select>
            </div>
            <div class="col-md-6">
                <label for="course" class="form-label">Course</label>
                <select id="course" class="form-select"></select>                 
            </div>
            <div class="col-md-6 d-none">
                <label for="file" class="form-label">Files</label>
                <input class="form-control" type="file" id="file">
              </div>
            <div class="col-md-6">
              <label class="form-label" for="deadline">Deadline</label>
            <input class="form-control" id="deadline" name="deadline" placeholder="MM/DD/YYY" type="date"/>
            </div>          
            <div class="col-12">
              <button type="submit" onclick="addAssignment()" class="btn btn-primary">Add Assignment</button>
            </div>
          </form>

          <div id="info" class="mt-4"></div>
    </div>



    <script>
        _ = (elem)=>{
            return document.getElementById(elem);
        }

        stopRefresh = () =>{
            document.getElementById("ass_data").addEventListener("submit", function(e){
                e.preventDefault()
            });

            submitData();
        }

        loadCombo = (res) =>{
            var stList = JSON.parse(res);
			var stCombo = _("assignment");
			
			for (i in stList) {
				var studentid = document.createElement("option");
				studentid.text = stList[i].assignment_no + "";
				studentid.value = stList[i].assignment_no;
				
				stCombo.add(studentid);
			}			
        }

        submitData = () =>{                   
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function(){
                if (this.status == 200 && this.readyState==4){
                    loadCombo(this.responseText);
                }
            };
            xhr.open("POST", "createass.php?assignment", true);
            xhr.send();
        }
      
        //https://makitweb.com/auto-populate-dropdown-with-jquery-ajax/
        
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>