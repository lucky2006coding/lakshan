function sign() {

  document.getElementById("loaddot").className = 'd-block';
  document.getElementById("head").style.visibility = 'hidden';


  var email = document.getElementById("email");
  var password = document.getElementById("password");
  var rememberme = document.getElementById("checkbox");

  var f = new FormData();
  f.append("e", email.value);
  f.append("p", password.value);
  f.append("rmb", rememberme.checked);


  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      if (t == "Success") {
        document.getElementById("head").style.visibility = 'visible';
        document.getElementById("loaddot").className = 'd-none';
        alert("success");
      } else if (t == "signIn") {
        window.location = "index.php";
      } else if (t == "signUp") {
        document.getElementById("head").style.visibility = 'visible';
        document.getElementById("loaddot").className = 'd-none';
        document.getElementById("backemail").className = 'd-block';
        document.getElementById("sec1").className = 'd-none';
        document.getElementById("sec2").className = 'd-block';

      } else {
        if (t == "Please Enter your email Address" || t == "Your email address must have between 10 and 100 characters" ||
          t == "Invalid email address" || t == "Duplicate email") {
          document.getElementById("head").style.visibility = 'visible';
          document.getElementById("loaddot").className = 'd-none';
          document.getElementById("error").style.display = 'block';
          document.getElementById("errorem").innerHTML = t;
          document.getElementById("email").style.borderColor = '#DB1010';

        } else if (t == "Something went wrong") {
          document.getElementById("loaddot").className = 'd-none';
        } else {
          document.getElementById("head").style.visibility = 'visible';
          document.getElementById("loaddot").className = 'd-none';
          document.getElementById("errorps").style.display = 'block';
          document.getElementById("errorpss").innerHTML = t;
          document.getElementById("password").style.borderColor = '#DB1010';
        }

      }
    }
  }

  r.open("POST", "filtersignProccess.php", true);
  r.send(f);

}

function resetPassword() {

  var respw = document.getElementById("respw");
  var conpw = document.getElementById("conpw");
  var rpveri = document.getElementById("rpveri");

  // alert(rpveri);

  var f = new FormData();
  f.append("rp", respw.value);
  f.append("cp", conpw.value);
  f.append("rv", rpveri.value);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var resp = r.responseText;
      if (resp == "success") {

        alert("Password changed");
        window.location.href = "signinup.php";

      } else {
        alert(resp);
      }
    }
  }

  r.open("POST", "reset_passwordProccess.php", true);
  r.send(f);

}



function backemail() {

  document.getElementById("backemail").className = 'd-none';
  document.getElementById("sec1").className = 'd-block';
  document.getElementById("sec2").className = 'd-none';
  document.getElementById("skip").className = 'd-none';
}

function onback() {
  document.getElementById("skip").className = 'd-none';
  document.getElementById("next").className = 'd-block';
  document.getElementById("conimg").style.display = 'block';
  document.getElementById("breakimg").style.display = 'none';

}

function emailerror() {
  document.getElementById("email").style.borderColor = '';
  document.getElementById("error").style.display = 'none';
}

function passerror() {
  document.getElementById("password").style.borderColor = '';
  document.getElementById("errorps").style.display = 'none';
}

function closesign() {
  window.location = "index.php";
}

function validation() {


  var fname = document.getElementById("fname");
  var lname = document.getElementById("lname");
  var verification = document.getElementById("verification");
  var gender = document.getElementById("gender");
  var country = document.getElementById("country");



  var f = new FormData;
  f.append("fname", fname.value);
  f.append("lname", lname.value);
  f.append("v", verification.value);
  f.append("gen", gender.value);
  f.append("cou", country.value);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.status == 200 && r.readyState == 4) {
      var t = r.responseText;
      if (t == "Success") {
        document.getElementById("rcode").className = 'd-none';
        document.getElementById("next").className = 'd-block';
      } else {
        alert(t);
      }
    }


  }

  r.open("POST", "validation.php", true);
  r.send(f);

}

function next() {
  document.getElementById("title").innerHTML = 'step 02';
  document.getElementById("next").className = 'd-none';
  document.getElementById("skip").className = 'd-block';
  document.getElementById("backemail").className = 'd-none';
  document.getElementById("backpara").className = 'd-block';
  document.getElementById("conimg").style.display = 'none'
  document.getElementById("breakimg").style.display = 'block';
}

function uploadimage() {

  var image = document.getElementById("inputimage");

  var f = new FormData();
  f.append("img", image.files[0]);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.status == 200 && r.readyState == 4) {
      var t = r.responseText;
      if (t == "Success") {
        window.location = "index.php";
      } else {
        alert(t);
      }
    }
  }


  r.open("POST", "upimage.php", true);
  r.send(f);


}

/*
const button = $('#btn')
const overlay = $('#overlay')

const close = $('#close')
const body = $('body')
button.on('click', () => {
    overlay.removeClass('visually-hidden');
})

close.on('click', () => {
    overlay.addClass('visually-hidden');
})



const continue1 = $('#continue1')
const box1 = $('#box1')
const box2 = $('#box2')
const close1 = $('#close1')

continue1.on('click', () => {
    box1.addClass('visually-hidden');
    box2.removeClass('visually-hidden');
})

close1.on('click', () => {
    box2.addClass('visually-hidden');
    box1.removeClass('visually-hidden');
    overlay.addClass('visually-hidden');
})


const continue2 = $('#continue2')
const box3 = $('#box3')
const close2 = $('#close2')

continue2.on('click', () => {
    box2.addClass('visually-hidden');
    box3.removeClass('visually-hidden');
})

close2.on('click', () => {
    box3.addClass('visually-hidden');
    box1.removeClass('visually-hidden');
    overlay.addClass('visually-hidden');
})



const continue3 = $('#continue3')
const box4 = $('#box4')
const close3 = $('#close3')

continue3.on('click', () => {
    box3.addClass('visually-hidden');
    box4.removeClass('visually-hidden');
})

close3.on('click', () => {
    box4.addClass('visually-hidden');
    box1.removeClass('visually-hidden');
    overlay.addClass('visually-hidden');
})
*/

