
function myuser()
	{
		var username = document.getElementById('uname').value;
		var element = document.getElementById('ulabel');
		if(username.length <7)
        {
			element.innerHTML="Invalid Name";
			element.style.color="red";	
		}
		else
		{
			element.innerHTML="Valid Name";
			element.style.color="green";
			
		}
	}

function myemail()
	{
		var uemail = document.getElementById('uemail').value;
		var element = document.getElementById('label2');
       
		if(uemail.length == 0)
        {
			element.innerHTML="Email can not empty";
			element.style.color="red";	
		}
		if(uemail.length <7)
        {
			element.innerHTML="Invalid Email";
			element.style.color="red";	
		}
        
        else 
		{
			element.innerHTML="Valid Email";
			element.style.color="green";
			
		}
	}

function mypass()
	{
		var upassword = document.getElementById('upassword').value;
		var element = document.getElementById('ulabel3');
		if(upassword.length==0)
        {
			element.innerHTML="Password empty";
			element.style.color="red";	
		}
        
        else if(upassword.length <=5)
        {
			element.innerHTML="Invalid Password";
			element.style.color="red";	
		}
		else
		{
			element.innerHTML="Valid Password";
			element.style.color="green";
			
		}
	}

function myrepass()
	{
		var upassword = document.getElementById('upassword').value;
        var urepassword = document.getElementById('urepassword').value;
		var element = document.getElementById('ulabel4');
        if(urepassword.length==0)
        {
			element.innerHTML="Password empty";
			element.style.color="red";	
		}
        
        
        else if(upassword!=urepassword)
        {
			element.innerHTML="Password no match";
			element.style.color="red";	
		}
        
        
        
		else
		{
			element.innerHTML="Password match";
			element.style.color="green";
			
		}
	}
	
	
	
	
	
	function myuserid()
	{
		var userid = document.getElementById('stid').value;
		var element = document.getElementById('ulabel5');
       
		if(userid.length == 0)
        {
			element.innerHTML="UserId can not empty";
			element.style.color="red";	
		}
		else if(userid.length <6)
        {
			element.innerHTML="Invalid UserId length must be greater than 6";
			element.style.color="red";	
		}
        
        else 
		{
			element.innerHTML="Valid UserId";
			element.style.color="green";
			
		}
	}

	
	
	function mygender()
	{
		var ugender = document.getElementById('ugender').value;
		var element = document.getElementById('label6');
       
		if(ugender.length == 0)
        {
			element.innerHTML="Gender can not empty";
			element.style.color="red";	
		}
		
		else if(userid !="Male" || userid !="Female")
		{
			element.innerHTML=" Invalid Gender type correct";
			element.style.color="green";
			
		}
		
		else if(userid =='Male' || userid =='Female')
        {
			element.innerHTML="Valid UserId ";
			element.style.color="green";	
		}
        
	}