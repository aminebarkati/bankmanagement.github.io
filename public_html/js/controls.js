function dt() {
      let d = new Date();
      document.getElementById("time").innerHTML =d.toDateString() +" - "+ d.toLocaleTimeString();
}
setInterval(dt, 1000)
function signinvf() {
      
      let fname = document.getElementById("fname").value;
      let lname = document.getElementById("lname").value;
      let dob = document.getElementById("dob").value;
      let cname = document.getElementById("cname").value;
      let password = document.getElementById("password").value;
      let cvv = document.getElementById("cvv").value;
      let alphanum = /^\w{3,30}$/
      let digits = /^\d{3}$/
      let alpha = /^[a-z ]{3,30}$/
      let d = new Date();
      if (!alpha.test(fname) || !alpha.test(lname) ) {
            alert("name should contain only alphabets")
            return false
      }
      if (!alphanum.test(cname)) {
            alert("card name (username) should contain only alphabets and digits")
            return false
      }

      if (Number(d.getFullYear())-Number(dob.substr(0,dob.indexOf("-")))<18) {
            alert("be carefull make sure your age should be 18")
            return false
      }
      if (!alphanum.test(password) || password.length<6 || password.length>30) {
            alert("password should contain 6 or more characters of only alphabets and digits")
            return false
      }
      if (!digits.test(cvv)) {
            alert("cvv should contain only digits")
            return false
      }
      return true
}