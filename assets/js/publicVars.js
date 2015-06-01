(function($){
	$.fn.firstLoad = function()
	{
		var obj = this;
		
		$('a[href^="#"]').each(function(){
			$(this).click(function(e){
				e.preventDefault();
			});
		});
		
		$('.date')
	     .attr({'placeholder':'yyyy-mm-dd','readonly':'readonly'})
	     .datepicker({
	             minDate : '-1440',
	             dateFormat:'yy-mm-dd',
	             showAnim: "fold",
	         	 changeMonth: true,
	             changeYear: true,
	             onClose: function( a ) 
	             {
	                 $(".date-end").datepicker( "option", "minDate", a );
	             }
	         });
			
			$('.date-end')
	        .attr({'placeholder':'yyyy-mm-dd','readonly':'readonly'})
	        .datepicker({
	                dateFormat:'yy-mm-dd',
	                defaultDate: "+1m",
	                showAnim: "fold",
	                changeMonth: true,
	                changeYear: true,
	                onClose: function( a ) 
	                    {
	                        $(".date").datepicker( "option", "maxDate", a );
	                    }
	            });
		
		$('[title]').tooltip({placement:'bottom'});
		
		$(".table").not('.table-standard').dataTable({
			fnInitComplete:function(oSetting)
			{
				$('select').select2();
				$('[title]').tooltip({placement:'bottom'});
			}
			/*,
			aoColumnDefs:[
				{ "bSortable": false, "aTargets": [0]}, 
		   		{ "bSearchable": false, "aTargets": [0]}
			]*/
		});
		
		$('select').select2();
//		$("textarea.wysi").htmlarea({
//		toolbar: [
//            ["html"],
//            ["bold", "italic","underline", "strikethrough",//"forecolor",
//            "|","indent", "outdent","unorderedlist","orderedlist"],
//            ["justifyleft", "justifycenter", "justifyright"],
//            ["p", "h1", "h2", "h3", "h4"],
//            ["link", "unlink"]
//        ],
//        toolbarText: $.extend({}, jHtmlArea.defaultOptions.toolbarText, {
//                "bold": "fett",
//                "italic": "kursiv",
//                "underline": "unterstreichen"
//            }),
//        css:'../assets/css/bootstrap-cosmo.min.css'
//		});
		
		$(window).on('resize',function(){
			var jhtml = $('.jHtmlArea');
			if(jhtml.length > 0)
			{
				var ifrm = jhtml.find('iframe').eq(0);
				jhtml.css('width','100%');
				ifrm.css('width','100%');
			}
		});
		
		$('[data-toggle=modal]').attr('onclick','$(this).loadModal()');
	}
	
	$.fn.loadModal = function()
	{
		var uri = $(this).attr('data-url');
		var title = $(this).attr('data-title');
		var button = $(this).attr('data-button');
		var large = $(this).attr('data-large');
		
		$('#modal').removeClass('modal-huge');
		$('#modal-button').addClass('hide');
		$('#modal-body').empty();
		
		if(uri)
		{
			$.ajax({
				url:uri,
				cache:false,
				success:function(a)
				{
					$('#modal-body').html(a);
					
					if(title)$('#modal-title').text(title);
					
					if(button == 'true')$('#modal-button').removeClass('hide');
					
					if(large == 'true')$('#modal').addClass('modal-huge');
					
					$('#modal-button').click(function(e){
						$('#modal-body').find('form').eq(0).submit();
						e.preventDefault();
					});
				}
			});
		}
		
	}
})(jQuery);
