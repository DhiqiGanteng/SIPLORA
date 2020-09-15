/*
 Highcharts JS v7.0.0 (2018-12-11)
 GridAxis

 (c) 2016-2018 Lars A. V. Cabrera

 License: www.highcharts.com/license
*/
(function(l){"object"===typeof module&&module.exports?module.exports=l:"function"===typeof define&&define.amd?define(function(){return l}):l("undefined"!==typeof Highcharts?Highcharts:void 0)})(function(l){(function(h){var w=function(a){return Array.prototype.slice.call(a,1)},l=h.dateFormat,q=h.defined,B=h.isArray,C=h.isNumber,u=function(a){return h.isObject(a,!0)},D=h.merge,z=h.pick,p=h.wrap,k=h.Axis,E=h.Tick,A={top:0,right:1,bottom:2,left:3,0:"top",1:"right",2:"bottom",3:"left"};k.prototype.isNavigatorAxis=
function(){return/highcharts-navigator-[xy]axis/.test(this.options.className)};k.prototype.isOuterAxis=function(){var a=this,b=-1,c=!0;a.chart.axes.forEach(function(f,d){f.side!==a.side||f.isNavigatorAxis()||(f===a?b=d:0<=b&&d>b&&(c=!1))});return c};k.prototype.getMaxLabelDimensions=function(a,b){var c={width:0,height:0};b.forEach(function(b){b=a[b];var d;u(b)&&(d=u(b.label)?b.label:{},b=d.getBBox?d.getBBox().height:0,d=C(d.textPxLength)?d.textPxLength:0,c.height=Math.max(b,c.height),c.width=Math.max(d,
c.width))});return c};h.dateFormats={W:function(a){a=new Date(a);var b;a.setHours(0,0,0,0);a.setDate(a.getDate()-(a.getDay()||7));b=new Date(a.getFullYear(),0,1);return Math.ceil(((a-b)/864E5+1)/7)},E:function(a){return l("%a",a,!0).charAt(0)}};p(k.prototype,"autoLabelAlign",function(a){return this.chart.isStock?"left":a.apply(this,w(arguments))});p(E.prototype,"getLabelPosition",function(a,b,c,f,d,r,v,x){var e=this.axis,g=e.reversed,n=e.chart,m=e.options,h=m&&u(m.grid)?m.grid:{},m=r.align,t=A[e.side],
k=e.tickPositions,p=this.pos-v,q=C(k[x+1])?k[x+1]-v:e.max+v,l=e.tickSize("tick",!0),k=B(l)?l[0]:0,l=l&&l[1]/2,y;!0===h.enabled?("top"===t?(h=e.top+e.offset,y=h-k):"bottom"===t?(y=n.chartHeight-e.bottom+e.offset,h=y+k):(h=e.top+e.len-e.translate(g?q:p),y=e.top+e.len-e.translate(g?p:q)),"right"===t?(t=n.chartWidth-e.right+e.offset,g=t+k):"left"===t?(g=e.left+e.offset,t=g-k):(t=Math.round(e.left+e.translate(g?q:p))-l,g=Math.round(e.left+e.translate(g?p:q))-l),this.slotWidth=g-t,g={x:"left"===m?t:"right"===
m?g:t+(g-t)/2,y:y+(h-y)/2},n=n.renderer.fontMetrics(r.style.fontSize,f.element),m=f.getBBox().height,r.useHTML?g.y+=n.b+-(m/2):(m=Math.round(m/n.h),g.y+=(n.b-(n.h-n.f))/2+-((m-1)*n.h/2)),g.x+=e.horiz&&r.x||0):g=a.apply(this,w(arguments));return g});p(k.prototype,"tickSize",function(a){var b=this.maxLabelDimensions,c=this.options,f=c&&u(c.grid)?c.grid:{},c=a.apply(this,w(arguments));!0===f.enabled&&(f=2*Math.abs(this.defaultLeftAxisOptions.labels.x),b=f+(this.horiz?b.height:b.width),B(c)?c[0]=b:c=
[b]);return c});p(k.prototype,"getTitlePosition",function(a){var b=this.options;if(!0===(b&&u(b.grid)?b.grid:{}).enabled){var c=this.axisTitle,f=c&&c.getBBox().width,d=this.horiz,r=this.left,v=this.top,x=this.width,e=this.height,g=b.title,b=this.opposite,n=this.offset,m=this.tickSize()||[0],h=g.x||0,k=g.y||0,l=z(g.margin,d?5:10),c=this.chart.renderer.fontMetrics(g.style&&g.style.fontSize,c).f,m=(d?v+e:r)+m[0]/2*(b?-1:1)*(d?1:-1)+(this.side===A.bottom?c:0);return{x:d?r-f/2-l+h:m+(b?x:0)+n+h,y:d?m-
(b?e:0)+(b?c:-c)/2+n+k:v-l+k}}return a.apply(this,w(arguments))});p(k.prototype,"unsquish",function(a){var b=this.options;return!0===(b&&u(b.grid)?b.grid:{}).enabled&&this.categories?this.tickInterval:a.apply(this,w(arguments))});h.addEvent(k,"afterSetOptions",function(a){var b=this.options;a=a.userOptions;var c,f=b&&u(b.grid)?b.grid:{};!0===f.enabled&&(c=D(!0,{className:"highcharts-grid-axis "+(a.className||""),dateTimeLabelFormats:{hour:{list:["%H:%M","%H"]},day:{list:["%A, %e. %B","%a, %e. %b",
"%E"]},week:{list:["Week %W","W%W"]},month:{list:["%B","%b","%o"]}},grid:{borderWidth:1},labels:{padding:2,style:{fontSize:"13px"}},title:{text:null,reserveSpace:!1,rotation:0},units:[["millisecond",[1,10,100]],["second",[1,10]],["minute",[1,5,15]],["hour",[1,6]],["day",[1]],["week",[1]],["month",[1]],["year",null]]},a),"xAxis"===this.coll&&(q(a.linkedTo)&&!q(a.tickPixelInterval)&&(c.tickPixelInterval=350),q(a.tickPixelInterval)||!q(a.linkedTo)||q(a.tickPositioner)||q(a.tickInterval)||(c.tickPositioner=
function(a,b){var d=this.linkedParent&&this.linkedParent.tickPositions&&this.linkedParent.tickPositions.info;if(d){var f,e,g,n,m=c.units;for(n=0;n<m.length;n++)if(m[n][0]===d.unitName){f=n;break}if(m[f][1])return m[f+1]&&(g=m[f+1][0],e=(m[f+1][1]||[1])[0]),d=h.timeUnits[g],this.tickInterval=d*e,this.getTimeTicks({unitRange:d,count:e,unitName:g},a,b,this.options.startOfWeek)}})),D(!0,this.options,c),this.horiz&&(b.minPadding=z(a.minPadding,0),b.maxPadding=z(a.maxPadding,0)),C(b.grid.borderWidth)&&
(b.tickWidth=b.lineWidth=f.borderWidth))});p(k.prototype,"setAxisTranslation",function(a){var b=this.options,c=b&&u(b.grid)?b.grid:{},f=this.tickPositions&&this.tickPositions.info,d=this.userOptions.labels||{};this.horiz&&(!0===c.enabled&&this.series.forEach(function(a){a.options.pointRange=0}),f&&(!1===b.dateTimeLabelFormats[f.unitName].range||1<f.count)&&!q(d.align)&&(b.labels.align="left",q(d.x)||(b.labels.x=3)));a.apply(this,w(arguments))});p(k.prototype,"trimTicks",function(a){var b=this.options,
c=b&&u(b.grid)?b.grid:{},f=this.categories,d=this.tickPositions,r=d[0],h=d[d.length-1],k=this.linkedParent&&this.linkedParent.min||this.min,e=this.linkedParent&&this.linkedParent.max||this.max,g=this.tickInterval,n=r>k,m=h<e,r=r<k&&r+g>k,h=h>e&&h-g<e;!0!==c.enabled||f||!this.horiz&&!this.isLinked||(!n&&!r||b.startOnTick||(d[0]=k),!m&&!h||b.endOnTick||(d[d.length-1]=e));a.apply(this,w(arguments))});p(k.prototype,"render",function(a){var b=this.options,c=b&&u(b.grid)?b.grid:{},f,d,h,k,l,e=this.chart.renderer,
g=this.horiz;if(!0===c.enabled){if(c=2*Math.abs(this.defaultLeftAxisOptions.labels.x),this.maxLabelDimensions=this.getMaxLabelDimensions(this.ticks,this.tickPositions),c=this.maxLabelDimensions.width+c,f=b.lineWidth,this.rightWall&&this.rightWall.destroy(),a.apply(this),a=this.axisGroup.getBBox(),this.isOuterAxis()&&this.axisLine&&(g&&(c=a.height-1),f)){a=this.getLinePath(f);k=a.indexOf("M")+1;l=a.indexOf("L")+1;d=a.indexOf("M")+2;h=a.indexOf("L")+2;if(this.side===A.top||this.side===A.left)c=-c;g?
(a[d]+=c,a[h]+=c):(a[k]+=c,a[l]+=c);this.axisLineExtra?this.axisLineExtra.animate({d:a}):this.axisLineExtra=e.path(a).attr({stroke:b.lineColor,"stroke-width":f,zIndex:7}).addClass("highcharts-axis-line").add(this.axisGroup);this.axisLine[this.showAxis?"show":"hide"](!0)}}else a.apply(this)});p(k.prototype,"init",function(a,b,c){function f(a){var b=a.options,c=25/11,e=a.chart.renderer.fontMetrics(b.labels.style.fontSize);b.labels||(b.labels={});b.labels.align=z(b.labels.align,"center");a.categories||
(b.showLastLabel=!1);a.horiz&&(b.tickLength=d.cellHeight||e.h*c);a.labelRotation=0;b.labels.rotation=0}var d=c&&u(c.grid)?c.grid:{},l,v,x;if(d.enabled)if(q(d.borderColor)&&(c.tickColor=c.lineColor=d.borderColor),B(d.columns))for(v=0,x=d.columns.length;x--;)l=D(c,d.columns[x],{type:"category"}),delete l.grid.columns,l=new k(b,l),l.isColumn=!0,l.columnIndex=v,p(l,"labelFormatter",function(a){var b=this.axis,c=b.tickPositions,d=this.value,e=d===c[0],c=d===c[c.length-1],f=h.find(b.series[0].options.data,
function(a){return a[b.isXAxis?"x":"y"]===d});this.isFirst=e;this.isLast=c;this.point=f;return a.call(this)}),v++;else a.apply(this,w(arguments)),f(this);else a.apply(this,w(arguments))})})(l)});
//# sourceMappingURL=grid-axis.js.map
