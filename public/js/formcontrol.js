//Form

var rowcount = 0;

function removeElements() {

	$('#tempfields').empty();

}//function removeElements() {


function addT1Elements() { //AC ELEMENTS
	var tempcon = document.getElementById('tempfields');

	//----------------------------------------------------------------------------------

	var div1 = document.createElement('div');
	div1.setAttribute('class', 'field');
	tempcon.appendChild(div1);

	tempcon.lastChild.appendChild(document.createElement('label'));

	tempcon.lastChild.lastChild.appendChild(document.createTextNode('Position '));

	var span1 = document.createElement('span');
	span1.setAttribute('class', 'asterisk');
	tempcon.lastChild.lastChild.appendChild(span1);

	tempcon.lastChild.lastChild.lastChild.appendChild(document.createTextNode('*'));

	var div2 = document.createElement('div');
	div2.setAttribute('class', 'five fields');
	tempcon.lastChild.appendChild(div2);

	var div3 = document.createElement('div');
	div3.setAttribute('class', 'ui input field');
	tempcon.lastChild.lastChild.appendChild(div3);

	var input1 = document.createElement('input');
	input1.setAttribute('type','text');
	input1.setAttribute('name', 'position');
	input1.setAttribute('placeholder', 'e.g. Software Developer');
	tempcon.lastChild.lastChild.lastChild.appendChild(input1);

	//----------------------------------------------------------------------------------

	var div4 = document.createElement('div');
	div4.setAttribute('class', 'three fields');
	tempcon.appendChild(div4);

	var div5 = document.createElement('div');
	div5.setAttribute('class', 'field');
	tempcon.lastChild.appendChild(div5);

	tempcon.lastChild.lastChild.appendChild(document.createElement('label'));

	tempcon.lastChild.lastChild.lastChild.appendChild(document.createTextNode('Office Name '));

	var span2 = document.createElement('span');
	span2.setAttribute('class', 'asterisk');
	tempcon.lastChild.lastChild.lastChild.appendChild(span2);

	tempcon.lastChild.lastChild.lastChild.lastChild.appendChild(document.createTextNode('*'));

	var div6 = document.createElement('div');
	div6.setAttribute('class', 'ui input field');
	tempcon.lastChild.lastChild.appendChild(div6);

	var input2 = document.createElement('input');
	input2.setAttribute('type','text');
	input2.setAttribute('name', 'officename');
	input2.setAttribute('placeholder', 'e.g. Sample Inc.');
	tempcon.lastChild.lastChild.lastChild.appendChild(input2);

	//----------------------------------------------------------------------------------

	var div7 = document.createElement('div');
	div7.setAttribute('class', 'field');
	tempcon.lastChild.appendChild(div7);

	tempcon.lastChild.lastChild.appendChild(document.createElement('label'));

	tempcon.lastChild.lastChild.lastChild.appendChild(document.createTextNode('Office Address '));

	var span3 = document.createElement('span');
	span3.setAttribute('class', 'asterisk');
	tempcon.lastChild.lastChild.lastChild.appendChild(span3);

	tempcon.lastChild.lastChild.lastChild.lastChild.appendChild(document.createTextNode('*'));

	var div8 = document.createElement('div');
	div8.setAttribute('class', 'ui input field');
	tempcon.lastChild.lastChild.appendChild(div8);

	var input2 = document.createElement('input');
	input2.setAttribute('type','text');
	input2.setAttribute('name', 'officeadd');
	input2.setAttribute('placeholder', 'Street Address Barangay City');
	tempcon.lastChild.lastChild.lastChild.appendChild(input2);

	//----------------------------------------------------------------------------------

	div9 = document.createElement('div');
	div9.setAttribute('class', 'five fields');
	tempcon.appendChild(div9);

	var div10 = document.createElement('div');
	div10.setAttribute('class', 'field');
	tempcon.lastChild.appendChild(div10);

	tempcon.lastChild.lastChild.appendChild(document.createElement('label'));

	tempcon.lastChild.lastChild.lastChild.appendChild(document.createTextNode('AC Sector '));

	var span4 = document.createElement('span');
	span4.setAttribute('class', 'asterisk');
	tempcon.lastChild.lastChild.lastChild.appendChild(span4);

	tempcon.lastChild.lastChild.lastChild.lastChild.appendChild(document.createTextNode('*'));

	div11 = document.createElement('div');
	div11.setAttribute('class', 'five fields');
	tempcon.lastChild.lastChild.appendChild(div11);

	var select1 = document.createElement('select');
	select1.setAttribute('class', 'ui selection dropdown');
	select1.setAttribute('name', 'acsector');
	tempcon.lastChild.lastChild.lastChild.appendChild(select1);

	var opt1 = document.createElement('option');
	opt1.setAttribute('class', 'disabled');
	tempcon.lastChild.lastChild.lastChild.lastChild.appendChild(opt1);

	tempcon.lastChild.lastChild.lastChild.lastChild.lastChild.appendChild(document.createTextNode('Select One'));


	//----------------------------------------------------------------------------------

	div12 = document.createElement('div');
	div12.setAttribute('class', 'field');
	tempcon.lastChild.appendChild(div12);

	tempcon.lastChild.lastChild.appendChild(document.createElement('label'));

	tempcon.lastChild.lastChild.lastChild.appendChild(document.createTextNode('AC Category '));

	var span5 = document.createElement('span');
	span5.setAttribute('class', 'asterisk');
	tempcon.lastChild.lastChild.lastChild.appendChild(span5);

	tempcon.lastChild.lastChild.lastChild.lastChild.appendChild(document.createTextNode('*'));

	div13 = document.createElement('div');
	div13.setAttribute('class', 'five fields');
	tempcon.lastChild.lastChild.appendChild(div13);

	var select2 = document.createElement('select');
	select2.setAttribute('class', 'ui selection dropdown');
	select2.setAttribute('name', 'accateg');
	tempcon.lastChild.lastChild.lastChild.appendChild(select2);

	var opt2 = document.createElement('option');
	opt2.setAttribute('class', 'disabled');
	tempcon.lastChild.lastChild.lastChild.lastChild.appendChild(opt2);

	tempcon.lastChild.lastChild.lastChild.lastChild.lastChild.appendChild(document.createTextNode('Select One'));


}//function addACElements() {

