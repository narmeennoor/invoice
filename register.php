<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    </head>
    <body>
        <div class="form">
            <h2>Signup</h2>
            <div class="input">
                <div class="inputBox">
                    <label for="">Username</label>
                    <input type="text" id="username">
                </div>
                <div class="inputBox">
                    <label for="">Password</label>
                    <input type="password" id="password">
                </div>
                <!-- <div class="inputBox">
                    <label for="">Confirm Password</label>
                    <input type="password" id="cpassword">
                </div> -->
                <div class="inputBox">
                    <label for="">Email</label>
                    <input type="email"id="email" >
                </div>
                <div class="inputBox">
                    <label for="">Phone</label>
                    <input type="text" id="phone">
                </div>
                <div class="inputBox">
                    <input type="submit" name=""id="btnsave" value="Save" style="width:80px">  <input type="submit" name="" value="Cancel" style="width:80px"> <input type="submit" name="" value="login" style="width:80px">
                   
                </div>
            </div>
            
          
          
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script type="text/javascript">
    $(document).ready(function(){
    $('#btnsave').click(function(){
        $.ajax({
					url:'adduser.php',
					type:'POST',
				    data: {
                        'username':username,
                     'password':password,
                     'email':email,
                     'phone':phone,
    
                    },
                    
          
          
					success:function(data)
					{
					
						if(data)
						{
                            alertify.success(' successfully signed in');
                            window.location.href="index.php";
							
						}
            else{
              alert("error");
            }
          },
					
				});
            });
        });
    </script>
    
</body>
</html>