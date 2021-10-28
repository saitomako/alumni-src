//created by saitomako.
function url2cmd(url) {
    if (!url.match(/^http:\/\/handsout\.jp\/slide\/([0-9]+)\/([0-9a-f]+)$/)) {
    	document.write('<font color="red">'+url+'</font>');
    	return;
    }
    var id1 = RegExp.$1;
    var id2 = RegExp.$2;
    main(id1,id2);
}

function main(id1,id2) {
    document.write('<iframe WIDTH="425" HEIGHT="382" MARGINWIDTH="0" MARGINHEIGHT="0" FRAMEBORDER="0" ');
    document.write('src="http://blog.handsout.jp/player/' + id1 + '/' + id2 + '">');
    document.write('</iframe>');
}
