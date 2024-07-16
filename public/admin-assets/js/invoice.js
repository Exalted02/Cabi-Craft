var AppsScriptLink = localStorage.getItem('appApiKey'); // exaltedsol04 latest

//var AppsScriptLink ="AKfycbyvdYLqyHaCpdN3f6DzxGVL4H2xQ1Il2Oo9GjKWy1ceCJnsuL5wIJhuiYpdLczSa1VMiQ";


function GetPrint()
{
    /*For Print*/
    window.print();
}

function BtnAdd_s()
{
    /*Add Button*/
    var v = $("#TRow").clone().appendTo("#TBody") ;
    $(v).find("input").val('');
    $(v).removeClass("d-none");
    $(v).find("th").first().html($('tr').length - 2);
}
function Add_Items()
{
	$("#errormsg").html('');
	$("#inputFormModal").modal('show');
	$("#materialSelect").val('').trigger('change');
	$("#materialSelect").val('').trigger('change');
	$("#cabinetcolour").val('').trigger('change');
	$("#exposide").val('').trigger('change');
	$("#shuttermaterial").val('').trigger('change');
	$("#legtype").val('').trigger('change');
	$("#handeltype").val('').trigger('change');
	$("#width").val('');
	$("#length").val('');
	$("#deep").val('');
	$("#qty").val('');
	$("#expocolour").val('');
	$("#shuttercolour").val('');
	$("#sktheight").val('');
	
}

function BtnDel_s(v)
{
    /*Delete Button*/
    $(v).parent().parent().remove();
    GetTotal();
    ReGenSrNo();
}

function ReGenSrNo()
{
     $("#TBody").find("tr").each(
     function(index)
     {
          $(this).find("th").first().html(index);
     }
     );
}

function Calc(v)
{
    /*Detail Calculation Each Row*/
    var index = $(v).parent().parent().index();

    var qty = document.getElementsByName("qty")[index].value;
    var rate = document.getElementsByName("rate")[index].value;

    var amt = qty * rate;
    document.getElementsByName("amt")[index].value = amt;

    GetTotal();
}

function GetTotal()
{
    /*Footer Calculation*/  

    var sum=0;
    var amts =  document.getElementsByName("amt");

    for (let index = 0; index < amts.length; index++)
    {
        var amt = amts[index].value;
        sum = +(sum) +  +(amt) ;
    }

    document.getElementById("FTotal").value = sum;

    var gst =  document.getElementById("FGST").value;
    var net = +(sum) + +(gst);
    document.getElementById("FNet").value = net;
}
$(document).ready(function () {
	//alert("api---"+AppsScriptLink);
	//alert('ok2');
	//alert(JSON.stringify(jsonMaterial));
	//alert(JSON.stringify(jsonData[1].subcategories[1].text));
    FormValidation();
    SetCurrentDate();
    //BtnAdd();
    FillDataList();
    MaxInv();
  
    // ----- for get 18mm material value------
	 localStorage.removeItem("json18mmMaterial");
	 localStorage.removeItem("json6mmMaterial");
	 localStorage.removeItem("json18mmShutter");
	 

});


function FillDataList()
{
        $.getJSON("https://script.google.com/macros/s/"+AppsScriptLink+"/exec?page=dropdown",
       
        function (data) {

          var Options="";

          $.each(data, function(key, value)
          {
            Options = Options + '<option>' + value + '</option>';
          });

          $("#mylist").append(Options);
         
        });
}

function MaxInv()
{
	/*$("input[name='inv_no']").val(1);
	 $.getJSON("https://script.google.com/macros/s/"+AppsScriptLink+"/exec?page=max",
        function (data) {
        
			$("input[name='inv_no']").val(data);

        });*/
	$.getJSON("https://script.google.com/macros/s/"+AppsScriptLink+"/exec?page=max",
        function (data) {
			
			if(data.maxSerialNo!= null)
			{
				//alert(data.invoiceNoValues.length);
				$("input[name='inv_no']").val(data.maxSerialNo);
				//$("input[name='inv_sl']").val(data.maxSerialNo);
				
				//let flattenedValues = data.invoiceNoValues.flat().filter(value => typeof value === 'string' && value.startsWith('INV-'));
				//let lastInvoice = incrementAlphanumeric(flattenedValues[flattenedValues.length-1]);
				
				//alert(lastInvoice);
				//console.log(lastInvoice);
				//$("input[name='inv_no']").val(lastInvoice);
				var lastSlNo  = 'INV-0'+data.maxSerialNo;
				$("input[name='inv_sl']").val(lastSlNo);
				//$("input[name='inv_sl']").val(lastInvoice);
				
			}
			else{
				//alert('2');
				var initial_val = 'INV-001';
				$("input[name='inv_no']").val(1);
				$("input[name='inv_sl']").val(initial_val);
				//$("input[name='inv_no']").val(initial_val);
				//$("input[name='inv_sl']").val(1);
			}
		});
}


function SetCurrentDate()
{
    const date = new Date();
    console.log(date);

    let d = date.getDate();
    let m = date.getMonth() + 1;
    let y = date.getFullYear();

    if (d < 10) d = '0' + d;
    if (m < 10) m = '0' + m;

    let CurrDate = y + '-' + m + '-' + d;

    $('input[name="inv_dt"]').val(CurrDate);

}


function FormValidation()
{
    // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
    'use strict'
 
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')
 
    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
			//alert('ok');
          }
 
          form.classList.add('was-validated')
        }, false)
      })
  })()
}

function Search(pNo="")
{
	var roleId = $("#role_id").val();
	var usr = $("#username").val();
	//alert(usr);
	$("#handlesearchSubmit").show();
	$("#handleSubmit").hide();
		var no = $('#inv_no').val();
		if (pNo != "") no = pNo;

        $.getJSON("https://script.google.com/macros/s/"+AppsScriptLink+"/exec?page=search&no="+no+"&usr="+usr,
        function (data) {
			//alert(data);
          console.log(data);
          if (data == "NOT FOUND")
          {
            alert('Invoice No. Not Found...');
		  }
          else
          {
			localStorage.removeItem("searchformData");
            //var record = data;
			//console.log(data);
            var record   = data.record;
            console.log(record);
            var StartRow = data.SR;
            var RowCount = data.CNT;

            $('#IsNew').val('N');
            $('#StartRow').val(StartRow);
            $('#RowCount').val(RowCount);
         
            var i = 0;
            $.each(record, function(key, value)
            {
              //alert(i);
			  
              if (i == 0)
              {
                var dt = value[1].substring(0,10);
                document.getElementsByName("inv_no")[0].value = value[0];
                document.getElementsByName("inv_dt")[0].value = dt;
                document.getElementsByName("cust_nm")[0].value = value[2];
                document.getElementsByName("addr")[0].value = value[3];
                document.getElementsByName("city")[0].value = value[4];
                document.getElementsByName("state")[0].value = value[5];
                document.getElementsByName("zipcode")[0].value = value[6];
              }
              else
               {
				   var excelArray = []; 
					excelArray  = [value[7], value[8], value[9], value[10], value[11], value[12], value[13],
					 value[14],value[15],value[16],value[17],value[18],value[19],value[20],value[21],value[22],value[23],value[26],value[28],value[31],value[32]];
					searchCode(excelArray);  
				}

              i = i + 1;
            });

            GetTotal();
			ReGenSrNo();
			clearFormFields();
			//displayStoredData();
			//alert('ok');
			displaySearchStoredData();
          }
        });
		$('#exampleModal').modal('hide');
}
function searchCode(arr)
{
	var searchInvoice 			= arr[0];
	var searchCategory 			= arr[1];
    var searchSubcategory 		= arr[2];
    var searchCabinetType 		= arr[3];
    var searchWidth 			= arr[4];
    var searchLength 			= arr[5];
    var searchDeep				= arr[6];
    var searchQuantity 			= arr[7];
    var searchMaterial 			= arr[8];
    var searchCabinetcolour 	= arr[9];
    var searchExposide 			= arr[10];
    var searchExpocolour 		= arr[11];
    var searchShuttermaterial 	= arr[12];
    var searchShuttercolour 	= arr[13];
    var searchLegtype 			= arr[14];
    var searchSkthigh 			= arr[15];
    var searchHandeltype 		= arr[16];
    var searchPrice 		    = arr[17];  // excel column-price
	var searchLXD 		    	= arr[18];  // L*D
	var searchWXL 		    	= arr[19];  // W*L
	var searchWXD 		    	= arr[20];  // W*D
	//alert(searchInvoice);
	$("input[name='inv_sl']").val(searchInvoice);
	//alert(searchShuttermaterial);
	var jsonMaterial = JSON.parse(localStorage.getItem('jsonMaterial'));
	var selectedMaterial = jsonMaterial.find(material => material.text === searchMaterial);
	//alert(searchMaterial);
	//alert(selectedMaterial);
	var jsonCabinet = JSON.parse(localStorage.getItem('jsonCabinet'));
	var selectedcabinetcolour = jsonCabinet.find(cabinet => cabinet.text == searchCabinetcolour);
	
	var jsonExposide = JSON.parse(localStorage.getItem('jsonExposide'));
	var selectedexposide = jsonExposide.find(exposide => exposide.text == searchExposide);
	
	var jsonShutterMaterial = JSON.parse(localStorage.getItem('jsonShutterMaterial'));
	var selectedshuttermaterial = jsonShutterMaterial.find(shutter => shutter.text == searchShuttermaterial);
	
	var jsonlegtype = JSON.parse(localStorage.getItem('jsonlegtype'));
	var selectedlegtype = jsonlegtype.find(legtype => legtype.text == searchLegtype);
	
	var jsonHandeltype = JSON.parse(localStorage.getItem('jsonHandeltype'));
	var selectedhandeltype = jsonHandeltype.find(handeltype => handeltype.text == searchHandeltype);
	//alert(selectedhandeltype.id);
	
	
		var jsonData = JSON.parse(localStorage.getItem('jsonData'));
		var selectedCategory = jsonData.find(category => category.text === searchCategory);
		//alert(selectedshuttermaterial.id.id);
		
		var CTyP  = getCabinetTypePrices(searchCabinetType);
		var LD  		= CTyP[0];
		var WD  		= CTyP[1];
		var WL  		= CTyP[2];
		var hardWareAmt = CTyP[3];
		
		var A1 = LengthDeep(LD,searchLength,searchDeep,searchQuantity);
		var A2 = DeepWidth(WD,searchWidth,searchDeep,searchQuantity);
		var A3 = LengthWidth(WL,searchWidth,searchLength,searchQuantity);
		var sftRate   = (searchPrice/A3);
		
	  
		if (selectedCategory) {
			// Find the subcategory within the selected category
			var selectedSubcategory = selectedCategory.subcategories.find(subcategory => subcategory.text === searchSubcategory);
			//alert(selectedSubcategory.id);
			if (selectedSubcategory) {
				// Find the cabinet type within the selected subcategory
				var selectedCabinetType = selectedSubcategory.cabinetTypes.find(cabinetType => cabinetType.text === searchCabinetType);
				var cabinetTypeImg  = selectedCabinetType ? selectedCabinetType.image : ''
				//alert(selectedCabinetType.id);
				if (selectedCabinetType) {
					// Create an entry with the found data
					var searchformData = {
						categoryId 		: selectedCategory.id,
						category		: searchCategory,
						subcategoryId	: selectedSubcategory.id,
						subcategory		: searchSubcategory,
						cabinetTypeId	: selectedCabinetType.id,
						cabinetType		: searchCabinetType,
						width			: searchWidth,
						deep			: searchDeep,
						length			: searchLength,
						qty				: searchQuantity,
						materialSelectId: selectedMaterial.id,
						materialText	: searchMaterial,
						cabinetcolourId	: selectedcabinetcolour.id,
						cabinetcolourText: searchCabinetcolour,
						exposideId		: selectedexposide.id,
						exposideText	: searchExposide,
						
						expocolour		: searchExpocolour,
						shuttermaterialId	: selectedshuttermaterial.id,
						shuttermaterialText	: searchShuttermaterial,
						
						shuttercolour	: searchShuttercolour,
						legtypeId		: selectedlegtype.id,
						legtypeText		: searchLegtype,
						sktheight		: searchSkthigh,
						handeltypeId	: selectedhandeltype.id,
						handeltypeText	: searchHandeltype,
						A1              : A1,
						A2              : A2,
						A3              : A3,
						price			: searchPrice,
						cabinetTypeImg  : cabinetTypeImg,
						sftRate         : sftRate.toFixed(2)
					};
					// Retrieve existing data from local storage or initialize an empty array
					var searchstoredData = JSON.parse(localStorage.getItem('searchformData')) || [];
					// Add the entry to the array
					searchstoredData.push(searchformData);

					// Save the updated data back to local storage
					localStorage.setItem('searchformData', JSON.stringify(searchstoredData));
					// Display the data in the table
					//displayStoredData();
					$("#mode").val('searchData');
				} else {
					console.log('Cabinet type not found.');
				}
			} else {
				console.log('Subcategory not found.');
			}
		} else {
			console.log('Category not found.');
		}
		
	//}
}
function displayStoredData_bck()
{
	// Retrieve data from local storage
    var storedData = JSON.parse(localStorage.getItem('formData')) || [];
	
}
function ShowAllData() // coment in html page
{
	$(document).ready(function (){
		
		$.getJSON("https://script.google.com/macros/s/"+AppsScriptLink+"/exec?page=all",
        function (data) {
	
		var Table="", Rows="", Columns="";
		$.each(data, function(key, value)
		{
			var InvNo="";
			Columns ="";
			i=0;
			$.each(value, function(key1, value1)
			{
				i++;
				if (i ==2) 
				{
					value1 = "" + value1;
					value1 = value1.substring(0, 10);	
				}
				Columns = Columns + '<td>' + value1 + '</td>';
				if (InvNo == "") InvNo = value1;
				
				
			});
			Rows = Rows + '<tr onclick="Search('+InvNo+')">' + Columns + '</tr>';
		});
		
		$("#MyTBody").html(Rows);
		$('#exampleModal').modal('show');
	});	
	});			

}


