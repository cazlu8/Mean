function ajax(array, cb) {
	cb(array);
}
ajax(['pa',1,true], function(array) {

	console.log('nome' + array[0] + 'idade:' + array[1]+'pa:'+array[2]);
});