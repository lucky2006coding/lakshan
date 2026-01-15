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
  }
}



var place_cat;
var dropdown = document.getElementById("dropdown");
var optionBoxes = document.querySelectorAll('.option-box');

optionBoxes.forEach(box => {
  box.addEventListener('click', () => {
    place_cat = box.dataset.value;


  });
});

var place_typ;
var dropdown2 = document.getElementById("dropdown2");
var optionBoxes2 = document.querySelectorAll('.option-box2');

optionBoxes2.forEach(box => {
  box.addEventListener('click', () => {
    place_typ = box.dataset.value;


  });
});


function nextsel() {

  document.getElementById("valback").style.display = 'block';
  document.getElementById("nextback").style.display = 'none';

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      if (t == "Success") {

        place_cat = undefined;


        const carousel = new bootstrap.Carousel(document.getElementById('carouselExample'));

        // Function to automatically slide to the next item
        function autoSlide() {
          carousel.next();
        }

        // Start automatic sliding at a specified interval
        function startAutoSlide(interval) {
          intervalId = setInterval(autoSlide, interval);
        }

        document.getElementById('carouselExample').addEventListener('slid.bs.carousel', () => {
          clearInterval(intervalId);
          //startAutoSlide(3000); // Restart auto sliding after 3 seconds (adjust interval as needed)
        });

        // Start automatic sliding initially
        startAutoSlide(100); // Adjust the interval as needed

        document.getElementById("valnext").style.display = 'none';
        document.getElementById("valnext2").style.display = 'block';
        document.getElementById("valback2").style.display = 'block';
        document.getElementById("valback").style.display = 'none';
      } else {
        alert(t);
      }
    }



  }

  r.open("GET", "addProductProccess.php?place_cat=" + place_cat, true);
  r.send();



}


function nextsel2() {

  // document.getElementById("valback2").style.display = 'block';
  // document.getElementById("nextback2").style.display = 'none';

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      if (t == "Success") {

        place_typ = undefined;

        document.getElementById("valnext3").style.display = 'block';
        document.getElementById("valnext2").style.display = 'none';
        document.getElementById("valback2").style.display = 'none';
        document.getElementById("valback3").style.display = 'block';

        const carousel = new bootstrap.Carousel(document.getElementById('carouselExample'));

        // Function to automatically slide to the next item
        function autoSlide() {
          carousel.next();
        }

        // Start automatic sliding at a specified interval
        function startAutoSlide(interval) {
          intervalId = setInterval(autoSlide, interval);
        }

        document.getElementById('carouselExample').addEventListener('slid.bs.carousel', () => {
          clearInterval(intervalId);
          //startAutoSlide(3000); // Restart auto sliding after 3 seconds (adjust interval as needed)
        });

        // Start automatic sliding initially
        startAutoSlide(100); // Adjust the interval as needed


      } else {
        alert(t);
      }
    }



  }

  r.open("GET", "addProductProccess.php?place_typ=" + place_typ, true);
  r.send();


}



function valback2() {
  document.getElementById("valnext").style.display = 'block';
  document.getElementById("valnext2").style.display = 'none';
  document.getElementById("valback2").style.display = 'none';
  document.getElementById("valback").style.display = 'block';
}

function valback() {
  document.getElementById("nextback").style.display = 'block';
  document.getElementById("valback").style.display = 'none';
  document.getElementById("valnext").style.display = 'none';
  document.getElementById("carnext").style.display = 'block';
}

function nextcar() {
  document.getElementById("carnext").style.display = 'none';
  document.getElementById("valnext").style.display = 'block';
}

function back() {
  // window.location = "index.php";
  document.getElementById("carnext").style.display = 'block';
  document.getElementById("valnext").style.display = 'none';
}

function valback3() {
  document.getElementById("valnext2").style.display = 'block';
  document.getElementById("valnext3").style.display = 'none';
  document.getElementById("valback2").style.display = 'block';
  document.getElementById("valback3").style.display = 'none';
}


function nextsel3() {
  document.getElementById("valnext3").style.display = 'none';
  document.getElementById("valnext4").style.display = 'block';
  document.getElementById("valback3").style.display = 'none';
  document.getElementById("valback4").style.display = 'block';
}

function valback4() {
  document.getElementById("valnext3").style.display = 'block';
  document.getElementById("valnext4").style.display = 'none';
  document.getElementById("valback3").style.display = 'block';
  document.getElementById("valback4").style.display = 'none';
}