function addT2Elements() { //PSMU and TWG ELEMENTS

	var tempcon = document.getElementById('tempfields');

	//----------------------------------------------------------------------------------

	var div1 = document.createElement('div');
	div1.setAttribute('class', 'field');
	tempcon.appendChild(div1);

	tempcon.lastChild.appendChild(document.createElement('label'));

	tempcon.lastChild.lastChild.appendChild(document.createTextNode('Position '));

	var span1 = document.createElement('span');
	span1.setAttribute('class', 'asterisk');
	tempcon.lastChild.lastChild.appendChild(span1);

	tempcon.lastChild.lastChild.lastChild.appendChild(document.createTextNode('*'));

	var div2 = document.createElement('div');
	div2.setAttribute('class', 'five fields');
	tempcon.lastChild.appendChild(div2);

	var div3 = document.createElement('div');
	div3.setAttribute('class', 'field');
	tempcon.lastChild.lastChild.appendChild(div3);

	var select1 = document.createElement('select');
	select1.setAttribute('class', 'ui selection dropdown');
	select1.setAttribute('name', 'position');
	tempcon.lastChild.lastChild.lastChild.appendChild(select1);

	var opt1 = document.createElement('option');
	opt1.setAttribute('class', 'disabled');
	tempcon.lastChild.lastChild.lastChild.lastChild.appendChild(opt1);

	tempcon.lastChild.lastChild.lastChild.lastChild.lastChild.appendChild(document.createTextNode('Select One'));

	//----------------------------------------------------------------------------------

	var div4 = document.createElement('div');
	div4.setAttribute('class', 'field');
	tempcon.appendChild(div4);

	tempcon.lastChild.appendChild(document.createElement('label'));

	tempcon.lastChild.lastChild.appendChild(document.createTextNode('Unit/Office '));

	var span2 = document.createElement('span');
	span2.setAttribute('class', 'asterisk');
	tempcon.lastChild.lastChild.appendChild(span2);

	tempcon.lastChild.lastChild.lastChild.appendChild(document.createTextNode('*'));

	var div5 = document.createElement('div');
	div5.setAttribute('class', 'five fields');
	tempcon.lastChild.appendChild(div5);

	var div6 = document.createElement('div');
	div6.setAttribute('class', 'field');
	tempcon.lastChild.lastChild.appendChild(div6);

	var select2 = document.createElement('select');
	select2.setAttribute('class', 'ui selection dropdown');
	select2.setAttribute('name', 'primary');
	tempcon.lastChild.lastChild.lastChild.appendChild(select2);

	var opt2 = document.createElement('option');
	opt2.setAttribute('class', 'disabled');
	tempcon.lastChild.lastChild.lastChild.lastChild.appendChild(opt2);

	tempcon.lastChild.lastChild.lastChild.lastChild.lastChild.appendChild(document.createTextNode('Primary Office'));

	//----------------------------------------------------------------------------------

	var div7 = document.createElement('div');
	div7.setAttribute('class', 'field');
	tempcon.lastChild.lastChild.appendChild(div7);

	var select3 = document.createElement('select');
	select3.setAttribute('class', 'ui selection dropdown');
	select3.setAttribute('name', 'secondary');
	tempcon.lastChild.lastChild.lastChild.appendChild(select3);

	var opt3 = document.createElement('option');
	opt3.setAttribute('class', 'disabled');
	tempcon.lastChild.lastChild.lastChild.lastChild.appendChild(opt3);

	tempcon.lastChild.lastChild.lastChild.lastChild.lastChild.appendChild(document.createTextNode('Secondary Office'));


}//function addT2Elements() {


