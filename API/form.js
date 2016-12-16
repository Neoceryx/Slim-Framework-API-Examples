$(document).ready(function () {

  // POST test
  $("#js_btnps").click(function () {

    // Get the value from the input.
    var n1=$("#js_text").val();

    // API link hosted
    var root ="http://localhost:81/API/index.php";

    console.log(n1);

    $.ajax({
      type:"POST",
      url:root+'/test',
      data:{N1:n1},
      success:function (data) {

     // Show Backend results
     $(".js_PostResult").html(data);

     alert("Value recibed");

   },
   error:function () {
     alert("An Error Ocurred");
   }


    }); // End ajax

  }); // End click

  $("#js_Oper").click(function () {

    // Get the first number value
    var Fnum=$("#js_Fnum").val();
    var Snum=$("#js_Snum").val();

    // API link hosted
    var root ="http://localhost:81/API/index.php";

    $.ajax({
      type:"POST",
      url:root+'/param',
      data:{fnum:Fnum, snum:Snum},
      success:function (data) {

        alert("Values recibed");
        $(".js_OperResult").html(data);


      },
      error:function () {
        alert("An Error ocurred");
      }

    }); // End ajax

    console.log(Fnum+Snum);

  }); // End click

  $("#js_GetInfo").click (function () {

    var UsrName= $("#js_UsrName").val();

    // API link hosted
    var root ="http://localhost:81/API/index.php";
    // console.log(UsrName);

    // Start ajax Consuming api. jquery.
    $.ajax({
      type:"GET",
      url:root+'/Users/'+UsrName,
      data:{usrname:UsrName},
      success:function (data) {

     // Show Backend results
     $(".js_userInfo").html(data);

     alert("User Info founded");

   },
   error:function () {
     alert("An Error Ocurred");
   }

  }); // End ajax

  }); // End click

}); // End scope