// Assuming you have the functions for initializing Select2 and handling subcategory/cabinet type updates

// Function to handle form submission
function handleSubmit() {
    var categoryID 	  		= $('#categorySelect').val();
    var subcategoryID 		= $('#subcategorySelect').val();
    var cabinetTypeID 		= $('#cabinetTypeSelect').val();
    var width 		  		= $('#width').val();
    var deep 		  		= $('#deep').val();
    var length 		  		= $('#length').val();
    var qty 		  		= $('#qty').val();
    var materialSelectId 	= $('#materialSelect').val();
    var cabinetcolourId 	= $('#cabinetcolour').val();
    var exposideId 		    = $('#exposide').val();
    var expocolour 		    = $('#expocolour').val();
    var shuttermaterialId 	= $('#shuttermaterial').val();
    var shuttercolour 		= $('#shuttercolour').val();
    var legtypeId 		    = $('#legtype').val();
    var sktheight 		    = $('#sktheight').val();
    var handeltypeId 		= $('#handeltype').val();
	//alert(categoryID);alert(subcategoryID);alert(cabinetTypeID);
    if(categoryID =='') 
	{ 
		$("#categoryErr").append('<span class="error-text">Category field required</span>');
		return false;
	} 
	else if(subcategoryID =='')
	{
		$("#subcategoryErr").html('<span class="error-text">Sub category field required</span>');
		return false;
	}
	else if(cabinetTypeID =='')
	{
		$("#cabinetTypeErr").html('<span class="error-text">cabinet type field required</span>');
		return false;
	}
	else if(width =='')
	{
		$("#widthErr").html('<span class="error-text">Width field required</span>');
		return false;
	}
	else if(deep =='')
	{
		$("#deepErr").html('<span class="error-text">Deep field required</span>');
		return false;
	}
	else if(length =='')
	{
		$("#lengthErr").html('<span class="error-text">Length field required</span>');
		return false;
	}
	else if(qty =='')
	{
		$("#qtyErr").html('<span class="error-text">Quantity field required</span>');
		return false;
	}
	else if(materialSelectId =='')
	{
		$("#materialselectErr").html('<span class="error-text">Material field required</span>');
		return false;
	}
	else if(cabinetcolourId =='')
	{
		$("#cabinetcolourErr").html('<span class="error-text">Cabinet colour field required</span>');
		return false;
	}
	else if(exposideId =='')
	{
		$("#exposideErr").html('<span class="error-text">Exposide field required</span>');
		return false;
	}
	else if(expocolour =='')
	{
		$("#expocolourErr").html('<span class="error-text">Expocolour field required</span>');
		return false;
	}
	else if(shuttermaterialId =='')
	{
		$("#shuttermaterialErr").html('<span class="error-text">Shutter material field required</span>');
		return false;
	}
	else if(shuttercolour =='')
	{
		$("#shuttercolourErr").html('<span class="error-text">Shutter colour field required</span>');
		return false;
	}
	else if(legtypeId =='')
	{
		$("#legtypeErr").html('<span class="error-text">Legtype field required</span>');
		return false;
	}
	else if(sktheight =='')
	{
		$("#sktheightErr").html('<span class="error-text">Skt height field required</span>');
		return false;
	}
	else if(handeltypeId =='')
	{
		$("#handeltypeErr").html('<span class="error-text">Handeltype field required</span>');
		return false;
	}
	else
	{
			var jsonData = JSON.parse(localStorage.getItem('jsonData'));
			var selectedCategory = jsonData.find(category => category.id == categoryID);
			var categoryText = selectedCategory ? selectedCategory.text : '';
			 
			var selectedSubcategory = selectedCategory ? selectedCategory.subcategories.find(subcategory => subcategory.id == subcategoryID) : null;
			var subcategoryText = selectedSubcategory ? selectedSubcategory.text : '';
			
			var selectedCabinetType = selectedSubcategory ? selectedSubcategory.cabinetTypes.find(cabinetType => cabinetType.id == cabinetTypeID) : null;
			var cabinetTypeText = selectedCabinetType ? selectedCabinetType.text : '';
			var cabinetTypeImg  = selectedCabinetType ? selectedCabinetType.image : '';
			
			
			var jsonMaterial = JSON.parse(localStorage.getItem('jsonMaterial'));
			//alert(JSON.stringify(jsonMaterial[0].text));
			var selectedMaterial = jsonMaterial.find(material => material.id == materialSelectId);
			var materialText = selectedMaterial ? selectedMaterial.text : '';
			
			var jsonCabinet = JSON.parse(localStorage.getItem('jsonCabinet'));
			var selectedcabinetcolour = jsonCabinet.find(cabinet => cabinet.id == cabinetcolourId);
			var cabinetcolourText = selectedcabinetcolour ? selectedcabinetcolour.text : '';
			
			var jsonExposide = JSON.parse(localStorage.getItem('jsonExposide'));
			var selectedexposide = jsonExposide.find(exposide => exposide.id == exposideId);
			var selectedexposideText = selectedexposide ? selectedexposide.text : '';
			
			var jsonShutterMaterial = JSON.parse(localStorage.getItem('jsonShutterMaterial'));
			var selectedshuttermaterial = jsonShutterMaterial.find(shutter => shutter.id == shuttermaterialId);
			var selectedshuttermaterialText = selectedshuttermaterial ? selectedshuttermaterial.text : '';
			
			var jsonlegtype = JSON.parse(localStorage.getItem('jsonlegtype'));
			var selectedlegtype = jsonlegtype.find(legtype => legtype.id == legtypeId);
			var selectedlegtypeText = selectedlegtype ? selectedlegtype.text : '';
			
			var jsonHandeltype = JSON.parse(localStorage.getItem('jsonHandeltype'));
			var selectedhandeltype = jsonHandeltype.find(handeltype => handeltype.id == handeltypeId);
			var selectedhandeltypeText = selectedhandeltype ? selectedhandeltype.text : '';
			// Validate the form data as needed 
		  //alert(subcategoryID);alert(cabinetTypeID);
			// Create an object to represent the form entry
			
			// ---- price calculation start  LXD--WXD--LXW----
			var CTyP  = getCabinetTypePrices(cabinetTypeText);
			var LD  		= CTyP[0];
			var WD  		= CTyP[1];
			var WL  		= CTyP[2];
			var hardWareAmt = CTyP[3];
			
			var A1 = LengthDeep(LD,length,deep,qty);
			var A2 = DeepWidth(WD,width,deep,qty);
			var A3 = LengthWidth(WL,width,length,qty);
			
			var Ply18MMValMt 	=  getMaterialPly18MMValue(materialText); // material value
			//console.log("matval18mm-> "+Ply18MMValMt);
			var Ply6MMValMt  	=  getMaterialPly6MMValue(materialText);  // material value
			var Ply18MMValSh  	=  getshutterPly18MMValue(selectedshuttermaterialText); // shutter material val
			
			//var hardWareAmt = getHardwarePrice();
			//var hardWareAmt = 500;
			var expoLP1     = getLeftsidePrice1();
			var expoLP2     = getLeftsidePrice2();
			var expoRP1     = getRightsidePrice1();
			var expoRP2     = getRightsidePrice2();
			var expoBothP1  = getBothsidePrice1();
			//console.log("left-side-price-1:-"+expoLP1);
			if(selectedexposideText == "Left Side Expo")
			{
				//expoValue  		=  parseFloat(A1*0.5*60) + parseFloat(hardWareAmt);
				expoValue  		=  parseFloat(A1*expoLP1*expoLP2) + parseFloat(hardWareAmt);
			}
			else if(selectedexposideText == "Right Side Expo")
			{
				expoValue  		=  parseFloat(A1*expoRP1*expoRP2) + parseFloat(hardWareAmt);
			}
			else if(selectedexposideText == "Both side Expo")
			{
				//console.log(selectedexposideText);
				var expoValue  =  parseFloat(A1*expoBothP1) + parseFloat(hardWareAmt);
			}
			else if(selectedexposideText == "Without Expo")
			{
				var expoValue  =  hardWareAmt;
			}
			var arrPrice = [];
			arrPrice = [A1, A2, A3, Ply18MMValMt, Ply6MMValMt, Ply18MMValSh, expoValue];
			var price = getPrice(arrPrice);
			var sftRate   = (price/A3);
			
			//----- price calculation end-----------------
			
			var formData = {
				categoryId 		: categoryID,
				category		: categoryText,
				subcategoryId	: subcategoryID,
				subcategory		: subcategoryText,
				cabinetTypeId	: cabinetTypeID,
				cabinetType		: cabinetTypeText,
				width			: width,
				deep			: deep,
				length			: length,
				qty				: qty,
				materialSelectId: materialSelectId,
				materialText	: materialText,
				cabinetcolourId	: cabinetcolourId,
				cabinetcolourText: cabinetcolourText,
				exposideId		: exposideId,
				exposideText	: selectedexposideText,
				expocolour		: expocolour,
				shuttermaterialId	: shuttermaterialId,
				shuttermaterialText	: selectedshuttermaterialText,
				shuttercolour	: shuttercolour,
				legtypeId		: legtypeId,
				legtypeText		: selectedlegtypeText,
				sktheight		: sktheight,
				handeltypeId	: handeltypeId,
				handeltypeText	: selectedhandeltypeText,
				A1              : A1,
				A2              : A2,
				A3              : A3,
				price           : price,
				cabinetTypeImg  : cabinetTypeImg,
				sftRate         : sftRate.toFixed(2)
			};
			
			// Retrieve existing data from localStorage or initialize an empty array
			var storedData = JSON.parse(localStorage.getItem('formData')) || [];

			// Add the new form entry to the array
			storedData.push(formData);
			
			// Store the updated array back in localStorage
			localStorage.setItem('formData', JSON.stringify(storedData));

			$("#inputFormModal").modal('hide');
			// Clear the form fields after submission
			clearFormFields();
			//localStorage.removeItem("formData")
			//location.reload();
			// Update the table with the stored data
			$("#mode").val('addData');
			displayStoredData();
		
	}
}
function handleSearchSubmit() {
    var categoryID 	  		= $('#categorySelect').val();
    var subcategoryID 		= $('#subcategorySelect').val();
    var cabinetTypeID 		= $('#cabinetTypeSelect').val();
    var width 		  		= $('#width').val();
    var deep 		  		= $('#deep').val();
    var length 		  		= $('#length').val();
    var qty 		  		= $('#qty').val();
    var materialSelectId 	= $('#materialSelect').val();
    var cabinetcolourId 	= $('#cabinetcolour').val();
    var exposideId 		    = $('#exposide').val();
    var expocolour 		    = $('#expocolour').val();
    var shuttermaterialId 	= $('#shuttermaterial').val();
    var shuttercolour 		= $('#shuttercolour').val();
    var legtypeId 		    = $('#legtype').val();
    var sktheight 		    = $('#sktheight').val();
    var handeltypeId 		= $('#handeltype').val();
    if(categoryID =='') 
	{ 
		$("#categoryErr").append('<span class="error-text">Category field required</span>');
		return false;
	} 
	else if(subcategoryID =='')
	{
		$("#subcategoryErr").html('<span class="error-text">Sub category field required</span>');
		return false;
	}
	else if(cabinetTypeID =='')
	{
		$("#cabinetTypeErr").html('<span class="error-text">cabinet type field required</span>');
		return false;
	}
	else if(width =='')
	{
		$("#widthErr").html('<span class="error-text">Width field required</span>');
		return false;
	}
	else if(deep =='')
	{
		$("#deepErr").html('<span class="error-text">Deep field required</span>');
		return false;
	}
	else if(length =='')
	{
		$("#lengthErr").html('<span class="error-text">Length field required</span>');
		return false;
	}
	else if(qty =='')
	{
		$("#qtyErr").html('<span class="error-text">Quantity field required</span>');
		return false;
	}
	else if(materialSelectId =='')
	{
		$("#materialselectErr").html('<span class="error-text">Material field required</span>');
		return false;
	}
	else if(cabinetcolourId =='')
	{
		$("#cabinetcolourErr").html('<span class="error-text">Cabinet colour field required</span>');
		return false;
	}
	else if(exposideId =='')
	{
		$("#exposideErr").html('<span class="error-text">Exposide field required</span>');
		return false;
	}
	else if(expocolour =='')
	{
		$("#expocolourErr").html('<span class="error-text">Expocolour field required</span>');
		return false;
	}
	else if(shuttermaterialId =='')
	{
		$("#shuttermaterialErr").html('<span class="error-text">Shutter material field required</span>');
		return false;
	}
	else if(shuttercolour =='')
	{
		$("#shuttercolourErr").html('<span class="error-text">Shutter colour field required</span>');
		return false;
	}
	else if(legtypeId =='')
	{
		$("#legtypeErr").html('<span class="error-text">Legtype field required</span>');
		return false;
	}
	else if(sktheight =='')
	{
		$("#sktheightErr").html('<span class="error-text">Skt height field required</span>');
		return false;
	}
	else if(handeltypeId =='')
	{
		$("#handeltypeErr").html('<span class="error-text">Handeltype field required</span>');
		return false;
	}
	else
	{
			var jsonData = JSON.parse(localStorage.getItem('jsonData'));
			var selectedCategory = jsonData.find(category => category.id == categoryID);
			var categoryText = selectedCategory ? selectedCategory.text : '';
			 
			var selectedSubcategory = selectedCategory ? selectedCategory.subcategories.find(subcategory => subcategory.id == subcategoryID) : null;
			var subcategoryText = selectedSubcategory ? selectedSubcategory.text : '';
			
			var selectedCabinetType = selectedSubcategory ? selectedSubcategory.cabinetTypes.find(cabinetType => cabinetType.id == cabinetTypeID) : null;
			var cabinetTypeText = selectedCabinetType ? selectedCabinetType.text : '';
			var cabinetTypeImg  = selectedCabinetType ? selectedCabinetType.image : '';
			
			var jsonMaterial = JSON.parse(localStorage.getItem('jsonMaterial'));
			var selectedMaterial = jsonMaterial.find(material => material.id == materialSelectId);
			var materialText = selectedMaterial ? selectedMaterial.text : '';
			
			var jsonCabinet = JSON.parse(localStorage.getItem('jsonCabinet'));
			var selectedcabinetcolour = jsonCabinet.find(cabinet => cabinet.id == cabinetcolourId);
			var cabinetcolourText = selectedcabinetcolour ? selectedcabinetcolour.text : '';
			
			var jsonExposide = JSON.parse(localStorage.getItem('jsonExposide'));
			var selectedexposide = jsonExposide.find(exposide => exposide.id == exposideId);
			var selectedexposideText = selectedexposide ? selectedexposide.text : '';
			
			var jsonShutterMaterial = JSON.parse(localStorage.getItem('jsonShutterMaterial'));
			var selectedshuttermaterial = jsonShutterMaterial.find(shutter => shutter.id == shuttermaterialId);
			var selectedshuttermaterialText = selectedshuttermaterial ? selectedshuttermaterial.text : '';
			
			var jsonlegtype = JSON.parse(localStorage.getItem('jsonlegtype'));
			var selectedlegtype = jsonlegtype.find(legtype => legtype.id == legtypeId);
			var selectedlegtypeText = selectedlegtype ? selectedlegtype.text : '';
			
			var jsonHandeltype = JSON.parse(localStorage.getItem('jsonHandeltype'));
			var selectedhandeltype = jsonHandeltype.find(handeltype => handeltype.id == handeltypeId);
			var selectedhandeltypeText = selectedhandeltype ? selectedhandeltype.text : '';
		// Validate the form data as needed
		// Create an object to represent the form entry
		
		//------calculation --LXD--WXD---WXL---Price-----
		var CTyP  = getCabinetTypePrices(cabinetTypeText);
		var LD  		= CTyP[0];
		var WD  		= CTyP[1];
		var WL  		= CTyP[2];
		var hardWareAmt = CTyP[3];
		
		var A1 = LengthDeep(LD,length,deep,qty);
		var A2 = DeepWidth(WD,width,deep,qty);
		var A3 = LengthWidth(WL,width,length,qty);

		var Ply18MMValMt 	=  getMaterialPly18MMValue(materialText); // material value
		var Ply6MMValMt  	=  getMaterialPly6MMValue(materialText);  // material value
		var Ply18MMValSh  	=  getshutterPly18MMValue(selectedshuttermaterialText); // shutter material val
        
		
		//var hardWareAmt = getHardwarePrice();
			//var hardWareAmt = 500;
			var expoLP1     = getLeftsidePrice1();
			var expoLP2     = getLeftsidePrice2();
			var expoRP1     = getRightsidePrice1();
			var expoRP2     = getRightsidePrice2();
			var expoBothP1  = getBothsidePrice1();
			//console.log("left-side-price-1:-"+expoLP1);
			if(selectedexposideText == "Left Side Expo")
			{
				//expoValue  		=  parseFloat(A1*0.5*60) + parseFloat(hardWareAmt);
				expoValue  		=  parseFloat(A1*expoLP1*expoLP2) + parseFloat(hardWareAmt);
			}
			else if(selectedexposideText == "Right Side Expo")
			{
				expoValue  		=  parseFloat(A1*expoRP1*expoRP2) + parseFloat(hardWareAmt);
			}
			else if(selectedexposideText == "Both side Expo")
			{
				//console.log(selectedexposideText);
				var expoValue  =  parseFloat(A1*expoBothP1) + parseFloat(hardWareAmt);
			}
			else if(selectedexposideText == "Without Expo")
			{
				var expoValue  =  hardWareAmt;
			}
		
		var arrPrice = [];
		arrPrice = [A1, A2, A3, Ply18MMValMt, Ply6MMValMt, Ply18MMValSh, expoValue];
		var price = getPrice(arrPrice);

		var sftRate   = (price/A3);
		//------ end calculation -----------
		
			var searchformData = {
				categoryId 		: categoryID,
				category		: categoryText,
				subcategoryId	: subcategoryID,
				subcategory		: subcategoryText,
				cabinetTypeId	: cabinetTypeID,
				cabinetType		: cabinetTypeText,
				width			: width,
				deep			: deep,
				length			: length,
				qty				: qty,
				materialSelectId: materialSelectId,
				materialText	: materialText,
				cabinetcolourId	: cabinetcolourId,
				cabinetcolourText: cabinetcolourText,
				exposideId		: exposideId,
				exposideText	: selectedexposideText,
				expocolour		: expocolour,
				shuttermaterialId	: shuttermaterialId,
				shuttermaterialText	: selectedshuttermaterialText,
				shuttercolour	: shuttercolour,
				legtypeId		: legtypeId,
				legtypeText		: selectedlegtypeText,
				sktheight		: sktheight,
				handeltypeId	: handeltypeId,
				handeltypeText	: selectedhandeltypeText,
				A1              : A1,
				A2              : A2,
				A3              : A3,
				price           : price,
				cabinetTypeImg  : cabinetTypeImg,
				sftRate         : sftRate.toFixed(2)
			};
			
			// Retrieve existing data from localStorage or initialize an empty array
			var searchstoredData = JSON.parse(localStorage.getItem('searchformData')) || [];

			// Add the new form entry to the array
			searchstoredData.push(searchformData);
			
			// Store the updated array back in localStorage
			localStorage.setItem('searchformData', JSON.stringify(searchstoredData));

			$("#inputFormModal").modal('hide');
			// Clear the form fields after submission
			clearFormFields();
			//localStorage.removeItem("formData")
			//location.reload();
			// Update the table with the stored data
			$("#mode").val('searchData');
			displaySearchStoredData();
	}
}
// Function to clear form fields
function clearFormFields() {
    $('#categorySelect').val('');
    $('#subcategorySelect').val('');
    $('#cabinetTypeSelect').val('');
    $('#width').val('');
}