function upprofile() {


  var fname = document.getElementById("fn");
  var lname = document.getElementById("ln");
  var email = document.getElementById("email");
  var pw = document.getElementById("pw");
  var mb = document.getElementById("mb");
  var gen = document.getElementById("gen");
  var nic = document.getElementById("nic");
  var cry = document.getElementById("cry");
  var adr = document.getElementById("adr");
  var primage = document.getElementById("updateimage");

  var f = new FormData();
  f.append("f", fname.value);
  f.append("l", lname.value);
  f.append("em", email.value);
  f.append("pw", pw.value);
  f.append("m", mb.value);
  f.append("gen", gen.value);
  f.append("nic", nic.value);
  f.append("cry", cry.value);
  f.append("adr", adr.value);
  f.append("img", primage.files[0]);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      if (t == "Success" || t == "SuccessSuccess") {
        window.location.reload();
      }

    }
  }

  r.open("POST", "updateProfileProccess.php", true);
  r.send(f);


}

// function profile(){
//     const value = window.sessionStorage.getItem('key');

//     if (value !== null) {
//       // Use the retrieved value
//       window.location = "profile.php";

//     } else {
//       window.location = "signinup.php";
//     }

//   }


function profile() {

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {

    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      if (t == "Success") {
        window.location = "profile.php";
      } else {
        window.location = "signinup.php";
      }
    }

  }

  r.open("POST", "filtersession.php", true);
  r.send();

}

function addproduct() {

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {

    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      if (t == "Success") {
        window.location = "addproduct.php";
      } else {
        window.location = "signinup.php";
      }
    }

  }

  r.open("POST", "filtersession.php", true);
  r.send();

}

function signout() {

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {

    if (r.status == 200 && r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        window.location = "index.php";
      }
    }


  }

  r.open("POST", "signOutproccess.php", true);
  r.send();

}



function adminlogout() {

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {

    if (r.status == 200 && r.readyState == 4) {
      var t = r.responseText;
      // alert(t);
      if (t == "success") {
        window.location.href = "adminsignin.php";
      }
    }


  }

  r.open("POST", "adminsignOutproccess.php", true);
  r.send();

}


function myproduct() {

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {

    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      if (t == "Success") {
        window.location = "myProducts.php";
      } else {
        window.location = "signinup.php";
      }
    }

  }

  r.open("POST", "filtersession.php", true);
  r.send();

}

function favo(btn) {
  var place_id = btn.getAttribute("data-value");
  // alert(place_id);
  // const imageElement = document.getElementById('draco1');
  // const currentSrc = imageElement.src;

  // // Check the current image source and toggle to the appropriate image
  // if (currentSrc.includes('Daco_4110701.png')) {
  //   imageElement.src = 'Daco_4421474.png';
  // } else {
  //   imageElement.src = 'Daco_4110701.png';
  // }

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.status == 200 && r.readyState == 4) {
      var t = r.responseText;
      // alert(t);
      if (t == "Added") {
        alert("Product added to the watchlist successfully.");
        window.location.reload();
      } else {
        if (t == "Removed") {
          alert("Product removed in the watchlist successfully.");
          window.location.reload();
        } else {
          alert(t);
        }
      }
    }
  }

  r.open("GET", "addedwatchlist.php?id=" + place_id, true);
  r.send();

}

function getplace(id) {

  var place_id = id.getAttribute("data-value");

  // alert(place_id);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      if (t == "success") {
        window.location = "singleplaceView.php";
      } else {
        if (t == "Invalid user") {
          window.location = "signinup.php";
        } else {
          alert(t);
        }
      }
    }
  }

  r.open("GET", "sendidproccess.php?place=" + place_id, true);
  r.send();


}

// function upautoAment(btn) {
//     let id = btn.getAttribute("data-value");

//     var r = new XMLHttpRequest();
//     r.onreadystatechange = function () {
//       if (r.status == 200 && r.readyState == 4) {
//         var t = r.responseText;
//         alert(t);
//       }
//     }

//     r.open("GET", "addProductProccess.php?ament_id=" + id, true);
//     r.send();



//   }

function sort(x) {

  alert("ok");
  var search = document.getElementById("s");
  var time = "0";

  if (document.getElementById("n").checked) {
    time = "1";
  } else if (document.getElementById("o").checked) {
    time = "2";
  }

  var condition = "0";

  if (document.getElementById("b").checked) {
    condition = "1";
  } else if (document.getElementById("u").checked) {
    condition = "2";
  }

  alert(time);
  alert(condition);

  var f = new FormData();
  f.append("s", search.value);
  f.append("t", time);
  f.append("c", condition);
  f.append("page", x);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.status == 200 && r.readyState == 4) {
      var t = r.responseText;

      document.getElementById("sort").innerHTML = t;
    }
  };

  r.open("POST", "sortProcess.php", true);
  r.send(f);
}

function clearSort() {
  window.location.reload();
}

function changeStatus(id) {
  var place_id = id;

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.status == 200 && r.readyState == 4) {
      var t = r.responseText;
      if (t == "activated" || t == "deactivated") {
        window.location.reload();
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "changeStatusProcess.php?p=" + place_id, true);
  r.send();
}