//Multiple Text Input

function additem(text, index) {
	var ulist = document.getElementsByName('lecturer')[index];
	var container = document.getElementsByName('pcontainer')[index];
	var inputlist = document.getElementsByName('inputlist')[index];
	var textfield = document.getElementsByName('inputlecturer')[index];

	var newli = document.createElement('li');
	newli.setAttribute('class', 'inputchoice');
	ulist.appendChild(newli);

	var span = document.createElement("span");
	span.setAttribute('class', 'inputtitle');
	ulist.lastChild.appendChild(span);
	ulist.lastChild.lastChild.appendChild(document.createTextNode(text));

	var alink = document.createElement("a");
	alink.setAttribute('class','deleteinput');
	alink.setAttribute('onclick', 'deletearritem($(this).parent().index(), ' + index + ')');
	ulist.lastChild.appendChild(alink);
	var ibtn = document.createElement("i");
	ibtn.setAttribute('class', 'remove icon');
	ulist.lastChild.lastChild.appendChild(ibtn);

	ulist.insertBefore(newli, inputlist);

	textfield.value = "";

}//function additemtolist() {

function deleteitem(index, rowindex, ulist) {

	ulist.removeChild(ulist.getElementsByTagName('li')[index]);
}//function deleteitem() {

function divonfocus(index) {
	document.getElementsByName("pcontainer")[0].style.borderColor = "#85B7D9";

}//function divonfocus() {

$(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});