function deleteRow(index) {
    var storedData = JSON.parse(localStorage.getItem('formData')) || [];

    // Remove the entry at the specified index
    storedData.splice(index, 1);

    // Update localStorage with the modified array
    localStorage.setItem('formData', JSON.stringify(storedData));

    // Update the table with the updated data
    displayStoredData();
}
function deleteSearchRow(index) {
    var storedData = JSON.parse(localStorage.getItem('searchformData')) || [];

    // Remove the entry at the specified index
    storedData.splice(index, 1);

    // Update localStorage with the modified array
    localStorage.setItem('searchformData', JSON.stringify(storedData));

    // Update the table with the updated data
    displaySearchStoredData();
}

function editRow(index) {
	$("#handleSearchEdit").hide();
	$("#handleEdit").show();
	var storedData = JSON.parse(localStorage.getItem('formData')) || [];
    var entry = storedData[index];
	
	var jsonData = JSON.parse(localStorage.getItem('jsonData'));
		$('#editcategorySelect').select2({
			data: jsonData,
			templateResult: formatCategory,
			templateSelection: formatCategorySelection,
			dropdownParent: $('#eselectcategory'),
		});

		//-----------------------------------------------
		$('#editsubcategorySelect').select2({
				data: jsonData,
				templateResult: formatEditSubcategory,
				templateSelection: formatEditSubcategorySelection,
				dropdownParent: $('#escategory'),
			});
		$('#editcabinetTypeSelect').select2({
				data: jsonData,
				templateResult: formatEditcabinettype,
				templateSelection: formatEditCabinettypeSelection,
				dropdownParent: $('#ectype'),
			});
        //-----------------------------------------------		

			  // Initialize Select2 for cabinet type dropdown
			  $('#editcabinetTypeSelect').select2();

			  // Event listener for changes in the category dropdown
			$('#editcategorySelect').on('change', function() {
				var categoryId = $(this).val();
				var selectedCategory = jsonData.find(category => category.id == categoryId);
                //console.log(selectedCategory);
				var editsubcategoryData = [{ id: '', text2: 'Please Select Subcategory' }].concat(selectedCategory.subcategories.map(subcategory => ({
					id: subcategory.id,
					text: '<div class="subcategory-item">' +
					'<div class="subcategory-image"><img src="' + subcategory.image + '" class="img-thumbnail"/></div>' +
					'<div class="subcategory-text">' + subcategory.text + '</div>' +
					'</div>',
				    text2: '<span><img src="' + subcategory.image + '" class="img-thumbnail" style="width: 30px; height: 30px; margin-right: 5px;  margin-top: -11px;" /> ' + subcategory.text + '</span>',
				})));
				console.log(editsubcategoryData);
				// Initialize Select2 for subcategory dropdown
				$('#editsubcategorySelect').empty().select2({
					data: editsubcategoryData,
					escapeMarkup: function(markup) {
						return markup; // Allows HTML in the result text
					},
					templateResult: function(data) {
						return data.text; // Use the HTML from the text property for display
					},
					templateSelection: function(data) {
						return data.text2; // Use the HTML from the text property for selection
					},
					dropdownParent: $('#escategory'),
				});
				
				// Clear and disable the cabinet type dropdown
				//$('#editcabinetTypeSelect').empty().prop('disabled', true).select2();
			});
			
			//----------custom function edit subcategory------
			$('#editsubcategorySelect').on('change', function() {
				var editsubcategoryId = $(this).val();
				var selectedCategory = $('#editcategorySelect').val();
				var selectedCategoryObj = jsonData.find(category => category.id == selectedCategory);

				if (selectedCategoryObj) {
					var selectedSubcategory = selectedCategoryObj.subcategories.find(subcategory => subcategory.id == editsubcategoryId);

					// Update the cabinet type dropdown
					if (selectedSubcategory) {
						//var cabinetTypesData = [{ id: '', text: 'Please Select' }].concat(selectedSubcategory.cabinetTypes || []);
						var cabinetTypesData = [{ id: '', text2: 'Please Select CabinetType' }].concat(selectedSubcategory.cabinetTypes.map(cabinettypes => ({
							id: cabinettypes.id,
							text: '<div class="subcategory-item">' +
							'<div class="subcategory-image"><img src="' + cabinettypes.image + '" class="img-thumbnail"/></div>' +
							'<div class="subcategory-text">' + cabinettypes.text + '</div>' +
						    '</div>',
						    text2: '<span><img src="' + cabinettypes.image + '" class="img-thumbnail" style="width: 30px; height: 30px; margin-right: 5px;  margin-top: -11px;" /> ' + cabinettypes.text + '</span>',
						})));
						// Initialize Select2 for cabinet type dropdown
						$('#editcabinetTypeSelect').empty().prop('disabled', false).select2({
							data: cabinetTypesData,
							escapeMarkup: function(markup) {
								return markup; // Allows HTML in the result text
							},
							templateResult: function(data) {
								return data.text; // Use the HTML from the text property for display
							},
							templateSelection: function(data) {
								return data.text2; // Use the HTML from the text property for selection
							},
							dropdownParent: $('#ectype'),
						});
					} else {
						// Clear and disable the cabinet type dropdown if no subcategory is selected
						//$('#editcabinetTypeSelect').empty().prop('disabled', true).select2();
					}
				}
			});
			
			// Custom function to format the displayed category option
			function formatCategory(category) {
				if (!category.id) {
				  return category.text;
				}

				/*var $category = $(
				  '<span><img src="' + category.image + '" class="img-thumbnail" style="width: 30px; height: 30px; margin-right: 5px;" /> ' + category.text + '</span>'
				);*/
				var $category = $(
				  '<div class="category-item">' +
					'<div class="category-image"><img src="' + category.image + '" class="img-thumbnail"/></div>' +
					'<div class="category-text">' + category.text + '</div>' +
				  '</div>'
				);

				return $category;
			}

			  // Custom function to format the selected category option
			function formatCategorySelection(category) {
				if (!category.id) {
				  return category.text;
				}

				return $(
				  '<span><img src="' + category.image + '" class="img-thumbnail" style="width: 35px; height: 35px; margin-right: 5px; margin-top: -11px;" /> ' + category.text + '</span>'
				);
			}
		//------------------------------------------
			function formatEditSubcategory(subcategory) {
				return subcategory.text;
			}	
			  
			function formatEditSubcategorySelection(subcategory) {
				return subcategory.text;
			}
			function formatEditcabinettype(cabinetType)
			{
				 return cabinetType.text;
			}
			function formatEditCabinettypeSelection(cabinetType)
			{
				return cabinetType.text;
			}
		$('#editcategorySelect').val(entry.categoryId).trigger('change');
		$('#editsubcategorySelect').val(entry.subcategoryId).trigger('change');
		$('#editcabinetTypeSelect').val(entry.cabinetTypeId).trigger('change');
	//------ for material-------
	var jsonMaterial = JSON.parse(localStorage.getItem('jsonMaterial'));
	$("#editmaterialSelect").select2({
			data: jsonMaterial,
			templateResult: formatMaterial,
			templateSelection: formatMaterialSelection,
			dropdownParent: $('#eselectmaterial'),
		});
	
		function formatMaterial(material)
		{
			if (!material.id) {
			  return material.text;
			}

			/*var $material = $(
			  '<span><img src="' + material.image + '" class="img-thumbnail" style="width: 30px; height: 30px; margin-right: 5px;" /> ' + material.text + '</span>'
			);*/
			var $material = $(
			'<div class="itemType-item">' +
					'<div class="itemType-image"><img src="' + material.image + '" class="img-thumbnail"/></div>' +
					'<div class="itemType-text">' + material.text + '</div>' +
			'</div>'
			);

			return $material;
		}
		function formatMaterialSelection(material)
		{
			if (!material.id) {
			  return material.text;
			}

			return $(
			  '<span><img src="' + material.image + '" class="img-thumbnail" style="width: 35px; height: 35px; margin-right: 5px; margin-top: -11px;" /> ' + material.text + '</span>'
			);
		}
		$('#editmaterialSelect').val(entry.materialSelectId).trigger('change');
	//------------- for cabinet colour--------------------------
	var jsonCabinet = JSON.parse(localStorage.getItem('jsonCabinet'));
		$("#editcabinetcolour").select2({
			data: jsonCabinet,
			templateResult: formatCabinet,
			templateSelection: formatCabinetSelection,
			dropdownParent: $('#eccolor'),
		});
		function formatCabinet(cabinet)
		{
			if (!cabinet.id) {
			  return cabinet.text;
			}

			/*var $cabinet = $(
			  '<span><img src="' + cabinet.image + '" class="img-thumbnail" style="width: 30px; height: 30px; margin-right: 5px;" /> ' + cabinet.text + '</span>'
			);*/
			var $cabinet = $(
			'<div class="itemType-item">' +
					'<div class="itemType-image"><img src="' + cabinet.image + '" class="img-thumbnail"/></div>' +
					'<div class="itemType-text">' + cabinet.text + '</div>' +
			'</div>'
			);

			return $cabinet;
		}
		function formatCabinetSelection(cabinet)
		{
			if (!cabinet.id) {
			  return cabinet.text;
			}

			return $(
			  '<span><img src="' + cabinet.image + '" class="img-thumbnail" style="width: 35px; height: 35px; margin-right: 5px; margin-top: -11px;" /> ' + cabinet.text + '</span>'
			);
		}
		$('#editcabinetcolour').val(entry.cabinetcolourId).trigger('change');
   //--------------------- expo side----------------------------------
	var jsonExposide = JSON.parse(localStorage.getItem('jsonExposide'));
	$("#editexposide").select2({
			data: jsonExposide,
			templateResult: formatExposide,
			templateSelection: formatExposideSelection,
			dropdownParent: $('#eeside'),
		});
		function formatExposide(exposide)
		{
			if (!exposide.id) {
			  return exposide.text;
			}

			/*var $exposide = $(
			  '<span><img src="' + exposide.image + '" class="img-thumbnail" style="width: 30px; height: 30px; margin-right: 5px;" /> ' + exposide.text + '</span>'
			);*/
			var $exposide = $(
			'<div class="itemType-item">' +
					'<div class="itemType-image"><img src="' + exposide.image + '" class="img-thumbnail"/></div>' +
					'<div class="itemType-text">' + exposide.text + '</div>' +
			'</div>'
			);

			return $exposide;
		}
		function formatExposideSelection(exposide)
		{
			if (!exposide.id) {
			  return exposide.text;
			}

			return $(
			  '<span><img src="' + exposide.image + '" class="img-thumbnail" style="width: 35px; height: 35px; margin-right: 5px; margin-top: -11px;" /> ' + exposide.text + '</span>'
			);
		}
		$('#editexposide').val(entry.exposideId).trigger('change');
	//--------------------- Shutter  Material----------------------
	var jsonShutterMaterial = JSON.parse(localStorage.getItem('jsonShutterMaterial'));
	$("#editshuttermaterial").select2({
			data: jsonShutterMaterial,
			templateResult: formatShutterMaterial,
			templateSelection: formatShutterMaterialSelection,
			dropdownParent: $('#esmaterial'),
		});
		function formatShutterMaterial(shutter)
		{
			if (!shutter.id) {
			  return shutter.text;
			}

			/*var $shutter = $(
			  '<span><img src="' + shutter.image + '" class="img-thumbnail" style="width: 30px; height: 30px; margin-right: 5px;" /> ' + shutter.text + '</span>'
			);*/
			var $shutter = $(
			'<div class="itemType-item">' +
					'<div class="itemType-image"><img src="' + shutter.image + '" class="img-thumbnail"/></div>' +
					'<div class="itemType-text">' + shutter.text + '</div>' +
			'</div>'
		);


			return $shutter;
		}
		function formatShutterMaterialSelection(shutter)
		{
			if (!shutter.id) {
			  return shutter.text;
			}

			return $(
			  '<span><img src="' + shutter.image + '" class="img-thumbnail" style="width: 35px; height: 35px; margin-right: 5px; margin-top: -11px;" /> ' + shutter.text + '</span>'
			);
		}
		$('#editshuttermaterial').val(entry.shuttermaterialId).trigger('change');
	//--------------------- Leg Type-------------------------
	var jsonlegtype = JSON.parse(localStorage.getItem('jsonlegtype'));
	 $("#editlegtype").select2({
			data: jsonlegtype,
			templateResult: formatLegtype,
			templateSelection: formatLegtypeSelection,
			dropdownParent: $('#eltype'),
		});
		function formatLegtype(legtype)
		{
			if (!legtype.id) {
			  return legtype.text;
			}

			/*var $legtype = $(
			  '<span><img src="' + legtype.image + '" class="img-thumbnail" style="width: 30px; height: 30px; margin-right: 5px;" /> ' + legtype.text + '</span>'
			);*/
			var $legtype = $(
			'<div class="itemType-item">' +
					'<div class="itemType-image"><img src="' + legtype.image + '" class="img-thumbnail"/></div>' +
					'<div class="itemType-text">' + legtype.text + '</div>' +
			'</div>'
		);

			return $legtype;
		}
		function formatLegtypeSelection(legtype)
		{
			if (!legtype.id) {
			  return legtype.text;
			}

			return $(
			  '<span><img src="' + legtype.image + '" class="img-thumbnail" style="width: 35px; height: 35px; margin-right: 5px; margin-top: -11px;" /> ' + legtype.text + '</span>'
			);
		}
		$('#editlegtype').val(entry.legtypeId).trigger('change');
	//--------------------- Handel Type----------------------
	var jsonHandeltype = JSON.parse(localStorage.getItem('jsonHandeltype'));
		$("#edithandeltype").select2({
			data: jsonHandeltype,
			templateResult: formatHandeltype,
			templateSelection: formatHandeltypeSelection,
			dropdownParent: $('#ehtype'),
		});
		function formatHandeltype(handeltype)
		{
			if (!handeltype.id) {
			  return handeltype.text;
			}

			/*var $handeltype = $(
			  '<span><img src="' + handeltype.image + '" class="img-thumbnail" style="width: 30px; height: 30px; margin-right: 5px;" /> ' + handeltype.text + '</span>'
			);*/
			var $handeltype = $(
			'<div class="itemType-item">' +
					'<div class="itemType-image"><img src="' + handeltype.image + '" class="img-thumbnail"/></div>' +
					'<div class="itemType-text">' + handeltype.text + '</div>' +
			'</div>'
		);

			return $handeltype;
		}
		function formatHandeltypeSelection(handeltype)
		{
			if (!handeltype.id) {
			  return handeltype.text;
			}

			return $(
			  '<span><img src="' + handeltype.image + '" class="img-thumbnail" style="width: 35px; height: 35px; margin-right: 5px; margin-top: -11px;" /> ' + handeltype.text + '</span>'
			);
		}
		$('#edithandeltype').val(entry.handeltypeId).trigger('change');
	//------------------------------------------------------------------------------------
    $('#editwidth').val(entry.width);
    $('#editdeep').val(entry.deep);
    $('#editlength').val(entry.length);
    $('#editqty').val(entry.qty);
    $('#editexpocolour').val(entry.expocolour);
    $('#editshuttercolour').val(entry.shuttercolour);
    $('#editsktheight').val(entry.sktheight);
    $('#editid').val(index);
	$("#editFormModal").modal('show');
    // Create an update button in the form to handle the update functionality
    $('#updateButton').off('click').on('click', function () {
        // Update the corresponding entry in localStorage
        storedData[index] = {
            category: $('#categorySelect').val(),
            subcategory: $('#subcategorySelect').val(),
            cabinetType: $('#cabinetTypeSelect').val(),
            width: $('#width').val(),
            length: $('#length').val(),
            qty: $('#qty').val()
        };

        // Save the updated data to localStorage
        localStorage.setItem('formData', JSON.stringify(storedData));
        
        // Update the table with the updated data
        displayStoredData();
    });

    // Show the form or modal for editing
    // ...

    // You might need to hide the "Edit" button or disable it while editing
    // ...
}

