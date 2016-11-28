//Form

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

function additem(text) {
	var ulist = document.getElementsByName('lecturer')[0];
	var container = document.getElementsByName('pcontainer')[0];
	var inputlist = document.getElementsByName('inputlist')[0];
	var textfield = document.getElementsByName('inputlecturer')[0];

	var newli = document.createElement('li');
	newli.setAttribute('class', 'inputchoice');
	ulist.appendChild(newli);

	var span = document.createElement("span");
	span.setAttribute('class', 'inputtitle');
	ulist.lastChild.appendChild(span);
	ulist.lastChild.lastChild.appendChild(document.createTextNode(text));

	var alink = document.createElement("a");
	alink.setAttribute('class','deleteinput');
	alink.setAttribute('onclick', 'deletearritem($(this).parent().index())');
	ulist.lastChild.appendChild(alink);
	var ibtn = document.createElement("i");
	ibtn.setAttribute('class', 'remove icon');
	ulist.lastChild.lastChild.appendChild(ibtn);

	ulist.insertBefore(newli, inputlist);

	textfield.value = "";

}//function additemtolist() {

function deleteitem(index, ulist) {

	ulist.removeChild(ulist.getElementsByTagName('li')[index]);
}//function deleteitem() {

function divonfocus() {
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

//View