// ----------------------------------------------------------------------------
// markItUp!
// ----------------------------------------------------------------------------
// Copyright (C) 2008 Jay Salvat
// http://markitup.jaysalvat.com/
// ----------------------------------------------------------------------------
// BBCode tags example
// http://en.wikipedia.org/wiki/Bbcode
// ----------------------------------------------------------------------------
// Feel free to add more tags
// ----------------------------------------------------------------------------

//{name:'Picture', key:'P', replaceWith:'[img][![Url]!][/img]'}, 
//{name:'Clean', className:"clean", replaceWith:function(h) { return h.selection.replace(/\[(.*?)\]/g, "") } },
//{name:'Preview', className:"preview", call:'preview' }
//{name:'Numeric list', openWith:'[list=[![Starting number]!]]\n', closeWith:'\n[/list]'}, 

mySettings = {
	nameSpace:          "bbcode", // Useful to prevent multi-instances CSS conflict
	previewParserPath:	'', // path to your BBCode parser
	markupSet: [
      {name:'Bold', key:'B', openWith:'[b]', closeWith:'[/b]'}, 
      {name:'Italic', key:'I', openWith:'[i]', closeWith:'[/i]'}, 
      {name:'Underline', key:'U', openWith:'[u]', closeWith:'[/u]'},       
      {separator:'---------------' },
      {name:'Colors', openWith:'[color=[![Color]!]]', closeWith:'[/color]', dropMenu: [
          {name:'Yellow', openWith:'[color=yellow]', closeWith:'[/color]', className:"col1-1" },
          {name:'Orange', openWith:'[color=orange]', closeWith:'[/color]', className:"col1-2" },
          {name:'Red', openWith:'[color=red]', closeWith:'[/color]', className:"col1-3" },
          {name:'Blue', openWith:'[color=blue]', closeWith:'[/color]', className:"col2-1" },
          {name:'Purple', openWith:'[color=purple]', closeWith:'[/color]', className:"col2-2" },
          {name:'Green', openWith:'[color=green]', closeWith:'[/color]', className:"col2-3" },
          {name:'White', openWith:'[color=white]', closeWith:'[/color]', className:"col3-1" },
          {name:'Gray', openWith:'[color=gray]', closeWith:'[/color]', className:"col3-2" },
          {name:'Black', openWith:'[color=black]', closeWith:'[/color]', className:"col3-3" }
      ]},
	  {name:'Background', openWith:'[bgcolor=[![Color]!]]', closeWith:'[/bgcolor]', dropMenu: [
          {name:'Yellow', openWith:'[bgcolor=yellow]', closeWith:'[/bgcolor]', className:"col1-1" },
          {name:'Orange', openWith:'[bgcolor=orange]', closeWith:'[/bgcolor]', className:"col1-2" },
          {name:'Red', openWith:'[bgcolor=red]', closeWith:'[/bgcolor]', className:"col1-3" },
          {name:'Blue', openWith:'[bgcolor=blue]', closeWith:'[/bgcolor]', className:"col2-1" },
          {name:'Purple', openWith:'[bgcolor=purple]', closeWith:'[/bgcolor]', className:"col2-2" },
          {name:'Green', openWith:'[bgcolor=green]', closeWith:'[/bgcolor]', className:"col2-3" },
          {name:'White', openWith:'[bgcolor=white]', closeWith:'[/bgcolor]', className:"col3-1" },
          {name:'Gray', openWith:'[bgcolor=gray]', closeWith:'[/bgcolor]', className:"col3-2" },
          {name:'Black', openWith:'[bgcolor=black]', closeWith:'[/bgcolor]', className:"col3-3" }
      ]},
      {name:'Size', key:'S', openWith:'[size=[![Text size]!]]', closeWith:'[/size]', dropMenu :[                
          {name:'Small', openWith:'[size=1]', closeWith:'[/size]' },
		  {name:'Normal', openWith:'[size=3]', closeWith:'[/size]' },
		  {name:'Big', openWith:'[size=5]', closeWith:'[/size]' }
      ]},
	  {separator:'---------------' },      
      {name:'Link', key:'L', openWith:'[url=[![Url]!]]', closeWith:'[/url]', placeHolder:'Your text to link here...'},
      {separator:'---------------' },
      {name:'Bulleted list', openWith:'[list]\n', closeWith:'\n[/list]'},       
      {name:'List item', openWith:'[*] '}, 
      {separator:'---------------' },
      {name:'Quotes', openWith:'[quote]', closeWith:'[/quote]'}, 
      {name:'Code', openWith:'[code]', closeWith:'[/code]'}, 
      {separator:'---------------' },
      {name:'Smiley', openWith:' :) ', dropMenu: [
          {name:'Bigsmile', openWith:' :D ', className:"col1-1" },
          {name:'Smile', openWith:' :) ', className:"col1-2" },
          {name:'Frown', openWith:' :( ', className:"col1-3" },
          {name:'Surprise', openWith:' :-O ', className:"col2-1" },
          {name:'Worry', openWith:' :s ', className:"col2-2" },
          {name:'Sad', openWith:' :blue: ', className:"col2-3" },
          {name:'Confuse', openWith:' :? ', className:"col3-1" },
          {name:'Angry', openWith:' D: ', className:"col3-2" },
          {name:'Cool', openWith:' B) ', className:"col3-3" },
		  {name:'Laugh', openWith:' X-D ', className:"col4-1" },
          {name:'Saint', openWith:' O:) ', className:"col4-2" },
          {name:'Wink', openWith:' ;) ', className:"col4-3" }
      ]},
   ]

}