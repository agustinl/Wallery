/* Judith Scripts */

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});

var croppicContaineroutputOptions = {
	uploadUrl:'img_save_to_file.php',
    cropUrl:'img_crop_to_file.php', 
    outputUrlId:'cropOutput',
    doubleZoomControls:false,
    rotateControls:false,
    loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
	onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
	onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
	onImgDrag: function(){ console.log('onImgDrag') },
	onImgZoom: function(){ console.log('onImgZoom') },
	onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
	onAfterImgCrop:function(){ console.log('onAfterImgCrop') },
	onReset:function(){ console.log('onReset') },
	onError:function(errormessage){ console.log('onError:'+errormessage) }
	};
            
	var cropContaineroutputUpload = new Croppic('cropContaineroutputUpload', croppicContaineroutputOptions);

$(function() {
  $('select').selectpicker();
});

$(function() {

	var input = document.getElementById('searchTextField');
	autocomplete = new google.maps.places.Autocomplete(input);

});

$(function() {

	var input = document.getElementById('searchTextFieldTwo');
	var options = {
	  types: ['address']
	};

	autocomplete = new google.maps.places.Autocomplete(input, options);

});