function deletePlace(id) {

  var place_id = id;

  var r = new XMLHttpRequest();
  if (r.status == 200 && r.readyState == 4) {
    var t = r.responseText;
    if (t = "Success") {
      window.location.reload();
    } else {
      alert(t);
    }
  }
  r.open("GET", "deleteProccess.php?p=" + place_id, true);
  r.send();


}

function basicSearch(x) {

  var text = document.getElementById("search").value;

  var f = new FormData();
  f.append("t", text);
  f.append("page", x);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      document.getElementById("card").innerHTML = t;
    }
  }

  r.open("POST", "basicSearchProccess.php", true);
  r.send(f);

}

// const myInput = document.getElementById("numberInpunt");
function stepper(btn, inputID) {
  const myInput = document.getElementById("numberInpunt" + inputID);
  let id = btn.getAttribute("id");
  let min = myInput.getAttribute("min");
  let max = myInput.getAttribute("max");
  let step = myInput.getAttribute("step");
  let val = myInput.getAttribute("value");
  let calcStep = (id == "increment") ? (step * 1) : (step * -1);
  let newValue = parseInt(val) + calcStep;

  if (newValue >= min && newValue <= max) {
    myInput.setAttribute("value", newValue);
    resadultpricing1();
  }
}

function stepper1(btn, inputID) {
  const myInput = document.getElementById("numberInpunt1" + inputID);
  let id = btn.getAttribute("id");
  let min = myInput.getAttribute("min");
  let max = myInput.getAttribute("max");
  let step = myInput.getAttribute("step");
  let val = myInput.getAttribute("value");
  let calcStep = (id == "increment") ? (step * 1) : (step * -1);
  let newValue = parseInt(val) + calcStep;

  if (newValue >= min && newValue <= max) {
    myInput.setAttribute("value", newValue);
    resadultpricing();
  }
}

function paynow(pid) {
  // addinvo();
  // alert(pid);
  // var qty = document.getElementById("qty_input").value;
  // alert("Sucess");   


  var qty1 = document.getElementById("numberInpunt0").value;
  var qty2 = document.getElementById("numberInpunt1").value;
  var qty3 = document.getElementById("numberInpunt2").value;
  var date1 = document.getElementById("lagdate1").value;
  var date2 = document.getElementById("lagdate2").value;

  if (date1 == 0 || date2 == 0) {
    alert("Please enter checking and checkout dates");
  } else if (qty1 == 0 && qty2 == 0 && qty3 == 0) {
    alert("Select Guest count");
  } else {



    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
      if (r.status == 200 && r.readyState == 4) {
        var t = r.responseText;
        var obj = JSON.parse(t);

        var umail = obj["umail"];
        var amount = obj["amount"];

        if (t == "address error") {
          alert("Please Update Your Profile.");
          window.location = "profile.php";
        } else {


          // alert("Success");

          // alert(obj["id"])
          // saveInvoice( obj["id"], pid, umail, amount, qty);

          // Payment completed. It can be a successful failure.
          payhere.onCompleted = function onCompleted(orderId) {
            console.log("Payment completed. OrderID:" + orderId);
            addinvo();


            // Note: validate the payment and show success or failure page to the customer
          };

          // Payment window closed
          payhere.onDismissed = function onDismissed() {
            // Note: Prompt user to pay again or show an error page
            console.log("Payment dismissed");
          };

          // Error occurred
          payhere.onError = function onError(error) {
            // Note: show an error page
            console.log("Error:" + error);
          };

          // Put the payment variables here
          var payment = {
            "sandbox": true,
            "merchant_id": "1222366",    // Replace your Merchant ID
            "return_url": "http://localhost/eshop/singleplaceView.php.php?id=" + pid,     // Important
            "cancel_url": "http://localhost/eshop/singleplaceView.php.php?id=" + pid,     // Important
            "notify_url": "http://sample.com/notify",
            "order_id": obj["id"],
            "items": obj["item"],
            "amount": amount,
            "currency": "LKR",
            "hash": obj["hash"], // *Replace with generated hash retrieved from backend
            "first_name": obj["fname"],
            "last_name": obj["lname"],
            "email": umail,
            "phone": obj["mobile"],
            "address": obj["address"],
            "city": obj["city"],
            "country": "Sri Lanka",
            "delivery_address": obj["address"],
            "delivery_city": obj["city"],
            "delivery_country": "Sri Lanka",
            "custom_1": "",
            "custom_2": ""
          };

          // Show the payhere.js popup, when "PayHere Pay" is clicked
          // document.getElementById('payhere-payment').onclick = function (e) {
          payhere.startPayment(payment);

          // alert("Success");

          // };


        }
      }
    }


    r.open("GET", "payNowProcess2.php?id=" + pid + "&qty1=" + qty1 + "&qty2=" + qty2 + "&qty3=" + qty3 + "&date1=" + date1 + "&date2=" + date2, true);
    r.send();
  }





}

