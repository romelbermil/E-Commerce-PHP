<style type="text/css">
#contact_form label.error, .output {color:#C30; text-align:left; width:100%;}
</style>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script> 
<!----------======================Validation for Contact========================------------------------>
<script> 
$(function() {
$("#signup_form").validate({
rules: 
	{
	
	f_name: "required",
	m_name: "required",  
	l_name: "required",
	sex: "required",
	dob: "required", 
	race: "required", 
	profession: "required", 
	skill: "required", 
	referred_by: "required",
	email: 
		{
		required: true,
		email: true
		},
	pass1: "required",
	pass2: "required",
	contact_no: "required",
	address: "required",
	city: "required",
	state: "required",
	zip: "required",

},

messages: 
	{
	f_name: "*",
	m_name: "*",  
	l_name: "*",
	sex: "*",
	dob: "*", 
	race: "*", 
	profession: "*", 
	skill: "*", 
	referred_by: "*",
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
