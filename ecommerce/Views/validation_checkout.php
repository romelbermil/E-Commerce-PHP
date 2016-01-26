<style type="text/css">
#contact_form label.error, .output {color:#f60; text-align:left; width:100%;}
</style>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script> 
<!----------======================Validation for Contact========================------------------------>
<script> 
$(function() {
$("#check_out").validate({
rules: 
	{
	
	name: "required",
	sex: "required",
	email: 
		{
		required: true,
		email: true
		},
	contact_no: "required",
	address: "required",
	city: "required",
	state: "required",
	zip: "required",

},

messages: 
	{
	name: "*",
	email: "*",
	pass1: "*",
	pass2: "*",
	contact_no: "*",
	address: "*",
	city: "*",
	state: "*",
	zip: "*",
	},

submitHandler: function(form) {
form.submit();
}
});

});
</script>