function searchEditRow(index) {
	$("#handleSearchEdit").show();
	$("#handleEdit").hide();
	var storedData = JSON.parse(localStorage.getItem('searchformData')) || [];
    var entry = storedData[index];
	var jsonData = JSON.parse(localStorage.getItem('jsonData'));
		$('#editcategorySelect').select2({
			data: jsonData,
			templateResult: formatCategory,
			templateSelection: formatCategorySelection,
			dropdownParent: $('#eselectcategory'),
		});

		//-----------------------------------------------
		$('#editsubcategorySelect').select2({
				data: jsonData,
				templateResult: formatEditSubcategory,
				templateSelection: formatEditSubcategorySelection,
				dropdownParent: $('#escategory'),
			});
		$('#editcabinetTypeSelect').select2({
				data: jsonData,
				templateResult: formatEditcabinettype,
				templateSelection: formatEditCabinettypeSelection,
				dropdownParent: $('#ectype'),
			});
        //-----------------------------------------------		

			  // Initialize Select2 for cabinet type dropdown
			  $('#editcabinetTypeSelect').select2();

			  // Event listener for changes in the category dropdown
			$('#editcategorySelect').on('change', function() {
				var categoryId = $(this).val();
				var selectedCategory = jsonData.find(category => category.id == categoryId);
                //console.log(selectedCategory);
				var editsubcategoryData = [{ id: '', text2: 'Please Select Sucategory' }].concat(selectedCategory.subcategories.map(subcategory => ({
					id: subcategory.id,
					text: '<div class="subcategory-item">' +
						'<div class="subcategory-image"><img src="' + subcategory.image + '" class="img-thumbnail"/></div>' +
						'<div class="subcategory-text">' + subcategory.text + '</div>' +
						'</div>',
					text2: '<span><img src="' + subcategory.image + '" class="img-thumbnail" style="width: 30px; height: 30px; margin-right: 5px;  margin-top: -11px;" /> ' + subcategory.text + '</span>',
				})));
				//console.log(editsubcategoryData);
				// Initialize Select2 for subcategory dropdown
				$('#editsubcategorySelect').empty().select2({
					data: editsubcategoryData,
					escapeMarkup: function(markup) {
						return markup; // Allows HTML in the result text
					},
					templateResult: function(data) {
						return data.text; // Use the HTML from the text property for display
					},
					templateSelection: function(data) {
						return data.text2; // Use the HTML from the text property for selection
					},
					dropdownParent: $('#escategory'),
				});
				
				// Clear and disable the cabinet type dropdown
				//$('#editcabinetTypeSelect').empty().prop('disabled', true).select2();
			});
			
			//----------custom function edit subcategory------
			$('#editsubcategorySelect').on('change', function() {
				var editsubcategoryId = $(this).val();
				var selectedCategory = $('#editcategorySelect').val();
				var selectedCategoryObj = jsonData.find(category => category.id == selectedCategory);

				if (selectedCategoryObj) {
					var selectedSubcategory = selectedCategoryObj.subcategories.find(subcategory => subcategory.id == editsubcategoryId);

					// Update the cabinet type dropdown
					if (selectedSubcategory) {
						//var cabinetTypesData = [{ id: '', text: 'Please Select' }].concat(selectedSubcategory.cabinetTypes || []);
						var cabinetTypesData = [{ id: '', text2: 'Please Select CabinetType' }].concat(selectedSubcategory.cabinetTypes.map(cabinettypes => ({
							id: cabinettypes.id,
							text: '<div class="subcategory-item">' +
							'<div class="subcategory-image"><img src="' + cabinettypes.image + '" class="img-thumbnail"/></div>' +
							'<div class="subcategory-text">' + cabinettypes.text + '</div>' +
							'</div>',
						    text2: '<span><img src="' + cabinettypes.image + '" class="img-thumbnail" style="width: 30px; height: 30px; margin-right: 5px;  margin-top: -11px;" /> ' + cabinettypes.text + '</span>',
						})));
						// Initialize Select2 for cabinet type dropdown
						$('#editcabinetTypeSelect').empty().prop('disabled', false).select2({
							data: cabinetTypesData,
							escapeMarkup: function(markup) {
								return markup; // Allows HTML in the result text
							},
							templateResult: function(data) {
								return data.text; // Use the HTML from the text property for display
							},
							templateSelection: function(data) {
								return data.text2; // Use the HTML from the text property for selection
							},
							dropdownParent: $('#ectype'),
						});
					} else {
						// Clear and disable the cabinet type dropdown if no subcategory is selected
						//$('#editcabinetTypeSelect').empty().prop('disabled', true).select2();
					}
				}
			});
			
			// Custom function to format the displayed category option
			function formatCategory(category) {
				if (!category.id) {
				  return category.text;
				}

				/*var $category = $(
				  '<span><img src="' + category.image + '" class="img-thumbnail" style="width: 30px; height: 30px; margin-right: 5px;" /> ' + category.text + '</span>'
				);*/
				var $category = $(
				    '<div class="category-item">' +
					'<div class="category-image"><img src="' + category.image + '" class="img-thumbnail"/></div>' +
					'<div class="category-text">' + category.text + '</div>' +
					'</div>'
				);

				return $category;
			}

			  // Custom function to format the selected category option
			function formatCategorySelection(category) {
				if (!category.id) {
				  return category.text;
				}

				return $(
				  '<span><img src="' + category.image + '" class="img-thumbnail" style="width: 35px; height: 35px; margin-right: 5px; margin-top: -11px;" /> ' + category.text + '</span>'
				);
			}
		//------------------------------------------
			function formatEditSubcategory(subcategory) {
				return subcategory.text;
			}	
			  
			function formatEditSubcategorySelection(subcategory) {
				return subcategory.text;
			}
			function formatEditcabinettype(cabinetType)
			{
				 return cabinetType.text;
			}
			function formatEditCabinettypeSelection(cabinetType)
			{
				return cabinetType.text;
			}
		$('#editcategorySelect').val(entry.categoryId).trigger('change');
		$('#editsubcategorySelect').val(entry.subcategoryId).trigger('change');
		$('#editcabinetTypeSelect').val(entry.cabinetTypeId).trigger('change');
	//------ for material----------------------------------------
	var jsonMaterial = JSON.parse(localStorage.getItem('jsonMaterial'));
		$("#editmaterialSelect").select2({
			data: jsonMaterial,
			templateResult: formatMaterial,
			templateSelection: formatMaterialSelection,
			dropdownParent: $('#eselectmaterial'),
		});
		function formatMaterial(material)
		{
			if (!material.id) {
			  return material.text;
			}

			/*var $material = $(
			  '<span><img src="' + material.image + '" class="img-thumbnail" style="width: 30px; height: 30px; margin-right: 5px;" /> ' + material.text + '</span>'
			);*/
			var $material = $(
			'<div class="itemType-item">' +
					'<div class="itemType-image"><img src="' + material.image + '" class="img-thumbnail"/></div>' +
					'<div class="itemType-text">' + material.text + '</div>' +
			'</div>'
		);

			return $material;
		}
		function formatMaterialSelection(material)
		{
			if (!material.id) {
			  return material.text;
			}

			return $(
			  '<span><img src="' + material.image + '" class="img-thumbnail" style="width: 35px; height: 35px; margin-right: 5px; margin-top: -11px;" /> ' + material.text + '</span>'
			);
		}
		$('#editmaterialSelect').val(entry.materialSelectId).trigger('change');
	//------------- for cabinet colour-----------------------------------
	var jsonCabinet = JSON.parse(localStorage.getItem('jsonCabinet'));
		$("#editcabinetcolour").select2({
			data: jsonCabinet,
			templateResult: formatCabinet,
			templateSelection: formatCabinetSelection,
			dropdownParent: $('#eccolor'),
		});
		function formatCabinet(cabinet)
		{
			if (!cabinet.id) {
			  return cabinet.text;
			}

			/*var $cabinet = $(
			  '<span><img src="' + cabinet.image + '" class="img-thumbnail" style="width: 30px; height: 30px; margin-right: 5px;" /> ' + cabinet.text + '</span>'
			);*/
			var $cabinet = $(
			'<div class="itemType-item">' +
					'<div class="itemType-image"><img src="' + cabinet.image + '" class="img-thumbnail"/></div>' +
					'<div class="itemType-text">' + cabinet.text + '</div>' +
			'</div>'
		);

			return $cabinet;
		}
		function formatCabinetSelection(cabinet)
		{
			if (!cabinet.id) {
			  return cabinet.text;
			}

			return $(
			  '<span><img src="' + cabinet.image + '" class="img-thumbnail" style="width: 35px; height: 35px; margin-right: 5px; margin-top: -11px;" /> ' + cabinet.text + '</span>'
			);
		}
		$('#editcabinetcolour').val(entry.cabinetcolourId).trigger('change');
   //--------------------- expo side--------------------------------
	var jsonExposide = JSON.parse(localStorage.getItem('jsonExposide'));
		$("#editexposide").select2({
			data: jsonExposide,
			templateResult: formatExposide,
			templateSelection: formatExposideSelection,
			dropdownParent: $('#eeside'),
		});
		function formatExposide(exposide)
		{
			if (!exposide.id) {
			  return exposide.text;
			}

			/*var $exposide = $(
			  '<span><img src="' + exposide.image + '" class="img-thumbnail" style="width: 30px; height: 30px; margin-right: 5px;" /> ' + exposide.text + '</span>'
			);*/
			var $exposide = $(
			'<div class="itemType-item">' +
					'<div class="itemType-image"><img src="' + exposide.image + '" class="img-thumbnail"/></div>' +
					'<div class="itemType-text">' + exposide.text + '</div>' +
			'</div>'
		);

			return $exposide;
		}
		function formatExposideSelection(exposide)
		{
			if (!exposide.id) {
			  return exposide.text;
			}

			return $(
			  '<span><img src="' + exposide.image + '" class="img-thumbnail" style="width: 35px; height: 35px; margin-right: 5px; margin-top: -11px;" /> ' + exposide.text + '</span>'
			);
		}
		$('#editexposide').val(entry.exposideId).trigger('change');
	//--------------------- Shutter  Material----------------------
	var jsonShutterMaterial = JSON.parse(localStorage.getItem('jsonShutterMaterial'));
	$("#editshuttermaterial").select2({
			data: jsonShutterMaterial,
			templateResult: formatShutterMaterial,
			templateSelection: formatShutterMaterialSelection,
			dropdownParent: $('#esmaterial'),
		});
		function formatShutterMaterial(shutter)
		{
			if (!shutter.id) {
			  return shutter.text;
			}

			/*var $shutter = $(
			  '<span><img src="' + shutter.image + '" class="img-thumbnail" style="width: 30px; height: 30px; margin-right: 5px;" /> ' + shutter.text + '</span>'
			);*/
			var $shutter = $(
			'<div class="itemType-item">' +
					'<div class="itemType-image"><img src="' + shutter.image + '" class="img-thumbnail"/></div>' +
					'<div class="itemType-text">' + shutter.text + '</div>' +
			'</div>'
		);

			return $shutter;
		}
		function formatShutterMaterialSelection(shutter)
		{
			if (!shutter.id) {
			  return shutter.text;
			}

			return $(
			  '<span><img src="' + shutter.image + '" class="img-thumbnail" style="width: 35px; height: 35px; margin-right: 5px; margin-top: -11px;" /> ' + shutter.text + '</span>'
			);
		}
		$('#editshuttermaterial').val(entry.shuttermaterialId).trigger('change');
	//--------------------- Leg Type----------------------------
	var jsonlegtype = JSON.parse(localStorage.getItem('jsonlegtype'));
		$("#editlegtype").select2({
			data: jsonlegtype,
			templateResult: formatLegtype,
			templateSelection: formatLegtypeSelection,
			dropdownParent: $('#eltype'),
		});
		function formatLegtype(legtype)
		{
			if (!legtype.id) {
			  return legtype.text;
			}

			/*var $legtype = $(
			  '<span><img src="' + legtype.image + '" class="img-thumbnail" style="width: 30px; height: 30px; margin-right: 5px;" /> ' + legtype.text + '</span>'
			);*/
			var $legtype = $(
			'<div class="itemType-item">' +
					'<div class="itemType-image"><img src="' + legtype.image + '" class="img-thumbnail"/></div>' +
					'<div class="itemType-text">' + legtype.text + '</div>' +
			'</div>'
			);

			return $legtype;
		}
		function formatLegtypeSelection(legtype)
		{
			if (!legtype.id) {
			  return legtype.text;
			}

			return $(
			  '<span><img src="' + legtype.image + '" class="img-thumbnail" style="width: 35px; height: 35px; margin-right: 5px; margin-top: -11px;" /> ' + legtype.text + '</span>'
			);
		}
		$('#editlegtype').val(entry.legtypeId).trigger('change');
	//--------------------- Handel Type----------------------
	
	var jsonHandeltype = JSON.parse(localStorage.getItem('jsonHandeltype'));
	$("#edithandeltype").select2({
			data: jsonHandeltype,
			templateResult: formatHandeltype,
			templateSelection: formatHandeltypeSelection,
			dropdownParent: $('#ehtype'),
		});
		function formatHandeltype(handeltype)
		{
			if (!handeltype.id) {
			  return handeltype.text;
			}

			/*var $handeltype = $(
			  '<span><img src="' + handeltype.image + '" class="img-thumbnail" style="width: 30px; height: 30px; margin-right: 5px;" /> ' + handeltype.text + '</span>'
			);*/
			var $handeltype = $(
			'<div class="itemType-item">' +
					'<div class="itemType-image"><img src="' + handeltype.image + '" class="img-thumbnail"/></div>' +
					'<div class="itemType-text">' + handeltype.text + '</div>' +
			'</div>'
			);

			return $handeltype;
		}
		function formatHandeltypeSelection(handeltype)
		{
			if (!handeltype.id) {
			  return handeltype.text;
			}

			return $(
			  '<span><img src="' + handeltype.image + '" class="img-thumbnail" style="width: 35px; height: 35px; margin-right: 5px; margin-top: -11px;" /> ' + handeltype.text + '</span>'
			);
		}
		$('#edithandeltype').val(entry.handeltypeId).trigger('change');
	//------------------------------------------------------------------------------------
    
    $('#editwidth').val(entry.width);
    $('#editdeep').val(entry.deep);
    $('#editlength').val(entry.length);
    $('#editqty').val(entry.qty);
    $('#editexpocolour').val(entry.expocolour);
    $('#editshuttercolour').val(entry.shuttercolour);
    $('#editsktheight').val(entry.sktheight);
	$('#editid').val(index);
	$("#editFormModal").modal('show');
    // Create an update button in the form to handle the update functionality
    $('#updateButton').off('click').on('click', function () {
        // Update the corresponding entry in localStorage
        storedData[index] = {
            category: $('#categorySelect').val(),
            subcategory: $('#subcategorySelect').val(),
            cabinetType: $('#cabinetTypeSelect').val(),
            width: $('#width').val(),
            length: $('#length').val(),
            qty: $('#qty').val()
        };

        // Save the updated data to localStorage
        localStorage.setItem('searchformData', JSON.stringify(storedData));
        
        // Update the table with the updated data
        //displayStoredData();
        displaySearchStoredData();
    });

    // Show the form or modal for editing
    // ...

    // You might need to hide the "Edit" button or disable it while editing
    // ...
}

