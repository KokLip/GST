$(document).ready(function()
{
	$(".module_checkboxes").change(function()
	{
		if ($(this).prop('checked'))
		{
			$(this).parent().find('input[type=checkbox]').not(':disabled').prop('checked', true);
		}
		else
		{
			$(this).parent().find('input[type=checkbox]').not(':disabled').prop('checked', false);			
		}
	});
});