function valback5() {
  document.getElementById("valback4").style.display = 'block';
  document.getElementById("valback5").style.display = 'none';
  document.getElementById("valnext5").style.display = 'none';
  document.getElementById("valnext4").style.display = 'block';
}

function nextsel4() {


  var country = document.getElementById("country2");
  var address1 = document.getElementById("address1");
  var address2 = document.getElementById("address2");
  var city = document.getElementById("city");
  var state = document.getElementById("state");

  var f = new FormData();
  f.append("coun", country.value);
  f.append("address1", address1.value);
  f.append("address2", address2.value);
  f.append("city", city.value);
  f.append("state", state.value);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {

    if (r.status == 200 && r.readyState == 4) {
      var t = r.responseText;
      if (t == "Success") {

        document.getElementById("valnext5").style.display = 'block';
        document.getElementById("valnext4").style.display = 'none';
        document.getElementById("valback4").style.display = 'none';
        document.getElementById("valback5").style.display = 'block';

        const carousel = new bootstrap.Carousel(document.getElementById('carouselExample'));

        // Function to automatically slide to the next item
        function autoSlide() {
          carousel.next();
        }

        // Start automatic sliding at a specified interval
        function startAutoSlide(interval) {
          intervalId = setInterval(autoSlide, interval);
        }

        document.getElementById('carouselExample').addEventListener('slid.bs.carousel', () => {
          clearInterval(intervalId);
          //startAutoSlide(3000); // Restart auto sliding after 3 seconds (adjust interval as needed)
        });

        // Start automatic sliding initially
        startAutoSlide(100);

      } else {
        alert(t);
      }
    }

  }


  r.open("POST", "addProductProccess.php", true);
  r.send(f);

}


function nextsel5(number) {

  var f = new FormData();

  for (var y = 1; y < number + 1; y++) {

    var fac_id = document.getElementById("numberInpunt" + y);

    f.append("fac_name" + y, fac_id.value);

  }

  f.append("fac_length", number);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.status == 200 && r.readyState == 4) {
      var t = r.responseText;
      if (t == "Success") {

        document.getElementById("valnext6").style.display = 'block';
        document.getElementById("valnext5").style.display = 'none';
        document.getElementById("valback5").style.display = 'none';
        document.getElementById("valback6").style.display = 'block';

        const carousel = new bootstrap.Carousel(document.getElementById('carouselExample'));

        // Function to automatically slide to the next item
        function autoSlide() {
          carousel.next();
        }

        // Start automatic sliding at a specified interval
        function startAutoSlide(interval) {
          intervalId = setInterval(autoSlide, interval);
        }

        document.getElementById('carouselExample').addEventListener('slid.bs.carousel', () => {
          clearInterval(intervalId);
          //startAutoSlide(3000); // Restart auto sliding after 3 seconds (adjust interval as needed)
        });

        // Start automatic sliding initially
        startAutoSlide(100);

      } else {
        alert(t);
      }
    }

  }

  r.open("POST", "addProductProccess.php", true);
  r.send(f);

}

function nextsel6() {
  document.getElementById("valback6").style.display = 'none';
  document.getElementById("valback7").style.display = 'block';
  document.getElementById("valnext6").style.display = 'none';
  document.getElementById("valnext7").style.display = 'block';
}

function valback6() {
  document.getElementById("valback6").style.display = 'none';
  document.getElementById("valback5").style.display = 'block';
  document.getElementById("valnext6").style.display = 'none';
  document.getElementById("valnext5").style.display = 'block';
}

function valback7() {
  document.getElementById("valback7").style.display = 'none';
  document.getElementById("valback6").style.display = 'block';
  document.getElementById("valnext7").style.display = 'none';
  document.getElementById("valnext6").style.display = 'block';
}

function valback8() {
  document.getElementById("valback8").style.display = 'none';
  document.getElementById("valback7").style.display = 'block';
  document.getElementById("valnext8").style.display = 'none';
  document.getElementById("valnext7").style.display = 'block';
}

function valback9() {
  document.getElementById("valback9").style.display = 'none';
  document.getElementById("valback8").style.display = 'block';
  document.getElementById("valnext9").style.display = 'none';
  document.getElementById("valnext8").style.display = 'block';
}

function nextsel7() {
  document.getElementById("valback7").style.display = 'none';
  document.getElementById("valback8").style.display = 'block';
  document.getElementById("valnext7").style.display = 'none';
  document.getElementById("valnext8").style.display = 'block';
}

function valback10() {
  document.getElementById("valback10").style.display = 'none';
  document.getElementById("valback9").style.display = 'block';
  document.getElementById("valnext10").style.display = 'none';
  document.getElementById("valnext9").style.display = 'block';
}


