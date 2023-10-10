<!DOCTYPE html>
<html>
<head>
	<title>Submit Vehicle Number</title>
  
	<style>
        body {
  background-color: #328f8a;
  background-image: linear-gradient(45deg,#328f8a,#08ac4b);
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
		form {
			display: flex;
			flex-direction: column;
			align-items: center;
			margin-top: 25px;
		}
        header .header{
  background-color: #fff;
  height: 45px;
}
header a img{
  width: 134px;
margin-top: 4px;
}
.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.login-page .form .login{
  margin-top: -31px;
margin-bottom: 26px;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}


		input[type="text"] {
			padding: 10px;
			margin-bottom: 10px;
			font-size: 16px;
			border-radius: 5px;
			border: none;
			box-shadow: 1px 1px 5px rgba(0,0,0,0.2);
		}
		input[type="submit"] {
			padding: 10px;
			font-size: 16px;
			border-radius: 5px;
			border: none;
			background-color: #328f8a;
			color: #fff;
			cursor: pointer;
			box-shadow: 1px 1px 5px rgba(0,0,0,0.2);
		}
	</style>
  
</head>
<body>
<script>
function validation() 
{
			var a = document.getElementsByName("vehicle_num")[0].value;
			var b = /^[A-Z]{2}[0-9]{2}[A-Z]{2}[0-9]{4}$/;
			if (b.test(a) == true) {
				alert(" Valid vehicle number");
			}
			else {
				alert("invalid vehicle number");
			}
		}
	</script>
<div class="login-page">
      <div class="form">
        <div class="login">
          <div class="login-header">
            <h3 style="font-family:Lucida Bright;font-size:25px;color:#328f8a;"><u>VEHCILE NUMBER </u></h3>
            <p style="font-family:Lucida Bright;font-size:17px;color:#328f8a;"><b>Please enter vehicle Number.<b></p>
          </div>
        </div>
      
            
	<form action="upload.php"  method="POST"  name="vehicle">
		<input type="text" name="vehicle_num" id="vehicle_num" placeholder="Vehicle Number">
        <br>
    
        <input type="submit" value="Submit" onclick=" validation()">
    </div>
    </div>
		
    </form>

    </div>
    </div>
</body>
</html>