function paynow2(pid) {

  // alert("ok");
  // addinvo();
  // alert(pid);
  // var qty = document.getElementById("qty_input").value;
  var qty1 = document.getElementById("numberInpunt10").value;
  var qty2 = document.getElementById("numberInpunt11").value;
  var qty3 = document.getElementById("numberInpunt12").value;
  var date1 = document.getElementById("smalDate1").value;
  var date2 = document.getElementById("smalDate2").value;

  if (date1 == 0 || date2 == 0) {
    alert("Please enter checking and checkout dates");
  } else if (qty1 == 0 && qty2 == 0 && qty3 == 0) {
    alert("Select Guest count");
  } else {
    // alert("Sucess");   


    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
      if (r.status == 200 && r.readyState == 4) {
        var t = r.responseText;
alert(t);

        var obj = JSON.parse(t);

        var umail = obj["umail"];
        var amount = obj["amount"];

        if (t == "address error") {
          alert("Please Update Your Profile.");
          window.location = "profile.php";
        } else {
          // alert(obj["id"])
          // saveInvoice( obj["id"], pid, umail, amount, qty);

          // Payment completed. It can be a successful failure.
          payhere.onCompleted = function onCompleted(orderId) {
            console.log("Payment completed. OrderID:" + orderId);

            addinvo();

            // window.location = "invoice.php";
            // Note: validate the payment and show success or failure page to the customer
          };

          // Payment window closed
          payhere.onDismissed = function onDismissed() {
            // Note: Prompt user to pay again or show an error page
            console.log("Payment dismissed");
          };

          // Error occurred
          payhere.onError = function onError(error) {
            // Note: show an error page
            console.log("Error:" + error);
          };

          // Put the payment variables here
          var payment = {
            "sandbox": true,
            "merchant_id": "1222366",    // Replace your Merchant ID
            "return_url": "http://localhost/eshop/singleplaceView.php.php?id=" + pid,     // Important
            "cancel_url": "http://localhost/eshop/singleplaceView.php.php?id=" + pid,     // Important
            "notify_url": "http://sample.com/notify",
            "order_id": obj["id"],
            "items": obj["item"],
            "amount": amount,
            "currency": "LKR",
            "hash": obj["hash"], // *Replace with generated hash retrieved from backend
            "first_name": obj["fname"],
            "last_name": obj["lname"],
            "email": umail,
            "phone": obj["mobile"],
            "address": obj["address"],
            "city": obj["city"],
            "country": "Sri Lanka",
            "delivery_address": obj["address"],
            "delivery_city": obj["city"],
            "delivery_country": "Sri Lanka",
            "custom_1": "",
            "custom_2": ""
          };

          // Show the payhere.js popup, when "PayHere Pay" is clicked
          // document.getElementById('payhere-payment').onclick = function (e) {
          payhere.startPayment(payment);
          // };

        }
      }
    }

    r.open("GET", "payNowProcess2.php?id=" + pid + "&qty1=" + qty1 + "&qty2=" + qty2 + "&qty3=" + qty3 + "&date1=" + date1 + "&date2=" + date2, true);
    r.send();

  }


}

function resadultpricing() {

  var adultqty = document.getElementById("numberInpunt10").value;
  var childqty = document.getElementById("numberInpunt11").value;
  var infantqty = document.getElementById("numberInpunt12").value;
  var date1 = document.getElementById("smalDate1").value;
  var date2 = document.getElementById("smalDate2").value;


  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      if (t == "Something went wrong" || t == "Please select start date you w'll stay this"
        || t == "Please select end date you w'll stay this") {
        alert(t);
      } else {
        document.getElementById("oneNghtprice1").innerHTML = t;
      }
    }
  }

  r.open("GET", "addpricingtotals2.php?adqty=" + adultqty + "&chqty=" + childqty + "&inqty=" + infantqty + "&date1=" + date1 + "&date2=" + date2, true);
  r.send();

}


function resadultpricing1() {

  var adultqty = document.getElementById("numberInpunt0").value;
  var childqty = document.getElementById("numberInpunt1").value;
  var infantqty = document.getElementById("numberInpunt2").value;
  var date1 = document.getElementById("lagdate1").value;
  var date2 = document.getElementById("lagdate2").value;


  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      if (t == "Something went wrong" || t == "Please select start date you w'll stay this"
        || t == "Please select end date you w'll stay this") {
        alert(t);
      } else {
        document.getElementById("oneNghtprice").innerHTML = t;
      }
    }
  }

  r.open("GET", "addpricingtotals.php?adqty=" + adultqty + "&chqty=" + childqty + "&inqty=" + infantqty + "&date1=" + date1 + "&date2=" + date2, true);
  r.send();

}

function advancedSearch(x) {

  var search = document.getElementById("advancedSearch").value;
  var plc_cat = document.getElementById("searchplaceCat").value;
  var plc_type = document.getElementById("searchplcType").value;
  var sort = document.getElementById("searchSort").value;
  var coun = document.getElementById("searchCoun").value;
  var city = document.getElementById("searchcity").value;
  var lesprice = document.getElementById("lesPrice").value;
  var highprice = document.getElementById("highPrice").value;
  var pricefil = document.getElementById("searchPriceHigh").value;

  var f = new FormData();
  f.append("text", search);
  f.append("cat", plc_cat);
  f.append("typ", plc_type);
  f.append("time", sort);
  f.append("coun", coun);
  f.append("city", city);
  f.append("lespr", lesprice);
  f.append("highprice", highprice);
  f.append("filteprice", pricefil);
  f.append("page", x);


  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      document.getElementById("card").innerHTML = t;
    }
  }

  r.open("POST", "advancedsearchProccess.php", true);
  r.send(f);


}