function handleEdit() {
    // Get the selected index
    var indexId = $('#editid').val();
	
	var categoryID 	  		= $('#editcategorySelect').val();
    var subcategoryID 		= $('#editsubcategorySelect').val();
    var cabinetTypeID 		= $('#editcabinetTypeSelect').val();
    var width 		  		= $('#editwidth').val();
    var deep 		  		= $('#editdeep').val();
    var length 		  		= $('#editlength').val();
    var qty 		  		= $('#editqty').val();
    var materialSelectId 	= $('#editmaterialSelect').val();
    var cabinetcolourId 	= $('#editcabinetcolour').val();
    var exposideId 		    = $('#editexposide').val();
    var expocolour 		    = $('#editexpocolour').val();
    var shuttermaterialId 	= $('#editshuttermaterial').val();
    var shuttercolour 		= $('#editshuttercolour').val();
    var legtypeId 		    = $('#editlegtype').val();
    var sktheight 		    = $('#editsktheight').val();
    var handeltypeId 		= $('#edithandeltype').val();
	
	//-------- declear all array ------------------
	if(categoryID =='') 
	{ 
		$("#editcategoryErr").append('<span class="error-text">Category field required</span>');
		return false;
	} 
	else if(subcategoryID =='')
	{
		$("#editsubcategoryErr").html('<span class="error-text">Sub category field required</span>');
		return false;
	}
	else if(cabinetTypeID =='')
	{
		$("#editcabinetTypeErr").html('<span class="error-text">cabinet type field required</span>');
		return false;
	}
	else if(width =='')
	{
		$("#editwidthErr").html('<span class="error-text">Width field required</span>');
		return false;
	}
	else if(deep =='')
	{
		$("#editdeepErr").html('<span class="error-text">Deep field required</span>');
		return false;
	}
	else if(length =='')
	{
		$("#editlengthErr").html('<span class="error-text">Length field required</span>');
		return false;
	}
	else if(qty =='')
	{
		$("#editqtyErr").html('<span class="error-text">Quantity field required</span>');
		return false;
	}
	else if(materialSelectId =='')
	{
		$("#editmaterialselectErr").html('<span class="error-text">Material field required</span>');
		return false;
	}
	else if(cabinetcolourId =='')
	{
		$("#editcabinetcolourErr").html('<span class="error-text">Cabinet colour field required</span>');
		return false;
	}
	else if(exposideId =='')
	{
		$("#editexposideErr").html('<span class="error-text">Exposide field required</span>');
		return false;
	}
	else if(expocolour =='')
	{
		$("#editexpocolourErr").html('<span class="error-text">Expocolour field required</span>');
		return false;
	}
	else if(shuttermaterialId =='')
	{
		$("#editshuttermaterialErr").html('<span class="error-text">Shutter material field required</span>');
		return false;
	}
	else if(shuttercolour =='')
	{
		$("#editshuttercolourErr").html('<span class="error-text">Shutter colour field required</span>');
		return false;
	}
	else if(legtypeId =='')
	{
		$("#editlegtypeErr").html('<span class="error-text">Legtype field required</span>');
		return false;
	}
	else if(sktheight =='')
	{
		$("#editsktheightErr").html('<span class="error-text">Skt height field required</span>');
		return false;
	}
	else if(handeltypeId =='')
	{
		$("#edithandeltypeErr").html('<span class="error-text">Handeltype field required</span>');
		return false;
	}
	else
	{
		//------ GET TEXT OF SELECTED DROPDOWN-------
		var jsonData = JSON.parse(localStorage.getItem('jsonData'));
		var selectedCategory = jsonData.find(category => category.id == categoryID);
		var categoryText = selectedCategory ? selectedCategory.text : '';
		//alert(subcategoryID); 
		var selectedSubcategory = selectedCategory ? selectedCategory.subcategories.find(subcategory => subcategory.id == subcategoryID) : null;
		var subcategoryText = selectedSubcategory ? selectedSubcategory.text : '';
		
		var selectedCabinetType = selectedSubcategory ? selectedSubcategory.cabinetTypes.find(cabinetType => cabinetType.id == cabinetTypeID) : null;
		var cabinetTypeText = selectedCabinetType ? selectedCabinetType.text : '';
		var cabinetTypeImg  = selectedCabinetType ? selectedCabinetType.image : '';
		
		var jsonMaterial = JSON.parse(localStorage.getItem('jsonMaterial'));
		var selectedMaterial = jsonMaterial.find(material => material.id == materialSelectId);
		var materialText = selectedMaterial ? selectedMaterial.text : '';
		
		var jsonCabinet = JSON.parse(localStorage.getItem('jsonCabinet'));
		var selectedcabinetcolour = jsonCabinet.find(cabinet => cabinet.id == cabinetcolourId);
		var cabinetcolourText = selectedcabinetcolour ? selectedcabinetcolour.text : '';
		
		var jsonExposide = JSON.parse(localStorage.getItem('jsonExposide'));
		var selectedexposide = jsonExposide.find(exposide => exposide.id == exposideId);
		var selectedexposideText = selectedexposide ? selectedexposide.text : '';
		
		var jsonShutterMaterial = JSON.parse(localStorage.getItem('jsonShutterMaterial'));
		var selectedshuttermaterial = jsonShutterMaterial.find(shutter => shutter.id == shuttermaterialId);
		var selectedshuttermaterialText = selectedshuttermaterial ? selectedshuttermaterial.text : '';
		
		var jsonlegtype = JSON.parse(localStorage.getItem('jsonlegtype'));
		var selectedlegtype = jsonlegtype.find(legtype => legtype.id == legtypeId);
		var selectedlegtypeText = selectedlegtype ? selectedlegtype.text : '';
		
		var jsonHandeltype = JSON.parse(localStorage.getItem('jsonHandeltype'));
		var selectedhandeltype = jsonHandeltype.find(handeltype => handeltype.id == handeltypeId);
		var selectedhandeltypeText = selectedhandeltype ? selectedhandeltype.text : '';
		
		//------calculation --LXD--WXD---WXL---Price-----
		var CTyP  = getCabinetTypePrices(cabinetTypeText);
		var LD  		= CTyP[0];
		var WD  		= CTyP[1];
		var WL  		= CTyP[2];
		var hardWareAmt = CTyP[3];
		
		var A1 = LengthDeep(LD,length,deep,qty);
		var A2 = DeepWidth(WD,width,deep,qty);
		var A3 = LengthWidth(WL,width,length,qty);
		//console.log(A1.toFixed(2));
		var Ply18MMValMt 	=  getMaterialPly18MMValue(materialText); // material value
		var Ply6MMValMt  	=  getMaterialPly6MMValue(materialText);  // material value
		var Ply18MMValSh  	=  getshutterPly18MMValue(selectedshuttermaterialText); // shutter material val
		
		//var hardWareAmt = getHardwarePrice();
			//var hardWareAmt = 500;
			var expoLP1     = getLeftsidePrice1();
			var expoLP2     = getLeftsidePrice2();
			var expoRP1     = getRightsidePrice1();
			var expoRP2     = getRightsidePrice2();
			var expoBothP1  = getBothsidePrice1();
			//console.log("left-side-price-1:-"+expoLP1);
			if(selectedexposideText == "Left Side Expo")
			{
				//expoValue  		=  parseFloat(A1*0.5*60) + parseFloat(hardWareAmt);
				expoValue  		=  parseFloat(A1*expoLP1*expoLP2) + parseFloat(hardWareAmt);
			}
			else if(selectedexposideText == "Right Side Expo")
			{
				expoValue  		=  parseFloat(A1*expoRP1*expoRP2) + parseFloat(hardWareAmt);
			}
			else if(selectedexposideText == "Both side Expo")
			{
				//console.log(selectedexposideText);
				var expoValue  =  parseFloat(A1*expoBothP1) + parseFloat(hardWareAmt);
			}
			else if(selectedexposideText == "Without Expo")
			{
				var expoValue  =  hardWareAmt;
			}
		var arrPrice = [];
		arrPrice = [A1, A2, A3, Ply18MMValMt, Ply6MMValMt, Ply18MMValSh, expoValue];
		var price = getPrice(arrPrice);
		var sftRate   = (price/A3);
		//-----------  end calculation-------------------
		var updatedEntry = {
			categoryId 		: categoryID,
			category		: categoryText,
			subcategoryId	: subcategoryID,
			subcategory		: subcategoryText,
			cabinetTypeId	: cabinetTypeID,
			cabinetType		: cabinetTypeText,
			width			: width,
			deep			: deep,
			length			: length,
			qty				: qty,
			materialSelectId: materialSelectId,
			materialText	: materialText,
			cabinetcolourId	: cabinetcolourId,
			cabinetcolourText: cabinetcolourText,
			exposideId		: exposideId,
			exposideText	: selectedexposideText,
			expocolour		: expocolour,
			shuttermaterialId	: shuttermaterialId,
			shuttermaterialText	: selectedshuttermaterialText,
			shuttercolour	: shuttercolour,
			legtypeId		: legtypeId,
			legtypeText		: selectedlegtypeText,
			sktheight		: sktheight,
			handeltypeId	: handeltypeId,
			handeltypeText	: selectedhandeltypeText,
			A1              : A1,
			A2              : A2,
			A3              : A3,
			price           : price,
			cabinetTypeImg  : cabinetTypeImg,
			sftRate         : sftRate.toFixed(2)
		};
	
	

		// Retrieve the existing data from localStorage
		var storedData = JSON.parse(localStorage.getItem('formData')) || [];
		storedData[indexId] = updatedEntry;
		localStorage.setItem('formData', JSON.stringify(storedData));
		displayStoredData();
		$("#editFormModal").modal('hide');
	}
}
function handleSearchEdit() {
    // Get the selected index
    var indexId = $('#editid').val();
	
	var categoryID 	  		= $('#editcategorySelect').val();
    var subcategoryID 		= $('#editsubcategorySelect').val();
    var cabinetTypeID 		= $('#editcabinetTypeSelect').val();
    var width 		  		= $('#editwidth').val();
    var deep 		  		= $('#editdeep').val();
    var length 		  		= $('#editlength').val();
    var qty 		  		= $('#editqty').val();
    var materialSelectId 	= $('#editmaterialSelect').val();
    var cabinetcolourId 	= $('#editcabinetcolour').val();
    var exposideId 		    = $('#editexposide').val();
    var expocolour 		    = $('#editexpocolour').val();
    var shuttermaterialId 	= $('#editshuttermaterial').val();
    var shuttercolour 		= $('#editshuttercolour').val();
    var legtypeId 		    = $('#editlegtype').val();
    var sktheight 		    = $('#editsktheight').val();
    var handeltypeId 		= $('#edithandeltype').val();
	
	//-------- declear all array ------------------
	if(categoryID =='') 
	{ 
		$("#editcategoryErr").append('<span class="error-text">Category field required</span>');
		return false;
	} 
	else if(subcategoryID =='')
	{
		$("#editsubcategoryErr").html('<span class="error-text">Sub category field required</span>');
		return false;
	}
	else if(cabinetTypeID =='')
	{
		$("#editcabinetTypeErr").html('<span class="error-text">cabinet type field required</span>');
		return false;
	}
	else if(width =='')
	{
		$("#editwidthErr").html('<span class="error-text">Width field required</span>');
		return false;
	}
	else if(deep =='')
	{
		$("#editdeepErr").html('<span class="error-text">Deep field required</span>');
		return false;
	}
	else if(length =='')
	{
		$("#editlengthErr").html('<span class="error-text">Length field required</span>');
		return false;
	}
	else if(qty =='')
	{
		$("#editqtyErr").html('<span class="error-text">Quantity field required</span>');
		return false;
	}
	else if(materialSelectId =='')
	{
		$("#editmaterialselectErr").html('<span class="error-text">Material field required</span>');
		return false;
	}
	else if(cabinetcolourId =='')
	{
		$("#editcabinetcolourErr").html('<span class="error-text">Cabinet colour field required</span>');
		return false;
	}
	else if(exposideId =='')
	{
		$("#editexposideErr").html('<span class="error-text">Exposide field required</span>');
		return false;
	}
	else if(expocolour =='')
	{
		$("#editexpocolourErr").html('<span class="error-text">Expocolour field required</span>');
		return false;
	}
	else if(shuttermaterialId =='')
	{
		$("#editshuttermaterialErr").html('<span class="error-text">Shutter material field required</span>');
		return false;
	}
	else if(shuttercolour =='')
	{
		$("#editshuttercolourErr").html('<span class="error-text">Shutter colour field required</span>');
		return false;
	}
	else if(legtypeId =='')
	{
		$("#editlegtypeErr").html('<span class="error-text">Legtype field required</span>');
		return false;
	}
	else if(sktheight =='')
	{
		$("#editsktheightErr").html('<span class="error-text">Skt height field required</span>');
		return false;
	}
	else if(handeltypeId =='')
	{
		$("#edithandeltypeErr").html('<span class="error-text">Handeltype field required</span>');
		return false;
	}
	else
	{
		//------ GET TEXT OF SELECTED DROPDOWN-------
		var jsonData = JSON.parse(localStorage.getItem('jsonData'));
		var selectedCategory = jsonData.find(category => category.id == categoryID);
		var categoryText = selectedCategory ? selectedCategory.text : '';
		//alert(subcategoryID); 
		var selectedSubcategory = selectedCategory ? selectedCategory.subcategories.find(subcategory => subcategory.id == subcategoryID) : null;
		var subcategoryText = selectedSubcategory ? selectedSubcategory.text : '';
		
		var selectedCabinetType = selectedSubcategory ? selectedSubcategory.cabinetTypes.find(cabinetType => cabinetType.id == cabinetTypeID) : null;
		var cabinetTypeText = selectedCabinetType ? selectedCabinetType.text : '';
		var cabinetTypeImg  = selectedCabinetType ? selectedCabinetType.image : '';
		
		var jsonMaterial = JSON.parse(localStorage.getItem('jsonMaterial'));
		var selectedMaterial = jsonMaterial.find(material => material.id == materialSelectId);
		var materialText = selectedMaterial ? selectedMaterial.text : '';
		
		var jsonCabinet = JSON.parse(localStorage.getItem('jsonCabinet'));
		var selectedcabinetcolour = jsonCabinet.find(cabinet => cabinet.id == cabinetcolourId);
		var cabinetcolourText = selectedcabinetcolour ? selectedcabinetcolour.text : '';
		
		var jsonExposide = JSON.parse(localStorage.getItem('jsonExposide'));
		var selectedexposide = jsonExposide.find(exposide => exposide.id == exposideId);
		var selectedexposideText = selectedexposide ? selectedexposide.text : '';
		
		var jsonShutterMaterial = JSON.parse(localStorage.getItem('jsonShutterMaterial'));
		var selectedshuttermaterial = jsonShutterMaterial.find(shutter => shutter.id == shuttermaterialId);
		var selectedshuttermaterialText = selectedshuttermaterial ? selectedshuttermaterial.text : '';
		
		var jsonlegtype = JSON.parse(localStorage.getItem('jsonlegtype'));
		var selectedlegtype = jsonlegtype.find(legtype => legtype.id == legtypeId);
		var selectedlegtypeText = selectedlegtype ? selectedlegtype.text : '';
		
		var jsonHandeltype = JSON.parse(localStorage.getItem('jsonHandeltype'));
		var selectedhandeltype = jsonHandeltype.find(handeltype => handeltype.id == handeltypeId);
		var selectedhandeltypeText = selectedhandeltype ? selectedhandeltype.text : '';
	    
		//------calculation --LXD--WXD---WXL---Price-----
		var CTyP  = getCabinetTypePrices(cabinetTypeText);
		var LD  		= CTyP[0];
		var WD  		= CTyP[1];
		var WL  		= CTyP[2];
		var hardWareAmt = CTyP[3];
			
		var A1 = LengthDeep(LD,length,deep,qty);
		var A2 = DeepWidth(WD,width,deep,qty);
		var A3 = LengthWidth(WL,width,length,qty);
		var Ply18MMValMt 	=  getMaterialPly18MMValue(materialText); // material value
		var Ply6MMValMt  	=  getMaterialPly6MMValue(materialText);  // material value
		var Ply18MMValSh  	=  getshutterPly18MMValue(selectedshuttermaterialText); // shutter material val
		
		//var hardWareAmt = getHardwarePrice();
			//var hardWareAmt = 500;
			var expoLP1     = getLeftsidePrice1();
			var expoLP2     = getLeftsidePrice2();
			var expoRP1     = getRightsidePrice1();
			var expoRP2     = getRightsidePrice2();
			var expoBothP1  = getBothsidePrice1();
			//console.log("left-side-price-1:-"+expoLP1);
			if(selectedexposideText == "Left Side Expo")
			{
				//expoValue  		=  parseFloat(A1*0.5*60) + parseFloat(hardWareAmt);
				expoValue  		=  parseFloat(A1*expoLP1*expoLP2) + parseFloat(hardWareAmt);
			}
			else if(selectedexposideText == "Right Side Expo")
			{
				expoValue  		=  parseFloat(A1*expoRP1*expoRP2) + parseFloat(hardWareAmt);
			}
			else if(selectedexposideText == "Both side Expo")
			{
				//console.log(selectedexposideText);
				var expoValue  =  parseFloat(A1*expoBothP1) + parseFloat(hardWareAmt);
			}
			else if(selectedexposideText == "Without Expo")
			{
				var expoValue  =  hardWareAmt;
			}
		
		var arrPrice = [];
		arrPrice = [A1, A2, A3, Ply18MMValMt, Ply6MMValMt, Ply18MMValSh, expoValue];
		var price = getPrice(arrPrice);
		var sftRate   = (price/A3);
		//----------- price calculation end-------------
		var searchupdatedEntry = {
			categoryId 		: categoryID,
			category		: categoryText,
			subcategoryId	: subcategoryID,
			subcategory		: subcategoryText,
			cabinetTypeId	: cabinetTypeID,
			cabinetType		: cabinetTypeText,
			width			: width,
			deep			: deep,
			length			: length,
			qty				: qty,
			materialSelectId: materialSelectId,
			materialText	: materialText,
			cabinetcolourId	: cabinetcolourId,
			cabinetcolourText: cabinetcolourText,
			exposideId		: exposideId,
			exposideText	: selectedexposideText,
			expocolour		: expocolour,
			shuttermaterialId	: shuttermaterialId,
			shuttermaterialText	: selectedshuttermaterialText,
			shuttercolour	: shuttercolour,
			legtypeId		: legtypeId,
			legtypeText		: selectedlegtypeText,
			sktheight		: sktheight,
			handeltypeId	: handeltypeId,
			handeltypeText	: selectedhandeltypeText,
			A1              : A1,
			A2              : A2,
			A3              : A3,
			price           : price,
			cabinetTypeImg  : cabinetTypeImg,
			sftRate         : sftRate.toFixed(2)
		};
	
		// Retrieve the existing data from localStorage
		var searchstoredData = JSON.parse(localStorage.getItem('searchformData')) || [];
		searchstoredData[indexId] = searchupdatedEntry;
		localStorage.setItem('searchformData', JSON.stringify(searchstoredData));
		displaySearchStoredData();
		$("#editFormModal").modal('hide');
	}
}
function sentToExcel()
{
	if($('#cust_nm').val()=='')
	{
		return false;
	}
	else if($('#addr').val()=='')
	{
		return false;
	}
	else if($('#city').val()=='')
	{
		return false;
	}
	else{
		sessionStorage.setItem("linkURL",window.location.href);
		setInterval(function(){reset_localstorage();}, 1003);
		//reset_localstorage()
	}
}
function reset_localstorage()
{
	$("#addr").val('');
	$("#city").val('');
	$("#cust_nm").val('');
	$("#inv_dt").val('');
	$("#state").val('');
	var URL = sessionStorage.getItem("linkURL");
	//alert(URL);
	//window.location.replace(URL);
	sessionStorage.setItem("successmsg","YES");
	//$("#successmsg").show();
	window.location.href = URL;
	//window.location = URL;
	localStorage.removeItem("formData"); // data do not show after submit excel
	displayStoredData();
}
// Function to display stored data in the table
function displayStoredData() {
    var storedData = JSON.parse(localStorage.getItem('formData')) || [];
    var dataTableBody = $('.dataTableBody');
	//$("#inputFormModal").modal('hide');
    // Clear the existing table rows
    var tot_amt = 0.0;
    dataTableBody.empty();
    // Loop through stored data and append rows to the table
    storedData.forEach(function (entry, index) {
	var	row = '<tr id="TRow">' +
			'<th scope="row">'+ parseInt(index+1) +'</th>' +
            '<td>' + entry.cabinetType + '<input type="hidden" value="'+ entry.cabinetType +'" name="cabi_nm"><input type="hidden" value="'+ entry.category +'" name="cat_nm"> <input type="hidden" value="'+ entry.subcategory +'" name="subcat_nm"><datalist id="mylist" ></datalist></td>' +
			'<td><img src="'+ entry.cabinetTypeImg +'" width="100" height="80"></td>' +
            '<td>' + entry.width + '<input type="hidden" value="'+ entry.width +'" name="width"></td>' +
            '<td>' + entry.length + '<input type="hidden" value="'+ entry.length +'" name="length"></td>' +
			'<td>' + entry.deep + '<input type="hidden" value="'+ entry.deep +'" name="deep"></td>' +
			'<td>' + entry.qty + '<input type="hidden" value="'+ entry.qty +'" name="qty"></td>' +
			'<td>' + entry.price + '<input type="hidden" value="'+ entry.price +'" name="price"></td>' +
            '<td>' + entry.sftRate + '<input type="hidden" value="'+ entry.sftRate +'" name="sftRate"><input type="hidden" value="'+ entry.materialText +'" name="material"><input type="hidden" value="'+ entry.cabinetcolourText +'" name="cabinetcolour"><input type="hidden" value="'+ entry.exposideText +'" name="exposide"><input type="hidden" value="'+ entry.expocolour +'" name="expocolour"><input type="hidden" value="'+ entry.shuttermaterialText +'" name="shuttermaterial"><input type="hidden" value="'+ entry.shuttercolour +'" name="shuttercolour"><input type="hidden" value="'+ entry.legtypeText +'" name="legtype"><input type="hidden" value="'+ entry.sktheight +'" name="sktheight"><input type="hidden" value="'+ entry.handeltypeText +'" name="handeltype"><input type="hidden" value="'+ entry.A1 +'" name="a1"  id="a1_'+ index +'"><input type="hidden" value="'+ entry.A2 +'" name="a2" id="a2_'+ index +'"><input type="hidden" value="'+ entry.A3 +'" name="a3" id="a3_'+ index +'"><input type="hidden" id="add_len" value="'+ storedData.length +'"></td>' +
			'<td><button type="button" class="btn btn-sm btn-danger" onclick="deleteRow(' + index + ')">X</button>&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-sm btn-success" onclick="editRow(' + index + ')">Edit</button></td>'+
            '</tr>';
			//alert(row);
			tot_amt = parseFloat(tot_amt) + parseFloat(entry.price);
			$("#total_amount").val(tot_amt.toFixed(2));
			$("#total_amount_hid").val(tot_amt.toFixed(2));
			var gstcal = calculateGST(tot_amt);
			$("#gst_val").val(gstcal);
			$("#gst_val_hid").val(gstcal);
			var grand_tot = parseFloat(tot_amt) + parseFloat(gstcal);
			$("#grand_total").val(grand_tot.toFixed(2));
			$("#grand_total_hid").val(grand_tot.toFixed(2));
        dataTableBody.append(row);
    });
}
function displaySearchStoredData() {
    var searchstoredData = JSON.parse(localStorage.getItem('searchformData')) || [];
    var dataTableBody = $('.dataTableBody');
	//$("#inputFormModal").modal('hide');
    // Clear the existing table rows
    var tot_amt = 0.0;
    dataTableBody.empty();

    // Loop through stored data and append rows to the table
    searchstoredData.forEach(function (entry, index) {
	var	row = '<tr id="TRow">' +
			'<th scope="row">'+ parseInt(index+1) +'</th>' +
            '<td>' + entry.cabinetType + '<input type="hidden" value="'+ entry.cabinetType +'" name="cabi_nm"><input type="hidden" value="'+ entry.category +'" name="cat_nm"> <input type="hidden" value="'+ entry.subcategory +'" name="subcat_nm"><datalist id="mylist" ></datalist></td>' +
			'<td><img src="'+ entry.cabinetTypeImg +'" width="100" height="80"></td>' +
            '<td>' + entry.width + '<input type="hidden" value="'+ entry.width +'" name="width"></td>' +
            '<td>' + entry.length + '<input type="hidden" value="'+ entry.length +'" name="length"></td>' +
			'<td>' + entry.deep + '<input type="hidden" value="'+ entry.deep +'" name="deep"></td>' +
			'<td>' + entry.qty + '<input type="hidden" value="'+ entry.qty +'" name="qty"></td>' +
			'<td>' + entry.price + '<input type="hidden" value="'+ entry.price +'" name="price"></td>' +
            '<td>' + entry.sftRate + '<input type="hidden" value="'+ entry.sftRate +'" name="sftRate"><input type="hidden" value="'+ entry.materialText +'" name="material"><input type="hidden" value="'+ entry.cabinetcolourText +'" name="cabinetcolour"><input type="hidden" value="'+ entry.exposideText +'" name="exposide"><input type="hidden" value="'+ entry.expocolour +'" name="expocolour"><input type="hidden" value="'+ entry.shuttermaterialText +'" name="shuttermaterial"><input type="hidden" value="'+ entry.shuttercolour +'" name="shuttercolour"><input type="hidden" value="'+ entry.legtypeText +'" name="legtype"><input type="hidden" value="'+ entry.sktheight +'" name="sktheight"><input type="hidden" value="'+ entry.handeltypeText +'" name="handeltype"><input type="hidden" value="'+ entry.A1 +'" name="a1" id="a1_src_'+ index +'"><input type="hidden" value="'+ entry.A2 +'" name="a2" id="a2_src_'+ index +'"><input type="hidden" value="'+ entry.A3 +'" name="a3" id="a3_src_'+ index +'"><input type="hidden" id="src_len" value="'+ searchstoredData.length +'"></td>' +
			'<td><button type="button" class="btn btn-sm btn-danger" onclick="deleteSearchRow(' + index + ')">X</button>&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-sm btn-success" onclick="searchEditRow(' + index + ')">Edit</button></td>'+
            '</tr>';
		  //alert(row);
		  tot_amt = parseFloat(tot_amt) + parseFloat(entry.price);
			$("#total_amount").val(tot_amt.toFixed(2));
			$("#total_amount_hid").val(tot_amt.toFixed(2));
			var gstcal = calculateGST(tot_amt);
			$("#gst_val").val(gstcal);
			$("#gst_val_hid").val(gstcal);
			var grand_tot = parseFloat(tot_amt) + parseFloat(gstcal);
			$("#grand_total").val(grand_tot.toFixed(2));
			$("#grand_total_hid").val(grand_tot.toFixed(2));
        dataTableBody.append(row);
    });
}
function close_edit()
{
	$("#editFormModal").modal('hide');
}
function close_add()
{
	$("#inputFormModal").modal('hide');
}
function ResetTable()
{
	$("#addr").val('');
	$("#city").val('');
	$("#cust_nm").val('');
	$("#inv_dt").val('');
	$("#state").val('');
	//$("#hid_inv_no").val();
	localStorage.removeItem("formData");
	location.reload();
	displayStoredData();
}


	function LengthDeep(p,length,deep,qty)  // A1
	{
		//var result = (2 * length * deep * qty) / 92903.4;
		var result = (p * length * deep * qty) / 92903.4;
		return result.toFixed(2);
	}
	function DeepWidth(p,width,deep,qty) // A2
	{
		var result = (p * width * deep * qty) / 92903.4;
		return result.toFixed(2);
	}
	function LengthWidth(p,width,length,qty) // A3
	{
		var result = (p * width * length * qty) / 92903.4;
		return result.toFixed(2);
	}
	function getMaterialPly18MMValue(name)
	{
		const dataString  = localStorage.getItem('json18mmMaterial');
		const data = JSON.parse(dataString);
		const item = data.find(entry => entry.text === name);
		return item ? item.value : '';
	}
	function getMaterialPly6MMValue(name)
	{
		const dataString  = localStorage.getItem('json6mmMaterial');
		const data = JSON.parse(dataString);
		const item = data.find(entry => entry.text === name);
		return item ? item.value : '';
	}
	function getshutterPly18MMValue(name)
	{
		const dataString  = localStorage.getItem('json18mmShutter');
		const data = JSON.parse(dataString);
		const item = data.find(entry => entry.text === name);
		return item ? item.value : '';
	}
	function getHardwarePrice()
	{
		var dataString = localStorage.getItem('jsonExpoPrice');
		var data = JSON.parse(dataString);
		var item = data.find(entry => entry.text === 'Hardware Price');
		return  item ? item.price1 : '';
	}
	function getLeftsidePrice1()
	{
		var dataString = localStorage.getItem('jsonExpoPrice');
		var data = JSON.parse(dataString);
		var item = data.find(entry => entry.text === 'Left Side');
		return  item ? item.price1 : '';
	}
	function getLeftsidePrice2()
	{
		var dataString = localStorage.getItem('jsonExpoPrice');
		var data = JSON.parse(dataString);
		var item = data.find(entry => entry.text === 'Left Side');
		return  item ? item.price2 : '';
	}
	function getRightsidePrice1()
	{
		var dataString = localStorage.getItem('jsonExpoPrice');
		var data = JSON.parse(dataString);
		var item = data.find(entry => entry.text === 'Right Side');
		return  item ? item.price1 : '';
	}
	function getRightsidePrice2()
	{
		var dataString = localStorage.getItem('jsonExpoPrice');
		var data = JSON.parse(dataString);
		var item = data.find(entry => entry.text === 'Right Side');
		return  item ? item.price2 : '';
	}
	function getBothsidePrice1()
	{
		var dataString = localStorage.getItem('jsonExpoPrice');
		var data = JSON.parse(dataString);
		var item = data.find(entry => entry.text === 'Both Side');
		return  item ? item.price1 : '';
	}

	function getPrice(arr)
	{
		var result = parseFloat((parseFloat(arr[0]) + parseFloat(arr[1])) * arr[3]) + parseFloat(arr[2] * arr[4]) + parseFloat(arr[2] * arr[5]) + parseFloat(arr[6]);
		var result = (parseFloat(result) + 0.26).toFixed(2);
		return result;
	}
	
	function getCabinetTypePrices(name)
	{
		const dataString  = localStorage.getItem('jsonCabinetTyPrice');
		const data = JSON.parse(dataString);
		const item = data.find(entry => entry.text === name);
		const itemArr = [item.LXD,item.WXD,item.WXL,item.hardwareAmt];
		return itemArr;
		//return item ? item.LXD : '';
	}
	
	function calculateGST(totalAmount) {
		var gstAmount = (totalAmount * 18) / 100;
		gstAmount = gstAmount.toFixed(2);
		return gstAmount;
	}

// Initialize Select2 and any other necessary setup
$(document).ready(function() {
	$("#handlesearchSubmit").hide();
	$("#handleSubmit").show();
    // Your Select2 initialization and other setup code here
    // For example, initializeSelect2ForCategory();
    // InitializeSelect2ForSubcategory();
    // InitializeSelect2ForCabinetType();
    //localStorage.removeItem("formData");
	if(sessionStorage.getItem("successmsg") == "YES")
	{
		$("#successmsg").show();
		sessionStorage.removeItem("successmsg");
	}
	
    localStorage.removeItem("searchformData");
    sessionStorage.removeItem("linkURL");
    // Display any stored data on page load
	displayStoredData();
});

