// window.rsConf = { general: { usePost: true } };

var getSid = function() {
	let sid = "";
	$.each($('script'), function(id, val) { 
		var tmp_src = String($(this).attr('src'));
		var qs_index = tmp_src.indexOf('?');
		if (tmp_src.indexOf('readspeaker.js') < 0 || qs_index < 0) return;
		var params_raw = tmp_src.substr(qs_index + 1).split('&');
		var options = [];
		$.each(params_raw, function(id, param_pair){
			var pp_raw = param_pair.split('=');
			options[pp_raw[0]] = pp_raw[1];
			if (pp_raw[0] == 'sid') sid = pp_raw[1];
		});
	});
	return sid;
};

$(function() {

	let docTypes = [
		"odp", "ods", "odt",
		"xls", "xlxs", "pps", "ppt", "pptx", "doc", "docx",
		"rtf", "epub", "pdf"
	];
	let sid = getSid();

	if (rsData.drEnable == '1') docTypes.forEach(function(docType, i) {

		let docSym = $('.il_ContainerListItem span.il_ItemProperty:contains(' + docType + ')');
		docSym.each(function() {
			let docLink = $(this).parents('.il_ContainerListItem').find('a.il_ContainerItemTitle');
			let docUrl = docLink.attr('href');

			// let listenIconUrl = 'Customizing/global/plugins/Services/UIComponent/UserInterfaceHook/ReadSpeaker/assets/rs-listen-icon.png';
			let documentbutton =
				'<a rel="nofollow" href="https://docreader-eu.readspeaker.com/docreader/?cid=' + rsData.drCustomerId
					+ '&lang=' + rsData.drReadingLang
					+ '&sessioncookie=PHPSESSID%3D' + sid
					+ '&url=' + encodeURIComponent(docUrl)
					+ '" onclick="window.open(this.href, \'dcrwin\'); return false;" title="' + rsData.drImageAlt
					+ '" style="text-decoration: none; margin-left: 6px; color: #3333aa; font-weight: bold;"> '
				+ '<img src="' + rsData.drImageUrl + '" style="border-style: none; vertical-align: text-bottom;" alt="' + rsData.drImageAlt + '"> '
				+ rsData.drListenLabel
				+ '</a>';

			docLink.after(documentbutton);

		});

	});

	let readid = encodeURI(rsData.wrReadId);
	let readclass = encodeURI(rsData.wrReadClass);
	let contentbutton = 
		'<div id="readspeaker_button1" class="rs_skip rsbtn rs_preserve">'
		+ '<a rel="nofollow" class="rsbtn_play" title="' + rsData.wrListenAltText + '" href="' + rsData.wrAPIUrl + '?customerid=' + rsData.wrCustomerId
			+ '&amp;lang=' + rsData.wrReadingLang
			+ '&amp;voice=' + rsData.wrVoice
			+ '&amp;readid=' + readid
			+ '&amp;readclass=' + readclass
			+ '&amp;url=">'
		+ '<span class="rsbtn_left rsimg rspart"><span class="rsbtn_text"><span>' + rsData.wrListenLabel + '</span></span></span>'
		+ '<span class="rsbtn_right rsimg rsplay rspart"></span>'
		+ '</a>'
		+ '</div>';
	let container = '<div id="readspeaker_container">' + contentbutton + '</div>';
	$(".media.il_HeaderInner").prepend(container);
	$('#readspeaker_container').css({ "width": 500 });

	let rsApiUrl = rsData.wrScriptUrl.replace('[Customer ID]', rsData.wrCustomerId);
	$('<script src="' + rsApiUrl + '" type="text/javascript" id="rs_req_Init"></script>')
		.appendTo("head");
});