function addinvo() {


  var pid = document.getElementById("btnaddInvoice").value;
  var qtyin1 = document.getElementById("numberInpunt0").value;
  var qtyin2 = document.getElementById("numberInpunt1").value;
  var qtyin3 = document.getElementById("numberInpunt2").value;
  var qtylg1 = document.getElementById("numberInpunt10").value;
  var qtylg2 = document.getElementById("numberInpunt11").value;
  var qtylg3 = document.getElementById("numberInpunt12").value;
  var lagdata1 = document.getElementById("lagdate1").value;
  var lagdata2 = document.getElementById("lagdate2").value;
  var smalDate1 = document.getElementById("smalDate1").value;
  var smalDate2 = document.getElementById("smalDate2").value;

  date1 = 0;
  date2 = 0;
  qty1 = 0;
  qty2 = 0;
  qty3 = 0;

  if (smalDate1 == 0 || smalDate2 == 0) {
    if (lagdata1 == 0 || lagdata2 == 0) {
      alert("Please enter checking and checkout dates");
    } else {
      date1 = lagdata1;
      date2 = lagdata2;
    }
  } else {
    date1 = smalDate1;
    date2 = smalDate2;
  }

  if (qtyin1 == 0) {
    qty1 = qtylg1;
  }

  if (qtylg1 == 0) {
    qty1 = qtyin1;
  }

  if (qtyin2 == 0) {
    qty2 = qtylg2;
  }

  if (qtylg2 == 0) {
    qty2 = qtyin2
  }

  if (qtyin3 == 0) {
    qty3 = qtylg3;
  }


  if (qtylg3 == 0) {
    qty3 = qtyin3;
  }


  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.status == 200 && r.readyState == 4) {
      var t = r.responseText;
      if (t == "Success") {
        window.location = "invoice.php";
      } else {
        alert(t);
      }
    }
  }


  r.open("GET", "invoiceProccess.php?id=" + pid + "&qty1=" + qty1 + "&qty2=" + qty2 + "&qty3=" + qty3 + "&date1=" + date1 + "&date2=" + date2, true);
  r.send();



}

function block(customerId) {

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {

    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      if (t == "Success") {
        window.location.reload();
      } else {
        alert(t);
      }
      // if(t == "Successblocking"){
      //   document.getElementById("userblock"+customerId).innerHTML = "Block";
      //   document.getElementById("userblock"+customerId).classList = "btn btn-danger";
      // }
      // if(t == "SuccessUnblocking"){
      //   document.getElementById("userblock"+customerId).innerHTML = "Unblock";
      //   document.getElementById("userblock"+customerId).classList = "btn btn-success";
      // }
    }

  }

  r.open("GET", "blockcustomer.php?cus_id=" + customerId, true);
  r.send();

}


function blockProduct(placeId) {

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {

    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      if (t == "Success") {
        window.location.reload();
      } else {
        alert(t);
      }
      // if(t == "Successblocking"){
      //   document.getElementById("userblock"+customerId).innerHTML = "Block";
      //   document.getElementById("userblock"+customerId).classList = "btn btn-danger";
      // }
      // if(t == "SuccessUnblocking"){
      //   document.getElementById("userblock"+customerId).innerHTML = "Unblock";
      //   document.getElementById("userblock"+customerId).classList = "btn btn-success";
      // }
    }

  }

  r.open("GET", "blockproduct.php?plc_id=" + placeId, true);
  r.send();

}



function searchCUSAdmin() {

  var txt = document.getElementById("searchtxt").value;

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.status == 200 && r.readyState == 4) {
      var t = r.responseText;
      document.getElementById("searchcu").innerHTML = t;
    }
  }

  r.open("GET", "adminSearchcustomer.php?search=" + txt, true);
  r.send();

}


// var cam;
// function contactAdmin(email){
//   var m = document.getElementById("contactAdmin");
//   cam = new bootstrap.Modal(m);
//   cam.show();
// }

var r;
function sendMsgId(reciver_id) {

  r = reciver_id;
  // alert(r);

  // var txt = document.getElementById("msgtextadmin").value;


  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.status == 200 && r.readyState == 4) {
      var t = r.responseText;
      // alert(t);
      // chatapp_divadmin
      // alert(t);
      document.getElementById("offcanvas-bodyadmin").innerHTML = t;



    }
  }

  r.open("GET", "sendmsgProccess.php?reciver=" + reciver_id, true);
  r.send();
}

function gohome(){
  window.location = "index.php";
}

function sendMsgId2(resp) {

  var reciver_id = resp;
  // alert(reciver_id);

  var txt = document.getElementById("msgtextadmin").value;


  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.status == 200 && r.readyState == 4) {
      var t = r.responseText;
      // alert(t);
      // chatapp_divadmin
      document.getElementById("offcanvas-bodyadmin").innerHTML = t;



    }
  }

  r.open("GET", "sendmsgProccess.php?reciver=" + reciver_id + "&admintxt=" + txt, true);
  r.send();
}
// function sendbtncolorchange(){
//    document.getElementById("sendmsgborder").classList = "col-12 rounded-5 p-3  shadow-sm sendmsginput2";
// }

function sendmsg(sender_id) {

  // alert(sender_id);
  var txt = document.getElementById("msgtext");

  // alert(txt.value)

  if (txt.value == "") {
    alert("Please enter text");
  } else {
    var f = new FormData();
    f.append("txt", txt.value);
    f.append("sender", sender_id);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
      if (r.readyState == 4 && r.status == 200) {
        var t = r.responseText;
        // alert(t);
        document.getElementById("offcanvas-bodyuser").innerHTML = t;
      }
    }

    r.open("POST", "sendmsgProccess.php", true);
    r.send(f);
  }



}

// function m() {


//   var r = new XMLHttpRequest();

//   r.onreadystatechange = function () {
//     if (r.readyState == 4 && r.status == 200) {
//       var t = r.responseText;
//       document.getElementById("sendadminmsgBox").innerHTML = t;

//     }
//   }

//   r.open("GET", "refresh.php", true);
//   r.send();

// }




function searchProductAdmin() {

  var text = document.getElementById("prdouctSearchadmin").value;


  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.status == 200 && r.readyState == 4) {
      var t = r.responseText;
      document.getElementById("searchpro").innerHTML = t;
    }
  }

  r.open("GET", "adminSearchProduct.php?search=" + text, true);
  r.send();

}

