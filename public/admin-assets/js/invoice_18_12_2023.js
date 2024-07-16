//var AppsScriptLink = "AKfycbyCcBR1X6lR8SSplJom98BtE6rJnLT6rxmJ2T1vm12yU2u5kSr_-mQM86b5eTpmlJ2I";
//var AppsScriptLink = "AKfycbzpWxt67Dvq1bpz4qMyyEmF9Qbd-a0mmTgHrRM8mS1oTgvpL5s28C9bhw3Gs0uzTuEx"; //client
var AppsScriptLink = "AKfycbwl8SEXZZAvkdsImUXF9_UhEH42Ra2q7eduBIbSAzSmrJ-vOG_-yfIcwpD-100mSX4W"; //personal use



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
	//alert(JSON.stringify(jsonMaterial));
	//alert(JSON.stringify(jsonData[1].subcategories[1].text));
    FormValidation();
    SetCurrentDate();
    //BtnAdd();
    FillDataList();
    MaxInv();
   
    //------ for material-------
	var urlMaterial = '/material';
	$.ajax({
        url: urlMaterial,
		type: "get",
		data: { _token: "{{ csrf_token() }}"},
		dataType: 'json',
        success: function(jsonMaterial) {
			localStorage.setItem('jsonMaterial', JSON.stringify(jsonMaterial));
			var storedJsonMaterial = JSON.parse(localStorage.getItem('jsonMaterial'));
			$("#materialSelect").select2({
				search : true,
				data: storedJsonMaterial,
				templateResult: formatMaterial,
				templateSelection: formatMaterialSelection,
				dropdownParent: $('#selectmaterial'),
			});
			
        },
    });
	/*alert(jsonMaterial[0].text);
	$("#materialSelect").select2({
		search : true,
		data: jsonMaterial,
		templateResult: formatMaterial,
		templateSelection: formatMaterialSelection,
		dropdownParent: $('#selectmaterial'),
	});*/
	function formatMaterial(material)
	{
		if (!material.id) {
		  return material.text;
		}

		var $material = $(
		  '<span><img src="' + material.image + '" class="img-thumbnail" style="width: 30px; height: 30px; margin-right: 5px;" /> ' + material.text + '</span>'
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
	//------------- for cabinet colour---------
	var urlCabinetColour = '/cabinetcolour';
	$.ajax({
        url: urlCabinetColour,
		type: "get",
		data: { _token: "{{ csrf_token() }}"},
		dataType: 'json',
        success: function(jsonCabinet) {
			localStorage.setItem('jsonCabinet', JSON.stringify(jsonCabinet));
			var storedjsonCabinet = JSON.parse(localStorage.getItem('jsonCabinet'));
			$("#cabinetcolour").select2({
				data: storedjsonCabinet,
				templateResult: formatCabinet,
				templateSelection: formatCabinetSelection,
				dropdownParent: $('#ccolor'),
			});
			
        },
    });
	/*$("#cabinetcolour").select2({
		data: jsonCabinet,
		templateResult: formatCabinet,
		templateSelection: formatCabinetSelection,
		dropdownParent: $('#ccolor'),
	});*/
	function formatCabinet(cabinet)
	{
		if (!cabinet.id) {
		  return cabinet.text;
		}

		var $cabinet = $(
		  '<span><img src="' + cabinet.image + '" class="img-thumbnail" style="width: 30px; height: 30px; margin-right: 5px;" /> ' + cabinet.text + '</span>'
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
   //--------------------- expo side----------------------
   var urlExposide = '/exposide';
	$.ajax({
        url: urlExposide,
		type: "get",
		data: { _token: "{{ csrf_token() }}"},
		dataType: 'json',
        success: function(jsonExposide) {
			localStorage.setItem('jsonExposide', JSON.stringify(jsonExposide));
			var storedjsonExposide = JSON.parse(localStorage.getItem('jsonExposide'));
			$("#exposide").select2({
				data: storedjsonExposide,
				templateResult: formatExposide,
				templateSelection: formatExposideSelection,
				dropdownParent: $('#eside'),
			});
		},
    });
	/*$("#exposide").select2({
		data: jsonExposide,
		templateResult: formatExposide,
		templateSelection: formatExposideSelection,
		dropdownParent: $('#eside'),
	});*/
	function formatExposide(exposide)
	{
		if (!exposide.id) {
		  return exposide.text;
		}

		var $exposide = $(
		  '<span><img src="' + exposide.image + '" class="img-thumbnail" style="width: 30px; height: 30px; margin-right: 5px;" /> ' + exposide.text + '</span>'
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
	//--------------------- Shutter  Material----------------------
	var urlShutterMaterial = '/shutterMaterial';
	$.ajax({
        url: urlShutterMaterial,
		type: "get",
		data: { _token: "{{ csrf_token() }}"},
		dataType: 'json',
        success: function(jsonShutterMaterial) {
			localStorage.setItem('jsonShutterMaterial', JSON.stringify(jsonShutterMaterial));
			var storedjsonShutterMaterial = JSON.parse(localStorage.getItem('jsonShutterMaterial'));
			$("#shuttermaterial").select2({
				data: storedjsonShutterMaterial,
				templateResult: formatShutterMaterial,
				templateSelection: formatShutterMaterialSelection,
				dropdownParent: $('#smaterial'),
			});
		},
    });
	/*$("#shuttermaterial").select2({
		data: jsonShutterMaterial,
		templateResult: formatShutterMaterial,
		templateSelection: formatShutterMaterialSelection,
		dropdownParent: $('#smaterial'),
	});*/
	function formatShutterMaterial(shutter)
	{
		if (!shutter.id) {
		  return shutter.text;
		}

		var $shutter = $(
		  '<span><img src="' + shutter.image + '" class="img-thumbnail" style="width: 30px; height: 30px; margin-right: 5px;" /> ' + shutter.text + '</span>'
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
	//--------------------- Leg Type----------------------
	var urlLegtyp = '/legtyp';
	$.ajax({
        url: urlLegtyp,
		type: "get",
		data: { _token: "{{ csrf_token() }}"},
		dataType: 'json',
        success: function(jsonlegtype) {
			localStorage.setItem('jsonlegtype', JSON.stringify(jsonlegtype));
			var storedjsonlegtype = JSON.parse(localStorage.getItem('jsonlegtype'));
			$("#legtype").select2({
				data: storedjsonlegtype,
				templateResult: formatLegtype,
				templateSelection: formatLegtypeSelection,
				dropdownParent: $('#ltype'),
			});
		},
    });
	/*$("#legtype").select2({
		data: jsonlegtype,
		templateResult: formatLegtype,
		templateSelection: formatLegtypeSelection,
		dropdownParent: $('#ltype'),
	});*/
	function formatLegtype(legtype)
	{
		if (!legtype.id) {
		  return legtype.text;
		}

		var $legtype = $(
		  '<span><img src="' + legtype.image + '" class="img-thumbnail" style="width: 30px; height: 30px; margin-right: 5px;" /> ' + legtype.text + '</span>'
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
	//--------------------- Handel Type----------------------
	var urlHandeltype = '/handeltype';
	$.ajax({
        url: urlHandeltype,
		type: "get",
		data: { _token: "{{ csrf_token() }}"},
		dataType: 'json',
        success: function(jsonHandeltype) {
			localStorage.setItem('jsonHandeltype', JSON.stringify(jsonHandeltype));
			var storedjsonHandeltype = JSON.parse(localStorage.getItem('jsonHandeltype'));
			$("#handeltype").select2({
				data: storedjsonHandeltype,
				templateResult: formatHandeltype,
				templateSelection: formatHandeltypeSelection,
				dropdownParent: $('#htype'),
			});
		},
    });
	/*$("#handeltype").select2({
		data: jsonHandeltype,
		templateResult: formatHandeltype,
		templateSelection: formatHandeltypeSelection,
		dropdownParent: $('#htype'),
	});*/
	function formatHandeltype(handeltype)
	{
		if (!handeltype.id) {
		  return handeltype.text;
		}

		var $handeltype = $(
		  '<span><img src="' + handeltype.image + '" class="img-thumbnail" style="width: 30px; height: 30px; margin-right: 5px;" /> ' + handeltype.text + '</span>'
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
  //--------- original-------------------------------------
     // Initialize Select2 for category dropdown
	 
	var urlrelationaltype = '/relationaltype';
	$.ajax({
		url: urlrelationaltype,
		type: "get",
		data: { _token: "{{ csrf_token() }}"},
		dataType: 'json',
		success: function(jsonData) {
			localStorage.setItem('jsonData', JSON.stringify(jsonData));
			var storedjjsonData = JSON.parse(localStorage.getItem('jsonData'));
			//alert(JSON.stringify(jsonData[0].subcategories.text));
			loadrelationaltypeData(jsonData);
			//localStorage.setItem('jsonData', jsonDataString);
		},
	});
	function loadrelationaltypeData(jsonData)
	{	
		 //var jsonData = localStorage.getItem('jsonData');
		 //alert(jsonData);
		$('#categorySelect').select2({
			search: true,
			data: jsonData,
			templateResult: formatCategory,
			templateSelection: formatCategorySelection,
			dropdownParent: $('#selectcategory'),
		});
		 //$('.select2-container--open').css('z-index', 9999);
		  // Initialize Select2 for subcategory dropdown
		  
		$('#subcategorySelect').select2({
			search: true,
			templateResult: formatSubcategory,
			templateSelection: formatSubcategorySelection,
			dropdownParent: $('#scategory'),
		});
		
		//$('.select2-container--open').css('z-index', 9999);
		$('#cabinetTypeSelect').select2({
			templateResult: formatcabinettype,
			templateSelection: formatCabinettypeSelection,
			dropdownParent: $('#ctype'),
		});
		 // Initialize Select2 for cabinet type dropdown
		  $('#cabinetTypeSelect').select2();

		  // Event listener for changes in the category dropdown
		$('#categorySelect').on('change', function() {
			var categoryId = $(this).val();
			var selectedCategory = jsonData.find(category => category.id == categoryId);

			var subcategoryData = [{ id: '', text: 'Please Select' }].concat(selectedCategory.subcategories.map(subcategory => ({
				id: subcategory.id,
				text: '<span><img src="' + subcategory.image + '" class="img-thumbnail" style="width: 35px; height: 35px; margin-right: 5px; margin-top: -6px"/> ' + subcategory.text + '</span>',
			})));
			
			// Initialize Select2 for subcategory dropdown
			$('#subcategorySelect').empty().select2({
				data: subcategoryData,
				escapeMarkup: function(markup) {
					return markup; // Allows HTML in the result text
				},
				templateResult: function(data) {
					return data.text; // Use the HTML from the text property for display
				},
				templateSelection: function(data) {
					return data.text; // Use the HTML from the text property for selection
				},
				dropdownParent: $('#scategory'),
			});
			
			// Clear and disable the cabinet type dropdown
			$('#cabinetTypeSelect').empty().prop('disabled', true).select2();
		});
			
			// Event listener for changes in the subcategory dropdown
		$('#subcategorySelect').on('change', function() {
			var subcategoryId = $(this).val();
			var selectedCategory = $('#categorySelect').val();
			var selectedCategoryObj = jsonData.find(category => category.id == selectedCategory);

			if (selectedCategoryObj) {
				var selectedSubcategory = selectedCategoryObj.subcategories.find(subcategory => subcategory.id == subcategoryId);

				// Update the cabinet type dropdown
				if (selectedSubcategory) {
					//var cabinetTypesData = [{ id: '', text: 'Please Select' }].concat(selectedSubcategory.cabinetTypes || []);
					var cabinetTypesData = [{ id: '', text: 'Please Select' }].concat(selectedSubcategory.cabinetTypes.map(cabinettypes => ({
						id: cabinettypes.id,
						text: '<span><img src="' + cabinettypes.image + '" class="img-thumbnail" style="width: 35px; height: 35px; margin-right: 5px; margin-top: -6px;" /> ' + cabinettypes.text + '</span>',
					})));
					// Initialize Select2 for cabinet type dropdown
					$('#cabinetTypeSelect').empty().prop('disabled', false).select2({
						data: cabinetTypesData,
						escapeMarkup: function(markup) {
							return markup; // Allows HTML in the result text
						},
						templateResult: function(data) {
							return data.text; // Use the HTML from the text property for display
						},
						templateSelection: function(data) {
							return data.text; // Use the HTML from the text property for selection
						},
						dropdownParent: $('#ctype'),
					});
				} else {
					// Clear and disable the cabinet type dropdown if no subcategory is selected
					$('#cabinetTypeSelect').empty().prop('disabled', true).select2();
				}
			}
		});
		// Custom function to format the displayed category option
		function formatCategory(category) {
			if (!category.id) {
			  return category.text;
			}

			var $category = $(
			  '<span><img src="' + category.image + '" class="img-thumbnail" style="width: 40px; height: 40px; margin-right: 5px;" /> ' + category.text + '</span>'
			);

			return $category;
		}

		  // Custom function to format the selected category option
		function formatCategorySelection(category) {
			if (!category.id) {
			  return category.text;
			}

			return $(
			  '<span><img src="' + category.image + '" class="img-thumbnail" style="width: 35px; height: 35px; margin-right: 5px;  margin-top: -11px;" /> ' + category.text + '</span>'
			);
		}
		
		function formatSubcategory(subcategory) {
			return subcategory.text;
		}	
		  
		function formatSubcategorySelection(subcategory) {
			return subcategory.text;
		}
		function formatcabinettype(cabinetType)
		{
			 return cabinetType.text;
		}
		function formatCabinettypeSelection(cabinetType)
		{
			return cabinetType.text;
		}
    }
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
	$("input[name='inv_no']").val(1);
	 $.getJSON("https://script.google.com/macros/s/"+AppsScriptLink+"/exec?page=max",
        function (data) {
        
			$("input[name='inv_no']").val(data);

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
	$("#handlesearchSubmit").show();
	$("#handleSubmit").hide();
		var no = $('#inv_no').val();
		if (pNo != "") no = pNo;

        $.getJSON("https://script.google.com/macros/s/"+AppsScriptLink+"/exec?page=search&no="+no,
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
					 value[14],value[15],value[16],value[17],value[18],value[19],value[20],value[21],value[22]];
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
	var searchCategory 			= arr[0];
    var searchSubcategory 		= arr[1];
    var searchCabinetType 		= arr[2];
    var searchWidth 			= arr[3];
    var searchLength 			= arr[4];
    var searchDeep				= arr[5];
    var searchQuantity 			= arr[6];
    var searchMaterial 			= arr[7];
    var searchCabinetcolour 	= arr[8];
    var searchExposide 			= arr[9];
    var searchExpocolour 		= arr[10];
    var searchShuttermaterial 	= arr[11];
    var searchShuttercolour 	= arr[12];
    var searchLegtype 			= arr[13];
    var searchSkthigh 			= arr[14];
    var searchHandeltype 		= arr[15];
	
	//alert(searchShuttermaterial);
	var jsonMaterial = JSON.parse(localStorage.getItem('jsonMaterial'));
	var selectedMaterial = jsonMaterial.find(material => material.text === searchMaterial);
	
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
	  
		if (selectedCategory) {
			// Find the subcategory within the selected category
			var selectedSubcategory = selectedCategory.subcategories.find(subcategory => subcategory.text === searchSubcategory);
			//alert(selectedSubcategory.id);
			if (selectedSubcategory) {
				// Find the cabinet type within the selected subcategory
				var selectedCabinetType = selectedSubcategory.cabinetTypes.find(cabinetType => cabinetType.text === searchCabinetType);
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
						handeltypeText	: searchHandeltype
					};
					// Retrieve existing data from local storage or initialize an empty array
					var searchstoredData = JSON.parse(localStorage.getItem('searchformData')) || [];
					// Add the entry to the array
					searchstoredData.push(searchformData);

					// Save the updated data back to local storage
					localStorage.setItem('searchformData', JSON.stringify(searchstoredData));
					// Display the data in the table
					//displayStoredData();
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
		var urlrelationaltype = '/relationaltype';
		$.ajax({
			url: urlrelationaltype,
			type: "get",
			data: { _token: "{{ csrf_token() }}"},
			dataType: 'json',
			success: function(jsonData) {
				//alert(JSON.stringify(jsonData[0].subcategories.text));
				loadrelationaltypeData(jsonData);
			},
		});
		function loadrelationaltypeData(jsonData)
		{
			var selectedCategory = jsonData.find(category => category.id == categoryID);
			var categoryText = selectedCategory ? selectedCategory.text : '';
			 
			var selectedSubcategory = selectedCategory ? selectedCategory.subcategories.find(subcategory => subcategory.id == subcategoryID) : null;
			var subcategoryText = selectedSubcategory ? selectedSubcategory.text : '';
			
			var selectedCabinetType = selectedSubcategory ? selectedSubcategory.cabinetTypes.find(cabinetType => cabinetType.id == cabinetTypeID) : null;
			var cabinetTypeText = selectedCabinetType ? selectedCabinetType.text : '';
			
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
				handeltypeText	: selectedhandeltypeText
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
			displayStoredData();
		}
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
		var urlrelationaltype = '/relationaltype';
		$.ajax({
			url: urlrelationaltype,
			type: "get",
			data: { _token: "{{ csrf_token() }}"},
			dataType: 'json',
			success: function(jsonData) {
				//alert(JSON.stringify(jsonData[0].subcategories.text));
				loadSearchData(jsonData);
			},
		});
		function loadSearchData(jsonData)
		{
			var selectedCategory = jsonData.find(category => category.id == categoryID);
			var categoryText = selectedCategory ? selectedCategory.text : '';
			 
			var selectedSubcategory = selectedCategory ? selectedCategory.subcategories.find(subcategory => subcategory.id == subcategoryID) : null;
			var subcategoryText = selectedSubcategory ? selectedSubcategory.text : '';
			
			var selectedCabinetType = selectedSubcategory ? selectedSubcategory.cabinetTypes.find(cabinetType => cabinetType.id == cabinetTypeID) : null;
			var cabinetTypeText = selectedCabinetType ? selectedCabinetType.text : '';
			
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
				handeltypeText	: selectedhandeltypeText
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
			displaySearchStoredData();
		}
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

function editRow(index) {
	$("#handleSearchEdit").hide();
	$("#handleEdit").show();
	var storedData = JSON.parse(localStorage.getItem('formData')) || [];
    var entry = storedData[index];
	
	var urlrelationaltype = '/relationaltype';
	$.ajax({
		url: urlrelationaltype,
		type: "get",
		data: { _token: "{{ csrf_token() }}"},
		dataType: 'json',
		success: function(jsonData) {
			//alert(JSON.stringify(jsonData[0].subcategories.text));
			loadrelationalEditData(jsonData);
		},
	});
	function loadrelationalEditData(jsonData)
	{
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
				var editsubcategoryData = [{ id: '', text: 'Please Select' }].concat(selectedCategory.subcategories.map(subcategory => ({
					id: subcategory.id,
					text: '<span><img src="' + subcategory.image + '" class="img-thumbnail" style="width: 35px; height: 35px; margin-right: 5px; margin-top: -5px;" /> ' + subcategory.text + '</span>',
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
						return data.text; // Use the HTML from the text property for selection
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
						var cabinetTypesData = [{ id: '', text: 'Please Select' }].concat(selectedSubcategory.cabinetTypes.map(cabinettypes => ({
							id: cabinettypes.id,
							text: '<span><img src="' + cabinettypes.image + '" class="img-thumbnail" style="width: 35px; height: 35px; margin-right: 5px; margin-top: -5px;" /> ' + cabinettypes.text + '</span>',
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
								return data.text; // Use the HTML from the text property for selection
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

				var $category = $(
				  '<span><img src="' + category.image + '" class="img-thumbnail" style="width: 30px; height: 30px; margin-right: 5px;" /> ' + category.text + '</span>'
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
	}
	//------ for material-------
	var urlMaterial = '/material';
	$.ajax({
        url: urlMaterial,
		type: "get",
		data: { _token: "{{ csrf_token() }}"},
		dataType: 'json',
        success: function(jsonMaterial) {
			//alert(jsonMaterial);
			loadMaterial(jsonMaterial);
		},
    });
	function loadMaterial(jsonMaterial)
	{
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

			var $material = $(
			  '<span><img src="' + material.image + '" class="img-thumbnail" style="width: 30px; height: 30px; margin-right: 5px;" /> ' + material.text + '</span>'
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
	}
	//------------- for cabinet colour--------------------------
	var urlCabinetColour = '/cabinetcolour';
	$.ajax({
        url: urlCabinetColour,
		type: "get",
		data: { _token: "{{ csrf_token() }}"},
		dataType: 'json',
        success: function(jsonCabinet) {
			//alert(jsonMaterial);
			loadCabinet(jsonCabinet);
		},
    });
	function loadCabinet(jsonCabinet)
	{
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

			var $cabinet = $(
			  '<span><img src="' + cabinet.image + '" class="img-thumbnail" style="width: 30px; height: 30px; margin-right: 5px;" /> ' + cabinet.text + '</span>'
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
	}
   //--------------------- expo side----------------------------------
   var urlExposide = '/exposide';
	$.ajax({
        url: urlExposide,
		type: "get",
		data: { _token: "{{ csrf_token() }}"},
		dataType: 'json',
        success: function(jsonExposide) {
			//alert(jsonMaterial);
			loadExposide(jsonExposide);
		},
    });
	function loadExposide(jsonExposide)
	{
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

			var $exposide = $(
			  '<span><img src="' + exposide.image + '" class="img-thumbnail" style="width: 30px; height: 30px; margin-right: 5px;" /> ' + exposide.text + '</span>'
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
	}
	//--------------------- Shutter  Material----------------------
	var urlShutterMaterial = '/shutterMaterial';
	$.ajax({
        url: urlShutterMaterial,
		type: "get",
		data: { _token: "{{ csrf_token() }}"},
		dataType: 'json',
        success: function(jsonShutterMaterial) {
			//alert(jsonMaterial);
			loadShutterMaterial(jsonShutterMaterial);
		},
    });
	function loadShutterMaterial(jsonShutterMaterial)
	{
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

			var $shutter = $(
			  '<span><img src="' + shutter.image + '" class="img-thumbnail" style="width: 30px; height: 30px; margin-right: 5px;" /> ' + shutter.text + '</span>'
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
	}
	//--------------------- Leg Type-------------------------
	var urlLegtyp = '/legtyp';
	$.ajax({
        url: urlLegtyp,
		type: "get",
		data: { _token: "{{ csrf_token() }}"},
		dataType: 'json',
        success: function(jsonlegtype) {
			//alert(jsonMaterial);
			loadLegtype(jsonlegtype);
		},
    });
	function loadLegtype(jsonlegtype)
	{
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

			var $legtype = $(
			  '<span><img src="' + legtype.image + '" class="img-thumbnail" style="width: 30px; height: 30px; margin-right: 5px;" /> ' + legtype.text + '</span>'
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
	}
	//--------------------- Handel Type----------------------
	var urlHandeltype = '/handeltype';
	$.ajax({
        url: urlHandeltype,
		type: "get",
		data: { _token: "{{ csrf_token() }}"},
		dataType: 'json',
        success: function(jsonHandeltype) {
			//alert(jsonHandeltype[0].image);
			loadHandeltype(jsonHandeltype);
		},
    });
	function loadHandeltype(jsonHandeltype)
	{
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

			var $handeltype = $(
			  '<span><img src="' + handeltype.image + '" class="img-thumbnail" style="width: 30px; height: 30px; margin-right: 5px;" /> ' + handeltype.text + '</span>'
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
	}
	//------------------------------------------------------------------------------------
    //var storedData = JSON.parse(localStorage.getItem('formData')) || [];
    //var entry = storedData[index];
	//alert(JSON.stringify(entry));
	// Populate the form with the selected data for editing
	//alert(entry.categoryId);
    /*$('#editcategorySelect').val(entry.categoryId).trigger('change');
    $('#editsubcategorySelect').val(entry.subcategoryId).trigger('change');
    $('#editcabinetTypeSelect').val(entry.cabinetTypeId).trigger('change');*/
    $('#editwidth').val(entry.width);
    $('#editdeep').val(entry.deep);
    $('#editlength').val(entry.length);
    $('#editqty').val(entry.qty);
    $('#editexpocolour').val(entry.expocolour);
    $('#editshuttercolour').val(entry.shuttercolour);
    $('#editsktheight').val(entry.sktheight);
	//alert(entry.materialSelectId);
	//$('#editmaterialSelect').val(entry.materialSelectId).trigger('change');
	//$('#editcabinetcolour').val(entry.cabinetcolourId).trigger('change');
	//$('#editexposide').val(entry.exposideId).trigger('change');
	//$('#editshuttermaterial').val(entry.shuttermaterialId).trigger('change');
	//$('#editlegtype').val(entry.legtypeId).trigger('change');
	//$('#edithandeltype').val(entry.handeltypeId).trigger('change');
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
	//alert(entry.);
	var urlrelationaltype = '/relationaltype';
	$.ajax({
		url: urlrelationaltype,
		type: "get",
		data: { _token: "{{ csrf_token() }}"},
		dataType: 'json',
		success: function(jsonData) {
			//alert(JSON.stringify(jsonData));
			loadrelationalSrcEditData(jsonData);
		},
	});
	function loadrelationalSrcEditData(jsonData)
	{
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
				var editsubcategoryData = [{ id: '', text: 'Please Select' }].concat(selectedCategory.subcategories.map(subcategory => ({
					id: subcategory.id,
					text: '<span><img src="' + subcategory.image + '" class="img-thumbnail" style="width: 35px; height: 35px; margin-right: 5px; margin-top: -11px;" /> ' + subcategory.text + '</span>',
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
						return data.text; // Use the HTML from the text property for selection
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
						var cabinetTypesData = [{ id: '', text: 'Please Select' }].concat(selectedSubcategory.cabinetTypes.map(cabinettypes => ({
							id: cabinettypes.id,
							text: '<span><img src="' + cabinettypes.image + '" class="img-thumbnail" style="width: 35px; height: 35px; margin-right: 5px; margin-top: -5px;" /> ' + cabinettypes.text + '</span>',
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
								return data.text; // Use the HTML from the text property for selection
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

				var $category = $(
				  '<span><img src="' + category.image + '" class="img-thumbnail" style="width: 30px; height: 30px; margin-right: 5px;" /> ' + category.text + '</span>'
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
	}
	//------ for material----------------------------------------
	var urlMaterial = '/material';
	$.ajax({
        url: urlMaterial,
		type: "get",
		data: { _token: "{{ csrf_token() }}"},
		dataType: 'json',
        success: function(jsonMaterial) {
			loadSearchMaterial(jsonMaterial);
		},
    });
	function loadSearchMaterial(jsonMaterial)
	{
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

			var $material = $(
			  '<span><img src="' + material.image + '" class="img-thumbnail" style="width: 30px; height: 30px; margin-right: 5px;" /> ' + material.text + '</span>'
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
	}
	//------------- for cabinet colour-----------------------------------
	var urlCabinetColour = '/cabinetcolour';
	$.ajax({
        url: urlCabinetColour,
		type: "get",
		data: { _token: "{{ csrf_token() }}"},
		dataType: 'json',
        success: function(jsonCabinet) {
			loadSearchCabinet(jsonCabinet);
		},
    });
	function loadSearchCabinet(jsonCabinet)
	{
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

			var $cabinet = $(
			  '<span><img src="' + cabinet.image + '" class="img-thumbnail" style="width: 30px; height: 30px; margin-right: 5px;" /> ' + cabinet.text + '</span>'
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
	}
   //--------------------- expo side--------------------------------
	var urlExposide = '/exposide';
	$.ajax({
        url: urlExposide,
		type: "get",
		data: { _token: "{{ csrf_token() }}"},
		dataType: 'json',
        success: function(jsonExposide) {
			loadSearchExposide(jsonExposide);
		},
    });
	function loadSearchExposide(jsonExposide)
	{
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

			var $exposide = $(
			  '<span><img src="' + exposide.image + '" class="img-thumbnail" style="width: 30px; height: 30px; margin-right: 5px;" /> ' + exposide.text + '</span>'
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
	}
	//--------------------- Shutter  Material----------------------
	var urlShutterMaterial = '/shutterMaterial';
	$.ajax({
        url: urlShutterMaterial,
		type: "get",
		data: { _token: "{{ csrf_token() }}"},
		dataType: 'json',
        success: function(jsonShutterMaterial) {
			loadSearchShutter(jsonShutterMaterial);
		},
    });
	function loadSearchShutter(jsonShutterMaterial)
	{
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

			var $shutter = $(
			  '<span><img src="' + shutter.image + '" class="img-thumbnail" style="width: 30px; height: 30px; margin-right: 5px;" /> ' + shutter.text + '</span>'
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
	}
	//--------------------- Leg Type----------------------------
	var urlLegtyp = '/legtyp';
	$.ajax({
        url: urlLegtyp,
		type: "get",
		data: { _token: "{{ csrf_token() }}"},
		dataType: 'json',
        success: function(jsonlegtype) {
			loadSearchLegtyp(jsonlegtype);
		},
    });
	function loadSearchLegtyp(jsonlegtype)
	{
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

			var $legtype = $(
			  '<span><img src="' + legtype.image + '" class="img-thumbnail" style="width: 30px; height: 30px; margin-right: 5px;" /> ' + legtype.text + '</span>'
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
	}
	//--------------------- Handel Type----------------------
	var urlHandeltype = '/handeltype';
	$.ajax({
        url: urlHandeltype,
		type: "get",
		data: { _token: "{{ csrf_token() }}"},
		dataType: 'json',
        success: function(jsonHandeltype) {
			loadSearchHandeltype(jsonHandeltype);
		},
    });
	function loadSearchHandeltype(jsonHandeltype)
	{
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

			var $handeltype = $(
			  '<span><img src="' + handeltype.image + '" class="img-thumbnail" style="width: 30px; height: 30px; margin-right: 5px;" /> ' + handeltype.text + '</span>'
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
	}
	//------------------------------------------------------------------------------------
    //var storedData = JSON.parse(localStorage.getItem('searchformData')) || [];
    //var entry = storedData[index];
   
	// Populate the form with the selected data for editing
    /*$('#editcategorySelect').val(entry.categoryId).trigger('change');
    $('#editsubcategorySelect').val(entry.subcategoryId).trigger('change');
    $('#editcabinetTypeSelect').val(entry.cabinetTypeId).trigger('change');*/
    $('#editwidth').val(entry.width);
    $('#editdeep').val(entry.deep);
    $('#editlength').val(entry.length);
    $('#editqty').val(entry.qty);
    $('#editexpocolour').val(entry.expocolour);
    $('#editshuttercolour').val(entry.shuttercolour);
    $('#editsktheight').val(entry.sktheight);
	
	//$('#editmaterialSelect').val(entry.materialSelectId).trigger('change');
	//$('#editcabinetcolour').val(entry.cabinetcolourId).trigger('change');
	//$('#editexposide').val(entry.exposideId).trigger('change');
	//$('#editshuttermaterial').val(entry.shuttermaterialId).trigger('change');
	//$('#editlegtype').val(entry.legtypeId).trigger('change');
	//$('#edithandeltype').val(entry.handeltypeId).trigger('change');
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
		var selectedCategory = jsonData.find(category => category.id == categoryID);
		var categoryText = selectedCategory ? selectedCategory.text : '';
		//alert(subcategoryID); 
		var selectedSubcategory = selectedCategory ? selectedCategory.subcategories.find(subcategory => subcategory.id == subcategoryID) : null;
		var subcategoryText = selectedSubcategory ? selectedSubcategory.text : '';
		
		var selectedCabinetType = selectedSubcategory ? selectedSubcategory.cabinetTypes.find(cabinetType => cabinetType.id == cabinetTypeID) : null;
		var cabinetTypeText = selectedCabinetType ? selectedCabinetType.text : '';
		
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

		//-----------
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
			handeltypeText	: selectedhandeltypeText
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

		//-----------
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
			handeltypeText	: selectedhandeltypeText
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
    dataTableBody.empty();
    // Loop through stored data and append rows to the table
    storedData.forEach(function (entry, index) {
	var	row = '<tr id="TRow">' +
			'<th scope="row">'+ parseInt(index+1) +'</th>' +
            '<td>' + entry.category + '<input type="hidden" value="'+ entry.category +'" name="cat_nm"> <datalist id="mylist" ></datalist></td>' +
            '<td>' + entry.subcategory + '<input type="hidden" value="'+ entry.subcategory +'" name="subcat_nm"></td>' +
            '<td>' + entry.cabinetType + '<input type="hidden" value="'+ entry.cabinetType +'" name="cabi_nm"></td>' +
            '<td>' + entry.width + '<input type="hidden" value="'+ entry.width +'" name="width"></td>' +
            '<td>' + entry.length + '<input type="hidden" value="'+ entry.length +'" name="length"></td>' +
            '<td>' + entry.qty + '<input type="hidden" value="'+ entry.qty +'" name="qty"><input type="hidden" value="'+ entry.deep +'" name="deep"><input type="hidden" value="'+ entry.materialText +'" name="material"><input type="hidden" value="'+ entry.cabinetcolourText +'" name="cabinetcolour"><input type="hidden" value="'+ entry.exposideText +'" name="exposide"><input type="hidden" value="'+ entry.expocolour +'" name="expocolour"><input type="hidden" value="'+ entry.shuttermaterialText +'" name="shuttermaterial"><input type="hidden" value="'+ entry.shuttercolour +'" name="shuttercolour"><input type="hidden" value="'+ entry.legtypeText +'" name="legtype"><input type="hidden" value="'+ entry.sktheight +'" name="sktheight"><input type="hidden" value="'+ entry.handeltypeText +'" name="handeltype"></td>' +
			'<td><button type="button" class="btn btn-sm btn-danger" onclick="deleteRow(' + index + ')">X</button>&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-sm btn-success" onclick="editRow(' + index + ')">Edit</button></td>'+
            '</tr>';
			//alert(row);
        dataTableBody.append(row);
    });
}
function displaySearchStoredData() {
    var searchstoredData = JSON.parse(localStorage.getItem('searchformData')) || [];
    var dataTableBody = $('.dataTableBody');
	//$("#inputFormModal").modal('hide');
    // Clear the existing table rows
    dataTableBody.empty();

    // Loop through stored data and append rows to the table
    searchstoredData.forEach(function (entry, index) {
	var	row = '<tr id="TRow">' +
			'<th scope="row">'+ parseInt(index+1) +'</th>' +
            '<td>' + entry.category + '<input type="hidden" value="'+ entry.category +'" name="cat_nm"> <datalist id="mylist" ></datalist></td>' +
            '<td>' + entry.subcategory + '<input type="hidden" value="'+ entry.subcategory +'" name="subcat_nm"></td>' +
            '<td>' + entry.cabinetType + '<input type="hidden" value="'+ entry.cabinetType +'" name="cabi_nm"></td>' +
            '<td>' + entry.width + '<input type="hidden" value="'+ entry.width +'" name="width"></td>' +
            '<td>' + entry.length + '<input type="hidden" value="'+ entry.length +'" name="length"></td>' +
            '<td>' + entry.qty + '<input type="hidden" value="'+ entry.qty +'" name="qty"><input type="hidden" value="'+ entry.deep +'" name="deep"><input type="hidden" value="'+ entry.materialText +'" name="material"><input type="hidden" value="'+ entry.cabinetcolourText +'" name="cabinetcolour"><input type="hidden" value="'+ entry.exposideText +'" name="exposide"><input type="hidden" value="'+ entry.expocolour +'" name="expocolour"><input type="hidden" value="'+ entry.shuttermaterialText +'" name="shuttermaterial"><input type="hidden" value="'+ entry.shuttercolour +'" name="shuttercolour"><input type="hidden" value="'+ entry.legtypeText +'" name="legtype"><input type="hidden" value="'+ entry.sktheight +'" name="sktheight"><input type="hidden" value="'+ entry.handeltypeText +'" name="handeltype"></td>' +
			'<td><button type="button" class="btn btn-sm btn-danger" onclick="deleteRow(' + index + ')">X</button>&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-sm btn-success" onclick="searchEditRow(' + index + ')">Edit</button></td>'+
            '</tr>';
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
