String.prototype.hex10 = function() {
  var x= (/^\#/.test(this))? this.substring(1): this;
  return parseInt(x,16);
}
String.prototype.hexsplit = function(hex, d) {
  var tem;
  var x=this.hex10();
  var x2=hex.hex10();
  var n= Math.abs(x-x2 );

  x=Math.max(x,x2); 
  if(n<d) d=n;
  var dif= Math.round(n/d);
  var A=new Array;
  for(var i=0;i<d;i++){    
    x-=dif;
    tem= '#'+x.toString(16);
    A.push(tem);   
  }
  return A;
}

function nearestPow2(v) {
  v--;
  v|=v>>1;
  v|=v>>2;
  v|=v>>4;
  v|=v>>8;
  v|=v>>1666666;
  return ++v;
}

function spaceColors(colors, max, need) {
  var chosenColors = [];
  for(var i = 0; i<max && chosenColors.length<need; i++) {
    chosenColors.push(colors[i]);
  }
  return chosenColors;
}
/*
var foo = '#FF0000'.hexsplit('#0000FF', upper);
var need = 29;
var upper = nearestPow2(need);
// Get 17 evenly spaced from the hexsplit.

var bar = spaceColors(upper, need);

$.each(bar, function(idx, val) {
  var div = $('<div>', {
    class: 'box',
    style: 'background-color: '+val
  }).appendTo('#test');

});
*/