function addNewitems() {
  document.getElementById("addnewItembox").classList = "col-12 p-2 mt-3";
  document.getElementById("addplusicon").classList = "bi bi-plus-square addsqure d-none";
  document.getElementById("addcloseicon").classList = "bi bi-x-square addsqureclose"
  document.getElementById("addnewitemtext").innerText = "close";
  document.getElementById("addnewitemtext").classList = "redBumba";

  // document.getElementById("addnewitemtext").tex

}

function closeNewitems() {
  document.getElementById("addnewItembox").classList = "col-12 p-2 mt-3 d-none";
  document.getElementById("addplusicon").classList = "bi bi-plus-square addsqure ";
  document.getElementById("addcloseicon").classList = "bi bi-x-square addsqureclose d-none"
  document.getElementById("addnewitemtext").innerText = "Add new items";
  document.getElementById("addnewitemtext").classList = "greenBumba";

  // document.getElementById("addnewitemtext").tex

}

function Insertitem() {
  var item = document.getElementById("selCat").value;
  var nameitem = document.getElementById("nameitem").value;
  var priceitem = document.getElementById("priceitem").value;

  var f = new FormData();
  f.append("item", item);
  f.append("nameitem", nameitem);
  f.append("priceitem", priceitem);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.status == 200 && r.readyState == 4) {
      var t = r.responseText;
      // alert(t);
      if (t == "Please select item category" || t == "Please insert item name for save" ||
        t == "Plese insert item price for selling" || t == "You can only enter number of price" || t == "Verification Code Sending Failed.") {
        alert(t);
      } else {
        alert("Check your email");
        document.getElementById("verifyBoxadmincat").innerHTML = t;
      }
    }
  }

  r.open("POST", "additemsAdmin.php", true);
  r.send(f);

}

function verifyCategory() {
  var item = document.getElementById("selCat").value;
  var nameitem = document.getElementById("nameitem").value;
  var priceitem = document.getElementById("priceitem").value;
  var verify = document.getElementById("verifyadmincat").value;

  var f = new FormData();
  f.append("item", item);
  f.append("nameitem", nameitem);
  f.append("priceitem", priceitem);
  f.append("varify", verify);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.status == 200 && r.readyState == 4) {
      var t = r.responseText;
      if (t == "adding successfull") {
        alert(t);
        window.location.reload();
      } else {
        alert(t);
      }
    }
  }

  r.open("POST", "additemsAdmin.php", true);
  r.send(f);
}

function deleteCategory(cat_id) {

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      alert(t);
    }
  }


  r.open("GET", "adminblockitems.php?category=" + cat_id, true);
  r.send();

}


function watchlist() {

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {

    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      if (t == "Success") {
        window.location = "watchlist.php";
      } else {
        window.location = "signinup.php";
      }
    }

  }

  r.open("POST", "filtersession.php", true);
  r.send();

}

function invoices() {

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {

    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      if (t == "Success") {
        window.location = "viewinvoices.php";
      } else {
        window.location = "signinup.php";
      }
    }

  }

  r.open("POST", "filtersession.php", true);
  r.send();

}

function viewinvoicing(invoice_uniq) {

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      if (t == "success") {
        window.location = "downloadInvoice.php";
      } else {
        alert(t);
      }
    }
  }

  r.open("GET", "sendinvoice.php?invoicingid=" + invoice_uniq, true);
  r.send();

}

function adminsignin() {

  document.getElementById("adminsignbox").classList = "d-none";
  document.getElementById("adinloading").classList = "col-12 d-block+ py-5 loading";

  var email = document.getElementById("adminemail");
  var password = document.getElementById("adminpassword");

  var f = new FormData();
  f.append("email", email.value);
  f.append("password", password.value)

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      if (t == "Verification Code Sending Failed." || t == "Your email or password wrong" || t == "Please Enter your email Address" ||
        t == "Your email address must have between 10 and 100 characters" || t == "Invalid email address" || t == "Please enter your Password" ||
        t == "Your email password must have between 5 and 20 characters") {
        document.getElementById("adminsignbox").classList = "d-block";
        document.getElementById("adinloading").classList = "col-12 d-none py-5 loading";
        alert(t);
      } else {
        document.getElementById("adminsuccess").classList = "col-12 d-block p-5";
        document.getElementById("adminsignbox").classList = "d-none";
        document.getElementById("adinloading").classList = "col-12 d-none py-5 loading";
        document.getElementById("verifyadmin").innerHTML = t;

      }
    }
  }


  r.open("POST", "adminSigninproccess.php", true);
  r.send(f);

}

function adminverify() {

  var verify = document.getElementById("verificationadmin");
  // alert(verify.value);

  var f = new FormData();
  f.append("verify", verify.value);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      if (t == "success") {
        window.location = "adminpanel.php";
      } else {
        alert(t);
      }
    }
  }



  r.open("POST", "verifyadmin.php", true);
  r.send(f);

}

function adminlogin() {
  window.location = "adminsignin.php";
}


function loadChart() {

  loadChart2();
  loadChart3();
  loadChart4();
  var chart1 = document.getElementById("chart1");

  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var resp = req.responseText;

      var json = JSON.parse(resp);

      // setInterval(() => {

      // }, 10);


      new Chart("chart1", {
        type: "line",
        data: {
          labels: json.labels,
          datasets: [{
            fill: false,
            lineTension: 0,
            backgroundColor: "red",
            borderColor: "red",
            data: json.data
          }]
        },
        options: {
          legend: { display: false },
          scales: {
            yAxes: [],
          }
        }
      });

    }
  }

  req.open("GET", "loadchartProccess.php?chart1=" + chart1, true);
  req.send();
}

