//signup function
function senddata() {
var username = $('#username').val();
var phnumber = $('#phnumber').val();
var dateofbirth = $('#dateofbirth').val();
var email = $('#email').val();
var pwd = $('#pwd').val();
if(username!="" && phnumber!="" && dateofbirth!="" && email!="" && pwd!=""){
  $.ajax({
    url: "../module/signupdata.php",
    type: "POST",
    data: {
      username: username,
      phnumber: phnumber,
      dateofbirth: dateofbirth,
      email: email,
      pwd: pwd,
    },
    cache: false,
    success: function(dataResult){
      var dataResult = JSON.parse(dataResult);
      if(dataResult.statusCode==200){
        $("#signup").removeAttr("disabled");
        $('#user_form').find('input:text').val('');
        $("#success").show();
        $('#success').html('Data Submitted Successfully!');
        $('#success').fadeOut(4000);
      }
      else if(dataResult.statusCode==201)
      {
         alert("Error occured !");
      }

    }
  });
}
else
{
  $("#error").show();
  $('#error').html('Please fill all the fields!');
  $('#error').fadeOut(4000);
}
};

//upload csv file
function md() {
//  alert("checking");
  var csvfile = $('#file')[0].files[0];
  //alert(csvfile);
  var fd = new FormData();
  fd.append('file', csvfile);
  fd.append('action', "importdata");
  $.ajax({
    url: "../module/import_csv.php",
    method: "POST",
    data: fd,
    contentType: false,
    cache: false,
    processData: false,
    success: function(data) {
      if(data == "Error2")
        {
          $("#error").show();
          $('#error').html('File not uploaded');
          $('#error').fadeOut(4000);
        }
        else if(data == "Error1")
          {
            $("#error").show();
            $('#error').html('Please select the file!');
            $('#error').fadeOut(4000);
          }
          else if(data == "Error3")
            {
              $("#error").show();
              $('#error').html('File name is wrong!');
              $('#error').fadeOut(4000);
            }
         else if(data == "Success") {
          $("#success").show();
          $('#success').html('File Uploaded Successfully!');
          $('#success').fadeOut(4000);
        }
     }
  });
};


//upload  2 csv file
function upload() {
  //alert("checking");
  var csvfilename = $('#filename')[0].files[0];
//  alert(csvfile);
  var fd = new FormData();
  fd.append('filename', csvfilename);
  fd.append('action', "importdata");
  $.ajax({
    url: "../module/dynamic_table.php",
    method: "POST",
    data: fd,
    contentType: false,
    cache: false,
    processData: false,
    success: function(datares) {
      if(datares == "error2")
        {
          $("#error").show();
          $('#error').html('File not uploaded');
          $('#error').fadeOut(4000);
        }
        else if(datares == "error1")
          {
            $("#error").show();
            $('#error').html('Please select the file!');
            $('#error').fadeOut(4000);
          }
          else {
           $("#success").show();
           $('#success').html('File Uploaded Successfully!');
           $('#success').fadeOut(4000);
         }
      }
  });
};


//First modal(Add covid data)
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

//second modal(Add data dynamically here)
// Get the modal
var secondmodal = document.getElementById("secondModal");

// Get the button that opens the modal
var button = document.getElementById("secondBtn");

// Get the <span> element that closes the modal
var spanele = document.getElementsByClassName("close1")[0];

// When the user clicks the button, open the modal
button.onclick = function() {
  secondmodal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
spanele.onclick = function() {
  secondmodal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == secondmodal) {
    secondmodal.style.display = "none";
  }
}


//Table Pagination
function load_data(query = '', page_number = 1)
{
	var form_data = new FormData();

	form_data.append('query', query);

	form_data.append('page', page_number);

	var ajax_request = new XMLHttpRequest();

	ajax_request.open('POST', '../module/pagination.php');

	ajax_request.send(form_data);

	ajax_request.onreadystatechange = function()
	{
		if(ajax_request.readyState == 4 && ajax_request.status == 200)
		{
			var response = JSON.parse(ajax_request.responseText);

			var html = '';

			if(response.data.length > 0)
			{
				for(var count = 0; count < response.data.length; count++)
				{
					html += '<tr>';
					html += '<td>'+response.data[count].observationdate+'</td>';
					html += '<td>'+response.data[count].state+'</td>';
					html += '<td>'+response.data[count].country+'</td>';
          html += '<td>'+response.data[count].lastupdate+'</td>';
        	html += '<td>'+response.data[count].confirmed+'</td>';
          html += '<td>'+response.data[count].deaths+'</td>';
          html += '<td>'+response.data[count].recovered+'</td>';
					html += '</tr>';
				}
			}
			else
			{
				html += '<tr><td colspan="3" class="text-center">No Data Found</td></tr>';
			}

			document.getElementById('post_data').innerHTML = html;
      document.getElementById('total_data').innerHTML = response.total_data;
      document.getElementById('pagination_link').innerHTML = response.pagination;

		}
  }
}
window.onload = load_data();


//Infinite scroll
$('#scroll').scroll(function() {
    if ($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
        //  if ($("#table-height").scrollTop() == $(document).height() - $("#table-height").height()){
            if($(".table-data").length < $("#total_count").val()) {
                var lastId = $(".table-data:last").attr("id");
                getMoreData(lastId);
            }
        }
     });

function getMoreData(lastId) {
    $.ajax({
        url: '../module/getmoredata.php?lastId=' + lastId,
        type: "get",
        success: function (data) {
        	  setTimeout(function() {
            $(".scroll-data").append(data);
        	   }, 1000);
        }
   });
}

// Infinite scroll 2
$('#scroll2').scroll(function() {
 if($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
    if($(".add-table-data").length < $("#total_data_count").val()) {
      var lastDataId = $(".add-table-data:last").attr("id");
      loadMoreData(lastDataId);
    }
  }
});

function loadMoreData(lastDataId) {
  $.ajax({
    url: '../module/loadmoredata.php?lastDataId=' + lastDataId,
    type: "get",
    success: function(data) {
      setTimeout(function() {
        $("#add-table-data").append(data);
      }, 1000);
    }
  });
}

//sort by Dropdown
function sortBy(value) {
  var value = document.getElementById("sort").value;
  var action = "sortdata";
//   alert("1");
  $.ajax({
    url: '../module/sortdata.php',
    type: 'POST',
    data: {value: value, action: action},
    success: function(data) {
      $(".sort").html(data);
    }
  });
}
