$(document).ready(function(){$(window).width(),$(window).height()}),Array.prototype.lastIndexOf=function(o){for(var index=this.length;index>=0;index--)if(index in this&&this[index]===o)return index;return-1},Array.prototype.insertAt=function(o,index){return index>-1&&index<=this.length?(this.splice(index,0,o),!0):!1},Array.prototype.insertBefore=function(o,toInsert){var index=this.indexOf(o);return-1===index?!1:0===index?(this.unshift(toInsert),!0):this.insertAt(toInsert,index-1)},Array.prototype.insertAfter=function(o,toInsert){var index=this.indexOf(o);return-1==index?!1:index==this.length-1?(this.push(toInsert),!0):this.insertAt(toInsert,index+1)},Array.prototype.remove=function(from,to){var rest=this.slice((to||from)+1||this.length);return this.length=0>from?this.length+from:from,this.push.apply(this,rest)},Array.prototype.first=function(attribut,value){for(var i=0;i<this.length;i++)if(this[i][attribut]==value)return this.slice(i,i+1)[0];return null},Array.prototype.last=function(){return this[this.length-1]},Array.prototype.where=function(attribut,value){for(var res=[],i=0;i<this.length;i++)this[i][attribut]==value&&res.push(this.slice(i,i+1));return res},String.prototype.replaceAll=function(replace,value){return this.replace(new RegExp(replace,"g"),value)},function(window,document){function addStyleSheet(ownerDocument,cssText){var p=ownerDocument.createElement("p"),parent=ownerDocument.getElementsByTagName("head")[0]||ownerDocument.documentElement;return p.innerHTML="x<style>"+cssText+"</style>",parent.insertBefore(p.lastChild,parent.firstChild)}function getElements(){var elements=html5.elements;return"string"==typeof elements?elements.split(" "):elements}function getExpandoData(ownerDocument){var data=expandoData[ownerDocument[expando]];return data||(data={},expanID++,ownerDocument[expando]=expanID,expandoData[expanID]=data),data}function createElement(nodeName,ownerDocument,data){if(ownerDocument||(ownerDocument=document),supportsUnknownElements)return ownerDocument.createElement(nodeName);data||(data=getExpandoData(ownerDocument));var node;return node=data.cache[nodeName]?data.cache[nodeName].cloneNode():saveClones.test(nodeName)?(data.cache[nodeName]=data.createElem(nodeName)).cloneNode():data.createElem(nodeName),node.canHaveChildren&&!reSkip.test(nodeName)?data.frag.appendChild(node):node}function createDocumentFragment(ownerDocument,data){if(ownerDocument||(ownerDocument=document),supportsUnknownElements)return ownerDocument.createDocumentFragment();data=data||getExpandoData(ownerDocument);for(var clone=data.frag.cloneNode(),i=0,elems=getElements(),l=elems.length;l>i;i++)clone.createElement(elems[i]);return clone}function shivMethods(ownerDocument,data){data.cache||(data.cache={},data.createElem=ownerDocument.createElement,data.createFrag=ownerDocument.createDocumentFragment,data.frag=data.createFrag()),ownerDocument.createElement=function(nodeName){return html5.shivMethods?createElement(nodeName,ownerDocument,data):data.createElem(nodeName)},ownerDocument.createDocumentFragment=Function("h,f","return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&("+getElements().join().replace(/\w+/g,function(nodeName){return data.createElem(nodeName),data.frag.createElement(nodeName),'c("'+nodeName+'")'})+");return n}")(html5,data.frag)}function shivDocument(ownerDocument){ownerDocument||(ownerDocument=document);var data=getExpandoData(ownerDocument);return!html5.shivCSS||supportsHtml5Styles||data.hasCSS||(data.hasCSS=!!addStyleSheet(ownerDocument,"article,aside,dialog,figcaption,figure,footer,header,hgroup,main,nav,section{display:block}mark{background:#FF0;color:#000}template{display:none}")),supportsUnknownElements||shivMethods(ownerDocument,data),ownerDocument}function addWrappers(ownerDocument){for(var node,nodes=ownerDocument.getElementsByTagName("*"),index=nodes.length,reElements=RegExp("^(?:"+getElements().join("|")+")$","i"),result=[];index--;)node=nodes[index],reElements.test(node.nodeName)&&result.push(node.applyElement(createWrapper(node)));return result}function createWrapper(element){for(var node,nodes=element.attributes,index=nodes.length,wrapper=element.ownerDocument.createElement(shivNamespace+":"+element.nodeName);index--;){node=nodes[index];{node.specified&&wrapper.setAttribute(node.nodeName,node.nodeValue)}}return wrapper.style.cssText=element.style.cssText,wrapper}function shivCssText(cssText){for(var pair,parts=cssText.split("{"),index=parts.length,reElements=RegExp("(^|[\\s,>+~])("+getElements().join("|")+")(?=[[\\s,>+~#.:]|$)","gi"),replacement="$1"+shivNamespace+"\\:$2";index--;)pair=parts[index]=parts[index].split("}"),pair[pair.length-1]=pair[pair.length-1].replace(reElements,replacement),parts[index]=pair.join("}");return parts.join("{")}function removeWrappers(wrappers){for(var index=wrappers.length;index--;)wrappers[index].removeNode()}function shivPrint(ownerDocument){function removeSheet(){clearTimeout(data._removeSheetTimer),shivedSheet&&shivedSheet.removeNode(!0),shivedSheet=null}var shivedSheet,wrappers,data=getExpandoData(ownerDocument),namespaces=ownerDocument.namespaces,ownerWindow=ownerDocument.parentWindow;return!supportsShivableSheets||ownerDocument.printShived?ownerDocument:("undefined"==typeof namespaces[shivNamespace]&&namespaces.add(shivNamespace),ownerWindow.attachEvent("onbeforeprint",function(){removeSheet();for(var imports,length,sheet,collection=ownerDocument.styleSheets,cssText=[],index=collection.length,sheets=Array(index);index--;)sheets[index]=collection[index];for(;sheet=sheets.pop();)if(!sheet.disabled&&reMedia.test(sheet.media)){try{imports=sheet.imports,length=imports.length}catch(er){length=0}for(index=0;length>index;index++)sheets.push(imports[index]);try{cssText.push(sheet.cssText)}catch(er){}}cssText=shivCssText(cssText.reverse().join("")),wrappers=addWrappers(ownerDocument),shivedSheet=addStyleSheet(ownerDocument,cssText)}),ownerWindow.attachEvent("onafterprint",function(){removeWrappers(wrappers),clearTimeout(data._removeSheetTimer),data._removeSheetTimer=setTimeout(removeSheet,500)}),ownerDocument.printShived=!0,ownerDocument)}var supportsHtml5Styles,supportsUnknownElements,version="3.6.2",options=window.html5||{},reSkip=/^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,saveClones=/^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i,expando="_html5shiv",expanID=0,expandoData={};!function(){try{var a=document.createElement("a");a.innerHTML="<xyz></xyz>",supportsHtml5Styles="hidden"in a,supportsUnknownElements=1==a.childNodes.length||function(){document.createElement("a");var frag=document.createDocumentFragment();return"undefined"==typeof frag.cloneNode||"undefined"==typeof frag.createDocumentFragment||"undefined"==typeof frag.createElement}()}catch(e){supportsHtml5Styles=!0,supportsUnknownElements=!0}}();var html5={elements:options.elements||"abbr article aside audio bdi canvas data datalist details dialog figcaption figure footer header hgroup main mark meter nav output progress section summary template time video",version:version,shivCSS:options.shivCSS!==!1,supportsUnknownElements:supportsUnknownElements,shivMethods:options.shivMethods!==!1,type:"default",shivDocument:shivDocument,createElement:createElement,createDocumentFragment:createDocumentFragment};window.html5=html5,shivDocument(document);var reMedia=/^$|\b(?:all|print)\b/,shivNamespace="html5shiv",supportsShivableSheets=!supportsUnknownElements&&function(){var docEl=document.documentElement;return!("undefined"==typeof document.namespaces||"undefined"==typeof document.parentWindow||"undefined"==typeof docEl.applyElement||"undefined"==typeof docEl.removeNode||"undefined"==typeof window.attachEvent)}();html5.type+=" print",html5.shivPrint=shivPrint,shivPrint(document)}(this,document),function(window,document){function addStyleSheet(ownerDocument,cssText){var p=ownerDocument.createElement("p"),parent=ownerDocument.getElementsByTagName("head")[0]||ownerDocument.documentElement;return p.innerHTML="x<style>"+cssText+"</style>",parent.insertBefore(p.lastChild,parent.firstChild)}function getElements(){var elements=html5.elements;return"string"==typeof elements?elements.split(" "):elements}function getExpandoData(ownerDocument){var data=expandoData[ownerDocument[expando]];return data||(data={},expanID++,ownerDocument[expando]=expanID,expandoData[expanID]=data),data}function createElement(nodeName,ownerDocument,data){if(ownerDocument||(ownerDocument=document),supportsUnknownElements)return ownerDocument.createElement(nodeName);data||(data=getExpandoData(ownerDocument));var node;return node=data.cache[nodeName]?data.cache[nodeName].cloneNode():saveClones.test(nodeName)?(data.cache[nodeName]=data.createElem(nodeName)).cloneNode():data.createElem(nodeName),node.canHaveChildren&&!reSkip.test(nodeName)?data.frag.appendChild(node):node}function createDocumentFragment(ownerDocument,data){if(ownerDocument||(ownerDocument=document),supportsUnknownElements)return ownerDocument.createDocumentFragment();data=data||getExpandoData(ownerDocument);for(var clone=data.frag.cloneNode(),i=0,elems=getElements(),l=elems.length;l>i;i++)clone.createElement(elems[i]);return clone}function shivMethods(ownerDocument,data){data.cache||(data.cache={},data.createElem=ownerDocument.createElement,data.createFrag=ownerDocument.createDocumentFragment,data.frag=data.createFrag()),ownerDocument.createElement=function(nodeName){return html5.shivMethods?createElement(nodeName,ownerDocument,data):data.createElem(nodeName)},ownerDocument.createDocumentFragment=Function("h,f","return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&("+getElements().join().replace(/\w+/g,function(nodeName){return data.createElem(nodeName),data.frag.createElement(nodeName),'c("'+nodeName+'")'})+");return n}")(html5,data.frag)}function shivDocument(ownerDocument){ownerDocument||(ownerDocument=document);var data=getExpandoData(ownerDocument);return!html5.shivCSS||supportsHtml5Styles||data.hasCSS||(data.hasCSS=!!addStyleSheet(ownerDocument,"article,aside,dialog,figcaption,figure,footer,header,hgroup,main,nav,section{display:block}mark{background:#FF0;color:#000}template{display:none}")),supportsUnknownElements||shivMethods(ownerDocument,data),ownerDocument}var supportsHtml5Styles,supportsUnknownElements,version="3.6.2",options=window.html5||{},reSkip=/^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,saveClones=/^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i,expando="_html5shiv",expanID=0,expandoData={};!function(){try{var a=document.createElement("a");a.innerHTML="<xyz></xyz>",supportsHtml5Styles="hidden"in a,supportsUnknownElements=1==a.childNodes.length||function(){document.createElement("a");var frag=document.createDocumentFragment();return"undefined"==typeof frag.cloneNode||"undefined"==typeof frag.createDocumentFragment||"undefined"==typeof frag.createElement}()}catch(e){supportsHtml5Styles=!0,supportsUnknownElements=!0}}();var html5={elements:options.elements||"abbr article aside audio bdi canvas data datalist details dialog figcaption figure footer header hgroup main mark meter nav output progress section summary template time video",version:version,shivCSS:options.shivCSS!==!1,supportsUnknownElements:supportsUnknownElements,shivMethods:options.shivMethods!==!1,type:"default",shivDocument:shivDocument,createElement:createElement,createDocumentFragment:createDocumentFragment};window.html5=html5,shivDocument(document)}(this,document),$(document).ready(function(){$(".draggable-col").draggable({revert:"invalid",refreshPositions:!0,drag:function(event,ui){ui.helper.addClass("draggable")},stop:function(event,ui){ui.helper.removeClass("draggable");var img=$(this).find(".hidden-img"),id=img.parent().attr("id");img.attr("id",id),img.click(function(){var idToRemove=$(this).attr("id");$(".wishlist-col").find(".draggable-col").each(function(){$(this).attr("id")===idToRemove&&($(this).appendTo(".gift-list"),$(this).remove())}),$(this).remove()}),$(img).appendTo(".wishlist-visible")}}),$(".wishlist-col").droppable({drop:function(event,ui){0===$(".wishlist-col").length&&$(".wishlist-col").html(""),ui.draggable.addClass("dropped"),$(".wishlist-col").append(ui.draggable)}}),$("#reinitialiser").click(function(){$(".wishlist-visible").find("img").each(function(){$(this).remove()}),$(".wishlist-col").find(".draggable-col").each(function(){$(this).remove()})}),$("#envoyer").click(function(){var i=0,data=[];$(".wishlist-col").find(".draggable-col").each(function(){data.push({id:$(this).attr("id"),name:$(this).find(".hidden-name").val(),description:$(this).find(".hidden-description").val(),price:$(this).find(".hidden-sale-price").val()}),i++}),alert(JSON.stringify(data)),$.ajax({type:"POST",datatype:"json",data:{postData:data},url:"/lettre.html",success:function(){},error:function(e){alert(e.message)}})})}),$(document).ready(function(){$(".btnNextStep").click(function(){var currentInput=$("input.current, select.current"),currentLabel=$('label.label[for="'+currentInput.attr("id")+'"]'),currentBtn=$(this),nextInput=currentBtn.siblings("input.hidden, select.hidden").first(),nextLabel=$('label.label[for="'+nextInput.attr("id")+'"]'),nextBtn=$(this).siblings('.btnNextStep, .btnField[type="submit"]').first();if(nextLabel.text().indexOf("{0}")>=0&&nextLabel.text(nextLabel.text().replace("{0}",$('input[id="childfirstnameField"]').val())),nextLabel.text().indexOf("{1}")>=0){var text="";text+="0"===currentInput.val()?"Un grand garçon donc":"Une grande fille donc",nextLabel.text(nextLabel.text().replace("{1}",text))}currentInput.fadeOut("slow",function(){$(this).removeClass("current"),nextInput.fadeIn("slow",function(){$(this).addClass("current").removeClass("hidden"),$(this).css("display","block")})}),currentLabel.fadeOut("slow",function(){nextLabel.fadeIn("slow",function(){$(this).css("display","block")})}),currentBtn.fadeOut("slow",function(){$(this).removeClass("btnNextStep"),nextBtn.css({display:"block",opacity:0}),nextBtn.fadeIn("slow",function(){$(this).css({display:"block",opacity:1})})})}),$(".login").click(function(){$(".login-panel").toggle("slow")})});