function loadChart2() {

  var chart2 = document.getElementById("chart2");

  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var resp = req.responseText;

      var json = JSON.parse(resp);

      // setInterval(() => {

      // }, 10);

      new Chart("chart2", {
        type: "line",
        data: {
          labels: json.labels,
          datasets: [{
            fill: false,
            lineTension: 0,
            backgroundColor: "green",
            borderColor: "transparent",
            data: json.data
          }]
        },
        options: {
          legend: { display: false },
          scales: {
            yAxes: [],
          }
        }
      });

    }
  }

  req.open("GET", "loadchartProccess.php?chart2=" + chart2, true);

  req.send();

}

function loadChart3() {


  var chart3 = document.getElementById("chart3");

  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var resp = req.responseText;

      var json = JSON.parse(resp);



      // setInterval(() => {

      // }, 10);

      new Chart("chart3", {
        type: "line",
        data: {
          labels: json.labels,
          datasets: [{
            label: "Added place",
            data: json.data,
            borderColor: "red",
            fill: true
          }, {
            label: "Sold place",
            data: json.data2,
            borderColor: "blue",
            fill: true
          }]
        },
        options: {
          legend: { display: true },
        }
      });

    }
  }

  req.open("GET", "loadchartProccess.php?chart3=" + chart3, true);
  req.send();
}

function loadChart4() {


  var chart4 = document.getElementById("chart4");

  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var resp = req.responseText;

      var json = JSON.parse(resp);



      // setInterval(() => {

      // }, 10);

      const barColors = [
        "#b91d47",
        "#00aba9",
        "#2b5797",
        "#e8c3b9",
        "#1e7145"
      ];

      new Chart("chart4", {
        type: "doughnut",
        data: {
          labels: json.labels,
          datasets: [{
            backgroundColor: barColors,
            data: json.data
          }]
        },
        options: {
          title: {
            display: true,
            text: "World Wide Wine Production 2018"
          }
        }
      });

    }
  }

  req.open("GET", "loadchartProccess.php?chart4=" + chart4, true);
  req.send();
}




// calender 

const daysTag = document.querySelector(".days"),
  currentDate = document.querySelector(".current-date"),
  prevNextIcon = document.querySelectorAll(".icons span");

// getting new date, current year and month
let date = new Date(),
  currYear = date.getFullYear(),
  currMonth = date.getMonth();

// storing full name of all months in array
const months = ["January", "February", "March", "April", "May", "June", "July",
  "August", "September", "October", "November", "December"];

const renderCalendar = () => {
  let firstDayofMonth = new Date(currYear, currMonth, 1).getDay(), // getting first day of month
    lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate(), // getting last date of month
    lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay(), // getting last day of month
    lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate(); // getting last date of previous month
  let liTag = "";

  for (let i = firstDayofMonth; i > 0; i--) { // creating li of previous month last days
    liTag += `<li class="inactive">${lastDateofLastMonth - i + 1}</li>`;
  }

  for (let i = 1; i <= lastDateofMonth; i++) { // creating li of all days of current month
    // adding active class to li if the current day, month, and year matched
    let isToday = i === date.getDate() && currMonth === new Date().getMonth()
      && currYear === new Date().getFullYear() ? "active" : "";
    liTag += `<li class="${isToday}">${i}</li>`;
  }

  for (let i = lastDayofMonth; i < 6; i++) { // creating li of next month first days
    liTag += `<li class="inactive">${i - lastDayofMonth + 1}</li>`
  }
  currentDate.innerText = `${months[currMonth]} ${currYear}`; // passing current mon and yr as currentDate text
  daysTag.innerHTML = liTag;
}
renderCalendar();

prevNextIcon.forEach(icon => { // getting prev and next icons
  icon.addEventListener("click", () => { // adding click event on both icons
    // if clicked icon is previous icon then decrement current month by 1 else increment it by 1
    currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;

    if (currMonth < 0 || currMonth > 11) { // if current month is less than 0 or greater than 11
      // creating a new date of current year & month and pass it as date value
      date = new Date(currYear, currMonth, new Date().getDate());
      currYear = date.getFullYear(); // updating current year with new date year
      currMonth = date.getMonth(); // updating current month with new date month
    } else {
      date = new Date(); // pass the current date as date value
    }
    renderCalendar(); // calling renderCalendar function
  });
});

function forgotpassword() {

  var email = document.getElementById("email").value;

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var resp = r.responseText;
      alert(resp);
    }
  }

  r.open("GET", "forgot_passwordProccess.php?email=" + email, true);
  r.send();

}

function goUpdateproduct(place_id) {

  // alert(place_id);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      // alert(t);
      if (t == "Invalid user" || t == "Invalid enter" || t == "Something went wrong") {
        alert(t);
      } else {
        window.location.href = "updateProduct.php?place_id=" + place_id;
      }
    }
  }


  r.open("GET", "updateProduct.php?place_id=" + place_id, true);
  r.send();


}

function UpdateProduct(place_id) {

  var image = document.getElementById("productimages");

  // alert(image);

  var title = document.getElementById("updatetitle").value;
  var adprice = document.getElementById("adprice").value;
  var chprice = document.getElementById("chprice").value;
  var inprice = document.getElementById("inprice").value;
  var discount = document.getElementById("discountUpdate").value;
  var amentid = document.getElementById("amentid").value;
  var basicfacupId = document.getElementById("facupId").value;
  var sfitupdate = document.getElementById("sfitupdate").value;
  var stamupdate = document.getElementById("stamupdate").value;
  var discrip = document.getElementById("disupdate").value;
  var type = document.getElementById("typeupdate").value;
  var lenght = image.files.length;
  // alert(lenght);

  // alert(amentid);
  var f = new FormData();
  f.append("t", title);
  f.append("ap", adprice);
  f.append("cp", chprice);
  f.append("ip", inprice);
  f.append("d", discount);
  f.append("aid", amentid);
  f.append("bfid", basicfacupId);
  f.append("sf", sfitupdate);
  f.append("st", stamupdate);
  f.append("disc", discrip);
  f.append("place_id", place_id);
  f.append("type", type);
  for (var x = 0; x < lenght; x++) {
    f.append("img" + x, image.files[x]);
  }

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      alert(t);
    }
  }

  r.open("POST", "updateProccess.php", true);
  r.send(f);
}

