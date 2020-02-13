const modal = document.querySelector('#my-modal');
const modalBtn = document.querySelector('#modal-btn');
const closeBtn = document.querySelector('.close');

// Events
modalBtn.addEventListener('click', openModal);
closeBtn.addEventListener('click', closeModal);
window.addEventListener('click', outsideClick);

// Open
function openModal() {
  modal.style.display = 'block';
}

// Close
function closeModal() {
  modal.style.display = 'none';
}

// Close If Outside Click
function outsideClick(e) {
  if (e.target == modal) {
    modal.style.display = 'none';
  }
}

if(document.getElementById('create_form')!=null){
	document.getElementById('create_form').addEventListener('submit', async (e)=>{
		{ 
				let validate = document.getElementById('validation_error')
				let username = document.getElementById('Created_username')        
        let password = document.getElementById('Created_password') 
        let firstName = document.getElementById('Created_firstName') 
        let lastName = document.getElementById('Created_lastName') 
				let valText = ""     
				 
				if (username.value.trim() == "")                                  
				{ 
					valText += "<p style='padding:0;' class='alert alert-danger'>*Please Username.</p>"
					e.preventDefault();
        }
        
        
		
				if(password.value.trim() == ""){
					valText += "<p style='padding:0;' class='alert alert-danger'>*Please Password.</p>"
					e.preventDefault();
        } 
        
        if(firstName.value.trim() == ""){
					valText += "<p style='padding:0;' class='alert alert-danger'>*Please first name.</p>"
					e.preventDefault();
        } 
        
        if(lastName.value.trim() == ""){
					valText += "<p style='padding:0;' class='alert alert-danger'>*Please last name.</p>"
					e.preventDefault();
        } 
    
        if (username.value.trim() !== "")                                  
        { 
          let response = await fetch('http://localhost:8080/cwp112Project/phpscripts/checkusername.php', {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                'username': username.value
            }),
            }).catch((error) => {
                console.log("error : " +error);
                alert("Error: network error")
            });
            let responseJson = await response.json();
            if(responseJson.isTaken==true){
              valText += "<p style='padding:0;' class='alert alert-danger'>*username already taken.</p>"
              e.preventDefault();
            }
        }

				validate.innerHTML = valText;
				return true; 
			}
		})
}

if(document.getElementById('create_post')!=null){
	document.getElementById('create_post').addEventListener('submit', (e)=>{
		{ 
				let validate = document.getElementById('validation_error')
				let title = document.getElementById('Created_title')        
        let content = document.getElementById('Created_content') 
				let valText = ""     
				 
				if (title.value.trim() == "")                                  
				{ 
					valText += "<p style='padding:0;' class='alert alert-danger'>*Please Enter Title.</p>"
					e.preventDefault();
        }

        if (content.value.trim() == "")                                  
				{ 
					valText += "<p style='padding:0;' class='alert alert-danger'>*Please Enter Content.</p>"
					e.preventDefault();
        }

				validate.innerHTML = valText;
				return true; 
			}
		})
}