function valback11() {
  document.getElementById("valback11").style.display = 'none';
  document.getElementById("valback10").style.display = 'block';
  document.getElementById("valnext11").style.display = 'none';
  document.getElementById("valnext10").style.display = 'block';
}

function valback12() {
  document.getElementById("valback12").style.display = 'none';
  document.getElementById("valback11").style.display = 'block';
  document.getElementById("valnext12").style.display = 'none';
  document.getElementById("valnext11").style.display = 'block';
}

function valback13() {
  document.getElementById("valback13").style.display = 'none';
  document.getElementById("valback12").style.display = 'block';
  document.getElementById("valnext13").style.display = 'none';
  document.getElementById("valnext12").style.display = 'block';
}

// function nextsel7(){

//   var selece = document.getElementById("dropdown3");

//   alert(selece.length);

// }

function upautoAment(btn) {
  let id = btn.getAttribute("data-value");

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.status == 200 && r.readyState == 4) {
      var t = r.responseText;
      alert(t);
    }
  }

  r.open("GET", "addProductProccess.php?ament_id=" + id, true);
  r.send();



}



function upsatnamen(btn) {
  let id = btn.getAttribute("data-value");

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.status == 200 && r.readyState == 4) {
      var t = r.responseText;
      alert(t);
    }
  }

  r.open("GET", "addProductProccess.php?satndament_id=" + id, true);
  r.send();


}


function upsafeitem(btn) {
  let id = btn.getAttribute("data-value");

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.status == 200 && r.readyState == 4) {
      var t = r.responseText;
      alert(t);
    }
  }

  r.open("GET", "addProductProccess.php?safety_id=" + id, true);
  r.send();

}

function changeProductImage() {

  var image = document.getElementById("inputimgetag");

  image.onchange = function () {

    var file_count = image.files.length;

    if (file_count <= 4) {

      for (var x = 0; x < file_count; x++) {

        var file = this.files[x];
        var url = window.URL.createObjectURL(file);

        document.getElementById("img" + x).src = url;

      }

    } else {
      alert(file_count + " files. You are proceed to upload only 4 or less than 4 files.");
    }

  }
}

function nextsel8() {

  var image = document.getElementById("inputimgetag");
  var lenght = image.files.length;

  if (lenght <= 4) {

    var f = new FormData();

    for (var x = 0; x < lenght; x++) {
      f.append("img" + x, image.files[x]);
    }

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {

      if (r.readyState == 4) {
        var t = r.responseText;
        if (t == "Product images saved successfully") {

          document.getElementById("valnext9").style.display = 'block';
          document.getElementById("valnext8").style.display = 'none';
          document.getElementById("valback8").style.display = 'none';
          document.getElementById("valback9").style.display = 'block';

          const carousel = new bootstrap.Carousel(document.getElementById('carouselExample'));

          // Function to automatically slide to the next item
          function autoSlide() {
            carousel.next();
          }

          // Start automatic sliding at a specified interval
          function startAutoSlide(interval) {
            intervalId = setInterval(autoSlide, interval);
          }

          document.getElementById('carouselExample').addEventListener('slid.bs.carousel', () => {
            clearInterval(intervalId);
            //startAutoSlide(3000); // Restart auto sliding after 3 seconds (adjust interval as needed)
          });

          // Start automatic sliding initially
          startAutoSlide(100);


        } else if (t == "Not an allowed image type") {
          alert(t);
        } else {
          alert("Please enter place photos");
        }
      }
    }

    r.open("POST", "addProductProccess.php", true);
    r.send(f);
  } else {
    alert("Please enter the photos ");
  }
}

function nextsel9() {

  var title = document.getElementById("title");

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {

    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      if (t == "Success") {

        document.getElementById("valnext10").style.display = 'block';
        document.getElementById("valnext9").style.display = 'none';
        document.getElementById("valback9").style.display = 'none';
        document.getElementById("valback10").style.display = 'block';

        const carousel = new bootstrap.Carousel(document.getElementById('carouselExample'));

        // Function to automatically slide to the next item
        function autoSlide() {
          carousel.next();
        }

        // Start automatic sliding at a specified interval
        function startAutoSlide(interval) {
          intervalId = setInterval(autoSlide, interval);
        }

        document.getElementById('carouselExample').addEventListener('slid.bs.carousel', () => {
          clearInterval(intervalId);
          //startAutoSlide(3000); // Restart auto sliding after 3 seconds (adjust interval as needed)
        });

        // Start automatic sliding initially
        startAutoSlide(100);

      } else {
        alert(t);
      }
    }

  }


  r.open("GET", "addProductProccess.php?title=" + title.value, true);
  r.send();

}