function changeAutoimg() {

  // alert("ok");

  var image = document.getElementById("productimages");

  image.onchange = function () {

    var file_count = image.files.length;

    if (file_count >= 5) {

      for (var x = 0; x < file_count; x++) {

        var file = this.files[x];
        var url = window.URL.createObjectURL(file);

        document.getElementById("img" + x).src = url;

      }

    } else {
      alert(file_count + " files. You are proceed to upload only 5 or less than 5 files.");
    }

  }
}





function loadchartUser() {

  loadchartUser2();

  var chart = document.getElementById("chart_user");

  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var resp = req.responseText;

      var json = JSON.parse(resp);
      // alert(json.labels);
      // alert(json.data);
      // setInterval(() => {

      // }, 10);

      const xValues = json.labels;
      const yValues = json.data;
      const barColors = ["red", "green", "blue", "orange", "brown"];

      new Chart("chart_user", {
        type: "bar",
        data: {
          labels: xValues,
          datasets: [{
            backgroundColor: barColors,
            data: yValues
          }]
        },
        options: {
          legend: { display: false },
          title: {
            display: true,
            text: "World Wine Production 2018"
          }
        }
      });

    }
  }

  req.open("GET", "loadchartUser_Proccess.php?chart=" + chart, true);
  req.send();
}

function printReport() {
  var orginalContent = document.body.innerHTML;
  var printArea = document.getElementById("printArea");

  document.body.innerHTML = printArea.innerHTML;

  window.print();

  document.body.innerHTML = orginalContent;
}

function loadchartUser2() {

  var chart = document.getElementById("chartstatususer");

  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var resp = req.responseText;
      // alert(resp);
      var json = JSON.parse(resp);
      // alert(json.labels);
      // alert(json.data);
      // setInterval(() => {

      // }, 10);

      const xValues = json.labels;
      const yValues = json.data;
      const barColors = [
        "#b91d47",
        "#00aba9",
        "#2b5797",
        "#e8c3b9",
        "#1e7145"
      ];

      new Chart("chartstatususer", {
        type: "pie",
        data: {
          labels: xValues,
          datasets: [{
            backgroundColor: barColors,
            data: yValues
          }]
        },
        options: {
          title: {
            display: true,
            text: "World Wide Wine Production 2018"
          }
        }
      });

    }
  }

  req.open("GET", "loadchartUser_Proccess.php?chartStatus=" + chart, true);
  req.send();
}

function loadchartPlace() {

  loadchartPlace2();

  var chart = document.getElementById("chart_place");

  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var resp = req.responseText;

      var json = JSON.parse(resp);
      // alert(json.labels);
      // alert(json.data);
      // setInterval(() => {

      // }, 10);

      const xValues = json.labels;
      const yValues = json.data;
      const barColors = ["red", "green", "blue", "orange", "brown"];

      new Chart("chart_place", {
        type: "bar",
        data: {
          labels: xValues,
          datasets: [{
            backgroundColor: barColors,
            data: yValues
          }]
        },
        options: {
          legend: { display: false },
          title: {
            display: true,
            text: "World Wine Production 2018"
          }
        }
      });

    }
  }

  req.open("GET", "loadchartPlace_Proccess.php?chart=" + chart, true);
  req.send();
}

function loadchartPlace2() {

  var chart = document.getElementById("chartstatusplace");

  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var resp = req.responseText;
      // alert(resp);
      var json = JSON.parse(resp);
      // alert(json.labels);
      // alert(json.data);
      // setInterval(() => {

      // }, 10);

      const xValues = json.labels;
      const yValues = json.data;
      const barColors = [
        "#b91d47",
        "#00aba9",
        "#2b5797",
        "#e8c3b9",
        "#1e7145"
      ];

      new Chart("chartstatusplace", {
        type: "pie",
        data: {
          labels: xValues,
          datasets: [{
            backgroundColor: barColors,
            data: yValues
          }]
        },
        options: {
          title: {
            display: true,
            text: "World Wide Wine Production 2018"
          }
        }
      });

    }
  }

  req.open("GET", "loadchartPlace_Proccess.php?chartStatus=" + chart, true);
  req.send();
}

function coment(plc_id) {
  var c = document.getElementById("comentcontent");

  var f = new FormData();
  f.append("c", c.value);
  f.append("pid",plc_id)

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      if(t == "Success"){
        alert("Coment Added");
        window.location.reload();
      }else{
        // alert(t);
        showALert("Warning", t, "warning");
        // alert(t);

      }
    }
  }

  r.open("POST", "comentproccess.php", true);
  r.send(f);

}

function seecoments(){
  
  var comentBox = document.getElementById("comentBox");

 var cls = comentBox.classList.contains('d-none');
 if(cls == true){
  document.getElementById("comentBox").classList = "col-12 d-block";
 }else{
  document.getElementById("comentBox").classList = "col-12 d-none";

 }


}


function showALert(title, text, icon) {
  return Swal.fire({
    title: title,
    text: text,
    icon: icon,
  });
}