function addrow() {

	rowcount += 1;

	var table = document.getElementById('traintable').getElementsByTagName('tbody')[0];

	table.appendChild(document.createElement('tr'));

	table.lastChild.appendChild(document.createElement('td'));

	table.lastChild.lastChild.appendChild(document.createElement('center'));

	var div1 = document.createElement('div');
	div1.setAttribute('class', 'ui input field');
	table.lastChild.lastChild.lastChild.appendChild(div1);

	var input1 = document.createElement('input');
	input1.setAttribute('type', 'text');
	input1.setAttribute('name','traintitle');
	input1.setAttribute('placeholder', 'e.g. The Sample Title');
	table.lastChild.lastChild.lastChild.lastChild.appendChild(input1);

	table.lastChild.appendChild(document.createElement('td'));

	table.lastChild.lastChild.appendChild(document.createElement('center'));

	var div2 = document.createElement('div');
	div2.setAttribute('class', 'field');
	table.lastChild.lastChild.lastChild.appendChild(div2);

	var select1 = document.createElement('select');
	select1.setAttribute('id', 'select');
	select1.setAttribute('class', 'ui selection dropdown');
	select1.setAttribute('onchange', 'showfield(this.value, rowcount)');
	select1.setAttribute('name','traincateg');
	table.lastChild.lastChild.lastChild.lastChild.appendChild(select1);

	var opt1 = document.createElement('option');
	opt1.setAttribute('class', 'disabled');
	table.lastChild.lastChild.lastChild.lastChild.lastChild.appendChild(opt1);

	table.lastChild.lastChild.lastChild.lastChild.lastChild.lastChild.appendChild(document.createTextNode('Select One'));

	var opt2 = document.createElement('option');
	opt2.setAttribute('value', 'Advisory Council Summit');
	table.lastChild.lastChild.lastChild.lastChild.lastChild.appendChild(opt2);

	table.lastChild.lastChild.lastChild.lastChild.lastChild.lastChild.appendChild(document.createTextNode('Advisory Council Summit'));

	var opt3 = document.createElement('option');
	opt3.setAttribute('value', 'Family Conference');
	table.lastChild.lastChild.lastChild.lastChild.lastChild.appendChild(opt3);

	table.lastChild.lastChild.lastChild.lastChild.lastChild.lastChild.appendChild(document.createTextNode('Family Conference'));

	var opt4 = document.createElement('option');
	opt4.setAttribute('value', 'Boot Camp (Basic)');
	table.lastChild.lastChild.lastChild.lastChild.lastChild.appendChild(opt4);

	table.lastChild.lastChild.lastChild.lastChild.lastChild.lastChild.appendChild(document.createTextNode('Boot Camp (Basic)'));

	var opt5 = document.createElement('option');
	opt5.setAttribute('value', 'Boot Camp (Master)');
	table.lastChild.lastChild.lastChild.lastChild.lastChild.appendChild(opt5);

	table.lastChild.lastChild.lastChild.lastChild.lastChild.lastChild.appendChild(document.createTextNode('Boot Camp (Master)'));

	var opt6 = document.createElement('option');
	opt6.setAttribute('value', 'Lecture Series');
	table.lastChild.lastChild.lastChild.lastChild.lastChild.appendChild(opt6);

	table.lastChild.lastChild.lastChild.lastChild.lastChild.lastChild.appendChild(document.createTextNode('Lecture Series'));


	var opt7 = document.createElement('option');
	opt7.setAttribute('value', 'Strategy Refresh');
	table.lastChild.lastChild.lastChild.lastChild.lastChild.appendChild(opt7);

	table.lastChild.lastChild.lastChild.lastChild.lastChild.lastChild.appendChild(document.createTextNode('Strategy Refresh'));

	var opt8 = document.createElement('option');
	opt8.setAttribute('value', '7');
	table.lastChild.lastChild.lastChild.lastChild.lastChild.appendChild(opt8);

	table.lastChild.lastChild.lastChild.lastChild.lastChild.lastChild.appendChild(document.createTextNode('Others'));

	var div3 = document.createElement('div');
	div3.setAttribute('class', 'ui input');
	div3.setAttribute('name', 'othercon');
	div3.setAttribute('style', 'display:none');
	table.lastChild.lastChild.lastChild.lastChild.appendChild(div3);

	table.lastChild.lastChild.lastChild.lastChild.lastChild.appendChild(document.createElement('br'));

	var input2 = document.createElement('input');
	input2.setAttribute('type', 'text');
	input2.setAttribute('name','othercat');
	input2.setAttribute('placeholder', 'Please specify (required)');
	table.lastChild.lastChild.lastChild.lastChild.lastChild.appendChild(input2);

	table.lastChild.appendChild(document.createElement('td'));

	table.lastChild.lastChild.appendChild(document.createElement('center'));

	var div4 = document.createElement('div');
	div4.setAttribute('class', 'ui input field');
	table.lastChild.lastChild.lastChild.appendChild(div4);

	var input3 = document.createElement('input');
	input3.setAttribute('type', 'text');
	input3.setAttribute('name','location');
	input3.setAttribute('placeholder', 'e.g. Makati City');
	table.lastChild.lastChild.lastChild.lastChild.appendChild(input3);


	table.lastChild.appendChild(document.createElement('td'));

	table.lastChild.lastChild.appendChild(document.createElement('center'));

	var div5 = document.createElement('div');
	div5.setAttribute('class', 'ui input field');
	table.lastChild.lastChild.lastChild.appendChild(div5);

	var input4 = document.createElement('input');
	input4.setAttribute('type', 'date');
	input4.setAttribute('name','traindate');
	input4.setAttribute('max', "{{date('Y-m-d', strtotime(date('Y-m-d')  . ' +1 day'))}}");
	table.lastChild.lastChild.lastChild.lastChild.appendChild(input4);

	table.lastChild.appendChild(document.createElement('td'));

	table.lastChild.lastChild.appendChild(document.createElement('center'));

	var div6 = document.createElement('div');
	div6.setAttribute('class', 'ui input field');
	table.lastChild.lastChild.lastChild.appendChild(div6);

	var input5 = document.createElement('input');
	input5.setAttribute('type', 'time');
	input5.setAttribute('name','traintime');
	table.lastChild.lastChild.lastChild.lastChild.appendChild(input5);

	table.lastChild.appendChild(document.createElement('td'));

	table.lastChild.lastChild.appendChild(document.createElement('center'));

	var div7 = document.createElement('div');
	div7.setAttribute('class', 'five fields');
	table.lastChild.lastChild.lastChild.appendChild(div7);

	var div8 = document.createElement('div');
	div8.setAttribute('class', 'divpercon');
	div8.setAttribute('name', 'pcontainer');
	table.lastChild.lastChild.lastChild.lastChild.appendChild(div8);

	var ul = document.createElement('ul');
	ul.setAttribute('class', 'perlist');
	ul.setAttribute('name', 'lecturer');
	table.lastChild.lastChild.lastChild.lastChild.lastChild.appendChild(ul);

	var li = document.createElement('li');
	li.setAttribute('class', 'inputitem');
	li.setAttribute('name', 'inputlist');
	table.lastChild.lastChild.lastChild.lastChild.lastChild.lastChild.appendChild(li);

	var input6 = document.createElement('input');
	input6.setAttribute('type', 'text');
	input6.setAttribute('name','inputlecturer');
	input6.setAttribute('placeholder','LN, FN MI');
	input6.setAttribute('class','perfield');
	input6.setAttribute('onclick','divonfocus()');
	input6.setAttribute('onkeydown','if(event.keyCode == 13){ addarritem(rowcount);}');
	table.lastChild.lastChild.lastChild.lastChild.lastChild.lastChild.lastChild.appendChild(input6);

	table.lastChild.appendChild(document.createElement('td'));

	table.lastChild.lastChild.appendChild(document.createElement('center'));

	var div9 = document.createElement('div');
	div9.setAttribute('class', 'ui input field');
	table.lastChild.lastChild.lastChild.appendChild(div9);

	var input7 = document.createElement('input');
	input7.setAttribute('type', 'text');
	input7.setAttribute('name','trainorg');
	input7.setAttribute('name','e.g. CPSM');
	table.lastChild.lastChild.lastChild.lastChild.appendChild(input7);
}//function addrow() {
//View