function nextsel10() {

  var disc = document.getElementById("disc");

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {

    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      if (t == "Success") {

        document.getElementById("valnext11").style.display = 'block';
        document.getElementById("valnext10").style.display = 'none';
        document.getElementById("valback10").style.display = 'none';
        document.getElementById("valback11").style.display = 'block';

        const carousel = new bootstrap.Carousel(document.getElementById('carouselExample'));

        // Function to automatically slide to the next item
        function autoSlide() {
          carousel.next();
        }

        // Start automatic sliding at a specified interval
        function startAutoSlide(interval) {
          intervalId = setInterval(autoSlide, interval);
        }

        document.getElementById('carouselExample').addEventListener('slid.bs.carousel', () => {
          clearInterval(intervalId);
          //startAutoSlide(3000); // Restart auto sliding after 3 seconds (adjust interval as needed)
        });

        // Start automatic sliding initially
        startAutoSlide(100);

      } else {
        alert(t);
      }
    }

  }


  r.open("GET", "addProductProccess.php?disc=" + disc.value, true);
  r.send();

}

function nextsel11() {
  document.getElementById("valback11").style.display = 'none';
  document.getElementById("valback12").style.display = 'block';
  document.getElementById("valnext11").style.display = 'none';
  document.getElementById("valnext12").style.display = 'block';

  const carousel = new bootstrap.Carousel(document.getElementById('carouselExample'));

  // Function to automatically slide to the next item
  function autoSlide() {
    carousel.next();
  }

  // Start automatic sliding at a specified interval
  function startAutoSlide(interval) {
    intervalId = setInterval(autoSlide, interval);
  }

  document.getElementById('carouselExample').addEventListener('slid.bs.carousel', () => {
    clearInterval(intervalId);
    //startAutoSlide(3000); // Restart auto sliding after 3 seconds (adjust interval as needed)
  });

  // Start automatic sliding initially
  startAutoSlide(100);

}

function nextsel12() {

  var adpr = document.getElementById("adultprice");
  var chpr = document.getElementById("childprice");
  var inf = document.getElementById("infantprice");

  var f = new FormData();
  f.append("adpr", adpr.value);
  f.append("chpr", chpr.value);
  f.append("inf", inf.value);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      if (t == "Success") {

        document.getElementById("valnext13").style.display = 'block';
        document.getElementById("valnext12").style.display = 'none';
        document.getElementById("valback12").style.display = 'none';
        document.getElementById("valback13").style.display = 'block';

        price();

        const carousel = new bootstrap.Carousel(document.getElementById('carouselExample'));

        // Function to automatically slide to the next item
        function autoSlide() {
          carousel.next();
        }

        // Start automatic sliding at a specified interval
        function startAutoSlide(interval) {
          intervalId = setInterval(autoSlide, interval);
        }

        document.getElementById('carouselExample').addEventListener('slid.bs.carousel', () => {
          clearInterval(intervalId);
          //startAutoSlide(3000); // Restart auto sliding after 3 seconds (adjust interval as needed)
        });

        // Start automatic sliding initially
        startAutoSlide(100);

      } else {
        alert(t);
      }
    }
  }

  r.open("POST", "addProductProccess.php", true);
  r.send(f);

}

function exitaddpr() {
  window.location = "index.php";
}

function price() {



  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {

    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      document.getElementById("btnautopice").innerHTML = "Pay Now : LKR " + t;
      document.getElementById("btnautopice").value = t;


    }

  }

  r.open("POST", "addautopriceproccess.php", true);
  r.send();

}

function autopay(price) {

  //  addprice();


  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {

    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      // alert(t);
      var obj = JSON.parse(t);

      var umail = obj["umail"];
      var amount = obj["amount"];

      if (t == "address, country error") {
        alert("Please Update your profile");
        // addprice();
        window.location = "profile.php";
      } else {



        payhere.onCompleted = function onCompleted(orderId) {
          console.log("Payment completed. OrderID:" + orderId);

          addprice();
          // window.location = "invoice.php";
      

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
          "return_url": "http://localhost/project_002/index.php",     // Important
          "cancel_url": "http://localhost/project_002/index.php",     // Important
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

  r.open("GET", "paynowproccess.php?price=" + price, true);
  r.send();

}

function addprice() {

  $update = "update";

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var t = r.responseText;
      alert(t);
    }
  }

  r.open("GET", "addautopriceproccess.php?update=" + $update, true);
  r.send();

}